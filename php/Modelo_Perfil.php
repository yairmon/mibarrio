<?php
include_once 'bd.php';

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
		$salida = false;
		$nombre = $perfil->get_Nombre();
		$sistema= $perfil->get_PermisoSistema();
		$perfiles= $perfil->get_PermisoPerfiles();
		$productos= $perfil->get_permisoProductos();
		$inventario= $perfil->get_permisoInventario();
		$facturacion= $perfil->get_permisoFacturacion();
		$reportes= $perfil->get_PermisoReportes();
		
		$salida = "";
		if(!$sistema && !$perfiles && !$productos && !$inventario && !$facturacion && !$reportes){
			$salida = "error4";
		}else{
			try{


				$sql = "INSERT INTO perfiles (Nombre, Sistema, Perfiles, Productos, Inventario, Facturacion, Reportes) 
				VALUES ('$nombre', '$sistema', '$perfiles', '$productos', '$inventario', '$facturacion', '$reportes')";
				$this->bd->insertar($sql);
				$salida = "exito";
				//header("Location: ../pages/Crear_Perfil.php?gestion=exito");
			}
			catch(Exception $e){
					echo "error";
			}
		}
		return $salida;
	}
	
	// Void
	public function modificar_Perfil($perfi){
		$salida = false;
		try{

				 $sql="UPDATE usuarios, perfiles  
            SET usuarios.perfiles_Nombre = '".$this->perfil->get_Nombre()."', 
            							perfiles.Nombre = '".$this->perfil->get_Nombre()."',
										perfiles.Sistema ='".$this->perfil->get_PermisoSistema()."',
										perfiles.Perfiles = '".$this->perfil->get_PermisoPerfiles()."',
										perfiles.Productos = '".$this->perfil->get_PermisoProductos()."',
										perfiles.Inventario = '".$this->perfil->get_PermisoInventario()."',
										perfiles.Facturacion = '".$this->perfil->get_PermisoFacturacion()."',
										perfiles.Reportes = '".$this->perfil->get_PermisoReportes()."'              
            WHERE (usuarios.perfiles_Nombre = '$perfi' AND perfiles.Nombre = '$perfi')";

			if(!(strlen($this->perfil->get_Nombre()) > 1))
				$salida = 2;
			elseif($this->bd->insertar($sql))
				$salida = 1;

			//header("Location: ../pages/Crear_Perfil.php?gestion=exito");
		}
		catch(Exception $e){
				echo "error";
		}

		return $salida;
	}
	
	// Void: Busca en la BD el $perfi, y lo elimina
	public function eliminar_Perfil($perfi){

		$nombre=$perfi;

		$salida = false;
		try{
			$sql = "DELETE FROM `base1`.`perfiles` WHERE `perfiles`.`Nombre` = '".$nombre."' ";
			$this->bd->insertar($sql);
			$salida = true;
			//header("Location: ../pages/Crear_Perfil.php?gestion=exito");
		}
		catch(Exception $e){
				echo "error";
		}
		return $salida;


	}
	
	// Void: Busca en la BD el perfil y lo guarda en el Controlador
	public function buscar_Perfil($perfi){
		$sql = "select Nombre,Sistema,Perfiles,Productos,Inventario,Facturacion, Reportes
	                        from perfiles where Nombre='$perfi'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->perfil->set_Nombre($reg['Nombre']);
			$this->perfil->set_PermisoSistema($reg['Sistema']);
			$this->perfil->set_PermisoPerfiles($reg['Perfiles']);
			$this->perfil->set_PermisoProductos($reg['Productos']);
			$this->perfil->set_PermisoInventario($reg['Inventario']);
			$this->perfil->set_PermisoFacturacion($reg['Facturacion']);
			$this->perfil->set_PermisoReportes($reg['Reportes']);

		}
	}

	public function desconectarBD(){
		$this->bd->desconectar();
	}
	

	public function mostrar_Todos(){

		$sql = "select * from perfiles";
		$registros = $this->bd->consultar($sql);
		$ar;

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 7; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}
}

?>
