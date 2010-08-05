<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Union de Conductores Lineas Unidas</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<!--link rel="stylesheet" type="text/css" media="screen" href="http://demos111.mootools.net/demos/Fx.Slide/style.css" /--> 
	<script type="text/javascript" src="http://demos111.mootools.net/demos/mootools.svn.js"></script> 
	<script type="text/javascript" src="http://demos111.mootools.net/scripts/demos.js"></script> 
	<script type="text/javascript"> 
		window.addEvent('domready', function(){
			var mySlide = new Fx.Slide('test').hide();
			$('toggle').addEvent('click', function(e){
				e = new Event(e);
				mySlide.toggle();
				e.start();
			});
					}); 
	</script> 
</head>
<body>
<?php 
			include_once("librerias/Libreria.php");
?>
<div id=todo>
	<div id="login">
		<a id="toggle" href="#">Login</a>
		<div id="test">
			<form action="" method="post">
				<label for="cedula">Cedula: </label><input type="text" id="cedula">
				<label for="clave">Clave: </label><input type="password" id="clave">
				<input type="submit" value="Ingresar">
	 		</form>
		</div>
	</div>
	<div id="header">
		<div id="logo">
			<h1><a href="#"></a></h1>
			
		</div>
	</div>
	<!-- end #header -->
	<div class="menu">
		<ul>
			<li <?php if($Principal=="1" or $Principal== null){	 echo 'class="first"';}?>><a href="index.php?Principal=1">Inicio</a></li>
			<li <?php if($Principal=="2"){	 echo 'class="first"';}?>><a href="index.php?Principal=2">Intranet</a></li>
			<li <?php if($Principal=="3"){	 echo 'class="first"';}?>><a href="index.php?Principal=3">Informacion</a></li>
			<li <?php if($Principal=="4"){	 echo 'class="first"';}?>><a href="index.php?Principal=4">Sedes</a></li>
			<li <?php if($Principal=="5"){	 echo 'class="first"';}?>><a href="index.php?Principal=5">Contacto</a></li>
		</ul>
	</div>
	<!-- end #menu -->
<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<?php
				if($Principal=="1" or $Principal== null){
					
				}
				elseif($Principal=="2"){
					include_once("registro.php");
				}
				elseif($Principal=="3"){
				}
				elseif($Principal=="4"){
				}
				elseif($Principal=="5"){
				}
				else{
					include_once("registro.php");
				}
			?>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<?php
				if($Principal=="1" or $Principal== null){
					
				}
				elseif($Principal=="2"){
					echo '<ul>
						<h2>SRES</h2>
						<h3> Sistema de Registro de Entrada y Salida</h3>
							Este Sistema permite el registro de los empleados para llevar un control de la hora de entrada y salida.
							<br/>
							<h3><a href="index.php?Control=1">Sistema de Control de Asistencia</a></h3>
						<br/>
						<br/>
						<br/>
					</li>
				</ul>';
				}
				elseif($Principal=="3"){
				}
				elseif($Principal=="4"){
				}
				elseif($Principal=="5"){
				}
				else{
					include_once("registro.php");
				}
			?>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
</div>
	<div id="footer">
			<?php 
				addFooter();
			?>
	</div>
	<!-- end #footer -->
</div>
<!--End #todo-->
</body>
</html>
