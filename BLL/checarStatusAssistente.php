<?php

require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

$idAssistente = $_GET['idAssistente'];

$sql = "SELECT status FROM assistente WHERE id = $idAssistente";
$data = mysqli_query($bd->conexaobd, $sql);

$resultado = mysqli_fetch_object($data);

if ($resultado->status == true) {
	echo "ok";
}
