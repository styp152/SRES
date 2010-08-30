<?php
include_once("clases/Asistencia.php");
include_once("clases/Persona.php");
include_once("clases/Reporte.php");
$intranetcedula = $_REQUEST['cedula'];
$intranetclave = $_REQUEST['clave'];
$Control = $_REQUEST['Control'];
$Principal = $_REQUEST['Principal'];
$Cedula = $_REQUEST['Cedula'];
$Clave = $_REQUEST['Clave'];
$persona = $_REQUEST['persona'];
$mes = $_REQUEST['mes'];
$fecha1 = $_REQUEST['fecha1'];
$fecha2 = $_REQUEST['fecha2'];
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

function showControlAsistencia($persona, $mes, $fecha1, $fecha2){
	if($mes != "0"){
		$fecha1='2010/'.$mes.'/1';
		$fecha2='2010/'.$mes.'/30';
	}
	echo (int)$mes;
	$SQL="SELECT * FROM Persona,Asistencia WHERE Persona.Cedula='$persona' and Asistencia.Cedula='$persona' and fecha>='$fecha1' and fecha<='$fecha2'";
	$person=obtenerPersonaDB($SQL);
	$result=mysql_query($SQL);
	$i=0;
	while($row=mysql_fetch_array($result)){
		$asistencia[$i]= new asistencia();
		$asistencia[$i]->updateDatos($row);
		$i++;
	}
	mysql_free_result($result);
	include('addon/showControlAsistencia.php');
	return "0";
}

function loginIntranet($Cedula, $Clave){
	$SQL="SELECT * FROM Persona WHERE Cedula='$Cedula' and Clave='$Clave'";
	$person=obtenerPersonaDB($SQL);
	if($person->cedula==null and $person->clave == null){
		return "1";
	}
	return "0";
}

function fail(){
	notification("<h2>Usted no es un Usuario Registrado del Sistema presione el Boton para volver a la Pagina Principal</h2>");
	echo '<br /><input type="button" value="Salir" onClick="redireccionar()" />';
}
?>
