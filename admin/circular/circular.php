<?php
include("../bd/conexion.php");

class Circular{
	private $id = 0;
	private $nombre="";

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}

	function guardar($numero,$asunto,$temacircular_id,$fecha,$estado,$archivo)
	{
     $consulta= "INSERT INTO `circular`
            (`numero`,
             `asunto`,
             `temacircular_id`,
             `fecha`,
             `estado`,
             `archivo`)
			VALUES ('$numero',
			        '$asunto',
			        '$temacircular_id',
			        '$fecha',
			        '$estado',
			        '$archivo');";
	   $rs= mysqli_query(conexion::obtenerInstancia(), $consulta);
	   return $rs;
	} 

	static function editar($id,$numero,$asunto,$temacircular_id,$fecha,$estado)
	{
 	 $consulta= "UPDATE `circular`
					SET 
					  `numero` = '$numero',
					  `asunto` = '$asunto',
					  `temacircular_id` = '$temacircular_id',
					  `fecha` = '$fecha',
					  `estado` = '$estado'
					   WHERE `id` = '$id' ";
	   $rs= mysqli_query(conexion::obtenerInstancia(), $consulta);
	   return $rs;
	 } 

	static function lista()
	{
		$data = array();
		$consulta = "SELECT
circular.`archivo`,circular.`asunto`,circular.`estado`,circular.`fecha`,circular.`id`,circular.`numero`,temacircular.`nombre`AS temacircular
FROM
    `circular`
    INNER JOIN `temacircular` 
        ON (`circular`.`temacircular_id` = `temacircular`.`id`) order by circular.`fecha` desc ;";
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

	function llenarComboEstado()
		{
		       
		  $consulta = "SELECT * FROM doctype";
		  $rs = mysqli_query(conexion::obtenerInstancia(), $consulta);  
          if(mysqli_num_rows($rs) >0)
			{
				while($fila = mysqli_fetch_assoc($rs))
				{
					$data[] = $fila;
				}
			}
		return $data;


		  $resultado=mysql_query($consulta,$conexion);
		  if($j=mysql_fetch_array($resultado))
		    do{
		       echo("<option value=".$j[0].">".$j[1]."</option>");
		       }while($j=mysql_fetch_array($resultado));
		  mysql_close($conexion);
		  
		}

}
?>