<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="images/Envision.css" type="text/css" />
<script src="images/scripts.js"></script>
<script src="js/jquery-1.5.js"></script>
<script src="js/jquery-ui-1.8.9.custom.min.js"></script>
<link rel="stylesheet" href="css/redmond/jquery-ui-1.8.9.custom.css" type="text/css" />

<title>Baby DCC - 2011</title>
	
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="index.html">Baby dcc (Alpha 1)</a></h1>		
			<p id="slogan">Torneo 2011</p>		
						
		</div>
		
		<!-- menu -->	
		<div  id="menu">
			<ul>
				<li id="current"><a href="index.html">Principal</a></li>
				<li><a href="reg.html">Registro de equipos</a></li>
				<li><a href="index2.html">Equipos</a></li>
				<li><a href="index2.html">Posiciones</a></li>
				<li><a href="index2.html">Fixture</a></li>
				<li class="last"><a href="index.html">Acerca de</a></li>		
			</ul>
		</div>
			
		<!-- content-wrap starts here -->
		<!-- Menu derecho -->
		<div id="content-wrap">
				
			<div id="sidebar">
				<h3>Login</h3>
				<div class="left-box">
					<form class="searchform">
					<label>Usuario</label>
					<input type="text" /><br  />
					<label>Contraseña</label>
					<input ype="password" /><br  />
					<input class="button" type="submit" value="Ingresar" />
					</form>
				</div>
			
				<h3>Links</h3>
				<ul class="sidemenu">
					<li><a href="http://www.cadcc.cl/"><strong>CaDCC.cl</strong></a></li>
					<li><a href="http://www.u-cursos.cl/"><strong>U-Cursos</strong></a></li>
				</ul>						
								
			</div>
			
			<!-- Menu derecho finaliza aqui -->
			
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
						<tr>
							<td>Rut del capit&aacute;n</td>
							<td><?php echo $cap_rut;?></td>
						</tr>
					</table>
				</center>
				<p>El comprobante de inscripci&iacute;n puede ser descargado del siguiente link <a href="<?php echo base_url();?>index.php/main/comprobante/">Comprobante equipo <?php echo $tea_nam;?></a></p>
				<p>Recuerde que debe dirigirse al centro de alumnos con una copia del comprobante para formalizar la inscripci&oacute;n, de lo contrario, no ser&aacute; inscrito en el torneo</p>
			</div>
		
			<!-- Contenido finaliza aquí -->
		
		<!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			
			<p>
			&copy; 2011 <strong>CADCC</strong> | 
			Design by: <a href="http://www.styleshout.com/">styleshout</a> | 
			Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | 
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>	
		</div>	

<!-- wrap ends here -->
</div>

</body>
</html>
