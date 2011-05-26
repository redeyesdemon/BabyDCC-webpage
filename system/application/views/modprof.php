			<!-- Contenido principal -->
			
			<div id="main">
				
				<a name="profile"></a>
				<h2>Editar mi perfil</h2>
				<form action="<?php echo base_url();?>index.php/babydcc/modperfil/" method="post">
					<div align="center">
						<table>
							<tr>
								<th class="first" colspan="2" style="text-align:center;">Datos de usuario</th>
							</tr>
							<tr class="row-a">
								<td><label>Nombre</label></td>
								<td><input type="text" id="new_nam" name="new_nam" readonly="readonly"value="<?php echo $nomb.' '.$apell;?>" /></td>
							</tr>
							<tr class="row-b">
								<td><label>RUT</label></td>
								<td><input type="number" id="neo_rut" name="neo_rut" readonly="readonly"value="<?php echo $rut;?>" /></td>
							</tr>
							<tr class="row-a">
								<td><label>Matr&iacute;cula</label></td>
								<td><input type="number" id="new_mat" name="new_mat" readonly="readonly" value="<?php echo $matri;?>" /></td>
							</tr>
							<tr class="row-b">
								<td><label>Email</label></td>
								<td><input type="email" id="new_ema" name="new_ema" value="<?php echo $emai;?>" /></td>
							</tr>
							<tr class="row-a">
								<td><label>Tel&eacute;fono</label></td>
								<td><input type="number" id="new_tel" name="new_tel" value="<?php echo $tele;?>" /></td>
							</tr>
							<tr class="row-b">
								<td><label>Apodo</label></td>
								<td><input type="text" id="new_apo" name="new_apo" value="<?php echo $apod;?>" /></td>
							</tr>
							<tr class="row-a">
								<td><label>Departamento</label></td>
								<td><input type="text" id="new_dep" name="new_dep" readonly="readonly" value="<?php echo $depar;?>" /></td>
							</tr>
						</table>
						<br />
						<table>
							<tr>
								<th class="first" colspan="2" style="text-align:center;">Cambiar avatar</th>
							</tr>
							<tr class="row-a">
								<td colspan="2"><span>Para cambiar tu avatar, haz clic <a href="<?php echo base_url();?>index.php/babydcc/avatar/">aqu&iacute;</a></span></td>
							</tr>
						</table>
						<br />
						<table>
						<br />
						<table>
							<tr>
								<th class="first" colspan="2" style="text-align:center;">Cambiar contrase&ntilde;a</th>
							</tr>
							<tr class="row-a">
								<td><label>Contrase&ntilde;a nueva</label></td>
								<td><input type="password" id="new_pass" name="new_pass" /></td>
							</tr>
							<tr class="row-b">
								<td><label>Repita Contrase&ntilde;a nueva</label></td>
								<td><input type="password" id="new_pass2" name="new_pass2" /></td>
							</tr>
							<tr class="row-a">
								<td colspan="2">
									<span>Si no deseas cambiar tu contrase&ntilde;a, deja esto en blanco </span>
								</td>
							</tr>
						</table>
						<br />
						<table>
							<tr class="row-a">
								<td colspan="2">
									<span>Para confirmar los cambios, debes ingresar tu contrase&ntilde;a actual</span>
								</td>
							</tr>
							<tr class="row-b" align="center">
								<td><label>Ingrese contrase&ntilde;a actual*</label></td>
								<td><input type="password" id="usu_pass" name="usu_pass" /></td>
							</tr>
							<tr class="row-a">
								<td colspan="2" align="center">
									<input class="button" type="submit" value="Modificar mis datos" />
									&nbsp;
									<input class="button" type="button" value="Cancelar" onclick="javascript:location.href='<?php echo base_url();?>index.php/babydcc/principal/'" />
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>
		
			<!-- Contenido finaliza aquí -->
