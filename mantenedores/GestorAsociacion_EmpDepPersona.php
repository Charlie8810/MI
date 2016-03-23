<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.relacionempresadeptopersona.php");
	include("scripts/clases/class.combos.php");
		
	$idRelacion = isset($_REQUEST["rel"]) ? $_REQUEST["rel"] : false;	
	$data = new RelacionEmpresaDepartamentoPersona();	
		
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
				  $data = new RelacionEmpresaDepartamentoPersona(); 
				if($idRelacion){ 
					$relacionempresa = $data->listarRelacionEmpresaDepartamentoPorId($idRelacion);
			?>
			
			$("#nombreRelacion").html('<?php echo $relacionempresa->Empresa ." - " .$relacionempresa->Departamento;  ?>');
						
			<?php } ?>
    	
    	
    	
		
			<?php if(isset($_SESSION["asociacionpersona_ok"])){ ?>
				BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Enrrolamiento Correcto',
					message: '<h5>Personas enrroladas correctamente!</h5>',
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
			<?php unset($_SESSION["asociacionpersona_ok"]); } ?>
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
                            <h4 class="page-title">Mantenedor Relacion Empresa Departamento Persona</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box" style="height: 450px;">
                                <h4 class="m-t-0 header-title">
                                    <b id="nombreRelacion" name="nombreRelacion"></b>
                                </h4>
                                <form id="frmasoc" action="guardar_asociacion_empresadepartamentopersona.php" data-parsley-validate novalidate method="post">
                                			
                                <div class="col-lg-5">
                                	<div class="form-group">
                                    	<label for="nivel">Personas Enrrolados</label>
                               			<select id="slEnrrolados" name="slEnrrolados[]" multiple="multiple" size="15" class="selectpicker  form-control" data-style="btn-white">
                               				<?php foreach($data->listarPersonasEnrrolados($idRelacion) as $enrrolados):?>
                               					<option value="<?php echo $enrrolados->IdPersona;?>"><?php echo $enrrolados->NombreCompleto;?></option>
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
                                    	<label for="nivel">Personas Disponibles</label>
                               			<select id="slDesEnrrolados" multiple="multiple" size="15" class="selectpicker  form-control" data-style="btn-white">
                               				<?php foreach($data->listarPersonasNoEnrrolados($idRelacion) as $noEnrrolados):?>
                               					<option value="<?php echo $noEnrrolados->IdPersona;?>"><?php echo $noEnrrolados->NombreCompleto;?></option>
                               				<?php endforeach;?>
                               			</select>
                                	</div>	
                                </div>			
                                			

                                <div class="form-group text-right m-b-0">
                                	<a href="ListarRelacionEmpresaDepartamento.php" class="btn btn-primary waves-effect waves-light">Volver al Listado</a>
                                    <button class="btn btn-primary waves-effect waves-light" type="button" id="btnSubmit">
                                        Guardar
                                    </button>
                                    <input type="hidden" name="idRelacion" id="idRelacion" value="<?php echo $idRelacion ?>" />
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
