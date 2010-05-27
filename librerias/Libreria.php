<?php
include_once("clases/Asistencia.php");
include_once("clases/Persona.php");
include_once("clases/Reporte.php");
$Control = $_REQUEST['Control'];
$Cedula = $_REQUEST['Cedula'];
$Clave = $_REQUEST['Clave'];
$error = "Error al Realizar ";
$sugerencia = "Por Favor Contactar al Administrador del Sistema: ";
$admin= "Typson Sanchez ";
$correo= "styp152@gmail.com";
function notification($mensaje){
	echo $mensaje;
}
function addHeader(){
	include("addon/Header.php");
}
function addMainRegister(){
	include("addon/MainRegister.php");
}
function addMainRegisterShow($person,$asisten){
	include("addon/MainRegisterShow.php");
}
function initLoginControl(){
	include("addon/InitLoginControl.php");
}
function addFooter(){
	include("addon/Footer.php");
}
function conectarDB(){
	$mycon = @mysql_connect("localhost","root","123");
	if(!mysql_select_db("RegisterLU",$mycon)){
		echo $error+"la Conexion a la Base de Datos "+$sugerencia+$admin+$correo;}
}

function obtenerPersonaDB($SQL){
	$result=mysql_query($SQL);
	$person= new persona();
	$row=mysql_fetch_array($result);
	$person->updateDatos($row);
	mysql_free_result($result);
	return $person;
}

function updateAsistencia($Cedula){
	$SQL="SELECT * FROM Persona WHERE Cedula='$Cedula'";
	$person=obtenerPersonaDB($SQL);
	if($person->cedula==null){
		return "1";
	}
	$var=DATE('Y/m/d');
	$hora = getdate(time());
	$correctHora=$hora["hours"].':'.$hora["minutes"].':'.$hora["seconds"];
	mysql_free_result($result);
	$SQL="SELECT * FROM Persona,Asistencia WHERE Persona.Cedula='$Cedula' and Asistencia.Cedula='$Cedula' and Asistencia.Fecha='$var' and Asistencia.HoraSalida='00:00:00'";
	$result=mysql_query($SQL);
	$row=mysql_fetch_array($result);
	$asisten = new asistencia();
	$asisten->updateDatos($row);
	if($asisten->horaEntrada==null){
		$asisten->horaEntrada=$correctHora;
		$SQL="INSERT INTO Asistencia (IdAsistencia, HoraEntrada, HoraSalida, Fecha, Cedula, nota) VALUES ('', '$correctHora', '', '$var', '$Cedula', '')";
		@mysql_query($SQL)or die($error+"el Registro de Entrada "+$sugerencia+$admin+$correo);
	}
	else{
		$asisten->horaSalida=$correctHora;
		$salida=$asisten->horaSalida;
		$id=$asisten->idAsistencia;
		$SQL = "UPDATE Asistencia SET HoraSalida='$salida' WHERE IdAsistencia='$id'";
		@mysql_query($SQL)or die(notification($error+"el Registro de Salida "+$sugerencia+$admin+$correo));
	}
	addMainRegisterShow($person,$asisten);
	return "0";
}

function initControlAsistencia($Cedula, $Clave){
	$SQL="SELECT * FROM Persona WHERE Cedula='$Cedula' and Clave='$Clave'";
	$person=obtenerPersonaDB($SQL);
	if($person->cedula==null and $person->clave == null){
		return "1";
	}
	include('addon/InitConsultaControl.php');
	return "0";
}

function fail(){
	notification("<h2>Usted no es un Usuario Registrado del Sistema presione el Boton para volver a la Pagina Principal</h2>");
	echo '<br /><input type="button" value="Salir" onClick="redireccionar()" />';
}
?>
