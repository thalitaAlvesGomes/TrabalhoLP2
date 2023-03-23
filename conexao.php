<?php
//dados do banco
$dbtype = "mysql";
$host = "localhost";
$port = "3306";
$user = "root";
$password = "";
$db = "gerenciamentoestoque_bd";
try { //conexão
    $conexao = new PDO($dbtype . ":host=" . $host .
        ";port=" . $port . ";dbname=" . $db, $user, $password);
    // echo "<p>Banco de dados conectado.</p>";
} catch (PDOException $i) {
    //se houver exceção, exibe
    die("Erro: <code>" . $i->getMessage() . "</code>");
}
?>