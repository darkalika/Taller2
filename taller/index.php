<?php 
session_start();
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');

// if ($_usuario) {
// 	echo "HOLA " . $_usuario->nombre;
// }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Servicios Integrales en Informatica</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div class="container" id="fondo">
		<div class="row">
			<div class="col-md-12">
				<h1>Bienvenido</h1>

				<?php if ($_usuario) { ?>
					<h2><?php echo $_usuario->nombre; ?></h2>	
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<ul>
					<?php if (!$_usuario) { ?>
						<li><a href="login.php">Iniciar sesión</a></li>
					<?php } else { ?>
						<?php if ($_usuario->cliente) { ?>
							<li><a href="estado_cuenta.php">Estado de servicios</a></li>
							<li><a href="editar_datos.php">Editar datos personales</a></li>
							<li><a href="cambiar_password.php">Cambiar Contraseña</a></li>

							

						<?php } else { ?>
							<?php if ($_usuario->admin) { ?>

							<a class="btn btn-info" href="trabajadores.php">Trabajadores</a>
							<br>
							<br>
							<a class="btn btn-info" href="reportes.php">Reportes</a>
							<?php } ?>
							<br>
							<br>
							<a class="btn btn-info" href="clientes.php">Clientes</a>
							<br>
							<br>

							<a class="btn btn-info" href="proveedores.php">Proveedores</a>
							<br>
							<br>
							
							<a class="btn btn-info" href="Almacen.php">Almacen</a>
							<br>
							<br>
							
							<a class="btn btn-warning" href="compras.php">Compras</a>
							<br>
							<br>
							
							<a class="btn btn-warning" href="compras_producto.php">Compra Productos</a>
							<a class="btn btn-warning" href="ventas.php">Ventas</a>
							<br>
							<br>
							
							<a class="btn btn-warning" href="ventas_producto.php">Ventas Productos</a>




							
							
							

						<?php } ?>
							<br>
							<br>
						<a class="btn btn-danger" href="logout.php">Cerrar sesión</a>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-9" style="text-align:right;">
			<img src="img/serviciosintegrales2.png" align=center>
			</div>

			<div id="cont">
			<img src="img/promociones.jpg">
			</div>
		</div>
	</div>


	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>