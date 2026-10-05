<?php
//produtos/inserir.php
require_once "../src/fornecedor_crud.php";
require_once "../src/produto_crud.php";

//Buscando a lista  de fornecedores ja existentes
//isso é necessario para o campo de seleçãode fornecedores no formulario
$fornecedores = buscarFornecedores($conexao);

//Exercicio:

//1)Detectar o acionamento do formulario de inserção
//2)Capturar os dados do formulario
//3)chamar a funcao inserir e passar os dados para ela
//4)Redirecionar para a pagina q mostra os produtos
//5)cadastre pelo menos 3 produtos (invente os dados)

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $nome = $_POST ['nome'];
    $descricao = $_POST ['descricao'];
    $preco = $_POST ['preco'];
    $quantidade = $_POST ['quantidade'];
    $fornecedor_id = $_POST ['fornecedor'];
    inserirProduto($conexao, $nome, $descricao, $preco, $quantidade,$fornecedor_id);
    header("location:listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Cadastrar produto</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <form action="" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="5"></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" min="0" step="0.01" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" step="1" required>
            </div>
            <div>
                <label for="fornecedor">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" required>
                    <option value=""></option>

                    <?php foreach ($fornecedores as $fornecedor):?>
                      <option value="<?= $fornecedor['id']?>">
                              <?= $fornecedor['nome']?>
                      </option>
                    <?php endforeach?>

                   
                </select>
            </div>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>