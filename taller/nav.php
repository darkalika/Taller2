<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="#">Logo</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	    	<ul class="nav navbar-nav navbar-right">
	    		<?php if (!$_usuario) { ?>
	        		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	        	<?php } else { 
	        		if ($_usuario->cliente) {
	        			 } else {
	        		?>
	    	</ul>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <?php if ($_usuario->admin) { ?>
	        		<li><a href="trabajadores.php">Trabajadores</a></li>
					<li><a href="reportes.php">Reportes</a></li>
			<?php } ?>
	        	<li><a href="clientes.php">Clientes</a></li>
	        	<li><a href="proveedores.php">Proveedores</a></li>
	        	<li><a href="Almacen.php">Almacen</a></li>
	        	<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Compras</a>
						<ul class="dropdown-menu">
							<li><a href="compras.php">Compras</a></li>
							<li><a href="compras_producto.php">Compra Producto</a></li>
						</ul>
				</li>
	        	<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventas</a>
						<ul class="dropdown-menu">
							<li><a href="ventas.php">Ventas</a></li>
							<li><a href="ventas_producto.php">Venta Producto</a></li>
						</ul>
				</li>
	        <?php } ?>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">

	        
	        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	        <?php } ?>
	      </ul>
	    </div>
	  </div>
	</nav>

