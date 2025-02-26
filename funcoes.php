<?php
function buscarDadosTabela($conn) {
    $sql = 'SELECT * FROM tabela';
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

?>