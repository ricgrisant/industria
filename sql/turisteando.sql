-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-08-2019 a las 16:53:00
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turisteando`
--
-- --------------------------------------------------------
-- Estructura de tabla para la tabla `usuario`
--
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(50 ) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagenPerfil` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE usuario ADD CONSTRAINT uq_correo UNIQUE(correo);
ALTER TABLE usuario ADD CONSTRAINT uq_telefono UNIQUE(telefono);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresatransporte`
--

DROP TABLE IF EXISTS `empresatransporte`;
CREATE TABLE IF NOT EXISTS `empresatransporte` (
  `idEmpresaTransporte` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `imagenPerfil` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE empresatransporte
  ADD CONSTRAINT `fk_idRepresentante`
  FOREIGN KEY (idRepresentante)
  REFERENCES usuario(idUsuario);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `sucursalempresatransporte`
--

DROP TABLE IF EXISTS `sucursalempresatransporte`;
CREATE TABLE IF NOT EXISTS `sucursalempresatransporte` (
  `idSucursal` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ubicacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `horaApertura` time NOT NULL,
  `horaCierre` time NOT NULL,
  `idEmpresaTransporte` int(11) NOT NULL,
  `calificacion` decimal(1,0) NOT NULL,
  `imagenPerfil` varchar(250) COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE sucursalempresatransporte
  ADD CONSTRAINT `fk_idEmpresaTransporte_Sucursal`
  FOREIGN KEY (idEmpresaTransporte)
  REFERENCES empresatransporte(idEmpresaTransporte);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `idHorario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idSucursal` int(11) NOT NULL ,
  `idSucursalDestino` int(11) NOT NULL,
  `horaSalida` int(11) NOT NULL,
  `horaDestinoAprox` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE horario
  ADD CONSTRAINT `fk_sucursalSalida`
  FOREIGN KEY (idSucursal)
  REFERENCES sucursalempresatransporte(`idSucursal`);
ALTER TABLE horario
  ADD CONSTRAINT `fk_sucursalDestino`
  FOREIGN KEY (idSucursalDestino)
  REFERENCES sucursalempresatransporte(`idSucursal`);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `planpublicitario`
--

DROP TABLE IF EXISTS `planpublicitario`;
CREATE TABLE IF NOT EXISTS `planpublicitario` (
  `idPlan` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `duracionDias` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tipopago`
--

DROP TABLE IF EXISTS `tipopago`;
CREATE TABLE IF NOT EXISTS `tipopago` (
  `idTipoPago` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `idPago` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idTipoPago` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `idEmpresaTransporte` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE pago
  ADD CONSTRAINT `fk_idTipoPago_pago`
  FOREIGN KEY (idTipoPago)
  REFERENCES tipopago(`idTipoPago`);
ALTER TABLE pago
  ADD CONSTRAINT `fk_idPlan_pago`
  FOREIGN KEY (idPlan)
  REFERENCES planpublicitario(`idPlan`);
ALTER TABLE pago
  ADD CONSTRAINT `fk_idEmpresa_Pago`
  FOREIGN KEY (idEmpresaTransporte)
  REFERENCES empresaTransporte(`idEmpresaTransporte`);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `publicidad`
--

DROP TABLE IF EXISTS `publicidad`;
CREATE TABLE IF NOT EXISTS `publicidad` (
  `idPublicidad` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idEmpresa` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `imagen` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE publicidad
  ADD CONSTRAINT `fk_idEmpresa_Publicidad`
  FOREIGN KEY (idEmpresa)
  REFERENCES empresaTransporte(`idEmpresa`);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdmin` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE administrador
  ADD CONSTRAINT `fk_idUsuario`
  FOREIGN KEY (idUsuario)
  REFERENCES usuario(`idUsuario`);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `opinion`
--
DROP TABLE IF EXISTS `opinion`;
CREATE TABLE IF NOT EXISTS `opinion` (
  `idOpinion` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `opinionComentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEmpresaTransporte` int(11) NOT NULL,
  `numeroLikes` int(11) NOT NULL DEFAULT '0',
  `numeroDislikes` int(11) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE opinion
  ADD CONSTRAINT `fk_idUsuario_opinion`
  FOREIGN KEY (idUsuario)
  REFERENCES usuario(`idUsuario`);
ALTER TABLE opinion
  ADD CONSTRAINT `fk_idEmpresa_opinion`
  FOREIGN KEY (idEmpresaTransporte)
  REFERENCES empresaTransporte(`idEmpresaTransporte`);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `blog`
--
DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `idBlog` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `imagenPerfil` varchar(250) COLLATE utf8_unicode_ci,
  `fecha` date NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE blog
  ADD CONSTRAINT `fk_idUsuario_blog`
  FOREIGN KEY (idUsuario)
  REFERENCES usuario(`idUsuario`);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentarioBlog`;
CREATE TABLE IF NOT EXISTS `comentarioBlog` (
  `idComentarioBlog` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idBlog` int(11) NOT NULL,
  `comentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numeroLikes` int(11) NOT NULL DEFAULT '0',
  `numeroDislikes` int(11) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE comentarioBlog
  ADD CONSTRAINT `fk_idUsuario_comentarioBlog`
  FOREIGN KEY (idUsuario)
  REFERENCES usuario(`idUsuario`);
ALTER TABLE comentarioBlog
  ADD CONSTRAINT `fk_idBlog_comentarioBlog`
  FOREIGN KEY (idBlog)
  REFERENCES blog(`idBlog`);

-- --------------------------------------------------------

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
