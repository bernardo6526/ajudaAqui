<?php

require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

// $nota = $_GET['nota'];
$idPedido = $_GET['idPedido'];
// $idCliente = $_GET['idCliente'];
// $idAssistente = $_GET['idAssistente'];
// $NotaAssistente = $_GET['NotaAssistente'];

// if($NotaAssistente != "")
// {
	// $nota = ($nota + $NotaAssistente)/2
// }

// $sql = "UPDATE assistente SET nota = $nota WHERE assistente.id = $idAssistente";
// mysqli_query($bd->conexaobd, $sql);


$sql = "UPDATE pedido SET status = 4 WHERE id = '$idPedido'";
mysqli_query($bd->conexaobd, $sql);



echo "ok";