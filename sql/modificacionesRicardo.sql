ALTER TABLE `sucursalempresatransporte` ADD `horaSalidas` TEXT NOT NULL

INSERT INTO `turisteando`.`sucursalempresatransporte` (
`idSucursal` ,
`ubicacion` ,
`horaApertura` ,
`horaCierre` ,
`idEmpresaTransporte` ,
`calificacion` ,
`imagenPerfil` ,
`horaSalidas`
)
VALUES (
NULL , 'Tegucigalpa', '10:00:00', '5:00:00', '1', '3,5', NULL , 'TEGUCIGALPA - SRC
-9:00
-10:00
-11:00
-3:00
-5:00

SRC - TEGUCIGALPA 
-6:00
-11:00
-3:00
-5:00'
);

ALTER TABLE `sucursalempresatransporte` CHANGE `calificacion` `calificacion` DECIMAL( 2, 1 ) NOT NULL

INSERT INTO `turisteando`.`opinion` (
`idOpinion` ,
`opinionComentario` ,
`idUsuario` ,
`idEmpresaTransporte` ,
`numeroLikes` ,
`numeroDislikes` ,
`fecha`
)
VALUES (
NULL , 'Me parece una empresa responsable y muy puntual con sus horarios', '2', '1', '12', '3', '19-09-15'
);

SELECT *
FROM empresatransporte e
INNER JOIN sucursalempresatransporte s ON s.idempresatransporte = e.idempresatransporte
LIMIT 0 , 30

ALTER TABLE `opinion` CHANGE `estrellas` `estrellas` DECIMAL( 2, 1 ) NOT NULL

ALTER TABLE `empresatransporte` DROP `califiacionGeneral`

INSERT INTO `turisteando`.`usuario` (`idUsuario`, `nombre`, `apellido`, `telefono`, `password`, `correo`) VALUES ('3', 'Luis', 'abc', '45454545', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'luis@turisteando.com');

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_prom_calificacion`(idEmpresa int)
BEGIN
  UPDATE sucursalempresatransporte s
    SET s.calificacion = 
        (
      SELECT AVG( estrellas ) AS promedio
      FROM opinion o
      inner join empresatransporte e on e.idEmpresaTransporte=o.idEmpresaTransporte
      where e.idEmpresaTransporte=idEmpresa
        );
END

INSERT INTO `turisteando`.`opinion` (

`idOpinion` ,
`opinionComentario` ,
`idUsuario` ,
`idEmpresaTransporte` ,
`numeroLikes` ,
`numeroDislikes` ,
`fecha` ,
`estrellas`
)
VALUES (
NULL , 'Prueba3', '3', '1', '0', '0', '19-09-15', '4'
);

CREATE TABLE IF NOT EXISTS `destino` (
  `idDestino` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idDestino`)
);

CREATE TABLE IF NOT EXISTS `destinoXempresa` (
  `idDestino` int(11) NOT NULL,
  `idEmpresa` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idDestino`)
);

 ALTER TABLE destinoXempresa ADD FOREIGN KEY (idDestino) REFERENCES destino (idDestino) ;
 ALTER TABLE destinoXempresa ADD FOREIGN KEY (idEmpresa) REFERENCES empresatransporte (idEmpresaTransporte) ;