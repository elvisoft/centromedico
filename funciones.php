<?php
	function conexion(){
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
			return $conexion;
		}catch(PDOException $e){
			return false;
		}
	}
	function limpiarDatos($datos){
		$datos = trim($datos);
		$datos = stripslashes($datos);
		$datos = htmlspecialchars($datos);
		return $datos;
	}
	function id_numeros($id){
		return (int)limpiarDatos($id);
	}
	function obtener_medico_id($conexion,$id){
		$resultado = $conexion->query("SELECT * FROM medicos WHERE idMedico = $id LIMIT 1");
		$resultado = $resultado->fetchAll();
		return ($resultado) ? $resultado : false;
	}
    function obtenerUser_id($conexion,$id){
        $resultado = $conexion->query("SELECT * FROM usuarios WHERE id = $id LIMIT 1");
		$resultado = $resultado->fetchall();
		return ($resultado) ? $resultado : false;
        
    }
    function obtener_consultorio_id($conexion,$id_consultorio){
        $resultado = $conexion->query("SELECT * FROM consultorios WHERE idConsultorio = $id_consultorio LIMIT 1");
		$resultado = $resultado->fetchall();
		return ($resultado) ? $resultado : false;
    }
    function obtener_especialidad_id($conexion,$id_especialidad){
        $resultado = $conexion->query("SELECT * FROM especialidades WHERE idespecialidad = $id_especialidad LIMIT 1");
		$resultado = $resultado->fetchall();
		return ($resultado) ? $resultado : false;
    }
    function obtener_cita_id($conexion,$id_cita){
        $resultado = $conexion->query("SELECT * FROM citas WHERE idcita = $id_cita LIMIT 1");
		$resultado = $resultado->fetchall();
		return ($resultado) ? $resultado : false;
    }

?>