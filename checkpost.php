<?php
// Handle POST requests and sanitize input
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome'])) {
    $nome = htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8');
    $_SESSION['palavra_busca'] = $nome;

    // Format the search term for the URL
    $nome = preg_replace("/&([a-z])[a-z]+;/i", "$1", $nome);
    $nome = str_replace([' ', '&rsquo;'], '-', strtolower($nome));

    // Redirect to the new URL
    $_SESSION['pagina_volta'] = $_SESSION['url_anterior'];
    header("Location: /" . $nome);
    exit;
}
?>