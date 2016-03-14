<?php

session_start();
?>
<?php

$nb = $_POST['persona'];
$usr = $_POST['login'];
$pass = $_POST['pass'];
$est = $_POST['estado'];

$p = md5($pass);

include_once "../matrices/conexionsql.php";


//mysql_query("insert into usuario (idPersona, Login, Contrasena, Estado) values ('$nb','$usr','$pass','$est')");
	# code...
	 mysql_query("call sp_Usuario_Guardar('".$nb."','".$usr."','".$p."','".$est."')",$link);
	
$_SESSION["guardadooklogin"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);






mysql_close($link);
?>
