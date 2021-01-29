<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Cliente")?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Cliente","Lista de Clientes") ?>

<!-- CONTENIDO DEL MENU CLIENTE  -->	
	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <!-- /.col-md-6 -->
	          <div class="col-lg-12">
	            <div class="card">
	              <div class="card-header">
	                  <?php if ( $_SESSION["cargo"] != 3) { ?>
	                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-cliente">
	                  <i class="fas fa-plus"></i>
	                     Cliente
	                </button>
	                <?php }?>
	              </div>
	              <div class="card-body">
	              	<table id="tbcliente" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombres</th>
		                    <th class="text-center">Apellidos</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  	include_once "../control/controladorCliente.php";
	                  	$cl  = new controladorCliente();
	                  	$cl->list();
	                  	?>  
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombres</th>
		                    <th class="text-center">Apellidos</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </tfoot>
                	</table>
	              </div>
	            </div>
	          </div>
	          <!-- /.col-md-6 -->
	        </div>
	        <!-- /.row -->
	      </div><!-- /.container-fluid -->

	      <!--  MODAL MEDIDA -->
	            <div class="modal fade" id="modal-medida">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Nueva Medida</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			              	<div class="modal-body">
				                <form role="form" id="form-medida">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="nombrep">Nombre de la Prenda</label>
					                    	<input type="hidden" name="id" id="id">
					                    	<input type="text" class="form-control" name="nombrep" id="nombrep" placeholder="Nombre de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="medida">Medidas de la Prenda</label>
					                    	<input type="text" class="form-control" name="medida" id="medida" placeholder="Medidas de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="detalle">Detalles</label>
					                    	<input type="text" class="form-control" name="detalle" id="detalle" placeholder="Detalles">
					                	</div>
					                </div> 
					            </form>
			            	</div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
				              <button type="button" id="agregar-medida" class="btn btn-primary">Guardar</button>
				            </div>
			            </div>
			          </div>
			          <!-- /.modal-content -->
			        </div>
			        <!-- /.modal-dialog -->
			      </div>

		 <!--  MODAL CLIENTE -->
	            <div class="modal fade" id="modal-cliente">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Nuevo Cliente</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			                <form role="form" id="form-cliente">
				                <div class="card-body">
				                  	<div class="form-group">
				                    	<label for="nombre">Nombres</label>
				                    	<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del cliente">
				                	</div>
				                	<div class="form-group">
				                    	<label for="apellido">Apellidos</label>
				                    	<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellidos del cliente">
				                	</div>
				                </div> 
				            </form>
			            </div>
			            <div class="modal-footer justify-content-between">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			              <button type="button" id="agregar-cliente" class="btn btn-primary">Guardar</button>
			            </div>
			          </div>
			          <!-- /.modal-content -->
			        </div>
			        <!-- /.modal-dialog -->
			      </div>
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

			$("#agregar-cliente").click(function(){
				$.ajax({
					url : '../control/gestion.php?action=1',
					type : 'POST',
					data : $("#form-cliente").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "cliente.php";
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('Error al agregar datos');
						}
						
					}
				})
			})

			$("#agregar-medida").click(function(){
				$.ajax({
					url : '../control/gestion.php?action=2',
					type : 'POST',
					data : $("#form-medida").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "cliente.php";
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('Error al agregar datos');
						}
						
					}
				})
			})
	})
	</script>
	<script>
		function obtenerId(id){
			$("#nombrep").val("");
			$("#medida").val("");
			$("#detalle").val("");
			$("#id").val(id);
		}	
	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>