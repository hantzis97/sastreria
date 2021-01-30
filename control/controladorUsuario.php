<?php

class ControladorUsuario{

	public function list(){
		require_once "../modelo/usuario.php";
		$u = new Usuario();
		foreach ($u->list() as $row) {
			?>
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[1]?></td>
		    <td class="text-center"><?php echo $row[2]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[4]?></td>
		    <td class="text-center">
		    	<?php 
		    		if ( $row[5] == 1){
		    			echo "<span class='badge badge-success'>Sastre</span>";
		    		}else if( $row[5] == 2 ){
		    			echo "<span class='badge badge-warning'>Vendedor</span>";
		    		}else if( $row[5] == 3 ){
		    			echo "<span class='badge badge-danger'>Operario</span>";
		    		}else if( $row[5] == 4 ){
		    			echo "<span class='badge badge-primary'>Administrador</span>";
		    		}

		    	?>
		    </td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center"><?php echo $row[7]?></td>
		    <td class="text-center">
		    	<?php 
		    		if ( $row[8] == 1 ){
		    			echo "<span class='badge badge-success'>Activo</span>";
		    		}else{
		    			echo "<span class='badge badge-danger'>Inactivo</span>";
		    		}
		    	?>
		    </td>
		    <td class="text-center">
               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
                  <i class="fas fa-pencil-alt"></i>
                     Editar
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="estado(<?php echo $row[0] ?>)">
                  <i class="fas fa-folder"></i>
                     Cambiar Estado
                </button>
		    </td>
		</tr> 
			<?php
		}
	}
}

?>