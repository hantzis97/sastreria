<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	//include_once "pagina.php";
	$n = $_SESSION["nombre"];
	$c = $_SESSION["cargo"];
	$t = "Usuarios";
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head><meta charset="gb18030">
	  
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta http-equiv="x-ua-compatible" content="ie=edge">

	  <title><?php echo $t?></title>

	  <!-- Font Awesome Icons -->
	  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  <link rel="stylesheet" href="../plugins/datatables/datatables.css" >
	  <link href="../plugins/sweetalert/sweetalert.css" >
	</head>
	<body class="hold-transition sidebar-mini">
	<div class="wrapper">

	  <!-- Navbar -->
	  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	      </li>
	    </ul>   
	    <!-- Right navbar links -->
	  </nav>
	  <!-- /.navbar -->

	  <!-- Main Sidebar Container -->
	  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	    <!-- Brand Logo -->
	    <a href="index.php" class="brand-link">
	      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
	           style="opacity: .8">
	      <span class="brand-text font-weight-light">EL ARTE DEL VESTIR</span>
	    </a>

	    <!-- Sidebar -->
	    <div class="sidebar">
	      <!-- Sidebar user panel (optional) -->
	      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
	        <div class="image">
	          <img src="../dist/img/usuario.png" class="img-circle elevation-2" alt="User Image">
	        </div>
	        <div class="info">
	          <a href="#" class="d-block"><?php echo $n?></a>
	        </div>
	      </div>

	      <!-- Sidebar Menu -->
	      <nav class="mt-2">
	        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	        <?php if ( $c == 4  ) { ?>
	          <li class="nav-item">
	            <a href="control.php" class="nav-link">
	              <i class="nav-icon fas fa-calendar-alt"></i>
	              <p>
	                Control
	                <span class="right badge badge-success">NUEVO</span>
	              </p>
	            </a>
	          </li>
	        <?php } ?>  
	        <?php if ( $c == 1 || $c == 4 || $c == 3 ) { ?>
	          <li class="nav-item">
	            <a href="cliente.php" class="nav-link">
	              <i class="nav-icon fas fa-users"></i>
	              <p>
	                Clientes
	                <span class="right badge badge-success">NUEVO</span>
	              </p>
	            </a>
	          </li>
	        <?php } ?>  
	        <?php if ( $c == 2 || $c == 4 ) { ?>
	          <li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	              <i class="nav-icon fas fa-truck-loading"></i>
	              <p>
	                Inventario
	                <i class="right fas fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="producto.php" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Productos</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="materia.php" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Materia Prima</p>
	                </a>
	              </li>
	            </ul>
	          </li>
	         <?php } ?>
	         <?php if ( $c == 4 ) { ?>
	          <li class="nav-item">
	            <a href="usuario.php" class="nav-link">
	              <i class="nav-icon fas fa-users"></i>
	              <p>
	                Usuarios
	                <span class="right badge badge-success">NUEVO</span>
	              </p>
	            </a>
	          </li>
	         <?php } ?>
	          <li class="nav-item">
	            <a href="../control/logout.php" class="nav-link">
	              <i class="nav-icon fas fa-sign-out-alt"></i>
	              <p>
	                Cerrar Sesión
	                <span class="right badge badge-danger">SALIR</span>
	              </p>
	            </a>
	          </li>
	        </ul>
	      </nav>	      <!-- /.sidebar-menu -->
	    </div>
	    <!-- /.sidebar -->
	  </aside>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Lista de Usuarios</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
	              <li class="breadcrumb-item active"><?php echo $t ?></li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

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
	                  	include_once "../control/method.php";
	                  	listarUsuarios();
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

	  <!-- Control Sidebar -->
	  <aside class="control-sidebar control-sidebar-dark">
	    <!-- Control sidebar content goes here -->
	    <div class="p-3">
	      <h5>Title</h5>
	      <p>Sidebar content</p>
	    </div>
	  </aside>
	  <!-- /.control-sidebar -->

	  <!-- Main Footer -->
	  <footer class="main-footer">
	    <!-- To the right -->
	    <div class="float-right d-none d-sm-inline">
	      Anything you want
	    </div>
	    <!-- Default to the left -->
	    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
	  </footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
	<script src="../plugins/sweetalert/sweetalert.js"></script>
	<script src="../plugins/datatables/datatables.js"></script>

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
					url : '../control/gestion.php?action=16',
					type : 'POST',
					data : $("#form-usuario").serialize(),
					success : function(data){
						if ( data == 1){
							$.ajax({
								url : '../control/gestion.php?action=13',
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
					url : '../control/gestion.php?action=15',
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
				url : '../control/gestion.php?action=14',
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
				url : '../control/gestion.php?action=17',
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