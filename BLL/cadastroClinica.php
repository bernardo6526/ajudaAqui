<?php

require_once("/../DAL/conexao.php");


function busca_cep($cep) {  
  $data = @file_get_contents("http://api.postmon.com.br/v1/cep/$cep?format=json");

  $obj = json_decode($data);
  return $obj;
}

$tratamento = array(".","-","/",")","("," ");

foreach ($_POST as $key => $value) {
	$key = $value;
}

session_start();

$nome = $_POST['nome'];
$cnpj = str_replace($tratamento, "", $_POST['cnpj']);
$telefone = str_replace($tratamento, "", $_POST['telefone']);
$cep = str_replace($tratamento, "", $_POST['cep']);
$numero = $_POST['numero'];
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "" ;
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];

session_destroy();


$endereco = busca_cep($cep);
$bd = new banco("ajudaaqui");


if ($bd->conexaobd) {

	$sql = "INSERT INTO clinica VALUES(NULL, '$nome', '$cnpj', '$telefone', '$endereco->cidade', '$endereco->bairro',";
	$sql .= " '$endereco->logradouro', '$complemento','$numero', '$endereco->estado', '$cep',null)";

	if (mysqli_query($bd->conexaobd, $sql)) 
	{
		$fk = mysqli_insert_id($bd->conexaobd);  //Pegando id do insert pra salvar na tabela usuário
		$sql = "INSERT INTO usuario VALUES (NULL,'$login','$senha',1,$fk)";

		if (mysqli_query($bd->conexaobd, $sql)) {
			echo "ok";
		}

	}
}