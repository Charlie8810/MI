<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$estados = $selects->listarEstados();


echo json_encode(array("estados"=>$estados));
?>