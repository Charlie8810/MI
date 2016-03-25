
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
	<link href="../assets/jquery/jquery.bootgrid.css" rel="stylesheet" />
	
	<script>
        var resizefunc = [];
    </script>e
    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/jquery/jquery.bootgrid.js"></script>
	<script src="../assets/jquery/bootstrap-dialog.min.js"></script>
    <script type="text/javascript" src="../assets/plugins/parsleyjs/dist/parsley.min.js"></script>
	
	
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
					<!-- Espacio para Mensajes -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="row">
									<div class="col-md-12">
                                        <h4 class="m-t-0 header-title">
											<b>Titulo</b>
										</h4>
                                        <p>Texto de Prueba para Mensaje</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- //Espacio para Mensajes -->
                    <!-- Espacio para Mensajes -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="row">
									<div class="col-md-12">
                                        <h4 class="m-t-0 header-title">
											<b>Titulo</b>
										</h4>
                                        <p>Texto de Prueba para Mensaje</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- //Espacio para Mensajes -->
					
					<!-- Espacio para Mensajes -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="row">
									<div class="col-md-12">
                                        <h4 class="m-t-0 header-title">
											<b>Titulo</b>
										</h4>
                                        <p>Texto de Prueba para Mensaje</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- //Espacio para Mensajes -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include("../matrices/footer.php");?>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <script src="../assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
</body>
</html>
