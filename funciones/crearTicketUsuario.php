<?php
//CREA TICKET COMO ADMINISTRADOR ↓↓↓ 
if(isset($_POST['crearTicket']))
{session_start();
require_once('../conexion/connect_db.php');
require_once('meta.php');

$asunto=$_POST['asunto'];
$tipo=$_POST['tipo'];
$cliente=$_POST['cliente'];
$proyecto=$_POST['proyecto'];
$descripcion=$_POST['descripcion'];
$fecha=date('Y-m-d H:i:s');


//crea nuevo ticket ↓↓↓ 
$sql="INSERT INTO help_desk_ticket(subject, descrip, ind_asign, status_id_id, sub_date, project_id_id, type_id_id, user_id_id, activo) VALUES ('$asunto','$descripcion',0,1,'$fecha','$proyecto', '$tipo','$cliente', 1)";
$resultado=$link->query($sql);
//crea nuevo ticket ↑↑↑ 

//MODAL ↓↓↓
if ($resultado==true) {
  ?>
  <a href="#" id="enlace" data-toggle="modal" data-target="#modal-success"></a>
  <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">:3</h4>
              </div>
              <div class="modal-body">
                <p>¡ticket añadido con exito!&hellip;</p>
              </div>
              <div class="modal-footer">
                <a href='../mistickets.php' class="btn btn-outline">Aceptar</a>
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
}else{
  echo "menso";
}
}
//MODAL ↑↑↑ 
//CREA TICKET COMO ADMINISTRADOR ↑↑↑ 

?>