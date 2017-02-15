<?
include("temacircular.php");
include '../menu.php';
if( isset($_GET['id']) && !empty($_GET['id']) )
{
	$id = $_GET['id'];
	$objecto = new TemaCircular();
	$registros = $objecto->borrar($id);
    if($registros > 1){
      echo "se Borror en la BD";
      echo "<script language=Javascript> location.href=\"index.php\"; </script>";
     // header('Location:index.php');
      exit;
    }
    else {
    ?>
         <div class="alert alert-block alert-error fade in" style="max-width: 220px; margin: 0px auto 20px;">
         <button data-dismiss="alert" class="close" type="button">×</button>
         Lo sentimos, no se pudo borrar ...
         </div>
         
    <?
     echo "<script language=Javascript> location.href=\"index.php\"; </script>";
    }
}
?>
