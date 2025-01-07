<?php 

  if(isset($_POST['submit'])) {
    include_once('../../../config.php');

    if (!$conexao) {
      error_log("Error connecting to the database: " .mysqli_connect_error());
      die("An error occurred while processing your request.");
    };

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  
    $stmt = $conexao ->prepare ("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $passwordHash);

    if (!$stmt->execute()) {
      error_log("Error registering user: " . $stmt->error);
      die("An issue occurred while processing your request.");
    }

    $stmt->close();
  
    header('Location: ../register_login.html');
    exit();
  }

?>