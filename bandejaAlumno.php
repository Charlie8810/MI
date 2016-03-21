<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>MI - MCM Interactive Learning</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <script src="assets/js/modernizr.min.js"></script>
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php include ("matrices/topbar.php");?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->

        <?php include("matrices/left-side-menu.php");?>

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
                            <h4 class="page-title">Inicio Alumno</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        	
                        	<h5>Ingles basico I</h5>
                        	
                        	<h6>Nivel 1</h6>
                        	
                            <div class="panel-group" id="accordion-test-2">
								
								<?php 
										 
										 //imports
											include("mantenedores/scripts/clases/class.mysql.php");
											include("mantenedores/scripts/clases/class.data.php");

											$data = new Data();
											$fases = $data->listarFases();

								
								foreach($fases as $fa)
								{
										?>
								
								
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2<?php echo $fa->IdFase;?>" aria-expanded="false"
                                                class="collapsed">Phase <?php echo $fa->IdFase;?></a>
                                        </h4>
                                    </div>
                                    
                                    <div id="collapseOne-2<?php echo $fa->IdFase;?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
												<?php 
												$ejercicios =  $data->listarEjercicios($fa->IdCurso, $fa->IdFase);
												foreach($ejercicios as $ej){
												?>
												<li><a href="mantenedores/RecibeEjercicios.php?ejercicio=<?php echo $ej->IdEjercicio; ?>"> <?php echo $ej->Nombre; ?></a></li>    
												<?php } ?>
											</ul>
                                        </div>
                                    </div>
                                </div>
								
							<?php } ?>
								
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include("matrices/footer.php");?>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    
    
	
</body>
</html>
