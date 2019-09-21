DROP PROCEDURE IF EXISTS Funcion_Crear_blog;
DELIMITER $$
CREATE PROCEDURE Funcion_Crear_blog(
		IN pc_idUsuario			INTEGER,
		IN pc_nombre				VARCHAR(50),
		IN pc_descripcion 	VARCHAR(100),
		IN pc_imagenPerfil		VARCHAR(250),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vd_fecha DATE;
	DECLARE vv_imagen VARCHAR(250) DEFAULT NULL;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el id no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id invalido, ');
	END IF;

	/*Comprobando que el nombre no sea null:*/
	IF pc_nombre = '' OR pc_nombre IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'nombre, ');
	END IF;

	/*Comprobando que la descripcion no sea null:*/
	IF pc_descripcion = '' OR pc_descripcion IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'descripcion, ');
	END IF;

	/*Comprobando que la imagen no sea null:*/
	IF !(pc_imagenPerfil = '' OR pc_imagenPerfil IS NULL) THEN
		SET vv_imagen := pc_imagenPerfil;
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder crear el blog:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUsuario;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('Usuario con id ', pc_idUsuario, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		SELECT CURDATE() INTO vd_fecha;
		INSERT INTO blog (nombre, descripcion, imagenPerfil, fecha, idUsuario)
			VALUES (pc_nombre, pc_descripcion, vv_imagen, vd_fecha, pc_idUsuario);
		SET pcMensaje := 'Blog creado con exito';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
