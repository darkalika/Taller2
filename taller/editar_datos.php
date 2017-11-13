<?php 
session_start();
// include('utilidades/logueado.php');
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Cliente.php');

if (!$_usuario || !$_usuario->cliente) { echo "No tienes permisos para realizar esta acción."; exit; }

	$sql = "SELECT * FROM cliente WHERE id = {$_usuario->id}";
	$resultado = $BD->query($sql);
	if ($resultado->num_rows == 0) 
	{ 
		echo "No existe el usuario seleccionado"; exit;
	}
	$data = $resultado->fetch_assoc();

	$error = false;	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(
			isset($_POST['nombre'])	&& !empty($_POST['nombre']) &&
			isset($_POST['apellido']) && !empty($_POST['apellido']) &&
			isset($_POST['direccion']) && !empty($_POST['direccion']) &&
			isset($_POST['correo']) && !empty($_POST['correo']) &&
			isset($_POST['password']) && !empty($_POST['password']) &&
			isset($_POST['password2']) && !empty($_POST['password2']) &&
			$_POST['password']== $_POST['password2']
		)
		{
			$cliente = new Cliente();
			$cliente->id = $_usuario->id;
			$cliente->nombre = $_POST['nombre'];
			$cliente->apellido = $_POST['apellido'];
			$cliente->usuario = $_POST['correo'];
			$cliente->contraseña = $_POST['password'];
			$cliente->direccion = $_POST['direccion'];
			$cliente->correo = $_POST['correo'];

			// $insertado = $cliente->agregar();

			$editado = $_usuario->editarDatosPersonales($cliente);

			if (!$editado) {
				echo "Error: " . $BD->error;
				$error = true;
			} else {
				$_SESSION['exito_mensaje'] = "Se actualizó el cliente {$cliente->nombre} {$cliente->apellido} correctamente";
				header("Location: index.php");
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
	<title>Editar cliente </title>
	<?php include 'utilitys.php'; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Clientes</h1>
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
						    	<label for="contraseña">Nombre:</label>
						    	<input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="usuario">Apellido:</label>
						    	<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" value="<?php echo $data['apellido'] ?>">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Direccion</label>
						    	<input type="text" class="form-control" id="direccion" placeholder="Direccion" name="direccion" value="<?php echo $data['direccion'] ?>">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Correo</label>
						    	<input type="text" class="form-control" id="correo" placeholder="Correo" name="correo" value="<?php echo $data['correo'] ?>">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Contraseña</label>
						    	<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $data['contrasena'] ?>">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Repetir Contraseña</label>
						    	<input type="password" class="form-control" id="password2" placeholder="Password" name="password2" value="<?php echo $data['contrasena'] ?>">
						  	</div>
						  	
						  	<button type="submit" class="btn btn-success">Guardar</button>
						</form>
					</div>
				</div>
	</div>


	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>