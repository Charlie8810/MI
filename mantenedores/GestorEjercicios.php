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
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <script src="../assets/js/modernizr.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnAgregar").click(function(){
				
				if($("#tipo_ejercicio").val() == "3")
				{
					var nuevapre = $("#dvPB1").clone(true);
					nuevapre.find("textarea").val("");
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
										 
											//imports
											include("scripts/clases/class.mysql.php");
											include("scripts/clases/class.combos.php");
											
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
													Pregunta*</label>
												<pre>
													<input type="text" style="width:45%;" name="izquierda[]" id="PI1" class="input" /> ::: <input type="text" style="width:45%;" name="derecha[]" id="PD1" class="input" />
												</pre>
											</div>
										</div>
										
										
										
									</div>
									
									
									

									<div class="form-group text-right m-b-0">
										
										<button class="btn btn-primary waves-effect waves-light" type="button" id="btnAgregar">
											Agregar Pregunta
										</button>
										
										<button class="btn btn-primary waves-effect waves-light" type="submit">
											Siguiente
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
    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/detect.js"></script>
    <script src="../assets/js/fastclick.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/jquery.blockUI.js"></script>
    <script src="../assets/js/waves.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>
    <script type="text/javascript" src="../assets/plugins/parsleyjs/dist/parsley.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
</body>
</html>
