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

                                <div>
                                <?php
                                try
                                {
                                $ex1 = $_POST['ex1'];
                                $ex2 = $_POST['ex2'];
                                $ex3 = $_POST['ex3'];
                                $ex4 = $_POST['ex4'];
                                }
                                catch (Exception $ex)
                                {
                                    echo $ex;
                                }

                                $suma=0;
                                ?>


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
                                                    <?php
                                                    if($ex1 == "2")
                                                    {
                                                        $suma = $suma + 1;
                                                        echo("<br/><h1>Excellente</h1>");
                                                    }
                                                    else
                                                    {
                                                        $suma = 0;
                                                        echo("<br/><h3>Try Again</h3>");
                                                    }
                                                    ?>
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
                                                    <?php
                                                    if($ex2 == "3")
                                                    {
                                                        $suma = $suma + 1;
                                                        echo("<br/><h1>Excellent</h1>");
                                                    }
                                                    else
                                                    {
                                                        $suma = $suma + 0;
                                                        echo("<br/><h3>Try Again</h3>");
                                                    }
                                                    ?>
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
                                                    <?php

                                                    if($ex3 == "2")
                                                    {
                                                        $suma = $suma + 1;
                                                        echo("<br/><h1>Excellent</h1>");
                                                    }
                                                    else
                                                    {
                                                        $suma = $suma + 0;
                                                        echo("<br/><h3>Try Again</h3>");
                                                    }
                                                    ?>
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
                                                    <?php
                                                    if($ex4 == "1")
                                                    {
                                                        $suma = $suma + 1;
                                                        echo("<br/><h1>Excellent</h1>");
                                                    }
                                                    else
                                                    {
                                                        $suma = $suma + 0;
                                                        echo("<br/><h3>Try Again</h3>");
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br />
                                    
                                    <?php

                                    $resultado = 0;

                                    $resultado = ($suma * 100) / 4;

                                    echo "<h3>"."$suma"." correct of 4 <BR/></h3>";
                                    echo "<h2>Your Result is: </h2>";                                 

                                    ?>
                                    <div class="progress progress-lg m-b-5">
                                        <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $resultado; ?>%;">
                                            <?php echo $resultado; ?>%
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-right m-b-0">
                                        

                                    </div>
                                </div>
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
