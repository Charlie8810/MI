<?php 
session_start(); 
include("scripts/clases/class.mysql.php");
include("scripts/clases/class.data.relacionempresadepto.php");

?>
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
    </script>
    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/jquery/jquery.bootgrid.js"></script>
	<script src="../assets/jquery/bootstrap-dialog.min.js"></script>
    <script type="text/javascript" src="../assets/plugins/parsleyjs/dist/parsley.min.js"></script>
	<script>
		$(document).ready(function(){
			var grid = $("#grid-basic").bootgrid({
				formatters: {
					"commands": function(column, row)
					{
						return 	"<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " 
					}
				}
			}).on("loaded.rs.jquery.bootgrid", function(){
				/* Executes after data is loaded and rendered */
				grid.find(".command-edit").on("click", function(e){
					location.href="GestorAsociacion_EmpDepPersona.php?rel=" + $(this).data("row-id");
				});
			});
		});
	</script>
	
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
                                Listado de Relacion Empresa Departamento</h4>
                            <ol class="breadcrumb">
                                <li><a href="/mi/mantenedores/panelControl.php">Inicio</a></li>
                                <li class="active">Registro Relacion Empresa Departamento</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
							
								<table id="grid-basic" class="table table-condensed table-hover table-striped">
									<thead>
										<tr>
											<th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
											<th data-column-id="id" data-type="numeric">ID</th>
											<th data-column-id="nombre">Empresa</th>
											<th data-column-id="descripcion">Departamento</th>
											<th data-column-id="vigente">Vigente</th>
										</tr>
									</thead>
									<tbody>
									
									<?php $data = new RelacionEmpresaDepartamento(); 
									
									$listadorelacion = $data->listarRelacionEmpresaDepartamento();
									if($listadorelacion >0)
									foreach($listadorelacion as $relacion):
									?>
										<tr>
											<td></td>
											<td><?php echo $relacion->IdRelacionEmpresaDepto; ?></td>
											<td><?php echo $relacion->Empresa; ?></td>
											<td><?php echo $relacion->Departamento; ?></td>
											<td><?php echo ($relacion->Vigente)? "Si" : "No" ; ?></td>
										</tr>
									<?php endforeach;?>
									</tbody>
								</table>  
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
