<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	
	require 'funciones.php';
	
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	}catch(PDOException $e){
		echo "ERROR: " . $e->getMessge();
		die();
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = limpiarDatos($_POST['id']);
		$nombres = limpiarDatos($_POST['nombre']);
		
		$statement = $conexion->prepare(
		"UPDATE especialidades SET 
		espNombre =:nombres
        WHERE idespecialidad = :id");

		$statement ->execute(array(':id'=>$id, ':nombres'=>$nombres));
        header('Location: especialidades.php');
	}else{
		$id_especialidad = id_numeros($_GET['idespecialidad']);
		if(empty($id_especialidad)){
			header('Location: especialidades.php');
		}
		$especialidad = obtener_especialidad_id($conexion,$id_especialidad);
		
		if(!$especialidad){
			header('Location: especialidades.php');
		}
		$especialidad =$especialidad[0];
	}
	require 'vista/actualizarespecialidades_vista.php';
?>