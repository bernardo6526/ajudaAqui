<?php

$cep = str_replace("-", "", $_GET['cep']);
$resultado = @file_get_contents("http://api.postmon.com.br/v1/cep/$cep?format=json");

if (!$resultado) {
	echo json_encode(false);
}
else {
	echo json_encode(true);
}


