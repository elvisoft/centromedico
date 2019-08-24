<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>ESPECIALIDADES</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR ESPECIALIDAD</h2><br/>
                        <input type="hidden" name="id" value="<?php echo $especialidad['idespecialidad'];?>">
                        <input type="text" name="nombre" placeholder="Especialdades:" value="<?php echo $especialidad['espNombre'];?>" autofocus/>
                        <input type="submit" value="Editar Especialidad" />
                        <?php  if(!empty($errores)): ?>
                          <ul>
                              <?php echo $errores; ?>
                          </ul>
                        <?php  endif; ?>
                     </form>
                    <a class="btn-regresar" href="usuarios.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>