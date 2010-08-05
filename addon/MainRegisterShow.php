<?php
echo '<h2>Registro<h2>';
echo '<h3>';
echo $person->getNombre(). " " .$person->apellido;
echo '</h3>';
echo '<h4>';
echo $person->nacionalidad;
echo '-';
echo $person->cedula;
echo '</h4>';
echo '<table align="center" border="0"><tr><td>Hora de Entrada</td><td>Hora de Salida</td></tr><tr><td>';
echo $asisten->horaEntrada;
echo '</td><td>';
if ($asisten->horaSalida=='00:00:00'){
	echo '-';
}
else{
	echo $asisten->horaSalida;
}
echo '</td></tr></table>';
echo '<input type="button" value="Ok" onClick="redireccionar()" />';
?>
