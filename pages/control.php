<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Control de Trabajo")?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Control","Lista de Operarios") ?>

<!-- CONTENIDO DEL MENU CLIENTE  -->	
	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <!-- /.col-md-6 -->
	          <div class="col-lg-12">
	            <div class="card">
	              <div class="card-header">

	              </div>
	              <div class="card-body">
	              	<table id="tbcliente" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombres</th>
		                    <th class="text-center">Apellidos</th>
		                    <th class="text-center">Cargo</th>
		                    <th class="text-center">Telefono</th>
		                    <th class="text-center">Direccion</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  	include_once "../control/controladorControl.php";
	                  	$c = new ControladorControl();
	                  	$c->list();
	                  	?>  
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombres</th>
		                    <th class="text-center">Apellidos</th>
		                    <th class="text-center">Cargo</th>
		                    <th class="text-center">Telefono</th>
		                    <th class="text-center">Direccion</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </tfoot>
                	</table>
	              </div>
	            </div>
	          </div>
	          <!-- /.col-md-6 -->
	        </div>
	          <!-- /.col-md-6 -->
	        </div>
	        <!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>

	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->

	<?php $layout->footer() ?>

	<script>
		$(document).ready(function(){
			$('#tbcliente').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true,
		      'language' :{
		        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"  
		      }
		})

	})
	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>