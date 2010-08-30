<?php
$var = '
			<form action="index.php" method="post" title="Formularo de Ingreso">
				<h2>Sistema de Control de Asistencia</h2>
				<br />
				<label>Cedula</label>
				<input name= "Cedula" type="text" title="Ingrese su Cedula de Identidad" />
				<br />
				<label>Clave</label>
				<input name= "Clave" type="password" title="Ingrese su Clave de 4 Digitos" />
				<br />
				<input type="hidden" name="Principal" value="2"/>
				<input type="submit" value="Ingresar"/>
				<input type="reset" value="Limpiar"/>
			</form>
			<input type="button" value="Salir" onClick="redireccionar()" />';
echo $var;
?>
