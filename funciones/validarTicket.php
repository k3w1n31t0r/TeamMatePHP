<?php
if(isset($_GET['id']))
{

$id = $_GET['id'];
function validarTicket($id){
   require('conexion/connect_db.php');
    $sql="SELECT activo FROM help_desk_ticket WHERE id_ticket=$id and activo=1";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}
}
else {
	header('Location: mistickets.php');
}
?>