<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Pacientes</h2>
						<input required type="numeric" name="identificacion" placeholder="identificación:">
						<input required type="text" name="nombres" placeholder="Nombres:">
						<input required type="text" name="apellidos" placeholder="Apellidos:">
						<input type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento:">
						<select name="sexo">
                            <option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option> 
                        </select>
						<input type="submit" name="enviar" value="Agregar Medico">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>