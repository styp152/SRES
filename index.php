<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Sistema de Registro de Entrada y Salida, Lineas Unidas</title>
</head>
<body>

<div id="header">
<?php
require("Librerias/libreria.php");
header();
?>
</div>
<div id="main">
	<form action="registrarAsistencia.php" method="post" title="Formularo de Registro">
		<label>Clave</label>
		<input type="password" title="Ingrese su Clave de 4 Digitos" />
		<br />
		<input type="submit" value="Registrar"/>
		<input type="reset" value="Cancelar"/>
	</form>
</div>
<div id="footer">
</div>
</body>
</html>

