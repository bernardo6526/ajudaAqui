<?php
require_once("../BLL/clinicaBLL.php");
$cBLL = new clinicaBLL();
if (isset($_POST['radiobtn']))
{
	$radiobtn = $_POST['radiobtn'];
	
	$cBLL->excluiAssistente($radiobtn);
}