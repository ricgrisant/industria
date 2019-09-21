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
				$fileDestination ='../images/uploads/blog/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$img = 'images/uploads/blog/'.$fileNameNew;
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

    if(isset($_POST["text_Nombre"])){
      $nombre=$_POST["text_Nombre"];
    }

    if(isset($_POST["text_Descripcion"])){
      $descripcion=$_POST["text_Descripcion"];
    }

    //$respuesta=["Error","1"];

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

      /*$query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
     $respuesta=$conexion->getRow($select);*/
    }

    $conexion->closeConnection();
    header("Location: ../db-my-blogs.php");

  }
  catch (Exception $e){
    die("error:". $e->getMessage());
  }
}
?>