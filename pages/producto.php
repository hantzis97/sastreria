<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	//include_once "pagina.php";
	$n = $_SESSION["nombre"];
	$c = $_SESSION["cargo"];
	$t = "Producto";
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
	  <meta charset="utf-8">
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
	          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
	            <a href="calendario.php" class="nav-link">
	              <i class="nav-icon fas fa-users"></i>
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
	            <h1 class="m-0 text-dark">Lista de Productos</h1>
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
	                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-producto">
	                  <i class="fas fa-plus"></i>
	                     Producto
	                </button>
	            	<?php  } ?>
	              </div>
	              <div class="card-body">
	              	<table id="tbcliente" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombre</th>
		                    <th class="text-center">Talla</th>
		                    <th class="text-center">Tipo</th>
		                    <th class="text-center">Marca</th>
		                    <th class="text-center">Color</th>
		                    <th class="text-center">Detalle</th>
		                    <th class="text-center">Stock</th>
		                    <th class="text-center">Acciones</th>
		                  </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  	include_once "../control/method.php";
	                  	listarProductos();
	                  	?>  
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th>#ID</th>
		                    <th class="text-center">Nombre</th>
		                    <th class="text-center">Talla</th>
		                    <th class="text-center">Tipo</th>
		                    <th class="text-center">Marca</th>
		                    <th class="text-center">Color</th>
		                    <th class="text-center">Detalle</th>
		                    <th class="text-center">Stock</th>
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
	            <div class="modal fade" id="modal-producto">
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
				                <form role="form" id="form-producto">
					                <div class="card-body">
					                  	<div class="form-group">
					                    	<label for="nombrep">Nombre del producto</label>
					                    	<input type="text" class="form-control" name="nombrep" id="nombrep" placeholder="Nombre de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="talla">Talla</label>
					                    	<input type="text" class="form-control" name="talla" id="talla" placeholder="Medidas de la Prenda">
					                	</div>
					                	<div class="form-group">
					                    	<label for="tipo">Tipo</label>
					                    	<input type="text" class="form-control" name="tipo" id="tipo" placeholder="Detalles">
					                	</div>
					                	<div class="form-group">
					                    	<label for="marca">Marca</label>
					                    	<input type="text" class="form-control" name="marca" id="marca" placeholder="Detalles">
					                	</div>
					                	<div class="form-group">
					                    	<label for="color">Color</label>
					                    	<input type="text" class="form-control" name="color" id="color" placeholder="Detalles">
					                	</div>
					                	<div class="form-group">
					                    	<label for="detalle">Detalle</label>
					                    	<input type="text" class="form-control" name="detalle" id="detalle" placeholder="Detalles">
					                	</div>
					                	<div class="form-group">
					                    	<label for="stock">Stock</label>
					                    	<input type="number" class="form-control" name="stock" id="stock" placeholder="Detalles">
					                	</div>
					                </div> 
					            </form>
			            	</div>
				            <div class="modal-footer justify-content-between">
				              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
				              <button type="button" id="agregar-producto" class="btn btn-primary">Guardar</button>
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
			              <h4 class="modal-title">Editar Producto</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			                <form role="form" id="form-editar-producto">
					            <div class="card-body">
					                <div class="form-group">
					                    <label for="ednombrep">Nombre del producto</label>
					                    <input type="hidden" name="edid" id="edid">
					                    <input type="text" class="form-control" name="ednombrep" id="ednombrep" placeholder="Nombre de la producto">
					                </div>
					                <div class="form-group">
					                    <label for="edtalla">Talla</label>
					                    <input type="text" class="form-control" name="edtalla" id="edtalla" placeholder="Talla de la Prenda">
					                </div>
					                <div class="form-group">
					                    <label for="edtipo">Tipo</label>
					                    <input type="text" class="form-control" name="edtipo" id="edtipo" placeholder="Tipo">
					                </div>
					                <div class="form-group">
					                    <label for="edmarca">Marca</label>
					                    <input type="text" class="form-control" name="edmarca" id="edmarca" placeholder="Marca">
					                </div>
					                <div class="form-group">
					                    <label for="edcolor">Color</label>
					                    <input type="text" class="form-control" name="edcolor" id="edcolor" placeholder="Color">
					                </div>
					                <div class="form-group">
					                    <label for="eddetalle">Detalle</label>
					                    <input type="text" class="form-control" name="eddetalle" id="eddetalle" placeholder="Detalles">
					                </div>
					                <div class="form-group">
					                    <label for="edstock">Stock</label>
					                    <input type="number" class="form-control" name="edstock" id="edstock" placeholder="Stock">
					               	</div>
					            </div> 
					        </form>
			            </div>
			            <div class="modal-footer justify-content-between">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			              <button type="button" id="editar-producto" class="btn btn-primary">Guardar</button>
			            </div>
			          </div>
			          <!-- /.modal-content -->
			        </div>
			        <!-- /.modal-dialog -->
			      </div>

			    <div class="modal fade" id="modal-descontar">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Descontar Producto</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>
			            <div class="modal-body">
			                <form role="form" id="form-descontar-producto">
					            <div class="card-body">
					                <div class="form-group">
					                    <label for="cantidad">Cantidad a descontar</label>
					                    <input type="hidden" name="deid" id="deid">
					                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
					                </div>
					            </div> 
					        </form>
			            </div>
			            <div class="modal-footer justify-content-between">
			              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			              <button type="button" id="descontar-producto" class="btn btn-primary">Descontar</button>
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

			$("#agregar-producto").click(function(){
				$.ajax({
					url : '../control/gestion.php?action=5',
					type : 'POST',
					data : $("#form-producto").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "producto.php";
						}else if (data == 2 ){
							Swal.fire('Campos vacios');
						}else if (data == 3 ){
							Swal.fire('Error al agregar datos');
						}
						
					}
				})
			})

			$("#editar-producto").click(function(){
				$.ajax({
					url : '../control/gestion.php?action=6',
					type : 'POST',
					data : $("#form-editar-producto").serialize(),
					success : function(data){
						if ( data == 1){
							window.location.href = "producto.php";
						}else if (data == 2 ){
							Swal.fire('Campos vacios / Números negativos');
						}else if (data == 3 ){
							Swal.fire('Error al editar datos');
						}
						
					}
				})
			})

			$("#descontar-producto").click(function(){
				$.ajax({
					url : '../control/gestion.php?action=9',
					type : 'POST',
					data : $("#form-descontar-producto").serialize(),
					success : function(data){
						if ( data == 1){
							$.ajax({
								url : '../control/gestion.php?action=8',
								type : 'POST',
								data : $("#form-descontar-producto").serialize(),
								success : function(data2){
									if ( data2 == 1){
										window.location.href = "producto.php";
									}else if (data2 == 2 ){
										Swal.fire('Campos vacios / Números negativos');
									}else if (data2 == 3 ){
										Swal.fire('Error al descontar datos');
									}
								}
							})
						}else if (data == 2 ){
							Swal.fire('Campos vacios / Números negativos');
						}else if (data == 3 ){
							Swal.fire('Error al descontar datos');
						}else if (data == 4){
							Swal.fire('Insuficiente Stock');
						}
						
					}
				})
			})

	})
	</script>
	<script>
		function editar(id){
			var parametros = {"idproducto": id};	
			$.ajax({
				url : '../control/gestion.php?action=7',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
					$("#ednombrep").val(data.nombre);
					$("#edtalla").val(data.talla)
					$("#edtipo").val(data.tipo);
					$("#edmarca").val(data.marca);
					$("#edcolor").val(data.color);
					$("#eddetalle").val(data.detalle);
					$("#edstock").val(data.stock);
					$("#edid").val(data.id);
				}
			})
		}
	</script>
		<script>
		function descontar(id){
			var parametros = {"idproducto": id};	
			$.ajax({
				url : '../control/gestion.php?action=7',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
					$("#deid").val(data.id);
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