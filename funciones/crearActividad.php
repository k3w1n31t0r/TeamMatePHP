<?php
session_start();
require('funciones.php');
require('meta.php');
$actividad = $_POST['desActividad'];
$id        = $_POST['id'];
$estado    = $_POST['tip'];
$agente    = $_SESSION['id_agente'];

$resultado=insertarActividad($actividad,$id,$estado,$agente);
?>