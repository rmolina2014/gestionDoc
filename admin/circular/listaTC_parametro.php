<?php
include("../temacircular/temacircular.php");
$vehiculos = TemaCircular::lista();
foreach($vehiculos as $veh)
{
  	if ($veh['id']==$id)
   	{
   		?>
   		<option value="<? echo $veh['id']; ?>" > <? echo $veh['nombre']; ?> </option>
   		<?
   	}
   	else {
?>
   	     <option value="<? echo $veh['id']; ?>" > <? echo $veh['nombre']; ?> </option>	

   	<?
   	}
  	 
}
?>
	