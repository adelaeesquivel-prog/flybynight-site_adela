<?php
require_once "../src/conecta.php";
require_once "../src/loja_produto_crud.php";

$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id']; 
excluirLojaProduto($conexao, $loja_id, $produto_id);
header ("location:listar.php");
exit;
?>