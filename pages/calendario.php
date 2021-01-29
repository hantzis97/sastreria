<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	//include_once "pagina.php";
	include_once "../control/method.php";	
	$n = $_SESSION["nombre"];
	$c = $_SESSION["cargo"];
	$t = "Control de Trabajo";
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
	  	<link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.css" >
	  	<link rel="stylesheet" href="../plugins/clockpicker/clockpicker.css" >
	    <link href="../plugins/fullcalendar/core/main.css" rel="stylesheet">
  		<link href="../plugins/fullcalendar/daygrid/main.css" rel="stylesheet">
  		<link href="../plugins/fullcalendar/timegrid/main.css" rel="stylesheet">
  		<link href="../plugins/fullcalendar/list/main.css" rel="stylesheet">
  		<link href="../plugins/fullcalendar/bootstrap/main.css" rel="stylesheet">
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
	            <h1 class="m-0 text-dark">Control de trabajo</h1>
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
	                    	<i class="fas fa-globe"></i> Operario: <?php echo obtenerNombreOperaro($_GET["id"]) ?>
	                    	<small class="float-right row">          
				            </small>
				            </h3>
				            <div class="row">
				                    <div class="col-sm-4">
				                      <div class="form-group">
				                        <select class="form-control" id="meses">
				                          <option value="0">Mes</option>
				                          <option value="Enero">Enero</option>
				                          <option value="Febrero">Febrero</option>
				                          <option value="Marzo">Marzo</option>
				                          <option value="Abril">Abril</option>
				                          <option value="Mayo">Mayo</option>
				                          <option value="Junio">Junio</option>
				                          <option value="Julio">Julio</option>
				                          <option value="Agosto">Agosto</option>
				                          <option value="Septiembre">Septiembre</option>
				                          <option value="Octubre">Octubre</option>
				                          <option value="Noviembre">Noviembre</option>
				                          <option value="Diciembre">Diciembre</option>
				                        </select>
				                      </div>
				                    </div>
				                    <div class="col-sm-4">
				                      <div class="form-group">
				                        <select class="form-control" id="anio">
				                          <option value="0">Año</option>
				                          <option value="2021">2021</option>
				                          <option value="2022">2022</option>
				                          <option value="2023">2023</option>
				                          <option value="2024">2024</option>
				                          <option value="2025">2025</option>
				                        </select>
				                      </div>
				                    </div>
				                    <div class="col-sm-4">
				                    	<button type="button" id="BotonResumen" class="btn btn-primary">Resumen</button>
				                    </div>
				                </div>
			            </div>	                                       		           	          
		            <div class="card-body">
		              		<div id="calendar"></div>
		              </div>
		            </div>
	          </div>
	        </div>
	     </div>
	        <!-- /.row -->
	   </div><!-- /.container-fluid -->


	     <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		        	<h2 id="titulodia"></h2>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		        </div>
		        <div class="modal-body">
		        	<div class="form-row">
			            <div class="form-group col-md-12">        
			              <div class="input-group" data-autoclose="true">
			              	<input type="hidden" name="id" id="id">
			              	<input type="hidden" name="nombre" id="nombre" value="<?php echo $_GET["id"]?>">			           
			              </div>
			            </div>
		          	</div>	
		          <div class="form-row">
		            <div class="form-group col-md-6">
		              <label>Fecha de inicio:</label>

		              <div class="input-group" data-autoclose="true">
		                <input type="date" id="FechaInicio" value="" class="form-control" />
		              </div>
		            </div>
		            <div class="form-group col-md-6" id="TituloHoraInicio">
		              <label>Hora de inicio:</label>

		              <div class="input-group clockpicker" data-autoclose="true">
		                <input type="text" id="HoraInicio" value="" class="form-control" autocomplete="off" />
		              </div>
		            </div>
		          </div>

		          <div class="form-row">
		            <div class="form-group col-md-6">
		              <label>Fecha de fin:</label>

		              <div class="input-group" data-autoclose="true">
		                <input type="date" id="FechaFin" value="" class="form-control" />
		              </div>
		            </div>
		            <div class="form-group col-md-6" id="TituloHoraFin">
		              <label>Hora de fin:</label>

		              <div class="input-group clockpicker" data-autoclose="true">
		                <input type="text" id="HoraFin" value="" class="form-control" autocomplete="off" />
		              </div>
		            </div>
		          </div>

		          <div class="form-row">
			            <div class="form-group col-md-12">
			              <label>Prenda:</label>
			              <div class="input-group" data-autoclose="true">
			              	<select class="form-control" id="prenda" name="prenda">
			              		<option value="0">Buscar...</option>
			              		<?php listarPrendas()?>
			              	</select>			           
			              </div>		         
			            </div>
		          	</div>
		           <div class="form-group" id="est">
		            	<label>Cantidad</label>
		            	<input type="number" class="form-control" name="cantidad" id="cantidad">
		          </div>	

		        </div>
		        <div class="modal-footer">
		          <button type="button" id="BotonAgregar" class="btn btn-success">Agregar</button>
		          <button type="button" id="BotonModificar" class="btn btn-success">Modificar</button>
		          <button type="button" id="BotonEliminar" class="btn btn-danger">Eliminar</button>
		          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>

		        </div>
		      </div>
		    </div>
		  </div>

		  <!-- MODAL DEL RESUMEN -->

		<div class="modal fade" id="FormularioResumen" tabindex="-1" role="dialog">
		    <div class="modal-dialog modal-lg" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		        	<h2 align="center" id="tituloresumen">Resumen</h2>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		        </div>
		        <div class="modal-body">
					<table id="tbresumen" class="table table-bordered table-hover">
	                  <thead>
		                  <tr>
		                    <th class="text-center">#ID</th>
		                    <th class="text-center">Fecha Inicio</th>
		                    <th class="text-center">Fecha Final</th>
		                    <th class="text-center">Prenda</th>
		                  </tr>
	                  </thead>
	                  <tbody id="datos">
	                  	 
	                  </tbody>
	                  <tfoot>
		                  <tr>
		                    <th class="text-center">#ID</th>
		                    <th class="text-center">Fecha Inicio</th>
		                    <th class="text-center">Fecha Final</th>
		                    <th class="text-center">Prenda</th>
		                  </tr>
	                  </tfoot>
                	</table>
		        </div>
		        <div class="modal-footer">

		        </div>
		      </div>
		    </div>
		</div>

	    </div>

	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->


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

	<script>
		$(document).ready(function(){


			var nomboperario = $("#nombre").val();
			$('.clockpicker').clockpicker();
		
			var calendarEl = document.getElementById('calendar');
	        var calendar = new FullCalendar.Calendar(calendarEl, {
	        	plugins: ['dayGrid', 'timeGrid', 'interaction'],
	        	showNonCurrentDates: false,
	        	droppable: true,
	        	locale: 'es',
	        	header: {
				    left: 'prev,next today',
				    center: 'title',
				    right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				initialView: 'dayGridMonth',
				editable: true,
		  		events: '../control/gestion.php?action=21&op='+nomboperario,
		  
		  		 dateClick: function(info) {
		          limpiarFormulario();
		          $('#BotonAgregar').show();
		          $('#BotonModificar').hide();
		          $('#BotonEliminar').hide();
		          $("#titulodia").html("Asignar Prenda");
		          if (info.allDay) {
		            $('#FechaInicio').val(info.dateStr);
		            $('#FechaFin').val(info.dateStr);
		          } else {
		            let fechaHora = info.dateStr.split("T");
		            $('#FechaInicio').val(fechaHora[0]);
		            $('#FechaFin').val(fechaHora[0]);
		            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
		          }
		          $("#FormularioEventos").modal();
		        },
		        eventClick: function(info) {
		          $('#BotonModificar').show();
		          $('#BotonEliminar').show();
		          $('#BotonAgregar').hide();
		          $("#titulodia").html("Modificar Prenda");
		          $('#id').val(info.event.id);
		          $("#operario").val(info.event.title);
		          $("#prenda").val(info.event.extendedProps.prenda);
		          $("#cantidad").val(info.event.extendedProps.estado);
		          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
		          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
		          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
		          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
		          $("#FormularioEventos").modal();
		        },
		        eventResize: function(info) {
		        	alert("hola");
		          $('#id').val(info.event.id);
		          $('#Titulo').val(info.event.title);
		          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
		          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
		          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
		          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
		          $('#ColorFondo').val(info.event.backgroundColor);
		          $("#estado").val(info.event.extendedProps.estado);
		          //$('#ColorTexto').val(info.event.textColor);
		          //$('#Descripcion').val(info.event.extendedProps.descripcion);          
		          let registro = recuperarDatosFormulario();
		          modificarRegistro(registro);
		        },
		        eventDrop: function(info) {
		          $('#id').val(info.event.id);
		          $('#Titulo').val(info.event.title);
		          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
		          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
		          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
		          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
		          $('#ColorFondo').val(info.event.backgroundColor);
		          $("#estado").val(info.event.extendedProps.estado);
		          //$('#ColorTexto').val(info.event.textColor);
		          //$('#Descripcion').val(info.event.extendedProps.descripcion);
		          let registro = recuperarDatosFormulario();
		          modificarRegistro(registro);
		        }


		        });

        		calendar.render();
        

       // EVENTOS DE LOS BOTONES 

        $('#BotonAgregar').click(function() {
        	let registro = recuperarDatosFormulario();
       	 	agregarRegistro(registro);
        	$("#FormularioEventos").modal('hide');
      	});

      	$('#BotonModificar').click(function() {
        	let registro = recuperarDatosFormulario();
        	modificarRegistro(registro);
        	$("#FormularioEventos").modal('hide');
      	});	

      	$('#BotonEliminar').click(function() {
        	let registro = recuperarDatosFormulario();
        	borrarRegistro(registro);
        	$("#FormularioEventos").modal('hide');
      	});	

      	$('#BotonResumen').click(function() {
        	let registro = recuperarMesAnio();
        	if ( $("#meses").val() != 0 && $("#anio").val() != 0 ){
        		obtenerResumen(registro);
        	}else{
        		Swal.fire('Ingrese Mes y Año');
        	}
      	});	


      	// FUNCIONES DE LOS BOTONES

      	function agregarRegistro(registro) {
	        $.ajax({
	          type: 'POST',
	          url: '../control/gestion.php?action=22',
	          data: registro,
	          success: function(msg) {
	            calendar.refetchEvents();
	          },
	          error: function(error) {
	            alert("Hay un problema:" + error);
	          }
	        });
      }

       	function modificarRegistro(registro) {
	        $.ajax({
	          type: 'POST',
	          url: '../control/gestion.php?action=23',
	          data: registro,
	          success: function(msg) {
	            calendar.refetchEvents();
	          },
	          error: function(error) {
	            alert("Hay un problema:" + error);
	          }
	        });
      }

        function borrarRegistro(registro) {
	        $.ajax({
	          type: 'POST',
	          url: '../control/gestion.php?action=24',
	          data: registro,
	          success: function(msg) {
	            calendar.refetchEvents();
	          },
	          error: function(error) {
	            alert("Hay un problema:" + error);
	          }
	        });
      }

      function obtenerResumen(registro) {
	        $.ajax({
	          type: 'POST',
	          url: '../control/gestion.php?action=25',
	          data: registro,
	          dataType : 'json',
	          success: function(data) {
	          	if ( data != null ){
	   				window.location.href = "resumen.php?op="+registro.nombre+"&m="+registro.mes+"&a="+registro.anio;	
	          	}else{
	          		Swal.fire('Datos no encontrados');
	          	}      
	          },
	          error: function(error) {
	            alert("Hay un problema:" + error);
	          }
	        });
      }

      	function limpiarFormulario() {
        	$('#FechaInicio').val('');
        	$('#FechaFin').val('');
        	$('#HoraInicio').val('');
        	$("#HoraFin").val('');
        	$("#operario").val(0);
        	$("#prenda").val(0);
        	$("#cantidad").val(0);

      }

      function recuperarDatosFormulario() {
        let registro = {
          id: $("#id").val(),
          operario: $("#nombre").val(),
          inicio: $('#FechaInicio').val() + ' ' + $('#HoraInicio').val(),
          fin: $('#FechaFin').val() + ' ' + $('#HoraFin').val(),
          prenda: $("#prenda").val(),
          //fondo: $("#ColorFondo").val(),
          cantidad: $("#cantidad").val()
        };
        return registro;
      }

      function recuperarMesAnio() {
        let registro = {
          	mes : $("#meses").val(),
      		anio : $("#anio").val(),
      		nombre : $("#nombre").val()
        };
        return registro;
      }

      function IniciarDataTable(){
      	$("#tbresumen").DataTable({
      		  'paging'      : true,
		      'lengthChange': true,
		      'searching'   : false,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true,
		      'language' :{
		        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"  
		      }
      	});
      }


    
	})
	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>