<?php

class ControladorResumen{

	public function list($op,$m,$a){
		require_once "../modelo/resumen.php";
		$r = new Resumen();
		foreach ($r->list($op,$m,$a) as $row) {
			?>
		<tr>
			<td class="text-center"><?php echo $row[0]?></td>
			<td class="text-center"><?php echo $row[2]?></td>
			<td class="text-center"><?php echo $row[3]?></td>
			<td class="text-center"><?php echo $row[4]?></td>
			<td class="text-center"><?php echo $row[7]?></td>
		</tr>
			<?php
		}
	}
}

?>