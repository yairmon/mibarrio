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
		
		try{


			$sql = "INSERT INTO perfiles (Nombre, Sistema, Perfiles, Productos, Inventario, Facturacion, Reportes) 
			VALUES ('$nombre', '$sistema', '$perfiles', '$productos', '$inventario', '$facturacion', '$reportes')";
			$this->bd->insertar($sql);
			$salida = true;
			//header("Location: ../pages/Crear_Perfil.php?gestion=exito");
		}
		catch(Exception $e){
				echo "error";
		}
		return $salida;
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
			$this->perfil->set_Nombre($reg['Nombre']);
			$this->perfil->set_PermisoSistema($reg['Sistema']);
			$this->perfil->set_PermisoPerfiles($reg['Perfiles']);
			$this->perfil->set_PermisoProductos($reg['Productos']);
			$this->perfil->set_PermisoInventario($reg['Inventario']);
			$this->perfil->set_PermisoFacturacion($reg['Facturacion']);

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
