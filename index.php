<!<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="librerias/Libreria.js" language="javascript"></script>
		<title>Sistema de Registro de Entrada y Salida, Lineas Unidas</title>
	</head>
	<body>
		<?php 
			include_once("librerias/Libreria.php");
			conectarDB();
		?>
		<div id="header">
			<?php 
				addHeader();
			?>
		</div>
		<div id="main">
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
				else{
					addMainRegister();
				}
				if($check == "1"){
						fail();
				}
			?>
		</div>
		<div id="footer">
			<?php 
				addFooter();
			?>
		</div>
	</body>
</html>
