<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$personas = $selects->cargarPersonas();


echo json_encode(array("personas"=>$personas));
?>