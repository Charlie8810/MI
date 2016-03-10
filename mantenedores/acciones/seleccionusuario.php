<?php

	$user = $_POST['usuario'];


	
	if($user == 1)
	{
		header("location: ../registroUsuarios_Persona.php");
	}
	else if ($user == 2)
	{
		header("location: ../registroUsuarios_Empresa.php");
	}else
	{
		header("location: ../registroUsuarios.php");
	}



?>