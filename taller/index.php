<?php 
session_start();
include_once('utilidades/conexion_bd.php');
include_once('utilidades/sesion.php');

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=divice-width, initial-scale=1">
 	<title>Servicios Integrales</title>
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
	      <p><a href="#">Link</a></p>
	      <p><a href="#">Link</a></p>
	    </div>
	    <div class="col-sm-8 text-left"> 
	      <h1>Welcome</h1>
	      
	      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	      <hr>
	      <h3>Test</h3>
	      <p>Lorem ipsum...</p>
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