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
                            <h4 class="page-title">Mantenedor de Cursos</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">
                                    <b>Datos a Ingresar</b>
                                </h4>
                                <form action="saveCourse.php" data-parsley-validate novalidate method="post">
                                <div class="form-group">
                                    <label for="userName">
                                        Nombre Curso</label>
                                    <input type="text" name="namecourse" parsley-trigger="change" required placeholder="Ingresar Nombre Curso"
                                        class="form-control">
                                </div>
				<?php require_once '../matrices/conexionsql.php';?>
                                <div class="form-group">
                                    <label for="userName">
                                        Profesor</label>
                                    <select name="teacher" class="selectpicker  form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <?php
                                            $teacher1 = mysql_query("call sp_Personas_ObtenerPorTipoPerfil(4);", $link);
                                            $count = 0;
                                            while($row = mysql_fetch_assoc($teacher1))
                                            {
                                                $count++;
                                                $result = $row;
                                                echo '<option value="'.$result['IdPersona'].'">'.$result['Nombre'].'</option>';
                                            }
                                            mysql_close($link);
                                        ?>
                                        
                                        
                                    </select>
                                </div>

				<div class="form-group">
                                    <label for="userName">
                                        Nivel</label>
                                    <select name="level" class="selectpicker  form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <option value="1">Niveles</option>
                                    </select>
                                </div>

				<div class="form-group">
                                    <label for="userName">
                                        Idioma</label>
                                    <select name="language" class="selectpicker  form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <option value="1">Inglés</option>
                                        <option value="2">Frances</option>
                                        <option value="3">Español</option>
                                        <option value="4">Alemán</option>
                                        <option value="5">Portugués</option>
                                    </select>
                                </div>								
								
                                <div class="form-group">
                                    <label for="userName">
                                        Empresa</label>
                                    <select name="enterprise" class="selectpicker  form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <?php
                                            
                                            $enterprise1 = mysql_query("select * fron Empresa;", $link);
                                            $count1 = 0;
                                            while($row1 = mysql_fetch_assoc($enterprise1))
                                            {
                                                $count1++;
                                                $result1 = $row1;
                                                echo '<option value="'.$result1['IdEmpresa'].'">'.$result1['RazonSocial'].'</option>';
                                            }
                                            mysql_close();
                                        ?>
                                    </select>
                                </div>					
								
                                <div class="form-group">
                                    <label for="userName">
                                        Vigente</label>
                                    <select name="available" class="selectpicker  form-control" data-style="btn-white">
                                        <option>- - Seleccione - - </option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>										
                                    </select>
                                </div>	

                                <div class="form-group">
                                    <label name="name" for="userName">
                                        Año Inicio</label>
                                    <input type="text" name="year" parsley-trigger="change" required placeholder="Ingresar Año de Inicio"
                                        class="form-control" id="codigo">
                                </div>
       								
													
								
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Guardar
                                    </button>
                                    <button id="sa-params" type="reset" class="btn btn-default waves-effect waves-light m-l-5">
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
    <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/pages/jquery.sweet-alert.init.js"></script>
    <div class="sweet-overlay" tabindex="-1" style="opacity: -0.03; display: none;"></div>
    <div class="sweet-alert hideSweetAlert" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: none; margin-top: -170px; opacity: -0.04;"><div class="sa-icon sa-error" style="display: none;">
        <span class="sa-x-mark">
          <span class="sa-line sa-left"></span>
          <span class="sa-line sa-right"></span>
        </span>
      </div><div class="sa-icon sa-warning" style="display: none;">
        <span class="sa-body"></span>
        <span class="sa-dot"></span>
      </div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: block;">
        <span class="sa-line sa-tip"></span>
        <span class="sa-line sa-long"></span>

        <div class="sa-placeholder"></div>
        <div class="sa-fix"></div>
      </div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Deleted!</h2>
      <p style="display: block;">Your imaginary file has been deleted.</p>
      <fieldset>
        <input type="text" tabindex="3" placeholder="">
        <div class="sa-input-error"></div>
      </fieldset><div class="sa-error-container">
        <div class="icon">!</div>
        <p>Not valid!</p>
      </div><div class="sa-button-container">
        <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
        <div class="sa-confirm-button-container">
          <button class="confirm" tabindex="1" style="display: inline-block; box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.0470588) 0px 0px 0px 1px inset; background-color: rgb(140, 212, 245);">OK</button><div class="la-ball-fall">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>				<!-- Google Analytics -->		<script>		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-74180346-1', 'auto');		  ga('send', 'pageview');		</script>		<!-- //Google Analytics -->		
</body>
</html>
