<?php
$servidor = "localhost";
$dbusuario = "root";
$dbsenha = "";
$dbname = "treinotabelas";
$conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>