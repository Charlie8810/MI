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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- jQuery  -->
	<script src="http://localhost:9595/jquery-ui/external/jquery/jquery.js"></script>
	<script src="http://localhost:9595/jquery-ui/jquery-ui.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../assets/plugins/parsleyjs/dist/parsley.min.js"></script>
	
	<style>
		  

			#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 30px; }
			#sortable li span { position: absolute; margin-left: -1.3em; }

			#sortable2 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable2 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.0em; height: 30px; }
			#sortable2 li span { position: absolute; margin-left: -1.3em; }
		  
		  

		  
  </style>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#testQuest").click(function(){
				var buenas = 0;
				var malas = 0;
				var total = 0;
					
				$(".pregunta_simple").each(function(i,input){
					if($(input).attr("respuesta").toLowerCase() == $(input).val().toLowerCase())
					{	
						$(input).removeClass("parsley-error");
						buenas++;
					}
					else
					{
						$(input).addClass("parsley-error");
						malas++;
					}
				});
				
				$(".pregunta_multiple").each(function(i,select){
					if($(select).find("option:selected").attr("correcta") == 1)
					{
						$(select).removeClass("parsley-error");
						buenas++;
					}
					else
					{
						$(select).addClass("parsley-error");
						malas++;
					}
				});
				total = buenas + malas;
				var score = Math.round((buenas / total) * 100);
				//console.log(total);
				$("#totales").html( buenas + " Correct of " + total);
				$("#score").html("Your Result is: " + score +"%");
				$("#dvResultado").css("display","block");
				
			});
			
			
			$("#sortable").sortable({
			  update: function( event, ui ) 
			  {
				console.log(ui.item);  
			  }
			});
			$("#sortable").disableSelection();
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
                                Gestor de Cursos</h4>
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
										 <?php 
										 
										 //imports
											include("scripts/clases/class.mysql.php");
											include("scripts/clases/class.data.php");
											
											$idEjercicio = isset($_REQUEST["ejercicio"]) ? $_REQUEST["ejercicio"] : false ; 
											
											if($idEjercicio)
											{
												
												$data = new Data();
												$ejercicio = $data->obtenerEjercicio($idEjercicio);
												
												if($ejercicio->IdTipo != 3)
												{
													$datos = $data->obtenerGrupoPreguntasPorEjercicio($idEjercicio);
													$i = 1;
													foreach($datos as $da)
													{
														echo "<pre>".$i.".-".$da->HtmlGrupoPregunta."</pre>";
														$i++;
													}
												}
												else
												{
													$terminosPareados = $data->obtenerTerminosPareadosPorEjercicio($idEjercicio);
													
													/*echo "<pre>";
													print_r($terminosPareados);												
													echo "</pre>";*/
													
													
												?>	
													<table style="width:100%;">
														<tr>
															<td style="width:45%;">
																<ul id="sortable2">
																  <li class="ui-state-default">Item 1</li>
																  <li class="ui-state-default">Item 2</li>
																  <li class="ui-state-default">Item 3</li>
																  <li class="ui-state-default">Item 4</li>
																  <li class="ui-state-default">Item 5</li>
																  <li class="ui-state-default">Item 6</li>
																  <li class="ui-state-default">Item 7</li>
																</ul>
															</td>
															<td style="width:45%;">
																<ul id="sortable">
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
															  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
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
										
										<button class="btn btn-primary waves-effect waves-light" type="button" id="testQuest">
											probar cuestionario
										</button>
										
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
    <script>
        var resizefunc = [];
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
</body>
</html>