<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$idiomas = $selects->listarIdiomas();


echo json_encode(array("idiomas"=>$idiomas));
?>