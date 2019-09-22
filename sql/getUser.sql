DROP PROCEDURE IF EXISTS getUser;
DELIMITER $$
CREATE PROCEDURE getUser(
		IN pc_idUser 		INTEGER,
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET pcMensaje :='';

	/*Comprobando que la contraseña no sea null:*/
	IF pc_idUser = 0 OR pc_idUser IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id usuario ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para obtener al usuario:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUser;

	IF vn_existeUsuario = 0 THEN
		SET pcMensaje := CONCAT('No existe el usuario ',pc_idUser);
	END IF;

	IF pcMensaje = '' THEN
		SELECT nombre, apellido, telefono, correo, imagenPerfil FROM usuario
		WHERE usuario.idUsuario = pc_idUser;
		SET pbOcurreError :=0;
		SET pcMensaje :='Todo bien';
	END IF;
END $$
DELIMITER ;
