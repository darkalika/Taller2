<?php 

class Reporte {

	public $id;
	public $fecha;
	public $trabajador;
	public $accion;

	public function __construct($id = null, $fecha = null, $trabajador = null, $accion= "") {
		$this->id = $id;
		$this->fecha = $fecha;
		$this->trabajador = $trabajador;
		$this->accion = $accion;
	
	}

	public function agregar() {
		global $BD;
		$sql = "INSERT INTO reporte (fecha,trabajador_id,accion) VALUES('{$this->fecha}','{$this->trabajador->id}','{$this->accion}')";

		return $BD->query($sql);
	}

	
}
