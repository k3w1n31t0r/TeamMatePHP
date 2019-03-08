<?php
session_start();
require('funciones.php');
require('meta.php');
$actividad = $_POST['desActividad'];
$id        = $_POST['id'];
$estado    = $_POST['tip'];
$user=$_SESSION['username'];

	$resultado=insertarActividad($actividad,$id,$estado,$user);

?>