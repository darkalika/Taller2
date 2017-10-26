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
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container" id="fondo">
		<div class="row">
			<div class="col-md-2">
				<h1>Bienvenido</h1>

				<?php if ($_usuario) { ?>
					<h2><?php echo $_usuario->nombre; ?></h2>	
				<?php } ?>
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<?php if (!$_usuario) { ?>
						<li><a href="login.php">Iniciar sesión</a></li>
					<?php } else { ?>
						<?php if ($_usuario->cliente) { ?>
							<li ><a href="estado_cuenta.php">Estado de servicios</a></li>
							<li><a href="editar_datos.php">Editar datos personales</a></li>
							<li><a href="cambiar_password.php">Cambiar Contraseña</a></li>

							

						<?php } else { ?>
							<?php if ($_usuario->admin) { ?>

							<li><a class="btn btn-info" href="trabajadores.php">Trabajadores</a></li>
							<li><a class="btn btn-info" href="reportes.php">Reportes</a></li>
							<?php } ?>
							<li><a class="btn btn-info" href="clientes.php">Clientes</a></li>
							<li><a class="btn btn-info" href="proveedores.php">Proveedores</a></li>
							<li><a class="btn btn-info" href="Almacen.php">Almacen</a></li>
							<li><a class="btn btn-warning" href="compras.php">Compras</a></li>
							<li><a class="btn btn-warning" href="compras_producto.php">Compra Productos</a></li>
							<li><a class="btn btn-warning" href="ventas.php">Ventas</a></li>
							<li><a class="btn btn-warning" href="ventas_producto.php">Ventas Productos</a></li>
						<?php } ?>
						<li><a class="btn btn-danger" href="logout.php">Cerrar sesión</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-5">
				<br><br><br><br><br><br><br>
				<img src="img/serviciosintegrales2.png" style="width:100%">
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, alias officiis libero dolorem quas nesciunt aliquid provident earum ipsum sit, dignissimos officia perferendis recusandae, ullam deleniti nobis quidem vero ratione!</p>
			</div>
			<div class="col-md-5">
				<br><br><br><br><br><br><br><br><br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas iusto recusandae doloribus cupiditate! Cumque nam a deleniti temporibus adipisci vitae aut, natus eaque, ut eos sunt sequi, labore dolorem. Consequatur.</p>
				<img src="img/promociones.jpg" style="width:100%">	
			</div>
		</div>
	</div>
</body>
</html>