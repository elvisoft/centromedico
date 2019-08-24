<?php
	$errores='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM pacientes WHERE idPaciente = '$_REQUEST[idPaciente]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: Pacientes.php');
		$errores .='Medico eliminado correctamente';
	}
?>