<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="<?php echo base_url();?>images/Envision.css" type="text/css" />
<script src="<?php echo base_url();?>images/scripts.js"></script>
<script src="<?php echo base_url();?>js/jquery-1.5.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui-1.8.9.custom.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/redmond/jquery-ui-1.8.9.custom.css" type="text/css" />

<title><?php echo $titulo;?></title>
	
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
				<li<?php if($mode == "ind") echo " id=\"current\"";?>><a href="<?php echo base_url().'index.php/main/index/';?>">Principal</a></li>
				<li<?php if($mode == "reg") echo " id=\"current\"";?>><a href="<?php echo base_url().'index.php/main/register/';?>">Registro de equipos</a></li>
				<li<?php if($mode == "tea") echo " id=\"current\"";?>><a href="<?php echo base_url().'index.php/main/equipos/';?>">Equipos</a></li>
				<li<?php if($mode == "pos") echo " id=\"current\"";?>><a href="<?php echo base_url().'index.php/main/tabla/';?>">Posiciones</a></li>
				<li<?php if($mode == "fix") echo " id=\"current\"";?>><a href="<?php echo base_url().'index.php/main/fixture/';?>">Fixture</a></li>
				<li<?php if($mode == "abo") echo " id=\"current\"";?>><a href="<?php echo base_url().'index.php/main/about/';?>">Acerca de</a></li>		
			</ul>
		</div>
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
