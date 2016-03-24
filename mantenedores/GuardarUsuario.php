<?php
session_start();
?>


<?php

session_start();

$nombres = $_POST['nombres'];
$apellidop = $_POST['apellidop'];
$apellidom = $_POST['apellidom'];
$rut = str_replace(".","",$_POST['rut']);
$email = $_POST['email'];
$idperfil = $_POST['idperfil'];
$idEstado = $_POST['idestado'];
$direccion = $_POST['direccion'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];

include_once "../matrices/conexionsql.php";

mysql_query("call sp_Persona_Guardar('".$apellidom."','".$apellidop."','".$celular."','".$direccion."','".$email."','".$comuna."','".$idEstado."','".$idperfil."','".$region."','".$nombres."','".$rut."','".$telefono."')",$link);

$_SESSION["guardadookpersona"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);


?>
