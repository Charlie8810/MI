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
                            <h4 class="page-title">
                                Level 1</h4>
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Levels / English</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion-test-2">
							
							<?php /*
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseZero-2" aria-expanded="false"
                                                class="collapsed">Test 10 Exercises </a>
                                        </h4>
                                    </div>
                                    
                                    <div id="collapseZero-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>                                                
																								<li><a href="Ejercicio_MultipleChoice.php"> Multiple Choice 1</a></li>                                                
												<li><a href="Ejercicio_MultipleChoice.php"> Multiple Choice 2</a></li>                                                												
												<li><a href="#"> Multiple Choice 3</a></li>                                                												
												<li><a href="Ejercicio_FillInBlank.php"> Fill in the Blank 1</a></li>                                                												
												<li><a href="Ejercicio_FillInBlank.php"> Fill in the Blank 2</a></li>                                                												
												<li><a href="#"> Drag and Drop 1</a></li>                                                												
												<li><a href="#"> Drag and Drop 2</a></li>                                                												
												<li><a href="#"> Drag and Drop 3</a></li>                                                												
												<li><a href="#"> Crucigrama (No diseñado)</a></li>                                                												
												<li><a href="#"> Sopa de Letras (No diseñado)</a></li>     
											</ul>
                                        </div>
                                    </div>
                                </div>
								*/ ?>


								
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
												<li><a href="mantenedores/ReciveEjercicios.php?ejercicio=<?php echo $ej->IdEjercicio; ?>"> <?php echo $ej->Nombre; ?></a></li>    
												<?php } ?>
											</ul>
                                        </div>
                                    </div>
                                </div>
								
							<?php } ?>
								
							<?php /*	
								
								
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseTwo-2" class="collapsed"
                                                aria-expanded="false">Phase 2 </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>                                                <li><a href="#"> Unit 1 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 1 To Be Practice I</a></li>                                                <li><a href="#"> Unit 1 To Be II</a></li>                                                <li><a href="#"> Unit 1 Vocabulary Practice II</a></li>                                                <li><a href="#"> Unit 1 Possessive s</a></li>                                                <li><a href="#"> Unit 2 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 2 Vocabulary Practice II</a></li>                                                <li><a href="#"> Unit 3 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 3 Vocabulary Practice II</a></li>                                                <li><a href="#"> Unit 3 Vocabulary Practice III</a></li>                                                <li><a href="#"> Unit 3 Present Continuous Practice</a></li>                                                <li><a href="#"> Unit 4 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 4 Present Continuous Practice</a></li>                                                <li><a href="#"> Unit 4 Vocabulary Practice II</a></li>                                                <li><a href="#"> Unit 5 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 6 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 7 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 7 Present Simple Practice</a></li>                                                <li><a href="#"> Unit 8 Vocabulary Practice III</a></li>                                                <li><a href="#"> Unit 8 Vocabulary Practice I</a></li>                                                <li><a href="#"> Unit 8 Vocabylary Practice II</a></li>                                                <li><a href="#"> Unit 8 Present Simple and Continuous Practice</a></li>                                            </ul>
                                        </div>
                                    </div>
                                </div>
								
								
								
								
								
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-2"
                                                class="collapsed" aria-expanded="false">Phase 3</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>                                                <li><a href="#">Unit 9 Vocabulary Practice II</a></li>                                                <li><a href="#">Unit 9 Conversation Practice</a></li>                                                <li><a href="#">Unit 9 Vocabulary Practice I</a></li>                                                <li><a href="#">Unit 9 Question Practice</a></li>                                                <li><a href="#">Unit 10 Vocabulary Practice I</a></li>                                                <li><a href="#">Unit 10 Article Practice I</a></li>                                                <li><a href="#">Unit 10 Articles Practice II</a></li>                                                <li><a href="#">Unit 10 Articles A and An</a></li>                                                <li><a href="#">Unit 10 Article Guide</a></li>                                                <li><a href="#">Unit 11 Vocabulary Practice I</a></li>                                                <li><a href="#">Unit 11 Question Practice</a></li>                                                <li><a href="#">Unit 11 Prepositions of Place Practice I</a></li>                                                <li><a href="#">Unit 11 Prepositions of Place Practice II</a></li>                                                <li><a href="#">Unit 12 Vocabulary Practice I</a></li>                                                <li><a href="#">Vocabulary Unit 13 Practice I</a></li>                                                <li><a href="#">Unit 14 Vocabulary Practice I</a></li>                                                <li><a href="#">Unit 14 Clothes Vocabulary</a></li>                                                <li><a href="#">Unit 14 This, That, These, Those Practice</a>                                                </li>                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test-4" href="#collapseFour-4"
                                                class="collapsed" aria-expanded="false">Phase 4</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour-4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                           <ul>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 15 Vocabulary Practice I)</a></li>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 16 Vocabulary Practice I)</a></li>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 17 Vocabulary Practice I)</a></li>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 18 Vocabulary Practice I)</a></li>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 19 Vocabulary Practice I)</a></li>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 20 Vocabulary Practice I)</a></li>                                                <li><a href="#"><b>Drag and Drop</b> Put in Order (Unit 21 Vocabulary Practice I)</a></li>                                            </ul>
                                        </div>
                                    </div>
                                </div> */ ?>
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
		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-74180346-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<!-- //Google Analytics -->			
</body>
</html>
