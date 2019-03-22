<?php 
require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

$tratamento = array(".","-","/",")","(");

$id = $_GET['id'];
$nome = $_GET['nome'];
$cnpj = $_GET['cnpj'];
$telefone = $_GET['telefone'];
$cidade = $_GET['cidade'];
$bairro = $_GET['bairro'];
$logradouro = $_GET['logradouro'];
$complemento = $_GET['complemento'];
$numero = $_GET['numero'];
$uf = $_GET['uf'];
$cep = $_GET['cep'];
$nota = $_GET['nota'];

$sql = "UPDATE clinica SET nome = '$nome', cnpj = '$cnpj', telefone = '$telefone',
				cidade = '$cidade', Bairro = '$bairro', Logradouro = '$logradouro', complemento = '$complemento',
				numero = $numero, uf = '$uf', cep = $cep, nota = $nota WHERE id = $id";

				print_r($sql);

if (mysqli_query($bd->conexaobd, $sql)) {
	echo json_encode("ok");
}