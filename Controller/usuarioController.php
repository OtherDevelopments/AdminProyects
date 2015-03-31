<?php

require_once "../class/BD.class.php";
require_once "../class/Tablas.class.php";

$respuesta=  "";
$estado="";
$mensaje="";
if(isset($_REQUEST["accion"])){
  $accion=$_REQUEST["accion"];
}else{
  $accion="";
}

if(isset($_REQUEST["nombre"])){
  $nombre=$_REQUEST["nombre"];
}else{
  $nombre="";
}

if(isset($_REQUEST["ap_paterno"])){
  $apPaterno=$_REQUEST["ap_paterno"];
}else{
  $apPaterno="";
}

if(isset($_REQUEST["ap_materno"])){
  $apMaterno=$_REQUEST["ap_materno"];
}else{
  $apMaterno="";
}

if(isset($_REQUEST["email"])){
  $email=$_REQUEST["email"];
}else{
  $email="";
}

if(isset($_REQUEST["user"])){
  $user=$_REQUEST["user"];
}else{
  $user="";
}

if(isset($_REQUEST["pass"])){
  $pass=$_REQUEST["pass"];
}else{
  $pass="";
}

if($accion =="add"){
  try{
    $bd = new BD();
    
    $parametrosPersona = array(
        "nombre"=>$nombre,
        "apellido_paterno"=>$apPaterno,
        "apellido_materno"=>$apMaterno,
        "nombre_completo"=>$nombre." ".$apPaterno." ".$apMaterno,
        "email"=>$email
    );
    
    $bd->beginTransaction();
    $bd->insert(tablas::PERSONA, $parametrosPersona);
    if($bd->myException->getEstado()==0){
      $parametrosUsuario = array(
        'nombre_usuario'=>$user,
        'pass'=>$pass,
        'fecha_ingreso'=>date("Y-m-d H:i:s"),
        'id_persona'=>$bd->lastId()
      );
      $bd->insert2(tablas::USUARIO, $parametrosUsuario);
      if($bd->myException->getEstado()==0){
        $bd->commit();
        $estado="ok";
        $mensaje="Usuario Ingresado Exitosamente";
      }else{
        $bd->rollBack();
        $estado = "error";
        $mensaje = $e->getMensaje();
      }
    }else{
      $bd->rollBack();
      $estado = "error";
      $mensaje = $e->getMensaje();
    }
  } catch (Exception $e) {
    $bd->rollBack();
    $estado = "error";
    $mensaje = $e->getMensaje();
    
  }  
    
  $bd=NULL;
  $respuesta[] = array("estado" => $estado, "mensaje" => $mensaje);
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$respuesta=json_encode($respuesta);
echo $respuesta;