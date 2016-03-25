<?php
	session_start();
    include("scripts/clases/class.mysql.php");
    include("scripts/clases/class.data.persona.php");

    /* verificar si sirve*/
    require "../matrices/conexionsql.php";
    if (isset($_GET['rut'])) {
        $sql = "SELECT Rut FROM persona where Rut like '".$_GET['rut']."';";
        $rec = mysql_query($sql);
        $count = 0;
        while($row = mysql_fetch_object($rec)){
            $count++;
            $result = $row;
            print_r((array) $result);
        }
    }       
   
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
    <link href="../assets/jquery/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
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
    <script src="js/jquery.Rut.js" type="text/javascript"></script>
	<script src="../assets/jquery/bootstrap-dialog.min.js"></script>
	<script src="../assets/js/modernizr.min.js"></script>
	    <link href="../assets/jquery/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/jquery/bootstrap-dialog.min.js"></script>
    <script type="text/javascript">
		
		$(document).ready(function(){
			

			
            <?php 
			   
			    $idPersona = '8';
			
                    $data = new Persona(); 
                    if($idPersona){ 
                        $persona = $data->obtenerPersona($idPersona);
            ?>

                $("#rut").val('<?php echo $persona->Rut; ?>');
                $("#nombres").val('<?php echo $persona->Nombres; ?>');
                $("#apellidop").val('<?php echo $persona->ApellidoP; ?>');
                $("#apellidom").val('<?php echo $persona->ApellidoM; ?>');
                $("#email").val('<?php echo $persona->Email; ?>');
                $("#direccion").val('<?php echo $persona->Direccion; ?>');
                $("#telefono").val('<?php echo $persona->Telefono; ?>');
                $("#celular").val('<?php echo $persona->Celular; ?>');
                                        
                $("#region").val('<?php echo $persona->Region; ?>');

                        
                            
            <?php } ?>
            

			$("#rut").Rut();
			$("#rut").blur(function(){
				
				if($.Rut.validar($(this).val())){
					$.getJSON("scripts/cargar-usuario-persona.php",{vrut:$(this).val()},function(json){
						var p = json.persona;
						
						if(p.IdEstado > 0)
						{
						$("#nombres").val(p.Nombres);
						$("#apellidop").val(p.ApellidoPaterno);
						$("#apellidom").val(p.ApellidoMaterno);
						$("#email").val(p.Email);
						$("#direccion").val(p.Direccion);
						$("#telefono").val(p.Telefono);
						$("#celular").val(p.Celular);
						
						$("#region").val(p.IdRegion).trigger("change", [p.IdComuna]);
						}
					
					});
					if($(this).hasClass("parsley-error")){
						$(this).removeClass("parsley-error");
					}
				}
				else
				{
					BootstrapDialog.show({
						title: '<span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Alerta',
						message: '<h5>Rut ingresado es incorrecto</h5>',
						closable: true,
						draggable: true,
						buttons: [{
							label: 'Aceptar',
							action: function(dialogItself){
								dialogItself.close();
							}
						}],
						type: BootstrapDialog.TYPE_WARNING,
						size: BootstrapDialog.SIZE_SMALL
					});
					$(this).val("");
					$(this).addClass("parsley-error");
				}
			
            });

		});

		
$(document).ready(function(){ 

$('#form1').submit(function(){
		
		if($("#region").val() == '' || $("#region").val() == '0' )
		{
			BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Mensaje de Validacion',
					message: '<h5>Debe seleccionar una region</h5>',
					closable: true,
					draggable: true,
					buttons: [{
						label: 'Ok',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					type: BootstrapDialog.TYPE_WARNING,
					size: BootstrapDialog.SIZE_SMALL
				});
			return false;
		}
		
		if($("#comuna").val() == '' ||$("#comuna").val() == '0')
		{
			BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Mensaje de Validacion',
					message: '<h5>Debe seleccionar una comuna</h5>',
					closable: true,
					draggable: true,
					buttons: [{
						label: 'Ok',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					type: BootstrapDialog.TYPE_WARNING,
					size: BootstrapDialog.SIZE_SMALL
				});
			return false;
		}
		
				
		
	})
		
	<?php if(isset($_SESSION["guardadookpersonabasic"])){ ?>
	    BootstrapDialog.show({
			title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Guardado Correcto',
			message: '<h5>Usuario modificado correctamente!</h5>',
			closable: true,
		    draggable: true,
			buttons: [{
				label: 'Ok',
				action: function(dialogItself){
				dialogItself.close();
			     	}
					}],
				type: BootstrapDialog.TYPE_SUCCESS,
					size: BootstrapDialog.SIZE_SMALL
				});
			<?php unset($_SESSION["guardadookpersonabasic"]); } ?>
	});
		
		
    </script>
    
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        
        <?php include("../matrices/topbar.php");?>

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
                                Modificación de Usuario</h4>
                            <ol class="breadcrumb">
                                <li><a href="/mi/Nivel_1.php">Inicio</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b></h4>

                                <!--Formulario de Registro de Usuarios-->
                                <form name="form1" id="form1" action="/mi/mantenedores/GuardarUsuarioBasic.php" method="post" data-parsley-validate novalidate>
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
                                    <label for="emailAddress">
                                        Email*</label>
                                    <input type="email" name="email" parsley-trigger="change" required placeholder="Ingresar Email"
                                        class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="userName">
                                        Dirección*</label>
                                    <input type="text" name="direccion" parsley-trigger="change" required placeholder="Ingresar Dirección"
                                        class="form-control" id="direccion">
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        
										/*Cargar Regiones */
										$.getJSON("scripts/cargar-regiones.php",function(json){
											$.each(json.regiones,function(i,region){
													$('#region').append("<option value=\"" + region.code + "\">" + region.name + "</option>")
											});
										});
										
										/*Cargar comunas de region seleccionada*/
                                        $("#region").change(function(event, idComuna){
											/*Limpio el html que esta dentro del select*/
											$('#comuna').html("");
											$('#comuna').append("<option value=\"\"> --Seleccione-- </option>")											
											$.getJSON("scripts/dependencia-comuna.php",{code:$(this).val()},function(json){
												$.each(json.comunas,function(i,comuna){
													if(typeof idComuna != "undefined")	
													{
														var selected = (idComuna == comuna.code) ? "selected=\"selected\"" : "";
														$('#comuna').append("<option value=\"" + comuna.code + "\" "+selected+">" + comuna.name + "</option>");
													}
													else
													{
														$('#comuna').append("<option value=\"" + comuna.code + "\">" + comuna.name + "</option>");
													}
												});
											});
										});									
                                        
                                    });

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
                                    <input type="phone" name="telefono" parsley-trigger="change"  placeholder="Ingresar Teléfono de Contacto"
                                        class="form-control" id="telefono">
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        Celular*</label>
                                    <input type="phone" name="celular" parsley-trigger="change"  placeholder="Ingresar Teléfono de Contacto"
                                        class="form-control" id="celular">
                                </div>
                                <div class="form-group text-right m-b-0">
                                    <button type="submit" id="btnGuardar" class="btn btn-primary waves-effect waves-light" name="action" value="Guardar" onCilick ="ValidarFormulario(this.form.comuna)">
                                        Guardar
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                function validarformulario()
                                                { 
                                                 if (form1.comuna.selectedIndex==0) {
                                                 alert("SELECIONE COMUNA");
                                                 form1.comuna.select();
                                                 return false;
                                                 }
                                            }
                                        </script>

                                    </button>
                                    <a class="btn btn-default waves-effect waves-light m-l-5" href="ListadoPersonas.php">
                                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Volver
                                    </a>
									
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
	<script src="../assets/js/jquery.app.js"></script>		
	
</body>
</html>
