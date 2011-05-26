			<!-- Contenido principal -->
			
			<div id="main">
				
				<a name="profile"></a>
				<h2>Editar mi avatar</h2>
				<form action="<?php echo base_url();?>index.php/babydcc/modavatar/" method="post" enctype="multipart/form-data">
					<div align="center">
						<table>
							<tr>
								<th class="first" colspan="2" style="text-align:center;">Cambiar avatar</th>
							</tr>
							<tr class="row-a">
								<td><label>Avatar actual</label></td>
								<td><img src="<?php echo $ava_nomb;?>" width="<?php echo $ava_wi;?>" height="<?php echo $ava_he;?>" /></td>
							</tr>
							<tr class="row-b">
								<td><label>Avatar nuevo</label></td>
								<td><input type="file" id="new_ava" name="new_ava" /></td>
							</tr>
							<tr class="row-a">
								<td colspan="2">
									<span>Tama&ntilde;o m&aacute;ximo de im&aacute;gen: 100 KB</span><br />
									<span>Dimensiones m&aacute;ximas: 100px x 100px</span><br />
									<span>Si no deseas cambiar tu avatar, deja esto en blanco </span>
								</td>
							</tr>
							<tr class="row-b">
								<td colspan="2" align="center">
									<input class="button" type="submit" value="Modificar avatar" />
									&nbsp;
									<input class="button" type="button" value="Cancelar" onclick="javascript:location.href='<?php echo base_url();?>index.php/babydcc/principal/'" />
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>
		
			<!-- Contenido finaliza aquí -->
