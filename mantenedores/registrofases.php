<?php
session_start();
?>
<?php


$IdFase = $_POST['idFases'];
$vigente = $_POST['vigente'];
$relcursoniv = $_POST['relcursoniv'];
$nombre = $_POST['nombre'];


include_once "../matrices/conexionsql.php";

	mysql_query("call sp_Fases_Guardar('".$IdFase."','".$vigente."','".$relcursoniv."','".$nombre."')",$link);


$_SESSION["guardadookfase"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);



mysql_close($link);
?>
