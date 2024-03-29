<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	include_once "../control/method.php";
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Medida")?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Medidas","Medidas del cliente: ".	obtenerNombreCLiente($_GET["id"])) ?>
<!-- CONTENIDO DEL MENU CLIENTE  -->	
	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <!-- /.col-md-6 -->
	          <div class="col-lg-12">
	            <div class="card">
	              <div class="card-header">
	                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-medida">
	                  <i class="fas fa-plus"></i>
	                     Medida
	                </button>
	              </div>
	              <div class="card-body">
	              	<table id="tbmedida" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombre de la Prenda</th>
		                    <th class="text-center">Medidas</th>
		                    <th class="text-center">Detalles</th>
		                    <th class="text-center">Fecha</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  	include_once "../control/controladorMedida.php";
	                  	$m = new ControladorMedida();
	                  	$m->list($_GET["id"]);
	                  	?>  
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombre de la Prenda</th>
		                    <th class="text-center">Medidas</th>
		                    <th class="text-center">Detalles</th>
		                    <th class="text-center">Fecha</th>
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
					                    	<input type="hidden" name="id" value="<?php echo $_GET["id"]?>" id="id">
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
	            <div class="modal fade" id="modal-editar">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Editar Medida</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			                <form role="form" id="form-editar-medida">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="ednombre">Nombre de la Prenda</label>
					                    	<input type="hidden" name="edid" id="edid">
					                    	<input type="text" class="form-control" name="ednombre" id="ednombre" placeholder="Nombre de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edmedida">Medidas de la Prenda</label>
					                    	<input type="text" class="form-control" name="edmedida" id="edmedida" placeholder="Medidas de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="eddetalle">Detalles</label>
					                    	<input type="text" class="form-control" name="eddetalle" id="eddetalle" placeholder="Detalles">
					                	</div>
					                </div> 
					            </form>
			            </div>
			            <div class="modal-footer justify-content-between">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			              <button type="button" id="editar-medida" class="btn btn-primary">Guardar</button>
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
	  	<?php $layout->footer()?>

	<script>
		$(document).ready(function(){
			$('#tbmedida').DataTable({
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
			$("#agregar-medida").click(function(){
				var idcl = $("#id").val();
				$.ajax({
					url : '../control/getMedida.php?action=1',
					type : 'POST',
					data : $("#form-medida").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "medida.php?id="+idcl;
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('Error al agregar datos');
						}
						
					}
				})
			})		
			$("#editar-medida").click(function(){
				var idcl = $("#id").val();
				$.ajax({
					url : '../control/getMedida.php?action=2',
					type : 'POST',
					data : $("#form-editar-medida").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "medida.php?id="+idcl;
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('Error al editar datos');
						}
						
					}
				})
			})

	})
	</script>
	<script>
		function editar(id){
			let parametros = {"idcliente": id};	
			$.ajax({
				url : '../control/getPedido.php?action=1',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
					alert(data);
					console.log(data);
					$("#ednombre").val(data.nombre);
					$("#edmedida").val(data.medida);
					$("#eddetalle").val(data.detalle);
					$("#edid").val(data.id);
				}
			})
		}
	</script>
	<script>
		function eliminar(id){
			let cliente = $("#id").val();
			Swal.fire({
			  title: 'Estás seguro?',
			  text: "No podrás revertir la acción",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Sí, borrarlo!'
			}).then((result) => {
			  if (result.isConfirmed) {
				 var parametros = {"idcliente": id};	
					$.ajax({
						url : '../control/getPedido.php?action=2',
						type : 'POST',
						data : parametros,
						success : function(data){
							Swal.fire({
			                  icon: 'success',
			                  title: 'Eliminado!.',
			                  confirmButtonText: `OK`,
			                }).then((result) => {
			                  if ( result.isConfirmed){
			                    window.location.href = "medida.php?id="+cliente;
			                  }
			                })	
							
						}
					})		
			  }
			})
		}

	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>