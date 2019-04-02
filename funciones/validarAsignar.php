<?php
if(isset($_GET['id']))
{
$id = $_GET['id'];
function validarAsignar($id){
   require('conexion/connect_db.php');
    $sql="SELECT activo FROM help_desk_ticket WHERE id_ticket=$id and activo=1 and ind_asign=0";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}
}
else {
	header('Location: bandeja.php');
}
?>