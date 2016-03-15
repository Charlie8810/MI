<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$profesores = $selects->listarProfesores();


echo json_encode(array("profesores"=>$profesores));
?>