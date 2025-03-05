<?php
require 'conexao.php';

function buscarDadosTabela($conn, $search = '') {
    $sql = 'SELECT * FROM tabela WHERE situacao = 1';
    if ($search) {
        $sql .= " AND (nome LIKE '%$search%' OR email LIKE '%$search%' OR estado LIKE '%$search%' OR profissao LIKE '%$search%')";
    }
    return mysqli_query($conn, $sql);
}

function cadastrarUsuario($conn, $nome, $email, $estado, $profissao) {
    // Remover espaços em branco dos valores dos campos
    $nome = trim($nome);
    $email = trim($email);
    $estado = trim($estado);
    $profissao = trim($profissao);

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