<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$perfiles = $selects->listarPerfiles();


echo json_encode(array("perfiles"=>$perfiles));
?>