<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['id']);
	header('Location: Screens/Register_Login/register_login.php');
?>