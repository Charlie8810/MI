<?php
session_start();
?>
<?php

$idp = $_POST['idPerfil'];
$nb = $_POST['nombre'];
$des = $_POST['descripcion'];
$est = $_POST['vigente'];


include_once "../matrices/conexionsql.php";

	
	mysql_query("call sp_Perfil_Guardar('".$idp."','".$nb."','".$des."','".$est."')",$link);



$_SESSION["guardadookperfil"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
