<?php
$var ='
			<form action="index.php" method="post" title="Formulario de Consulta">
				<h2>Sistema de Control de Asistencia</h2>
				<h3>Consulta de Asistencia</h3>';
echo $var;
if($person->nivelUsuario >= 2){
	$i=0;
	$SQL="SELECT * FROM Persona";
	$result=mysql_query($SQL);
	while($row=mysql_fetch_array($result)){
		$persona[$i]= new persona();
		$persona[$i]->updateDatos($row);
		$i++;
	}
	$var = '<select name="persona" title="Seleciona la Persona a Consultar">
					<label>De: </label>
					<option value="0"></option>';
	echo $var;
	$j=0;
	while($persona[$j]!=null){
		$var = '<option value="';
		echo $var;
		echo $persona[$j]->getNombre();
		echo '">';
		echo $persona[$j]->getNombre(). " " . $persona[$j]->apellido;
		$var = '</option>';
		echo $var;
		$j++;
	}
	$var = '
				</select>
				<br />';
	echo $var;
	mysql_free_result($result);
}
else{ 
	echo "<h4>De: ". $person->getNombre() ." ". $person->apellido ."</h4>";
}
$var = '
				<input name= "persona" type="hidden" value=' . $person->cedula . ' />
				<h4><label>Por Mes</label></h4>
				<label>Mes</label>
				<select name="mes" title="Seleciona el mes a Consultar">
					<option value="0"></option>
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
				<br />
				<h4><label>Por Rango de Días</label></h4>
				<label>Fecha Inicial</label>
				<input name= "fecha1" type="text" title="Selecione su Fecha de Inicio a la Consulta" />
				<br />
				<label>Fecha Final</label>
				<input name= "fecha2" type="text" title="Selecione su Fecha Final a la Consulta" />
				<br />
				<input type="submit" value="Consultar"/>
				<input type="reset" value="Limpiar"/>
			</form>
			<input type="button" title="Boton para salir a la pantalla inicial del sistema" value="Salir" onClick="redireccionar()" />';
echo $var;
?>
