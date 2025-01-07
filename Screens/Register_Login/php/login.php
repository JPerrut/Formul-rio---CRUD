<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);


  if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) 
  {
    include_once('../../../config.php');
    if (!$conexao) {
      die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
  }
  
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conexao->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {
      $user = $result->fetch_assoc();

      if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];
        header('Location: ../../../sistema.php');
        exit();
      }
      else 
      {
        header('Location: ../register_login.html');
        $_SESSION['error'] = "Senha incorreta!";
        exit();
      }
    }
    else 
    {
      header('Location: ../register_login.html');
      $_SESSION['error'] = "Usuário não encontrado!";
  
      exit();
    }
  }
  else 
  {
    header('Location: ../register_login.html');
    $_SESSION['error'] = "Por favor, preencha todos os campos!";

    exit();
  }

?>