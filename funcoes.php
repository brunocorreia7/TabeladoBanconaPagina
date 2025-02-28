<?php
require 'conexao.php';

function buscarDadosTabela($conn) {
    $sql = 'SELECT * FROM tabela WHERE situacao = 1';
    return mysqli_query($conn, $sql);
}

function cadastrarUsuario($conn, $nome, $email, $estado, $profissao) {
    $sql = "INSERT INTO tabela (nome, email, estado, profissao) VALUES ('$nome', '$email', '$estado', '$profissao')";
    return mysqli_query($conn, $sql);
}

function buscarUsuarioPorId($conn, $id) {
    $sql = "SELECT * FROM tabela WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function editarUsuario($conn, $id, $nome, $email, $estado, $profissao) {
    $sql = "UPDATE tabela SET nome = '$nome', email = '$email', estado = '$estado', profissao = '$profissao' WHERE id = $id";
    return mysqli_query($conn, $sql);
}

function deletarUsuario($conn, $id) {
    $sql = "UPDATE tabela SET situacao = 0 WHERE id = $id";
    return mysqli_query($conn, $sql);
}

if (isset($_POST['delete_usuario'])) {
    $id = $_POST['delete_usuario'];
    if (deletarUsuario($conn, $id)) {
        $_SESSION['message'] = "Usuário deletado com sucesso";
    } else {
        $_SESSION['message'] = "Erro ao deletar usuário: " . mysqli_error($conn);
    }
    header("Location: index.php");
    exit();
}
?>