<?php
$error = "Error al Realizar ";
$sugerencia = "Por Favor Contactar al Administrador del Sistema: ";
$admin= "Typson Sanchez";
$correo= "styp152@gmail.com";
function header(){
require("../addon/header.php");
}
function footer(){
include("../addon/footer.html");
}
function conectarDB(){
if(!@mysql_select_db("RegisterLU",@mysql_connection("localhost","root","")){
	echo $error+"la Conexion a la Base de Datos "+$sugerencia+$admin+$correo;
}
?>
