<?php 

class Proveedor {

	public $id;
	public $empresa;
	public $nombre;
	public $direccion;
	public $correo;
	public $telefono;

	

	public function __construct($id = null, $empresa = null, $nombre = null, $direccion =null, $correo = null, $telefono = null) {
		$this->id = $id;
		$this->empresa = $empresa;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->correo = $correo; 
		$this->telefono= $telefono;
	}
	public function agregar() {
		global $BD;

		$sql = "INSERT INTO proveedor (empresa,nombre,direccion,correo,telefono) VALUES('{$this->empresa}','{$this->nombre}','{$this->direccion}','{$this->correo}','{$this->telefono}')";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}

public function editar() {
		global $BD;
		$sql = "UPDATE proveedor SET empresa = '{$this->empresa}', nombre = '{$this->nombre}', direccion = '{$this->direccion}', correo = '{$this->correo}', telefono = '{$this->telefono}' WHERE id = {$this->id}";

		return $BD->query($sql);
	}

	public function eliminar() {
		global $BD;
		$sql = "SELECT * FROM proveedor WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
		$sql = "DELETE FROM proveedor WHERE id = {$this->id}";
		$BD->query($sql);
		return true;
	}
	
	public function consultar() {
		global $BD;
		$sql = "SELECT * FROM cliente WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
}
}

