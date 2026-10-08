<?php
/**
 * Génère index.html (site statique) à partir de index.php.
 *
 * Pourquoi : Netlify ne fait pas tourner le PHP. On évalue donc index.php
 * au moment du build, puis on publie le HTML résultant.
 *
 * Usage :  SITE_HOST=monsite.netlify.app php build-index.php
 * Sans SITE_HOST, l'hôte par défaut est espendi-piocel.vercel.app.
 */

$host = getenv('SITE_HOST') ?: 'espendi-piocel.vercel.app';
$host = preg_replace('#^https?://#', '', rtrim($host, '/'));

$_SERVER['HTTP_HOST']      = $host;
$_SERVER['HTTPS']          = 'on';
$_SERVER['SERVER_PORT']    = '443';
$_SERVER['REQUEST_URI']    = '/';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['SCRIPT_NAME']    = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';

ob_start();
require __DIR__ . '/index.php';
$html = ob_get_clean();

// Sur Vercel, le formulaire appelle la fonction serverless /api/contact.
// (index.php, lui, conserve "contact.php" pour rester compatible hébergeur PHP.)
$html = str_replace(
    ['action="contact.php"', "fetch('contact.php'", 'fetch("contact.php"'],
    ['action="/api/contact"', "fetch('/api/contact'", 'fetch("/api/contact"'],
    $html
);

// --- Garde-fous : on ne doit jamais publier du PHP non évalué ni un secret ---
if (strpos($html, '<?php') !== false) {
    fwrite(STDERR, "ERREUR : reste de code PHP non évalué dans la sortie.\n");
    exit(1);
}
if (stripos($html, 'xkeysib') !== false) {
    fwrite(STDERR, "ERREUR : clé API Brevo détectée dans la sortie.\n");
    exit(1);
}
if (strpos($html, '<!DOCTYPE html>') === false) {
    fwrite(STDERR, "ERREUR : le document HTML est incomplet.\n");
    exit(1);
}

file_put_contents(__DIR__ . '/index.html', $html);
echo 'index.html généré : ' . strlen($html) . ' octets (host=' . $host . ")\n";
