<?php

session_start();
?>


<?php

$nb = $_POST['nombre'];
$des = $_POST['descripcion'];
$vig = $_POST['vigente'];


include_once "../matrices/conexionsql.php";

	# code...
	mysql_query("call sp_Nivel_Guardar('".$nb."','".$des."','".$vig."')",$link);
	
	$_SESSION["guardadooknivel"] = "1";  
    header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
