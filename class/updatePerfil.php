<?php
  /*include("class_conexion.php");
  $conexion= new Conexion();*/
  $query=null;
  $respuesta=["Error","1"];
  try{
      $nombre=$_POST["text_Nombre"];
      $apellido=$_POST["text_Apellido"];
      $correo=$_POST["text_Correo"];
      $telefono=$_POST["text_Telefono"];
      $imgPerfil=$_POST["text_Img"];

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

   else if ($imgPerfil==null or $imgPerfil==""){
      $imgPerfil="images\Profile-null.png";
    }

    else{
      $query="CALL Funcion_UpdatePerfil(1, '$nombre','$apellido','$telefono','$correo', '$imgPerfil', @men, @booleano, @nombre, @apellido, @telefono, @correo, @imgPerfil );";
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
      }*/
      $respuesta[0] = $query;
    }
    //$conexion->closeConnection();
    echo json_encode($respuesta);
  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }

?>