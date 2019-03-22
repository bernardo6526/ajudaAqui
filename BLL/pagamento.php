<?php

require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

$idPedido = $_GET['idPedido'];
$idCliente = $_GET['idCliente'];

$sql = "INSERT INTO pagamento(pedido_id,valor_bruto,valor_liquido,imposto,feedback_cliente_cliente_id) 
		VALUES ($idPedido,20,18,10,$idCliente)";
mysqli_query($bd->conexaobd, $sql);

$sql = "UPDATE pedido SET status = 3 WHERE id = $idPedido";
mysqli_query($bd->conexaobd, $sql);


echo "ok";