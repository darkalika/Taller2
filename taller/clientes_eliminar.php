<?php 
session_start();
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Cliente.php');

if (!$_usuario || !$_usuario->admin) { echo "No tienes permisos para realizar esta acción."; exit; }


$cliente = new Cliente($_GET[id]);

$eliminado = $_usuario->eliminarCliente($cliente);

if ($eliminado) {
	$_SESSION['exito_mensaje'] = "Cliente eliminado correctamente.";
} else {
	$_SESSION['error_mensaje'] = "Cliente NO eliminado.";
}

header("location: clientes.php");

