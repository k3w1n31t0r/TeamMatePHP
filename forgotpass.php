<?php
session_start(); 
if(!isset($_SESSION['username']))
{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate ! Olvide mi contraseña</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Team</b>Mate</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Olvide mi contraseña</p>
  
    <form action="#" method="post" onSubmit="return validarEmail()">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Confirmar correo" name="email2" id="email2" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
             
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div >
          <button type="submit" name="enviado" class="btn btn-primary btn-block btn-flat">Enviar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Pass iguales -->
<script type="text/javascript">
function validarEmail()
          {
    var p1 = document.getElementById("email").value;
    var p2 = document.getElementById("email2").value;
    
    if (p1 != p2) {
      
  alert("Debe introducir el mismo correo en ambos campos");
    
  return false; 
    } else {
      return true; 
    }
          }
   
  
      </script>
<!-- Pass iguales -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
<?php
if(isset($_POST['enviado']))
{//if principal
require('conexion/connect_db.php');
require('funciones/funciones.php');
$correo=$_POST['email'];
$sql="SELECT password,username from help_desk_user_account where correo='$correo'";
$datos=mysqli_query($link, $sql);
while ($renglon=mysqli_fetch_array($datos)) {

  $pass=$renglon['password'];
  $username=$renglon['username'];
  $password=desencriptar($pass,"xXT34mM4t3Xx");
}

if($pass!="" && $username!=""){//if pass y usuario
$mensaje = "Recuperacion de contraseña en TeamMate\n\n";
$mensaje .= "Estos son tus datos de registro:\n";
$mensaje .= "Usuario: $username \n";
$mensaje .= "Contraseña: $password";

$asunto = "Recuperacion de contraseña tu cuenta en TeamMate";

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Team Mate <xCrewTeamMatex@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n"; 

mysqli_close($link);
if(mail($correo,$asunto,$mensaje,$headers)){//if mail
    ?>
    	<a href="#" id="enlace" data-toggle="modal" data-target="#modal-success"></a>
 		 <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">:3</h4>
              </div>
              <div class="modal-body">
                <p>Correo enviado&hellip;</p>
              </div>
              <div class="modal-footer">
                <a href='login.php' class="btn btn-outline">Aceptar</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
          // definimos lo que queremos hacer en el click primero 
$("#enlace").click(function() { 
     location.href = this.href; // ir al link 
});
// lanzamos la llamada al evento click
$("#enlace").click();

        </script>
    <?php
}//if mail
else{
    echo "Ha ocurrido un error y no se puede enviar el correo";
   }
}//if pass y usuario
else{
	?>
	<a href="#" id="enlace" data-toggle="modal" data-target="#modal-warning"></a>
 		 <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">:0</h4>
              </div>
              <div class="modal-body">
                <p>Correo inexistente en la base de datos&hellip;</p>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
          // definimos lo que queremos hacer en el click primero 
$("#enlace").click(function() { 
     location.href = this.href; // ir al link 
});
// lanzamos la llamada al evento click
$("#enlace").click();

        </script>
	<?php
	}

	}//if principal

}
else{
header('location: mistickets.php');
}

?>