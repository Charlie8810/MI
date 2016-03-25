<?php

	$user = $_POST['usuario'];


	
	if($user == 1)
	{
		header("location: ../ListadoPersonas.php");
	}
	else if ($user == 2)
	{
		header("location: ../ListadoEmpresa.php");
	}



?>