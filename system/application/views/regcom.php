			<!-- Contenido principal -->
			
			<div id="main">
				
				<a name="error"></a>
				<h2>Registro de Equipo completo</h2>
				<p>El registro del nuevo equipo se ha completado con &eacute;xito</p>
				<center>
					<table>
						<tr>
							<th class="first" colspan="2">Datos Registrados</th>
						</tr>
						<tr class="row-a">
							<td>Nombre de Equipo</td>
							<td><?php echo $tea_nam;?></td>
						</tr>
						<tr class="row-b">
							<td>Color Primario</td>
							<td><?php echo $tea_c1;?></td>
						</tr>
						<tr class="row-a">
							<td>Color Secundario</td>
							<td><?php echo $tea_c2;?></td>
						</tr>
						<tr class="row-b">
							<td>Email del equipo</td>
							<td><?php echo $tea_ema;?></td>
						</tr>
						<tr class="row-a">
							<td>Nombre del capit&aacute;n</td>
							<td><?php echo $cap_nam.' '.$cap_ape;?></td>
						</tr>
						<tr class="row-b">
							<td>Rut del capit&aacute;n</td>
							<td><?php echo $cap_rut;?></td>
						</tr>
					</table>
				</center>
				<p><strong>IMPORTANTE: </strong>El comprobante de inscripci&oacute;n puede ser descargado del siguiente link <a href="<?php echo base_url();?>index.php/main/comprobante/<?php echo $id_tea;?>/">Comprobante equipo <?php echo $tea_nam;?></a></p>
				<p>Recuerde que debe dirigirse al centro de alumnos con una copia del comprobante para formalizar la inscripci&oacute;n, de lo contrario, no ser&aacute; inscrito en el torneo</p>
				<p>Las contrase&ntilde;as de los jugadores fueron configuradas a su RUT. &Eacute;stas deben ser cambiadas por cada jugador a la brevedad ingresando al sitio.</p>
			</div>
		
			<!-- Contenido finaliza aquí -->
