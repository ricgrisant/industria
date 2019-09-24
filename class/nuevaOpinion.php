
<?php
    include("class_conexion.php");
        try
    {
        session_start();
        if (isset($_SESSION["user"])) {

        $user = $_SESSION["idUsr"];
        $opinion = $_POST["opinion"];
        $estrellas = $_POST["rating"];
        $idEmpresa = $_POST["idEmpresa"];
        date_default_timezone_get();
        $date = date('Y-m-d', time());
        $conexion = new Conexion();

        $query2='SELECT COUNT(*) as numOpiniones FROM opinion o
                where o.idEmpresaTransporte= '.$_POST["idEmpresa"].' and o.idUsuario= '.$_SESSION["idUsr"];

        $resultado2 = $conexion->executeQuery($query2);
        $row = $conexion->getRow($resultado2);
        if ($row["numOpiniones"]==0) {
             $query = "INSERT INTO `turisteando`.`opinion` (`opinionComentario`,
         `idUsuario`,
         `idEmpresaTransporte`,
         `numeroLikes`, 
         `numeroDislikes`, 
         `fecha`, 
         `estrellas`) 
        VALUES ('".$_POST["opinion"]."', '".$user."', '".$idEmpresa.
        "', '0', '0', '".$date."',".$estrellas.");";

        
        #Si el resultado es verdadero el insert se ejecuto exitosamente,
        #se procede entonces a hacer el promedio de las calificaciones de la empresa
        $resultado = $conexion->executeQuery($query);
                if($resultado)
                {
                    $query2 = 'call turisteando.fn_prom_calificacion('.$idEmpresa.');';
                    $conexion->executeQuery($query2);
                    echo true;
                }else{
                    echo "OPssssss!!!------->Necesitas Loguearte para Comentar";
                }
        }else {
            echo "OPssssss!!!------->Ya haz dejado una calificación en esta página";
        }
    }

}catch (Exception $e)
    {
        die("error:". $e->getMessage());
    }