<?php
session_start();

include_once('../../../config.php');

if (isset($_SESSION['id'])) {
    $stmt = $conexao->prepare("UPDATE users SET remember_token = NULL, token_expiry = NULL WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    session_unset(); 
    session_destroy();
    setcookie("remember_token", "", time() - 3600, "/");
}

header("Location: ../../Register_Login/register_login.php");
exit();
?>

