<?php
include("clases/class.mysql.php");
include("clases/class.data.fases.php");
$Fases = new Fases();
$relacion = $Fases->cargarRelacion();


echo json_encode(array("relacion"=>$relacion));
?>