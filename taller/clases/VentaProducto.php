<?php 

class VentaProducto {

	public $id;
	public $venta_id;
	public $producto_id;
	public $cantidad;
	public $precio;
	
	public function __construct($id = null, $venta_id = null, $producto_id =null, 
								$cantidad = null, $precio = 0) {
		 $this->id = $id;
		 $this->venta_id = $venta_id;
		 $this->producto_id = $producto_id;
		 $this->cantidad = $cantidad;
		 $this->precio = $precio;
		
	}
	public function agregar() {
		global $BD;

		$sql = "INSERT INTO ventas_productos (venta_id,producto_id, cantidad,precio) 
				VALUES('{$this->venta_id}','{$this->producto_id}',
					'{$this->cantidad}', '{$this->precio}')";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}
	public function editar() {
		global $BD;
		$sql = "UPDATE ventas_productos 
				SET venta_id = '{$this->venta_id}', producto_id = '{$this->producto_id}', cantidad = '{$this->cantidad}', precio = {$this->precio} 
				WHERE id = {$this->id}";

		return $BD->query($sql);
	}

}	
