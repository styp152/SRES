<?php
echo '<h2>';
echo $person->getNombre();
echo '</h2>';
echo '<h3>';
echo $person->nacionalidad;
echo '-';
echo $person->cedula;
echo '</h3>';
echo '<table><tr><td>Hora de Entrada</td><td>Hora de Salida</td></tr><tr><td>';
echo $asisten->horaEntrada;
echo '</td><td>';
if ($asisten->horaSalida=='00:00:00'){
	echo '-';
}
else{
	echo $asisten->horaSalida;
}
echo '</td></tr></table>';
echo '<input type="button" value="Ok" onClick="self.location.href=(\'index.htm\')" />';
?>
