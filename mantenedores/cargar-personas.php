<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$personas= $selects->cargarPersonas();
foreach($personas as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>