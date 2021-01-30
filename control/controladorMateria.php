<?php

class ControladorMateria{

	public function list(){
		require_once "../modelo/materia.php";
		$m = new Materia();
		foreach ($m->list() as $row) {
			?>
			<tr>
		    	<td><?php echo $row[0]?></td>
		    	<td class="text-center"><?php echo $row[1]?></td>
		    	<td class="text-center"><?php echo $row[2]?></td>
		   	 	<td class="text-center"><?php echo $row[3]?></td>
		    	<td class="text-center"><?php echo $row[4]?></td>
		    	<td class="text-center"><?php echo $row[5]?></td>
		    	<td class="text-center"><?php echo $row[6]?></td>
		    	<td class="text-center">
               		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
                  <i class="fas fa-pencil-alt"></i>
                     Editar
                	</button>
		    	</td>
			</tr>  
			<?php
		}

	}
}

?>