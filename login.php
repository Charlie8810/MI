<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="insidehead">

        <link rel="shortcut icon" href="assets/images/favicon.png">

        <title>Login | MI - MCM Interactive Learning</title>

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
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> <img src="assets/images/MI_InteractiveLearning.png" title="MI MCM Interactive Learning"/>				<br>				Study Platform <strong class="text-custom">MI <br />MCM Interactive Learning</strong> </h3>
            </div> 


            <div class="panel-body">
            <div id="Notify">
			<?php 
			
			if(isset($_SESSION["error_login"]))
			{
				
				echo  '<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Error</strong>
							You must enter a valid username and password !!
						</div>';
				unset($_SESSION["error_login"]);
			
			}
			
			
			?>
			
			</div>
            <form class="form-horizontal m-t-20" action="matrices/login.php" method="post">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="user" id="user" class="form-control" type="text" required placeholder="User">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" id="pass" class="form-control" type="password" required placeholder="Password">
                    </div>
                </div>
                <!--
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Recordar Credenciales
                            </label>
                        </div>
                        
                    </div>
                </div>-->
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button name="login" value="login" id="send_request" class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Enter</button>
                    </div>
                </div>

                <!--<div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="resetPassword.php" class="text-dark"><i class="fa fa-lock m-r-5"></i> Did you forget your password?</a>
                    </div>
                </div>-->
                
            </form> 
            <script>
                window.onload = function() {
                    document.getElementById('send_request').onclick = function()
                    {
                        var user, pass, result;                
                        user = document.getElementById('user').value;                
                        pass = document.getElementById('pass').value; 
                                        
                        if(user == '' && pass == ''){
                            result = '<div class="alert alert-danger alert-dismissable">';
                            result +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            result += '<strong>OOPS!!!</strong> Not allowed to enter with empty fields on the form. Please enter your user and password to enter the website';
                            result += '</div>';
                            document.getElementById('Notify').innerHTML = result;		
							return false;							
                        }
                        else if(user == ''){
                            result = '<div class="alert alert-danger alert-dismissable">';
                            result +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            result += '<strong>OOPS!!!</strong> Not allowed to enter the user empty field on the form. Please enter your user to enter the website';
                            result += '</div>';
                            document.getElementById('Notify').innerHTML = result;
							return false;
                        }
						else if(pass == ''){
                            result = '<div class="alert alert-danger alert-dismissable">';
                            result +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            result += '<strong>OOPS!!!</strong> Not allowed to enter the user empty field on the form. Please enter your user to enter the website';
                            result += '</div>';
                            document.getElementById('Notify').innerHTML = result;
							return false;
                        }
                        
                        
                        
                    }
                }
            </script>
            </div>   
            </div>                              
                
            
        </div>
        
        

        
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
        <script src="assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="assets/plugins/notifications/notify-metro.js"></script>
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