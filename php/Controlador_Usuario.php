<?php

class Controlador_Usuario{
	private $nombre = "";
	private $apellidos = "";
	private $direccion = "";
	private $email = "";
	private $tipo_identificacion = "";
	private $n_identificacion = "";
	private $pregunta = "";
	private $respuesta = "";
	private $celular = 0;
	private $edad = 0;
	private $foto; // ImageIcon
	private $perfil; //Perfil
	
	public function __construct($nom, $apell, $dire, $e_mail, $tipo_id, $n_id,
						$pregun, $respues, $celu, $_edad, $fot, $perfi){
		$this->nombre = $nom;
		$this->apellidos = $apell;
		$this->direccion = $dire;
		$this->email = $e_mail;
		$this->tipo_identificacion = $tipo_id;
		$this->n_identificacion = $n_id;
		$this->pregunta = $pregu;
		$this->respuesta = $respues;
		$this->celular = $celu;
		$this->edad = $_edad;
		$this->foto = $fot;
		$this->perfil = $perfi;
		
	}
	
	public function get_Nombre(){
		return $this->nombre;
	}
	
	public function get_Apellidos(){
		return $this->apellidos;
	}
	
	public function get_Direccion(){
		return $this->direccion;
	}
	
	public function get_Email(){
		return $this->email;
	}
	
	public function get_Tipo_Id(){
		return $this->tipo_identificacion;
	}
	
	public function get_Nid(){
		return $this->n_identificacion;
	}
	
	public function get_Pregunta(){
		return $this->pregunta;
	}
	
	public function get_Respuesta(){
		return $this->respuesta;
	}
	
	public function get_Celular(){
		return $this->celular;
	}
	
	public function get_Edad(){
		return $this->edad;
	}
	
	public function get_Foto(){
		return $this->foto;
	}
	
	public function get_Perfil(){
		return $this->perfil;
	}
	
	

	public function set_Nombre($nom){
		$this->nombre = $nom;
	}
	
	public function set_Apellidos($apell){
		$this->apellidos = $apell;
	}
	
	public function set_Direccion($dire){
		$this->direccion = $dire;
	}
	
	public function set_Email($e_mail){
		$this->email = $e_mail;
	}
	
	public function set_Tipo_Id($tipo_id){
		$this->tipo_identificacion = $tipo_id;
	}
	
	public function set_N_Id($n_id){
		$this->n_identificacion = $n_id;
	}
	
	public function set_Pregunta($pregun){
		$this->pregunta = $pregun;
	}
	
	public function set_Respuesta($respues){
		$this->respuesta = $respues;
	}
	
	public function set_Celular($celu){
		$this->celular = $celu;
	}
	
	public function set_Edad($_edad){
		$this->edad = $_edad;
	}
	
	public function set_Foto($fot){
		$this->foto = $fot;
	}
	
	public function set_Perfil($perfi){
		$this->perfil = $perfi; 
	}
	
}

?>
