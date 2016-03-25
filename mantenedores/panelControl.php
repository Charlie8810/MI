<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>MI - MCM Interactive Learning</title>
    <link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
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
                                Control Panel</h4>
                            <ol class="breadcrumb">
                                <li>&nbsp; </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Widget-box -->
                    <!-- este si -->
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="card-box p-0">
                                <div class="profile-widget text-center">
                                    <div class="bg-primary bg-profile">
                                    </div>
                                    <img src="../assets/images/panel/usuarios.jpg" class="thumb-lg img-circle img-thumbnail"
                                        alt="img">
                                    <h4>
                                        Manage Users<br />&nbsp;<br /></h4>
                                    <a href="../mantenedores/registroUsuarios.php" class="btn btn-sm btn-pink m-t-20">
                                        Enter</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card-box p-0">
                                <div class="profile-widget text-center">
                                    <div class="bg-success bg-profile">
                                    </div>
                                    <img src="../assets/images/panel/cursos.jpg" class="thumb-lg img-circle img-thumbnail"
                                        alt="img">
                                    <h4>
                                        Course Manager<br />&nbsp;<br /></h4>
                                   <a href="../mantenedores/ListadoCursos.php" class="btn btn-sm btn-pink m-t-20">
                                        Enter</a>
                                   
                                </div>
                            </div>
                        </div>	
						<div class="col-lg-2">  
							<div class="card-box p-0">  
								<div class="profile-widget text-center">     
								<div class="bg-warning bg-profile">      
								</div>
								
								<img src="../assets/images/panel/academico.jpg" 
								class="thumb-lg img-circle img-thumbnail"   
								alt="img">                                   
								<h4>Academic Manager<br />&nbsp;<br /></h4>   
								<a href="../mantenedores/ListadoEjercicios.php" class="btn btn-sm btn-pink m-t-20">  
								Enter</a>    
								</div>     
								</div>       
						   </div>						
						</div>						
                        <!-- <div class="col-lg-2">
                            <div class="card-box p-0">
                                <div class="profile-widget text-center">
                                    <div class="bg-custom bg-profile">
                                    </div>
                                    <img src="../assets/images/panel/articulos.jpg" class="thumb-lg img-circle img-thumbnail"
                                        alt="img">
                                    <h4>
                                        Articles and News Manager</h4>
                                    <a href="#" class="btn btn-sm btn-pink m-t-20">
                                        Enter</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card-box p-0">
                                <div class="profile-widget text-center">
                                    <div class="bg-inverse bg-profile">
                                    </div>
                                    <img src="../assets/images/panel/menu.jpg" class="thumb-lg img-circle img-thumbnail"
                                        alt="img">
                                    <h4>
                                        Manage Menu <br />&nbsp;<br /></h4>
                                   <a href="#" class="btn btn-sm btn-pink m-t-20">
                                        Enter</a>
                                   
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- end row-->
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
                            <img src="assets/images/users/avatar-1.jpg" alt="">
                        </div>
                        <span class="name">Chadengle</span> <i class="fa fa-circle online"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-2.jpg" alt="">
                        </div>
                        <span class="name">Tomaslau</span> <i class="fa fa-circle online"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-3.jpg" alt="">
                        </div>
                        <span class="name">Stillnotdavid</span> <i class="fa fa-circle online"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-4.jpg" alt="">
                        </div>
                        <span class="name">Kurafire</span> <i class="fa fa-circle online"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-5.jpg" alt="">
                        </div>
                        <span class="name">Shahedk</span> <i class="fa fa-circle away"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-6.jpg" alt="">
                        </div>
                        <span class="name">Adhamdannaway</span> <i class="fa fa-circle away"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-7.jpg" alt="">
                        </div>
                        <span class="name">Ok</span> <i class="fa fa-circle away"></i></a><span class="clearfix">
                        </span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-8.jpg" alt="">
                        </div>
                        <span class="name">Arashasghari</span> <i class="fa fa-circle offline"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-9.jpg" alt="">
                        </div>
                        <span class="name">Joshaustin</span> <i class="fa fa-circle offline"></i></a><span
                            class="clearfix"></span></li>
                    <li class="list-group-item"><a href="#">
                        <div class="avatar">
                            <img src="assets/images/users/avatar-10.jpg" alt="">
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
    <!-- jQuery  -->
    <script src="../assets/plugins/moment/moment.js"></script>
    <!-- jQuery  -->
    <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- jQuery  -->
    <script src="../assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <!-- skycons -->
    <script src="../assets/plugins/skyicons/skycons.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="../assets/pages/jquery.widgets.js"></script>
    <!-- Todojs  -->
    <script src="../assets/pages/jquery.todo.js"></script>
    <!-- chatjs  -->
    <script src="../assets/pages/jquery.chat.js"></script>
    <!-- Knob -->
    <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".knob").knob();

        });
    </script>	<!-- Google Analytics -->		<script>		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-74180346-1', 'auto');		  ga('send', 'pageview');		</script><!-- //Google Analytics -->			
</body>
</html>
