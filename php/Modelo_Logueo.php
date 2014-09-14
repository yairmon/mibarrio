<?php
include 'bd.php';
class Modelo_Logueo{
	private $bd;
	private $logueo;

	public function __construct($controlador_logueo){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->logueo = $controlador_logueo;
	}
	
	// Boolean
	public function valida_Usuario($usuario, $contra){
		$salida = false;
		$sql = "select Usuario,Password, mail from usuarios where Usuario='$usuario'";
		$registros = $this->bd->consultar($sql);
		while($reg=mysql_fetch_array($registros)){
			if($contra == $reg['Password']){
				$salida = true;
				break;
			}
		}
		$this->logueo->set_Acceso($salida);
	}

	// Void: Asigna en Controlador_Logueo la pregunta
	public function pregunta_Usuario($usuario){
		$salida = "";
		try{

			$sql = "select Usuario,Pregunta from usuarios where Usuario='$usuario'";
			$registros = $this->bd->consultar($sql);
			while($reg=mysql_fetch_array($registros)){
				$salida = $reg['Pregunta'];
			}

		}catch(Exception $e){
			echo "Error en la funcion pregunta_Usuario()";
		}

		$this->logueo->set_Pregunta($salida);
	}
	
	// void
	public function identifica_Perfil($usuario){
	//Comentario
	}
	
	public function restaurar_Contra($usuario_pregunta, $usuario_respuesta){
		
	}
	
	public function get_Logueo(){
		return $this->logueo;
	}

	
}
?>
