<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	//include_once "pagina.php";
	include_once "../control/method.php";	
	$n = $_SESSION["nombre"];
	$c = $_SESSION["cargo"];
	$t = "Resumen de Trabajo";
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
	            <h1 class="m-0 text-dark">Resumen del trabajo</h1>
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
								<?php listarResumen($_GET["op"],$_GET["m"],$_GET["a"])?>
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
	        <!-- /.row -->
	   </div><!-- /.container-fluid -->

	    </div>

	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->


	  <!-- Main Footer -->
	  <footer class="main-footer">
	    <!-- To the right -->
	    <div class="float-right d-none d-sm-inline">
	      Anything
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