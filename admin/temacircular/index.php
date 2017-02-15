<?php
include("temacircular.php");
include '../menu.php';
$vehiculo = new TemaCircular();
?>
<h3>Temas para Circulares</h3>
<hr>
<div id="div_dinamico">
    <p> <a href="nuevo.php" > Agregar Tema</a></p>
    <table class="table" id="listado">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
		 <?php
		 	$vehiculos = TemaCircular::lista();
		 	foreach($vehiculos as $veh)
            {
		 		$id = $veh['id'];
		 		?>
		 		<tr>
		 			<td><? echo $veh['id']; ?></td>
		 			<td><? echo $veh['nombre'];?></td>
		 			
					<td><a href='editar.php?id=<? echo $id;?>'>Modificar</a></td>
					<td><a href='borrar.php?id=<? echo $id;?>'>Eliminar</a></td>
				</tr>
         <?
  	 	}
		?>
	</tbody>	
</fieldset>
</table>
