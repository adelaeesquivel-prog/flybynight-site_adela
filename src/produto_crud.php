<?php
// src/produto_crud.php

require_once "conecta.php";

function buscarProdutos(PDO $conexao):array
{
    $sql = "SELECT 
    -- tabela.coluna AS apelido
    -- especialmente para colunas com o mesmo nome
    produtos.nome AS produto, 
    produtos.preco, 
    fornecedores.nome AS fornecedor
FROM produtos

-- Fazendo a junção (JOIN) entre as tabelas
-- Neste caso, produtos com fornecedores
INNER JOIN fornecedores

-- Definindo a condição de CRUZAMENTO entre as tabelas
    ON produtos.fornecedor_id = fornecedores.id;";
    $consulta = $conexao->query($sql);
    return $consulta ->fetchAll();
}