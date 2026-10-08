/**
 * Fonction serverless VERCEL — formulaire de contact via l'API Brevo.
 *
 * Variables d'environnement (Vercel → Project → Settings → Environment Variables) :
 *   BREVO_API_KEY          (obligatoire) https://app.brevo.com/settings/keys/api
 *   BREVO_SENDER_EMAIL     (optionnel)   doit être vérifié dans Brevo
 *   BREVO_SENDER_NAME      (optionnel)
 *   BREVO_RECIPIENT_EMAIL  (optionnel)   défaut = BREVO_SENDER_EMAIL
 *
 * La clé n'est JAMAIS versionnée : elle vit uniquement dans l'environnement.
 *
 * index.html envoie sur /api/contact ; vercel.json redirige en plus
 * /contact.php vers cette fonction par sécurité.
 */

const BREVO_URL = 'https://api.brevo.com/v3/smtp/email';
const SENDER_NAME = process.env.BREVO_SENDER_NAME || 'Espendi Piocel';
const SENDER_EMAIL = process.env.BREVO_SENDER_EMAIL || 'espendidev@gmail.com';
const RECIPIENT_EMAIL = process.env.BREVO_RECIPIENT_EMAIL || SENDER_EMAIL;

function send(res, statusCode, body) {
  res.statusCode = statusCode;
  res.setHeader('Content-Type', 'application/json; charset=utf-8');
  return res.end(JSON.stringify(body));
}

function escapeHtml(value) {
  return String(value).replace(/[&<>"']/g, (c) => (
    { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]
  ));
}

// Vercel analyse déjà le body (json + urlencoded) ; on couvre aussi
// le cas d'une chaîne brute reçue sans parsing.
function getParams(req) {
  if (req.body && typeof req.body === 'object') return req.body;
  const raw = typeof req.body === 'string' ? req.body : '';
  return Object.fromEntries(new URLSearchParams(raw));
}

function renderEmail({ nom, email, sujet, message }) {
  return `
<div style="font-family:Arial,sans-serif;max-width:600px;margin:auto;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb;">
  <div style="background:linear-gradient(270deg,#8b5cf6,#a78bfa);padding:22px 28px;">
    <h2 style="color:#ffffff;margin:0;font-size:20px;">Nouveau message du portfolio</h2>
  </div>
  <div style="padding:28px;">
    <p style="color:#374151;margin:6px 0;"><strong>Nom :</strong> ${escapeHtml(nom)}</p>
    <p style="color:#374151;margin:6px 0;"><strong>Email :</strong> <a href="mailto:${escapeHtml(email)}">${escapeHtml(email)}</a></p>
    <p style="color:#374151;margin:6px 0;"><strong>Sujet :</strong> ${escapeHtml(sujet)}</p>
    <hr style="border:none;border-top:1px solid #e5e7eb;margin:20px 0;">
    <p style="color:#374151;white-space:pre-wrap;">${escapeHtml(message).replace(/\n/g, '<br>')}</p>
  </div>
</div>`;
}

module.exports = async function handler(req, res) {
  if (req.method !== 'POST') {
    return send(res, 405, { success: false, message: 'Méthode non autorisée.' });
  }

  let params;
  try {
    params = getParams(req);
  } catch (err) {
    return send(res, 400, { success: false, message: 'Corps de requête invalide.' });
  }

  // Honeypot anti-spam (champ caché rempli par les robots).
  if (params.website) {
    return send(res, 200, { success: true, message: 'Message envoyé !' });
  }

  const nom = String(params.nom || '').trim();
  const email = String(params.email || '').trim();
  const sujet = String(params.sujet || '').trim();
  const message = String(params.message || '').trim();

  if (!nom || !email || !sujet || !message) {
    return send(res, 400, { success: false, message: 'Veuillez remplir tous les champs.' });
  }
  if (nom.length > 120 || sujet.length > 200 || message.length > 5000) {
    return send(res, 400, { success: false, message: 'Message trop long.' });
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    return send(res, 400, { success: false, message: 'Adresse email invalide.' });
  }

  const apiKey = process.env.BREVO_API_KEY;
  if (!apiKey) {
    return send(res, 500, {
      success: false,
      message: 'Clé API Brevo non configurée. Contactez pioceldev@gmail.com directement.',
    });
  }

  const payload = {
    sender: { name: SENDER_NAME, email: SENDER_EMAIL },
    to: [{ email: RECIPIENT_EMAIL, name: SENDER_NAME }],
    replyTo: { name: nom, email },
    subject: 'Portfolio — ' + sujet.slice(0, 100),
    htmlContent: renderEmail({ nom, email, sujet, message }),
  };

  try {
    const response = await fetch(BREVO_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'api-key': apiKey,
      },
      body: JSON.stringify(payload),
    });

    if (response.ok) {
      return send(res, 200, { success: true, message: 'Message envoyé ! Je vous répondrai rapidement.' });
    }
    return send(res, 500, {
      success: false,
      message: "Erreur lors de l'envoi. Réessayez ou écrivez à pioceldev@gmail.com.",
      detail: 'Brevo status ' + response.status,
    });
  } catch (err) {
    return send(res, 500, {
      success: false,
      message: 'Erreur réseau. Réessayez ou écrivez à pioceldev@gmail.com.',
    });
  }
};
