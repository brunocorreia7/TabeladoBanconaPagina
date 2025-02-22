<?php
function buscarDadosTabela($conn) {
    $sql = 'SELECT * FROM tabela';
    return mysqli_query($conn, $sql);
}

function cadastrarUsuario($conn, $nome, $email, $estado, $profissao) {
    $sql = "INSERT INTO tabela (nome, email, estado, profissao) VALUES ('$nome', '$email', '$estado', '$profissao')";
    return mysqli_query($conn, $sql);
}
?>