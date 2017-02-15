<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
   <title>Digesto Administrativo Provincial </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css" media="screen">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <script src="js/jquery-1.10.2.min.js"type="text/javascript"></script>
    <!--script src="../js/jquery-2.1.0.min.js"></script-->
    <script src="js/bootstrap.js"></script>
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/respond.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- [If lt IE 8]>
        <link href="css/bootstrap-ie7.css" rel="stylesheet">
    <![Endif] -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container-fluid">
   <div class="row">
        <div class="col-md-12">
          <img src="img/dap2016_3.jpg">
            <div class="jumbotron">
                
                <div class="panel-heading">
                       Ingreso al Sistema Digesto Administrativo Provincial
                </div>
                <div class="panel-body">
                <div class="row">
                <div class="col-lg-4">
                <?
                if(isset($_GET['mensaje']) )
                {
                   echo "<script language=Javascript> alert(".$_GET['mensaje']."); </script>";
                }
                ?>

                <form action="validar.php" method="POST">
                   <div class="form-group">
                        <input type="text" name="usuario" class="form-control" placeholder="Nombre de Usuario" autofocus required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required />
                    </div>          
                    <div class="form-group">                                                            
                      <button type="submit" >Iniciar</button>  
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

  <!-- jQuery Js -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
    </body>
  </html>