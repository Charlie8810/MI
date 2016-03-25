<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.php");
	include("scripts/clases/class.combos.php");
	include("scripts/clases/class.data.curso.php");
		
	$idCurso = isset($_REQUEST["c"]) ? $_REQUEST["c"] : false;	
	$data = new Data();	
		
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
    	
    	$('#frmasoc').submit(function(){
		
		if($("#nivel").val() ==0)
		{
			BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Mensaje de Validacion',
					message: '<h5>Debe seleccionar un nivel</h5>',
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
    	/*Javascript aca*/
    	
    	$("#btn_enrrolar").click(function(){
    		return !$('#slDesEnrrolados option:selected').remove().appendTo('#slEnrrolados');
    	});
    	
    	$("#btn_desenrrolar").click(function(){
    		return !$('#slEnrrolados option:selected').remove().appendTo('#slDesEnrrolados');
    	});
    	
    	
    	$("#btnSubmit").click(function(){
    		$('#slEnrrolados option').prop('selected', 'selected');
    		$("#frmasoc").submit();
    	});
    	
		
		    <?php 
				  $data = new Curso(); 
				if($idCurso){ 
					$curso = $data->obtenerCurso($idCurso);
			?>
			
			$("#nombreRelacion").html('<?php echo $curso->Nombre_Curso  ?>');
						
			<?php } ?>
    	
    	
		
	<?php if(isset($_SESSION["asociacion_ok"])){ ?>
	    BootstrapDialog.show({
			title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Enrrolamiento Correcto',
			message: '<h5>Alumnos enrrolados en curso correctamente!</h5>',
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
			<?php unset($_SESSION["asociacion_ok"]); } ?>
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
                            <h4 class="page-title">Mantenedor Relacion Cursos nivel Persona</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box" style="height: 450px;">
                                <h4 class="m-t-0 header-title">
                                    <b id="nombreRelacion" name="nombreRelacion"></b>
                                </h4>
                                <form id="frmasoc" action="guardar_asociacion_cursoalumno.php" data-parsley-validate novalidate method="post">
                                		
									<script type="text/javascript">
                                    $(document).ready(function(){
                                        
										/*Cargar Niveles */
										$.getJSON("scripts/cargar-nivel.php",function(json){
											$.each(json.niveles,function(i,nivel){
													$('#nivel').append("<option value=\"" + nivel.code + "\">" + nivel.name + "</option>")
											});
										});
									});

                                </script>

										
								<div class="form-group">
                                    <label for="nivel">
                                        Nivel*</label>
                                    <select class="selectpicker  form-control" data-style="btn-white" id="nivel" name="nivel">
                                        <option value="0">- - Seleccione - - </option>
                                    </select>
                                </div>			
											
                                <div class="col-lg-5">
                                	<div class="form-group">
                                    	<label for="nivel">Alumnos Enrrolados</label>
                               			<select id="slEnrrolados" name="slEnrrolados[]" multiple="multiple" size="15" class="selectpicker  form-control" data-style="btn-white">
                               				<?php $data = new Data();  
											foreach($data->listarAlumnosEnrrolados($idCurso) as $enrrolados):?>
                               					<option value="<?php echo $enrrolados->IdPersona;?>"><?php echo $enrrolados->Rut.", ".$enrrolados->NombreCompleto;?></option>
                               				<?php endforeach;?>
                               			</select>
                                	</div>
                                </div>			
                                <div class="col-lg-2">
                                	<div class="form-group" style="height: 20px;">
	                                </div>
                                	
	                                <div class="form-group">
	                                    <button id="btn_enrrolar" style="width: 100%;" class="btn btn-primary waves-effect waves-light" type="button"> < Enrrolar </button>
	                                </div>	
	                                <div class="form-group">
	                                    <button id="btn_desenrrolar" style="width: 100%;" class="btn btn-primary waves-effect waves-light" type="button"> Desenrrolar > </button>
	                                </div>	
	                                
                                </div>			
                                <div class="col-lg-5">
                                	<div class="form-group">
                                    	<label for="nivel">Alumnos Disponibles</label>
                               			<select id="slDesEnrrolados" multiple="multiple" size="15" class="selectpicker  form-control" data-style="btn-white">
                               				<?php  $data = new Data(); 
											foreach($data->listarAlumnosNoEnrrolados($idCurso) as $noEnrrolados):?>
                               					<option value="<?php echo $noEnrrolados->IdPersona;?>"><?php echo $noEnrrolados->Rut.", ".$noEnrrolados->NombreCompleto;?></option>
                               				<?php endforeach;?>
                               			</select>
                                	</div>	
                                </div>			
                                			

                                <div class="form-group text-right m-b-0">
                                	<a href="ListadoCursos.php" class="btn btn-primary waves-effect waves-light">Volver al Listado</a>
                                    <button class="btn btn-primary waves-effect waves-light" type="button" id="btnSubmit">
                                        Guardar
                                    </button>
                                    <input type="hidden" name="idCurso" id="idCurso" value="<?php echo $idCurso ?>" />
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
