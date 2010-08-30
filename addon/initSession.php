<?php
session_start(); 
if (!isset($_SESSION["seccion"])){ 
   	$_SESSION["seccion"] = 1; 
}
else{
	$_SESSION["log"] = 1; 
}
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../index.php">
