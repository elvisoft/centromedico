<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$mensaje='';
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
		}catch(PDOException $e){
			echo "Error: ". $e->getMessage();
			die();
		}

	if($mensaje==''){
		$statement = $conexion->prepare(
		"INSERT INTO consultorios
		values(null,:nombre)");

		$statement ->execute(array( 
		':nombre'=> $nombre
		));
		header('Location: consultorios.php');
	}
}
require 'vista/agg_consultorios_vista.php';
?>