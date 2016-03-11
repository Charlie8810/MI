<?php 
session_start(); 
include("scripts/clases/class.mysql.php");
include("scripts/clases/class.data.php");
include("scripts/clases/class.combos.php");
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
			$("#btnAgregar").click(function(){
				
				if($("#tipo_ejercicio").val() == "3")
				{
					var nuevapre = $("#dvPB1").clone(true);
					nuevapre.find("input").val("");
					$("#dvPrgs").append(nuevapre);	
				}
				else
				{
					var nuevapre = $("#dvP1").clone(true);
					nuevapre.find("textarea").val("");
					$("#dvPrgs").append(nuevapre);					
				}
				
				
			});
			
			$("#tipo_ejercicio").change(function(){
				
				if($(this).val() == "1" || $(this).val() == "2")
				{
					$("#dvP1").fadeIn("slow");
					$("#dvPB1").fadeOut("slow");
				}
				else if($(this).val() == "3")
				{
					$("#dvP1").fadeOut("slow");
					$("#dvPB1").fadeIn("slow");
				}
				
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
                                Gestor de Ejercicios</h4>
                            <ol class="breadcrumb">
                                <li><a href="#">Inicio</a></li>
                                <li class="active">Registro de Cursos / Ejercicios</li>
                            </ol>
							
                        </div>
						
                    </div>
                    <div class="row">
						
                        <div class="col-lg-12">
                            <div class="card-box">
                                <form action="acciones/procesa_cuestionarios.php" method="post" action="#" data-parsley-validate novalidate>
		

									<div class="form-group">
										<label for="nombre_ejercicio">
											Nombre*</label>
										<input type="text" name="nombre_ejercicio" id="nombre_ejercicio" class="input  form-control" />
									</div>
		
									<div class="form-group">
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
											<option value="1">Fase 1</option>
											<option value="2">Fase 2</option>
											<option value="3">Fase 3</option>
											<option value="4">Fase 4</option>
											<option value="5">Fase 5</option>
											<option value="6">Fase 6</option>
											<option value="7">Fase 7</option>
											<option value="8">Fase 8</option>
											<option value="9">Fase 9</option>
											<option value="10">Fase 10</option>
											
										</select>
									</div>
									
									<div class="form-group">
										<label for="userName">
											Tipo*</label>
										<select class="selectpicker  form-control" data-style="btn-white" id="tipo_ejercicio" name="tipo_ejercicio">
											<option>- - Seleccione - - </option>
											<option value="1">Completar</option>
											<option value="2">Seleccion</option>
											<option value="3">Términos Pareados</option>
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
										<?php }else{  
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
												<pre>
													<input type="text" style="width:45%;" name="izquierda[]" id="PI1" class="input" /> ::: <input type="text" style="width:45%;" name="derecha[]" id="PD1" class="input" />
												</pre>
											</div>
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
        <div class="side-bar right-bar nicescroll">
            <h4 class="text-center">
                Chat</h4>
            <div class="contact-list nicescroll">
                <ul class="list-group contacts-list">
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-1.jpg" alt="">
                        </div>
                        <span class="name">Chadengle</span> <i class="fa fa-circle online"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-2.jpg" alt="">
                        </div>
                        <span class="name">Tomaslau</span> <i class="fa fa-circle online"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-3.jpg" alt="">
                        </div>
                        <span class="name">Stillnotdavid</span> <i class="fa fa-circle online"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-4.jpg" alt="">
                        </div>
                        <span class="name">Kurafire</span> <i class="fa fa-circle online"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-5.jpg" alt="">
                        </div>
                        <span class="name">Shahedk</span> <i class="fa fa-circle away"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-6.jpg" alt="">
                        </div>
                        <span class="name">Adhamdannaway</span> <i class="fa fa-circle away"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-7.jpg" alt="">
                        </div>
                        <span class="name">Ok</span> <i class="fa fa-circle away"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-8.jpg" alt="">
                        </div>
                        <span class="name">Arashasghari</span> <i class="fa fa-circle offline"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-9.jpg" alt="">
                        </div>
                        <span class="name">Joshaustin</span> <i class="fa fa-circle offline"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="../assets/images/users/avatar-10.jpg" alt="">
                        </div>
                        <span class="name">Sortino</span> <i class="fa fa-circle offline"></i></a><span class="clearfix">
                        </span></li>
                </ul>
            </div>
        </div>
        -->
    </div>
    <!-- END wrapper -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
</body>
</html>
