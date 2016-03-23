<?php
session_start();
?>
<?php


$iddep = $_POST['IdDepartamento'];
$nb = $_POST['nombre'];
$vig = $_POST['vigente'];


include_once "../matrices/conexionsql.php";

	
mysql_query("call sp_Departamento_Guardar('".$iddep."','".$nb."','".$vig."')",$link);



$_SESSION["guardadookdepartamento"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
