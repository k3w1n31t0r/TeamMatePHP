<?php
session_start(); 
switch ($_SESSION['type']) {
  case 1:
require('funciones/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Modificar usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Team</b>Mate</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php $imagen=selectImagen($_SESSION['username']);
                    if ($imagen2=mysqli_fetch_array($imagen)) {
                        $img=$imagen2['profile_picture'];
                    }
              
             echo "<img src=\"imagenes/$img\" class=\"user-image\" alt=\"User Image\">" ?>
              <span class="hidden-xs"><?php echo $_SESSION["correo"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo "<img src=\"imagenes/$img\" class=\"user-circle\" alt=\"User Image\">" ?>
                <p>
                  <?php echo $_SESSION['username']; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].' class="btn btn-default btn-flat">Perfil</a>'?>
                </div>
                <div class="pull-right">
                  <a href="conexion/cerrar.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php echo "<img src=\"imagenes/$img\" class=\"img-circle\" alt=\"User Image\">" ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BARRA PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li><a href="dashboard.php"><i class="fa fa-circle-o"></i>Supervisor</a></li>
            <li><a href="bandeja.php"><i class="fa fa-circle-o"></i>Bandeja de asignacion</a></li>
            <li><a href="teamtask.php"><i class="fa fa-circle-o"></i>Tareas de equipo</a></li>
            <li><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
            <li><a href="crearticketsup.php"><i class="fa fa-circle-o"></i>Crear ticket</a></li>
          </ul>
        </li>

       <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="active"><a href="usuarios.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
            <li><?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].'><i class="fa fa-circle-o"></i>Perfil</a>'?></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administracion de usuarios
        <small>Modificación de usuario</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificar usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="funciones/modificarUsuario.php">
              <div class="box-body">
                <!--primer columna-->
                <?php
                  $id=$_GET['id'];
                  $usuariosMod=selectModificarUsuario($id);
                  //$tipos    =selectTipoUsuario();
                 if($renglon=mysqli_fetch_array($usuariosMod)) {
                  $pass=desencriptar($renglon['password'],"xXT34mM4t3Xx");
                ?>
                <div class="form-group col-md-3"> 
                  <label for="nombre">Nombre</label>
                  <?php echo "<input type=text class=form-control name=nombre placeholder=Nombre value={$renglon['name']}>";?>
                  <br>
                  <label for="nickname">Nickname</label>
                  <?php echo "<input type=text class=form-control name=nickname placeholder=Nickname value={$renglon['username']}>";?>
                  <br>
                  <label for="correo">Correo</label>
                  <?php echo "<input type=email class=form-control name=correo placeholder=Correo value={$renglon['correo']}>";?>
                  <br>
                  <label for="contraseña">Contraseña</label>
                  <?php echo "<input type=password class=form-control name=contrasenia placeholder=Contraseña value=$pass>";?>
                  <br>
                  <label for="contraseña2">Repita Contraseña</label>
                  <?php echo "<input type=password class=form-control name=contrasenia2 placeholder=Repita Contraseña value=$pass>"; ?>
                </div>
                <!--segunda columna-->
                 <div class="form-group col-md-3">
                  <label for="tipo">Tipo de usuario</label>
                    <select class="form-control" id="tipousuario" name="tipousuario" onchange="din()">
                      <?php 
                          $resultado=selectTipoUsuario();
                           while ($renglon2=mysqli_fetch_array($resultado)){                                           
                            echo '<option value='.$renglon2['id_tipo_cuenta'].' '.($renglon['type']==$renglon2['id_tipo_cuenta'] ? 'selected="selected"' : '').'>'.$renglon2['tipo_cuenta'].'</option>';
                        }
                      ?>
                    </select> 
                   
                  <br>
                  <label for="telefono">Telefono</label>
                  <?php echo "<input type=text class=form-control name=telefono placeholder=Telefono value={$renglon['telephone']}>"; ?>
                  <br>
                  <label for="exampleInputFile">Fotografia de perfil</label>
                      <input type="file" name="exampleInputFile">
                  <br>
                 </div>
                 <!--tercer columna DINAMICA-->
                 <div class="form-group col-md-3">
                  <label for="puesto">Puesto</label>
                  <?php echo "<input type=text class=form-control name=puesto placeholder=puesto value={$renglon['job_title']}>";
                  echo "<input type=hidden name=idusuario value=\"$id\">"; ?>
                  <div id="formdim">
                    <?php
                      if($renglon['type']==2){
                        //cliente
                      echo '<input type=hidden name=empresa value='.$renglon['company_id_id'].'>';    
                      }
                      if($renglon['type']==3){
                        //agente
                      echo '<input type=hidden name=equipo value='.$renglon['team_id_id'].'>';    
                      }
                    ?>
                  </div>
                 </div>
                  <?php
                    }
                  ?>
                </div>           
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" value="10" name="modificarUsuario">Guardar</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

<script type="text/javascript">
        function din()
          {
              var x=document.getElementById("tipousuario").value;
              
              if(x==3)
                  {<?php $resultado=selectEquipo();?>
                    var z="<br><label for=equipo>Equipo</label><select class=form-control name=equipo id=equipo>";

                    var opcion='<?php while ($renglon=mysqli_fetch_array($resultado)) echo"{<option value={$renglon['id']}>{$renglon['descrip']}</option>";?>';
                    var y ="</select><br>";
                    document.getElementById("formdim").innerHTML=z+opcion+y;                       
                  }
                                              
              if(x==2)
                  {//cliente
                    <?php $resultado=selectCompanies();?>
                    var z="<br><label for=empresa>Empresa</label><select class=form-control name=empresa id=empresa>";

                    var opcion='<?php while ($renglon=mysqli_fetch_array($resultado)) echo"{<option value={$renglon['id']}>{$renglon['name']}</option>";?>';
                    var y ="</select><br>";
                    document.getElementById("formdim").innerHTML=z+opcion+y;
                  }
              
               if(x==1)
                  {//otro
                    document.getElementById("formdim").innerHTML="";  
                  }

          }
</script>
<script type="text/javascript">
  function validarPasswd()
          {
    var p1 = document.getElementById("contrasenia").value;
    var p2 = document.getElementById("contrasenia2").value;
    
    if (p1 != p2) {
      alert("Las passwords deben de coincidir");
      return false;
    } else {
      alert("Todo esta correcto");
      return true; 
    }
          }
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php
break;
//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2
//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2//CASE 2
//case cliente//case cliente//case cliente//case cliente//case cliente//case cliente//case cliente
//case cliente//case cliente//case cliente//case cliente//case cliente//case cliente//case cliente
case 2:
  require('funciones/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Modificar usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Team</b>Mate</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php $imagen=selectImagen($_SESSION['username']);
                    if ($imagen2=mysqli_fetch_array($imagen)) {
                        $img=$imagen2['profile_picture'];
                    }
              
             echo "<img src=\"imagenes/$img\" class=\"user-image\" alt=\"User Image\">" ?>
              <span class="hidden-xs"><?php echo $_SESSION["correo"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo "<img src=\"imagenes/$img\" class=\"user-circle\" alt=\"User Image\">" ?>
                <p>
                  <?php echo $_SESSION['username']; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].' class="btn btn-default btn-flat">Perfil</a>'?>
                </div>
                <div class="pull-right">
                  <a href="conexion/cerrar.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php echo "<img src=\"imagenes/$img\" class=\"img-circle\" alt=\"User Image\">" ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BARRA PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
            <li><a href="crearticketsup.php"><i class="fa fa-circle-o"></i>Crear ticket</a></li>
          </ul>
        </li>

       <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].'><i class="fa fa-circle-o"></i>Perfil</a>'?></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administracion de usuarios
        <small>Creación de usuario</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <!--primer columna-->
                <?php
                  $id=$_GET['id'];
                  $usuariosMod=selectModificarUsuario($id);
                  //$tipos    =selectTipoUsuario();
                 if($renglon=mysqli_fetch_array($usuariosMod)) {
                  $pass=desencriptar($renglon['password'],"xXT34mM4t3Xx");
                ?>
                <div class="form-group col-md-3"> 
                  <label for="nombre">Nombre</label>
                  <?php echo "<input type=text class=form-control name=nombre placeholder=Nombre value={$renglon['name']} disabled>";?>
                  <br>
                  <label for="nickname">Nickname</label>
                  <?php echo "<input type=text class=form-control name=nickname placeholder=Nickname value={$renglon['username']} disabled>";?>
                  <br>
                  <label for="correo">Correo</label>
                  <?php echo "<input type=email class=form-control name=correo placeholder=Correo value={$renglon['correo']} disabled>";?>
                  <br>
                  <label for="contraseña">Contraseña</label>
                  <?php echo "<input type=password class=form-control name=contrasenia disabled placeholder=Contraseña value=$pass>";?>
                  <br>
                  <label for="contraseña2">Repita Contraseña</label>
                  <?php echo "<input type=password class=form-control name=contrasenia2 disabled placeholder=Repita Contraseña value=$pass>"; ?>
                </div>
                <!--segunda columna-->
                 <div class="form-group col-md-3">
                  <label for="tipo">Tipo de usuario</label>
                    <select class="form-control" id="tipousuario" name="tipousuario" disabled onchange="din()">
                      <?php 
                          $resultado=selectTipoUsuario();
                           while ($renglon2=mysqli_fetch_array($resultado)){                                           
                            echo '<option value='.$renglon2['id_tipo_cuenta'].' '.($renglon['type']==$renglon2['id_tipo_cuenta'] ? 'selected="selected"' : '').'>'.$renglon2['tipo_cuenta'].'</option>';
                        }
                      ?>
                    </select> 
                   
                  <br>
                  <label for="telefono">Telefono</label>
                  <?php echo "<input type=text class=form-control name=telefono disabled placeholder=Telefono value={$renglon['telephone']}>"; ?>
            
                  <br>
                 </div>
                 <!--tercer columna DINAMICA-->
                 <div class="form-group col-md-3">
                  <label for="puesto">Puesto</label>
                  <?php echo "<input type=text class=form-control name=puesto placeholder=puesto value={$renglon['job_title']} disabled>";
                  echo "<input type=hidden name=idusuario value=\"$id\">"; ?>
                  <div id="formdim">
                    <?php
                      if($renglon['type']==2){
                        //cliente
                      echo '<input type=hidden name=empresa value='.$renglon['company_id_id'].'>';    
                      }
                      if($renglon['type']==3){
                        //agente
                      echo '<input type=hidden name=equipo value='.$renglon['team_id_id'].'>';    
                      }
                    ?>
                  </div>
                 </div>
                  <?php
                    }
                  ?>
                </div>           
              <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

<script type="text/javascript">
        function din()
          {
              var x=document.getElementById("tipousuario").value;
              
              if(x==3)
                  {<?php $resultado=selectEquipo();?>
                    var z="<br><label for=equipo>Equipo</label><select class=form-control name=equipo id=equipo disabled>";

                    var opcion='<?php while ($renglon=mysqli_fetch_array($resultado)) echo"{<option value={$renglon['id']}>{$renglon['descrip']}</option>";?>';
                    var y ="</select><br>";
                    document.getElementById("formdim").innerHTML=z+opcion+y;                       
                  }
                                              
              if(x==2)
                  {//cliente
                    <?php $resultado=selectCompanies();?>
                    var z="<br><label for=empresa>Empresa</label><select class=form-control name=empresa id=empresa disabled>";

                    var opcion='<?php while ($renglon=mysqli_fetch_array($resultado)) echo"{<option value={$renglon['id']}>{$renglon['name']}</option>";?>';
                    var y ="</select><br>";
                    document.getElementById("formdim").innerHTML=z+opcion+y;
                  }
              
               if(x==1)
                  {//otro
                    document.getElementById("formdim").innerHTML="";  
                  }

          }
</script>
<script type="text/javascript">
  function validarPasswd()
          {
    var p1 = document.getElementById("contrasenia").value;
    var p2 = document.getElementById("contrasenia2").value;
    
    if (p1 != p2) {
      alert("Las passwords deben de coincidir");
      return false;
    } else {
      alert("Todo esta correcto");
      return true; 
    }
          }
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php
  break;

case 3:
  require('funciones/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Modificar usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Team</b>Mate</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php $imagen=selectImagen($_SESSION['username']);
                    if ($imagen2=mysqli_fetch_array($imagen)) {
                        $img=$imagen2['profile_picture'];
                    }
              
             echo "<img src=\"imagenes/$img\" class=\"user-image\" alt=\"User Image\">" ?>
              <span class="hidden-xs"><?php echo $_SESSION["correo"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo "<img src=\"imagenes/$img\" class=\"user-circle\" alt=\"User Image\">" ?>
                <p>
                  <?php echo $_SESSION['username']; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].' class="btn btn-default btn-flat">Perfil</a>'?>
                </div>
                <div class="pull-right">
                  <a href="conexion/cerrar.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php echo "<img src=\"imagenes/$img\" class=\"img-circle\" alt=\"User Image\">" ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BARRA PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
          </ul>
        </li>

       <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].'><i class="fa fa-circle-o"></i>Perfil</a>'?></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administracion de usuarios
        <small>Creación de usuario</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <!--primer columna-->
                <?php
                  $id=$_GET['id'];
                  $usuariosMod=selectModificarUsuario($id);
                  //$tipos    =selectTipoUsuario();
                 if($renglon=mysqli_fetch_array($usuariosMod)) {
                  $pass=desencriptar($renglon['password'],"xXT34mM4t3Xx");
                ?>
                <div class="form-group col-md-3"> 
                  <label for="nombre">Nombre</label>
                  <?php echo "<input type=text class=form-control name=nombre placeholder=Nombre value={$renglon['name']} disabled>";?>
                  <br>
                  <label for="nickname">Nickname</label>
                  <?php echo "<input type=text class=form-control name=nickname placeholder=Nickname value={$renglon['username']} disabled>";?>
                  <br>
                  <label for="correo">Correo</label>
                  <?php echo "<input type=email class=form-control name=correo placeholder=Correo value={$renglon['correo']} disabled>";?>
                  <br>
                  <label for="contraseña">Contraseña</label>
                  <?php echo "<input type=password class=form-control name=contrasenia disabled placeholder=Contraseña value=$pass>";?>
                  <br>
                  <label for="contraseña2">Repita Contraseña</label>
                  <?php echo "<input type=password class=form-control name=contrasenia2 disabled placeholder=Repita Contraseña value=$pass>"; ?>
                </div>
                <!--segunda columna-->
                 <div class="form-group col-md-3">
                  <label for="tipo">Tipo de usuario</label>
                    <select class="form-control" id="tipousuario" name="tipousuario" disabled onchange="din()">
                      <?php 
                          $resultado=selectTipoUsuario();
                           while ($renglon2=mysqli_fetch_array($resultado)){                                           
                            echo '<option value='.$renglon2['id_tipo_cuenta'].' '.($renglon['type']==$renglon2['id_tipo_cuenta'] ? 'selected="selected"' : '').'>'.$renglon2['tipo_cuenta'].'</option>';
                        }
                      ?>
                    </select> 
                   
                  <br>
                  <label for="telefono">Telefono</label>
                  <?php echo "<input type=text class=form-control name=telefono disabled placeholder=Telefono value={$renglon['telephone']}>"; ?>
                  <br>
                  <label for="exampleInputFile">Fotografia de perfil</label>
                      <input type="file" name="exampleInputFile">
                  <br>
                 </div>
                 <!--tercer columna DINAMICA-->
                 <div class="form-group col-md-3">
                  <label for="puesto">Puesto</label>
                  <?php echo "<input type=text class=form-control name=puesto placeholder=puesto value={$renglon['job_title']} disabled>";
                  echo "<input type=hidden name=idusuario value=\"$id\">"; ?>
                  <div id="formdim">
                    <?php
                      if($renglon['type']==2){
                        //cliente
                      echo '<input type=hidden name=empresa value='.$renglon['company_id_id'].'>';    
                      }
                      if($renglon['type']==3){
                        //agente
                      echo '<input type=hidden name=equipo value='.$renglon['team_id_id'].'>';    
                      }
                    ?>
                  </div>
                 </div>
                  <?php
                    }
                  ?>
                </div>           
              <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

<script type="text/javascript">
        function din()
          {
              var x=document.getElementById("tipousuario").value;
              
              if(x==3)
                  {<?php $resultado=selectEquipo();?>
                    var z="<br><label for=equipo>Equipo</label><select class=form-control name=equipo id=equipo disabled>";

                    var opcion='<?php while ($renglon=mysqli_fetch_array($resultado)) echo"{<option value={$renglon['id']}>{$renglon['descrip']}</option>";?>';
                    var y ="</select><br>";
                    document.getElementById("formdim").innerHTML=z+opcion+y;                       
                  }
                                              
              if(x==2)
                  {//cliente
                    <?php $resultado=selectCompanies();?>
                    var z="<br><label for=empresa>Empresa</label><select class=form-control name=empresa id=empresa disabled>";

                    var opcion='<?php while ($renglon=mysqli_fetch_array($resultado)) echo"{<option value={$renglon['id']}>{$renglon['name']}</option>";?>';
                    var y ="</select><br>";
                    document.getElementById("formdim").innerHTML=z+opcion+y;
                  }
              
               if(x==1)
                  {//otro
                    document.getElementById("formdim").innerHTML="";  
                  }

          }
</script>
<script type="text/javascript">
  function validarPasswd()
          {
    var p1 = document.getElementById("contrasenia").value;
    var p2 = document.getElementById("contrasenia2").value;
    
    if (p1 != p2) {
      alert("Las passwords deben de coincidir");
      return false;
    } else {
      alert("Todo esta correcto");
      return true; 
    }
          }
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php
  break;

default:
  header("location: login.php");
  break;
}
?>