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
  <title>TeamMate | Crear ticket</title>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
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
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BARRA PRINCIPAL</li>
        <li class="active treeview menu-open">
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
            <li class="active"><a href="crearticketsup.php"><i class="fa fa-circle-o"></i>Crear ticket</a></li>
          </ul>
        </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="usuarios.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
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
        Creación de tickets
        <small>.</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="funciones/funciones.php" method="POST">
              <div class="box-body">
                <div class="row"></div>
                <div class="form-group col-md-12">
                  <label for="asunto">Asunto</label>
                  <input type="text" class="form-control" id="asunto" placeholder="Asunto" name="asunto" required="">
                </div>
                <div class="form-group col-md-3">
                  <label for="tipo">Tipo de ticket</label>
                    <select class="form-control" id="tipo" required="" name="tipo">
                       <?php
                          $resultado=selectTipos();
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id_tipo']}>{$renglon['tipo']}</option>";
                        }
                      ?>
                    </select>
                    <br>
                    <label for="cliente">Cliente</label>
                    <select class="form-control" id="cliente" name="cliente">
                      <?php
                          $resultado=selectCliente();
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id']}>{$renglon['name']}</option>";
                        }
                      ?>
                    </select>
                    <br>
                <div class="form-group">
                  <label>Agente</label>
                   <select class="form-control select2" multiple="multiple" name="agentes[]" data-placeholder="Selecciona agentes" required=""
                        style="width: 100%;">
                      <?php
                          $resultado=selectAgente();
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id']}>{$renglon['name']}</option>";
                        }
                      ?>
                  </select>
                </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="estatus">Estatus</label>
                    <select class="form-control" id="estatus" name="estatus">
                      <?php
                          $resultado=selectEstados();
                           while ($renglon=mysqli_fetch_array($resultado)){                                      
                           echo "<option value={$renglon['id']}>{$renglon['descrip']}</option>";
                        }
                      ?>
                    </select>
                    <br>
                </div>
                <div class="form-group col-md-3">
                  <label for="prioridad">Prioridad</label>
                    <select class="form-control" id="prioridad" name="prioridad">
                      <?php
                          $resultado=selectPrioridad();
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id_prioridad']}>{$renglon['prioridad']}</option>";
                        }
                      ?>
                    </select>
                </div>
                 <div class="form-group col-md-3">
                  <label for="proyecto">Proyecto</label>
                    <select class="form-control" id="proyecto" name="proyecto">
                      <?php
                          $resultado=selectProyecto();
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id']}>{$renglon['descrip_p']}</option>";
                        }
                      ?>
                    </select> 
                 </div>
                     <div class="form-group col-md-12">
                       <label>Descripción</label>
                       <textarea class="form-control" rows="3" placeholder="Descripción ..." name="descripcion"></textarea>
                     </div>
                   </div>
                   <!--row-->
                     <div class="box-footer">
                       <button type="submit" class="btn btn-primary pull-right" name="crearTicket">Guardar</button>
                    </div>
                </div>
                <!--row-->              
                <!--boxbody-->
              </div>
              <!-- /.box-body -->       
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

  <!-- Control Sidebar -->
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()

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
//CASO 2 O DE CLIENTE//CASO 2 O DE CLIENTE//CASO 2 O DE CLIENTE//CASO 2 O DE CLIENTE
//CASO 2 O DE CLIENTE//CASO 2 O DE CLIENTE//CASO 2 O DE CLIENTE//CASO 2 O DE CLIENTE
case 2:
require('funciones/funciones.php');
  ?>
  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Crear ticket</title>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
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
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">BARRA PRINCIPAL</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
            <li class="active"><a href="crearticketsup.php"><i class="fa fa-circle-o"></i>Crear ticket</a></li>
            <li><a href="chat.php"><i class="fa fa-comment"></i>Chat Bot</a></li>
          </ul>
        </li>

       <li class="treeview">
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
        Bandeja de asignacion
        <small>tickets sin asignar</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="funciones/crearTicketUsuario.php" method="POST">
              <div class="box-body">
                <div class="row"></div>
                <div class="form-group col-md-12">
                  <label for="asunto">Asunto</label>
                  <input type="text" class="form-control" id="asunto" placeholder="Asunto" name="asunto" required="">
                </div>
                <div class="form-group col-md-3">
                  <label for="tipo">Tipo de ticket</label>
                    <select class="form-control" id="tipo" required="" name="tipo">
                       <?php
                          $resultado=selectTipos();
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id_tipo']}>{$renglon['tipo']}</option>";
                        }
                      ?>
                    </select>
                      <?php
                          $resultado=selectCliente();                                       
                          echo "<input type=\"hidden\" name=\"cliente\" value=\"{$_SESSION['username']}\">";        
                      ?>
                    <br>
                </div>
                 <div class="form-group col-md-3">
                  <label for="proyecto">Proyecto</label>
                    <select class="form-control" id="proyecto" name="proyecto">
                      <?php
                          $resultado=selectProyectoCliente($_SESSION['username']);
                           while ($renglon=mysqli_fetch_array($resultado)){                                           
                            echo "<option value={$renglon['id']}>{$renglon['descrip_p']}</option>";
                        }
                      ?>
                    </select> 
                 </div>
                     <div class="form-group col-md-12">
                       <label>Descripción</label>
                       <textarea class="form-control" rows="3" placeholder="Descripción ..." name="descripcion" required=""></textarea>
                     </div>
                   </div>
                   <!--row-->
                     <div class="box-footer">
                       <button type="submit" class="btn btn-primary pull-right" name="crearTicket">Guardar</button>
                    </div>
                </div>
                <!--row-->              
                <!--boxbody-->
              </div>
              <!-- /.box-body -->       
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

  <!-- Control Sidebar -->
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()

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
  # code...
  break;

default:
    header("location: login.php");
    break;
}
?>