<?php
    include("class_conexion.php");

        $conexion = new Conexion();
        if(!empty($_GET["nombre"])) {

        $query ='SELECT nombre FROM turisteando.empresatransporte 
                WHERE nombre like '.'"'.$_POST["nombre"].'%" ORDER BY nombre LIMIT 0,6';

        $resultado = $conexion->executeQuery($query);
        $result = $conexion->getRow( $resultado);

        while ($row = $result) {
        array_push($data, $row['nombre']);
        }

    }

    echo json_encode($result);