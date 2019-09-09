<?php
  include("class_conexion.php");
  $conexion= new Conexion();
  $query=null;

  try{
    if(isset($_POST["text_Nombre"])){
      $nombre=$_POST["text_Nombre"];
    }

    if(isset($_POST["text_Apellido"])){
      $apellido=$_POST["text_Apellido"];
    }

    if(isset($_POST["text_Correo"])){
      $correo=$_POST["text_Correo"];
    }

    if(isset($_POST["text_Telefono"])){
      $telefono=$_POST["text_Telefono"];
    }

    if(isset($_POST["text_Img"])){
      $imgPerfil=$_POST["text_Img"];
    }

    if(isset($_POST["text_Direccion"])){
      $direccion=$_POST["text_Direccion"];
    }

    if(isset($_POST["text_FechaNac"])){
      $fechaNac=$_POST["text_FechaNac"];
    }

    $respuesta="";

    if ($nombre==null or $nombre==""){
      $respuesta="Ingrese su nombre";
    }

    else if ($apellido==null or $apellido==""){
      $respuesta="Ingrese su apellido";
    }

    else if ($correo==null or $correo==""){
      $respuesta="Ingrese el Correo ";
    }

    else if ($telefono==null or $telefono==""){
      $respuesta="Ingrese el Telefono";
    }

    else if ($imgPerfil==null or $imgPerfil==""){
      $imgPerfil="images\Profile-null.png";
    }

    else if ($direccion==null or $direccion==""){
      $direccion=null;
    }

    else if ($fechaNac==null or $fechaNac==""){
      $fechaNac=null;
    }

    else{
      $query="CALL Funcion_UpdatePerfil(1, '$nombre','$apellido','$telefono','$correo','$imgPerfil',$fechaNac, $direccion, @men, @booleano, @nombre, @apellido, @telefono, @correo, @imgPerfil, @fechaNac, @direccion);";
      /*$resultados=$conexion->executeQuery($query);

      $query="SELECT @men, @booleano, @nombre, @apellido, @telefono, @correo, @imgPerfil, @fechaNac, @direccion;";
      $select= $conexion->executeQuery($query);
      $respuesta=$conexion->getRow($select);
      if ($respuesta["@booleano"]==0) {
        setcookie("Nombre", $respuesta["@Nombre"],0,"/");
        setcookie("Apellido", $respuesta["@Apellido"],0,"/");
        setcookie("Telefono", $respuesta["@Telefono"],0,"/");
        setcookie("Correo", $respuesta["@Correo"],0,"/");
        setcookie("Img", $respuesta["@Img"],0,"/");
        setcookie("FechaNac", $respuesta["@FechaNac"],0,"/");
        setcookie("Direccion", $respuesta["@Direccion"],0,"/");
        }
      $conexion->closeConnection();
      //var_dump($respuesta);
      echo json_encode($respuesta["@booleano"]);*/
      echo json_encode($respuesta);
    }
    echo json_encode($respuesta);
  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }
?>