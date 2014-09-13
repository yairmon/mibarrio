<?php

class Controlador_Usuario{
	private $usuario;	// Tipo: Controlador_Usuario
	
	public function __construct($control_Usuario){
		$this->usuario = $control_Usuario;
	}
	
	// Void
	public function buscar_Usuario($nombre){
	}
	
	// void
	public function eliminar_Usuario($nombre){
	}
	
	// void
	public function actualizar_Datos_Usuario($nom, $apell, $dire, $e_mail, $tipo_id, 
				$n_id,$pregun, $respues, $celu, $_edad, $fot, $perfi){
	}
	
	public function cambiar_Contra($nombre, $apell, $pass){
	}
	
}

?>
