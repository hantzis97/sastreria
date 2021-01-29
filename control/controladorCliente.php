<?php

class ControladorCliente{

	public function list(){
				require_once "../modelo/cliente.php";
				$c = new Cliente();
	 					foreach ($c->list() as $cl) {
	 						?>
	 						<tr>
								<td><?php echo $cl[0]?></td>
								<td class="text-center"><?php echo $cl[1]?></td>
								<td class="text-center"><?php echo $cl[2]?></td>
								<td class="text-center">
						            <a class="btn btn-info btn-sm" href="medida.php?id=<?php echo $cl[0]?>">
						                <i class="fas fa-pencil-alt"></i>
						                      Medidas
						                </a>
						        <?php if ( $_SESSION["cargo"] != 2 && $_SESSION["cargo"] != 3 ) {  ?>
						            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="obtenerId(<?php echo $cl[0] ?>)" data-target="#modal-medida">
						               <i class="fas fa-folder"></i>
						                     Nueva Medida
						                </button>
						                <?php  } ?>
								    </td>
							</tr> 	
	 						<?php
	 					}
		}
		
	}


?>