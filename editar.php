<?php
session_start();
require 'conexao.php';
require 'funcoes.php';

$message = '';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $profissao = $_POST['profissao'];

    if (editarUsuario($conn, $id, $nome, $email, $estado, $profissao)) {
        $message = "Usuário atualizado com sucesso";
    } else {
        $message = "Erro: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $usuario = buscarUsuarioPorId($conn, $id);
    $nome = $usuario['nome'];
    $email = $usuario['email'];
    $estado = $usuario['estado'];
    $profissao = $usuario['profissao'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Editar Usuário</title>
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
      <h2>Editar usuário</h2>
    </div>
    <div class="menu">
      <a id="botao" href="index.php" target="_blank">Voltar</a>
    </div>
  </nav>

  <?php if ($message): ?>
    <div class="alert alert-info" role="alert">
      <?php echo $message; ?>
    </div>
  <?php endif; ?>

  <form action="" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="mb-3 mt-3">
      <label for="nome" class="form-label">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?=$nome?>" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" required>
    </div>
    <div class="mb-3">
      <label for="estado" class="form-label">Estado:</label>
      <input type="text" class="form-control" id="estado" name="estado" value="<?=$estado?>" required>
    </div>
    <div class="mb-3">
      <label for="profissao" class="form-label">Profissão:</label>
      <input type="text" class="form-control" id="profissao" name="profissao" value="<?=$profissao?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Confirmar</button>
  </form>
</div>

</body>
</html>