<?php
class asistencia{
	var $idAsistencia;
	var $horaEntrada;
	var $horaSalida;
	var $fecha;
	var $nota;

function __construct(){}

function updateDatos($parametro){
	$this->idAsistencia=$parametro['IdAsistencia'];
	$this->horaEntrada=$parametro['HoraEntrada'];
	$this->horaSalida=$parametro['HoraSalida'];
	$this->fecha=$parametro['Fecha'];
	$this->nota=$parametro['nota'];
}
}
