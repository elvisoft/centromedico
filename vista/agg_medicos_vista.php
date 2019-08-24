<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

//CARGAR ESPECIALIDADES EN EL SELECT
$especialidad = $conexion -> prepare("SELECT * FROM especialidades");

$especialidad ->execute();
$especialidad = $especialidad ->fetchAll();
if(!$especialidad)
	$mensaje .= 'NO hay especialidades, por favor registre!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Medicos - CenterMedicine</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Medico</h2>
						<input required type="numeric" name="identificacion" placeholder="identificación:">
						<input required type="text" name="nombres" placeholder="Nombres:">
						<input required type="text" name="apellidos" placeholder="Apellidos:">
						<input type="email" name="correo" placeholder="Correo:">
						<input type="numeric" name="telefono" placeholder="Telefono:">
						<select name="especialidad">  
                        <?php foreach ($especialidad as $Sql): ?>
						<?php echo "<option value='". $Sql['espNombre']. "'>". $Sql['espNombre']. "</option>"; ?>
						<?php endforeach; ?>
						</select>
						<input type="submit" name="enviar" value="Agregar Medico">
						
					</form>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>