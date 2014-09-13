
<html>
<head>
<title>Problema</title>
</head>
<body>
<?php

include 'Modelo_Logueo.php';
include 'Controlador_Logueo.php';

	
// 				"Main"
$controlador = new Controlador_Logueo();
$validar = new Modelo_Logueo($controlador);

$usuario = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

//$validar->valida_Usuario($usuario,$pass);

if($usuario == "")
	header("Location: ../index.php?error2=1");
elseif($pass == "")
	header("Location: ../index.php?error3=1");
elseif(!$controlador->get_Acceso())
	header("Location: ../index.php?error=1");

echo "<h2>Bienvenido $usuario</h2>";
	


?>
</body>
</html>
