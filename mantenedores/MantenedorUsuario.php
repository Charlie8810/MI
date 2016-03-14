<?php 
session_start(); 
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
		<script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <?php include("../matrices/js.php");?>
    <script src="../assets/js/modernizr.min.js"></script>
	<link href="../assets/jquery/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
	<script src="../assets/jquery/bootstrap-dialog.min.js"></script>

	<script>
	$(document).ready(function(){ 
	
	$('#formlogin').submit(function(){
		
		if($("#pass").val() != $("#repContrasena").val())
		{
			BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Contraseñas no iguales',
					message: '<h5>Las contrasenas no coinciden!</h5>',
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
		
		if($("#persona").val() == '0')
		{
			BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Mensaje de Validación',
					message: '<h5>Debe seleccionar un usuario</h5>',
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
	
	
					<?php if(isset($_SESSION["guardadooklogin"])){ ?>
				BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Guardado Correcto',
					message: '<h5>Usuario guardado correctamente!</h5>',
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
			<?php unset($_SESSION["guardadooklogin"]); } ?>
		
	});
	
	
	</script>

	
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        
        <?php include("../matrices/topbaradministrador.php");?>

        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        
        <?php include("../matrices/left-side-menuadministrador.php");?>

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
                                Mantenedores de Usuario</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b></h4>
                                <form action="registroUsuario.php" id="formlogin" method="POST" data-parsley-validate novalidate>
                                   <script type="text/javascript">
									$(document).ready(function(){
                                        
										/*Cargar personas */
										$.getJSON("scripts/cargar-persona.php",function(json){
											$.each(json.personas,function(i,persona){
													$('#persona').append("<option value=\"" + persona.code + "\">" + persona.name + "</option>")
											});
										});
                                    });

                                </script>
                                <div class="form-group">
                                    <label for="userName">
                                        Persona</label>
                                    <select name="persona" id="persona" class="selectpicker  form-control" data-style="btn-white">
									<option value="0">- - Seleccione - - </option>
                                      
                                    </select>

                                    <label for="userName">
                                        Login</label>
                                    <input type="text" name="login" parsley-trigger="change" required placeholder="Ingresar Nombre login"
                                        class="form-control" id="login">
                                </div>
								
                                <div class="form-group">
                                    <label for="userName">
                                        Contraseña</label>
                                    <input type="password" name="pass" parsley-trigger="change" required placeholder="Ingresar contraseña"
                                        class="form-control" id="pass">
                                </div> 
								
								<div class="form-group">
                                    <label for="userName">
                                        Repetir Contraseña</label>
                                    <input type="password" name="repContrasena" parsley-trigger="change" required placeholder="Repetir Contraseña"
                                        class="form-control" id="repContrasena">
                                </div> 

								   <div class="form-group">
                                    <label for="userName">
                                        Estado</label>
                                    <select name="estado" class="selectpicker  form-control" data-style="btn-white" id="estado">
                                        <option value="1" >Activo</option>
                                        <option value="2" >No Activo</option>
                                    </select>
                                </div>
								
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Guardar
                                    </button>
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
        <!-- 
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
 -->
    </div>
    <!-- END wrapper -->

	
</body>
</html>
