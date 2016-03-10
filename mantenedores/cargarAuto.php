<?php

require "../matrices/conexionsql.php";

if(isset($_GET['opcion'])){
   
    
}

$sql = "SELECT Rut FROM Persona";
$rec = mysql_query($sql);
$count = 0;
while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
        print_r((array) $result);

    }
?>
<html>
    <head>
        <title>Auto Llenar un formulario</title>
        <meta charset="utf-8"/>
        <script type="text/javascript">
            function buscar()
            {
                var opcion = document.getElementById("Rut").value;
                
                window.location.href = "http://localhost/mi/mantenedores/cargarAuto.php?opcion="+opcion;
            }
        </script>
    </head>
    <body>
        <form>
            <fieldset>
                <legend>Datos de Usuario</legend>
                <label>Seleccione el nombre del cliente</label>
                <select name="Rut" id="Rut" onchange="return buscar();">
                    <option value="Nada"></option>
                    <?php
                    
                        foreach($result as $key =>$value){?>
                        <option value="<?php echo $value;?>"><?php echo $value;?></option>
                    <?php
                        
                    }
                    
                    ?>
                </select>
                
                <label>Correo:</label>
                <input type="text" name="email" value=""/>
                <label>País:</label>
                <input type="text" name="country" value=""/>
                <label>Ciudad:</label>
                <input type="text" name="city" value=""/>
                <input type="submit" value="Enviar"/>
            </fieldset>
        </form>
    </body>
</html>
    