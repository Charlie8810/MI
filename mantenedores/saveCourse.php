<?php



$namecourse = $_POST['namecourse'];
$teacher = $_POST['teacher'];
$language= $_POST['language'];
$level= $_POST['level'];
$enterprise= $_POST['enterprise'];
$available= $_POST['available'];
$year= $_POST['year'];

include_once "../matrices/conexionsql.php";

mysql_query("insert into Cursos (Nombre_Curso, IdProfesor, IdNivel, IdIdioma, IdEmpresa, Vigente, AñoInicio) values ('$namecourse',$teacher,$level,$language,$enterprise,$available,$year);");

mysql_close($link);

?>
