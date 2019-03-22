<?php 
require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

$tratamento = array(".","-","/",")","(");

$id = $_GET['id'];
$nome = $_GET['nome'];
$cpf = $_GET['cpf'];
$email = $_GET['id'];
$nascimento = str_replace($tratamento, "", $_GET['nascimento']);
$rg = $_GET['rg'];
$telefone = $_GET['telefone'];
$cidade = $_GET['cidade'];
$bairro = $_GET['bairro'];
$logradouro = $_GET['logradouro'];
$complemento = $_GET['complemento'];
$numero = $_GET['numero'];
$uf = $_GET['uf'];
$cep = $_GET['cep'];
$certificado = $_GET['certificado'];
$tipo = $_GET['tipo'];

$sql = "UPDATE assistente SET nome = '$nome', cpf = '$cpf', email = '$email', nascimento = '$nascimento', rg = '$rg', 
				telefone = '$telefone', cidade = '$cidade', Bairro = '$bairro', certificado = '$certificado', tipo = '$tipo',
				Logradouro = '$logradouro', complemento = '$complemento', numero = '$numero', uf = '$uf', cep = '$cep' 
				WHERE id = $id";

				print_r($sql);

if (mysqli_query($bd->conexaobd, $sql)) {
	echo json_encode("ok");
}