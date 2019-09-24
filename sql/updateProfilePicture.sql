DROP PROCEDURE IF EXISTS updateProfilePicture;
DELIMITER $$
CREATE PROCEDURE updateProfilePicture(
		IN pc_idUsuario			INTEGER,
		IN pc_imagenPerfil		VARCHAR(250),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el id no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id invalido, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para actualizar la foto:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUsuario;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('Usuario con id ', pc_idUsuario, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;

		UPDATE usuario SET imagenPerfil = pc_imagenPerfil WHERE usuario.idUsuario = pc_idUsuario;
		SET pcMensaje := 'Actualizado con exito';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
