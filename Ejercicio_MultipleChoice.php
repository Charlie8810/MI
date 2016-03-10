<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>MI - MCM Interactive Learning</title>
    <!-- Plugin Css-->
    <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css" />
    <link rel="stylesheet" href="assets/plugins/jquery-datatables-editable/datatables.css" />
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
                                Nivel 1 / Fase 1 / Ejercicios / Multiple Choice</h4>
                            <ol class="breadcrumb">
                                <li><a href="#">Inicio</a></li>
                                <li><a href="#">Fase 1</a></li>
                                <li class="active"><b>Multiple Choice</b> 3 options, 1 correct (Unit 1 Possessive s) </li>
                            </ol>
                        </div>
                    </div>
                    <!-- end Panel -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Possessive "s"</b></h4>
                                <p class="text-muted m-b-30 font-13">
                                    Choose the correct answer. 
                                </p>
                                <div class="table-responsive">

                                <form method="post" action="MultipleChoiceResult.php">
                              


                                    <table id="mainTable" class="table table-striped m-b-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    I met
                                                    <select name="ex1" class="selectpicker" data-style="btn-white">
                                                        <option value="0">-- Selection --</option>
                                                        <option value="1">Mrs. Browns' daughter</option>
                                                        <option value="2">Mrs. Brown's daughter</option>
                                                        <option value="3">Mrs. Browns's daughter</option>
                                                    </select>
                                                    when I was at the store (the daughter of Mrs. Brown)
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Welcome to our home. You may sleep in
                                                    <select name="ex2" class="selectpicker" data-style="btn-white">
                                                        <option value="0">-- Selection --</option>
                                                        <option value="1">my sons' bedroom</option>
                                                        <option value="2">my sons's bedroom</option>
                                                        <option value="3">my son's bedroom</option>
                                                    </select>
                                                    tonight. (the bedroom of my son)
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    I met
                                                    <select name="ex3" class="selectpicker" data-style="btn-white">
                                                        <option value="0">-- Selection --</option>
                                                        <option value="1">Franks' sister</option>
                                                        <option value="2">Frank's sister</option>
                                                        <option value="3">Franks's sister</option>
                                                    </select>
                                                    at a party last week. (the sister of Frank)
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    This is my
                                                    <select name="ex4" class="selectpicker" data-style="btn-white">
                                                        <option value="0">-- Selection --</option>
                                                        <option value="1">teacher's electric</option>
                                                        <option value="2">teachers electric</option>
                                                        <option value="3">teachers's electric</option>
                                                    </select>
                                                    of the academy music. (The electric guitar of my teacher.)
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br />
                                    
                                    
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-default btn-rounded waves-effect waves-light" type="submit">
                                            <span class="btn-label"><i class="fa fa-check"></i></span>Evaluar
                                            
                                        </button>
                                            <!--<button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Cancelar-->
                                        </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <footer class="footer">
                    2016 © MI - MCM Interactive Learning
                </footer>
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
        Right-bar -->
        <!-- MODAL -->
        <div id="dialog" class="modal-block mfp-hide">
            <section class="panel panel-info panel-color">
                    <header class="panel-heading">
                        <h2 class="panel-title">Are you sure?</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Are you sure that you want to delete this row?</p>
                            </div>
                        </div>

                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                                <button id="dialogConfirm" class="btn btn-primary waves-effect waves-light">Confirm</button>
                                <button id="dialogCancel" class="btn btn-default waves-effect">Cancel</button>
                            </div>
                        </div>
                    </div>
                    
                </section>
        </div>
        <!-- end Modal -->
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
    <!-- Examples -->
    <script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>
    <script src="assets/pages/datatables.editable.init.js"></script>
    <script>
        $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
			
    </script>
	
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
