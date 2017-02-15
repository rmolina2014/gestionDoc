<?php
include("../bd/conexion.php");
include("../tema/tema.php");

$vehiculo = new Tema();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
   <title>Digesto Administrativo Provincial </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css" media="screen">
    <link rel="stylesheet" href="../css/bootstrap.css" media="screen">
    <script src="../js/jquery-1.10.2.min.js"type="text/javascript"></script>
    <!--script src="../js/jquery-2.1.0.min.js"></script-->
    <script src="../js/bootstrap.js"></script>
    <script src="../js/css3-mediaqueries.js"></script>
    <script src="../js/respond.min.js"></script>
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

<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">DAP</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php">Digesto Administrativo Provincial</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          
            <li>
              <a href="inicio.php">Inicio</a>
            </li>
             <li>
              <a href="index.php">Buscador</a>
            </li>
            <li>
              <a href="contacto.php">Contacto Sugerencias</a>
            </li>
            <li>
              <a href="http://www.cgp.sanjuan.gov.ar" target="_blank">Contaduria Gral de la Provincia</a>
            </li>
          </ul>
    </div>
</nav>

<div class="container-fluid">
 <ul class="nav nav-pills">
    <li> <a href="../documento/index">Documentos</a>       </li>
    <li> <a href="../tema/index">Temas</a>       </li>
    <li> <a href="../palabraClave/index">Palabras Claves</a>       </li>
    <li> <a href="../palabraClave/index">circulares CGP</a>       </li>
    <li> <a href="../usuario/index">Usuarios</a>       </li>
</ul>

<div class="container">
<fieldset>
	<legend>Listado de Temas</legend>
<table id="tlbVehiculos">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Modificar</th>
		<th>Eliminar</th>

	</thead>
	<tbody>
		 <?php
		 	$vehiculos = Tema::lista();
		 	foreach($vehiculos as $veh){

		 		$id = $veh['id'];

		 		echo <<<FILA
		 		<tr>
		 			<td>{$veh['id']}</td>
		 			<td>{$veh['nombre']}</td>
		 			
					<td><a href='index.php?editar={$id}'>Mod</a></td>
					<td><a href='index.php?eliminar={$id}'>Eliminar</a></td>

				</tr>


FILA;
		 	}

		?>
	</tbody>	

</fieldset>
</table>
