<div class="col-md-3">
				<ul>
					<li><a href="index.php">Pagina de inicio</a></li>
					<?php if ($_usuario->admin) { ?>
						<li><a href="trabajadores.php">Trabajadores</a></li>
						<li><a href="Clientes.php">Clientes</a></li>
						<li><a href="proveedores.php">Proveedores</a></li>
						<li><a href="almacen.php">Almacen</a></li>
						<li><a href="compras.php">Compras</a></li>
						<li><a href="ventas.php">Ventas</a></li>
					<?php } ?>
					
					<li><a href="logout.php">Cerrar sesión</a></li>
				</ul>
			</div>