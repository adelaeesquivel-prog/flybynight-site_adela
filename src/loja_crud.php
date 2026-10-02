<?php
require_once "conecta.php";

function buscarLojas(PDO $conexao): array {
     
    $sql = "SELECT * FROM lojas ORDER BY nome";
    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}
 
function inserirLojas(PDO $conexao, string $nome): void {
    $sql = "INSERT INTO lojas (nome) VALUES (:nome)";
 
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome", $nome);
    $consulta->execute();
}

function buscarLojaPorId(PDO $conexao ,int $id):array
 {
    $sql = "SELECT * FROM lojas WHERE id = :id "; 

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();
    return $consulta-> fetch();
 }

 function atualizarLoja(PDO $conexao, int $id, string $nome):void
 {
     $sql = "UPDATE lojas SET nome = :nome WHERE id = :id";
     $consulta=$conexao->prepare($sql);
     $consulta->bindValue(":nome", $nome);
     $consulta->bindValue(":id", $id);
     $consulta->execute();
 }

function excluirLoja(PDO $conexao, int $id):void
{
    $sql = "DELETE FROM Lojas WHERE id = :id";
    $consulta = $conexao ->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();
} 