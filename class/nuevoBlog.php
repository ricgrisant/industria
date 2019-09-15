<?php
  include("class_conexion.php");
  $conexion= new Conexion();

  try{
    if(isset($_POST["text_idUser"])){
      $idUser=$_POST["text_idUser"];
    }

    if(isset($_POST["text_Nombre"])){
      $nombre=$_POST["text_Nombre"];
    }

    if(isset($_POST["text_Descripcion"])){
      $descripcion=$_POST["text_Descripcion"];
    }

    if(isset($_POST["text_Img"])){
      $img=$_POST["text_Img"];
    }

    $respuesta=["Error","1"];

    if ($nombre==null or $nombre==""){
      $respuesta[0]="Ingrese su nombre";
    }

    else if ($descripcion==null or $descripcion==""){
      $respuesta[0]="Ingrese la descripcion";
    }

    else if ($img==null or $img==""){
      $img="";
    }

    else{
      $query="CALL Funcion_Crear_Blog('$idUser', '$nombre','$descripcion','$img', @men, @booleano);";
      $resultados=$conexion->executeQuery($query);

      $query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
      $respuesta=$conexion->getRow($select);
    }

    $conexion->closeConnection();
    echo json_encode($respuesta);

  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }
?>