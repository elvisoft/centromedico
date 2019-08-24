<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/editarperfil_vista.php';
}else{
	header('Location: login.php');
}
?>