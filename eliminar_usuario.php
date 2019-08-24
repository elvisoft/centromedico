<?php
	$mensaje='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM usuarios WHERE id = '$_REQUEST[id]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: usuarios.php');
		$mensaje .='Usuario eliminado correctamente';
	}
?>