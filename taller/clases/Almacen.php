<?php 

class Almacen {

	public $id;
	public $nombre;
	public $ultimo_costo;
	public $cantidad;
	
	public function __construct($id = null, $nombre = null, $ultimo_costo =null, $cantidad = null) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->ultimo_costo = $ultimo_costo;
		$this->cantidad = $cantidad;
		
	}
	public function agregar() {
		global $BD;

		$sql = "INSERT INTO almacen (nombre,ultimo_costo,cantidad) VALUES('{$this->nombre}','{$this->ultimo_costo}','{$this->cantidad}')";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}

public function editar() {
		global $BD;
		$sql = "UPDATE almacen SET nombre = '{$this->nombre}', ultimo_costo = '{$this->ultimo_costo}', cantidad = '{$this->cantidad}' WHERE id = {$this->id}";

		return $BD->query($sql);
	}

	public function eliminar() {
		global $BD;
		$sql = "SELECT * FROM almacen WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
		$sql = "DELETE FROM almacen WHERE id = {$this->id}";
		$BD->query($sql);
		return true;
	}
	
	public function consultar() {
		global $BD;
		$sql = "SELECT * FROM almacen WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
}
public function sumar() {
		global $BD;

		$sql = "INSERT INTO almacen (ultimo_costo,cantidad) VALUES('{$this->ultimo_costo}','{$this->cantidad}')";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}
}
