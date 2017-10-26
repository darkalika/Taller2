<?php 

abstract class Usuario {

	public $id;
	public $nombre;
	public $apellido;
	public $usuario;
	public $contraseña;
	// public $tipo;
	public $admin;
	public $trabajador;
	public $cliente;

	public function __construct($id = null, $nombre = "", $apellido = "", $usuario = "", $contraseña = "", $admin = false, $trabajador = true, $cliente = false) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->usuario = $usuario;
		$this->contraseña = $contraseña;
		$this->admin = $admin;
		$this->trabajador = $trabajador;
		$this->cliente = $cliente;
	}


	public abstract function login();

	public abstract function agregar();

	public abstract function editar();

	public abstract function eliminar();

}

