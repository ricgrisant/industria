
<?php
    include("class_conexion.php");
        try
    {

        $usuario = $_POST["uname"];
        $password = $_POST["psw"];
        $conexion = new Conexion();

        $sql = sprintf(
        "CALL `Funcion_Login` (
        '%s' , '%s', @Mensaje , @Error , @idUsr , @idAdmin , @Nombre , @Apellido , @Telefono , @Correo , @Img, @FechaNac, @Direccion
        );",
            stripslashes($usuario),
            stripslashes(hash("sha1",$password))
        );

        $resultado = $conexion->executeQuery($sql);
        $select = $conexion->executeQuery(' SELECT  @Mensaje , @Error , @idUsr , @idAdmin , @Nombre , @Apellido , @Telefono , @Correo , @Img, @FechaNac, @Direccion;');
        $result = $conexion->getRow( $select);


        if ($result["@Error"]==0) {
            session_start();
            $_SESSION["user"] = $usuario;
            setcookie("idUsr", $result["@idUsr"],0,"/");
            setcookie("idAdmin", $result["@idAdmin"],0,"/");
            setcookie("Nombre", $result["@Nombre"],0,"/");
            setcookie("Apellido", $result["@Apellido"],0,"/");
            setcookie("Telefono", $result["@Telefono"],0,"/");
            setcookie("Correo", $result["@Correo"],0,"/");
            setcookie("Img", $result["@Img"],0,"/");
            setcookie("FechaNac", $result["@FechaNac"],0,"/");
            setcookie("Direccion", $result["@Direccion"],0,"/");
            //var_dump($_COOKIE);
            echo true;
        } else {
            echo $result["@Mensaje"];
        }


    }
        catch (Exception $e)
    {
        die("error:". $e->getMessage());
    }
