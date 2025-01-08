<?php
	include 'pages/route.php';

	session_start();
	include_once('../../config.php');
	if(!isset($_SESSION['email']))
	{
		unset($_SESSION['email']);
		unset($_SESSION['id']);
		header('Location: Screens/Register_Login/register_login.php');
		exit();
	}

	$email = $_SESSION['email'];

	$sql = "SELECT name FROM users WHERE email = ?";
	$stmt = $conexao->prepare($sql);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$user = $result->fetch_assoc();
		$logado = $user['name'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>Home page</title>

  <link rel="stylesheet" href="../general_styling/css/style.css">
  <link rel="stylesheet" href="../general_styling/css/body.css">
  <link rel="stylesheet" href="../general_styling/css/header.css">
  <link rel="stylesheet" href="../general_styling/css/footer.css">
  <link rel="stylesheet" href="../general_styling/css/animation.css">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/about.css">
</head>
<body>
	<header>
		<div class="container">
			<img class="logo" src="../../images/User_logged/titles/logo.png" alt="Logo">
			<nav>
				<ul class="menu" data-animation="center">
				<li><a href="?page=home" <?= $page == 'home' ? 'class="active"' : '' ?>>Home</a></li>
				<li><a href="?page=about" <?= $page == 'about' ? 'class="active"' : '' ?>>About us</a></li>
				<li><a href="?page=service" <?= $page == 'service' ? 'class="active"' : '' ?>>Service</a></li>
				<li><a href="?page=contact" <?= $page == 'contact' ? 'class="active"' : '' ?>>Contact</a></li>
				</ul>
			</nav>
			<div class="menu_user">
				<span class="nomeid">nomeid</span>
				<img src="../../images/User_logged/icons/user.png" alt="">
			</div>
		</div>
	</header>

  	<main>
		<div class="container">
			<?php include "pages/$page.php"; ?>
		</div>
  	</main>

	<div class="line"></div>

	<footer>
		<div class="container">
			<div class="icons-social">
				<div class="icon-container">
					<div class="icon-group">
						<img src="../../images/User_logged/icons/facebook.png" alt="">
						<a href="https://www.flaticon.com/br/icones-gratis/facebook" target="_blank" title="facebook ícones">
							Facebook ícones criados por Hight Quality Icons - Flaticon</a>
					</div>
					<div class="icon-group">
						<img src="../../images/User_logged/icons/instagram.png" alt="">
						<a href="https://www.flaticon.com/br/icones-gratis/logotipo-do-instagram" target="_blank" 
						title="logotipo do instagram ícones">Instagram ícones criados por Hight Quality Icons - Flaticon</a>
					</div>
				</div>
				<div class="icon-container">
					<div class="icon-group">
						<img src="../../images/User_logged/icons/linkedin.png" alt="">
						<a href="https://www.flaticon.com/br/icones-gratis/linkedin" target="_blank" title="linkedin ícones">Linkedin ícones 
							criados por Hight Quality Icons - Flaticon</a>
					</div>
					<div class="icon-group">
						<img src="../../images/User_logged/icons/whatsapp.png" alt="">
						<a href="https://www.flaticon.com/br/icones-gratis/whatsapp" target="_blank" title="whatsapp ícones">Whatsapp ícones 
							criados por Hight Quality Icons - Flaticon</a>
					</div>
				</div>
				<div class="icon-group">
					<img src="../../images/User_logged/icons/discord.png" alt="">
					<a href="https://www.flaticon.com/br/icones-gratis/discordia" target="_blank" title="discórdia ícones">Discord ícones 
						criados por Hight Quality Icons - Flaticon</a>
				</div>
			</div>

			<div class="bar"></div>
			<p class="by">Created by Perrut</p>
		</div>
	</footer>
</body>
</html>