<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$regiones = $selects->listarRegiones();
//foreach($regiones as $key=>$value)
//{
//		echo "<option value=\"$key\">$value</option>";
//}

//print_r($regiones);

echo json_encode(array("regiones"=>$regiones));
?>