<?php 

  $dbHost = 'localhost';
  $dbUsername = 'root';
  $dbPassword = '7634';
  $dbName = 'formulario_crud';

  $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  // if($conexao->connect_errno) {
  //   echo "Error";
  // }
  // else
  // {
  //   echo "Conexão efetuada com sucesso";
  // }
?>