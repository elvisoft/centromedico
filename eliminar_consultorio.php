<?php
	$mensaje='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM consultorios WHERE idconsultorio = '$_REQUEST[idConsultorio]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: consultorios.php');
		$mensaje .='Consultorio eliminado correctamente';
	}
?>