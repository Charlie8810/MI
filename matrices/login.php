<?php

session_start();
include_once "conexionsql.php";




function verificar_login($user,$password,&$result) {
	
	$p = md5($password);
    $sql = "SELECT * FROM usuario WHERE Login = '$user' and Contrasena = '$p'";
    $rec = mysql_query($sql);
    $count = 0;
	
    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

if(!isset($_SESSION['userid']))
{

    if(isset($_POST['user']))
    {
		$username = $_POST['user'];
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            $_SESSION['idPersona'] = $result->idPersona;
			$_SESSION['datosusuario']	= $result;


            $res = "SELECT perfil.Nombre FROM usuario
                         inner join persona on persona.IdPersona = usuario.idPersona
                         inner join perfil on persona.IdPerfil = perfil.IdPerfil
                         where usuario.Login = '".$username."';";
            

            $rec1 = mysql_query($res);
            
            $rows = mysql_fetch_array($rec1);

      

            if($rows['Nombre'] == 'SuperAdministrador' || $rows['Nombre'] == 'Administrador')
            {
                header("location: ../mantenedores/panelControl.php");
            }
            else if($rows['Nombre'] == 'Alumno' || $rows['Nombre'] == 'Profesor')
            {
                header("location: ../bandejaAlumno.php");
            }
            else
            {
                header("location: bandejaAlumno.php");
            }            
        }
        else
        {
			$_SESSION["error_login"] = 1;
            header('location: /mi/login.php');
        }
    }

} else {
    echo 'Your username entry correctly.';
    echo '<a href="logout.php">Logout</a>';
    echo  $result;
}

?>