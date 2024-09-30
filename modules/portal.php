<?php

// Save the portal URL in a variable
$por_url = $_SERVER['SERVER_NAME'];
echo "<br />URL do Portal: " . $por_url;

// Open a connection to the database
require("../config/database.php");

// Use prepared statements to prevent SQL injection
$query = "SELECT * FROM portais WHERE por_url = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 's', $por_url);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) !== 0) {
    $row_por = mysqli_fetch_assoc($result);
    
    // Map database results to variables
    $por_logo        = $row_por['por_logo'];
    $por_sigla       = $row_por['por_sigla'];
    $por_nome        = $row_por['por_nome'];
    $por_titulo      = $row_por['por_titulo'];
    $por_pre         = $row_por['por_pre'];
    $por_seo         = $row_por['por_seo'];
    $por_pos         = $row_por['por_pos'];
    $por_historia    = $row_por['por_historia'];
    $por_hist_2      = $row_por['por_hist_2'];
    $por_hist_titulo = $row_por['por_hist_titulo'];
    $por_analytics   = $row_por['por_analytics'];
    $por_descricao   = $row_por['por_descricao'];
    $por_latitude    = $row_por['por_latitude'];
    $por_longitude   = $row_por['por_longitude'];
    $por_zoom        = $row_por['por_zoom'];

    // Free the result set before closing the connection
    mysqli_free_result($result);
	echo "Nome do Portal: " . $por_nome;
} else {
    echo "Informações do portal não encontradas";
    exit;
}

// Close the database connection
mysqli_close($link);

// Save the portal name in the session for use in send_email2.php
$_SESSION['por_nome'] = $por_nome;
?>
