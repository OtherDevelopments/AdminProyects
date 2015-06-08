<?php

require_once "../class/BD.class.php";

$respuesta=  "";

  $sql="SELECT p.id_persona, p.nombre_completo,p.email,p.telefono,p.direccion,p.celular,p.rut,p.fecha_nacimiento,u.usuario "
          . "FROM persona p INNER JOIN usuarios u ON p.id_persona=u.id_persona;";
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
            "id_persona"=>$rs["id_persona"],
            "nombre"=>$rs["nombre_completo"],
            "email"=>$rs["email"],
            "telefono"=>$rs["telefono"],
            "direccion"=>$rs["direccion"],
            "celular"=>$rs["celular"],
            "rut"=>$rs["rut"],
            "fecha_nacimiento"=>$rs["fecha_nacimiento"],
            "usuario"=>$rs["usuario"]);
      }
    }
  } catch (Exception $e) {
    $estado="error";
    $mensaje=$e->getMessage();
  } 

  $bd=NULL;

  
  
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$campos=json_encode($campos);
echo $campos;
