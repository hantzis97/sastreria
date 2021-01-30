<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	include_once "../layouts/layout.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Materia")?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Materia","Lista de Materiales") ?>
	 

<!-- CONTENIDO DEL MENU CLIENTE  -->	
	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <!-- /.col-md-6 -->
	          <div class="col-lg-12">
	            <div class="card">
	              <div class="card-header">
	              	<?php if ( $_SESSION["cargo"] != 2 ) {  ?>
	                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-material">
	                  <i class="fas fa-plus"></i>
	                     Materiales
	                </button>
	                <?php  } ?>
	              </div>
	              <div class="card-body">
	              	<table id="tbmateria" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombre</th>
		                    <th class="text-center">Marca</th>
		                    <th class="text-center">Color</th>
		                    <th class="text-center">Tipo</th>
		                    <th class="text-center">Diseño</th>
		                    <th class="text-center">Tamaño</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  	include_once "../control/controladorMateria.php";
	                  	$m = new ControladorMateria();
	                  	$m->list();
	                  	?>  
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombre</th>
		                    <th class="text-center">Marca</th>
		                    <th class="text-center">Color</th>
		                    <th class="text-center">Tipo</th>
		                    <th class="text-center">Diseño</th>
		                    <th class="text-center">Tamaño</th>
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
	            <div class="modal fade" id="modal-material">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Nuevo Material</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			              	<div class="modal-body">
				                <form role="form" id="form-material">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="nombrep">Nombre del Material</label>
					                    	<input type="text" class="form-control" name="nombrep" id="nombrep" placeholder="Nombre de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="marca">Marca</label>
					                    	<input type="text" class="form-control" name="marca" id="marca" placeholder="Marca del material">
					                	</div>
					                	<div class="form-group">
					                    	<label for="color">Color</label>
					                    	<input type="text" class="form-control" name="color" id="color" placeholder="Color">
					                	</div>
					                	<div class="form-group">
					                    	<label for="tipo">Tipo</label>
					                    	<input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo">
					                	</div>
					                	<div class="form-group">
					                    	<label for="diseño">Diseño</label>
					                    	<input type="text" class="form-control" name="diseño" id="diseño" placeholder="Detalles">
					                	</div>
					                	<div class="form-group">
					                    	<label for="tamaño">Tamaño</label>
					                    	<input type="text" class="form-control" name="tamaño" id="tamaño" placeholder="Detalles">
					                	</div>
					                </div> 
					            </form>
			            	</div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
				              <button type="button" id="agregar-material" class="btn btn-primary">Guardar</button>
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
			              <h4 class="modal-title">Editar Material</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			                <form role="form" id="form-editar-material">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="ednombrep">Nombre del Material</label>
					                    	<input type="hidden" id="id" name="id">
					                    	<input type="text" class="form-control" name="ednombrep" id="ednombrep">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edmarca">Marca</label>
					                    	<input type="text" class="form-control" name="edmarca" id="edmarca">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edcolor">Color</label>
					                    	<input type="text" class="form-control" name="edcolor" id="edcolor">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edtipo">Tipo</label>
					                    	<input type="text" class="form-control" name="edtipo" id="edtipo">
					                	</div>
					                	<div class="form-group">
					                    	<label for="eddiseño">Diseño</label>
					                    	<input type="text" class="form-control" name="eddiseño" id="eddiseño">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edtamaño">Tamaño</label>
					                    	<input type="text" class="form-control" name="edtamaño" id="edtamaño">
					                	</div>
					                </div> 
					            </form>
			            </div>
			            <div class="modal-footer justify-content-between">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			              <button type="button" id="editar-material" class="btn btn-primary">Guardar</button>
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
			$('#tbmateria').DataTable({
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

			$("#agregar-material").click(function(){
				$.ajax({
					url : '../control/getMateria.php?action=1',
					type : 'POST',
					data : $("#form-material").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "materia.php";
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('Error al agregar datos');
						}
						
					}
				})
			})

			$("#editar-material").click(function(){
				$.ajax({
					url : '../control/getMateria.php?action=2',
					type : 'POST',
					data : $("#form-editar-material").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "materia.php";
						}else if (data == 2 ){
							Swal.fire('Campos vacios / Números negativos');
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
			var parametros = {"idmateria": id};	
			$.ajax({
				url : '../control/getMateria.php?action=3',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
					$("#ednombrep").val(data.nombre);
					$("#edmarca").val(data.marca)
					$("#edcolor").val(data.color);
					$("#edtipo").val(data.tipo);
					$("#eddiseño").val(data.diseno);
					$("#edtamaño").val(data.tamano);
					$("#id").val(data.id);
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