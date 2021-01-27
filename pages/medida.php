<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	include_once "../control/method.php";
	$n = $_SESSION["nombre"];
	$c = $_SESSION["cargo"];
	$t = "Medidas";
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
	                Cerrar Sesion
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
	            <h1 class="m-0 text-dark">Lista de Medidas del cliente: <?php obtenerNombreCLiente($_GET["id"]); ?> </h1>
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
	                  	listaMedida($_GET["id"]);
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
					url : '../control/gestion.php?action=2',
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
					url : '../control/gestion.php?action=4',
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
			var parametros = {"idcliente": id};	
			$.ajax({
				url : '../control/gestion.php?action=3',
				type : 'POST',
				dataType : 'json',
				data : parametros,
				success : function(data){
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
			var cliente = $("#id").val();
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
						url : '../control/gestion.php?action=20',
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