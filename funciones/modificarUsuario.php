<?php
if(isset($_POST['modificarUsuario'])==10)
{
  require_once('funciones.php');
  require_once('meta.php');
  $dir ="../imagenes/"; //DIRECTORIO al que iran las imagenes


  $nombre=$_POST['nombre'];
  $nickname=$_POST['nickname'];
  $correo=$_POST['correo'];      
  $tipousuario=$_POST['tipousuario'];   
  $telefono=$_POST['telefono'];
  $puesto=$_POST['puesto'];
  $idusuario=$_POST['idusuario'];
  $contrasenia2=$_POST['contrasenia'];
  $contrasenia=encriptar($contrasenia2,"xXT34mM4t3Xx");
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

   //IMAGENES
   //IMAGENES
  $img_n=$_FILES['imagen']['name'];
  $img_f=$_FILES['imagen']['tmp_name'];
  $tipo=$_FILES['imagen']["type"];

  if(!$tipo == "image/jpeg" ||!$tipo  == "image/jpg"|| !$tipo  == "image/png" || !$tipo == "image/gif"){
    echo "Fallo en el tipo de imagen";
  }
  //arreglos para subir imagen
  $arreglo = explode(".", $img_n);
  $len = count($arreglo);
  $ext = $arreglo[$len-1];

  //encripta Nombre
  $val=md5_file($img_f);

  //sube imagen
  if ($img_n !='') {
    $fileName1 = $val.".$ext";
    @copy($img_f, $dir.$fileName1);
  }
   //IMAGES


  $resultado=actualizarUsuario($nombre, $nickname,$correo,$contrasenia,$tipousuario,$telefono,$puesto,$equipo,$empresa,$idusuario,$fileName1);
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
  ?>
  <a href="#" id="enlace" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-warning"></a>
  <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> >:( </h4>
              </div>
              <div class="modal-body">
                <p>¡Error al modificar usuario!&hellip;</p>
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