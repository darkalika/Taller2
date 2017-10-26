<?php 
include_once('clases/Cliente.php');
include_once('clases/Trabajador.php');

global $BD;

if (isset($_SESSION['sesion_id'])) {

	if ($_SESSION['sesion_tipo'] == 'trabajador') {
		$_usuario = new Trabajador();
		
		$sql = "SELECT * FROM trabajador WHERE id = {$_SESSION['sesion_id']}";
		
		$resultado = $BD->query($sql);
		
		if ($resultado->num_rows == 0)  { 
			echo "No existe el usuario seleccionado"; exit;
		}
		
		$datos = $resultado->fetch_assoc();

		$_usuario->id = $datos['id'];
		$_usuario->nombre = $datos['nombre'];
		$_usuario->apellido = $datos['apellido'];
		$_usuario->usuario = $datos['usuario'];
		$_usuario->contraseña = $datos['contrasena'];
		$_usuario->admin = ($datos['admin'] == 1) ? true : false;
		
	} else {
		$_usuario = new Cliente();
		
		$sql = "SELECT * FROM cliente WHERE id = {$_SESSION['sesion_id']}";
		
		$resultado = $BD->query($sql);
		
		if ($resultado->num_rows == 0)  { 
			echo "No existe el usuario seleccionado"; exit;
		}
		
		$datos = $resultado->fetch_assoc();

		$_usuario->id = $datos['id'];
		$_usuario->nombre = $datos['nombre'];
		$_usuario->apellido = $datos['apellido'];
		$_usuario->usuario = $datos['usuario'];
		$_usuario->contraseña = $datos['contrasena'];
		$_usuario->direccion = $datos['direccion'];
		$_usuario->correo = $datos['correo'];
	}
} else {
	$_usuario = false;
}