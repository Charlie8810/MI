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
                                        class="form-control" readonly="readonly">
                                </div>
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
                                    <label for="nivel">
                                        Asociar</label>
                                        
                                        
                                    <table>
                                    	<tr>
                                    		<td>
                                    			<select multiple="multiple" name="alumnos_enrrolados" id="alumnos_enrrolados" class="selectpicker  form-control" data-style="btn-white"></select>
                                    		</td>
                                    		<td>
                                    			<button name="btn_Agregar_alumnos" > << </button>
                                    		</td>
                                    		<td>
                                    			<select multiple="multiple" name="alumnos_disponibles" id="alumnos_disponibles" class="selectpicker  form-control" data-style="btn-white"></select>
                                    		</td>
                                    	</tr>
                                    	
                                    </table>    
                                        
                                    
                                    
                                    
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
    </body>
</html>
