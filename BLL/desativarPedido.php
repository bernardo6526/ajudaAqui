<?php

require_once("/../DAL/conexao.php");
$bd = new banco('ajudaaqui');

$idPedido = $_GET['idPedido'];
$idAssistente = $_GET['idAssistente'];
$valor = $_GET['valor'];

$sql = "UPDATE assistente SET status = 0 WHERE id = $idAssistente";
mysqli_query($bd->conexaobd, $sql);
$sql = "UPDATE pedido SET status = 2 WHERE id = $idPedido";
mysqli_query($bd->conexaobd, $sql);
$sql = "INSERT INTO pagamento(Pedido_id, valor_bruto, valor_liquido, imposto, Feedback_cliente_Cliente_ID) 
VALUES($idPedido, $valor, " . $valor*0.9 . ", " . $valor*0.1 . ", 3)";
mysqli_query($bd->conexaobd, $sql);

echo $sql;

echo "ok";