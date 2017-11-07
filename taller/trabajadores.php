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
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
	      <p><a href="trabajadores_nuevo.php" class="btn btn-success btn-xs">Agregar trabajador</a></p>
	      <p><a href="#">Link</a></p>
	    </div>
	    <div class="col-sm-8 text-left"> 
	      <h2>Lista de Trabajadores</h2>
	      <div class="table-responsive">
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