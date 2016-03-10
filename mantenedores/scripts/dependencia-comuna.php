<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$comunas = new selects();
$comunas->code = $_GET["code"];
$comunas = $comunas->listarComunas();
/*foreach($comunas as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}*/

echo json_encode(array("comunas"=>$comunas));


?>