<?php
include("../bd/conexion.php");

class Buscador{
	
	static function descargar($idArchivo)
	{
       $consulta= "select archivo from circular where id=".$idArchivo;
	   $rs = mysqli_query(conexion::obtenerInstancia(), $consulta);
		if(mysqli_num_rows($rs) >0)
		{
			while($fila = mysqli_fetch_assoc($rs))
			{
				$data[] = $fila;
			}
		}
		return $data;
	} 

	
	static function lista()
	{
		$data = array();
		$consulta = "SELECT
circular.`archivo`,circular.`asunto`,circular.`estado`,circular.`fecha`,circular.`id`,circular.`numero`,temacircular.`nombre`AS temacircular
FROM
    `circular`
    INNER JOIN `temacircular` 
        ON (`circular`.`temacircular_id` = `temacircular`.`id`) order by circular.`numero` desc";
		$rs = mysqli_query(conexion::obtenerInstancia(), $consulta);
		if(mysqli_num_rows($rs) >0)
		{
			while($fila = mysqli_fetch_assoc($rs))
			{
				$data[] = $fila;
			}
		}
		return $data;
	}

	function borrar($id){
		$sql = "delete from circular where id='{$id}'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

	
	static function obtenerId($id)
	{
		$data = array();
		$consulta = "select * from circular where id=$id";
		$rs = mysqli_query(conexion::obtenerInstancia(), $consulta);
		if(mysqli_num_rows($rs) >0)
		{
			while($fila = mysqli_fetch_assoc($rs))
			{
				$data[] = $fila;
			}
		}
		return $data;
	}

}
?>