<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'vista/consultorios_vista.php';
}else{
	header('Location: index.php');
}
?>