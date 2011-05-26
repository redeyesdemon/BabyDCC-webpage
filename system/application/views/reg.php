			<!-- Contenido principal -->
			
			<div id="main">
				
				<a name="register"></a>
				<h2>Registro de nuevo equipo</h2>
				
				<p>Este formulario es el &uacute;nico v&aacute;lido para registrar nuevos equipos en el campeonato</p>
				<p>La incripci&oacute;n se realiza con un m&iacute;nimo de 5 y hasta un m&aacute;ximo de 10 jugadores (inclu&iacute;do el capit&aacute;n).</p>
				<p><strong>Una vez llenado y enviado el formulario, se debe imprimir una copia del registro de inscripci&oacute;n y dirigirse al CADCC con una cuota de 6000 por equipo para formalizar la incripci&oacute;n. De lo contrario, el equipo no ser&aacute; inscrito en el torneo.</strong></p>
				<p> Las contrase&ntilde;as de los jugadores, ser&aacute;n enviadas a sus respectivos correos electr&oacute;nicos una vez formalizada la inscripci&oacute;n</p>
				<p>Los campos marcados con * son obligatorios.</p>
				<form method="post" action="<?php echo base_url();?>index.php/main/regequipo/" enctype="multipart/form-data">
					<input type="hidden" name="num_pla" id="num_pla" value="1" />
					<label><span style="color: red">Datos del Equipo</span></label>
					<center>
						<table>
							<tr>
								<td><label>Nombre*</label></td>
								<td><input type="text" name="tea_nam" id="tea_nam" /></td>
							</tr>
							<tr>
								<td><label>Color Primario*</label></td>
								<td><input type="text" name="tea_c1" id="tea_c1" /></td>
							</tr>
							<tr>
								<td><label>Color Secundario*</label></td>
								<td><input type="text" name="tea_c2" id="tea_c2" /></td>
							</tr>
							<tr>
								<td><label>Email del equipo</label></td>
								<td><input type="email" name="tea_ema" id="tea_ema" /></td>
							</tr>
							<tr>
								<td><label>Logo del equipo<label></td>
								<td><input type="file" name="tea_log" id="tea_log" /></td>
							</tr>
						</table>
					</center>
					<label>
						<span style="color: red">Datos del Capitan</span>
					</label>
					<center>
						<table>
							<tr>
								<td><label>Nombre*</label></td><td><input id="cap_nom" name="cap_nam" type="text" /></td>
							</tr>
							<tr>
								<td><label>Apellido*</label></td><td><input id="cap_ape" name="cap_ape" type="text" /></td>
							</tr>
							<tr>
								<td><label>RUT*</label></td>
								<td><input id="cap_rut" name="cap_rut" type="number" /></td>
							</tr>
							<tr>
								<td><label>Numero de Matr&iacute;cula*</label></td>
								<td><input id="cap_mat" name="cap_mat" type="number" /></td>
							</tr>
							<tr>
								<td><label>Especialidad*</label></td>
								<td><select id="cap_dep" name="cap_dep" onchange="checkDoc(1);">
									<option selected="selected" value="DCC">DCC</option>
									<option value="DDCC">Docente DCC</option>
									<option value="DAS">DAS</option>
									<option value="DFI">DFI</option>
									<option value="DGF">DGF</option>
									<option value="DGEO">DGeo</option>
									<option value="DIM">DIM</option>
									<option value="DII">DII</option>
									<option value="DIC">DIC</option>
									<option value="DIE">DIE</option>
									<option value="DIMIN">DIMIN</option>
									<option value="DIMEC">DIMEC</option>
									<option value="DIQBT">DIQBT</option>
									<option value="DCM">DCM</option>
									<option value="SN">Externo</option>
								</select></td>
							</tr>
							<tr>
								<td><label>Correo electr&oacute;nico*</label></td>
								<td><input id="cap_ema" name="cap_ema" type="email" /></td>
							</tr>
							<tr>
								<td><label>Telefono</label></td>
								<td><input id="cap_tel" name="cap_tel" type="number" /></td>
							</tr>
							<tr>
								<td><label>Apodo</label></td>
								<td><input id="cap_apo" name="cap_apo" type="text" /></td>
							</tr>
							<tr>
								<td><label>Contrase&ntilde;a*</label></td>
								<td><input id="cap_pass" name="cap_pass" type="password" /></td>
							</tr>
							<tr>
								<td><label>Repita Contrase&ntilde;a*</label></td>
								<td><input id="cap_pass2" name="cap_pass2" type="password" /></td>
							</tr>
						</table>
					</center>
					<label>
						<span style="color: red;">Datos de los jugadores</span>
					</label>
					<input type="button" class="button" value="Agregar jugador" onclick="addNewUser();" />
					<div id="pla_lst">
					</div>
					<center>
						<input class="button" type="submit" value="Registrar Equipo" onclick="return checkForm(this)" />
					</center>
				</form>
			</div>
		
			<!-- Contenido finaliza aquí -->
