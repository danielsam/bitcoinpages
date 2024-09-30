<?php
echo "<br />Start-Initialize: " . time();

// Check if the URL contains "www." and redirect to the non-www version
if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $pageURL = $protocol . substr($_SERVER['HTTP_HOST'], 4) . $_SERVER['REQUEST_URI'];  // Remove "www."
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $pageURL);
    exit;
}

// Start session and set session parameters for security
session_start();
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];

// Manage session messages
$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
$retorno = isset($_SESSION['retorno']) ? $_SESSION['retorno'] : '';
unset($_SESSION['mensagem'], $_SESSION['retorno']);

// Record the current URL
$_SESSION['url_anterior'] = $_SERVER['REQUEST_URI'];

// Mobile detection using regex
$useragent = $_SERVER['HTTP_USER_AGENT'];
$mobile = (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|...|zte\-/i', $useragent)) ? 'S' : 'N';

// Encryption using OpenSSL
function encryptIt($q) {
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $qEncoded = openssl_encrypt($q, $cipher, $cryptKey, $options = 0, $iv);
    return base64_encode($qEncoded . '::' . $iv);
}

echo "<br />End-Initialize: " . time();
?>