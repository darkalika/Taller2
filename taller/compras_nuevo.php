<?php 
session_start();
// include('utilidades/logueado.php');
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');
include_once('clases/Compra.php');
include_once('clases/CompraProducto.php');

if (!$_usuario || !$_usuario->trabajador) { echo "No tienes permisos para realizar esta acción."; exit; }

	$proveedores = $_usuario->consultarProveedores();
	$productos = $_usuario->consultarAlmacen();

	$error = false;	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(
			isset($_POST['fecha'])	&& !empty($_POST['fecha']) &&
			isset($_POST['proveedor_id'])	&& !empty($_POST['proveedor_id']) &&
			isset($_POST['producto_id'])	&& count($_POST['producto_id']) > 0 &&
			isset($_POST['cantidad'])	&& count($_POST['cantidad']) > 0 &&
			isset($_POST['precio'])	&& count($_POST['precio']) > 0
		)

		{
			$producto_id = $_POST['producto_id'];
			$cantidad = $_POST['cantidad'];
			$precio = $_POST['precio'];

			$compra = new Compra();
			$compra->fecha = $_POST['fecha'];
			$compra->proveedor_id = $_POST['proveedor_id'];
			$compra->trabajador_id = $_usuario->id;
			
			$insertado = $_usuario->agregarCompra($compra);

			/*if ($insertado) {
				// insertar productos
				foreach ($producto_id as $x => $id) {
					$compra_producto = new CompraProducto();
					$compra_producto->compra_id = $compra->id;
					$compra_producto->producto_id = $id;
					$compra_producto->cantidad = $cantidad[$x];
					$compra_producto->precio = $precio[$x];
					$objetoProducto=$_usuario->consultarUnProducto($compra_producto->producto_id);

				
					$_usuario->sumarAlmacen($objetoProducto->nombre,
						$objetoProducto->cantidad+$compra_producto->cantidad,
						$compra_producto->precio,$compra_producto->producto_id);				

					$producto_insertado = $_usuario->agregarCompraProducto($compra_producto);

				}


				$_SESSION['exito_mensaje'] = 
				"Se insertó la compra {$compra->nombre}  correctamente.";
				header("Location: compras.php");
			} else {
				echo "Error: " . $BD->error;
				$error = true;
			}

		}
		else
		{
			$error = true;
			$error_mensaje = "Verifique los datos.";
		}*/
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar compra nueva</title>
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Compras</h1>
				<h2><?php echo $_usuario->nombre; ?></h2>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if ($error) { ?>
					<div class="alert alert-danger" role="alert"><?= $error_mensaje; ?></div>
				<?php } ?>
				<form method="POST" action="">
					<div class="form-group <?php if ($error) echo 'has-error' ?>">
				    	<label for="contraseña">Fecha:</label>
				    	<input type="date" class="form-control" placeholder="Fecha" name="fecha">
				  	</div>
				  	<div class="form-group <?php if ($error) echo 'has-error' ?>">
				    	<label for="contraseña">Proveedor:</label>
				    	<select name="proveedor_id" class="form-control">
				    		<?php foreach($proveedores as $proveedor): ?>
				    			<option value="<?= $proveedor->id; ?>"><?= $proveedor->empresa; ?></option>
				    		<?php endforeach; ?>
				    	</select>
				  	</div>
				  	<hr>
				  	<h3>
				  		Productos
				  		<button type="button" class="btn btn-xs btn-success" id="agregar-producto"><i class="glyphicon glyphicon-plus"></i></button> 
				  	</h3>

				  	<div id="productos-formulario">
					  
				  	</div>

				  	



				  	
				  	
				  	<button type="submit" class="btn btn-success">Guardar</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript">
			$( document ).ready(function() {
				var count = 0;
				var productos = "";

				<?php foreach($productos as $producto): ?>
					productos += '<option value="<?= $producto->id; ?>"><?= $producto->nombre; ?></option>';
				<?php endforeach; ?>


				$("#agregar-producto").on("click", function () {


					var x = '<div class="row"> ' +
							'	<div class="col-md-4"> ' +
							'		<div class="form-group"> ' +
							'    	<label for="contraseña">Producto:</label> ' +
							'    	<select name="producto_id[]" class="form-control"> ' +
							productos +
							'    	</select> ' +
							'  	</div> ' +
							'	</div> ' +
							'	<div class="col-md-4"> ' +
							'		<div class="form-group"> ' +
							'    	<label for="contraseña">Cantidad:</label> ' +
							'    	<input type="number" name="cantidad[]" class="form-control" value="1" min="1"> ' +
							 ' 	</div> ' +
							'	</div> ' +
							'	<div class="col-md-4"> ' +
							'		<div class="form-group"> ' +
							'    	<label for="contraseña">Precio:</label> ' +
							'    	<input type="number" step="0.01" name="precio[]" value="0" class="form-control"> ' +
							'  	</div> ' +
							'	</div> ' +
							'</div>';

					$("#productos-formulario").append(x);

				});

				//$("#agregar-producto").click();

			});
	</script>

</body>
</html>