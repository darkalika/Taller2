<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->admin) { echo "No tienes permisos para realizar esta acción."; exit; }

//$clientes = $_usuario->consultarClientes();
$trabajadores = $_usuario->consultarTrabajadores();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Trabajadores</title>
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
						<h2>Lista de Trabajadores</h2>
					</div>
					<div class="col-md-4 text-right">
						<a href="trabajadores_nuevo.php" class="btn btn-success btn-xs">Agregar trabajador</a>
					</div>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>APELLIDO</th>
							<th>USUARIO</th>
							<th>CONTRASEÑA</th>
							<th>ADMIN</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach($trabajadores as $objeto) { ?>
							<tr>
								<td><?php echo $objeto->id; ?></td>
								<td><?php echo $objeto->nombre; ?></td>
								<td><?php echo $objeto->apellido; ?></td>
								<td><?php echo $objeto->usuario; ?></td>
								<td><?php echo $objeto->contraseña; ?></td>
								
								<td class="text-center">
									<?php if ($objeto->admin) { ?>
										<i class="glyphicon glyphicon-ok text-success"></i>
									<?php } else { ?>
										<i class="glyphicon glyphicon-minus text-danger"></i>
									<?php } ?>
								</td>



								<td><a href="trabajadores_editar.php?id=<?php echo $objeto->id; ?>" class="btn btn-info btn-xs"> Editar </a></td>
								<td><a href="trabajadores_eliminar.php?id=<?php echo $objeto->id;?>" class="btn btn-danger btn-xs"> Eliminar </a></td>
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