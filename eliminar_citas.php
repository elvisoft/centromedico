<?php
	$errores='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM citas WHERE idcita = '$_REQUEST[idcita]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: medicos.php');
		$errores .='Cita eliminada correctamente';
	}
?>