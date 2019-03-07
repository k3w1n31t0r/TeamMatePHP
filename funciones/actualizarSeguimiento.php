<?php
session_start();
if(isset($_POST['guardarSeguir'])=="1" ){
require('funciones.php');
require('meta.php');
$aidi=$_POST['aidi'];
$asunto=$_POST['asunto'];
$tipoTicket=$_POST['tipoTicket'];
$estatus=$_POST['estatus'];
$prioridad=$_POST['prioridad'];
$cliente=$_POST['cliente'];
$proyecto=$_POST['proyecto'];
$agentes=$_POST['agentes'];
$descripcion=$_POST['descripcion'];
$resultado=actualizarSeguimiento($aidi,$asunto,$tipoTicket,$estatus,$prioridad,$cliente,$proyecto,$agentes,$descripcion);
}
//
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
                <p>¡Seguimiento actualizado!&hellip;</p>
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
  echo "Fallo";
}

?>