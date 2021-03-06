<?php
session_start(); 
if($_SESSION['type']==1)
{require('funciones/funciones.php');
 					$numeroTotal=selectNumeroTickets(); 
                    $numeroEnProceso  =selectNumeroTicketsEnProceso();
                    $numeroTerminados =selectNumeroTicketsTerminados();
                    $numeroCerrados   =selectNumeroTicketsCerrados();
                    $numeroAbiertos   =selectNumeroTicketsAbiertos();
                    $numeroEliminados =selectNumeroTicketsEliminados();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
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
  <!-- Left side column. contains the logo and sidebar -->
  
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
            <li class="active"><a href="dashboard.php"><i class="fa fa-circle-o"></i>Supervisor</a></li>
            <li><a href="bandeja.php"><i class="fa fa-circle-o"></i>Bandeja de asignacion</a></li>
            <li><a href="teamtask.php"><i class="fa fa-circle-o"></i>Tareas de equipo</a></li>
            <li><a href="mistickets.php"><i class="fa fa-circle-o"></i>Mis tickets</a></li>
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
            <li><a href="usuarios.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
            <li><?php echo '<a href=modificarUsuario.php?id='.$_SESSION['username'].'><i class="fa fa-circle-o"></i>Perfil</a>'?></li>
          </ul>
        </li>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supervisor
        <small>Vision</small>
      </h1>
      
    </section>

    <!-- Main content -->
   
     <section class="content">
     	
          <!-- small box -->
          <div class="row">
          	<div class="col-md-3">
          		<div class="small-box bg-yellow">
            		<div class="inner">
		              <?php $numero=selectNuevosTickets();?>
		              <h3> <?php echo $numero; ?></h3>

		              <p>Nuevos tickets</p>
            		</div>
           		 <div class="icon">
              		<i class="ion glyphicon-envelope"></i>
           		 </div>
            	 <a href="bandeja.php" class="small-box-footer">Ir a Bandeja <i class="fa fa-arrow-circle-right"></i></a>
         	 </div>
           </div>
           <div class="col-md-3">
          		<div class="small-box bg-green">
            		<div class="inner">
		              <?php $numeroEnProceso=selectNumeroTicketsEnProceso();?>
		              <h3> <?php echo $numeroEnProceso; ?></h3>

		              <p>Tickets en proceso</p>
            		</div>
           		 <div class="icon">
              		<i class="ion fa-commenting-o"></i>
           		 </div>
            	 <a href="teamtask.php" class="small-box-footer">Ir tareas de equipo <i class="fa fa-arrow-circle-right"></i></a>
         	 </div>
           </div>
           <div class="col-md-3">
          		<div class="small-box bg-aqua">
            		<div class="inner">
		              <?php $numeroTerminados=selectNumeroTicketsTerminados();?>
		              <h3> <?php echo $numeroTerminados; ?></h3>

		              <p>Tickets terminados</p>
            		</div>
           		 <div class="icon">
              		<i class="glyphicon glyphicon-ok"></i>
           		 </div>
            	 <a href="teamtask.php" class="small-box-footer">Ir tareas de equipo <i class="fa fa-arrow-circle-right"></i></a>
         	 </div>
           </div>
           <div class="col-md-3">
          		<div class="small-box bg-red">
            		<div class="inner">
		              <?php $numeroCerrados=selectNumeroTicketsCerrados();?>
		              <h3> <?php echo $numeroCerrados; ?></h3>

		              <p>Tickets cerrados</p>
            		</div>
           		 <div class="icon">
              		<i class="glyphicon glyphicon-remove"></i>
           		 </div>
            	 <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
         	 </div>
           </div>
       </div>

          <!-- small box -->
          <!-- i do not-->
       <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                 
                 
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Estado de tickets</strong>
                  </p>
                  <?php 
                   
                    if($numero>0){$porcentajeNuevos=($numero*100)/$numeroTotal;}
                    if($numeroEnProceso>0){$porcentajeProceso=($numeroEnProceso*100)/$numeroTotal;}
                    if($numeroTerminados>0){$porcentajeTerminados=($numeroTerminados*100)/$numeroTotal;}
                    if($numeroCerrados>0){$porcentajeCerrados=($numeroCerrados*100)/$numeroTotal;}
                    if($numeroAbiertos>0){$porcentajeAbiertos=($numeroAbiertos*100)/$numeroTotal;}
                    if($numeroEliminados>0){$porcentajeEliminados=($numeroEliminados*100)/$numeroTotal;}
                  ?>
                  <div class="progress-group">
                    <span class="progress-text">Tickets cerrados</span>
                    <span class="progress-number"><b><?php echo $numeroCerrados; ?></b>/<?php echo $numeroTotal ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo $porcentajeCerrados."%"?>"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">Tickets Terminados</span>
                    <span class="progress-number"><b><?php echo $numeroTerminados; ?></b>/<?php echo $numeroTotal; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo $porcentajeTerminados."%"?>"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Tickets nuevos</span>
                    <span class="progress-number"><b><?php echo $numero; ?></b>/<?php echo $numeroTotal; ?></span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: <?php echo $porcentajeNuevos."%"?>"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Tickets en proceso</span>
                    <span class="progress-number"><b><?php echo $numeroEnProceso; ?></b>/<?php echo $numeroTotal; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo $porcentajeProceso."%"?>"></div>
                    </div>
                  </div>                
                  <!-- /.progress-group -->
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Tickets abiertos</span>
                    <span class="progress-number"><b><?php echo $numeroAbiertos; ?></b>/<?php echo $numeroTotal; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar bg-teal" style="width: <?php echo $porcentajeAbiertos."%"?>"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">Tickets Eliminados</span>
                    <span class="progress-number"><b><?php echo $numeroEliminados; ?></b>/<?php echo $numeroTotal; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar bg-black" style="width: <?php echo $porcentajeEliminados."%"?>"></div>
                    </div>
                  </div>
                  
                  <!-- /.progress-group -->
 
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          <!-- i dint-->

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
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
}
else{
  header("location: login.php");
}
?>