<?php
$error = "Error al Realizar ";
$sugerencia = "Por Favor Contactar al Administrador del Sistema: ";
$admin= "Typson Sanchez";
$correo= "styp152@gmail.com";
function addHeader(){
include("addon/Header.php");
}
function addMainRegister(){
include("addon/MainRegister.php");
}
function addMainRegisterShow(){
include("addon/MainRegisterShow.php");
}
function addFooter(){
include("addon/Footer.php");
}
function conectarDB(){
if(!@mysql_connection("localhost","root","") or !@mysql_select_db("RegisterLU")){
	echo $error+"la Conexion a la Base de Datos "+$sugerencia+$admin+$correo;}
}
?>
