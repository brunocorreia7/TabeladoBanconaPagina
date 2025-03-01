<?php
session_start();
require 'conexao.php';
require 'funcoes.php';

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Usuários</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <nav class="navbar">
    <div class="logo">
      <h2>Cadastro de Usuários</h2>
    </div>
    <div class="menu">
      <a id="botao" href="cadastro.php" target="_blank">Cadastrar</a>
    </div>
  </nav>

  <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info" role="alert">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif; ?>

  <form method="GET" action="">
    <div class="input-group mb-3 w-50">
      <input type="text" class="form-control" placeholder="Pesquisar" name="search" value="<?php echo $search; ?>">
      <button class="btn btn-primary" type="submit">Pesquisar</button>
    </div>
  </form>

  <table class="table table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Estado</th>
        <th>Profissão</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $tabelas = buscarDadosTabela($conn, $search);
        if (mysqli_num_rows($tabelas) > 0) {
            foreach($tabelas as $tabela) {
    ?>
    <tr>
      <td><?=$tabela['id']?></td>
      <td><?=$tabela['nome']?></td>
      <td><?=$tabela['email']?></td>
      <td><?=$tabela['estado']?></td>
      <td><?=$tabela['profissao']?></td>
      <td>
        <a href="editar.php?id=<?=$tabela['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>

        <form action="funcoes.php" method="POST" class="d-inline">
        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?= $tabela['id'] ?>" class="btn btn-danger btn-sm">
                                                <span class="bi-trash3-fill"></span>&nbsp;Excluir
                                            </button></form>
      </td>
    </tr>
    <?php
            }
        } else {
    ?>
    <tr>
      <td colspan="6">Nenhum resultado encontrado.</td>
    </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>