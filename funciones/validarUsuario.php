<?php
if(isset($_GET['id']))
{

$id = $_GET['id'];
function validarUsuario($id){
   require('conexion/connect_db.php');
    $sql="SELECT activo FROM help_desk_user_account WHERE username=\"$id\" and activo=1";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}
}
else {
	header('Location: modificarUsuario.php?id=$id');
}
?>