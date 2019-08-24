<?php session_start();
if(!isset($_SESSION['usuario']))
    header('Location: login.php');
    
	require 'vista/especialidades_vista.php';

?>