<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}
//SELECT PARA MEDICOS
$medicos = $conexion -> prepare("SELECT * FROM medicos");

$medicos ->execute();
$medicos = $medicos ->fetchAll();
if(!$medicos)
	$mensaje .= 'No hay medicos, por favor registre primero! <br />';
//SELECT PARA CONSULTORIOS
$consultorios = $conexion -> prepare("SELECT * FROM consultorios");

$consultorios ->execute();
$consultorios = $consultorios ->fetchAll();
if(!$consultorios)
	$mensaje .= 'No hay consultorios, por favor registre primero! <br />';
//SELECT PARA PACIENTES
$pacientes = $conexion -> prepare("SELECT * FROM pacientes");

$pacientes ->execute();
$pacientes = $pacientes ->fetchAll();
if(!$pacientes)
	$mensaje .= 'No hay pacientes, por favor registre primero! <br />';

?>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CITAS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Citas</h2>
						<label>Fecha:</label>
						<input type="hidden" name="id" value="<?php echo $cita['idcita'];?>" >
                        <input type="date" name="fecha" placeholder="Fecha:" value="<?php echo $cita['citfecha'];?>" required/>
                        <label>Hora:</label>
                        <input type="time" name="hora" value="11:45" max="20:30" min="08:00" step="60" value="<?php echo $cita['cithora'];?>" required>
                        <label>Paciente:</label>
                        <select name="paciente" class="mayusculas" required>
                        	<option value="<?php echo $cita['citPaciente'];?>"><?php echo $cita['citPaciente'];?></option> 
	                        <?php foreach ($pacientes as $Sql2): ?>
							<?php echo "<option value='". $Sql2['pacNombre']. "'>". $Sql2['pacNombre']."</option>"; ?>
							<?php endforeach; ?>
                        </select>
                        <label>Medicos:</label>
                        <select name="medico" class="mayusculas" required>
                        	<option value="<?php echo $cita['citMedico'];?>"><?php echo $cita['citMedico'];?></option>  
	                        <?php foreach ($medicos as $Sql): ?>
							<?php echo "<option value='". $Sql['mednombres']. "'>". $Sql['mednombres']." ". $Sql['medapellidos']. "</option>"; ?>
							<?php endforeach; ?>
                        </select>
                        <label>Consultorios:</label>
                        <select name="consultorio" class="mayusculas" required>
                        	<option value="<?php echo $cita['citConsultorio'];?>"><?php echo $cita['citConsultorio'];?></option> 
	                        <?php foreach ($consultorios as $Sql2): ?>
							<?php echo "<option value='". $Sql2['conNombre']. "'>". $Sql2['conNombre']."</option>"; ?>
							<?php endforeach; ?>
                        </select>
                        <label>Estado:</label required>
                        <select name="estado">
                        if (<?php echo $cita['citMedico'];?>=asignado){
                        	<option value="asignado">Asignado</option>
                        	<option value="atendido">Atendido</option> 
                        }
                        if (<?php echo $cita['citMedico'];?>=atendido){
                        	<option value="atendido">Atendido</option> 
                        	<option value="asignado">Asignado</option>
                        }
                                   	
                        </select>
                        <label>Observaciones:</label>
                        <textarea placeholder="Observacion:" name="observaciones" value="<?php echo $cita['citobservaciones'];?>"></textarea>
						<input type="submit" name="enviar" value="Agregar Consultorio">
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