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
		$fecha = limpiarDatos($_POST['fecha']);
        $hora = limpiarDatos($_POST['hora']);
        $paciente = limpiarDatos($_POST['paciente']);
        $medico = limpiarDatos($_POST['medico']);
        $consultorio = limpiarDatos($_POST['consultorio']);
        $estado = limpiarDatos($_POST['estado']);
        $observaciones = limpiarDatos($_POST['observaciones']);
		
		$statement = $conexion->prepare(
		"UPDATE citas SET
        citfecha = :fecha,
        cithora = :hora,
        citPaciente = :paciente,
        citMedico = :medico,
        citConsultorio = :consultorio,
        citestado = :estado,
        citobservaciones = :observaciones,
		WHERE idcita =:id");

		$statement ->execute(array(
			':id'=>$id,
			':fecha'=> $fecha,
            ':hora'=> $hora,
            ':paciente'=> $paciente,
            ':medico'=> $medico,
            ':consultorio'=> $consultorio,
            ':estado'=> $estado,
            ':observaciones'=> $observaciones
			));
        header('Location: citas.php');
	}else{
		$id_cita = id_numeros($_GET['idcita']);
		if(empty($id_cita)){
			header('Location: citas.php');
		}
		$cita = obtener_cita_id($conexion,$id_cita);
		
		if(!$cita){
			header('Location: citas.php');
		}
		$cita =$cita[0];
	}
	require 'vista/actualizarcitas_vista.php';
?>