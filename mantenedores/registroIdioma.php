<?php

session_start();
?>

<?php

$ididio = $_POST['id_Idioma'];
$nb = $_POST['nombre'];
$des = $_POST['descripcion'];
$vig = $_POST['vigente'];


include_once "../matrices/conexionsql.php";


mysql_query("call sp_Idioma_Guardar('".$ididio."','".$nb."','".$des."','".$vig."')",$link);


$_SESSION["guardadookidioma"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
