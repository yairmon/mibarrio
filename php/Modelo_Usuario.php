<?php
include_once 'bd.php';

class Modelo_Usuario{
	private $bd;		// Tipo: BD
	private $usuario;	// Tipo: Controlador_Usuario
	
	public function __construct($control_Usuario){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->usuario = $control_Usuario;
	}
	
	// Void
	public function buscar_Usuario($user){
		$sql = "select Documento, Nombres, Apellidos, Usuario, Password, Pregunta, Respuesta,
			Tipo_Documento,Ciudad, Direccion, Edad,Foto,Telefono,Correo_Electronico,
			Genero,perfiles_Nombre 
			from usuarios where Usuario='$user'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->usuario->set_Nid($reg['Documento']);
			$this->usuario->set_Usuario($reg['Usuario']);
			$this->usuario->set_Password($reg['Password']);
			$this->usuario->set_Nombres($reg['Nombres']);
			$this->usuario->set_Apellidos($reg['Apellidos']);
			$this->usuario->set_TipoId($reg['Tipo_Documento']);
			$this->usuario->set_Ciudad($reg['Ciudad']);
			$this->usuario->set_Direccion($reg['Direccion']);
			$this->usuario->set_Email($reg['Correo_Electronico']);
			$this->usuario->set_Pregunta($reg['Pregunta']);
			$this->usuario->set_Respuesta($reg['Respuesta']);
			$this->usuario->set_Celular($reg['Telefono']);
			$this->usuario->set_Edad($reg['Edad']);
			$this->usuario->set_Foto($reg['Foto']);
			$this->usuario->set_Perfil($reg['perfiles_Nombre']);

		}
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
