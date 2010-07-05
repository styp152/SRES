<?php
$var = '<form action="index.php" method="post" title="Formularo de Registro">
		<h2>Sistema de Registro de Entrada y Salida</h2>
		<br />
		<label>Cedula</label>
		<input name= "Cedula" type="text" title="Ingrese su Cedula de Identidad" />
		<br />
		<input type="submit" value="Registrar"/>
		<input type="reset" value="Limpiar"/>
	</form>
	<br />
	<!--<a href="index.php?Control=1">Sistema de Control de Asistencia</a>-->
	';
echo $var;
?>
