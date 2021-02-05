<?php
session_start();
if ( isset($_SESSION["usuario"]) ){
	require_once "../layouts/layout.php";
	$layout = new Layout();
	?>
<!DOCTYPE html>
<html lang="es">

<?php $layout->head("Principal")?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
	<?php $layout->sidebar()?>
	<?php $layout->wrapper("Menu Principal","Contenido") ?>
	<?php $layout->ContentMain() ?>

	       	<div class="row">
	          <!-- /.col-md-6 -->
	          <div class="col-lg-6">
	            <div class="card">
	              <div class="card-header">
	              	CANTIDAD DE PRODUCTOS &nbsp;
	              	<a href="../control/getReporteProducto.php" class="btn btn-success" >REPORTE</a>
	              </div>
	              <div class="card-body">
	              	<canvas id="producto" width="200" height="100">
	              		
	              	</canvas>
	              </div>
	            </div>
	          </div>
	          <!-- /.col-md-6 -->
	         <div class="col-lg-6">
	            <div class="card">
	              <div class="card-header">
	              	MEDIDAS TOMADAS A LOS CLIENTES DESDE HACE 7 DIAS &nbsp;
	              	<a href="../control/getReporteMedida.php" class="btn btn-success">REPORTE</a>
	              </div>
	              <div class="card-body">
	              	<canvas id="medida" width="200" height="100">
	              		
	              	</canvas>
	              </div>
	            </div>
	          </div>
	        </div>
	        <!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>		
	    <!-- /.content -->
	  </div>
	<?php $layout->footer()?>

	<script>
		$(document).ready(function(){
			$.ajax({
				url : '../control/controladorGrafico.php?action=1',
				type : 'POST',
				dataType : 'json',
				success : function (data){
					console.log(data);
					var np = [];
					var stock = [];
					var bg = [];
					for ( var i = 0 ; i < data.length; i++){
						np.push(data[i][0]);
						stock.push(data[i][1]);
						bg.push('rgba('+parseInt(Math.random()*(255))+','+parseInt(Math.random()*(255))+','+parseInt(Math.random()*(255))+',1)'); 
					}
					crearGrafico("producto","bar","CANTIDAD DE PRODUCTOS",np,stock,bg);
				}
			})
			$.ajax({
				url : '../control/controladorGrafico.php?action=2',
				type : 'POST',
				dataType : 'json',
				success : function (data){
					var np = [];
					var stock = [];
					var bg = [];
					for ( var i = 0 ; i < data.length; i++){
						np.push(data[i][0]);
						stock.push(data[i][2]);
						bg.push('rgba('+parseInt(Math.random()*(255))+','+parseInt(Math.random()*(255))+','+parseInt(Math.random()*(255))+',1)'); 
					}
					crearGrafico("medida","bar","CANTIDAD DE MEDIDAS TOMADAS",np,stock,bg);
				}
			})
		})
	</script>

	<script>
		function crearGrafico(id,tipo,titulo,label,data,color){
				var ctx = document.getElementById(id).getContext("2d");
				var myChart = new Chart (ctx,{
						type : tipo,
						data: {
							labels : label,
							datasets : [{
								label: titulo,
								data : data,
								backgroundColor: color ,
					            borderColor: color,
					            borderWidth: 1
							}]
						},
							 options: {
						        scales: {
						            yAxes: [{
						                ticks: {
						                    beginAtZero: true
						                }
						            }]
						        }
						   }
					});
		}
	</script>
	</body>
	</html>

	<?php


}else{
	header('Location: ../index.php');
}

?>