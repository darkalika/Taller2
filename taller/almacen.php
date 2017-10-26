<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }
$almacenes = $_usuario->consultarAlmacen();
 ?>
<html>
<head>
	<title>Almacen</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Usuarios</h1>
				<h2><?php echo $_usuario->nombre; ?></h2>	
			</div>
		</div>
		<?php if (isset($_SESSION['exito_mensaje'])) { ?>
			<div class="alert alert-success" role="alert"> 
				<?php echo $_SESSION['exito_mensaje']; ?>
				<?php unset($_SESSION['exito_mensaje']); ?>
			</div>
		<?php } ?>
		<?php if (isset($_SESSION['error_mensaje'])) { ?>
			<div class="alert alert-success" role="alert"> 
				<?php echo $_SESSION['error_mensaje']; ?>
				<?php unset($_SESSION['error_mensaje']); ?>
			</div>
		<?php } ?>
		<div class="row">
			<!-- Menu nav -->
			<?php include 'nav.php'; ?>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-8">
						<h2>ALMACEN</h2>
					</div>
					<div class="col-md-4 text-right">
						<a href="producto_nuevo.php" class="btn btn-success btn-xs">Agregar Producto</a>
					</div>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>CANTIDAD</th>
							<th>ULTIMO COSTO</th>
							<!-- <th>ID PROVEEDOR</th> -->
					
						</tr>
					</thead>
					<tbody>
						<?php foreach($almacenes as $objeto) { ?>
							<tr>
								<td><?php echo $objeto->id; ?></td>
								<td><?php echo $objeto->nombre; ?></td>
								<td><?php echo $objeto->cantidad; ?></td>
								<td><?php echo $objeto->ultimo_costo; ?></td>
								

								<td><a href="editar_producto.php?id=<?php echo $objeto->id; ?>" class="btn btn-info btn-xs"> Editar </a></td>
								<td><a href="eliminar_producto.php?id=<?php echo $objeto->id;?>" class="btn btn-danger btn-xs"> Eliminar </a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
</body>
</html>