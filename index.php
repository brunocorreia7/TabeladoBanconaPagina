<?php
session_start();
require 'conexao.php';
require 'funcoes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<nav class="navbar">
        <div class="logo">
            <h2>Cadastro de usuarios</h2>
        </div>
        <div class="menu">
            
            <a id="botao" href="cadastro.php" target="_blank">Cadastrar</a>
        </div>
    </nav>
   
  <table class="table table-dark">
    <thead>
      <tr>
        <th>id</th>
        <th>nome</th>
        <th>email</th>
        <th>estado</th>
        <th>profissao</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $tabelas = buscarDadosTabela($conn);
        if (mysqli_num_rows($tabelas) > 0) {
            foreach($tabelas as $tabela) {
    ?>
    <tr>
      <td><?=$tabela['id']?></td>
      <td><?=$tabela['nome']?></td>
      <td><?=$tabela['email']?></td>
      <td><?=$tabela['estado']?></td>
      <td><?=$tabela['profissao']?></td>
    </tr>
    <?php
            }
        }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>