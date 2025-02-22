<?php
require 'conexao.php';
require 'funcoes.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $profissao = $_POST['profissao'];

    if (cadastrarUsuario($conn, $nome, $email, $estado, $profissao)) {
        echo "Novo usuário cadastrado com sucesso";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>