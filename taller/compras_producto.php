<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }
$compras = $_usuario->consultarComprasProducto();
//$compras = $_usuario->consultarProductos2();


 ?>
<html>
<head>
	<title>Compras Producto</title>
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
			<!-- Menu Nav -->
			<?php include 'nav.php'; ?>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-8">
						<h2>Compras Productos</h2>
					</div>
					
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>COMPRA ID</th>
							<th>PRRODUCTO ID</th>
							<th>CANTIDAD</th>
							<th>PRECIO</th>
							<!-- <th>ID PROVEEDOR</th> -->
					
						</tr>
					</thead>
					<tbody>
						
						<?php foreach($compras as $objeto2) { ?>
							<tr>
								<td><?php echo $objeto2->id; ?></td>
								<td><?php echo $objeto2->compra_id; ?></td>
								<td><?php echo $objeto2->producto_id; ?></td>
								<td><?php echo $objeto2->cantidad; ?></td>
								<td><?php echo $objeto2->precio; ?></td>

								<td><a href="editar_producto.php?id=<?php echo $objeto2->id; ?>" class="btn btn-info btn-xs"> Editar </a></td>
								<td><a href="eliminar_producto.php?id=<?php echo $objeto2->id;?>" class="btn btn-danger btn-xs"> Eliminar </a></td>
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