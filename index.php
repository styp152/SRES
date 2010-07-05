<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="librerias/Libreria.js" language="javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<title>Sistema de Registro de Entrada y Salida, Lineas Unidas</title>
	</head>
	<body>
		<?php 
			include_once("librerias/Libreria.php");
			conectarDB();
		?>
		<div id="header" align="center">
			<?php 
				addHeader();
			?>
		</div>
		<div id="main" align="center">
			<?php
				if($Cedula != null and $Clave == null){
					$check=updateAsistencia($Cedula);
				}
				elseif($Cedula != null and $Clave != null){
					$check=initControlAsistencia($Cedula, $Clave);
				}
				elseif($Control == "1"){
					initLoginControl();
				}
				elseif($persona != null and ($mes>= 0 or ($fecha1!= null and $fecha2!= null))){
					$check=showControlAsistencia($persona, $mes, $fecha1, $fecha2);
				}
				else{
					addMainRegister();
				}
				if($check == "1"){
						fail();
				}
			?>
		</div>
		<div id="footer" align="center">
			<?php 
				addFooter();
			?>
		</div>
	</body>
</html>
