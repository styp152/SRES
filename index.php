<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Sistema de Registro de Entrada y Salida, Lineas Unidas</title>
</head>
<body>
<?include("librerias/Libreria.php");?>
<div id="header">
<?addHeader();?>
</div>
<div id="main">
<?php

if($registro != null){
addMainRegisterShow();
}
else{
addMainRegister();
}
?>
</div>
<?addFooter();?>
<div id="footer">
</div>
</body>
</html>

