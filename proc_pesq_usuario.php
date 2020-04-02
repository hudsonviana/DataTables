<?php

//Conexão com o banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$baseDados = 'cadastrodatatables';

$conexao = mysqli_connect($servidor, $usuario, $senha, $baseDados);

//Receber a requisição da pesquisa
$requisicao = $_REQUEST;

//Índice da coluna na tabela
$colunas = [
    ['0' => 'nome'],
    ['1' => 'profissao'],
    ['2' => 'nascimento'],
    ['3' => 'sexo'],
    ['4' => 'peso'],
    ['5' => 'altura'],
    ['6' => 'nacionalidade']
];

//Obter registros de número total sem qualquer pesquisa
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao, $sql);
$qtdeLinhas = mysqli_num_rows($resultado);