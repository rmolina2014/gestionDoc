<?php
include("temacircular.php");
include '../menu.php';

$objecto = new TemaCircular();
if( isset($_POST['nombre']) && !empty($_POST['nombre']) )
 {
  $nombre= $_POST['nombre'];
  $todobien = $objecto->guardar($nombre);
  if($todobien > 1){
      echo "se Registro en la BD";
      echo "<script language=Javascript> location.href=\"index.php\"; </script>";
     // header('Location:index.php');
      exit;
    }
    else {
    ?>
         <div class="alert alert-block alert-error fade in" style="max-width: 220px; margin: 0px auto 20px;">
         <button data-dismiss="alert" class="close" type="button">×</button>
         Lo sentimos, no se pudo guardar ...
         </div>
         
    <?
     echo "<script language=Javascript> location.href=\"index.php\"; </script>";
    }
}
else
{
?>
 <div class="container">
 <div class="row">
 <div class="col-md-12">
  <h4>Agregar Tema Para Circulares</h4>
  <form role="form" method="POST" action="nuevo.php">
  <div class="col-md-8">
    <label >Nombre</label>
    <input name="nombre"  class="form-control" type="text" tabindex="1"  required />
  </div>
  
  <div class="col-md-8">
  <hr>
      <button type="button" class="btn btn-danger btn-sm  pull-left" data-dismiss="modal" onclick="location.href='index.php';"><i class="fa fa-times"></i> Cancelar</button>
      <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
  </div>

</form>
</div>
</div>
</div>
 <?
 }
 ?>
 