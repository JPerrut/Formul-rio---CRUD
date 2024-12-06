<?php 

  if(isset($_POST['submit'])) 
  {

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
  
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,sexo,data_nasc,cidade,estado,endereco) 
    VALUES ('$nome','$email','$telefone','$genero','$data_nascimento','$cidade','$estado','$endereco')");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>

  <style>
    body 
    {
      font-family: Arial, Helvetica, sans-serif;
      background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    }

    .box 
    {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0,0,0, 0.8);
      padding: 15px;
      border-radius: 15px;
      width: 400px;
      color: white;
    }

    fieldset 
    {
      border: 3px solid dodgerblue;
    }

    legend
    {
      border: 1px solid dodgerblue;
      padding: 10px;
      text-align: center;
      background-color: dodgerblue;
      border-radius: 8px;
    }

    .inputBox
    {
      position: relative;
    }

    .inputUser 
    {
      background: none;
      border: none;
      border-bottom: 1px solid white;
      outline: none; 
      color: white;
      font-size: 15px;
      width: 100%; 
    }

    .labelInput
    {
      position: absolute;
      top: 0px;
      left: 0px;
      pointer-events: none;
      transition: .5s;
    }

    .inputUser:focus ~ .labelInput, .inputUser:valid ~ .labelInput
    {
      top: -20px;
      font-size: 12px;
      color: dodgerblue;
    }

    #data_nascimento
    {
      border: none;
      padding: 8px;
      border-radius: 10px;
      background-color: white;
      color: black;
      font-size: 15px;
      width: auto;
    }

    #submit 
    {
      background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
      width: 100%;
      border: none;
      padding: 15px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      border-radius: 10px;
    }

    #submit:hover {
      opacity: 80%;
    }

  </style>
</head>
<body>
  <div class="box">
    <form action="cadastro.php" method="post">
      <fieldset>
        <legend>Formulário de clientes</legend>
        <br>
        <div class="inputBox">
          <input type="text" name="nome" class="inputUser" id="nome" required>
          <label for="nome" class="labelInput">Nome completo</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="email" class="inputUser" id="email" required>
          <label for="email" class="labelInput">Email</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="tel" name="telefone" class="inputUser" id="telefone" required>
          <label for="telefone" class="labelInput">telefone</label>
        </div>
        <br><br>
        <p>Sexo:</p>
        <input type="radio" id="feminino" name="genero" value="feminino" required>
        <label for="feminino">Feminino</label>
        <input type="radio" id="masculino" name="genero" value="masculino" required>
        <label for="masculino">Masculino</label>
        <input type="radio" id="outros" name="genero" value="outros" required>
        <label for="outros">Outros</label>
        <br><br>

        <div class="inputBox">
          <label for="data_nascimento">Data de Nascimento</label>
          <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" required>
        </div>
<br><br>
        <div class="inputBox">
          <input type="text" name="cidade" class="inputUser" id="cidade" required>
          <label for="cidade" class="labelInput">Cidade</label>
        </div>
        <br><br>

        <div class="inputBox">
          <input type="text" name="estado" class="inputUser" id="estado" required>
          <label for="estado" class="labelInput">Estado</label>
        </div>
        <br><br>

        <div class="inputBox">
          <input type="text" name="endereco" class="inputUser" id="endereco" required>
          <label for="endereco" class="labelInput">Endereço</label>
        </div>
        <br><br>
        <input type="submit" name="submit" value="Enviar" id="submit">

      </fieldset>
    </form>
  </div>
</body>
</html>