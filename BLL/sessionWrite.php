<?php
session_start();

foreach ($_GET as $key => $value) {
	$_SESSION[$key]	 = $value;
}

if (isset($_SESSION)) {
	echo 'ok';
}