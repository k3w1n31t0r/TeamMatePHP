<?php
session_start(); 

	require_once('connect_db.php');

	$email=$_POST['correo'];
	$pass=$_POST['pass'];

$sql=("SELECT * FROM help_desk_user_account WHERE correo='$email' and password='$pass'"); // realizo la comparación con la base de datos
    $res=mysqli_query($link, $sql);
    if($row=mysqli_fetch_array($res)){
    $ns = $row['type']; // descargo el nivel de usuario
	$nomUser = $row['username'];
    $correo=$row['correo'];

	$_SESSION['correo']=$correo;
    $_SESSION['type']=$ns;
    $_SESSION['username'] = $nomUser;


 if($ns==1){ // relizo la comparacion para saber a q menu de usuario me va direcionar si es NivelUsuario 1 va al pagina inicio administrador	
            $sql="SELECT * FROM help_desk_agent WHERE fk_username_agente=\"$nomUser\"";
            $resul=$link->query($sql);
            if($row=mysqli_fetch_array($resul)){
            $_SESSION['id_agente']=$row['id'];
            }

            header("location: ../dashboard.php");
}
            if($ns==2){

            header("location: ../index.php"); //si el NivelUsuario es mayor o diferente a 1 va la pagina inicio del usuario normal
}
            if($ns==3){

            header("location: /area-repartidores");
}

            }
            else{
        echo"<script language=javascript> alert(Error En el Usuario o Contraseña Intente de Nuevo); </script>";
		$_SESSION['error']=1;
        header("location: ../login.php");
    }


?>
