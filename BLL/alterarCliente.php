<?php 
require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

$tratamento = array(".","-","/",")","(");

$id = $_GET['id'];
$nome = $_GET['nome'];
$cpf = $_GET['cpf'];
$email = $_GET['email'];
$nascimento = str_replace($tratamento, "", $_GET['nascimento']);
$rg = $_GET['rg'];
$telefone = $_GET['telefone'];
$tipo_deficiencia = $_GET['tipo_deficiencia'];
$cidade = $_GET['cidade'];
$bairro = $_GET['bairro'];
$logradouro = $_GET['logradouro'];
$complemento = $_GET['complemento'];
$numero = $_GET['numero'];
$uf = $_GET['uf'];
$cep = $_GET['cep'];

$sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', email = '$email', nascimento = '$nascimento', rg = '$rg', 
				telefone = '$telefone', tipo_deficiencia = '$tipo_deficiencia', cidade = '$cidade', Bairro = '$bairro',
				Logradouro = '$logradouro', complemento = '$complemento', numero = '$numero', uf = '$uf', cep = '$cep' 
				WHERE id = $id";

if (mysqli_query($bd->conexaobd, $sql)) {
	echo json_encode("ok");
}