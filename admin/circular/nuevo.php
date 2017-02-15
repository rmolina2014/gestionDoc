<?php
include("circular.php");
include '../menu.php';
$objecto = new Circular();
if( isset($_POST['nombre']) && !empty($_POST['nombre']) )
{
  $asunto= $_POST['nombre'];
  $numero= $_POST['numero'];
  $temacircular_id= $_POST['temacircular_id'];
  $fecha= $_POST['fecha'];
  $estado= $_POST['estado'];
  /*subir circular*/
      $status = "";
      if ($_POST["action"] == "upload")
      {
         // obtenemos los datos del archivo
         $tamano = $_FILES["archivo"]['size'];
         $tipo = $_FILES["archivo"]['type'];
         $archivo = $_FILES["archivo"]['name'];
         if ($archivo != "")
         {
           // guardamos el archivo a la carpeta files
           $destino =  "../circulares/".$archivo;
           if (copy($_FILES['archivo']['tmp_name'],$destino))
           {
           
          // nombre modificado del archivo
          $nuevo_name='cir_'.$archivo;
          rename("../circulares/".$archivo,"../circulares/".$nuevo_name);
          //fin del renombrar
             $status = "Archivo subido: <b>".$nuevo_name."</b>";
         }
         else {
                  $status  = "Error al Copiar el Archivo";
                          }
        }//fin del if del subir archivo
        else
        {
           $status  = "Achivo esta vacio";
                }

      }//fin del subir archivo
          
  /*fin de subir circular*/

  $todobien = $objecto->guardar($numero,$asunto,$temacircular_id,$fecha,$estado,$nuevo_name);
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
 <h3>Circulares CGP</h3>
 <hr>
 <div class="container">
 <div class="row">
 <div class="col-md-12">
  <h4>Agregar Circular</h4>
  <hr>
  <form enctype="multipart/form-data" method="POST" role="form" action="nuevo.php">
   <input name="MAX_FILE_SIZE" value="20200000" type="hidden">
   <input name="action" value="upload" type="hidden">

  <div class="col-md-8">
    <label>Circular Nº </label>
    <input name="numero"  class="form-control" type="text" tabindex="1"  required />
  </div>

  <div class="col-md-8">
    <label >Asunto</label>
    <input name="nombre"  class="form-control" type="text" tabindex="1"  required />
  </div>

  <div class="col-md-8">
    <label >Tema</label>
    <select class="form-control" name="temacircular_id" id="temacircular_id">
      <option value="">Seleccionar.....</option>
    </select>
  </div>

  <div class="col-md-8">
    <label >Fecha</label>
    <input type="date" name="fecha"  class="form-control" type="text" tabindex="1"  required />
  </div>

  <div class="col-md-8">
    <label >Archivo</label>
    <input type="file" name="archivo"  class="form-control" type="text" tabindex="1"  required />
  </div>
  

  <div class="col-md-8">
    <label >Estado</label>
    <select class="form-control" name="estado">
    
    <option value="">Seleccionar.....</option>
    
    <option value="Vigente">Vigente</option>
    <option value="No Vigente">No Vigente</option>
    <option value="Modificado">Modificado</option>
    <option value="No Modificado">No Modificado</option>
    <option value="En Actualización">En Actualización</option>
  </select>
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
 <!-- /. ROW  -->

  <script src="../js/jquery-1.10.2.js"></script>
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
  <script type="text/javascript">
 
   function llenarComboTC(){
     $.ajax({
      url: 'listaTC.php',
      type: 'POST',
      success:function(data){
         $('#temacircular_id').html(data);
      }
    });
    }

 $(document).ready(function()
  {

     llenarComboTC();

    $("#cuit").mask("99-99999999-9");

    //validar que el cuit no este repetido
     $("#cuit").blur(function(){
        $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
        var cuit = $(this).val();        
        var dataString = 'cuit='+cuit;
        $.ajax({
            type: "POST",
            url: "validarCuit.php",
            data: dataString,
            success: function(data) {
                 //alert(data);
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });  

   
 });
</script>
</body>
</html>
