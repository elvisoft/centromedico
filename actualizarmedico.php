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
		$identificacion = limpiarDatos($_POST['identificacion']);
		$nombres = limpiarDatos($_POST['nombres']);
		$apellidos = limpiarDatos($_POST['apellidos']);
		$correo = limpiarDatos($_POST['correo']);
		$telefono = limpiarDatos($_POST['telefono']);
		$especialidad = limpiarDatos($_POST['especialidad']);
		
		$statement = $conexion->prepare(
		"UPDATE medicos
        SET medidentificacion = :identificacion, 
		mednombres =:nombres, 
		medapellidos =:apellidos, 
		medEspecialidad =:especialidad, 
		medtelefono =:telefono, 
		medcorreo =:correo 
		WHERE idMedico = :id");

		$statement ->execute(array(
        ':identificacion'=>$identificacion, 
		':nombres'=>$nombres, 
		':apellidos'=>$apellidos, 
		':especialidad'=>$especialidad, 
		':telefono'=>$telefono, 
		':correo'=>$correo,
        ':id'=> $id
        ));
        header('Location: medicos.php');
	}else{
		$id_medico = id_numeros($_GET['idMedico']);
		if(empty($id_medico)){
			header('Location: medicos.php');
		}
		$medico = obtener_medico_id($conexion,$id_medico);
		
		if(!$medico){
			header('Location: medicos.php');
		}
		$medico =$medico[0];
	}
	require 'vista/actulizarmedico_vista.php';
?>