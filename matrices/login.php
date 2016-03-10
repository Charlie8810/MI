<?php

session_start();
include_once "conexionsql.php";

function verificar_login($user,$password,&$result) {
    $sql = "SELECT * FROM Usuario WHERE Login = '$user' and Contrasena = '$password'";
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

    if(isset($_POST['login']))
    {

        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            $_SESSION['idPersona'] = $result->idPersona;



            $res = "SELECT Perfil.Nombre FROM Usuario
                         inner join Persona on Persona.IdPersona = Usuario.idPersona
                         inner join Perfil on Persona.IdPerfil = Perfil.IdPerfil
                         where Usuario.Login = '{$_POST['user']}';";
            

            $rec1 = mysql_query($res);
            
            $rows = mysql_fetch_array($rec1);

            echo $rows['Nombre'];

            if($rows['Nombre'] == 'SuperAdministrador' || $rows['Nombre'] == 'Administrador')
            {
                header("location: ../mantenedores/panelControl.php");
            }
            else if($rows['Nombre'] == 'Alumno' || $rows['Nombre'] == 'Profesor')
            {
                header("location:../Nivel_1.php");
            }
            else
            {
                header("location:Nivel_1.php");
            }            
        }
        else
        {
            header('location :localhost/mi/login.php');
        }
    }

} else {
    echo 'Your username entry correctly.';
    echo '<a href="logout.php">Logout</a>';
    echo  $result;
}

?>