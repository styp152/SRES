<?php
session_start(); 
if (!isset($_SESSION["seccion"])){ 
   	$_SESSION["seccion"] = 1; 
} 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Union de Conductores Lineas Unidas</title>
<!-- includes usados para el calendario -->
          <link href="css/calendario.css" rel="stylesheet" type="text/css" />
          <script type="text/javascript" src="librerias/calendar.js"></script>
          <script type="text/javascript" src="librerias/calendar-es.js"></script>
          <script type="text/javascript" src="librerias/calendar-setup.js"></script>
<!-- hasta aqui los includes del calendario  -->
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
			echo $intranetcedula.$intranetclave;
			if($intranetcedula != null and $intranetclave != null){
				$check=loginIntranet($intranetcedula, $intranetclave);
				echo $check;
				if ($check=="1"){
					$_SESSION["log"]="1";
					$_SESSION["cedula"] = $person->cedula;
					$_SESSION["clave"] = $person->clave;}
			}
?>
<div id=todo>
	<div id="login">
		<?php
			if($_SESSION["log"] != "1"){
				echo '<a id="toggle" href="#">Login</a>
					<div id="test">		
						<form action="index.php" method="post">
							<label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula">
							<label for="clave">Clave: </label><input type="password" id="clave" name="clave">
							<input type="submit" value="Ingresar">
				 		</form>
					</div>';}
		?>
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
			<?php
				if($_SESSION["log"] == "1"){ 
					echo '<li';
					if($Principal=="2"){	 
						echo ' class="first" ';
					}
					echo '><a href="index.php?Principal=2">Intranet</a></li>';
					}?>
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
				if($check == "1"){
						fail();
				}
				else{
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
				}
			?>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<?php
				if($Principal=="1" or $Principal== null){
					
				}
				elseif($Principal=="2"){
					echo '<ul>';
					if($Control!="1"){
						echo '<h2>SRES</h2>';}
					echo '<li><h3><a href="index.php?Principal=2">Sistema de Registro de Entrada y Salida</a></h3></li>';
					if($Control!="1"){echo 'Este Sistema permite el registro de los empleados para llevar un control de la hora de entrada y salida.
							<br/>';}
					else{
						echo '<h2>SCA</h2>';
					}
					echo '<li><h3><a href="index.php?Control=1&Principal=2">Sistema de Control de Asistencia</a></h3></li>';
					if($Control=="1"){echo 'Este Sistema permite generar y consultar el listado de asistencia de los empleados para llevar un control.
							<br/>';}
					echo '<h3><a href="addon/endSession.php">Salir</a></h3>
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
