<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}


if($_SERVER['REQUEST_METHOD']=='POST'){
	$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $roll = $_POST['roll'];
	$errores ='';
	if(empty($usuario) or empty($password)){
		$errores.= '<li>Por favor rellena todos los tados correctamente</li>';
	}
	else{
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
		}catch(PDOException $e){
			echo "ERROR: " . $e->getMessge();
			die();
		}
		$statement = $conexion -> prepare(
			'SELECT * FROM usuarios WHERE UsuNombre = :usuario LIMIT 1');
		$statement ->execute(array(':usuario'=>$usuario));
		$resultado= $statement->fetch();

		if($resultado != false){
			$errores .='<li>El nombre de usuario ya existe</li>';
		}


		$password = hash('sha512',$password);
		$password2 = hash('sha512',$password2);
		if($password2 != $password){
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
	}

	if($errores==''){
		$statement = $conexion->prepare(
			'INSERT INTO usuarios VALUES
            (null,:usuario,:pass, :nombres, :apellidos,:roll)');
		$statement-> execute(array(
			':usuario' => $usuario,
			':pass'=> $password2,
            ':nombres'=> $nombres,
            ':apellidos'=> $apellidos,
            ':roll'=> $roll
			));
		header('Location: usuarios.php');
	}
}
require 'vista/registro_vista.php';

?>
