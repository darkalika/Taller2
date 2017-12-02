<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }

$clientes = $_usuario->consultarProveedores();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Proveedores</title>
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
				<p><a href="proveedores_nuevo.php" class="btn btn-success btn-xs">Proovedor Nuevo</a></p>
				<p><a href="#">Link</a></p>
			</div>
			<div class="col-sm-8 text-left"> 
				<h2>Lista de Proovedores</h2>
				<input class="form-control" id="myInput" type="text" placeholder="Buscar..">
  				<br>				
				<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>EMPRESA</th>
							<th>NOMBRE</th>
							<th>DIRECCION</th>
							<th>CORREO</th>
							<th>TELEFONO</th>
					
						</tr>
					</thead>
					<tbody id="myTable">
						<?php foreach($clientes as $objeto) { ?>
							<tr>
								<td><?php echo $objeto->id; ?></td>
								<td><?php echo $objeto->empresa; ?></td>
								<td><?php echo $objeto->nombre; ?></td>
								<td><?php echo $objeto->direccion; ?></td>
								<td><?php echo $objeto->correo; ?></td>
								<td><?php echo $objeto->telefono; ?></td>

								<td><a href="proveedores_editar.php?id=<?php echo $objeto->id; ?>" class="btn btn-info btn-xs"> Editar </a></td>
								<td><a href="proveedores_eliminar.php?id=<?php echo $objeto->id;?>" class="btn btn-danger btn-xs"> Eliminar </a></td>
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
	<script>
		$(document).ready(function(){
  		$("#myInput").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
    	$("#myTable tr").filter(function() {
      	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    			});
  			});
		});
	</script>
</body>
</html>