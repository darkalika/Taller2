<?php 
session_start();
// include('utilidades/logueado.php');
include('utilidades/conexion_bd.php');
include('utilidades/sesion.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }
$ventas = $_usuario->consultarVentas();
 ?>
<html>
<head>
	<title>Ventas</title>
	<!-- <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<!-- MENU NAV -->
			<?php include 'nav.php'; ?>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-8">
						<h2>Ventas</h2>
					</div>
					<div class="col-md-4 text-right">
						<a href="ventas_nuevo.php" class="btn btn-success btn-xs">Agregar Venta</a>
					</div>
				</div>
				<input class="form-control" id="myInput" type="text" placeholder="Search..">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>FECHA</th>
							<th>Cliente</th>
							<th>TRABAJADOR</th>
							<th>ESTADO</th>
							<!-- <th>ID PROVEEDOR</th> -->
					
						</tr>
					</thead>
					<tbody id="myTable">
						<?php foreach($ventas as $objeto) { ?>
							<tr>
								<td><?php echo $objeto->id; ?></td>
								<td><?php echo $objeto->fecha; ?></td>
								<td><?php echo $objeto->cliente_id; ?></td>
								<td><?php echo $objeto->trabajador_id; ?></td>
								<?php if ($objeto->cancelado): ?>
									<td>Cancelado</td>
								<?php else: ?>
									<td>Activo</td>
								<?php endif; ?>
								
								<!-- Editar para que funque  -->
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