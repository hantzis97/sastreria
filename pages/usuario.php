<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Usuarios")?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Usuarios","Lista de Usuarios") ?>	


<!-- CONTENIDO DEL MENU CLIENTE  -->	
	    <!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <!-- /.col-md-6 -->
	          <div class="col-lg-12">
	            <div class="card">
	              <div class="card-header">
	                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-usuario">
	                  <i class="fas fa-plus"></i>
	                     Usuarios
	                </button>
	              </div>
	              <div class="card-body">
	              	<table id="tbmateria" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Usuario</th>
		                    <th class="text-center">Clave</th>
		                    <th class="text-center">Nombre</th>
		                    <th class="text-center">Apellido</th>
		                    <th class="text-center">Cargo</th>
		                    <th class="text-center">Telefono</th>
		                    <th class="text-center">Direccion</th>
		                    <th class="text-center">Estado</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  	include_once "../control/controladorUsuario.php";
	                  	$u = new ControladorUsuario();
	                  	$u->list();
	                  	?>  
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Usuario</th>
		                    <th class="text-center">Clave</th>
		                    <th class="text-center">Nombre</th>
		                    <th class="text-center">Apellido</th>
		                    <th class="text-center">Cargo</th>
		                    <th class="text-center">Telefono</th>
		                    <th class="text-center">Direccion</th>
		                    <th class="text-center">Estado</th>
		                    <th class="text-center">Acciones</th>
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
	            <div class="modal fade" id="modal-usuario">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Nuevo Usuario</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			              	<div class="modal-body">
				                <form role="form" id="form-usuario">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="usuario">Usuario</label>
					                    	<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario">
					                	</div>
					                	<div class="form-group">
					                    	<label for="clave">Clave</label>
					                    	<input type="password" class="form-control" name="clave" id="clave" placeholder="Clave">
					                	</div>
					                	<div class="form-group">
					                    	<label for="nombre">Nombre</label>
					                    	<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
					                	</div>
					                	<div class="form-group">
					                    	<label for="apellido">Apellido</label>
					                    	<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
					                	</div>
					                	<div class="form-group">
					                    	<label for="diseño">Cargo</label>
					                    	<select class="form-control" name="cargo" id="cargo">
					                    		<option value="">Seleccionar...</option>
					                    		<option value="1">Sastre</option>
					                    		<option value="2">Vendedor</option>
					                    		<option value="3">Operario</option>   
					                    		<option value="4">Administrador</option>
					                    	</select>
					                	</div>
					                	<div class="form-group">
					                    	<label for="telefono">Telefono</label>
					                    	<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
					                	</div>
					                	<div class="form-group">
					                    	<label for="direccion">Direccion</label>
					                    	<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion">
					                	</div>
					                </div> 
					            </form>
			            	</div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
				              <button type="button" id="agregar-usuario" class="btn btn-primary">Guardar</button>
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
			              <h4 class="modal-title">Editar Usuario</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			                <form role="form" id="form-editar-usuario">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="edusuario">Usuario</label>
					                    	<input type="hidden" name="id" id="id"> 
					                    	<input type="text" class="form-control" name="edusuario" id="edusuario" placeholder="Nombre de usuario">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edclave">Clave</label>
					                    	<input type="password" class="form-control" name="edclave" id="edclave" placeholder="Clave">
					                	</div>
					                	<div class="form-group">
					                    	<label for="ednombre">Nombre</label>
					                    	<input type="text" class="form-control" name="ednombre" id="ednombre" placeholder="Nombre">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edapellido">Apellido</label>
					                    	<input type="text" class="form-control" name="edapellido" id="edapellido" placeholder="Apellido">
					                	</div>
					                	<div class="form-group">
					                    	<label for="edtelefono">Telefono</label>
					                    	<input type="text" class="form-control" name="edtelefono" id="edtelefono" placeholder="Telefono">
					                	</div>
					                	<div class="form-group">
					                    	<label for="eddireccion">Direccion</label>
					                    	<input type="text" class="form-control" name="eddireccion" id="eddireccion" placeholder="Direccion">
					                	</div>
					                </div> 
					            </form>
			            </div>
			            <div class="modal-footer justify-content-between">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			              <button type="button" id="editar-usuario" class="btn btn-primary">Guardar</button>
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

			$("#agregar-usuario").click(function(){
				$.ajax({
					url : '../control/getUsuario.php?action=1',
					type : 'POST',
					data : $("#form-usuario").serialize(),
					success : function(data){
						if ( data == 1){
							$.ajax({
								url : '../control/getUsuario.php?action=2',
								type : 'POST',
								data : $("#form-usuario").serialize(),
								success : function(data2){
									if ( data2 == 1){
										window.location.href = "usuario.php";
									}else if (data2 == 2 ){
										Swal.fire('Campos vacios');
									}else if (data2 == 3 ){
										Swal.fire('Error al agregar datos');
									}
								}
							})
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('El nombre de usuario ya existe');
						}
					}
				})
			})

			$("#editar-usuario").click(function(){
				$.ajax({
					url : '../control/getUsuario.php?action=3',
					type : 'POST',
					data : $("#form-editar-usuario").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "usuario.php";
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
			var parametros = {"idusuario": id};	
			$.ajax({
				url : '../control/getUsuario.php?action=4',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
					$("#edusuario").val(data.usuario);
					$("#edclave").val(data.clave)
					$("#ednombre").val(data.nombre);
					$("#edapellido").val(data.apellido);
					$("#edtelefono").val(data.telefono);
					$("#eddireccion").val(data.direccion);
					$("#id").val(data.id);
				}
			})
		}
	</script>
		<script>
		function estado(id){
			var parametros = {"idusuario": id};	
			$.ajax({
				url : '../control/getUsuario.php?action=5',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
					if ( data == 1){
						window.location.href = "usuario.php";
					}else{
						wal.fire('Error al cambiar el estado')
					}
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