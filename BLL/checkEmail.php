<?php

require_once("/../DAL/conexao.php");

$bd = new banco("ajudaaqui");
$email = $_GET['email'];
$tabela = $_GET['tabela'];

$sql = "SELECT email FROM $tabela WHERE email = '$email'";
$conn = mysqli_query($bd->conexaobd, $sql);

if (mysqli_num_rows($conn) != 0) {
	echo json_encode(false);
}
else {
	echo json_encode(true);
}
