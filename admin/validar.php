<?php
if(isset($_POST['usuario']) && isset($_POST['password']))
{
  $usuario=$_POST['usuario']; 
  $password=$_POST['password'];//md5($_POST['password']);

  $objCon = mysqli_connect("localhost","root","haciendaroot","dap2015");

  $sql="SELECT * FROM usuario WHERE usuario ='$usuario'";
  
  $rs= mysqli_query($objCon,$sql);
  
  while( $item = mysqli_fetch_array($rs,MYSQLI_ASSOC))
  {
    
    if ( $item['password'] == $password)
      {
            $nombre=$item['nombre'];
           
           //$permiso=$item['permiso'];
            // crear sesion y guardar datos
            session_name("sesion_dap");
            // incia sessiones
            session_start();
            $_SESSION['sesion_usuario'] = $item['usuario'];
            $_SESSION['sesion_id'] = $item['id'];
            $_SESSION['sesion_nombre'] = $item['nombre'];
            $_SESSION['sesion_permisos'] = $item['permiso'];
            
            /*if ($permiso==2) {
              //
               echo "<script language=Javascript> location.href=\"panelprof/panelprof.php\"; </script>";
            //echo "Acceso Correcto";
            exit();
            }*/
            echo "<script language=Javascript> location.href=\"paneldecontrol.php\"; </script>";
            //echo "Acceso Correcto";
            exit();
            }
            else
                { //$mensaje='Password Incorrecto';
                 echo "<script language=Javascript> location.href=\"index.php?mensaje='Password Incorrecto'\"; </script>";
                 exit();
                 }
       }//fin while
      // $mensaje= 'Usuario no existente en la base de datos';
      
       echo "<script language=Javascript> location.href=\"index.php?mensaje='Usuario no existente en la Base de Datos'\"; </script>";
       exit();
}else{
        //echo 'Debe especificar un usuario y password';
         echo "<script language=Javascript> location.href=\"index.php?mensaje='Debe especificar un Usuario y Password'\"; </script>";
         exit();
   }
?>
