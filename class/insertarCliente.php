<?php
  include("class_conexion.php");
  $conexion= new Conexion();
  $query=null;
  $pass = true;

  try{
    if(isset($_POST["text_Nombre"])){
      $nombre=$_POST["text_Nombre"];
    }

    if(isset($_POST["text_Apellido"])){
      $apellido=$_POST["text_Apellido"];
    }

    if(isset($_POST["text_Password"])){
      $userpassword=$_POST["text_Password"];
    }

    if(isset($_POST["text_Password2"])){
      $userpassword2=$_POST["text_Password2"];
    }

    if(isset($_POST["text_Correo"])){
      $correo=$_POST["text_Correo"];
    }

    if(isset($_POST["text_Telefono"])){
      $telefono=$_POST["text_Telefono"];
    }

    if($userpassword==$userpassword2){
      $userpassword=hash("sha512",$userpassword);
      $pass = false;
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

    else if ($userpassword==null or $userpassword==""){
      $respuesta="Ingrese una contraseña válida";
    }

    else if ($userpassword2==null or $userpassword2==""){
      $respuesta="Confirme la contraseña";
    }

    else if($pass){
      $respuesta="Contraseñas no concuerdan";
    }

    else{
      $query="CALL Funcion_SignUp_Cliente('$userpassword', '$nombre','$apellido','$telefono','$correo', @men, @booleano);";
      $resultados=$conexion->executeQuery($query);

      $query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
      $respuesta=$conexion->getRow($select);
    }

    $conexion->closeConnection();
    echo json_encode((string)$respuesta[0]);
  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }
?>