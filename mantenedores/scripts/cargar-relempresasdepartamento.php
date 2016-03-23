<?php
include("clases/class.mysql.php");

include("clases/class.data.relacionempresadepto.php");

$RelacionEmpresaDepartamento = new RelacionEmpresaDepartamento();
$relaciones = $RelacionEmpresaDepartamento->RelacionEmpresaDepartamentoParaCursos();


echo json_encode(array("relaciones"=>$relaciones));
?>