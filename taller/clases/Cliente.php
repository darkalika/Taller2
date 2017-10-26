<?php

include_once "Usuario.php";


class Cliente extends Usuario {

	public $direccion;
	public $correo;
	
	public function __construct($id = null, $nombre = "", $apellido = "", $usuario = "", $contraseña = "", $admin = false, $trabajador = false, $cliente = true, $direccion = "", $correo = "") {
		parent::__construct($id, $nombre, $apellido, $usuario, $contraseña, $admin, $trabajador, $cliente);
		$this->direccion = $direccion;
		$this->correo = $correo;
	}

	public function login() {
		global $BD;

		$sql = "SELECT * FROM cliente WHERE usuario = '$this->usuario' and contrasena = '$this->contraseña'";

		$resultado = $BD->query($sql);

		if (!$resultado) {
			echo "Lo sentimos, este sitio web está experimentando problemas.";
		    echo "Error: La ejecución de la consulta falló debido a: \n";
		    echo "Query: " . $sql . "\n";
		    echo "Errno: " . $BD->errno . "\n";
		    echo "Error: " . $BD->error . "\n";
		    exit;
		}

		$datos = $resultado->fetch_assoc();

		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
		else 
		{

			$this->id = $datos['id'];
			$this->nombre = $datos['nombre'];
			$this->apellido = $datos['apellido'];
			$this->direccion = $datos['direccion'];
			$this->correo = $datos['correo'];

			return true;
		}
	}

	public function agregar() {
		global $BD;
		$sql = "INSERT INTO cliente (nombre,apellido,direccion,correo,usuario,contrasena) VALUES('{$this->nombre}','{$this->apellido}','{$this->direccion}','{$this->correo}','{$this->usuario}','{$this->contraseña}')";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}

	public function editar() {
		global $BD;
		$sql = "UPDATE cliente SET nombre = '{$this->nombre}', apellido = '{$this->apellido}', direccion = '{$this->direccion}', correo = '{$this->correo}', usuario = '{$this->usuario}', contrasena = '{$this->contraseña}' WHERE id = {$this->id}";

		return $BD->query($sql);
	}

	//public function editarDatosPersonales() {
	//	return $this->editar();
	//}
	public function editarDatosPersonales($cliente) {
		$insertado = $cliente->editar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Edición del cliente: {$cliente->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function eliminar() {
		global $BD;
		$sql = "SELECT * FROM cliente WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
		$sql = "DELETE FROM cliente WHERE id = {$this->id}";
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

		$fila = $resultado->fetch_assoc();

		$this->nombre = $fila['nombre'];
		$this->apellido = $fila['apellido'];
		$this->usuario = $fila['usuario'];
		$this->contraseña = $fila['contrasena'];
		$this->direccion = $fila['direccion'];
		$this->correo = $fila['correo'];

		return true;
	}

	public function consultarServicios(){
		global $BD;

		$sql = "SELECT * FROM servicio WHERE cliente_id = {$this->id}";

		$result = $BD->query($sql);

		$clientes = array();

		while($fila = $result->fetch_assoc()) {
			$cliente = new Servicio($fila['id'], $fila['fechaContratacion'], $fila['fechaInstalacion'], $fila['estado'], $fila['cliente_id'], $fila['plan_id']);

			$clientes[] = $cliente;
		}

		return $clientes;
	}

	public function consultarServicio($id){
		global $BD;

		$sql = "SELECT * FROM servicio WHERE cliente_id = {$this->id} AND id = {$id}";

		$result = $BD->query($sql);

		$servicio = false;

		if ($result) {
			$fila = $result->fetch_assoc();
			$cliente = new Cliente($fila['cliente_id']);
			$cliente->consultar();
			$plan = new Plan($fila['plan_id']);
			$plan->consultar();

			$servicio = new Servicio($fila['id'], $fila['fechaContratacion'], $fila['fechaInstalacion'], $fila['estado'], $cliente, $plan);
		}

		return $servicio;
	}



	public function cambiarContrasena() {}

	public function consultarDatos() {}

	public function reportarServicio() {}

}
