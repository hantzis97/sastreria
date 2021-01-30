<?php
	class Layout{

		function head($t){
		?>		
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
			<link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.css" >
		  	<link rel="stylesheet" href="../plugins/clockpicker/clockpicker.css" >
		    <link href="../plugins/fullcalendar/core/main.css" rel="stylesheet">
	  		<link href="../plugins/fullcalendar/daygrid/main.css" rel="stylesheet">
	  		<link href="../plugins/fullcalendar/timegrid/main.css" rel="stylesheet">
	  		<link href="../plugins/fullcalendar/list/main.css" rel="stylesheet">
	  		<link href="../plugins/fullcalendar/bootstrap/main.css" rel="stylesheet">
		</head>
		<?php
		}

		function sidebar(){
			$c = $_SESSION["cargo"];
			?>
			  <!-- Navbar -->
			  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			      </li>
			    </ul>   
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
			          <a href="#" class="d-block"><?php echo $_SESSION["nombre"]?></a>
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

			<?php
		}

		function wrapper($t,$h){
			include_once "../control/method.php";
			?>
			<div class="content-wrapper">
			    <!-- Content Header (Page header) -->
			    <div class="content-header">
			      <div class="container-fluid">
			        <div class="row mb-2">
			          <div class="col-sm-6">
			            <h1 class="m-0 text-dark"><?php echo $h?></h1>
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

			<?php
		}
		function contentMain(){
			?>
			<!-- CONTENIDO DE LOS MENU --> 	 
			    <!-- Main content -->
			    <div class="content">
			      <div class="container-fluid">
			        <div class="row">
			          <div class="col-lg-3 col-6">
			            <!-- small box -->
			            <div class="small-box bg-info">
			              <div class="inner">
			                <h3><?php echo obtenerCantidad(1)?></h3>

			                <p>Clientes</p>
			              </div>
			              <div class="icon">
			                <i class="ion ion-person-add"></i>
			              </div>
			              <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
			            </div>
			          </div>
			          <!-- ./col -->
			          <div class="col-lg-3 col-6">
			            <!-- small box -->
			            <div class="small-box bg-success">
			              <div class="inner">
			                <h3><?php echo obtenerCantidad(2)?></h3>

			                <p>Productos</p>
			              </div>
			              <div class="icon">
			                <i class="ion ion-tshirt-outline"></i>
			              </div>
			              <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
			            </div>
			          </div>
			          <!-- ./col -->
			          <div class="col-lg-3 col-6">
			            <!-- small box -->
			            <div class="small-box bg-warning">
			              <div class="inner">
			                <h3><?php echo obtenerCantidad(3)?></h3>

			                <p>Material</p>
			              </div>
			              <div class="icon">
			                <i class="ion ion-person-add"></i>
			              </div>
			              <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
			            </div>
			          </div>
			          <!-- ./col -->
			          <div class="col-lg-3 col-6">
			            <!-- small box -->
			            <div class="small-box bg-danger">
			              <div class="inner">
			                <h3><?php echo obtenerCantidad(4)?></h3>

			                <p class="text-center">Medidas</p>
			              </div>
			              <div class="icon">
			                <i class="ion ion-scissors"></i>
			              </div>
			              <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
			            </div>
			          </div>
			          <!-- ./col -->
			        </div>
			<?php
		}

		function footer(){
			?>
			  <footer class="main-footer">
			    <!-- To the right -->
			    <div class="float-right d-none d-sm-inline">
			      Anything you want
			    </div>
			    <!-- Default to the left -->
			    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
			  </footer>
			</div>
				<script src="../plugins/jquery/jquery.min.js"></script>
				<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<script src="../dist/js/adminlte.min.js"></script>
				<script src="../plugins/datatables/datatables.js"></script>
				<script src="../plugins/sweetalert/sweetalert.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
				<script src="../plugins/fullcalendar/fullcalendar.js"></script>
				<script src="../plugins/fullcalendar/core/locales-all.js"></script>
				<script src="../plugins/clockpicker/clockpicker.js"></script>
				<script src='../plugins/moment/moment-with-locales.js'></script>
				<script src='../plugins/fullcalendar/core/main.js'></script>
			  	<script src='../plugins/fullcalendar/daygrid/main.js'></script>
			  	<script src='../plugins/fullcalendar/timegrid/main.js'></script>
			  	<script src='../plugins/fullcalendar/interaction/main.js'></script>
			  	<script src='../plugins/fullcalendar/list/main.js'></script>
			  	<script src='../plugins/fullcalendar/bootstrap/main.js'></script>
			<?php
		}
	}
	
?>
