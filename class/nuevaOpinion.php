
<?php
    include("class_conexion.php");
        try
    {

        $user = $_POST["user"];
        $comment = $_POST["comment"];
        $conexion = new Conexion();
        $result = ["Error","1"];

        $query = "CALL Funcion_LikeComentario ($user, $comment, @Mensaje , @Error, @likes, @dislikes);";

        $resultado = $conexion->executeQuery($query);
        $select = $conexion->executeQuery(' SELECT  @likes, @dislikes, @Mensaje , @Error');
        $result = $conexion->getRow( $select);

        echo json_encode($result);
    }
        catch (Exception $e)
    {
        die("error:". $e->getMessage());
    }