<?php
	session_start();
    require "../matrices/conexionsql.php";
    if (isset($_GET['rut'])) {
        $sql = "SELECT Rut FROM Persona where Rut like '".$_GET['rut']."';";
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec)){
            $count++;
            $result = $row;
            print_r((array) $result);
        }
    }
    /*$sql = "SELECT Rut FROM Persona where Rut like '".$_GET['rut']."';";
    //$sql->bindParam(":Rut", $_GET['rut']);
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec)){
            $count++;
            $result = $row;
            print_r((array) $result);
        }*/
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>MI - MCM Interactive Learning</title>
    <?php include("../matrices/css.php");?>
    <script src="../assets/js/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script src="js/jquery.Rut.js" type="text/javascript"></script>
    <script type="text/javascript">
        function buscar()
        {
            var opcion = document.getElementById("rut").value;
            
            if(document.getElementById("rut").value.length >= 1){
                window.location.href = "http://localhost/mi/mantenedores/registroUsuarios_Persona.php?Rut="+opcion;
            }
        }
		
		$(document).ready(function(){
			$("#rut").blur(function(){
				$.getJSON("scripts/cargar-usuario-persona.php",{vrut:$(this).val()},function(json){
					var p = json.persona;
					
					$("#nombres").val(p.Nombres);
					$("#apellidop").val(p.ApellidoPaterno);
					$("#apellidom").val(p.ApellidoMaterno);
					$("#usuario").val(p.Nombres);

				});
			});
		});
		
		
		<?php 
		if(isset($_SESSION["resultado"]))
		{
				echo 'alert("Guardado con exito")';
				unset($_SESSION["resultado"]);
		}
		
		?>
		
		
    </script>
    
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        
        <?php include("../matrices/topbaradministrador.php");?>

        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        
        <?php include("../matrices/left-side-menu.php");?>

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">
                                Registro de Usuarios</h4>
                            <ol class="breadcrumb">
                                <li><a href="/mi/Nivel_1.php">Inicio</a></li>
                                <li><a href="/mi/mantenedores/registroUsuarios.php" >Gestor de Usuarios</a></li>
                                <li class="active">Registro de Usuarios</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b></h4>

                                <!--Formulario de Registro de Usuarios-->
                                <form action="GuardarUsuario.php" method="post" data-parsley-validate novalidate>
                                <div class="form-group">
                                    <label for="rut" >RUT*</label>
                                    <input type="text" id="rut" name="rut" parsley-trigger="change" required placeholder="ej. 11.111.111-1"
                                           class="form-control"/>                           
                                </div>
                                <div class="form-group">
                                    <label for="nombres">
                                        Nombres*</label>
                                    <input type="text" name="nombres" parsley-trigger="change" required placeholder="Ingresar Nombres"
                                        class="form-control" id="nombres">
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Apellido Paterno*</label>
                                    <input type="text" name="apellidop" parsley-trigger="change" required placeholder="Ingresar Apellido Paterno"
                                        class="form-control" id="apellidop">
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Apellido Materno*</label>
                                    <input type="text" name="apellidom" parsley-trigger="change" required placeholder="Ingresar Apellido Materno"
                                        class="form-control" id="apellidom">
                                </div>
                                

                                <div class="form-group">
                                    <label for="userName">
                                        Nombre de Usuario*</label>
                                    <input type="text" name="usuario" parsley-trigger="change" placeholder="Ingresar Nombre de Usuario"
                                        class="form-control" id="usuario">
                                </div>
                                <div class="form-group">
                                    <label for="emailAddress">
                                        Email*</label>
                                    <input type="email" name="email" parsley-trigger="change" placeholder="Ingresar Email"
                                        class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="pass1">
                                        Contraseña*</label>
                                    <input id="pass1" name="pass" type="password" placeholder="Ingresar Contraseña" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="passWord2">
                                        Confirmar Contraseña*</label>
                                    <input data-parsley-equalto="#pass1" type="password" placeholder="Ingresar Confirmación de Contraseña"
                                        class="form-control" id="passWord2">
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Enviar Contraseña a este Usuario*</label>
                                    <select class="selectpicker  form-control" data-style="btn-white">
                                        <option value="0">- - Seleccione - - </option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Tipo de Usuario*</label>
                                    <select id="idperfil" name="idperfil" class="selectpicker  form-control" data-style="btn-white">
                                        <option >- - Seleccione - - </option>
                                        <option value="1">Super Administrador</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Alumno</option>
                                        <option value="4">Profesor</option>                                        
                                        <option value="5">Demo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Curso Idioma*</label>
                                    <select class="selectpicker form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <option>Inglés</option>
                                        <option>Portugués</option>
                                        <option>Español</option>
                                        <option>Francés</option>
                                        <option>Alemán</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Categoría*</label>
                                    <select class="selectpicker form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <option>Básico</option>
                                        <option>Medio</option>
                                        <option>Avanzado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Dirección*</label>
                                    <input type="text" name="direccion" parsley-trigger="change" required placeholder="Ingresar Dirección"
                                        class="form-control" id="Text5">
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        
										/*Cargar Regones */
										$.getJSON("scripts/cargar-regiones.php",function(json){
											$.each(json.regiones,function(i,region){
													$('#region').append("<option value=\"" + region.code + "\">" + region.name + "</option>")
											});
										});
										
										/*Cargar comunas de region seleccionada*/
                                        $("#region").change(function(){
											/*Limpio el html que esta dentro del select*/
											$('#comuna').html("");
											$('#comuna').append("<option value=\"\"> --Seleccione-- </option>")											
											$.getJSON("scripts/dependencia-comuna.php",{code:$(this).val()},function(json){
												$.each(json.comunas,function(i,comuna){
														$('#comuna').append("<option value=\"" + comuna.code + "\">" + comuna.name + "</option>");
												});
											});
										});
										
										
										
                                        //$("#comuna").attr("disabled",true);
                                    });

                                    function cargar_regiones()
                                    {
                                        $.get("scripts/cargar-regiones.php", function(resultado){
                                            if(resultado == false)
                                            {
                                                alert("Error");
                                            }
                                            else
                                            {
                                                $('#region').append(resultado);           
                                            }
                                        }); 
                                    }
                                    function dependencia_comuna()
                                    {
										
                                        var code = $("#region").val();
                                        $.get("scripts/dependencia-comuna.php", { code: code },
                                            function(resultado)
                                            {
                                                if(resultado == false)
                                                {
                                                    alert("Error");
                                                }
                                                else
                                                {
                                                    $("#comuna").attr("disabled",false);
                                                    document.getElementById("comuna").options.length=1;
                                                    $('#comuna').append(resultado);         
                                                }
                                            }

                                        );
                                    }
                                </script>
                                <div class="form-group">
                                    <label for="userName">
                                        Región*</label>
                                    <select class="selectpicker  form-control" data-style="btn-white" id="region" name="region">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Comuna*</label>
                                    <select class="selectpicker  form-control" data-style="btn-white" id="comuna" name="comuna">
                                        <option value="0">- - Seleccione - - </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        Teléfono*</label>
                                    <input type="phone" name="telefono" parsley-trigger="change" required placeholder="Ingresar Teléfono de Contacto"
                                        class="form-control" id="telefono">
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        Celular*</label>
                                    <input type="phone" name="celular" parsley-trigger="change" required placeholder="Ingresar Teléfono de Contacto"
                                        class="form-control" id="celular">
                                </div>
                                <div class="form-group text-right m-b-0">
                                    <button type="submit" id="btnGuardar" class="btn btn-primary waves-effect waves-light" name="action" value="Guardar">
                                        Guardar
                                    </button>
									

                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Cancelar
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Otros Datos</b></h4>
                                <form class="form-horizontal" role="form" data-parsley-validate novalidate>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">
                                        Fecha Registro</label>
                                    <div class="col-sm-7">
                                        <input type="url" required parsley-type="url" class="form-control" id="Url1" placeholder="01/06/2015">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">
                                        Fecha Última Visita</label>
                                    <div class="col-sm-7">
                                        <input type="url" required parsley-type="url" class="form-control" id="Url2" placeholder="16/01/2016">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">
                                        ID Usuario</label>
                                    <div class="col-sm-7">
                                        <input type="url" required parsley-type="url" class="form-control" id="Url3" placeholder="45">
                                    </div>
                                </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include("../matrices/footer.php");?>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <div class="side-bar right-bar nicescroll">
            <h4 class="text-center">
                Chat</h4>
            <div class="contact-list nicescroll">
                <ul class="list-group contacts-list">
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-1.jpg" alt="">
                        </div>
                        <span class="name">Chadengle</span> <i class="fa fa-circle online"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-2.jpg" alt="">
                        </div>
                        <span class="name">Tomaslau</span> <i class="fa fa-circle online"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-3.jpg" alt="">
                        </div>
                        <span class="name">Stillnotdavid</span> <i class="fa fa-circle online"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-4.jpg" alt="">
                        </div>
                        <span class="name">Kurafire</span> <i class="fa fa-circle online"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-5.jpg" alt="">
                        </div>
                        <span class="name">Shahedk</span> <i class="fa fa-circle away"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-6.jpg" alt="">
                        </div>
                        <span class="name">Adhamdannaway</span> <i class="fa fa-circle away"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-7.jpg" alt="">
                        </div>
                        <span class="name">Ok</span> <i class="fa fa-circle away"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-8.jpg" alt="">
                        </div>
                        <span class="name">Arashasghari</span> <i class="fa fa-circle offline"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-9.jpg" alt="">
                        </div>
                        <span class="name">Joshaustin</span> <i class="fa fa-circle offline"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-10.jpg" alt="">
                        </div>
                        <span class="name">Sortino</span> <i class="fa fa-circle offline"></i></a><span class="clearfix">
                        </span></li>
                </ul>
            </div>
        </div>
        <!-- /Right-bar -->
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <?php include("../matrices/js.php");?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>				
	
</body>
</html>
