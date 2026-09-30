<?php
// src/fornecedor_crud.php
 
// Todas as funções criadas neste arquivo precisarão do script de conexão
require_once "conecta.php";
 
// Forenecedores/listar.php
function buscarFornecedores(PDO $conexao): array {
     
    //Montando um comando SQL para a consulta
     $sql = "SELECT * FROM fornecedores ORDER BY nome";
   
    //Executando o comando e guardando o resultado da consulta
    $consulta = $conexao->query($sql);
 
    // Retornando o resultado como um array associativo
    return $consulta->fetchAll();
}
 
// Usada em fornecedores/inserir.php
function inserirFornecedor(PDO $conexao, string $nome): void {
    /* Sobre o recebimento de dados para o comando SQL no PDO, visando minimizar a chance de
    injeção de codigo SQL nocivo á partir de entradas de dados (no caso, formulario),
    devemos passar no comando SQL "parametros nomeados" (Named Parameters). Esse tipo
    de pratica permite receber de froma/segura controlada para a consulta Nunca passe os dados de
    forma direta */
 
    // passo 1: definir os ´parametros nomeados
    $sql = "INSERT INTO fornecedores (nome) VALUES (:nome)";
 
    // Passo 2: preparar o comando para a execução
    $consulta = $conexao->prepare($sql);
   
    // passo 3: colocar um valor no parametro
    $consulta->bindValue(":nome", $nome);
   
    // passo 4: executar a consulta no banco
    $consulta->execute();
}
 
 