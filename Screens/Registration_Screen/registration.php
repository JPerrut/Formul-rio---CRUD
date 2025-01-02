<?php 

  if(isset($_POST['submit'])) 
  {

    include_once('../../config.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    $result = mysqli_query($conexao, "INSERT INTO users(name,email,password) 
    VALUES ('$name','$email','$password')");
  
    header('Location: ../../login.php');
    exit();
  }

?>