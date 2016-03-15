<?php 
session_start(); 
include("scripts/clases/class.mysql.php");
include("scripts/clases/class.data.php");
include("scripts/clases/class.combos.php");

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
			BootstrapDialog.DEFAULT_TEXTS['CANCEL'] = 'Cancelar';
			var grid = $("#grid-basic").bootgrid({
				formatters: {
					"commands": function(column, row)
					{
						return 	"<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " + 
								"<button type=\"button\" class=\"btn btn-xs btn-default command-show\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-check-circle\"></span></button> " +
								"<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button> " ;
					}
				}
			}).on("loaded.rs.jquery.bootgrid", function(){
				/* Executes after data is loaded and rendered */
				grid.find(".command-edit").on("click", function(e){
					location.href="GestorEjercicios.php?e=" + $(this).data("row-id");
				}).end().find(".command-delete").on("click", function(e){
					var idEliminar = $(this).data("row-id");
					BootstrapDialog.confirm({
						title: '<span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Confirmacion',
						message: '¿En Realidad desea eliminar el Ejercicio?',
						draggable: true,
						type: BootstrapDialog.TYPE_WARNING,
						size: BootstrapDialog.SIZE_SMALL,
						callback: function(result){
							if(result) {
								location.href="acciones/elimina_ejercicio.php?e=" + idEliminar;
							}
						}
					});
				}).end().find(".command-show").on("click", function(e){
					window.open("RecibeEjercicios.php?ejercicio=" + $(this).data("row-id"),'_blank');
				});
			});
			
			
			<?php if(isset($_SESSION["ejercicioEliminado"])){ ?>
				
				BootstrapDialog.show({
					title: '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Eliminado Correcto',
					message: '<h5>Ejercicio Eliminado correctamente!</h5>',
					closable: true,
					draggable: true,
					buttons: [{
						label: 'Ok',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					type: BootstrapDialog.TYPE_SUCCESS,
					size: BootstrapDialog.SIZE_SMALL
				});
			<?php unset($_SESSION["ejercicioEliminado"]); } ?>
			
			
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
                                Listado de Ejercicios</h4>
                            <ol class="breadcrumb">
                                <li><a href="/mi/mantenedores/panelControl.php">Inicio</a></li>
                                <li class="active">Registro de Cursos / Ejercicios</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
								<a class="btn btn-primary waves-effect waves-light" href="GestorEjercicios.php">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Ejercicio
								</a>
							
								<table id="grid-basic" class="table table-condensed table-hover table-striped">
									<thead>
										<tr>
											<th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
											<th data-column-id="id" data-type="numeric">ID</th>
											<th data-column-id="nombre">Nombre</th>
											<th data-column-id="curso">Curso</th>
											<th data-column-id="fase">Fase</th>
											<th data-column-id="tipo">Tipo</th>
										</tr>
									</thead>
									<tbody>
									
									<?php $data = new Data(); 
									
									$listadoEjercicios = $data->listarEjerciciosAll();
									foreach($listadoEjercicios as $ejercicio):
									?>
										<tr>
											<td></td>
											<td><?php echo $ejercicio->IdEjercicio; ?></td>
											<td><?php echo $ejercicio->Nombre; ?></td>
											<td><?php echo $ejercicio->IdCurso; ?></td>
											<td><?php echo $ejercicio->IdFase; ?></td>
											<td><?php echo $ejercicio->IdTipo; ?></td>
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
