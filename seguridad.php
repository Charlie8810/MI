<?php

if(!isset($_SESSION['datosusuario']))
{
	$_SESSION["error_login"] = 1;
    header('location: /mi/login.php');
}


?>