			<!-- Contenido principal -->
			
			<div id="main">
				
				<a name="newadm"></a>
				<h2>Registrar nuevo administrador</h2>
				<p>Utilice este formulario para registrar un nuevo administrador en el sistema</p>
				<form method="post" action="<?php echo base_url();?>index.php/main/regadmin/">
					<label>RUT(Username)</label>
					<input type="number" name="rut" />
					<label>Contrase&ntilde;a</label>
					<input type="password" name="pass" />
					<label>Nivel de permisos</label>
					<select name="per">
						<option selected="selected" value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
					<center><input class="button" type="submit" value="Registrar" /></center>
				</form>
			</div>
		
			<!-- Contenido finaliza aquí -->
