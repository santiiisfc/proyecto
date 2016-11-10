
<?php
session_start();

	session_destroy();

	header('Location: index.php');
	exit;
include_once("./db_configuration.php");

?>




