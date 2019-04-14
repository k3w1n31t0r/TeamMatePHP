<?php
date_default_timezone_set("America/Mexico_City");
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
$expira=date("Y-m-d",strtotime($fecha."+ 30 days")); 

$sqlUser="SELECT fk_username_cliente FROM help_desk_client WHERE id=$cliente";
$resultadoUser=$link->query($sqlUser);
if($renglon=mysqli_fetch_array($resultadoUser)){
$user=$renglon['fk_username_cliente'];
}


//crea nuevo ticket ↓↓↓ 
$sql="INSERT INTO help_desk_ticket(subject, descrip, ind_asign, sub_date, priority_id_id, project_id_id, status_id_id, type_id_id, user_id_id, activo, due_date) VALUES (\"$asunto\",\"$descripcion\",1,NOW(),'$prioridad','$proyecto','$estatus','$tipo','$user', 1, '$expira')";
$resultado=$link->query($sql);

$obtenerUltimoId="SELECT id_ticket from help_desk_ticket WHERE id_ticket=(SELECT MAX(id_ticket)FROM help_desk_ticket)";
$resultadoId=$link->query($obtenerUltimoId);
while ($renglon=mysqli_fetch_array($resultadoId)){    
$ultimoId=$renglon['id_ticket'];
}
//crea nuevo ticket ↑↑↑ 

//LOG de tickets
$sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Ticket creado', NOW(),'$ultimoId','$user')";
$link->query($sql);
//LOG de tickets

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

  //consulta ID de $agent ↓↓↓ 
$sqlAgent="SELECT name FROM help_desk_agent WHERE id=$value";
$resultadoAgent=$link->query($sqlAgent);
    if($renglon2=mysqli_fetch_array($resultadoAgent)) {
      $idAgent=$renglon2['name'];
    }
//consulta ID de $agent ↑↑↑ 
//LOG de agentes
  $sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Agente asignado', NOW(),'$ultimoId','$idAgent')";
  $link->query($sql);
  //LOG de agentes

}
//asigna nuevo ticket ↑↑↑ 
$link->close();
//MODAL ↓↓↓
if ($resultado==true && $resultadoId2) {
	?>
	<a href="#" id="enlace" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-success"></a>
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
require_once('meta.php');
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
                <p>¡ticket asignado con exito!&hellip;</p>
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
//isset($_POST['guardarSeguir'])=="1" 

//update ASIGNAR
function asignar($aidi,$asunto,$tipoTicket,$estatus,$prioridad,$cliente,$proyecto,$agentes,$descripcion){
   session_start();
   require('../conexion/connect_db.php');
    if($estatus!=3 || $estatus!=4){
      $sql="UPDATE help_desk_ticket SET subject=\"$asunto\", descrip=\"$descripcion\",ind_asign=1,priority_id_id=$prioridad,project_id_id=$proyecto,status_id_id=$estatus,type_id_id=$tipoTicket WHERE id_ticket=$aidi";
      $resultado=$link->query($sql);

//LOG de actualizar ticket asignar en bandeja
    $sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Se crean los parametros del ticket', NOW(),'$aidi',\"{$_SESSION['username']}\")";
    $link->query($sql);
//LOG de actualizar ticket asignar en bandeja
    }
    foreach ($agentes as $key => $value) {
      
    $sql2="INSERT INTO help_desk_ticket_asign(ticket_id_id, asign_date, user_agent_id_id, user_client_id_id) VALUES ($aidi,NOW(),$value,$cliente)";
    $resultadoId2=$link->query($sql2);

//LOG de agentes asignar en bandeja
    $sqlAgent="SELECT name FROM help_desk_agent WHERE id=$value";
    $resultadoAgent=$link->query($sqlAgent);
    if($renglon2=mysqli_fetch_array($resultadoAgent)) {
      $idAgent=$renglon2['name'];
    }
    $sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Agente asignado', NOW(),'$aidi','$idAgent')";
    $link->query($sql);
//LOG de agentes asignar en bandeja
                                         }
   return $resultado;                                     
   //echo "Registros actualizados";
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

$sql="INSERT INTO help_desk_user_account(username, password, type, correo, activo, profile_picture) VALUES (\"$nickname\",\"$contrasenia\",\"$tipousuario\",\"$correo\",1, \"$fileName1\")";
$resultado1=$link->query($sql);
var_dump($resultado1);
switch ($tipousuario) {
  case 1:
  //admin
    $sql="INSERT INTO help_desk_admin(name, email, telephone, job_title, fk_username_admin) VALUES (\"$nombre\",\"$correo\",\"$telefono\",\"$puesto\", \"$nickname\")";
        $resultado2=$link->query($sql);
        var_dump($resultado2);
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
    $sql="INSERT INTO help_desk_client(name, email, telephone, job_title, company_id_id, fk_username_cliente) VALUES (\"$nombre\",\"$correo\",\"$telefono\",\"$puesto\",\"$empresa\",\"$nickname\")";
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
  $sql="UPDATE help_desk_ticket SET activo=0 WHERE id_ticket = $id and ind_asign=0";
  $resultado=$link->query($sql);
  $link->close();

  return $resultado;
}

function eliminarTicketsCuenta($id){
  require('../conexion/connect_db.php');
  //require_once('meta.php');
  $sql="SELECT id_ticket FROM help_desk_ticket WHERE id_ticket = $id and ind_asign=0";
  $resultado=$link->query($sql);
  $link->close();

  return $resultado;
}


function quitarAgente($id,$agente){
  require('../conexion/connect_db.php');
  //require_once('meta.php');
    $sql="SELECT id FROM help_desk_agent WHERE name=\"$agente\"";
    $resultado2=$link->query($sql);
    if(mysqli_num_rows($resultado2)!=0){

            if ($row=mysqli_fetch_array($resultado2)) {
                $idAgente=$row['id'];
            }
          //comprobamos si existen
          $sql="SELECT ticket_id_id FROM help_desk_ticket_asign WHERE ticket_id_id=$id";
          $resultado3=$link->query($sql);
          //comprobamos si existen
          if(mysqli_num_rows($resultado3)!=0){
                  $sql="DELETE FROM help_desk_ticket_asign WHERE ticket_id_id = $id AND user_agent_id_id=$idAgente";
                  $resultado=$link->query($sql);

                //LOG de quitar agentes
                  $sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Se quito el agente', NOW(),'$id','$agente')";
                  $link->query($sql);
                //LOG de quitar agentes

                  $sql="SELECT * FROM help_desk_ticket_asign WHERE ticket_id_id = $id";
                  $resultado2=$link->query($sql);
                  $rows=mysqli_num_rows($resultado2); 
                  echo $rows;
                  if($rows==0){
                    $sql="UPDATE help_desk_ticket SET ind_asign=0 WHERE id_ticket=$id";
                    $resultado2=$link->query($sql);
                  }
                  $link->close();

                  return $resultado;
                           }
                           else{
                            $link->close();
                            header("location: ../teamtask.php");
                                }
                         }        
      else{
        $link->close();
        header("location: ../teamtask.php");
      }
}
//⇑
//ELIMINACIONES/DELETE FUNCIONES

//CONTADORES DE TICKETS ↓↓↓ ↓↓↓
function selectNuevosTickets(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=0 and activo=1";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}
function selectNumeroTickets(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket /*WHERE activo=1 and(status_id_id!=3 and status_id_id!=4)*/";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}
function selectNumeroTicketsEnProceso(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=1 and activo=1 and status_id_id=2";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}

function selectNumeroTicketsTerminados(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=1 and activo=1 and status_id_id=3";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}

function selectNumeroTicketsCerrados(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE ind_asign=1 and activo=1 and status_id_id=4";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}
function selectNumeroTicketsAbiertos(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE status_id_id=1 and ind_asign=1 and activo=1";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}
function selectNumeroTicketsEliminados(){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket WHERE activo=0";
  $resultado=$link->query($sql);
  $numero   =$resultado->num_rows;
     $link->close();

    return $numero;
}

//CONTADORES DE TICKETS ↑↑↑ ↑↑↑ 

//select mis propios tickets ADMINISTRADOR Y AGENTE
function verMisTickets($miId){
    require('conexion/connect_db.php');
    $sql="SELECT TI.*,TA.*,AG.*,cli.name as nombre FROM help_desk_ticket TI INNER JOIN help_desk_ticket_asign TA ON TA.ticket_id_id=TI.id_ticket INNER JOIN help_desk_agent AG ON AG.id=TA.user_agent_id_id INNER JOIN help_desk_client cli ON cli.id=TA.user_client_id_id WHERE AG.fk_username_agente=\"$miId\" and activo=1 and (TI.status_id_id=1 OR TI.status_id_id=2)";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }
function verMisTicketsCliente($miId){
    require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_ticket WHERE user_id_id=\"$miId\" and activo=1 and (status_id_id=1 OR status_id_id=2 OR status_id_id=3)";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }

//SELECT DE LLAMADOS

//Selecciona tickets validos

  

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
    $sql="SELECT id, name FROM help_desk_company WHERE id!=0";
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
    $sql="SELECT * FROM help_desk_ticket_stats WHERE id!=4";
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
    $sql="SELECT * FROM help_desk_client CL INNER JOIN help_desk_user_account UA ON CL.name=UA.username WHERE UA.activo=1";
    $resultado=$link->query($sql);
    $link->close();

    return $resultado;
  }

  //Select  agente
  function selectAgente(){
    require('conexion/connect_db.php');
    $sql="SELECT AG.id, AG.name, UA.activo FROM help_desk_agent AG INNER JOIN help_desk_user_account UA ON AG.name=UA.username WHERE UA.activo=1  ";
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

   function selectProyectoCliente($idCliente){
    require('conexion/connect_db.php');
    $sql="SELECT PRO.id, PRO.descrip_p FROM help_desk_company_project CP INNER JOIN help_desk_client CLI ON CLI.company_id_id=CP.company_id_id INNER JOIN help_desk_project PRO on PRO.id=CP.project_id_id WHERE CLI.fk_username_cliente=\"$idCliente\"";
    $resultado=$link->query($sql);
     $link->close();

    return $resultado;
  }


  function selectEquipo(){
    require('conexion/connect_db.php');
    $sql="SELECT * FROM help_desk_team WHERE id!=0";
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

//SELECCIONA EL SEGUIMITNO!!!!!!!
function selectActividades($id){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket_activity TA WHERE TA.ticket_id_id=\"$id\" ORDER BY TA.id ASC"; 
  $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}
//SELECCIONA EL SEGUIMIENTO!!!!!!!

//SELECCIONA LAS ACTIVIDADES DE AGENTES Y ADMINS
function selectSeguimiento($id){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_activity_agent_admin TA WHERE TA.ticket_id_id=\"$id\" ORDER BY TA.id ASC"; 
  $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}
//SELECCIONA LAS ACTIVIDADES DE AGENTES Y ADMINS

//SELECCIONA MOVIMIENTOS
function selectMovimientos($id){
  require('conexion/connect_db.php');
  $sql="SELECT * FROM help_desk_ticket_log TA WHERE TA.ticket_id_id=\"$id\" ORDER BY TA.id ASC"; 
  $resultado=$link->query($sql);
    $link->close();

    return $resultado;
}
//SELECCIONA MOVIMIENTOS

//funcion insertar actividad
function insertarActividad($actividad,$id,$estado,$user){
  require('../conexion/connect_db.php');
  $sql="INSERT INTO `help_desk_ticket_activity`(`descrip`, `sub_date`, `time`, `activ_type_id_id`, `ticket_id_id`, `user_agent_id_id`) VALUES (\"$actividad\",NOW(),NOW(),$estado,$id,\"$user\")";
  echo $resultado=$link->query($sql);
  $link->close();
}

function insertarSeguimiento($actividad,$id,$estado,$user){
  require('../conexion/connect_db.php');
  $sql="INSERT INTO `help_desk_activity_agent_admin`(`descrip`, `sub_date`, `time`, `activ_type_id_id`, `ticket_id_id`, `user_id_id`) VALUES (\"$actividad\",NOW(),NOW(),$estado,$id,\"$user\")";
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

function actualizarUsuario($nombre, $nickname,$correo,$contrasenia,$tipousuario,$telefono,$puesto,$equipo,$empresa,$idusuario,$fileName1){
  require('../conexion/connect_db.php');
  $sql="UPDATE help_desk_user_account SET username=\"$nickname\",password=\"$contrasenia\",correo=\"$correo\", profile_picture=\"$fileName1\" WHERE username=\"$idusuario\"";
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

        $sqlUser="SELECT fk_username_cliente FROM help_desk_client WHERE id=$cliente";
        $resultadoUser=$link->query($sqlUser);
        if($renglon=mysqli_fetch_array($resultadoUser)){
        $user=$renglon['fk_username_cliente'];
        }

      //se actualiza el ticket
      if($estatus==4 || $estatus==3){
        $sql="UPDATE help_desk_ticket SET subject=\"$asunto\", descrip=\"$descripcion\",ind_asign=1,priority_id_id=$prioridad,project_id_id=$proyecto,status_id_id=$estatus,type_id_id=$tipoTicket, user_id_id=\"$user\", close_date=NOW() WHERE id_ticket=$aidi";
          $resultado=$link->query($sql);
      }
      else{
        $sql="UPDATE help_desk_ticket SET subject=\"$asunto\", descrip=\"$descripcion\",ind_asign=1,priority_id_id=$prioridad,project_id_id=$proyecto,status_id_id=$estatus,type_id_id=$tipoTicket, user_id_id=\"$user\" WHERE id_ticket=$aidi";
          $resultado=$link->query($sql);
      }
      
      //-----------------------

//LOG de actualizacion de ticket
      $sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Se actualizaron los datos del ticket', NOW(),'$aidi',\"{$_SESSION['username']}\")";
      $link->query($sql);
//LOG de actualizacion de ticket

      //se actualiza el cliente en asignacion
      $sql3="UPDATE help_desk_ticket_asign SET user_client_id_id=$cliente WHERE ticket_id_id=$aidi";
      $resultado3=$link->query($sql3);


    $ajent="SELECT user_agent_id_id FROM help_desk_ticket_asign WHERE ticket_id_id=$aidi";
    $ajent2=$link->query($ajent);
    $arrey= array();
    $i=0;
    while ($arrow=mysqli_fetch_array($ajent2)) {
      $arrey[$i]=$arrow['user_agent_id_id'];
      $i++;
    }
    $i=0;
    if($agentes!=NULL){

    foreach ($agentes as $key => $value) {
    if(in_array($value, $arrey, false)){
      //echo $value." = ".$arrey[$i];
      //echo "ñooo";
      $i++;
    }
    else{
    $sql2="INSERT INTO help_desk_ticket_asign(ticket_id_id, asign_date, user_agent_id_id, user_client_id_id) VALUES ($aidi,NOW(),$value,$cliente)";
    $resultadoId2=$link->query($sql2);
//LOG de actualizacion de ticket (agregar nuevos agentes)
    $sqlAgent="SELECT name FROM help_desk_agent WHERE id=$value";
    $resultadoAgent=$link->query($sqlAgent);
    if($renglon2=mysqli_fetch_array($resultadoAgent)) {
      $idAgent=$renglon2['name'];
    }
      $sql="INSERT INTO help_desk_ticket_log(descrip, log_date, ticket_id_id, user_id_id) VALUES ('Agente asignado +', NOW(),'$aidi',\"$idAgent\")";
      $link->query($sql);
//LOG de actualizacion de ticket (agregar nuevos agentes)
        }
                                        }
        }
   //echo "Registros actualizados";
   //header("Refresh:2; url=../bandeja.php");
    $link->close();                                    
    return $resultado;
}

function actualizarSeguimientoAgente($aidi,$estatus){
      require('../conexion/connect_db.php');

      $sql="UPDATE help_desk_ticket SET status_id_id=$estatus WHERE id_ticket=$aidi";
      $resultado=$link->query($sql);

   echo "Registros actualizados";
   header("Refresh:2; url=../bandeja.php");
   $link->close();
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