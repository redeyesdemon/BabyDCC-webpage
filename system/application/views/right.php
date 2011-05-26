
			<!-- Menu derecho -->

			<div id="sidebar">
				<?php if($per == 0){?>
				<h3>Login</h3>
				<?php }else{?>
				<h3>Bienvenido</h3>
				<!-- Colocar codigo para nombre aquí -->
				<?php }?>
				<div class="left-box">
					<?php if($per == 0){?>
					<form class="searchform" method="post" action="<?php echo base_url();?>index.php/main/login/">
					<label>Usuario</label>
					<input name="usu" type="text" /><br  />
					<label>Contrase&ntilde;a</label>
					<input name="con" type="password" /><br  />
					<input class="button" type="submit" value="Ingresar" />
					</form>
					<?php }else{
					foreach($permissions[$per] as $perm => $nomb){?>
					<h4><a href="<?php echo $links[$perm];?>"><?php echo $nomb;?></a></h4><br />
					<?php } ?>
					<h4><a href="<?php echo base_url().'index.php/babydcc/logout/';?>">Logout</a></h4>
					<?php }?>
				</div>
			
				<h3>Links</h3>
				<ul class="sidemenu">
					<li><a href="http://www.cadcc.cl/"><strong>CaDCC.cl</strong></a></li>
					<li><a href="http://www.u-cursos.cl/"><strong>U-Cursos</strong></a></li>
				</ul>						
								
			</div>
			
			<!-- Menu derecho finaliza aqui -->
