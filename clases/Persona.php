<?php
class persona{
	private $nombre;
	var $apellido;
	var $nacionalidad;
	var $cedula;
	var $nivelUsuario;

function __construct(){}

function getNombre(){
	return $this->nombre;
}

function updateDatos($parametro){
	$this->nombre=$parametro['Nombre'];
	$this->apellido=$parametro['Apellido'];
	$this->nacionalidad=$parametro['Nacionalidad'];
	$this->cedula=$parametro['Cedula'];
	$this->nivelUsuario=$parametro['NivelUsuario'];
}
}
?>
