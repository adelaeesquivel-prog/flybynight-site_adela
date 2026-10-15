<?php
require_once "../src/loja_produto_crud.php";
require_once "../src/loja_crud.php";
require_once "../src/produto_crud.php";

$loja_id = $_GET['loja_id'] ;
$produto_id = $_GET['produto_id'] ;

if (!$loja_id || !$produto_id) {
    header("location:listar.php");
    exit;
}
$lojaproduto = buscarLojaProdutoPorId($conexao, $loja_id, $produto_id);

if (!$lojaproduto) {
    header("location:listar.php");
    exit;
}

$lojas = buscarLojas($conexao);
$produtos = buscarProdutos($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_loja= $_POST['nova_loja'];
    $novo_produto = $_POST['novo_produto'];
    $estoque = $_POST['estoque'];
    atualizarLojaProduto($conexao, $nova_loja, $novo_produto, $estoque);
    
    header("location:listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto em uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto em uma loja</h2>
        <form action="" method="post">

            <div>
                <label for="loja">Loja:</label>
                <select name="loja" id="loja" required>
                    <option value="">Selecione</option>
                    <?php foreach ($lojas as $loja): ?>
                        <option value="<?= $loja['id'] ?>"
                            <?= ($loja['id'] == $lojaproduto['loja_id']) ? 'selected' : '' ?>>
                            <?= $loja['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="produto">Produto:</label>
                <select name="produto" id="produto" required>
                   <option value="">Selecione</option>
                   <?php foreach ($produtos as $produto): ?>
                       <option value="<?= $produto['id'] ?>"
                        <?= ($produto['id'] == $lojaproduto['produto_id']) ? 'selected' : '' ?>>
                        <?= $produto['nome_produto'] ?>
                       </option>
                   <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" min="0" step="1" 
                       value="<?= $lojaproduto['estoque'] ?>" required>
            </div>

            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>