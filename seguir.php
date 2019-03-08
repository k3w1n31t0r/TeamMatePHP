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
  <title>TeamMate | Seguimiento de ticket</title>
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
            <li class="active"><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
            <li><a href="crearticketsup.php"><i class="fa fa-circle-o"></i>Crear ticket</a></li>
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
            <li><a href="profile.php"><i class="fa fa-circle-o"></i>Perfil</a></li>
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
        Seguimiento de ticket
        <small>Seguimiento de ticket</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Seguimiento de ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="funciones/actualizarSeguimiento.php">
              <div class="box-body">
                <div class="form-group col-xs-6">
                  <label for="asunto">Asunto</label>
                  <?php
                    $resultado=selectTicketId($_GET['id']);
                    $aidi=$_GET['id'];
                    echo "<input type=hidden name=aidi value=$aidi>";
                    if($renglon1=mysqli_fetch_array($resultado)){
                    echo "<input type=text class=form-control id=asunto name=asunto placeholder=Asunto value={$renglon1['subject']}>";
                    }
                  ?>
                </div>
                <div class="form-group col-xs-3">
                  <label for="tipo">Tipo de ticket</label>
                    <select class="form-control" id="tipo" required="" name="tipoTicket">
                       <?php
                          $resultado2=selectTipos();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id_tipo'].' '.($renglon1['type_id_id']==$renglon['id_tipo'] ? 'selected="selected"' : '').'>'.$renglon['tipo'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                  <label for="estatus">Estatus</label>
                    <select class="form-control" id="estatus" name="estatus">
                       <?php
                          $resultado2=selectEstados();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                      
                           echo '<option value='.$renglon['id'].' '.($renglon1['status_id_id']==$renglon['id'] ? 'selected="selected"' . $tip=$renglon['id'] : '').'>'.$renglon['descrip'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                  <label for="prioridad">Prioridad</label>
                    <select class="form-control" id="prioridad" name="prioridad">
                      <?php
                          $resultado2=selectPrioridad();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id_prioridad'].' '.($renglon1['priority_id_id']==$renglon['id_prioridad'] ? 'selected="selected"' : '').'>'.$renglon['prioridad'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                  <label for="cliente">Cliente</label>
                    <select class="form-control" id="cliente" name="cliente">
                       <?php
                          $resultado2=selectCliente();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id'].' '.($renglon1['user_id_id']==$renglon['fk_username_cliente'] ? 'selected="selected"' : '').'>'.$renglon['name'].'</option>';

                        }
                      ?>
                    </select>
                </div>
                 <div class="form-group col-xs-3">
                  <label for="proyecto">Proyecto</label>
                    <select class="form-control" id="proyecto" name="proyecto">
                      <?php
                          $resultado2=selectProyecto();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id'].' '.($renglon1['project_id_id']==$renglon['id'] ? 'selected="selected"' : '').'>'.$renglon['descrip_p'].'</option>';
                        }
                      ?>
                    </select> 
                 </div>
                 <div class="form-group col-xs-3">
                  <label for="agente">Agente</label>
                    <select class="form-control select2" multiple="multiple" name="agentes[]" data-placeholder="Selecciona agentes"
                        style="width: 100%;">
                      <?php
                          $resultado2=selectAgente();
                           while ($renglon=mysqli_fetch_array($resultado2)){
                            $resAgente =selectAsign($renglon['id']);                                           
                            echo '<option value='.$renglon['id'].' '.($resAgente==$aidi ? 'selected="selected"' : '').'>'.$renglon['name'].'</option>';
                        }
                      ?>
                  </select>
                 </div>
                 <div class="form-group col-xs-12">
                  <label>Descripción</label>
                  <?php
                    $resultado=selectTicketId($_GET['id']);
                    if($renglon=mysqli_fetch_array($resultado)){
                      echo "<textarea class=form-control rows=3 name=descripcion placeholder=Descripción .. >{$renglon['descrip']}</textarea>";
                    }
                  ?>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" value="1" name="guardarSeguir">Guardar</button>
                &nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="submit" class="btn btn-danger" value="2">Finalizar</button>
              </div>
            </form>
            <br>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Actividades</a></li>
              <li><a href="#historial" data-toggle="tab">Historial</a></li>
              <li><a href="#movimietos" data-toggle="tab">Movimientos</a></li>
            </ul>
           <div class="tab-content">
            <!--PESTAÑA ACTIVIDADES-->
              <div class="active tab-pane" id="activity">   
                <ul class="timeline">
              <!-- timeline time label --> 
              <!--Comienzo de while -->
                <?php
                $idTicket=$_GET['id'];
                $resultadoAct=selectActividades($idTicket);
                while ($renglonAct=mysqli_fetch_array($resultadoAct)){                                           
                  //echo '<option value='.$renglon['id_tipo'].' '.($renglon1['type_id_id']==$renglon['id_tipo'] ? 'selected="selected"' : '').'>'.$renglon['tipo'].'</option>';       
                ?>
                  <li class="time-label">
                   <span class="bg-red"> <?php echo $renglonAct['sub_date']; ?> </span>
                  </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
                <li>
              <!-- timeline icon -->
          
               <div class="timeline-item">
                 <span class="time"><i class="fa fa-clock-o"></i> <?php echo $renglonAct['time']; ?> </span>

                   <h3 class="timeline-header"><a href="#"> <?php echo $renglonAct['user_agent_id_id']; ?> </a> ...</h3>

                   <div class="timeline-body"><?php echo $renglonAct['descrip']; ?></div>
              <div class="timeline-footer">               
            </div>
        </div>
      </li>
      <!--Termino de while-->
      <?php
        } 
      ?>
    </ul>
        <form id="frmajax" role="form" method="post">
              <div class="box-body">
                <div class="form-group col-xs-6">
                    <input type="hidden" name="id" value=<?php echo $aidi;?> >
                    <input type="hidden" name="tip" value=<?php echo $tip;?> >
                   </div>
                    <div class="form-group col-xs-12">
                          <label>Escribe una descripción</label>
                           <textarea class="form-control" rows="3" placeholder="Descripción ... actividad" name="desActividad"></textarea>
                          <div class="box-footer">
                              <button class="btn btn-primary" id="btnguardar">Guardar</button>
                          </div>
                    </div>    
              </div>
        </form>
   </div>
   <!--PESTAÑA TIMELINE-->
   <div class="tab-pane" id="historial">  
     <ul class="timeline">
              <!-- timeline time label --> 
                  <li class="time-label">
                   <span class="bg-light-blue">
                    10 Feb. 2015
                   </span>
                  </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
                <li>
              <!-- timeline icon -->
          
               <div class="timeline-item">
                 <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                   <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                   <div class="timeline-body">
                     Historial 
                   </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">...</a>
            </div>
        </div>

      </li>
    </ul>
    <form role="form" method="post" action="#">
              <div class="box-body">
                  <div class="form-group col-xs-6">
                   </div>
                    <div class="form-group col-xs-12">
                       <label>Escribe una descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripción ... historial"></textarea>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
              </div>
     </form>
   </div>
   <!--PESTAÑA SETTINGS-->
   <div class="tab-pane" id="movimietos">  
      <ul class="timeline">
              <!-- timeline time label --> 
                  <li class="time-label">
                   <span class="bg-green">
                    10 Feb. 2016
                   </span>
                  </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
                <li>
              <!-- timeline icon -->
               <div class="timeline-item">
                 <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                   <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                   <div class="timeline-body">
                      Movimientos
                   </div>
              <div class="timeline-footer">
                
            </div>
        </div>

      </li>
    </ul>
    <form role="form" method="post" action="#">
              <div class="box-body">
                <div class="form-group col-xs-6">
                   </div>
                 <div class="form-group col-xs-12">
                          <label>Escribe una descripción</label>
                           <textarea class="form-control" rows="3" placeholder="Descripción ... Movimientos"></textarea>
                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                    </div>
              </div>
        </form>
   </div>
  </div>
    <!-- END timeline item -->
</ul>

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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

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
  });

  $(document).ready(function(){
    $('#btnguardar').click(function(){
      var datos=$('#frmajax').serialize();
      $.ajax({
        type:"POST",
        url:"funciones/crearActividad.php",
        data:datos,
        success:function(r){
         return false;
        }
      });

      
    });
  });
</script>

</body>
</html>
<?php
break;
//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO
//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO
//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO//CASE 2 O DE USUARIO
case 2:
  require('funciones/funciones.php');
  ?>
    <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Seguimiento de ticket</title>
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
            <li class="active"><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
            <li><a href="crearticketsup.php"><i class="fa fa-circle-o"></i>Crear ticket</a></li>
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
            <li><a href="profile.php"><i class="fa fa-circle-o"></i>Perfil</a></li>
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
        Seguimiento de ticket
        <small>Seguimiento de ticket</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Seguimiento de ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group col-xs-6">
                  <label for="asunto">Asunto</label>
                  <?php
                    $resultado=selectTicketId($_GET['id']);
                    $aidi=$_GET['id'];
                    echo "<input type=hidden name=aidi value=$aidi>";
                    if($renglon1=mysqli_fetch_array($resultado)){
                    echo "<input type=text class=form-control id=asunto name=asunto placeholder=Asunto value={$renglon1['subject']} disabled>";
                    }
                  ?>
                </div>
                <div class="form-group col-xs-3">
                  <label for="tipo">Tipo de ticket</label>
                    <select class="form-control" id="tipo" required="" name="tipoTicket" disabled>
                       <?php
                          $resultado2=selectTipos();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id_tipo'].' '.($renglon1['type_id_id']==$renglon['id_tipo'] ? 'selected="selected"' : '').'>'.$renglon['tipo'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                  <label for="estatus">Estatus</label>
                    <select class="form-control" id="estatus" name="estatus" disabled>
                       <?php
                          $resultado2=selectEstados();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                      
                           echo '<option value='.$renglon['id'].' '.($renglon1['status_id_id']==$renglon['id'] ? 'selected="selected"' . $tip=$renglon['id'] : '').'>'.$renglon['descrip'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                  <label for="prioridad">Prioridad</label>
                    <select class="form-control" id="prioridad" name="prioridad" disabled>
                      <?php
                          $resultado2=selectPrioridad();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id_prioridad'].' '.($renglon1['priority_id_id']==$renglon['id_prioridad'] ? 'selected="selected"' : '').'>'.$renglon['prioridad'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                  <label for="cliente">Cliente</label>
                    <select class="form-control" id="cliente" name="cliente" disabled>
                       <?php
                          $resultado2=selectCliente();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id'].' '.($renglon1['user_id_id']==$renglon['fk_username_cliente'] ? 'selected="selected"' : '').'>'.$renglon['name'].'</option>';

                        }
                      ?>
                    </select>
                </div>
                 <div class="form-group col-xs-3">
                  <label for="proyecto">Proyecto</label>
                    <select class="form-control" id="proyecto" name="proyecto" disabled>
                      <?php
                          $resultado2=selectProyecto();
                           while ($renglon=mysqli_fetch_array($resultado2)){                                           
                            echo '<option value='.$renglon['id'].' '.($renglon1['project_id_id']==$renglon['id'] ? 'selected="selected"' : '').'>'.$renglon['descrip_p'].'</option>';
                        }
                      ?>
                    </select> 
                 </div>
                 <div class="form-group col-xs-3">
                  <label for="agente">Agente</label>
                    <select class="form-control select2" multiple="multiple" name="agentes[]" disabled data-placeholder="agentes"
                        style="width: 100%;">
                      <?php
                          $resultado2=selectAgente();
                           while ($renglon=mysqli_fetch_array($resultado2)){
                            $resAgente =selectAsign($renglon['id']);                                           
                            echo '<option value='.$renglon['id'].' '.($resAgente==$aidi ? 'selected="selected"' : '').'>'.$renglon['name'].'</option>';
                        }
                      ?>
                  </select>
                 </div>
                 <div class="form-group col-xs-12">
                  <label>Descripción</label>
                  <?php
                    $resultado=selectTicketId($_GET['id']);
                    if($renglon=mysqli_fetch_array($resultado)){
                      echo "<textarea class=form-control rows=3 name=descripcion disabled placeholder=Descripción .. >{$renglon['descrip']}</textarea>";
                    }
                  ?>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
            <br>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Actividades</a></li>
              <li><a href="#historial" data-toggle="tab">Historial</a></li>
              <li><a href="#movimietos" data-toggle="tab">Movimientos</a></li>
            </ul>
           <div class="tab-content">
            <!--PESTAÑA ACTIVIDADES-->
              <div class="active tab-pane" id="activity">   
                <ul class="timeline">
              <!-- timeline time label --> 
              <!--Comienzo de while -->
                <?php
                $idTicket=$_GET['id'];
                $resultadoAct=selectActividades($idTicket);
                while ($renglonAct=mysqli_fetch_array($resultadoAct)){                                           
                  //echo '<option value='.$renglon['id_tipo'].' '.($renglon1['type_id_id']==$renglon['id_tipo'] ? 'selected="selected"' : '').'>'.$renglon['tipo'].'</option>';       
                ?>
                  <li class="time-label">
                   <span class="bg-red"> <?php echo $renglonAct['sub_date']; ?> </span>
                  </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
                <li>
              <!-- timeline icon -->
          
               <div class="timeline-item">
                 <span class="time"><i class="fa fa-clock-o"></i> <?php echo $renglonAct['time']; ?> </span>

                   <h3 class="timeline-header"><a href="#"> <?php echo $renglonAct['user_agent_id_id']; ?> </a> ...</h3>

                   <div class="timeline-body"><?php echo $renglonAct['descrip']; ?></div>
              <div class="timeline-footer">               
            </div>
        </div>
      </li>
      <!--Termino de while-->
      <?php
        } 
      ?>
    </ul>
        <form id="frmajax" role="form" method="post">
              <div class="box-body">
                <div class="form-group col-xs-6">
                    <input type="hidden" name="id" value=<?php echo $aidi;?> >
                    <input type="hidden" name="tip" value=<?php echo $tip;?> >
                   </div>
                    <div class="form-group col-xs-12">
                          <label>Escribe una descripción</label>
                           <textarea class="form-control" rows="3" placeholder="Descripción ... actividad" name="desActividad"></textarea>
                          <div class="box-footer">
                              <button class="btn btn-primary" id="btnguardar">Guardar</button>
                          </div>
                    </div>    
              </div>
        </form>
   </div>
   <!--PESTAÑA TIMELINE-->
   <div class="tab-pane" id="historial">  
     <ul class="timeline">
              <!-- timeline time label --> 
                  <li class="time-label">
                   <span class="bg-light-blue">
                    10 Feb. 2015
                   </span>
                  </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
                <li>
              <!-- timeline icon -->
          
               <div class="timeline-item">
                 <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                   <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                   <div class="timeline-body">
                     Historial 
                   </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">...</a>
            </div>
        </div>

      </li>
    </ul>
    <form role="form" method="post" action="#">
              <div class="box-body">
                  <div class="form-group col-xs-6">
                   </div>
                    <div class="form-group col-xs-12">
                       <label>Escribe una descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripción ... historial"></textarea>
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
              </div>
     </form>
   </div>
   <!--PESTAÑA SETTINGS-->
   <div class="tab-pane" id="movimietos">  
      <ul class="timeline">
              <!-- timeline time label --> 
                  <li class="time-label">
                   <span class="bg-green">
                    10 Feb. 2016
                   </span>
                  </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
                <li>
              <!-- timeline icon -->
               <div class="timeline-item">
                 <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                   <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                   <div class="timeline-body">
                      Movimientos
                   </div>
              <div class="timeline-footer">
                
            </div>
        </div>

      </li>
    </ul>
    <form role="form" method="post" action="#">
              <div class="box-body">
                <div class="form-group col-xs-6">
                   </div>
                 <div class="form-group col-xs-12">
                          <label>Escribe una descripción</label>
                           <textarea class="form-control" rows="3" placeholder="Descripción ... Movimientos"></textarea>
                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                    </div>
              </div>
        </form>
   </div>
  </div>
    <!-- END timeline item -->
</ul>

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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

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
  });

  $(document).ready(function(){
    $('#btnguardar').click(function(){
      var datos=$('#frmajax').serialize();
      $.ajax({
        type:"POST",
        url:"funciones/crearActividad.php",
        data:datos,
        success:function(r){
         return false;
        }
      });

      
    });
  });
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