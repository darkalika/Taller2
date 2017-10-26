<?php 

class Venta {

	public $id;
	public $fecha;
	public $cliente_id;
	public $trabajador_id;
	public $cancelado;
	
	public function __construct($id = null, $fecha = null, $cliente_id =null, $trabajador_id = null, $cancelado = 0) {
		$this->id = $id;
		$this->fecha = $fecha;
		$this->cliente_id = $cliente_id;
		$this->trabajador_id = $trabajador_id;
		$this->cancelado = $cancelado;
		
	}
	public function agregar() {
		global $BD;

		$sql = "INSERT INTO ventas (fecha,cliente_id, trabajador_id,cancelado) 
				VALUES('{$this->fecha}','{$this->cliente_id}',
					'{$this->trabajador_id}', {$this->cancelado})";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}

public function editar() {
		global $BD;
		$sql = "UPDATE ventas SET fecha = '{$this->fecha}', cliente_id = '{$this->cliente_id}', trabajador_id = '{$this->trabajador_id}', cancelado = {$this->cancelado} WHERE id = {$this->id}";

		return $BD->query($sql);
	}

	public function cancelar() {
		$this->cancelado = 1;
		return $this->editar();
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
}	
