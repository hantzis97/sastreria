<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	?>
	<!DOCTYPE html>
<html lang="es">
	<?php $layout->head("Medida")?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Productos","Lista de Productos") ?>	

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
	                  	include_once "../control/controladorProducto.php";
	                  	$p = new controladorProducto();
	                  	$p->list();	                
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
			              <h4 class="modal-title">Nuevo Producto</h4>
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
	  <?php $layout->footer()?>
	

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
					url : '../control/getProducto.php?action=1',
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
					url : '../control/getProducto.php?action=2',
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