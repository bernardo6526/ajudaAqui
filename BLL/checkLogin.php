<?php

require_once("/../DAL/conexao.php");

$bd = new banco("ajudaaqui");
$login = $_GET['login'];

$sql = "SELECT login FROM usuario WHERE login = '$login'";
$conn = mysqli_query($bd->conexaobd, $sql);

if (mysqli_num_rows($conn) != 0) {
	echo json_encode(false);
}
else {
	echo json_encode(true);
}
