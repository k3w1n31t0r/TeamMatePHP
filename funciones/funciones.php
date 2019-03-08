<?php
//CREA TICKET COMO ADMINISTRADOR ↓↓↓ 
if(isset($_POST['crearTicket']))
{session_start();
require_once('../conexion/connect_db.php');
require_once('meta.php');

$asunto=$_POST['asunto'];
$tipo=$_POST['tipo'];
$cliente=$_POST['cliente'];
$agente=$_POST['agentes'];
$estatus=$_POST['estatus'];
$prioridad=$_POST['prioridad'];
$proyecto=$_POST['proyecto'];
$descripcion=$_POST['descripcion'];
$fecha=date('Y-m-d H:i:s');
$user=$_SESSION['username'];

//crea nuevo ticket ↓↓↓ 
$sql="INSERT INTO help_desk_ticket(subject, descrip, ind_asign, sub_date, priority_id_id, project_id_id, status_id_id, type_id_id, user_id_id, activo) VALUES ('$asunto','$descripcion',1,'$fecha','$prioridad','$proyecto','$estatus','$tipo','$user', 1)";

$resultado=$link->query($sql);

$obtenerUltimoId="SELECT id_ticket from help_desk_ticket WHERE id_ticket=(SELECT MAX(id_ticket)FROM help_desk_ticket)";
$resultadoId=$link->query($obtenerUltimoId);
while ($renglon=mysqli_fetch_array($resultadoId)){    
$ultimoId=$renglon['id_ticket'];
}
//crea nuevo ticket ↑↑↑ 

//consulta ID de $user ↓↓↓ 
$sqlUser="SELECT id FROM help_desk_client WHERE fk_username_cliente=\"$user\"";
$resultadoUser=$link->query($sqlUser);
    while ($renglon2=mysqli_fetch_array($resultadoUser)) {
      $idUser=$renglon2['id'];
    }
//consulta ID de $user ↑↑↑ 

//asigna nuevo ticket ↓↓↓
foreach ($agente as $key => $value) {
  $sql2="INSERT INTO help_desk_ticket_asign(ticket_id_id, asign_date,user_agent_id_id, user_client_id_id) VALUES ($ultimoId,NOW(),$value,$idUser)";
  $resultadoId2=$link->query($sql2);
}
//asigna nuevo ticket ↑↑↑ 

//MODAL ↓↓↓
if ($resultado==true && $resultadoId2) {
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
                <a href='../crearticketsup.php' class="btn btn-outline">Aceptar</a>
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


//asigna tickets que no habian sido asignados previamente↓↓↓


//asigna tickets que no habian sido asignados previamente↑↑↑


//asignar ticket
if(isset($_POST['asignarTicket'])=="10"){
$aidi=$_POST['aidi'];
$asunto=$_POST['asunto'];
$tipoTicket=$_POST['tipoTicket'];
$estatus=$_POST['estatus'];
$prioridad=$_POST['prioridad'];
$cliente=$_POST['cliente'];
$proyecto=$_POST['proyecto'];
$agentes=$_POST['agentes'];
$descripcion=$_POST['descripcion'];
$resultado=asignar($aidi,$asunto,$tipoTicket,$estatus,$prioridad,$cliente,$proyecto,$agentes,$descripcion);
}
//isset($_POST['guardarSeguir'])=="1" 

//update ASIGNAR
function asignar($aidi,$asunto,$tipoTicket,$estatus,$prioridad,$cliente,$proyecto,$agentes,$descripcion){
   require('../conexion/connect_db.php');
    if($estatus!=3 || $estatus!=4){
      $sql="UPDATE help_desk_ticket SET subject=\"$asunto\", descrip=\"$descripcion\",ind_asign=1,priority_id_id=$prioridad,project_id_id=$proyecto,status_id_id=$estatus,type_id_id=$tipoTicket WHERE id_ticket=$aidi";
      $resultado=$link->query($sql);
    }

    foreach ($agentes as $key => $value) {
      
    $sql2="INSERT INTO help_desk_ticket_asign(ticket_id_id, asign_date, user_agent_id_id, user_client_id_id) VALUES ($aidi,NOW(),$value,$cliente)";
    $resultadoId2=$link->query($sql2);
                                        }
   echo "Registros actualizados";
   header("Refresh:2; url=../bandeja.php");
}

//Creacion de usuarios
function selectTipoUsuario(){
  require('conexion/connect_db.php');

  $sql="SELECT id_tipo_cuenta, tipo_cuenta FROM help_desk_type_account";
  $resultado=$link->query($sql);
  $link->close();

  return $resultado;

}

//Selecciona tipo de usuarios
function insertUsuario($nickname,$nombre,$correo,$contrasenia,$tipousuario,$empresa,$telefono,$puesto,$equipo,$fileName1){
require('../conexion/connect_db.php');

$sql="INSERT INTO help_desk_user_account(username, password, type, correo, activo) VALUES (\"$nickname\",\"$contrasenia\",\"$tipousuario\",\"$correo\",1)";
$resultado1=$link->query($sql);
var_dump($resultado1);
echo $equipo;
switch ($tipousuario) {
  case 1:
  //agente
    $sql="INSERT INTO help_desk_agent(name, email, telephone, job_title, team_id_id, fk_username_agente) VALUES (\"$nombre\",\"$correo\",\"$telefono\",\"$puesto\", 0,\"$nickname\")";
        $resultado2=$link->query($sql);
        var_dump($resultado2);
  //cliente
    $sql="INSERT INTO help_desk_client(name, email, telephone, job_title, company_id_id, fk_username_cliente) VALUES (\"$nombre\",\"$correo\",\"$telefono\",\"$puesto\",0,\"$nickname\")";
        $resultado2=$link->query($sql);
        var_dump($resultado2);
    break;
  case 3:
  //agente
    $sql="INSERT INTO help_desk_agent(name, email, telephone, job_title, team_id_id, fk_username_agente) VALUES (\"$nombre\",\"$correo\",\"$telefono\",\"$puesto\", $equipo,\"$nickname\")";
        $resultado2=$link->query($sql);
        var_dump($resultado2);
    break;
  case 2:
  //cliente
    $sql="INSERT INTO help_desk_client(name, email, telephone, job_title, profile_picture, company_id_id, fk_username_cliente) VALUES (\"$nombre\",\"$correo\",\"$telefono\",\"$puesto\",\"$fileName1\",\"$empresa\",\"$nickname\")";
        $resultado2=$link->query($sql);
        var_dump($resultado2);
    break;

  default:
    # code...
    break;
}
$link->close();
return $resultado1;
}

//ver atributos de un solo ticket
function selectTicketId($id){
  require('conexion/connect_db.php');

  $sql="SELECT * FROM help_desk_ticket WHERE id_ticket=$id";
  $resultado=$link->query($sql);
  $link->close();

  return $resultado;
}

//ver todos los tickets sin asignar
function selectTickets(){
  require('conexion/connect_db.php');

  $sql="SELECT * FROM help_desk_ticket TIC INNER JOIN help_desk_project PRO ON TIC.project_id_id=PRO.id INNER JOIN help_desk_company_project CP ON CP.project_id_id=PRO.id INNER JOIN help_desk_company COM ON COM.id=CP.project_id_id WHERE TIC.activo=1 and TIC.ind_asign=0";
  $resultado=$link->query($sql);
  $link->close();


  return $resultado;
}
//↓
//ELIMINACIONES/DELETE FUNCIONES

//"eliminar" usuarios cambiando estado a inactivo
function eliminarUsuarios($id){
  require('../conexion/connect_db.php');
  //require_once('meta.php');
  $sql="UPDATE help_desk_user_account SET activo=0 WHERE username = $id";
  $resultado=$link->query($sql);
  $link->close();

  return $resultado;
}

//"eliminar" tickets cambiando estado a inactivo
function eliminarTickets($id){
  require('../conexion/connect_db.php');
  //require_once('meta.php');
  $sql="UPDATE help_desk_ticket SET activo=0 WHERE id_ticket = $id";
  $resultado=$link->query($sql);
  $link->close();

  return $resultado;
}
//⇑
//ELIMINACIONES/DELETE FUNCIONES

//CONTADORES DE TICKETS ↓↓↓ ↓↓↓
function selectNuevosTickets(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=0 and activo=1 and (status_id_id=1)";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}
function selectNumeroTickets(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE activo=1 and(status_id_id!=3 and status_id_id!=4)";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}
function selectNumeroTicketsEnProceso(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE activo=1 and (status_id_id=2)";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}

function selectNumeroTicketsTerminados(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=1 and activo=1 and (status_id_id=3)";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}

function selectNumeroTicketsCerrados(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=1 and activo=1 and (status_id_id=5)";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}

//CONTADORES DE TICKETS ↑↑↑ ↑↑↑ 

//select mis propios tickets ADMINISTRADOR Y AGENTE
function verMisTickets($miId){
    require('conexion/connect_db.php');
    $sql="SELECT Ti.*,TA.*,AG.*,cli.name as nombre FROM help_desk_ticket TI INNER JOIN help_desk_ticket_asign TA ON TA.ticket_id_id=TI.id_ticket INNER JOIN help_desk_agent AG ON ag.id=TA.user_agent_id_id INNER JOIN help_desk_client cli ON cli.id=TA.user_client_id_id WHERE ag.fk_username_agente=\"$miId\" and activo=1 and (TI.status_id_id=1 OR TI.status_id_id=2)";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }
function verMisTicketsCliente($miId){
    require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_ticket WHERE user_id_id=\"$miId\" and activo=1 and (status_id_id=1 OR status_id_id=2)";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }

//SELECT DE LLAMADOS

//Select a usuarios/users
//activo = 1
function selectUsuarios(){
  require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_user_account UA INNER JOIN help_desk_type_account TA ON TA.id_tipo_cuenta=UA.type WHERE UA.activo=1";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}

//Select Imagen Usuario
function selectImagen($id){
   require('conexion/connect_db.php');
    $sql="SELECT profile_picture FROM help_desk_user_account WHERE username=\"$id\"";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}

//Select company
  function selectCompanies(){
    require('conexion/connect_db.php');
    $sql="SELECT id, name FROM help_desk_company";
    $resultado=$link->query($sql);
     $link->close();


    return $resultado;
  }

//Select tipos
  function selectTipos(){
    require('conexion/connect_db.php');
    $sql="SELECT id_tipo, tipo FROM help_desk_ticket_type";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
  }

  //Select estados/stats
  function selectEstados(){
    require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_ticket_stats";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
  }

//Select prioridad
  function selectPrioridad(){
    require('conexion/connect_db.php');

    $sql="SELECT id_prioridad, prioridad FROM help_desk_ticket_priority";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
  }

  //Select Ciente
  function selectCliente(){
    require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_client";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
  }

  //Select  agente
  function selectAgente(){
    require('conexion/connect_db.php');
    $sql="SELECT id, name FROM help_desk_agent";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }

  //Select proyecto/project
  function selectProyecto(){
    require('conexion/connect_db.php');
    $sql="SELECT id, descrip_p FROM help_desk_project";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }

  function selectEquipo(){
    require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_team";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }

  function selectAsign($asign){
    require('conexion/connect_db.php');
    $sql="SELECT ticket_id_id FROM help_desk_ticket_asign WHERE user_agent_id_id=$asign";
    $resultado=$link->query($sql);
    while ($row=mysqli_fetch_array($resultado)) {
        $agente=$row['ticket_id_id'];
        echo $agente;
    }
    $link->close();

    return $agente;
  }

function selectTicketsTeamTask(){
    require('conexion/connect_db.php');
    $sql="SELECT TI.*, TA.asign_date,TA.user_agent_id_id, TS.id as idstat, TS.descrip as statdescrip, TS.type, AG.ID AS idagente, AG.name FROM help_desk_ticket TI INNER JOIN help_desk_ticket_asign TA ON TI.id_ticket=TA.ticket_id_id INNER JOIN help_desk_ticket_stats TS ON TS.id=TI.status_id_id INNER JOIN help_desk_agent AG ON AG.id=TA.user_agent_id_id WHERE TI.activo=1" ;
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}

function selectActividades($id){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket_activity TA WHERE TA.ticket_id_id=\"$id\" ORDER BY TA.id ASC"; 
  $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}

//funcion insertar actividad
function insertarActividad($actividad,$id,$estado,$user){
  require('../conexion/connect_db.php');
  $sql="INSERT INTO `help_desk_ticket_activity`(`descrip`, `sub_date`, `time`, `activ_type_id_id`, `ticket_id_id`, `user_agent_id_id`) VALUES (\"$actividad\",NOW(),NOW(),$estado,$id,\"$user\")";
  echo $resultado=$link->query($sql);
  $link->close();
}


function selectModificarUsuario($id){
   require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_user_account WHERE username=\"$id\"";
    $res=$link->query($sql);
    if ($renglon=mysqli_fetch_array($res)) {
        $type=$renglon['type'];
    }

    switch ($type) {
      case 1:
        $sql="SELECT * FROM help_desk_user_account UA INNER JOIN help_desk_admin CLI ON CLI.fk_username_admin=UA.username WHERE UA.username=\"$id\"";
        $resultado=$link->query($sql);
      break;

      case 2:
      //cliente
         $sql="SELECT * FROM help_desk_user_account UA INNER JOIN help_desk_client CLI ON CLI.fk_username_cliente=UA.username WHERE UA.username=\"$id\"";
         $resultado=$link->query($sql);
        break;

      case 3:
      //agente
         $sql="SELECT * FROM help_desk_user_account UA INNER JOIN help_desk_agent AGE ON AGE.fk_username_agente=UA.username WHERE UA.username=\"$id\"";
         $resultado=$link->query($sql);
        break;  
      
      default:
        # code...
        break;
    }
    $link->close();
    return $resultado;
}

function actualizarUsuario($nombre, $nickname,$correo,$contrasenia,$tipousuario,$telefono,$puesto,$equipo,$empresa,$idusuario){
  require('../conexion/connect_db.php');
  $sql="UPDATE help_desk_user_account SET username=\"$nickname\",password=\"$contrasenia\",correo=\"$correo\" WHERE username=\"$idusuario\"";
  $resultado=$link->query($sql);
  var_dump($resultado);

  if($resultado==true){
  switch ($tipousuario) {
    case 1:
      //admin
      //cliente
      $sql="UPDATE help_desk_client SET name=\"$nombre\",email=\"$correo\",telephone=\"$telefono\",job_title=\"$puesto\" WHERE fk_username_cliente=\"$nickname\"";
        $resultado2=$link->query($sql);
        //agente
      $sql="UPDATE help_desk_agent SET name=\"$nombre\",email=\"$correo\",telephone=\"$telefono\",job_title=\"$puesto\" WHERE fk_username_agente=\"$nickname\"";
        $resultado2=$link->query($sql);
      break;

    case 2:
    //cliente
      $sql="UPDATE help_desk_client SET name=\"$nombre\",email=\"$correo\",telephone=\"$telefono\",job_title=\"$puesto\",company_id_id=$empresa WHERE fk_username_cliente=\"$nickname\"";
        $resultado2=$link->query($sql);
      break;

     case 3:
     //agente
      $sql="UPDATE help_desk_agent SET name=\"$nombre\",email=\"$correo\",telephone=\"$telefono\",job_title=\"$puesto\",team_id_id=$equipo WHERE fk_username_agente=\"$nickname\"";
        $resultado2=$link->query($sql);
      break;
    
    default:
      # code...
      break;
  }
  }
  $link->close();
  return $resultado2;
}
function actualizarSeguimiento($aidi,$asunto,$tipoTicket,$estatus,$prioridad,$cliente,$proyecto,$agentes,$descripcion){
      require('../conexion/connect_db.php');

      $sql="UPDATE help_desk_ticket SET subject=\"$asunto\", descrip=\"$descripcion\",ind_asign=1,priority_id_id=$prioridad,project_id_id=$proyecto,status_id_id=$estatus,type_id_id=$tipoTicket WHERE id_ticket=$aidi";
      $resultado=$link->query($sql);

    $ajent="SELECT user_agent_id_id FROM help_desk_ticket_asign WHERE ticket_id_id=$aidi";
    $ajent2=$link->query($ajent);
    $arrey= array();
    $i=0;
    while ($arrow=mysqli_fetch_array($ajent2)) {
      $arrey[$i]=$arrow['user_agent_id_id'];
      $i++;
    }
    $i=0;
    foreach ($agentes as $key => $value) {
    if(in_array($value, $arrey, false)){
      echo $value." = ".$arrey[$i];
      echo "ñooo";
      $i++;
    }
    else{
    $sql2="INSERT INTO help_desk_ticket_asign(ticket_id_id, asign_date, user_agent_id_id, user_client_id_id) VALUES ($aidi,NOW(),$value,$cliente)";
    $resultadoId2=$link->query($sql2);
        }
                                        }
   echo "Registros actualizados";
   header("Refresh:2; url=../bandeja.php");

    return $resultado;
}

//encriptaciones
function encriptar($string, $key) 
    {
          $result = '';
          for($i=0; $i<strlen($string); $i++) 
          {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)+ord($keychar));
              $result.=$char;
           }
           return base64_encode($result);
    }
function desencriptar($string, $key) 
    {
          $result = '';
          $string = base64_decode($string);
          for($i=0; $i<strlen($string); $i++) 
          {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)-ord($keychar));
              $result.=$char;
          }
          return $result;
    }
//encriptaciones
?>