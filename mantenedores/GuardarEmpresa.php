<?php
session_start();
?>


<?php

$razonsocial = $_POST['razonsocial'];
$direccion = $_POST['direccion'];
$rut = str_replace(".","",$_POST['rut']);
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$nombrecontacto = $_POST['nombrecontacto'];
$emailcontacto = $_POST['emailcontacto'];
$telefono = $_POST['telefono'];


include_once "../matrices/conexionsql.php";

mysql_query("call sp_Empresa_Guardar('".$direccion."','".$emailcontacto."','".$comuna."','".$region."','".$nombrecontacto."','".$razonsocial."','".$rut."','".$telefono."')",$link);

$_SESSION["guardadookempresa"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);


?>
