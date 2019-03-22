<?php

require_once("/../DAL/conexao.php");


function busca_cep($cep) {  
  $data = @file_get_contents("http://api.postmon.com.br/v1/cep/$cep?format=json");

  $obj = json_decode($data);
  return $obj;
}

$tratamento = array(".","-","/",")","(");

foreach ($_POST as $key => $value) {
	$key = $value;
}

session_start();

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$nascimento = str_replace($tratamento, "", $_POST['nascimento']);
$cpf = str_replace($tratamento, "", $_POST['cpf']);
$rg = str_replace($tratamento, "", $_POST['rg']);
$telefone = str_replace($tratamento, "", $_POST['telefone']);
$cep = str_replace($tratamento, "", $_POST['cep']);
$numero = $_POST['numero'];
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "" ;
$tipo = $_POST['tipo'];
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];
$nmroprof = $_POST['nmroprof'];
$tipo = $_POST['tipo'];

session_destroy();

$endereco = busca_cep($cep);
$bd = new banco("ajudaaqui");


if ($bd->conexaobd) {

	$sql = "INSERT INTO assistente VALUES(NULL, '$nome $sobrenome', '$cpf', '$email', '$nascimento',";
	$sql .= " '$rg', '$telefone','$endereco->cidade', '$endereco->bairro', '$endereco->logradouro',";
	$sql .= " '$complemento', '$numero', '$endereco->estado',$cep,$nmroprof,'$tipo',1,null,false)";
	
	if (mysqli_query($bd->conexaobd, $sql)) 
	{
		$fk = mysqli_insert_id($bd->conexaobd);  //Pegando id do insert pra salvar na tabela usuário
		$sql = "INSERT INTO usuario VALUES (NULL,'$login','$senha',2,$fk)";
		
		if (mysqli_query($bd->conexaobd, $sql)) {
			echo "ok";
		}
	}
}
