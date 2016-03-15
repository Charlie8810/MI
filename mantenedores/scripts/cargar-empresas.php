<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$empresas = $selects->listarEmpresas();


echo json_encode(array("empresas"=>$empresas));
?>