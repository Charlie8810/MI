<?php
session_start();
?>


<?php
$idEmpresa = $_POST["idEmpresa"];
$razonsocial = $_POST['razonsocial'];
$rut = str_replace(".","",$_POST['rut']);
$nombrecontacto = $_POST['nombrecontacto'];
$emailcontacto = $_POST['emailcontacto'];
$telefono = $_POST['telefono'];


include_once "../matrices/conexionsql.php";

mysql_query("call sp_Empresa_Guardar('".$idEmpresa."','".$emailcontacto."','".$nombrecontacto."','".$razonsocial."','".$rut."','".$telefono."')",$link);

$_SESSION["MantenedorEmpresaok"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);


?>
