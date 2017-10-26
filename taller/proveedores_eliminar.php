<?php 
session_start();
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Trabajador.php');
include_once('clases/Proveedor.php');

if (!$_usuario || !$_usuario->admin) { echo "No tienes permisos para realizar esta acción."; exit; }


$proveedor = new Proveedor($_GET[id]);

$eliminado = $_usuario->eliminarProveedor($proveedor);

if ($eliminado) {
	$_SESSION['exito_mensaje'] = "Proveedor eliminado correctamente.";
} else {
	$_SESSION['error_mensaje'] = "Proveedor eliminado correctamente.";
}

header("location: proveedores.php");