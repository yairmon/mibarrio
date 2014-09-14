<?php
class Controlador_Logueo{
	private $acceso;	// boolean
	private $pregunta;  // String
	
	public function __construct(){
		$this->acceso = false;
		$this->pregunta = "";
	}
	
	public function get_Acceso(){
		return $this->acceso;
	}
	
	public function set_Acceso($acc){
		$this->acceso = $acc;
	}
	
	public function get_Pregunta(){
		return $this->pregunta;
	}
	
	public function set_Pregunta($pregu){
		$this->pregunta = $pregu;
	}
}


?>
