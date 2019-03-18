<?php
if($_GET['id']!=null && $_GET['id']!='')
{
  require_once('funciones.php');
  require_once('meta.php');
  $id=$_GET['id'];
  $agente=$_GET['agente'];

  $resultado=quitarAgente($id,$agente);

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
                <p>¡Agente quitado con exito!&hellip;</p>
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