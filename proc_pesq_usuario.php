<?php

//Conexão com o banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$baseDados = 'cadastrodatatables';

$conexao = mysqli_connect($servidor, $usuario, $senha, $baseDados);

//Receber a requisição da pesquisa
$requestData = $_REQUEST;

//Índice da coluna na tabela
$columns = array(
    0 => 'nome',
    1 => 'profissao',
    2 => 'nascimento',
    3 => 'sexo',
    4 => 'peso',
    5 => 'altura',
    6 => 'nacionalidade'
);

//Obter registros de número total sem qualquer pesquisa
$result_user = "SELECT nome, profissao, nascimento, sexo, peso, altura, nacionalidade FROM usuarios";
$resultado_user = mysqli_query($conexao, $result_user);
$qtde_linhas = mysqli_num_rows($resultado_user);

//Ober tados a serem apresentados
$result_usuarios = "SELECT nome, profissao, nascimento, sexo, peso, altura, nacionalidade FROM usuarios WHERE 1=1";
$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);

//Ordenar resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios = mysqli_query($conexao, $result_usuarios);

//Ler e criar o array de dados
$dados = array();

while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)) {
    $dado = array();
    $dado[] = utf8_encode($row_usuarios['nome']);
    $dado[] = utf8_encode($row_usuarios['profissao']);
    $dado[] = $row_usuarios['nascimento'];
    $dado[] = $row_usuarios['sexo'];
    $dado[] = $row_usuarios['peso'];
    $dado[] = $row_usuarios['altura'];
    $dado[] = utf8_encode($row_usuarios['nacionalidade']);

    $dados[] = $dado;
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
    "draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($qtde_linhas), //quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($$totalFiltered), //total de registros quando houver pesquisa
    "data" => $dados //array de dados completo dos ddos retornados da tabela
);

//echo json_encode($json_data); //enviar dados no formato json
print_r($json_data);