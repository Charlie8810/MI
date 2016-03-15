<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$niveles = $selects->listarNiveles();


echo json_encode(array("niveles"=>$niveles));
?>