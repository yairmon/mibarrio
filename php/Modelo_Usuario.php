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
			$this->usuario->set_Genero($reg['Genero']);
			$this->usuario->set_Perfil($reg['perfiles_Nombre']);

		}
	}

	public function buscar_Usuario2($id){
		$sql = "select Documento, Nombres, Apellidos, Usuario, Password, Pregunta, Respuesta,
			Tipo_Documento,Ciudad, Direccion, Edad,Foto,Telefono,Correo_Electronico,
			Genero,perfiles_Nombre 
			from usuarios where Documento='$id'";
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
			$this->usuario->set_Genero($reg['Genero']);
			$this->usuario->set_Perfil($reg['perfiles_Nombre']);

		}
	}
	
	// void
	public function eliminar_Usuario($nombre){
	}
	
	// Boolean: Actualiza la BD con los datos que hay en el Controlador: usuario
	public function actualizar_Datos_Usuario($documento){
		echo "<br>->docu->".$documento;
		echo "<br>->".$this->usuario->get_Nid();
		$sql = "UPDATE usuarios SET Documento='".$this->usuario->get_Nid()."',
									Nombres='".$this->usuario->get_Nombres()."',
									Apellidos = '".$this->usuario->get_Apellidos()."',
									Usuario = '".$this->usuario->get_Usuario()."',
									Password = '".$this->usuario->get_Password()."',
									Pregunta = '".$this->usuario->get_Pregunta()."',
									Respuesta = '".$this->usuario->get_Respuesta()."',
									Tipo_Documento = '".$this->usuario->get_TipoId()."',
									Ciudad = '".$this->usuario->get_Ciudad()."',
									Direccion = '".$this->usuario->get_Direccion()."',
									Edad = '".$this->usuario->get_Edad()."',
									Foto = '".$this->usuario->get_Foto()."',
									Telefono = '".$this->usuario->get_Celular()."',
									Correo_Electronico = '".$this->usuario->get_Email()."',
									Genero = '".$this->usuario->get_Genero()."',
									perfiles_Nombre = '".$this->usuario->get_Perfil()."'
			 WHERE Documento='".$documento."'";

		$salida = 0;
		// Validacion de los minimos
		if(!(strlen($this->usuario->get_Nid()) > 7))
			$salida = 2;
		elseif(!(strlen($this->usuario->get_Nombres()) > 1))
			$salida = 3;
		elseif(!(strlen($this->usuario->get_Apellidos()) > 1))
			$salida = 4;
		elseif(!(strlen($this->usuario->get_Usuario()) > 4))
			$salida = 5;
		elseif(!(strlen($this->usuario->get_Password()) > 5))
			$salida = 6;
		elseif(!(strlen($this->usuario->get_Pregunta()) > 9))
			$salida = 7;
		elseif(!(strlen($this->usuario->get_Respuesta()) > 1))
			$salida = 8;
		elseif(!(strlen($this->usuario->get_TipoId()) > 1))
			$salida = 9;
		elseif(!(strlen($this->usuario->get_Ciudad()) > 1))
			$salida = 11;
		elseif(!(strlen($this->usuario->get_Direccion()) > 2))
			$salida = 12;
		elseif(!(strlen($this->usuario->get_Edad()) > 0))
			$salida = 13;
		elseif(!(strlen($this->usuario->get_Foto()) > 2))
			$salida = 14;
		elseif(!(strlen($this->usuario->get_Celular()) > 7))
			$salida = 15;
		elseif(!(strlen($this->usuario->get_Email()) > 6))
			$salida = 16;
		elseif(!(strlen($this->usuario->get_Genero()) > 0))
			$salida = 17;
		elseif(!(strlen($this->usuario->get_Perfil()) > 0)){
			$salida = 18;

		}
		elseif($this->bd->insertar($sql)){
			$salida = true;;
		}
		echo '<p>Salida -> '.$salida;
		echo '<p>tam -> '.strlen($this->usuario->get_Pregunta());
		return $salida;
	}
	
	public function cambiar_Contra($nombre, $apell, $pass){
	}

	public function desconectarBD(){
		$this->bd->desconectar();
	}

	public function mostrar_Todos(){

		$sql = "select * from usuarios";
		$registros = $this->bd->consultar($sql);
		$ar;

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 16; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}
	
}

?>
