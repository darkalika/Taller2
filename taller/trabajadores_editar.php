<?php 
session_start();
// include('utilidades/logueado.php');
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Trabajador.php');

if (!$_usuario || !$_usuario->admin) { echo "No tienes permisos para realizar esta acción."; exit; }

	$sql = "SELECT * FROM trabajador WHERE id = {$_GET['id']}";
	$resultado = $BD->query($sql);
	if ($resultado->num_rows == 0) 
	{ 
		echo "No existe el trabajdor seleccionado"; exit;
	}
	$data = $resultado->fetch_assoc();

	$error = false;	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(
			isset($_POST['nombre'])	&& !empty($_POST['nombre']) &&
			isset($_POST['apellido']) && !empty($_POST['apellido']) &&
			isset($_POST['usuario']) && !empty($_POST['usuario']) &&
			isset($_POST['password']) && !empty($_POST['password']) &&
			isset($_POST['password2']) && !empty($_POST['password2']) &&
			//isset($_POST['admin']) && !empty($_POST['admin']) &&

			$_POST['password']== $_POST['password2']
		)
		{
				$trabajador= new Trabajador();
				$trabajador->id = $_GET['id'];
			$trabajador->nombre = $_POST['nombre'];
			$trabajador->apellido = $_POST['apellido'];
			$trabajador->usuario = $_POST['usuario'];
			$trabajador->contraseña = $_POST['password'];
			$trabajador->admin = $_POST['admin'];
//echo $trabajador->admin;
//exit;
			// $insertado = $cliente->agregar();

			$editado = $_usuario->editarTrabajador($trabajador);

			if (!$editado) {
				echo "Error: " . $BD->error;
				$error = true;
			} else {
				$_SESSION['exito_mensaje'] = "Se actualizó el trabajador {$trabajador->nombre} {$trabajador->apellido} correctamente";
				header("Location: trabajadores.php");
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
	<title>Editar Trabajador</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Trabajadores</h1>
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
							    <label for="contraseña2">Usuario</label>
						    	<input type="text" class="form-control" id="direccion" placeholder="Direccion" name="usuario" value="<?php echo $data['usuario'] ?>">
						  	</div>
						  
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Contraseña</label>
						    	<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $data['contrasena'] ?>">
						  	</div>
						  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="contraseña2">Repetir Contraseña</label>
						    	<input type="password" class="form-control" id="password2" placeholder="Password" name="password2" value="<?php echo $data['contrasena'] ?>">
						  	</div>
						  		<div class="form-group <?php if ($error) echo 'has-error' ?>">
							    <label for="admin">Administrador</label>
						    	<select class="form-control" name="admin" id="admin" value="0">
						    		<option value="1">Si</option>
						    		<option value="0">No</option>

						    	</select>
						  	</div>
						  	
						  	<button type="submit" class="btn btn-success">Guardar</button>
						</form>
					</div>
				</div>
	</div>


	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>