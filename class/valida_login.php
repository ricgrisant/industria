
<?php
    include("class_conexion.php");
        try 
    {

        $usuario = $_POST["uname"];
        $password = $_POST["psw"];

        
        
        $conexion = new Conexion();


        $sql = sprintf(
        "CALL `Funcion_Login_Cliente` (
        '%s' , '%s', @Mensaje , @Error);",
            stripslashes($usuario),
            stripslashes($password)
        );

        $resultado = $conexion->executeQuery($sql);
        $select = $conexion->executeQuery('SELECT @Mensaje, @Error');
        $result = $conexion->getRow( $select);


        if ($result["@Error"]==0) {
            session_start();
            $_SESSION["user"] = $usuario;
            echo true;
        } else {
            echo $result["@Mensaje"];
        }
        

    } 
        catch (Exception $e)
    {
        die("error:". $e->getMessage()); 
    }
 