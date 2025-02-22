<?php
function buscarDadosTabela($conn) {
    $sql = 'SELECT * FROM tabela';
    return mysqli_query($conn, $sql);
}
?>