<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }

$clientes = $_usuario->consultarReportes();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Reportes</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Planes</h1>
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
			<div class="alert alert-danger" role="alert"> 
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
						<h2>Lista de reportes</h2>
					</div>
					
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>FECHA</th>
							<th>TRABAJADOR ID</th>
							<th>ACCION</th>
							
							
						</tr>
					</thead>
					<tbody>
						<?php foreach($clientes as $objeto) { ?>
							<tr>
								<td><?php echo $objeto->id; ?></td>
								<td><?php echo $objeto->fecha; ?></td>
								<td><?php echo $objeto->trabajador->nombre; ?></td>
								<td><?php echo $objeto->accion; ?></td>
								
								
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