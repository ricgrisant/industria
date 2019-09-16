
<?php
    include("class_conexion.php");
        try
    {

        $user = $_POST["user"];
        $blog = $_POST["blog"];
        $comment = $_POST["comment"];
        $conexion = new Conexion();
        $result = ["Error","1"];

        $query = "CALL Funcion_Comentar_blog ($user, $blog, '$comment',@Mensaje , @Error);";

        $resultado = $conexion->executeQuery($query);
        $select = $conexion->executeQuery(' SELECT  @Mensaje , @Error');
        $result = $conexion->getRow($select);

        echo json_encode($result);
    }
        catch (Exception $e)
    {
        die("error:". $e->getMessage());
    }
