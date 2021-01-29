<?php

class ControladorProducto{

	public function list(){
		require_once "../modelo/producto.php";
		$p = new Producto();
		foreach ($p->list() as $row) {
			?>
			<tr>
			    <td><?php echo $row[0]?></td>
			    <td class="text-center"><?php echo $row[1]?></td>
			    <td class="text-center"><?php echo $row[2]?></td>
			    <td class="text-center"><?php echo $row[3]?></td>
			    <td class="text-center"><?php echo $row[4]?></td>
			    <td class="text-center"><?php echo $row[5]?></td>
			    <td class="text-center"><?php echo $row[6]?></td>
			    <td class="text-center"><?php echo $row[7]?></td>
			    <td class="text-center">
			    	<?php if( $_SESSION["cargo"] != 2 ) { ?>
	               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
	                  <i class="fas fa-pencil-alt"></i>
	                     Editar
	                </button>
	            	<?php } ?>
	                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" onclick="descontar(<?php echo $row[0] ?>)" data-target="#modal-descontar">
	                  <i class="fas fa-trash"></i>
	                     Descontar
	                </button>
			    </td>
			</tr>  
			<?php
		}
	}
}

?>