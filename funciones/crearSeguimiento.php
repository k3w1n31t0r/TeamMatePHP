<?php
session_start();
require('funciones.php');
require('meta.php');
$actividad = $_POST['desSeguimiento'];
$id        = $_POST['id'];
$estado    = $_POST['tip'];
$user=$_SESSION['username'];

	$resultado=insertarSeguimiento($actividad,$id,$estado,$user);

?>