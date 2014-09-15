<?php

class Modelo_Perfil{
	private $bd;		// Tipo: BD
	private $perfil; 	// Tipo: Control_Perfil
	
	public function __construct($perfi=NULL){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->perfil = $perfi;
		
	}
	
	// Void
	public function crear_Perfil($perfil){
	}
	
	// Void
	public function modificar_Perfil($perfil){
	}
	
	// Void: Busca en la BD el $perfi, y lo elimina
	public function eliminar_Perfil($perfi){
	}
	
	// Void: Busca en la BD el perfil y lo guarda en el Controlador
	public function buscar_Perfil($perfi){
		$sql = "select Nombre,Sistema,Perfiles,Productos,Inventario,Facturacion
	                        from perfiles where Nombre='$perfi'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$nombre = $reg['Nombre'];
			$sistema= $reg['Sistema'];
			$perfiles= $reg['Perfiles'];
			$productos= $reg['Productos'];
			$inventario= $reg['Inventario'];
			$facturacion= $reg['Facturacion'];
			$this->perfil->set_Nombre($nombre);
			$this->perfil->set_Permiso_Sistema($sistema);
			$this->perfil->set_Permiso_Perfiles($perfiles);
			$this->perfil->set_Permiso_Productos($productos);
			$this->perfil->set_Permiso_Inventario($inventario);
			$this->perfil->set_Permiso_Facturacion($facturacion);

		}
	}
	
}

?>
