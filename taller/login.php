<?php 
session_start();
//include('utilidades/no_logueado.php');
include('utilidades/conexion_bd.php');
include_once('clases/Cliente.php');
include_once('clases/Trabajador.php');


if (isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['tipo'])) {

	if ($_POST['tipo'] == 'trabajador') {
		$usuario = new Trabajador();
	} else if ($_POST['tipo'] == 'cliente') {
		$usuario = new Cliente();
	} else {
		echo "Error!!"; exit;
	}


	$usuario->usuario = $_POST['usuario'];
	$usuario->contraseña = $_POST['contrasena'];

	$logueado = $usuario->login();

	if($logueado) {
		// echo "LOGUEADO";
		$_SESSION['sesion_id'] = $usuario->id;
		$_SESSION['sesion_tipo'] = $_POST['tipo'];

		header("Location: index.php");
	} else {
		$error = false;
		// echo "NO LOGUEADO";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingenieria de Software</title>
	<?php include 'utilitys.php'; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Bienvenido</h1>
				<h3>Login</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				
					<?php if (isset($error)) { ?>
			<div class="alert alert-danger" role="alert"> 
				<?php if (isset($error)) echo '¡ Usuario y/o Contraseña invalidos !' ?>
			</div>
			<?php } ?>
		


				<form method="POST" action="">
					<div class="form-group">
				    	<label for="contraseña">Iniciar como:</label>
				    	<select class="form-control" name="tipo">
				    		
				    		<option value="trabajador">Trabajador</option>
				    		<option value="cliente">Cliente</option>
				    	</select>
				  	</div>
				  	<div class="form-group <?php if (isset($error)) echo 'has-error' ?>">
					    <label for="usuario">Nombre de usuario</label>
				    	<input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario" name="usuario">
				  	</div>
				  	<div class="form-group">
					    <label for="contraseña">Contraseña</label>
				    	<input type="password" class="form-control" id="contraseña" placeholder="Contraseña" name="contrasena">
				  	</div>
				  	<button type="submit" class="btn btn-success">Iniciar Sesión</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>