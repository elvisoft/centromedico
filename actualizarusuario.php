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
	$usuario = limpiarDatos($_POST['usuario']);
	$password = limpiarDatos($_POST['password']);
	$password2 = limpiarDatos($_POST['password2']);
	$nombres = limpiarDatos($_POST['nombres']);
	$apellidos = limpiarDatos($_POST['apellidos']);
	$roll = limpiarDatos($_POST['roll']);
	
	$statement = $conexion->prepare(
		"UPDATE usuarios
		SET nombres =:nombres, 
		apellidos =:apellidos, 
		usuario =:usuario, 
		roll =:roll
		WHERE id = :id");

	$statement ->execute(array(
		':nombres'=>$nombres, 
		':apellidos'=>$apellidos, 
		':usuario'=>$usuario, 
		':roll'=>$roll,
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
