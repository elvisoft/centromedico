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
        header('Location: usuarios.php');
	}else{
		$id_usuario = id_numeros($_GET['id']);
		if(empty($id_usuario)){
			header('Location: usuarios.php');
		}
		$user = obtenerUser_id($conexion,$id_usuario);
		
		if(!$user){
			header('Location: usuarios.php');
		}
		$user =$user[0];
	}
	require 'vista/actualizarusuario.php';
?>