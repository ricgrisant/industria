<?php
  include("class_conexion.php");
  try{
      $idUser=$_POST["text_idUser"];
      $nombre=$_POST["text_Nombre"];
      $apellido=$_POST["text_Apellido"];
      $correo=$_POST["text_Correo"];
      $telefono=$_POST["text_Telefono"];

      $conexion= new Conexion();
      $respuesta=["Error","1"];


    if ($nombre==null or $nombre==""){
      $respuesta[0]="Ingrese su nombre";
    }

    else if ($apellido==null or $apellido==""){
      $respuesta[0]="Ingrese su apellido";
    }

    else if ($correo==null or $correo==""){
      $respuesta[0]="Ingrese el Correo ";
    }

    else if ($telefono==null or $telefono==""){
      $respuesta[0]="Ingrese el Telefono";
    }


    else{
      $query="CALL Funcion_UpdatePerfil($idUser, '$nombre','$apellido','$telefono','$correo', @men, @booleano);";
      //$respuesta[0] = $query;
      $resultados=$conexion->executeQuery($query);

      $query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
      $respuesta=$conexion->getRow($select);

      $query = "CALL getUser($idUser, @men, @booleano);";
      $res =$conexion->executeQuery($query);
      $result = $conexion->getRow($res);
      setcookie("Nombre",$result[0],0,"/");
      setcookie("Apellido",$result[1],0,"/");
      setcookie("Telefono",$result[2],0,"/");
      setcookie("Correo",$result[3],0,"/");
      setcookie("Img",$result[4],0,"/");
      }
    $conexion->closeConnection();
    echo json_encode($respuesta);
  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }

?>