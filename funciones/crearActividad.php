<?php
session_start();
if(isset($_POST['actividad'])=="actividad")
{
require('funciones.php');
require('meta.php');
$actividad = $_POST['desActividad'];
$id        = $_POST['id'];
$estado    = $_POST['tip'];
$agente    = $_SESSION['id_agente'];

$resultado=insertarActividad($actividad,$id,$estado,$agente);
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
                <p>¡actividad añadida !&hellip;</p>
              </div>
              <div class="modal-footer">
                <a href='../teamtask.php' class="btn btn-outline">Aceptar</a>
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
  echo "Fallo";
}
}
?>