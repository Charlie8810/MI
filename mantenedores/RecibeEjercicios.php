<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <title>MI - MCM Interactive Learning</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../assets/jquery/jquery-ui.css">
    <!-- jQuery  -->
	<script src="../assets/jquery/jquery.js"></script>
	<script src="../assets/jquery/jquery-ui.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../assets/plugins/parsleyjs/dist/parsley.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/jquery/style.css">
	<script language="javascript" type="text/javascript" src="../assets/jquery/wordfind.js"></script> 
	<script language="javascript" type="text/javascript" src="../assets/jquery/wordfindgame.js"></script>
		
	
	<style>
		  

			#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 40px; }
			#sortable li span { position: absolute; margin-left: -1.3em; }

			#sortable2 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable2 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 40px; }
			#sortable2 li span { position: absolute; margin-left: -1.3em; }
			
			
			#sortable3 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable3 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 40px; }
			#sortable3 li span { position: absolute; margin-left: -1.3em; }
		  
		  	#sortable5 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable5 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 40px; }
			#sortable5 li span { position: absolute; margin-left: -1.3em; }
		  
			#sortable6 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable6 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 40px; }
			#sortable6 li span { position: absolute; margin-left: -1.3em; }
			
			ul.source, ul.target {
			  min-height: 50px;
			  margin: 0px 25px 10px 0px;
			  padding: 2px;
			  border-width: 1px;
			  border-style: solid;
			  -webkit-border-radius: 3px;
			  -moz-border-radius: 3px;
			  border-radius: 3px;
			  list-style-type: none;
			  list-style-position: inside;
			}
			ul.source {
			  border-color: #f8e0b1;
			}
			ul.target {
			  border-color: #add38d;
			}
			.source li, .target li {
			  margin: 5px;
			  padding: 5px;
			  -webkit-border-radius: 4px;
			  -moz-border-radius: 4px;
			  border-radius: 4px;
			  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
			}
			.source li {
			  background-color: #fcf8e3;
			  border: 1px solid #fbeed5;
			  color: #c09853;
			}
			.target li {
			  background-color: #ebf5e6;
			  border: 1px solid #d6e9c6;
			  color: #468847;
			}
			.sortable-dragging {
			  border-color: #ccc !important;
			  background-color: #fafafa !important;
			  color: #bbb !important;
			}
			.sortable-placeholder {
			  height: 40px;
			}
			.source .sortable-placeholder {
			  border: 2px dashed #f8e0b1 !important;
			  background-color: #fefcf5 !important;
			}
			.target .sortable-placeholder {
			  border: 2px dashed #add38d !important;
			  background-color: #f6fbf4 !important;
			}
				  
		  
  </style>
  
  
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#testQuest").click(function(){
				var buenas = 0;
				var malas = 0;
				var total = 0;
				
				if($("#hdnTipoEjercicio").val() == "3" || $("#hdnTipoEjercicio").val() == "4" || $("#hdnTipoEjercicio").val() == "5")
				{
					$.each($(".izquierda"),function(i,e){
						//console.log($(e).attr("referencia") + " - " + $($(".derecha")[i]).attr("referencia"));
						if($(e).attr("referencia") == $($(".derecha")[i]).attr("referencia"))
						{
							buenas++;
							$(e).removeClass("parsley-error");
							$($(".derecha")[i]).removeClass("parsley-error");
						}
						else
						{
							malas++;
							$(e).addClass("parsley-error");
							$($(".derecha")[i]).addClass("parsley-error");
						}
					});					
				}
				else if($("#hdnTipoEjercicio").val() == "6")
				{
					$(".pregunta").each(function(i,e){
						$(e).find("input").each(function(i,e2){
							
							if($(e2).attr("correcta") == "correcta")
							{
								total++;
							}
							
							
							if($(e2).is(":checked"))
							{
								if($(e2).attr("correcta") == "correcta")
								{
									buenas++;
									$(e2).removeClass("parsley-error");
								}
								else if($(e2).attr("correcta") == "incorrecta")
								{
									//malas++;
									$(e2).addClass("parsley-error");
									$(e2).attr("checked",false);
									$(e2).attr("title","Respuesta Incorrecta ");
									$(e2).data("placement","right");
									$(e2).tooltip('show');
									
									
								}
							}
							
						});
					});
				}
				else if($("#hdnTipoEjercicio").val() == "7")
				{
					$(".target").each(function(i,e){
						$(e).find("li").each(function(i,e2){
							if($(e2).hasClass($(e).attr("pregunta")))
							{	
								buenas++;
							}	
							else
							{
								malas++;
								$(e2).appendTo(".source");
							}
						});
					});
				}
				else
				{					
					$(".pregunta_simple").each(function(i,input){
						if($(input).attr("respuesta").toLowerCase() == $(input).val().toLowerCase())
						{	
							$(input).removeClass("parsley-error");
							$(input).tooltip('destroy');
							buenas++;
						}
						else
						{
							$(input).addClass("parsley-error");
							$(input).attr("title","Respuesta: " + $(input).attr("respuesta"));
							$(input).data("placement","right");
							$(input).tooltip('show');
							malas++;
						}
					});
					
					$(".pregunta_multiple").each(function(i,select){
						if($(select).find("option:selected").attr("correcta") == 1)
						{
							$(select).removeClass("parsley-error");
							$(select).tooltip('destroy');
							buenas++;
						}
						else
						{
							malas++;
							$(select).addClass("parsley-error");
							$(select).attr("title","Respuesta: " + $(select).find("[correcta='1']").html());
							$(select).data("placement","right");
							$(select).tooltip('show');
						}
					});
				}
				
				 if($("#hdnTipoEjercicio").val() != "6")
				 {
					total = buenas + malas;	
				 }
				
				var score = Math.round((buenas / total) * 100);
				//console.log(total);
				$("#totales").html( buenas + " Correct of " + total);
				$("#score").html("Your Result is: " + score +"%");
				$("#dvResultado").css("display","block");
			});
			
			
			$("#sortable").sortable();
			$("#sortable").disableSelection();
			
			$("#sortable3").sortable();
			$("#sortable3").disableSelection();
			
			$("#sortable5").sortable();
			$("#sortable5").disableSelection();
			
			
			
			
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
                                Gestor de Cursos</h4>
                            <ol class="breadcrumb">
                                <li><a href="/mi/Nivel_1.php">Inicio</a></li>
                                <li class="active">Registro de Cursos / Ejercicios</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <form action="#" method="post" action="#" data-parsley-validate novalidate>
									<div class="form-group">
										 <?php 
										 
										 //imports
											include("scripts/clases/class.mysql.php");
											include("scripts/clases/class.data.php");
											include("scripts/clases/class.data.Ejercicios.php");
											
											$idEjercicio = isset($_REQUEST["ejercicio"]) ? $_REQUEST["ejercicio"] : false ; 
											
											if($idEjercicio)
											{
												
												$data = new Data();
												$ejercicio = $data->obtenerEjercicio($idEjercicio);
												
												if($ejercicio->IdTipo == 1 || $ejercicio->IdTipo == 2 || $ejercicio->IdTipo == 6 || $ejercicio->IdTipo == 7 || $ejercicio->IdTipo == 8 )
												{
													$datos = $data->obtenerGrupoPreguntasPorEjercicio($idEjercicio);
													$i = 1;
													foreach($datos as $da)
													{
														
														echo "<div class='col-lg-12'>".$da->HtmlGrupoPregunta."</div>";
														
														$i++;
													}
												}
												else if($ejercicio->IdTipo == 4)
												{
														$ex = new Ejercicios();
														$ap = $ex->obtenerAudioPreguntaPorEjercicio($idEjercicio,true);
														$ap2 = $ex->obtenerAudioPreguntaPorEjercicio($idEjercicio);
													?>	
													<div><audio id="question_player" src="<?php echo $ap->RutaAudio; ?>" type="audio/mp3" controls="controls" style="width: 90%;"></div>
													<br/>
													<table style="width:100%;">
														<tr>
															<td style="width:50%;">
																<ul id="sortable3">
																<?php foreach($ap->Respuestas as $v) :?>
																  <li class="ui-state-default izquierda" referencia="<?php echo $v->OrdenRespuestaAudio; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $v->TextoResupestaAudio; ?></li>
																<?php endforeach;?>
																</ul>
															</td>				
															<td>
																<ul id="sortable3">
																<?php foreach($ap2->Respuestas as $v) :?>
																  <li class="ui-state-default derecha" referencia="<?php echo $v->OrdenRespuestaAudio; ?>"><?php echo $v->TextoApolloRespuestaAudio; ?></li>
																<?php endforeach;?>
																</ul>
															</td>									
														</tr>
													</table>
													
													<?php
												}
												else if($ejercicio->IdTipo == 5)
												{
														$ex = new Ejercicios();
														$ap = $ex->obtenerFotoPreguntaPorEjercicio($idEjercicio,true);
														$ap2 = $ex->obtenerFotoPreguntaPorEjercicio($idEjercicio);
														
													?>	
													<div>
														<img src="<?php echo $ap->RutaFoto; ?>" alt="" /></div>
													<br/>
													<table style="width:100%;">
														<tr>
															<td style="width:50%;">
																<ul id="sortable5">
																<?php foreach($ap->Respuestas as $v) :?>
																  <li class="ui-state-default izquierda" referencia="<?php echo $v->OrdenRespuestaFoto; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $v->TextoResupestaFoto; ?></li>
																<?php endforeach;?>
																</ul>
															</td>				
															<td>
																<ul id="sortable6">
																<?php foreach($ap2->Respuestas as $v) :?>
																  <li class="ui-state-default derecha" referencia="<?php echo $v->OrdenRespuestaFoto; ?>"><?php echo $v->TextoApolloRespuestaFoto; ?></li>
																<?php endforeach;?>
																</ul>
															</td>									
														</tr>
													</table>
													
													<?php
												}
												else if($ejercicio->IdTipo == 3)
												{
													
													function shuffle_assoc($list) 
													{ 
														  if (!is_array($list)) return $list; 

														  $keys = array_keys($list); 
														  shuffle($keys); 
														  $random = array(); 
														  foreach ($keys as $key) 
														  { 
															$random[$key] = $list[$key]; 
														  }
														  return $random; 
													} 
													
													$terminosPareados = $data->obtenerTerminosPareadosPorEjercicio($idEjercicio);
													$i = shuffle_assoc($terminosPareados->dt);
													$d = shuffle_assoc($terminosPareados->dt);
													
												?>	
													<table style="width:100%;">
														<tr>
															<td style="width:45%;">
																<ul id="sortable2">
																<?php foreach($i as $k=>$v) :?>
																  <li class="ui-state-default izquierda" referencia="<?php echo $v['ID']; ?>"><?php echo $v['i']; ?></li>
																<?php endforeach;?>
																</ul>
															</td>
															<td style="width:45%;">
																<ul id="sortable">
																<?php foreach($d as $k=>$v) :?>
																  <li class="ui-state-default derecha" referencia="<?php echo $v['ID']; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $v['d']; ?></li>
																<?php endforeach;?>
																</ul>
																
															
															</td>													
														</tr>
													</table>
													
													
													<?php											
												}
											}
										
										 ?>
									
									
										<div id="dvResultado" style="display:none;">
											<h3 id="totales">0 correct of 4 <br></h3>
											<h2 id="score">Your Result is: </h2>
										</div>
									</div>
									<div class="form-group text-right m-b-0">
										
										<?php if($ejercicio->IdTipo == 8){ ?>
											<button class="btn btn-primary" type="button" id="solve" onclick="wordfindgame.solve(gamePuzzle, words);">Solve Puzzle</button>
										<?php }else{ ?>
										
										<button class="btn btn-primary waves-effect waves-light" type="button" id="testQuest">
											Evaluar cuestionario
										</button>
										<?php } ?>
										
										<input type="hidden" name="hdnTipoEjercicio" id="hdnTipoEjercicio" value="<?php echo $ejercicio->IdTipo;?>" />
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
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <script src="../assets/js/jquery.app.js"></script>
	<script src="../assets/reproductor/mediaelement-and-player.min.js"></script>
	<link rel="stylesheet" href="../assets/reproductor/mediaelementplayer.min.css" />
	
    <script type="text/javascript">
    
    	$('audio,video').mediaelementplayer();
        $(document).ready(function () {
        	
            $('form').parsley();
        });
    </script>
</body>
</html>