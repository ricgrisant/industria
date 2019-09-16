
<?php
    include("class_conexion.php");
        try
    {

        $comment = $_POST["comment"];
        $conexion = new Conexion();
        $result = ["Error","1"];

        $query = "CALL Funcion_Eliminar_Comentario ($comment,@Mensaje , @Error);";

        $resultado = $conexion->executeQuery($query);
        $select = $conexion->executeQuery(' SELECT  @Mensaje , @Error');
        $result = $conexion->getRow($select);

        echo json_encode($result);
    }
        catch (Exception $e)
    {
        die("error:". $e->getMessage());
    }
