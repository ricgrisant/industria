
<?php
    include("class_conexion.php");
        try
    {

        $usuario = $_POST["uname"];
        $password = $_POST["psw"];



        $conexion = new Conexion();

        $sql = sprintf(
        "CALL `Funcion_Login` (
        '%s' , '%s', @Mensaje , @Error , @idUsr , @idAdmin , @Nombre , @Apellido , @Telefono , @Correo , @Img
        );",
            stripslashes($usuario),
            stripslashes(hash("sha1",$password))
        );

        $resultado = $conexion->executeQuery($sql);
        $select = $conexion->executeQuery(' SELECT  @Mensaje , @Error , @idUsr , @idAdmin , @Nombre , @Apellido , @Telefono , @Correo , @Img;');
        $result = $conexion->getRow( $select);


        if ($result["@Error"]==0) {
            session_start();
            $_SESSION["user"] = $usuario;
            setcookie("idUsr", $result["@idUsr"]);
            setcookie("idAdmin", $result["@idAdmin"]);
            setcookie("Nombre", $result["@Nombre"]);
            setcookie("Apellido", $result["@Apellido"]);
            setcookie("Telefono", $result["@Telefono"]);
            setcookie("Correo", $result["@Correo"]);
            setcookie("Img", $result["@Img"]);
            echo true;
        } else {
            echo $result["@Mensaje"];
        }


    }
        catch (Exception $e)
    {
        die("error:". $e->getMessage());
    }
