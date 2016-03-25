<?php 
session_start(); 
include("scripts/clases/class.mysql.php");
include("scripts/clases/class.data.php");
include("scripts/clases/class.combos.php");
include("scripts/clases/class.data.fases.php");
include("scripts/clases/class.data.Ejercicios.php");

$idEjercicio = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
 <!--   <link rel="shortcut icon" href="../assets/images/favicon_1.ico">-->
    <title>MI - MCM Interactive Learning</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/jquery/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/plugins/parsleyjs/dist/parsley.min.js"></script>

	<script src="../assets/jquery/bootstrap-dialog.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			var indice = 0;
			
			$("#btnAgregar").click(function(){
				var tipo_ejercicio = $("#tipo_ejercicio").val();
				if(tipo_ejercicio == "3")
				{
					var nuevapre = $("#dvPB1").clone(true);
					nuevapre.find("input").val("");
					$("#dvPrgs").append(nuevapre);	
				}
				else if(tipo_ejercicio == "4")
				{
					var nuevapre = $($(".audio_clonar")[0]).clone(true);
					$(".dvRespuestasAudio").append(nuevapre);	
				}
				else if(tipo_ejercicio == "5")
				{
					var nuevapre = $($(".foto_clonar")[0]).clone(true);
					$(".dvRespuestasFoto").append(nuevapre);
					
				}
				else //if(tipo_ejercicio == "1" || tipo_ejercicio == "2")
				{
					var nuevapre = $("#dvP1").clone(true);
					$("#dvPrgs").append(nuevapre);					
				}
				
				
			});
			
			$("#tipo_ejercicio").change(function(){
				
				if($(this).val() == "1" || $(this).val() == "2")
				{
					$("#dvP1").fadeIn("fast");
					$("#dvPB1").fadeOut("fast");
					$("#dvPBAudio").fadeOut("fast");
					$("#dvPBFoto").fadeOut("fast");
					$("#btnAgregar").fadeIn("fast");
					
				}
				else if($(this).val() == "3")
				{
					$("#dvP1").fadeOut("fast");
					$("#dvPB1").fadeIn("fast");
					$("#dvPBAudio").fadeOut("fast");
					$("#dvPBFoto").fadeOut("fast");
					$("#btnAgregar").fadeIn("fast");
				}
				else if($(this).val() == "4")
				{
					$("#dvP1").fadeOut("fast");
					$("#dvPB1").fadeOut("fast");
					$("#dvPBAudio").fadeIn("fast");
					$("#dvPBFoto").fadeOut("fast");
					$("#btnAgregar").fadeIn("fast");
				}
				else if($(this).val() == "5")
				{
					$("#dvP1").fadeOut("fast");
					$("#dvPB1").fadeOut("fast");
					$("#dvPBAudio").fadeOut("fast");
					$("#dvPBFoto").fadeIn("fast");
					$("#btnAgregar").fadeIn("fast");
				}
				else if($(this).val() == "6" || $(this).val() == "7" || $(this).val() == "8")
				{
					$("#dvP1").fadeIn("fast");
					$("#dvPB1").fadeOut("fast");
					$("#dvPBAudio").fadeOut("fast");
					$("#dvPBFoto").fadeOut("fast");
					$("#btnAgregar").fadeOut("fast");
				}
				
			});
			
			
			$(".btAgregarRespuetaAudio").click(function(){
				$(".dvRespuestasAudio").append("<br/><input type=\"text\" name=\"respuestas_audio[]\" class=\"resp_audio\" style=\"width: 350px; margin-bottom: 3px;\" />");
			});
			
			
			<?php if(isset($_SESSION["cuestionariook"])){ ?>
				BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Guardado Correcto',
					message: '<h5>Ejercicio guardado correctamente!</h5>',
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
			<?php unset($_SESSION["cuestionariook"]); } ?>
			
			
			<?php $ejercicio = null;
				  $data = new Data();	
				if($idEjercicio){ 
					$ejercicio = $data->obtenerEjercicio($idEjercicio);
			?>
			
			$("#nombre_ejercicio").val('<?php echo $ejercicio->Nombre; ?>');
			$("#curso").val('<?php echo $ejercicio->IdCurso; ?>');
			$("#fase").val('<?php echo $ejercicio->IdFase; ?>');
			$("#tipo_ejercicio").val('<?php echo $ejercicio->IdTipo; ?>');
						
			<?php } ?>
			
		});
		
		function eliminar_audio(elm)
		{	
			/*var elmArray = $("#dvRespuestasAudio > button.btEliminarAudioCurrent");
			var rspArray = $("#dvRespuestasAudio > input.resp_audio");
			var idx = $(elm).attr("indice");
			
			$(rspArray[idx + 1]).remove();
			$(elmArray[idx]).remove();*/
			
		}
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
                                Gestor de Ejercicios</h4>
                            <ol class="breadcrumb">
                                <li><a href="/mi/mantenedores/panelControl.php">Inicio</a></li>
                                <li class="active">Registro de Cursos / Ejercicios</li>
                            </ol>
							
                        </div>
						
                    </div>
                    <div class="row">
						
                        <div class="col-lg-12">
                            <div class="card-box">
                                <form action="acciones/procesa_cuestionarios.php" method="post" action="#" enctype="multipart/form-data" data-parsley-validate novalidate>
		

									<div class="form-group">
										<label for="nombre_ejercicio">
											Nombre*</label>
										<input type="text" name="nombre_ejercicio" id="nombre_ejercicio" class="input  form-control" />
									</div>
		
									<div class="form-group" style="display:none;">
										<label for="curso">
											Curso*</label>
										<select class="selectpicker  form-control" data-style="btn-white" id="curso" name="curso">
											<option>- - Seleccione - - </option>
											<?php 
											$selects = new selects();
											$couses = $selects->listarCursos();
											foreach($couses as $cu)
											{
												echo '<option value="'.$cu->IdCurso.'">'.$cu->Nombre.'</option>';
											}
										 ?>
										</select>
									</div>
									
									<div class="form-group">
										<label for="userName">
											Fase*</label>
										<select class="selectpicker  form-control" data-style="btn-white" id="fase" name="fase">
											<option>- - Seleccione - - </option>
											<?php 
											$fase = new Fases();
											$fases = $fase->listarFases();
											foreach($fases as $fa)
											{
												echo '<option value="'.$fa->Id_Fase.'">'.$fa->Nombre.'</option>';
											}
										 ?>
											
										</select>
									</div>
									
									<div class="form-group">
										<label for="userName">
											Tipo*</label>
										<select class="selectpicker  form-control" data-style="btn-white" id="tipo_ejercicio" name="tipo_ejercicio">
											<option>- - Seleccione - - </option>
											<?php foreach($data->listarTiposEjercicios() as $tpe):?>
											<option value="<?php echo $tpe->IdTipoEjercicio; ?>"><?php echo $tpe->Nombre; ?></option>
											<?php endforeach;?>

										</select>
									</div>
									
									<div id="dvPrgs">
										<h4 class="m-t-0 header-title">
										<b>Preguntas</b></h4>
										
										
										<?php if($idEjercicio && $ejercicio != null)
										{ 
											if($ejercicio->IdTipo == 3){ 
											$terminospareados = $data->obtenerTerminosPareadosPorEjercicioGestor($idEjercicio);
										?>
											<?php 
											
											if(count($terminospareados) > 0):
											
											foreach($terminospareados as $terminopareado): ?>
											<div id="dvPB1">
												<div class="form-group">
													<label for="P1">
														Termino paredo*</label>
													<pre>
														<input type="text" style="width:45%;" name="izquierda[]" id="PI1" class="input" value="<?php echo $terminopareado->TextoIzquierda; ?>" /> ::: <input type="text" style="width:45%;" name="derecha[]" id="PD1" class="input" value="<?php echo $terminopareado->TextoDerecha; ?>" />
													</pre>
												</div>
											</div>
											<?php endforeach; 
											
											else: ?>
												<div id="dvPB1">
													<div class="form-group">
														<label for="P1">
															Termino pareado*</label>
														<pre>
															<input type="text" style="width:45%;" name="izquierda[]" id="PI1" class="input" /> ::: <input type="text" style="width:45%;" name="derecha[]" id="PD1" class="input" />
														</pre>
													</div>
												</div>
											
											<?php endif; ?>
										<?php }
										
										else if($ejercicio->IdTipo == 4){
												
											$exercise = new Ejercicios();
											$audiopreg = $exercise->obtenerAudioPreguntaPorEjercicio($idEjercicio);
										
										?>	
											
										<div id="dvPBAudio">
											<div class="form-group">
												<label for="P1">
													Orden Audio*</label>
												<div>
													
													<div><audio id="question_player" src="<?php echo $audiopreg->RutaAudio; ?>" type="audio/mp3" controls="controls">	
													</div>
													
													<input type="file" class="tm_audio" name="tm_audio" />
													
													<h6>Respuestas</h6>
													
													<div class="dvRespuestasAudio" style="margin-bottom: 5px;">
														<div>
															<div class="col-lg-6">
																<p>Respuetas</p> 	
															</div>
															<div class="col-lg-6">
																<p>Texto posterior</p> 	
															</div>	
														</div>
														<?php foreach($audiopreg->Respuestas as $rsp): ?>
														<div class="audio_clonar">
															<div class="col-lg-6">
																<input type="text" name="respuestas_audio[]" class="resp_audio" style="width: 95%; margin-bottom: 3px;" value="<?php echo $rsp->TextoResupestaAudio; ?>" /> 	
															</div>
															<div class="col-lg-6">
																<input type="text" name="apoyo_audio[]" class="apoy_audio" style="width: 95%; margin-bottom: 3px;" value="<?php echo $rsp->TextoApolloRespuestaAudio; ?>" /> 	
															</div>
														</div>
														<?php endforeach;?>
													</div>
												</div>
											</div>
										</div>	
										
											
										<?php		
										
										
										}
										else if($ejercicio->IdTipo == 5)
										{
												
											$exercise = new Ejercicios();
											$audiopreg = $exercise->obtenerFotoPreguntaPorEjercicio($idEjercicio);
											
											
										
										?>
										
										
										<div id="dvPBFoto">
											<div class="form-group">
												<label for="P1">
													Orden Imagen*</label>
												<div>
													
													<div>
														<img src="<?php echo $ap->RutaFoto; ?>" alt="" />	
													</div>
													
													<input type="file" class="tm_foto" name="tm_foto" />
													
													<h6>Respuestas</h6>
													
													<div class="dvRespuestasFoto">
														<div>
															<div class="col-lg-6">
																<p>Respuetas</p> 	
															</div>
															<div class="col-lg-6">
																<p>Texto posterior</p> 	
															</div>	
														</div>
														<?php foreach($audiopreg->Respuestas as $rsp): ?>
														<div class="foto_clonar">
															<div class="col-lg-6">
																<input type="text" name="respuestas_imagen[]" class="respuestas_imagen" value="<?php echo $rsp->TextoResupestaFoto; ?>" /> 	
															</div>
															<div class="col-lg-6">
																<input type="text" name="apoyo_imagen[]" class="apoyo_imagen" value="<?php echo $rsp->TextoApolloRespuestaFoto; ?>" /> 	
															</div>
														</div>
														<?php endforeach;?>
													</div>
												</div>
											</div>
										</div>	
										
										<?php
											
										}else{  
											$preguntas = $data->obtenerGrupoPreguntasPorEjercicioGestor($idEjercicio);
										?>
											<?php 
											
											if(count($preguntas) > 0):
											foreach($preguntas as $pregunta): ?>
												<div id="dvP1">
													<div class="form-group">
														<label for="P1">
															Pregunta*</label>
														<textarea id="P1" name="pregunta[]" style="width:100%; height:100px;"><?php echo $pregunta->TextoGrupoPregunta; ?></textarea>
													</div>
												</div>
											<?php endforeach; ?>
											<?php else: ?>
											
											<div id="dvP1">
												<div class="form-group">
													<label for="P1">
														Pregunta*</label>
													<textarea id="P1" name="pregunta[]" style="width:100%; height:100px;"></textarea>
												</div>
											</div>
											
											<?php endif; ?>
										<?php }
										}else{ ?>
										
										
										<div id="dvP1">
											<div class="form-group">
												<label for="P1">
													Pregunta*</label>
												<textarea id="P1" name="pregunta[]" style="width:100%; height:100px;"></textarea>
											</div>
										</div>
										
										
										<div id="dvPB1" style="display:none;">
											<div class="form-group">
												<label for="P1">
													Termino pareado*</label>
												<div>
													<input type="text" style="width:45%;" name="izquierda[]" id="PI1" class="input" /> ::: <input type="text" style="width:45%;" name="derecha[]" id="PD1" class="input" />
												</div>
											</div>
										</div>
										
										<div id="dvPBAudio" style="display:none;">
											<div class="form-group">
												<label for="P1">
													Orden Audio*</label>
												<div>
													<input type="file" class="tm_audio" name="tm_audio" />
													<h6>Respuestas</h6>
													
													<div class="dvRespuestasAudio" style="margin-bottom: 5px;">
														<div>
															<div class="col-md-6">
																<p>Respuetas</p> 	
															</div>
															<div class="col-md-6">
																<p>Texto posterior</p> 	
															</div>	
														</div>
														<div class="audio_clonar">
															<div class="col-md-6">
																<input type="text" name="respuestas_audio[]" class="resp_audio" style="width: 95%; margin-bottom: 3px;" /> 	
															</div>
															<div class="col-md-6">
																<input type="text" name="apoyo_audio[]" class="apoy_audio" style="width: 95%; margin-bottom: 3px;" /> 	
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div id="dvPBFoto" style="display:none;">
											<div class="form-group">
												<label for="P23">
													Orden Imagen*</label>
												<div>
													<input type="file" class="tm_foto" name="tm_foto" />
													<h6>Respuestas</h6>
													
													<div class="dvRespuestasFoto">
														<div>
															<div class="col-md-6">
																<p>Respuetas</p> 	
															</div>
															<div class="col-md-6">
																<p>Texto posterior</p> 	
															</div>	
														</div>
														<div class="foto_clonar">
															<div class="col-md-6">
																<input type="text" name="respuestas_foto[]" class="resp_foto" style="width: 95%; margin-bottom: 3px;" /> 	
															</div>
															<div class="col-md-6">
																<input type="text" name="apoyo_foto[]" class="apoy_foto" style="width: 95%; margin-bottom: 3px;" /> 	
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>	
											
											
										<div id="dvPBSeleccionMultiple" style="display:none;">
											
										</div>	
										
										<?php } ?>
										
										
									</div>
									<div class="form-group text-right m-b-0">
										<button class="btn btn-primary waves-effect waves-light" type="button" id="btnAgregar">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Pregunta
										</button>
										
										<button class="btn btn-primary waves-effect waves-light" type="submit">
											<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar
										</button>
										<a class="btn btn-primary waves-effect waves-light" href="ListadoEjercicios.php">
											<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Volver
										</a>
										<input type="hidden" name="IdEjercicio" value="<?php echo $idEjercicio; ?>" />
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
        -->
    </div>
    <!-- END wrapper -->
    
    
    
    	
	
	
	<script src="/mi/assets/reproductor/mediaelement-and-player.min.js"></script>
	<link rel="stylesheet" href="/mi/assets/reproductor/mediaelementplayer.min.css" />
    
    
    <script src="../assets/js/jquery.app.js"></script>
    <script type="text/javascript">
    
    	$('audio,video').mediaelementplayer();
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
</body>
</html>
