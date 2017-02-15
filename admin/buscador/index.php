<?php
include("../circular/circular.php");
include '../menu.php';
?>
<h3>Listado de Circulares</h3>
<hr>
<div id="div_dinamico">
    <table class="table table-bordered" id="listado">
	<thead>
		<!--th>ID</th-->
		<th>Nº</th>
		<th>Asunto</th>
		<th>Tema</th>
		<th>Fecha</th>
		<!--th>Estado</th-->
		<th>Descarga</th>
	</thead>
	<tbody>
		 <?php
		 	$vehiculos = Circular::lista();
		 	foreach($vehiculos as $veh)
            {
		 		$id = $veh['id'];
		 		?>
		 		<tr>
		 			<!--td><? echo $veh['id']; ?></td-->
		 			<td><? echo $veh['numero'];?></td>
                    <td><? echo $veh['asunto']; ?></td>
		 			<td><? echo $veh['temacircular'];?></td>
		 			<td><? echo $veh['fecha']; ?></td>
		 			<!--td><? echo $veh['estado'];?></td-->
	 			    <td>
		 
<button type="button" class="btn btn-default btn-xs" onclick="descargar('<? echo $veh['id'];?>')"><span class="glyphicon glyphicon-download-alt" ></span>  Descargar</button>
		        
                  </td>
				</tr>
      <?
      
		 	}
		?>
	</tbody>	
</table>

<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="../js/DataTables-1.10.8/media/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="../js/DataTables-1.10.8/media/js/jquery.js"> </script>
<script type="text/javascript" charset="utf8" src="../js/DataTables-1.10.8/media/js/jquery.dataTables.js"> </script>
<script type="text/javascript">
  function descargar(id){
        window.location="descargar3.php?file="+id;
        
    }
 $(document).ready(function()
  {
       $('#listado').DataTable({
         "oLanguage": {
         "sSearch": "Buscar:"},
        "paging":   false,
        "ordering": false,
        "info":     false
    });

    

   });
 </script>