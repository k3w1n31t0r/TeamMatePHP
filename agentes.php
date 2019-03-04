<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TeamMate | Agentes</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

 <body>
  <form role="form" action="#" method="post"></form>
      <div class="box-body">
              <table id="ejemplo" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Asignar</th>
                  <th>Agente</th>
                  <th>Equipo</th>
                </tr>
                </thead>
                <tbody>    
                <tr>
              <td>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="1" name="lista[]">
                      Checkbox 1
                    </label>
                  </div>
                </td>
                  <td>NetFront 3.1</td>
                  <td>Links</td>
                </tr>    
                <tr>
                  <td>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="2" name="lista[]">
                      Checkbox 2
                    </label>
                  </div>
                </div>
                  </td>
                  <td>Links</td>
                  <td>Links</td>
                </tr>
                <tr>
                  <td>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="3" name="lista[]">
                      Checkbox 2
                    </label>
                  </div>
                </div>
                  </td>
                  <td>Lynx</td>
                  <td>Links</td>
                </tr>     
                </tbody>
                <tfoot>
                <tr>
                  <th>Asignar</th>
                  <th>Agente</th>
                  <th>Equipo</th>
                </tr>
                </tfoot>
              </table>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="cerrar()">Submit</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </form>
          <!-- /.box -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    function cerrar() { 
        $("body").php('<div alignt="center">Enviando. . .</div>'); //Marca nuevo contenido con un mensaje que se envio exitosamente
        var x=document.getElementById('ejemplo');
        console.log(x);
        setTimeout(function(){
            window.close();
        },1500); //Dejara un tiempo de 3 seg para que el usuario vea que se envio el formulario correctamente

    }
</script>
</body>
</html>
