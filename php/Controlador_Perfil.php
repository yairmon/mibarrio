<?php

class Controlador_Perfil{
	private $nombre; 				// String
	private $permiso_Sistema;		// boolean
	private $permiso_Perfiles;		// boolean
	private $permiso_Productos;		// boolean
	private $permiso_Inventario;	// boolean
	private $permiso_Facturacion; 	// boolean
	private $permiso_Reportes;		// boolean
	
	public function crear_Perfil($nom, $p_Sistema, $p_Perfiles, $p_Productos,
						$p_Inventario, $p_Facturacion, $p_Reportes=NULL){
		$this->nombre = $nom;
		$this->permiso_Sistema = $p_Sistema;
		$this->permiso_Perfiles = $p_Perfiles;
		$this->permiso_Productos = $p_Productos;
		$this->permiso_Inventario = $p_Inventario;
		$this->permiso_Facturacion = $p_Inventario;
		$this->permiso_Reportes = $p_Reportes;
		
	}
	
	public function get_Nombre(){
		return $this->nombre;
	}
	
	public function get_Permiso_Sistema(){
		return $this->permiso_Sistema;
	}
	
	public function get_Permiso_Perfiles(){
		return $this->permiso_Perfiles;
	}
	
	public function get_Permiso_Productos(){
		return $this->permiso_Productos;
	}
	
	public function get_Permiso_Inventario(){
		return $this->permiso_Inventario;
	}
	
	public function get_Permiso_Facturacion(){
		return $this->permiso_Facturacion;
	}
	
	public function get_permiso_Reportes(){
		return $this->permiso_Reportes;
	}
	
	

	public function set_Nombre($nom){
		$this->nombre = $nom;
	}
	
	public function set_Permiso_Sistema($p_Sistema){
		$this->permiso_Sistema = $p_Sistema;
	}
	
	public function set_Permiso_Perfiles($p_Perfiles){
		$this->permiso_Perfiles = $p_Perfiles;
	}
	
	public function set_Permiso_Productos($p_Productos){
		$this->permiso_Productos = $p_Productos;
	}
	
	public function set_Permiso_Inventario($p_Inventario){
		$this->permiso_Inventario = $p_Inventario;
	}
	
	public function set_Permiso_Facturacion($p_Facturacion){
		$this->permiso_Facturacion = $p_Facturacion;
	}
	
	public function set_Permiso_Reportes($p_Reportes){
		$this->permiso_Reportes = $p_Reportes;
	}
	
}

?>
