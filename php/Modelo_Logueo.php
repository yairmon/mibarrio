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
		$sql = "select Usuario,Password, mail from usuarios where nombre='$usuario'";
		$registros = $this->bd->consultar($sql);
		while($reg=mysql_fetch_array($registros)){
			if($contra == $reg['pass']){
				$salida = true;
				break;
			}
		}
		$this->logueo->set_Acceso($salida);
	}
	
	// void
	public function identifica_Perfil($usuario){
	
	}
	
	public function restaurar_Contra($usuario_pregunta, $usuario_respuesta){
		
	}
	
	public function get_Logueo(){
		return $this->logueo;
	}

	
}
?>
