<?php
  include("class_conexion.php");
  $conexion= new Conexion();
  $pass = true;

  try{
    if(isset($_POST["text_Password"])){
      $userpassword=$_POST["text_Password"];
    }

    if(isset($_POST["text_Password2"])){
      $userpassword2=$_POST["text_Password2"];
    }

    if(isset($_POST["text_idUser"])){
      $idUser=$_POST["text_idUser"];
    }

    $respuesta=["Error","1"];
    if($userpassword==$userpassword2){
      $userpassword=hash("sha1",$userpassword);
      $pass = false;
    }

    if ($userpassword==null or $userpassword==""){
      $respuesta[0]="Ingrese una contraseña válida";
    }

    else if ($userpassword2==null or $userpassword2==""){
      $respuesta[0]="Confirme la contraseña";
    }

    else if($pass){
      $respuesta[0]="Contraseñas no concuerdan";
    }

    else{
      $query="CALL passwordChange($idUser,'$userpassword', @men, @booleano);";
      $resultados=$conexion->executeQuery($query);

      $query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
      $respuesta =["Cambió su contraseña","0"];

      /*$respuesta=$conexion->getRow($select);*/
    }
    $conexion->closeConnection();
    echo json_encode($respuesta);

  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }
?>