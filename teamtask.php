<?php
session_start(); 
if($_SESSION['type']==1)
{require('funciones/funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Tareas de equipo</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
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
      <!-- Navbar Right Menu -->
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
            <li class="active"><a href="teamtask.php"><i class="fa fa-circle-o"></i>Tareas de equipo</a></li>
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
       </ul>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tareas de equipo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th><div class="input-group input-group-sm" style="width: 40px;">
                  <input name="table_search" id="table_search" class="form-control pull-right" placeholder="ID" type="text" onkeyup="myFunction(0,this.id)">        
                </div></th>
                  <th><div class="input-group input-group-sm" style="width: 100px;">
                  <input name="table_search" id="table_search1" class="form-control pull-right" placeholder="Usuario" type="text" onkeyup="myFunction(1,this.id)">        
                </div></th>
                  <th><div class="input-group input-group-sm" style="width: 100px;">
                  <input name="table_search" id="table_search2" class="form-control pull-right" placeholder="Fecha" type="text" onkeyup="myFunction(2,this.id)">        
                </div></th>
                  <th><div class="input-group input-group-sm" style="width: 100px;">
                  <input name="table_search" id="table_search3" class="form-control pull-right" placeholder="Estatus" type="text" onkeyup="myFunction(3,this.id)">        
                </div></th>               
                  <th><div class="input-group input-group-sm" style="width: 100px;">
                  <input name="table_search" id="table_search4" class="form-control pull-right" placeholder="Descripcion" type="text" onkeyup="myFunction(4,this.id)">        
                </div></th>             
                </tr> 
                <tr>
                  <th>ID ticket</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Asunto</th>
                  <th>Seguimiento</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                    $resultado=selectTicketsTeamTask();
                    while ($renglon=mysqli_fetch_array($resultado)){
                    $label=$renglon['type'];
                   ?>
                 <tr>
                  <td><?php echo $renglon['id_ticket'];?></td>
                  <td><?php echo $renglon['name'];?></td>
                  <td><?php echo $renglon['asign_date'];?></td>
                  <?php echo '<td><span '.$label.'>'.$renglon['statdescrip'].'</span></td>';?> 
                  <td><?php echo $renglon['subject'];?></td>
                  <!--<td> <?php// echo '<a href=seguir.php?id='.$renglon['id_ticket'].'>Seguir</a>';?> </td>-->
                  <td>
                    <div  class="col-xs-10">
                      <div class="btn-group">
                  <?php echo '<button type=button class=btn btn-sm onclick="document.location.href=\'seguir.php?id='.$renglon['id_ticket'].'\'">Seguir</button>';?>
                  <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <?php echo '<li><a href=funciones/quitarAgente.php?id='.$renglon['id_ticket'].'&agente='.$renglon['name'].' onclick="return confirmar()">Quitar agente</a></li>' ?> 
                  </ul>
                </div>
                    </div></td>
                  <?php
                  /*
                  
                  */
                  ?>
                </tr>
                <?php
                  }
                ?>
                </tbody>
              </table>
           </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
function myFunction(number,table) {
  // Declare variables
 // var num1=Number(document.getElementById('sl').value);
  var input, filter, table, tr, td, i;
  input = document.getElementById(table);
  filter = input.value.toUpperCase();
  table = document.getElementById("example1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[number];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script>
  $(function () {
    $('#example1').DataTable({
    "language": {
      "url": "Spanish.json"
    }
  })
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
<script>
function confirmar()
{
  if(confirm('¿Estas seguro que quieres quitar este ticket a este agente?'))
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>
</body>
</html>
<?php
}
else {
  header("location: login.php");
}
?>