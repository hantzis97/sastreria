<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Control de trabajo")?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Control de trabajo","Control de Trabajo") ?>		

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

	    </div>

	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	 <?php $layout->footer() ?>

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
		  		events: '../control/getControl.php?action=1&op='+nomboperario,
		  
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
		          $('#id').val(info.event.id);
		          $('#Titulo').val(info.event.title);
		          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
		          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
		          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
		          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
		          $('#ColorFondo').val(info.event.backgroundColor);
		          $("#prenda").val(info.event.extendedProps.prenda);
		          $("#cantidad").val(info.event.extendedProps.estado);       
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
		          $("#prenda").val(info.event.extendedProps.prenda);
		          $("#cantidad").val(info.event.extendedProps.estado);
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
	          url: '../control/getControl.php?action=2',
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
	          url: '../control/getControl.php?action=3',
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
	          url: '../control/getControl.php?action=4',
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
	          url: '../control/getControl.php?action=5',
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
    
	})
	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>