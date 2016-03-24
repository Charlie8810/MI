<?php
session_start();
?>
<?php


$ide = $_POST['IdEstado'];
$nb = $_POST['nombre'];
$des = $_POST['descripcion'];


include_once "../matrices/conexionsql.php";

	mysql_query("call sp_Estado_Guardar('".$ide."','".$nb."','".$des."')",$link);


$_SESSION["guardadookstate"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);



mysql_close($link);
?>
