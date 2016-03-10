<?php

session_start();

$nombres = $_POST['nombres'];
$apellidop = $_POST['apellidop'];
$apellidom = $_POST['apellidom'];
$rut = $_POST['rut'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$idperfil = $_POST['idperfil'];
$direccion = $_POST['direccion'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];

include_once "../matrices/conexionsql.php";

//esto sirve para el evento textchange
$rut1 = mysql_query("select Rut from Persona where Rut like '$rut';");

$rows = mysql_fetch_array($rut1);
echo $rows['Rut'];

mysql_query("insert into Persona (Nombres,ApellidoPaterno,ApellidoMaterno,Rut,Email,IdPerfil,Direccion,IDRegion,IdComuna,Telefono,Celular)
VALUES('$nombres','$apellidop','$apellidom','$rut','$email',$idperfil,'$direccion',$region,$comuna,'$telefono','$celular');",$link);

mysql_close($link);


$_SESSION["resultado"] = "1";

header("Location: " . $_SERVER["HTTP_REFERER"]);



?>
