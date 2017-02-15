<?php
include("../bd/conexion.php");

class TemaCircular{
	private $id = 0;
	private $nombre="";
	


	public function __get($atributo){

		return $this->$atributo;
	}

	public function __set($atributo, $valor){

		$this->$atributo = $valor;
	}

	function guardar($nombre)
	{
	  //guardar
	   $consulta= "INSERT INTO `temacircular` (`nombre`) VALUES ('$nombre')";
	  // mysqli_query($rs, $consulta);
	   $rs= mysqli_query(conexion::obtenerInstancia(), $consulta);
	   return $rs;
	   //printf ("New Record has id %d.\n", mysqli_insert_id(conexion::obtenerInstancia()));
	} 

	function editar($id,$nombre)
	{
	  $consulta= "UPDATE `temacircular`
                       SET `nombre` = '$nombre'
                         WHERE `id` = '$id';";
	   $rs= mysqli_query(conexion::obtenerInstancia(), $consulta);
	   return $rs;
	 } 

	function cargar(){
		$consulta = " select * from vehiculo where id='{$this->id}'";
		$rs= mysqli_query(conexion::obtenerInstancia(), $consulta);
		if(mysqli_num_rows($rs)>0){
			$fila = mysqli_fetch_assoc($rs);
			$this->matricula = $fila['matricula'];
			$this->marca = $fila['marca'];
			$this->modelo = $fila['modelo'];
			$this->color = $fila['color'];
			$this->precio = $fila['precio'];
		}
	}

	static function lista(){

		$data = array();
		$consulta = "select * from temacircular";
		$rs = mysqli_query(conexion::obtenerInstancia(), $consulta);
		if(mysqli_num_rows($rs) >0)
		{
			while($fila = mysqli_fetch_assoc($rs)){

				$data[] = $fila;
			}
		}

		return $data;
	}

	function borrar($id){
		$sql = "delete from temacircular where id='{$id}'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

	
	static function obtenerId($id)
	{
		$data = array();
		$consulta = "select * from temacircular where id=$id";
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