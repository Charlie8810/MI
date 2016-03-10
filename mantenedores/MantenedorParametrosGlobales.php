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
                                Mantenedor Parámetros Globales</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b></h4>
                                <form action="registroParametros.php" method="POST" data-parsley-validate novalidate>
                                <div class="form-group">
                                    <label for="userName">
                                        Código</label>
                                    <input type="text" name="codigo" parsley-trigger="change" required placeholder="Ingresar Código"
                                        class="form-control" id="codigo">
                                </div>
								
                                <div class="form-group">
                                    <label for="userName">
                                        Valor</label>
                                    <input type="text" name="valor" parsley-trigger="change" required placeholder="Ingresar Valor"
                                        class="form-control" id="valor">
                                </div>         
								
                                <div class="form-group">
                                    <label for="userName">
                                        Descripción</label>
                                    <input type="text" name="descripcion" parsley-trigger="change" required placeholder="Ingresar Descripción"
                                        class="form-control" id="descripcion">
                                </div>  
								<div class="form-group">
			                                			<label class="control-label col-sm-4">Fecha</label>
			                                			<div class="col-sm-8">
			                                				<div class="input-group">
																<input type="text" class="form-control" placeholder="mm/dd/yyyy" name="fecha" id="fecha">
																<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
															</div><!-- input-group -->
			                                			</div>
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
			jQuery(document).ready(function() {

				// Time Picker
				jQuery('#timepicker').timepicker({
					defaultTIme : false
				});
				jQuery('#timepicker2').timepicker({
					showMeridian : false
				});
				jQuery('#timepicker3').timepicker({
					minuteStep : 15
				});
				
				//colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple-date').datepicker({
                    format: "mm/dd/yyyy",
					clearBtn: true,
					multidate: true,
					multidateSeparator: ","
                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
                
                //Clock Picker
                $('.clockpicker').clockpicker({
                	donetext: 'Done'
                });
                
                $('#single-input').clockpicker({
				    placement: 'bottom',
				    align: 'left',
				    autoclose: true,
				    'default': 'now'
				});
				$('#check-minutes').click(function(e){
				    // Have to stop propagation here
				    e.stopPropagation();
				    $("#single-input").clockpicker('show')
				            .clockpicker('toggleView', 'minutes');
				});
				
				
				//Date range picker
				$('.input-daterange-datepicker').daterangepicker({
					buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white'
				});
		        $('.input-daterange-timepicker').daterangepicker({
		            timePicker: true,
		            format: 'MM/DD/YYYY h:mm A',
		            timePickerIncrement: 30,
		            timePicker12Hour: true,
		            timePickerSeconds: false,
		            buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white'
		        });
		        $('.input-limit-datepicker').daterangepicker({
		            format: 'MM/DD/YYYY',
		            minDate: '06/01/2015',
		            maxDate: '06/30/2015',
		            buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white',
		            dateLimit: {
		                days: 6
		            }
		        });
		
		        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
		
		        $('#reportrange').daterangepicker({
		            format: 'MM/DD/YYYY',
		            startDate: moment().subtract(29, 'days'),
		            endDate: moment(),
		            minDate: '01/01/2012',
		            maxDate: '12/31/2015',
		            dateLimit: {
		                days: 60
		            },
		            showDropdowns: true,
		            showWeekNumbers: true,
		            timePicker: false,
		            timePickerIncrement: 1,
		            timePicker12Hour: true,
		            ranges: {
		                'Today': [moment(), moment()],
		                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		                'This Month': [moment().startOf('month'), moment().endOf('month')],
		                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		            },
		            opens: 'left',
		            drops: 'down',
		            buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white',
		            separator: ' to ',
		            locale: {
		                applyLabel: 'Submit',
		                cancelLabel: 'Cancel',
		                fromLabel: 'From',
		                toLabel: 'To',
		                customRangeLabel: 'Custom',
		                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
		                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		                firstDay: 1
		            }
		        }, function (start, end, label) {
		            console.log(start.toISOString(), end.toISOString(), label);
		            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		        });
				
			});
		</script>
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
