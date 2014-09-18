<?php
switch( $_POST['editarP'] ) {
	case "Editar perfil": 
		header("Location: ../pages/Modificar_Perfil.php?gestion=1");
break;
	case "Eliminar perfil": 
		header("Location: ../pages/Crear_Usuario.php?gestion=1");
break;
}
?>