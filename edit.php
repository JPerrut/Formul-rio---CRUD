<?php 

  if(!empty($_GET['id'])) 
  {

    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
      while($user_data = mysqli_fetch_assoc($result))
      {
        $nome = $user_data['nome'];
        $senha = $user_data['senha'];
        $email = $user_data['email'];
        $telefone = $user_data['telefone'];
        $genero = $user_data['sexo'];
        $data_nascimento = $user_data['data_nasc'];
        $cidade = $user_data['cidade'];
        $estado = $user_data['estado'];
        $endereco = $user_data['endereco'];
      }
      print_r($nome);
    }
    else
    {
      header('Location: sistema.php');
    }
  
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

    #update 
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

    #update:hover {
      opacity: 80%;
    }

  </style>
</head>
<body>
  <a href="sistema.php">Voltar</a>
  <div class="box">
    <form action="saveEdit.php" method="post">
      <fieldset>
        <legend>Formulário de clientes</legend>
        <br>
        <div class="inputBox">
          <input type="text" name="nome" class="inputUser" id="nome" value="<?php echo $nome ?>" required>
          <label for="nome" class="labelInput">Nome completo</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="senha" class="inputUser" id="senha" value="<?php echo $senha ?>" required>
          <label for="senha" class="labelInput">Senha</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="text" name="email" class="inputUser" id="email" value="<?php echo $email ?>" required>
          <label for="email" class="labelInput">Email</label>
        </div>
        <br><br>
        <div class="inputBox">
          <input type="tel" name="telefone" class="inputUser" id="telefone" value="<?php echo $telefone ?>" required>
          <label for="telefone" class="labelInput">telefone</label>
        </div>
        <br><br>
        <p>Sexo:</p>
        <input type="radio" id="feminino" name="genero" value="feminino" <?php echo $genero == 'feminino' ? 'checked' : '' ?> required>
        <label for="feminino">Feminino</label>
        <input type="radio" id="masculino" name="genero" value="masculino" <?php echo $genero == 'masculino' ? 'checked' : '' ?> required>
        <label for="masculino">Masculino</label>
        <input type="radio" id="outros" name="genero" value="outros" <?php echo $genero == 'outros' ? 'checked' : '' ?> required>
        <label for="outros">Outros</label>
        <br><br>

        <div class="inputBox">
          <label for="data_nascimento">Data de Nascimento</label>
          <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" value="<?php echo $data_nascimento ?>" required>
        </div>
<br><br>
        <div class="inputBox">
          <input type="text" name="cidade" class="inputUser" id="cidade" Value="<?php echo $cidade ?>"  required>
          <label for="cidade" class="labelInput">Cidade</label>
        </div>
        <br><br>

        <div class="inputBox">
          <input type="text" name="estado" class="inputUser" id="estado" Value="<?php echo $estado ?>"  required>
          <label for="estado" class="labelInput">Estado</label>
        </div>
        <br><br>

        <div class="inputBox">
          <input type="text" name="endereco" class="inputUser" id="endereco" Value="<?php echo $endereco ?>"  required>
          <label for="endereco" class="labelInput">Endereço</label>
        </div>
        <br><br>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="update" value="Enviar" id="update">

      </fieldset>
    </form>
  </div>
</body>
</html>