<?php 
session_start();
// include('utilidades/logueado.php');
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Trabajador.php');
include_once('clases/Proveedor.php');

if (!$_usuario || !$_usuario->admin) { echo "No tienes permisos para realizar esta acción."; exit; }

	$error = false;	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(
			isset($_POST['empresa'])	&& !empty($_POST['empresa']) &&
			isset($_POST['nombre']) && !empty($_POST['nombre']) &&
			isset($_POST['direccion']) && !empty($_POST['direccion']) &&
			isset($_POST['correo']) && !empty($_POST['correo']) &&
			isset($_POST['telefono']) && !empty($_POST['telefono'])
			)
		
		{
			$proveedor = new Proveedor();
			$proveedor->empresa = $_POST['empresa'];
			$proveedor->nombre = $_POST['nombre'];
			$proveedor->direccion = $_POST['direccion'];
			$proveedor->correo = $_POST['correo'];
			$proveedor->telefono = $_POST['telefono'];

			// $insertado = $cliente->agregar();

			$insertado = $_usuario->agregarProveedor($proveedor);

			if (!$insertado) {
				echo "Error: " . $BD->error;
				$error = true;
			} else {
				$_SESSION['exito_mensaje'] = "Se insertó el proveedor {$proveedor->nombre} {$proveedor->empresa} correctamente";
				header("Location: proveedores.php");
			}
		}
		else
		{
			$error = true;
			$error_mensaje = "Verifique los datos.";
		}
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar trabajador nuevo</title>
	<?php include 'utilitys.php'; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Trabajador</h1>
				<h2><?php echo $_usuario->nombre; ?></h2>	
			</div>
		</div>
		<div class="row">
					<div class="col-md-12">
						<?php if ($error) { ?>
							<div class="alert alert-danger" role="alert"><?= $error_mensaje; ?></div>
						<?php } ?>
						<form method="POST" action="">
							<div class="form-group <?php if ($error) echo 'has-error' ?>">
						    	<label for="contraseña">Empresa:</label>
						    	<input type="text" class="form-control" placeholder="Empresa" name="empresa">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="usuario">Nombre</label>
						    	<input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" >
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Direccion</label>
						    	<input type="text" class="form-control" id="direccion" placeholder="direccion" name="direccion" >
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Correo</label>
						    	<input type="text" class="form-control" id="correo" placeholder="Correo" name="correo" >
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Telefono</label>
						    	<input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono" >
						  	
						  	</div>
						  	<button type="submit" class="btn btn-success">Guardar</button>
						</form>
					</div>
				</div>
	</div>
</body>
</html>