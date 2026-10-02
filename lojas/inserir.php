<?php
require_once "../src/loja_crud.php";
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $nome = $_POST ['nome'];
    inserirLojas($conexao, $nome);
    header("location:listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Cadastrar loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <form action="" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>