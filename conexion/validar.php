<?php
session_start(); 

	require_once('connect_db.php');
    require('../funciones/funciones.php');
	$email=$_POST['correo'];
	$pass2=$_POST['pass'];
    $pass=encriptar($pass2,"xXT34mM4t3Xx");

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

            header("location: ../dashboard.php");
}
            if($ns==2){

            header("location: ../mistickets.php"); //si el NivelUsuario es mayor o diferente a 1 va la pagina inicio del usuario normal
}
            if($ns==3){

            header("location: ../mistickets.php");
}

            }
            else{
        echo"<script language=javascript> alert(Error En el Usuario o Contraseña Intente de Nuevo); </script>";
		$_SESSION['error']=1;
        header("location: ../login.php");
    }


?>
