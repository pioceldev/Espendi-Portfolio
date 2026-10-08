/**
 * Fonction serverless Netlify — formulaire de contact via l'API Brevo.
 *
 * Configuration (Netlify > Site configuration > Environment variables) :
 *   BREVO_API_KEY         (obligatoire) https://app.brevo.com/settings/keys/api
 *   BREVO_SENDER_EMAIL    (optionnel)   doit être vérifié dans Brevo
 *   BREVO_SENDER_NAME     (optionnel)
 *   BREVO_RECIPIENT_EMAIL (optionnel)   défaut = BREVO_SENDER_EMAIL
 *
 * La clé n'est JAMAIS versionnée : elle vit uniquement dans l'environnement.
 *
 * Le formulaire de index.html envoie sur "contact.php" ; netlify.toml réécrit
 * cette route vers cette fonction.
 */

const BREVO_URL = 'https://api.brevo.com/v3/smtp/email';
const SENDER_NAME = process.env.BREVO_SENDER_NAME || 'Espendi Piocel';
const SENDER_EMAIL = process.env.BREVO_SENDER_EMAIL || 'espendidev@gmail.com';
const RECIPIENT_EMAIL = process.env.BREVO_RECIPIENT_EMAIL || SENDER_EMAIL;

function json(statusCode, body) {
  return {
    statusCode,
    headers: { 'Content-Type': 'application/json; charset=utf-8' },
    body: JSON.stringify(body),
  };
}

function escapeHtml(value) {
  return String(value).replace(/[&<>"']/g, (c) => (
    { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]
  ));
}

function parseBody(event) {
  const raw = event.isBase64Encoded
    ? Buffer.from(event.body || '', 'base64').toString('utf8')
    : (event.body || '');
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

exports.handler = async function handler(event) {
  if (event.httpMethod !== 'POST') {
    return json(405, { success: false, message: 'Methode non autorisee.' });
  }

  let params;
  try {
    params = parseBody(event);
  } catch (err) {
    return json(400, { success: false, message: 'Corps de requete invalide.' });
  }

  // Honeypot anti-spam (champ cache rempli par les robots).
  if (params.website) {
    return json(200, { success: true, message: 'Message envoye !' });
  }

  const nom = (params.nom || '').trim();
  const email = (params.email || '').trim();
  const sujet = (params.sujet || '').trim();
  const message = (params.message || '').trim();

  if (!nom || !email || !sujet || !message) {
    return json(400, { success: false, message: 'Veuillez remplir tous les champs.' });
  }
  if (nom.length > 120 || sujet.length > 200 || message.length > 5000) {
    return json(400, { success: false, message: 'Message trop long.' });
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    return json(400, { success: false, message: 'Adresse email invalide.' });
  }

  const apiKey = process.env.BREVO_API_KEY;
  if (!apiKey) {
    return json(500, {
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
    const res = await fetch(BREVO_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'api-key': apiKey,
      },
      body: JSON.stringify(payload),
    });

    if (res.ok) {
      return json(200, { success: true, message: 'Message envoyé ! Je vous répondrai rapidement.' });
    }
    return json(500, {
      success: false,
      message: "Erreur lors de l'envoi. Réessayez ou écrivez à pioceldev@gmail.com.",
      detail: 'Brevo status ' + res.status,
    });
  } catch (err) {
    return json(500, {
      success: false,
      message: 'Erreur réseau. Réessayez ou écrivez à pioceldev@gmail.com.',
    });
  }
};
