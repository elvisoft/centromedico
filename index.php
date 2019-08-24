<?php session_start();
if (isset($_SESSION['usuario'])){
	header('Location: CenterMedicine.php');
}else{
	header('Location: login.php');
}	
?>