<?php
session_start();
?>

<?php

$idCurso = $_POST['idCurso'];
$nombrecurso = $_POST['nombrecurso'];
$profesor = $_POST['profesor'];
$idioma= $_POST['idioma'];
$empresa= $_POST['empresa'];
$vigente= $_POST['vigente'];
$anio= $_POST['anio'];

include_once "../matrices/conexionsql.php";

mysql_query("call sp_Curso_Guardar('".$idCurso."','".$nombrecurso."','".$anio."','".$empresa."','".$idioma."','".$profesor."','".$vigente."')",$link);

$_SESSION["guardadookcursos"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);

?>
