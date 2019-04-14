<?php

if(isset($_GET['id'])!=null && isset($_GET['id'])!='')
{
  require_once('funciones.php');
  require_once('meta.php');
  $id=$_GET['id'];
  $resultado=eliminarUsuarios($id);

  if ($resultado==true) {
  ?>
  <a href="#" id="enlace" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-success"></a>
  <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">:3</h4>
              </div>
              <div class="modal-body">
                <p>¡Usuario Eliminado con exito!&hellip;</p>
              </div>
              <div class="modal-footer">
                <a href='../usuarios.php' class="btn btn-outline">Aceptar</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
          $('#enlace').modal({backdrop: 'static', keyboard: false})
          // definimos lo que queremos hacer en el click primero 
$("#enlace").click(function() { 
     location.href = this.href; // ir al link 
});
// lanzamos la llamada al evento click
$("#enlace").click();


        </script>
  <?php

}else{
  ?>
  <a href="#" id="enlace" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-warning"></a>
  <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> >:( </h4>
              </div>
              <div class="modal-body">
                <p>¡Ocurrio un error!&hellip;</p>
              </div>
              <div class="modal-footer">
                <a href='../usuarios.php' class="btn btn-outline">Aceptar</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
          $('#enlace').modal({backdrop: 'static', keyboard: false})
          // definimos lo que queremos hacer en el click primero 
          $("#enlace").click(function() { 
           location.href = this.href; // ir al link 
          });
          // lanzamos la llamada al evento click
          $("#enlace").click();


        </script>
        <?php
}

}


?>