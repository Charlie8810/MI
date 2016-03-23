<?php
include("clases/class.mysql.php");
include("clases/class.data.departamento.php");
$Departamento = new Departamento();
$departamentos = $Departamento->listarDepartamento();


echo json_encode(array("departamentos"=>$departamentos));
?>