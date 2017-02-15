<?
include("temacircular.php");
include '../menu.php';
if( isset($_GET['id']) && !empty($_GET['id']) )
 {
  $id=(int)$_GET['id'];
  $registros=TemaCircular::obtenerId($id);
  foreach($registros as $veh)
  {
    $id = $veh['id'];
  ?>

 <div class="container">

 <div class="row">

 <div class="col-md-12">

 <h4>Editar Tema</h4> 

 <form class="form-horizontal" role="form" method="POST" action="editar.php">

 <input type="hidden" name="idTema" value="<?echo $id; ?>" />

  <div class="col-md-8">
    <label >Nombre </label>
    <input name="nombre"  class="form-control" type="text" tabindex="1" value="<?echo utf8_encode($veh['nombre']); ?>" />
  </div>
  <div class="col-md-8">
  <hr>
      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="location.href='index.php';"><i class="fa fa-times"></i> Cancelar</button>
      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
  </div>
</form>
</div>
</div>
</div>
<?
}//fin del while
}// fin del if
if( isset($_POST['idTema']) && !empty($_POST['idTema']) )
 {
  $id=$_POST['idTema'];
  $nombre= $_POST['nombre'];

   $registros=TemaCircular::editar($id,$nombre);

  if($registros){

      echo "<script language=Javascript> location.href=\"index.php\"; </script>";

      //header('Location: listado.php');

      exit;

    }

    else {

    ?>
         <div class="alert alert-block alert-error fade in" style="max-width: 220px; margin: 0px auto 20px;">
         <button data-dismiss="alert" class="close" type="button">×</button>
         Lo sentimos, no se pudo guardar ...
         </div>
    <?
    }
    }
?>
