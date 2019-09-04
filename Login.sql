DROP PROCEDURE IF EXISTS Funcion_Login_Cliente;
DELIMITER $$
CREATE PROCEDURE Funcion_Login_Cliente(
		IN pc_usuario 		VARCHAR(45),
		IN pc_userPassword 	VARCHAR(45),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vn_existePassword 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	/*Comprobando que el nombreUsuario de usuario no sea null:*/
	IF pc_usuario = '' OR pc_usuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'usuario, ');
	END IF;

	/*Comprobando que la contraseña no sea null:*/
	IF pc_userPassword = '' OR pc_userPassword IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'contraseña, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.nombreUsuario = pc_usuario OR usuario.correo = pc_usuario;

	IF vn_existeUsuario = 0 THEN
		SET pcMensaje := CONCAT('No existe el usuario ',pc_usuario);
	END IF;

	IF vn_existeUsuario = 1 THEN
		SELECT COUNT(*) INTO vn_existePassword FROM usuario
		WHERE usuario.nombreUsuario = pc_usuario AND usuario.password = pc_userPassword;

		IF vn_existePassword <> 1 THEN
			SET pcMensaje := 'Password incorrecta';
		END IF;
	END IF;

	IF vn_existeUsuario = 1 AND vn_existePassword = 1 THEN
		SET pcMensaje := 'Usuario y contraseña correctos';
		SET pbOcurreError:=FALSE;
	END IF;
END $$
DELIMITER ;