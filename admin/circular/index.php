<?php
include("circular.php");
include '../menu.php';
?>
<h3>Circulares CGP</h3>
<hr>
<div id="div_dinamico">
    <p> <a href="nuevo.php" > Agregar Circular</a></p>
   
    <table class="table" id="listado">
	<thead>
		<th>ID</th>
		<th>Nº</th>
		<th>Asunto</th>
		<th>Tema</th>
		<th>Fecha</th>
		<th>Estado</th>
		<th></th>
        <th></th>
	</thead>
	<tbody>
		 <?php
		 	$vehiculos = Circular::lista();
		 	foreach($vehiculos as $veh)
            {
		 		$id = $veh['id'];
		 		?>
		 		<tr>
		 			<td><? echo $veh['id']; ?></td>
		 			<td><? echo $veh['numero'];?></td>
                     <td><? echo $veh['asunto']; ?></td>
		 			<td><? echo $veh['temacircular'];?></td>
		 			<td><? echo $veh['fecha']; ?></td>
		 			<td><? echo $veh['estado'];?></td>
	 			
					<td><a href='editar.php?id=<? echo $id;?>'>Modificar</a></td>
					<td><a href='borrar.php?id=<? echo $id;?>'>Eliminar</a></td>
				</tr>
      <?
      
		 	}
		?>
	</tbody>	

</fieldset>
</table>
