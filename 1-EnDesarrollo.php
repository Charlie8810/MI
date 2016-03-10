<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="insidehead">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

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
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>

		<!-- HOME -->
		<section class="home bg-dark" id="home">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="home-wrapper">
							<h1 class="icon-main text-custom"><img src="assets/images/logo_dark.png" />
                            </h1>
							<h1 class="home-text"><span class="rotate">MI MCM Interactive Learning,MI Crecimiento, MI Estudio</span></h1>
							<p class="m-t-30 text-muted cd-text">
								
								Sistema de Apoyo al Estudio<br />
                                MCM Life Languages
							</p>

							<!-- COUNTDOWN -->
							<div class="row m-t-40">
								<div class="col-sm-12 u-countdown">
									<div class="row">
										<div>
											<div>
												<span>0</span><span>Días</span>
											</div>
											<div>
												<span>0</span><span>Horas</span>
											</div>
										</div>
										<div>
											<div>
												<span>0</span><span>Minutos</span>
											</div>
											<div>
												<span>0</span><span>Segundos</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /COUNTDOWN -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END HOME -->

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

		<!-- Countdown -->
		<script src="assets/plugins/countdown/dest/jquery.countdown.min.js"></script>
		<script src="assets/plugins/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {

				// Countdown
				// To change date, simply edit: var endDate = "September 16, 2016 18:16:00";
				$(function() {
				    var endDate = "March 1, 2016 11:59:59";
					$('.u-countdown .row').countdown({
						date : endDate,
						render : function(data) {
							$(this.el).html('<div><div><span class="text-custom">' + (parseInt(this.leadingZeros(data.years, 2) * 365) + parseInt(this.leadingZeros(data.days, 2))) + '</span><span><b>Days</b></span></div><div><span class="text-primary">' + this.leadingZeros(data.hours, 2) + '</span><span><b>Hours</b></span></div></div><div class="lj-countdown-ms"><div><span class="text-pink">' + this.leadingZeros(data.min, 2) + '</span><span><b>Minutes</b></span></div><div><span class="text-info">' + this.leadingZeros(data.sec, 2) + '</span><span><b>Seconds</b></span></div></div>');
						}
					});
				});

				// Text rotate
				$(".home-text .rotate").textrotator({
					animation : "fade",
					speed : 3000
				});
			});

		</script>				<!-- Google Analytics -->		<script>		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-74180346-1', 'auto');		  ga('send', 'pageview');		</script>		<!-- //Google Analytics -->		

	</body>
</html>