<?php

if(isset($_POST['modificarUsuario'])==10)
{
  require_once('funciones.php');
  require_once('meta.php');
  $nombre=$_POST['nombre'];
  $nickname=$_POST['nickname'];
  $correo=$_POST['correo'];   
  $contrasenia=$_POST['contrasenia'];   
  $tipousuario=$_POST['tipousuario'];   
  $telefono=$_POST['telefono'];
  $puesto=$_POST['puesto'];
  $idusuario=$_POST['idusuario'];
  if (isset($_POST['equipo']))
  {
     $equipo=$_POST['equipo'];
  }
  else{
  $equipo=null;
      }

  if(isset($_POST['empresa']))
   {
    $empresa=$_POST['empresa'];
    }
  else{
   $empresa=null;
   } 

  $resultado=actualizarUsuario($nombre, $nickname,$correo,$contrasenia,$tipousuario,$telefono,$puesto,$equipo,$empresa,$idusuario);
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
                <p>¡Usuario modificado con exito!&hellip;</p>
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