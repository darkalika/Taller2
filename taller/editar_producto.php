<?php 
session_start();
// include('utilidades/logueado.php');
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Almacen.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }

	$sql = "SELECT * FROM almacen WHERE id = {$_GET['id']}";
	$resultado = $BD->query($sql);
	if ($resultado->num_rows == 0) 
	{ 
		echo "No existe el usuario seleccionado"; exit;
	}
	$data = $resultado->fetch_assoc();

	$almacen = new Almacen();
	$almacen->id = $data['id'];
	$almacen->nombre = $data['nombre'];
	$almacen->cantidad = $data['cantidad'];
	$almacen->ultimo_costo = $data['ultimo_costo'];

	$error = false;	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(
			isset($_POST['nombre'])	&& !empty($_POST['nombre']) 
			
		)
		{
			//$almacen = new almacen();
			//$almacen->id = $_GET['id'];
			$almacen->nombre = $_POST['nombre'];
			

			// $insertado = $cliente->agregar();

			$editado = $_usuario->editarProducto($almacen);

		
			if (!$editado) {
				echo "Error: " . $BD->error;
				$error = true;
			} else {
				$_SESSION['exito_mensaje'] = "Se actualizó el producto {$almacen->nombre}  correctamente";
				header("Location: almacen.php");
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
				<div class="alert alert-danger" role="alert"><?= $error_mensaje; ?>
				</div>
				<?php } ?>
				<form method="POST" action="">
					<div class="form-group <?php if ($error) echo 'has-error' ?>">
						<label for="contraseña">Nombre:</label>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $almacen->nombre; ?>">
					</div>
					<button type="submit" class="btn btn-success">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>