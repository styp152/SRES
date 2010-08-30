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
					<option value=""></option>';
	echo $var;
	$j=0;
	while($persona[$j]!=null){
		$var = '<option value="';
		echo $var;
		echo $persona[$j]->cedula;
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
				<input id="fecha1" size= "28" name="fecha1" class="for_txtInputFecha" type="text" value="" tabindex="2" readonly="readonly" />
				<img class="for_imgFecha" id="Imgfecha1" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
				<!-- definicion de los calendario en el formulario -->
				    <script type="text/javascript">
				        Calendar.setup({inputField:"fecha1", button:"Imgfecha1"});
				        Calendar.setup({inputField:"fecha1", eventName: "click", button:"Imgfecha1"});
			            </script>
				<!-- hasta aqui definicion del calendario -->
				<br />
				<label>Fecha Final</label>
				<input id="fecha2" size= "28" name="fecha2" class="for_txtInputFecha" type="text" value="" tabindex="2" readonly="readonly" />
				<img class="for_imgFecha" id="Imgfecha2" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
				<!-- definicion de los calendario en el formulario -->
				    <script type="text/javascript">
				        Calendar.setup({inputField:"fecha2", button:"Imgfecha2"});
				        Calendar.setup({inputField:"fecha2", eventName: "click", button:"Imgfecha2"});
			            </script>
				<!-- hasta aqui definicion del calendario -->
				<br />
				<input type="hidden" name="Principal" value="2"/> 	
				<input type="submit" value="Consultar"/>
				<input type="reset" value="Limpiar"/>
			</form>
			<input type="button" title="Boton para salir a la pantalla inicial del sistema" value="Salir" onClick="redireccionar()" />';
echo $var;
?>
