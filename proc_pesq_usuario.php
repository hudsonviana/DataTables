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
$sqlRegistro = "SELECT * FROM usuarios";
$resultRegistro = mysqli_query($conexao, $sqlRegistro);
$qtdeLinhasRegistro = mysqli_num_rows($resultRegistro);

//Ober tados a serem apresentados
$sqlTabela = "SELECT nome, profissao, nascimento, sexo, peso, altura, nacionalidade FROM usuarios WHERE 1=1";
$resultTabela = mysqli_query($conexao, $sqlTabela);
$qtdeLinhasTabela = mysqli_num_rows($resultTabela);

//Ordenar resultado
$sqlRegistro.= "ORDER BY " . $colunas[$requisicao['order'][0]['column']] . " " . $requisicao['order'][0]['dir'] . " LIMIT " . $requisicao['start'] . " ," . $requisicao['lenhth'] . " ";
$resultTabela = mysqli_query($conexao, $sqlTabela);