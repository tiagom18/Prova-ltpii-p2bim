<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ltpii-p2bim";
$port = "3306";


$conn = new PDO("mysql:host=$host;dbname=".$dbname,$user,$pass);
    try {
        $conexao = new PDO("mysql:host=localhost; dbname=ltpii-p2bim", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");
    } catch (PDOException $erro) {
        echo "Erro na conexão: ".$erro->getMessage();
    }
?>