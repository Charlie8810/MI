<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="insidehead">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>MI - MCM Interactive Learning</title>
    <?php include("../matrices/css.php");?>
    <script src="../assets/js/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
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
                                Mantenedores de Usuario</h4>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b></h4>
                                <form action="registroUsuario.php" method="POST" data-parsley-validate novalidate>
                                    <script type="text/javascript">
                                    $(document).ready(function(){
                                        cargar_personas();
                                       // $("#persona").change(function(){dependencia_comuna();});
                                        //$("#comuna").change(function(){dependencia_comuna();});
                                        
                                    });

                                    function cargar_personas()
                                    {
                                        $.get("scripts/cargar-personas.php", function(resultado){
                                            if(resultado == false)
                                            {
                                                alert("Error");
                                            }
                                            else
                                            {
                                                $('#persona').append(resultado);           
                                            }
                                        }); 
                                    }
                                    
                                    
                                </script>
                                <div class="form-group">
                                    <label for="userName">
                                        Persona</label>
                                    <select name="persona" id="persona" class="selectpicker  form-control" data-style="btn-white">
                                      
                                    </select>

                                    <label for="userName">
                                        Login</label>
                                    <input type="text" name="login" parsley-trigger="change" required placeholder="Ingresar Nombre / Razón Social"
                                        class="form-control" id="login">
                                </div>
								
                                <div class="form-group">
                                    <label for="userName">
                                        Contraseña</label>
                                    <input type="text" name="pass" parsley-trigger="change" required placeholder="Ingresar Nombre / Razón Social"
                                        class="form-control" id="pass">
                                </div> 

								                                <div class="form-group">
                                    <label for="userName">
                                        Estado</label>
                                    <select name="estado" class="selectpicker  form-control" data-style="btn-white" id="estado">
                                        <option value="1" >Activo</option>
                                        <option value="2" >No Activo</option>
                                    </select>
                                </div>
								
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Guardar
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Cancelar
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
    <?php include("../matrices/js.php");?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>				<!-- Google Analytics -->		<script>		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-74180346-1', 'auto');		  ga('send', 'pageview');		</script>		<!-- //Google Analytics -->		
</body>
</html>
