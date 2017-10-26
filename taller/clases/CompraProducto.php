<?php 

class CompraProducto {

	public $id;
	public $compra_id;
	public $producto_id;
	public $cantidad;
	public $precio;
	
	public function __construct($id = null, $compra_id = null, $producto_id =null, $cantidad = null, $precio = 0) {
		 $this->id = $id;
		 $this->compra_id = $compra_id;
		 $this->producto_id = $producto_id;
		 $this->cantidad = $cantidad;
		 $this->precio = $precio;
		
	}
	public function agregar() {
		global $BD;

		$sql = "INSERT INTO compras_productos (compra_id,producto_id, cantidad,precio) VALUES('{$this->compra_id}','{$this->producto_id}','{$this->cantidad}', '{$this->precio}')";

		$insertado = $BD->query($sql);
		if ($insertado) {
			$this->id = $BD->insert_id;
		}
		return $insertado;
	}
	public function editar() {
		global $BD;
		$sql = "UPDATE compras_productos 
		SET compra_id = '{$this->compra_id}', 
		producto_id = '{$this->producto_id}', cantidad = '{$this->cantidad}',
		precio = {$this->precio} WHERE id = {$this->id}";

		return $BD->query($sql);
	}

}	
