<?
include("circular.php");
include '../menu.php';
if( isset($_GET['id']) && !empty($_GET['id']) )
 {
  $id=(int)$_GET['id'];
  $registros=Circular::obtenerId($id);
  foreach($registros as $veh)
  {
    $id = $veh['id'];
  ?>
 <h3>Circulares CGP</h3>
 <hr>
 <div class="container">
 <div class="row">
 <div class="col-md-12">
 <h4>Editar Circular</h4> 
 <hr>
 <form class="form-horizontal" role="form" method="POST" action="editar.php">
  <input type="hidden" name="idCircular" value="<?echo $id; ?>" />
  
   <div class="col-md-8">
    <label>Circular Nº </label>
    <input name="numero"  class="form-control" type="text" tabindex="1"  value="<?echo utf8_encode($veh['numero']); ?>" required />
  </div>

  <div class="col-md-8">
    <label >Asunto</label>
    <input name="asunto"  class="form-control" type="text" tabindex="1"  value="<?echo utf8_encode($veh['asunto']); ?>" required />
  </div>

  <div class="col-md-8">
    <label >Tema</label>
    <select class="form-control" name="temacircular_id" id="temacircular_id">
      <option value="">Seleccionar.....</option>
    </select>
  </div>

  <div class="col-md-8">
    <label >Fecha</label>
    <input type="date" name="fecha"  class="form-control" type="text" tabindex="1"  value="<?echo utf8_encode($veh['fecha']); ?>" required />
  </div>

  <div class="col-md-8">
    <label >Archivo</label>
    <input type="text" name="archivo"  class="form-control" type="text" tabindex="1"  value="<?echo utf8_encode($veh['archivo']); ?>" required />
  </div>
  

  <div class="col-md-8">
    <label >Estado</label>
    <select class="form-control" name="estado">
      <option value="">Seleccionar.....</option>
      <option value="Vigente">Vigente</option>
      <option value="No Vigente">No Vigente</option>
      <option value="Modificado">Modificado</option>
      <option value="No Modificado">No Modificado</option>
      <option value="En Actualización." selected="selected">En Actualización</option>     
     <?php 
     echo $veh['estado'];
     if ($veh['estado']=="En Actualización.")
     {
      ?>
      <option value="Vigente">Vigente</option>
      <option value="No Vigente">No Vigente</option>
      <option value="Modificado">Modificado</option>
      <option value="No Modificado">No Modificado</option>
      <option value="En Actualización." selected="selected">En Actualización</option>     
     <?php
     }
     if ( $veh['estado']=="Vigente")
     {
      ?>
      <option value="Vigente" selected="selected">Vigente</option>
      <option value="No Vigente">No Vigente</option>
      <option value="Modificado">Modificado</option>
      <option value="No Modificado">No Modificado</option>
      <option value="En Actualización" >En Actualización</option>     
     <?php
     }
      if ( $veh['estado']=="No Vigente")
     {
      ?>
      <option value="Vigente" >Vigente</option>
      <option value="No Vigente" selected="selected">No Vigente</option>
      <option value="Modificado">Modificado</option>
      <option value="No Modificado">No Modificado</option>
      <option value="En Actualización" >En Actualización</option>     
     <?php
     }
       if ( $veh['estado']=="Modificado")
     {
      ?>
      <option value="Vigente" >Vigente</option>
      <option value="No Vigente" >No Vigente</option>
      <option value="Modificado" selected="selected" >Modificado</option>
      <option value="No Modificado">No Modificado</option>
      <option value="En Actualización" >En Actualización</option>     
       <?php
     }
      if ( $veh['estado']=="No Modificado")
     {
      ?>
    <option value="Vigente" >Vigente</option>
    <option value="No Vigente" >No Vigente</option>
    <option value="Modificado" >Modificado</option>
    <option value="No Modificado" selected="selected">No Modificado</option>
    <option value="En Actualización" >En Actualización</option>     
     <?php
      }
      ?>
         
  </select>
  </div>


  <div class="col-md-8">
  <hr>
      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" onclick="location.href='index.php';"><i class="fa fa-times"></i> Cancelar</button>
      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Guardar</button>
  </div>
</form>
<?
}//fin del while
}// fin del if
if( isset($_POST['idCircular']) && !empty($_POST['idCircular']) )
 {
  $id= $_POST['idCircular'];
  $asunto= $_POST['asunto'];
  $numero= $_POST['numero'];
  $temacircular_id= $_POST['temacircular_id'];
  $fecha= $_POST['fecha'];
  $estado= $_POST['estado'];
  $registros=Circular::editar($id,$numero,$asunto,$temacircular_id,$fecha,$estado);

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

  <script src="../js/jquery-1.10.2.js"></script>
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
  <script type="text/javascript">
 
   function llenarComboTC(){
     $.ajax({
      url: 'listaTC_parametro.php',
      type: 'POST',
      success:function(data){
         $('#temacircular_id').html(data);
      }
    });
    }

 $(document).ready(function()
  {

     llenarComboTC();
       
 });
</script>
