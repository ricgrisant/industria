DROP PROCEDURE IF EXISTS passwordChange;
DELIMITER $$
CREATE PROCEDURE passwordChange(
		IN pc_idUser	INTEGER,
		IN pc_userPassword 	VARCHAR(50),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que la contraseña no sea null:*/
	IF pc_userPassword = '' OR pc_userPassword IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'contraseña, ');
	END IF;

	/*Comprobando que el id no sea null:*/
	IF pc_idUser = '' OR pc_idUser IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id usuario, ');
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUser;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('- Usuario no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;

		UPDATE usuario SET password = pc_userPassword WHERE idUsuario = pc_idUser;
		SET pcMensaje := 'Cambió su contraseña';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
