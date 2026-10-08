<?php
/**
 * contact.php — Envoi du formulaire de contact via l'API Brevo (ex-Sendinblue)
 *
 * Configuration : la clé API vit dans config.local.php (fichier ignoré par
 * Git, voir .gitignore) afin de ne jamais être poussée sur un dépôt public.
 * Récupère ta clé : https://app.brevo.com/settings/keys/api
 * (l'email expéditeur doit être vérifié dans ton compte Brevo)
 */

// ----- CONFIGURATION -----
// 1) Charge le fichier local secret s'il existe (ignoré par Git).
$__configLocal = __DIR__ . '/config.local.php';
if (is_readable($__configLocal)) {
    require $__configLocal;
}

// 2) Valeurs par défaut si le fichier est absent (jamais de clé réelle ici).
if (!defined('BREVO_API_KEY'))        define('BREVO_API_KEY', 'VOTRE_CLE_API_BREVO_ICI');
if (!defined('BREVO_SENDER_NAME'))    define('BREVO_SENDER_NAME', 'Espendi Piocel');
if (!defined('BREVO_SENDER_EMAIL'))   define('BREVO_SENDER_EMAIL', 'espendidev@gmail.com');    // email vérifié sur ton compte Brevo
if (!defined('BREVO_RECIPIENT_EMAIL')) define('BREVO_RECIPIENT_EMAIL', 'espendidev@gmail.com'); // email qui reçoit les messages

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// ----- Méthode autorisée -----
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit;
}

// ----- Honeypot anti-spam (champ caché rempli par les robots) -----
if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Message envoyé !']);
    exit;
}

// ----- Récupération + nettoyage -----
$nom     = trim(strip_tags($_POST['nom'] ?? ''));
$email   = trim(strip_tags($_POST['email'] ?? ''));
$sujet   = trim(strip_tags($_POST['sujet'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

// ----- Validation -----
if ($nom === '' || $email === '' || $sujet === '' || $message === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Adresse email invalide.']);
    exit;
}
if (strlen($nom) > 120 || strlen($sujet) > 200 || strlen($message) > 5000) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Message trop long.']);
    exit;
}

if (BREVO_API_KEY === 'VOTRE_CLE_API_BREVO_ICI') {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Clé API Brevo non configurée. Contactez pioceldev@gmail.com directement.']);
    exit;
}

// ----- Construction de l'email -----
$html = '
<div style="font-family:Arial,sans-serif;max-width:600px;margin:auto;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e5e7eb;">
  <div style="background:linear-gradient(115deg,#047857,#10b981);padding:22px 28px;">
    <h2 style="color:#ffffff;margin:0;font-size:20px;">Nouveau message du portfolio</h2>
  </div>
  <div style="padding:28px;">
    <p style="color:#374151;margin:6px 0;"><strong>Nom :</strong> ' . htmlspecialchars($nom) . '</p>
    <p style="color:#374151;margin:6px 0;"><strong>Email :</strong> <a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></p>
    <p style="color:#374151;margin:6px 0;"><strong>Sujet :</strong> ' . htmlspecialchars($sujet) . '</p>
    <hr style="border:none;border-top:1px solid #e5e7eb;margin:20px 0;">
    <p style="color:#374151;white-space:pre-wrap;">' . nl2br(htmlspecialchars($message)) . '</p>
  </div>
</div>';

$payload = json_encode([
    'sender'      => ['name' => BREVO_SENDER_NAME, 'email' => BREVO_SENDER_EMAIL],
    'to'          => [['email' => BREVO_RECIPIENT_EMAIL, 'name' => BREVO_SENDER_NAME]],
    'replyTo'     => ['name' => $nom, 'email' => $email],
    'subject'     => 'Portfolio — ' . substr($sujet, 0, 100),
    'htmlContent' => $html
]);

// ----- Envoi via l'API Brevo -----
$result = sendBrevo($payload);

if ($result['ok']) {
    echo json_encode(['success' => true, 'message' => 'Message envoyé ! Je vous répondrai rapidement.']);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de l\'envoi. Réessayez ou écrivez à pioceldev@gmail.com.',
        'detail'  => 'Brevo status ' . $result['status'] . ' — ' . $result['body'] . ($result['error'] ? ' — ' . $result['error'] : '')
    ]);
}

/**
 * Envoi du payload JSON vers l'API Brevo (cURL, sinon file_get_contents).
 */
function sendBrevo($payload)
{
    $url = 'https://api.brevo.com/v3/smtp/email';

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Accept: application/json',
                'api-key: ' . BREVO_API_KEY
            ],
            CURLOPT_TIMEOUT        => 15,
            // WAMP : certificat CA non installé → on désactive la vérification SSL
            // (à retirer si tu configures curl.cainfo dans php.ini)
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);
        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error    = curl_error($ch);
        curl_close($ch);
    } else {
        $context = stream_context_create([
            'http'  => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\nAccept: application/json\r\napi-key: " . BREVO_API_KEY . "\r\n",
                'content' => $payload,
                'timeout' => 15,
                'ignore_errors' => true
            ],
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false
            ]
        ]);
        $response = @file_get_contents($url, false, $context);
        $status   = isset($http_response_header[0]) ? (int) substr($http_response_header[0], 9, 3) : 0;
        $error    = '';
    }

    return ['ok' => $status >= 200 && $status < 300, 'status' => $status, 'body' => $response, 'error' => $error];
}
