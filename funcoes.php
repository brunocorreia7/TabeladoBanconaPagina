<?php
if (!function_exists('buscarDadosTabela')) {
    function buscarDadosTabela($conn) {
        $sql = 'SELECT * FROM tabela';
        return mysqli_query($conn, $sql);
    }
}

if (!function_exists('cadastrarUsuario')) {
    function cadastrarUsuario($conn, $nome, $email, $estado, $profissao) {
        $sql = "INSERT INTO tabela (nome, email, estado, profissao) VALUES ('$nome', '$email', '$estado', '$profissao')";
        return mysqli_query($conn, $sql);
    }
}
?>