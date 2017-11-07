<?php
include_once "Usuario.php";
include_once "Cliente.php";
include_once "Reporte.php";
include_once "Proveedor.php";
include_once "Almacen.php";
include_once "Compra.php";
include_once "CompraProducto.php";
include_once "Venta.php";
include_once "VentaProducto.php";





class Trabajador extends Usuario {

	public function __construct($id = null, $nombre = "", $apellido = "", $usuario = "", $contraseña = "", $admin = false, $trabajador = true, $cliente = false, $direccion = "", $correo = "") {
		parent::__construct($id, $nombre, $apellido, $usuario, $contraseña, $admin, $trabajador, $cliente);
	}

	public function login() {
		global $BD;
		
		$sql = "SELECT * FROM trabajador WHERE usuario = '$this->usuario' and contrasena = '$this->contraseña'";

		$resultado = $BD->query($sql);

		if (!$resultado) {
			echo "Lo sentimos, este sitio web está experimentando problemas.";
		    echo "Error: La ejecución de la consulta falló debido a: \n";
		    echo "Query: " . $sql . "\n";
		    echo "Errno: " . $BD->errno . "\n";
		    echo "Error: " . $BD->error . "\n";
		    exit;
		}

		$datos = $resultado->fetch_assoc();

		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
		else 
		{

			$this->id = $datos['id'];
			$this->nombre = $datos['nombre'];
			$this->apellido = $datos['apellido'];
			$this->admin = ($datos['admin'] == 1) ? true : false;

			return true;
		}
	}

	public function consultar() {
		global $BD;
		$sql = "SELECT * FROM trabajador WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}

		$fila = $resultado->fetch_assoc();

		$this->nombre = $fila['nombre'];
		$this->apellido = $fila['apellido'];
		$this->usuario = $fila['usuario'];
		$this->contraseña = $fila['contrasena'];

		return true;
	}

	public function consultarClientes() {
		global $BD;

		$sql = "SELECT * FROM cliente";

		$result = $BD->query($sql);

		$clientes = array();

		while($fila = $result->fetch_assoc()) {
			$cliente = new Cliente($fila['id'], $fila['nombre'], $fila['apellido'], $fila['usuario'], $fila['contrasena'], null, null, null, $fila['direccion'], $fila['correo']);

			$clientes[] = $cliente;
		}

		return $clientes;
	}
	public function consultarProveedores() {
		global $BD;

		$sql = "SELECT * FROM proveedor";

		$result = $BD->query($sql);

		$proveedores = array();

		while($fila = $result->fetch_assoc()) {
			$proveedor = new Proveedor($fila['id'], $fila['empresa'], $fila['nombre'], $fila['direccion'], $fila['correo'], $fila['telefono']);

			$proveedores[] = $proveedor;
		}

		return $proveedores;
	}

	public function agregarCliente($cliente) {
		$insertado = $cliente->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Creación del cliente: {$cliente->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function editarCliente($cliente) {
		$insertado = $cliente->editar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Edición del cliente: {$cliente->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function eliminarCliente($cliente) {
		$insertado = $cliente->eliminar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Eliminacion del cliente: {$cliente->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function agregar() {
		global $BD;

		$admin = ($this->admin) ? 1 : 0;

		$sql = "INSERT INTO trabajador (nombre,apellido,usuario,contrasena,admin) VALUES('{$this->nombre}','{$this->apellido}','{$this->usuario}','{$this->contraseña}', {$this->admin})";

		return $BD->query($sql);
	}

	public function editar() {
		global $BD;
		$sql = "UPDATE trabajador SET nombre = '{$this->nombre}', apellido = '{$this->apellido}', usuario = '{$this->usuario}', contrasena = '{$this->contraseña}', admin = '{$this->admin}' WHERE id = {$this->id}";

		return $BD->query($sql);
	}

	public function eliminar() {
		global $BD;
		$sql = "SELECT * FROM trabajador WHERE id = {$this->id}";
		$resultado = $BD->query($sql);
		if ($resultado->num_rows == 0) 
		{ 
			return false;
		}
		$sql = "DELETE FROM trabajador WHERE id = {$this->id}";
		$BD->query($sql);
		return true;
	}

	public function consultarTrabajadores(){
		global $BD;

		$sql = "SELECT * FROM trabajador";

		$result = $BD->query($sql);

		$trabajador = array();

		while($fila = $result->fetch_assoc()) {
			$cliente = new Trabajador($fila['id'], $fila['nombre'], $fila['apellido'], $fila['usuario'], $fila['contrasena'], $fila['admin'], null, null);

			$trabajador[] = $cliente;
		}

		return $trabajador;

	}
	public function agregarTrabajador($trabajador){
		$insertado = $trabajador->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Creacion del trabajador: {$trabajador->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function eliminarTrabajador($trabajador) {
		
		$insertado = $trabajador->eliminar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Eliminacion del trabajador: {$trabajador->id}");
			$reporte->agregar();
		}

		return $insertado;

	}
	public function editarTrabajador($trabajador){
	
		$insertado = $trabajador->editar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Edición del trabajador: {$trabajador->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function consultarPlanes() {
		global $BD;

		$sql = "SELECT * FROM plan";

		$result = $BD->query($sql);

		$clientes = array();

		while($fila = $result->fetch_assoc()) {
			$cliente = new Plan($fila['id'], $fila['nombre'], $fila['precio'], $fila['velocidad'], $fila['descripcion']);

			$clientes[] = $cliente;
		}

		return $clientes;
	}
	public function editarPlan($plan){
		//return $plan->editar();
		$insertado = $plan->editar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Edicion del plan: {$plan->id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function agregarPlan($plan){
		$insertado = $plan->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Creacion del plan: {$plan->id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function eliminarPlan($plan){
		//return $plan->eliminar();
		$insertado = $plan->eliminar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Eliminacion del plan: {$plan->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function consultarServicios(){
		global $BD;

		$sql = "SELECT * FROM servicio";

		$result = $BD->query($sql);

		$clientes = array();

		while($fila = $result->fetch_assoc()) {
			$cliente = new Servicio($fila['id'], $fila['fechaContratacion'], $fila['fechaInstalacion'], $fila['estado'], $fila['cliente_id'], $fila['plan_id']);

			$clientes[] = $cliente;
		}

		return $clientes;
	}

	public function consultarServicio($id){
		global $BD;

		$sql = "SELECT * FROM servicio WHERE id = {$id}";

		$result = $BD->query($sql);

		$servicio = false;

		if ($result) {
			$fila = $result->fetch_assoc();
			$cliente = new Cliente($fila['cliente_id']);
			$cliente->consultar();
			$plan = new Plan($fila['plan_id']);
			$plan->consultar();

			$servicio = new Servicio($fila['id'], $fila['fechaContratacion'], $fila['fechaInstalacion'], $fila['estado'], $cliente, $plan);
		}

		return $servicio;
	}


	public function agregarServicio($servicio){
		$insertado = $servicio->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Creacion del servicio: {$servicio->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function editarServicio($servicio){
		//return $servicio->editar();
		$insertado = $servicio->editar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Edicion del servicio: {$servicio->id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function eliminarServicio($servicio){
		//return $servicio->eliminar();
		$insertado = $servicio->eliminar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Eliminacion del servicio {$servicio->id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function consultarReportes(){
		global $BD;

		$sql = "SELECT * FROM reporte";

		$result = $BD->query($sql);

		$clientes = array();

		while($fila = $result->fetch_assoc()) {
			$trabajador = new Trabajador($fila['trabajador_id']);
			$trabajador->consultar();
			$cliente = new Reporte($fila['id'], $fila['fecha'], $trabajador, $fila['accion']);

			$clientes[] = $cliente;
		}

		return $clientes;

	}
	public function agregarProveedor($proveedor) {
		$insertado = $proveedor->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Creación del proveedor: {$proveedor->id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function eliminarProveedor($proveedor){
		//return $servicio->eliminar();
		$insertado = $proveedor->eliminar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Eliminacion del proveedor {$proveedor->id}");
			$reporte->agregar();
		}

}

public function editarProveedor($proveedor){
		//return $servicio->editar();
		$insertado = $proveedor->editar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, "Edicion del proveedor: {$proveedor->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function consultarAlmacen(){
		global $BD;

		$sql = "SELECT * FROM almacen";

		$result = $BD->query($sql);

		$almacenes = array();

		while($fila = $result->fetch_assoc()) {
			$almacen = new Almacen($fila['id'], $fila['nombre'], $fila['ultimo_costo'], $fila['cantidad']);

			$almacenes[] = $almacen;
		}

		return $almacenes;

	}
	public function agregarProducto($producto) {
		$insertado = $producto->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), 
				$this, "Creación del producto: {$producto->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function editarProducto($producto) {
		$editado = $producto->editar();

		if ($editado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), 
				$this, "Edición del producto: {$producto->id}");
			$reporte->agregar();
		}

		return $editado;
	}

	public function consultarCompras(){
		global $BD;

		$sql = "SELECT * FROM compras";

		$result = $BD->query($sql);

		$compras = array();

		while($fila = $result->fetch_assoc()) {
			$compra = new Compra($fila['id'], $fila['fecha'], 
				$fila['proveedor_id'], $fila['trabajador_id'], 
				$fila['cancelado']);

			$compras[] = $compra;
		}

		return $compras;

	}

	public function agregarCompra($compra) {
		$insertado = $compra->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), 
				$this, "Creación de la compra: {$compra->id}");
			$reporte->agregar();
		}

		return $insertado;
	}

	public function editarCompra($compra) {
		$editado = $compra->editar();

		if ($editado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, 
				"Edición de la compra: {$compra->id}");
			$reporte->agregar();
		}

		return $editado;
	}

	public function agregarCompraProducto($compra_producto) {
		$insertado = $compra_producto->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, 
				"Creación de producto: {$compra_producto->id} de la compra: 
				{$compra_producto->compra_id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function sumarAlmacen($nombre,$cantidad,$ultimo_costo,$id) {
		global $BD;

		$sql = "UPDATE almacen SET nombre = '{$nombre}', 
						ultimo_costo = '{$ultimo_costo}', cantidad = '{$cantidad}' 
						WHERE id = {$id}";
		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}
	public function consultarUnProducto($id){
		global $BD;

		$sql = "SELECT * FROM almacen WHERE id = {$id}";

		$result = $BD->query($sql);

		$servicio = false;

		if ($result) {
			$fila = $result->fetch_assoc();
			$almacen = new Almacen($fila['id'], $fila['nombre'], 
				$fila['ultimo_costo'], $fila['cantidad']);
			

		
		}

		return $almacen;
	}




	public function consultarComprasProducto(){
		global $BD;

		$sql = "SELECT * FROM compras_productos";

		$result = $BD->query($sql);

		$compras = array();

		while($fila = $result->fetch_assoc()) {
			$compra = new CompraProducto($fila['id'], 
						$fila['compra_id'], $fila['producto_id'], 
						$fila['cantidad'], $fila['precio']);

			$compras[] = $compra;
		}

		return $compras;

	}
	// Ventas
	//Agregar una venta al proucto
	public function agregarVentaProducto($venta_producto) {
		$insertado = $venta_producto->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), $this, 
				"Creación de producto: {$venta_producto->id} de la venta: 
				{$venta_producto->venta_id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	//Agregar una venta al reporte
	public function agregarVenta($venta) {
		$insertado = $venta->agregar();

		if ($insertado) {
			$hoy = new DateTime('now');
			$reporte = new Reporte(null, $hoy->format('Y-m-d'), 
				$this, "Creación de la venta: {$venta->id}");
			$reporte->agregar();
		}

		return $insertado;
	}
	public function consultarVentas(){
		global $BD;

		$sql = "SELECT V.id, V.fecha,C.nombre AS nombreCliente, T.nombre AS nombreTrabajador, V.cancelado
				 FROM ventas V, cliente C, trabajador T
				 WHERE V.cliente_id = C.id AND V.trabajador_id = T.id";

		$result = $BD->query($sql);

		$ventas = array();

		while($fila = $result->fetch_assoc()) {
			$venta = new Venta($fila['id'], 
				$fila['fecha'], $fila['nombreCliente'], $fila['nombreTrabajador'], 
				$fila['cancelado']);

			$ventas[] = $venta;
		}

		return $ventas;

	}
	public function consultarVentasProducto(){
		global $BD;

		$sql = "SELECT * FROM ventas_productos";

		$result = $BD->query($sql);

		$ventas = array();

		while($fila = $result->fetch_assoc()) {
			$venta = new VentaProducto($fila['id'], 
				$fila['venta_id'], $fila['producto_id'], $fila['cantidad'], 
				$fila['precio']);

			$ventas[] = $venta;
		}

		return $ventas;

	}
}
