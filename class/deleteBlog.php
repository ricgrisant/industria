
<?php
    include("class_conexion.php");
        try
    {
        $blog = $_POST["blog"];
        $conexion = new Conexion();
        $result = ["Error","1"];
        $query = "CALL Funcion_Eliminar_Blog ($blog,@Mensaje , @Error, @Img);";
        $resultado = $conexion->executeQuery($query);
        $select = $conexion->executeQuery(' SELECT  @Mensaje , @Error, @Img');
        $result = $conexion->getRow($select);

        if ($result[2]<>null) {
            try {
                $delImg = "../".$result[2];
                if (file_exists($delImg)) {
                    unlink($delImg);
                }
            } catch (Exception $e) {
                die("error:". $e->getMessage());
            }
        }

        echo json_encode($result);
    }
    catch (Exception $e){
        die("error:". $e->getMessage());
    }
