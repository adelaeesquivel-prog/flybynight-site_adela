<?php
// src/conecta.php
 
// parametros de conexão ao servidor mysql
$servidor = "localhost";
$banco = "flybynight_completo";
$usuario = "root";
$senha = "senacpenha";
 
/* usanos try para realizar as operações de conexao ao servidor */
try {
    //criando um objeto a partir da classe PDO definindo uma string de conexao
    // PDO é a classe de recursos para manipulaçao de banco de dados
    // PDO -> PHP Data Objects  
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );
 
    // Garantindo que erros/exceções serão lançadas/exibidas em qualquer falha na conexão
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Garantindo que resultados de operações SELECT sejam retornados como array associativo
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    // "Logar/registrar" o erro e exibir no terminal
    error_log($erro->getMessage());
 
    // Na interface pública, exibimos uma mensagem genérica para o usúario
    exit("Não foi possível conectar ao banco.");
}
 
/* // teste provisorio;
var_dump($conexao); */
 