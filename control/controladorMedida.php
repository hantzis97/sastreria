<?php

class ControladorMedida{

	public function list($id){
		require_once "../modelo/medida.php";
		$m = new Medida();
		foreach ( $m->list($id) as $row){
			?>	
			<tr>
			    <td><?php echo $row[0]?></td>
			    <td class="text-center"><?php echo $row[1]?></td>
			    <td class="text-center"><?php echo $row[2]?></td>
			    <td class="text-center"><?php echo $row[3]?></td>
			    <td class="text-center"><?php echo $row[6]?></td>
			    <td class="text-center">
	               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
	                  <i class="fas fa-pencil-alt"></i>
	                     Editar
	                </button>
	                <button type="button" class="btn btn-danger btn-sm"  onclick="eliminar(<?php echo $row[0] ?>)" >
	                  <i class="fas fa-trash"></i>
	                     Eliminar
	                </button>
			    </td>
			</tr>  
			<?php
		}
	}
}

?>