<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	$n = $_SESSION["nombre"];
	$c = $_SESSION["cargo"];
	$t = "Materia Prima";
	?>
	<!DOCTYPE html>
	<html lang="es">
	<?php 
		include_once "../layouts/head.php";
		head($t);
	?>
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
	      </nav>
	      <!-- /.sidebar-menu -->
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
	            <h1 class="m-0 text-dark">Lista de Materiales</h1>
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
	              	<?php if ( $c != 2 ) {  ?>
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
	                  	include_once "../control/method.php";
	                  	listarMateria();
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

			$("#agregar-material").click(function(){
				$.ajax({
					url : '../control/gestion.php?action=10',
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
					url : '../control/gestion.php?action=12',
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
				url : '../control/gestion.php?action=11',
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