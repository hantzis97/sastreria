<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	include_once "../control/method.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Resumen")?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Resumen","Resumen de Trabajo") ?>		

<!-- CONTENIDO DEL MENU CLIENTE  -->	
	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	       		<div class="col-lg-12">
		            <div class="card">
		               <div class="card-header">
		               		<h3>
	                    	<i class="fas fa-globe"></i> Operario: <?php echo obtenerNombreOperaro($_GET["op"]) ?>
	                    	<small class="float-right row">          
				            </small>
				            </h3>
			            </div>
						<div class="card-body">
							<table id="tbresumen" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th class="text-center">#ID</th>
										<th class="text-center">Fecha Inicio</th>
										<th class="text-center">Fecha Final</th>
										<th class="text-center">Prenda</th>
										<th class="text-center">Cantidad</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								require_once "../control/controladorResumen.php";
								$r = new ControladorResumen();
								$r->list($_GET["op"],$_GET["m"],$_GET["a"]);
								?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">#ID</th>
										<th class="text-center">Fecha Inicio</th>
										<th class="text-center">Fecha Final</th>
										<th class="text-center">Prenda</th>
										<th class="text-center">Cantidad</th>
									</tr>
								</tfoot>
							</table>
						</div>	                                       		           	          
		            </div>
	          </div>
	        </div>
	     </div>
	 </div>
	</div>
	</div><!-- /.content -->
</div>
	  <!-- /.content-wrapper -->
	   <?php $layout->footer() ?>

	<script>
		$(document).ready(function(){

			$("#tbresumen").DataTable({
	      		  'paging'      : true,
			      'lengthChange': true,
			      'searching'   : true,
			      'ordering'    : true,
			      'info'        : true,
			      'autoWidth'   : true,
			      'language' :{
			        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"  
			      }
	      	});
    
	})
	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>