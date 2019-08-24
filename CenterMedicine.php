<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/contenido_vista.php';
}else{
	header('Location: login.php');
}
?>