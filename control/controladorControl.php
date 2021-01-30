<?php

class ControladorControl{

	public function list(){
		require_once "../modelo/control.php";
		$c = new Control();
		foreach ($c->list() as $row) {
			?>
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[4]?></td>
		    <td class="text-center"><span class='badge badge-danger'>Operario</span></td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center"><?php echo $row[7]?></td>
		    <td class="text-center">
               	<a href="calendario.php?id=<?php echo $row[0]?>" class="btn btn-primary btn-sm">
                  <i class="fas fa-folder"></i>
                     Ver Trabajo
                </a>
		    </td>
		</tr>  
			<?php
		}
	}
}

?>