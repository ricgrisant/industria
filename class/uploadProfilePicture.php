<?php
  include("class_conexion.php");
  $conexion= new Conexion();
  $img = null;
  $respuesta=["Error","1"];
if(isset($_POST['submit'])){
  $file = $_FILES['Img'];
  $fileName = $_FILES['Img']['name'];
  $fileTmpName = $_FILES['Img']['tmp_name'];
  $fileSize = $_FILES['Img']['size'];
  $fileError = $_FILES['Img']['error'];
  $fileType = $_FILES['Img']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png');
  if (in_array($fileActualExt, $allowed)) {
    if ($fileError===0) {
      if ($fileSize<10000000) {
        $fileNameNew=uniqid('',true).".".$fileActualExt;
        $fileDestination ='../images/uploads/perfil/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $img = 'images/uploads/perfil/'.$fileNameNew;
        //echo 'Se subió el archivo';
      } else{
        $respuesta[0]= "Su archivo es muy grande";
      }
    } else{
      $respuesta[0]= 'Hubo un error subiendo su archivo';
    }
  } else{
    $respuesta[0]= 'No se permite ese tipo de archivo';
  }
  try{
    if(isset($_POST["text_idUser"])){
      $idUser=$_POST["text_idUser"];
    }

    if ($img==null or $img==""){
      $img="";
    }

    else{
      $query="CALL updateProfilePicture($idUser, '$img', @men, @booleano);";
      $resultados=$conexion->executeQuery($query);

      $query = "CALL getUser($idUser, @men, @booleano);";
      $res =$conexion->executeQuery($query);
      $result = $conexion->getRow($res);
        //var_dump($result);
      setcookie("Nombre",$result[0],0,"/");
      setcookie("Apellido",$result[1],0,"/");
      setcookie("Telefono",$result[2],0,"/");
      setcookie("Correo",$result[3],0,"/");
      setcookie("Img",$result[4],0,"/");

      /*$query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
     $respuesta=$conexion->getRow($select);*/
    }

    $conexion->closeConnection();
    header("Location: ../db-my-profile.php");

  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }
}
?>