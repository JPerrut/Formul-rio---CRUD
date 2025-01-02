<?php
  session_start();
  include_once('config.php');
  // print_r($_SESSION);
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
  {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
  }

  $logado = $_SESSION['email'];
  if(!empty($_GET['search']))
  {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
  }
  else 
  {
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
  }

  $result = $conexao->query($sql);
  // print_r($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <title>Document</title>
  <style>
    body {
      background: black;
      color: white;
    }

    .d-flex {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #566415;
      max-width: 200px;
      max-height: 100px;
    }

    .d-flex:hover, .box-search button:hover {
      cursor: pointer;
      opacity: 80%;
    }

    .btn {
      font-size: 3rem;
      text-decoration: none;
      color: black;
    }

    .fa-pencil {
      background-color: dodgerblue;
      border-radius: 8px;
      font-size: 1rem;
      padding: 5px;
      color: white;
    }

    .fa-trash {
      background-color: red;
      border-radius: 8px;
      font-size: 1rem;
      padding: 5px;
      color: white;
    }

    .form-control {
      width: 200px;
      padding: 3px;
    }

    .fa-magnifying-glass {
      background-color: dodgerblue;
      border-radius: 8px;
      font-size: 1rem;
      padding: 5px;
      color: white;
    }

    .box-search {
      margin: 40px;
    }

    .box-search button {
      background: none;
      border: none;
    }

  </style>
</head>
<body>
  <?php
    echo "<h1>Bem vindo <span>$logado</span></h1>";
  ?>
  <div class="d-flex">
    <a href="sair.php" class="btn btn-danger">Sair</a>
  </div>
  <br>
  <br>
  <br>

  <div class="box-search">
    <input type="search" name="" id="pesquisar" class="form-control" placeholder="Pesquisar">
    <button onclick="searchData()">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </div>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Senha</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col">Sexo</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col">Endereço</th>
          <th scope="col">...</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          while($user_data = mysqli_fetch_assoc($result))
          {
            echo "<tr>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['nome']."</td>";
            echo "<td>".$user_data['senha']."</td>";
            echo "<td>".$user_data['email']."</td>";
            echo "<td>".$user_data['telefone']."</td>";
            echo "<td>".$user_data['sexo']."</td>";
            echo "<td>".$user_data['data_nasc']."</td>";
            echo "<td>".$user_data['cidade']."</td>";
            echo "<td>".$user_data['estado']."</td>";
            echo "<td>".$user_data['endereco']."</td>";
            echo "<td>
              <a href='edit.php?id=$user_data[id]'>
                <i class='fa-solid fa-pencil'></i>
              </a>
              <a href='delete.php?id=$user_data[id]'>
                <i class='fa-solid fa-trash'></i>
              </a>
            </td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
      if(event.key === "Enter")
      {
        searchData();
      }
    })

    function searchData()
    {
      window.location = 'sistema.php?search='+search.value;
    }
  </script>
</body>
</html>