<?php
session_start();
?>
<?php

$nb = $_POST['nombre'];
$des = $_POST['descripcion'];
$est = $_POST['estado'];


include_once "../matrices/conexionsql.php";

	
	mysql_query("call sp_Perfil_Guardar('".$nb."','".$des."','".$est."')",$link);



$_SESSION["guardadookperfil"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
