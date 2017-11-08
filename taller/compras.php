<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }
$compras = $_usuario->consultarCompras();
 ?>
<html>
<head>
	<title>Compras</title>
	<?php include 'utilitys.php'; ?>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container-fluid text-center">
		<div class="row content">
			<div class="col-sm-2 sidenav">
				<?php if ($_usuario) { ?>
				<h2><?php echo $_usuario->nombre; ?></h2>	
				<?php } ?>
				<?php if (isset($_SESSION['exito_mensaje'])) { ?>
				<div class="alert alert-success" role="alert"> 
					<?php echo $_SESSION['exito_mensaje']; ?>
					<?php unset($_SESSION['exito_mensaje']); ?>
				</div>
				<?php } ?>
				<?php if (isset($_SESSION['error_mensaje'])) { ?>
				<div class="alert alert-danger" role="alert"> 
					<?php echo $_SESSION['error_mensaje']; ?>
					<?php unset($_SESSION['error_mensaje']); ?>
				</div>
				<?php } ?>
				<p><a href="compras_nuevo.php" class="btn btn-success btn-xs">Compras Nuevo</a></p>
				<p><a href="#">Link</a></p>
			</div>
			<div class="col-sm-8 text-left"> 
				<h2>Lista de Compras</h2>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>FECHA</th>
								<th>PROVEEDOR</th>
								<th>TRABAJADOR</th>
								<th>ESTADO</th>
							<!-- <th>ID PROVEEDOR</th> -->
							</tr>
						</thead>
						<tbody>
							<?php foreach($compras as $objeto) { ?>
							<tr>
								<td><?php echo $objeto->id; ?></td>
								<td><?php echo $objeto->fecha; ?></td>
								<td><?php echo $objeto->proveedor_id; ?></td>
								<td><?php echo $objeto->trabajador_id; ?></td>
								<?php if ($objeto->cancelado): ?>
								<td>Cancelado</td>
								<?php else: ?>
								<td>Activo</td>
								<?php endif; ?>								
								<td><a href="editar_producto.php?id=<?php echo $objeto->id; ?>" class="btn btn-info btn-xs"> Editar </a></td>
								<td><a href="eliminar_producto.php?id=<?php echo $objeto->id;?>" class="btn btn-danger btn-xs"> Eliminar </a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-2 sidenav">
				<div class="well">
					<img src="img/serviciosintegrales2.png" style="width:100%">
				</div>
				<div class="well">
					<img src="img/promociones.jpg" style="width:100%">
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>