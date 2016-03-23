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
	
	$('#formrelacion').submit(function(){
		
		if($("#empresa").val() == '0')
		{
			BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Contraseñas no iguales',
					message: '<h5>Debe seleccionar una empresa</h5>',
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
	
	
	
		
	<?php if(isset($_SESSION["mantenedorempresadeptook"])){ ?>
	    BootstrapDialog.show({
			title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Guardado Correcto',
			message: '<h5>Relacion guardada correctamente!</h5>',
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
			<?php unset($_SESSION["mantenedorempresadeptook"]); } ?>
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
                            <h4 class="page-title">Relacion Empresa Departamento</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b>
                                </h4>
                                <form action="GuardarCurso.php" id="formrelacion" data-parsley-validate novalidate method="post">
                                <div class="form-group">
                                    <label for="empresa">
                                        Empresa</label>
                                    <select name="empresa" id="empresa" class="selectpicker  form-control" data-style="btn-white">
                                        <option value="0" >- - Seleccione - - </option>    
                                    </select>
                                </div>
								<script type="text/javascript">
                                    $(document).ready(function(){
										
										/*Cargar Empresas */
										$.getJSON("scripts/cargar-empresas.php",function(json){
											$.each(json.empresas,function(i,empresa){
													$('#empresa').append("<option value=\"" + empresa.code + "\">" + empresa.name + "</option>")
											});
										});
									});

                                </script>
								
								<div class="form-group">
                                    <label for="nivel">
                                        Asociar</label>
                                    <table>
                                    	<tr>
                                    		<td>
                                    			<select multiple="multiple" name="departamento_enrrolados" id="departamento_enrrolados" class="selectpicker  form-control" data-style="btn-white"></select>
                                    		</td>
                                    		<td>
                                    			<button name="btn_Agregar_alumnos" > << </button>
                                    		</td>
                                    		<td>
                                    			<select multiple="multiple" name="departamento_disponibles" id="departamento_disponibles" class="selectpicker  form-control" data-style="btn-white"></select>
                                    		</td>
                                    	</tr>
                                    	
                                    </table>    
                                </div>	
									
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Guardar
                                    </button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="ListarEmpresa.php">
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
    </div>
    <!-- END wrapper -->
    </body>
</html>
