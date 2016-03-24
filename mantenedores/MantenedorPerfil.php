<?php 
session_start(); 
include("scripts/clases/class.mysql.php");
include("scripts/clases/class.data.perfil.php");

$idPefil = isset($_REQUEST["p"]) ? $_REQUEST["p"] : false;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <link rel="shortcut icon" href="assets/images/favicon.png">
	<?php include("../matrices/js.php");?>
    <title>MI - MCM Interactive Learning</title>
    <?php include("../matrices/css.php");?>
    <script>
        var resizefunc = [];
    </script>

    <script src="../assets/js/modernizr.min.js"></script>
    <link href="../assets/jquery/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/jquery/bootstrap-dialog.min.js"></script>

     <script>
	$(document).ready(function(){ 
		
	<?php if(isset($_SESSION["guardadookperfil"])){ ?>
	    BootstrapDialog.show({
			title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Guardado Correcto',
			message: '<h5>Perfil guardado correctamente!</h5>',
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
			<?php unset($_SESSION["guardadookperfil"]); } ?>
	
	
    <?php $perfil = null;
          $data = new Perfil(); 
        if($idPefil){ 
            $perfil = $data->obtenerPerfil($idPefil);
    ?>
    
    $("#nombre").val('<?php echo $perfil->Nombre; ?>');
    $("#descripcion").val('<?php echo $perfil->Descripcion; ?>');
    $("#vigente").val('<?php echo $perfil->Vigente; ?>');
	$("#idPerfil").val('<?php echo $perfil->IdPerfil; ?>');
                
    <?php } ?>
            
            
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
                                Mantenedores de Perfil</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b></h4>
                                <form action="registroPerfil.php" method="POST" data-parsley-validate novalidate>
                                <div class="form-group">
                                    <label for="userName">
                                        Nombre</label>
                                    <input type="text" name="nombre" parsley-trigger="change" required placeholder=" Nombre del Tipo de Perfil "
                                        class="form-control" id="nombre">
                                </div>
								
                                <div class="form-group">
                                    <label for="userName">
                                        Descripción</label>
                                    <input type="text" name="descripcion" parsley-trigger="change" required placeholder="Breve Descripcion del Perfil"
                                        class="form-control" id="descripcion">
                                </div>  
                                
                                <div class="form-group">
                                    <label for="userName">
                                        Vigente*</label>
                                    <select class="selectpicker  form-control" data-style="btn-white" id="vigente" name="vigente">
                                        <option Value = "1" > SI </option>
                                        <option Value = "0" > NO </option>
                                        
                                        
                                    </select>
                                </div>       
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Guardar
                                    </button>
                                    <a class="btn btn-default waves-effect waves-light m-l-5" href="ListarPerfil.php">
                                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Volver
                                    </a>
									 <input type="hidden" name="idPerfil" id="idPerfil" value="" />
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
     <!-- jQuery  -->
     <script src="../assets/js/jquery.app.js"></script>
    </body>
</html>
