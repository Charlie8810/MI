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
	<?php include("../matrices/js.php");?>
    <title>MI - MCM Interactive Learning</title>
	    <script>
        var resizefunc = [];
    </script>
    <?php include("../matrices/css.php");?>
    <script src="../assets/js/modernizr.min.js"></script>
	<link href="../assets/jquery/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    <script src="../assets/jquery/bootstrap-dialog.min.js"></script>
	
	<script type="text/javascript">	
	
    $(document).ready(function(){ 
		
	<?php if(isset($_SESSION["guardadookcursos"])){ ?>
	    BootstrapDialog.show({
			title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Guardado Correcto',
			message: '<h5>Cursos guardados correctamente!</h5>',
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
			<?php unset($_SESSION["guardadookcursos"]); } ?>
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
                            <h4 class="page-title">Mantenedor de Cursos</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b>
                                </h4>
                                <form action="GuardarCurso.php" data-parsley-validate novalidate method="post">
                                <div class="form-group">
                                    <label for="nombrecurso">
                                        Nombre Curso</label>
                                    <input type="text" name="nombrecurso" id="nombrecurso" parsley-trigger="change" required placeholder="Ingresar Nombre Curso"
                                        class="form-control">
                                </div>
								<script type="text/javascript">
                                    $(document).ready(function(){
                                        									
										/*Cargar empresas */
										$.getJSON("scripts/cargar-empresas.php",function(json){
											$.each(json.empresas,function(i,empresa){
													$('#empresa').append("<option value=\"" + empresa.code + "\">" + empresa.name + "</option>")
											});
										});
										
										/*Cargar Profesor */
										$.getJSON("scripts/cargar-profesor.php",function(json){
											$.each(json.profesores,function(i,profesor){
													$('#profesor').append("<option value=\"" + profesor.code + "\">" + profesor.name + "</option>")
											});
										});
										
										/*Cargar Nivel */
										$.getJSON("scripts/cargar-nivel.php",function(json){
											$.each(json.niveles,function(i,nivel){
													$('#nivel').append("<option value=\"" + nivel.code + "\">" + nivel.name + "</option>")
											});
										});
										
										/*Cargar Idioma */
										$.getJSON("scripts/cargar-idioma.php",function(json){
											$.each(json.idiomas,function(i,idioma){
													$('#idioma').append("<option value=\"" + idioma.code + "\">" + idioma.name + "</option>")
											});
										});
										
                                        
                                    });

                                </script>
								
								
                                <div class="form-group">
                                    <label for="profesor">
                                        Profesor</label>
                                    <select name="profesor" id="profesor" class="selectpicker  form-control" data-style="btn-white">
                                        <option value="0" >- - Seleccione - - </option>    
                                    </select>
                                </div>

								<div class="form-group">
                                    <label for="nivel">
                                        Nivel</label>
                                    <select name="nivel" id="nivel" class="selectpicker  form-control" data-style="btn-white">
                                        <option value="0">- - Seleccione - - </option>
                                    </select>
                                </div>

								<div class="form-group">
                                    <label for="idioma">
                                        Idioma</label>
                                    <select name="idioma" id="idioma" class="selectpicker  form-control" data-style="btn-white">
                                        <option value="0">- - Seleccione - - </option>
                                    </select>
                                </div>								
								
                                <div class="form-group">
                                    <label for="empresa">
                                        Empresa</label>
                                    <select name="empresa" id="empresa" class="selectpicker  form-control" data-style="btn-white">
                                        <option value="0" >- - Seleccione - - </option>
                                    </select>
                                </div>					
								
                                <div class="form-group">
                                    <label for="vigente">
                                        Vigente</label>
                                    <select name="vigente" id="vigente" class="selectpicker  form-control" data-style="btn-white">
                                        <option value="1">Si</option>
                                        <option value="0">No</option>										
                                    </select>
                                </div>	

                                <div class="form-group">
                                    <label  for="anio">
                                        Año Inicio</label>
                                    <input type="text" name="anio" id="anio" parsley-trigger="change" required placeholder="Ingresar Año de Inicio"
                                        class="form-control" >
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
    </div>
    <!-- END wrapper -->
    <script src="../assets/js/jquery.app.js"></script>
    </body>
</html>
