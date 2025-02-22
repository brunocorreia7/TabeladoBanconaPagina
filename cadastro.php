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
            
            <a id="botao" href="index.php" target="_blank">Voltar</a>
        </div>
    </nav>
<form action="processa_cadastro.php" method="post">
<div class="mb-3 mt-3">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
    <label for="Estado" class="form-label">Estado:</label>
    <input type="text" class="form-control" id="email" name="estado">
    <label for="pofissao" class="form-label">Profissao:</label>
    <input type="text" class="form-control" id="profissao" name="profissao">
    <br>
    <button type="submit" class="btn btn-primary">Confirmar</button>
  
    </form>    
  
</div>

</body>
</html>