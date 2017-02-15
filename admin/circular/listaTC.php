<?php
include("../temacircular/temacircular.php");
$vehiculos = TemaCircular::lista();
foreach($vehiculos as $veh)
{
?>
   	<option value="<? echo $veh['id']; ?>" > <? echo $veh['nombre']; ?> </option>
  <?
}
?>
	