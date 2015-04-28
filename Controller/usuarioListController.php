<?php

require_once "../class/BD.class.php";

$respuesta=  "";

  $sql="SELECT p.nombre_completo,p.email,p.telefono,p.direccion,p.celular,p.rut,p.fecha_nacimiento,u.nombre_usuario "
          . "FROM persona p INNER JOIN usuario u ON p.id_persona=u.id_persona;";
  $parametros=array();
  $campos=array();
  $estado="error";
  $cont=0;
  try {
    $bd = new BD();
    $res=$bd->select($sql, $parametros);
    if($bd->myException->getEstado()==0){
      while($rs=$res->fetch()){
        $cont++;
        $estado="ok";
        $campos[]=array(
            "nro"=>$cont,
            "nombre"=>$rs["nombre_completo"],
            "email"=>$rs["email"],
            "telefono"=>$rs["telefono"],
            "direccion"=>$rs["direccion"],
            "celular"=>$rs["celular"],
            "rut"=>$rs["rut"],
            "fecha_nacimiento"=>$rs["fecha_nacimiento"],
            "nombre_usuario"=>$rs["nombre_usuario"]);
      }
    }
  } catch (Exception $e) {
    $bd->rollBack();
    $estado="error";
    $mensaje=$e->getMessage();
  } 

  $bd=NULL;

  
  
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$campos=json_encode($campos);
echo $campos;
