DROP PROCEDURE IF EXISTS Funcion_Login;
DELIMITER $$
CREATE PROCEDURE Funcion_Login(
		IN pc_correo 		VARCHAR(45),
		IN pc_userPassword 	VARCHAR(45),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN,
		OUT pnIdUsuario	INTEGER,
		OUT pnIdAdmin		INTEGER,
		OUT pvNombre VARCHAR(50),
		OUT pvApellido VARCHAR(50),
		OUT pvTelefeno VARCHAR(40),
		OUT pvCorreo VARCHAR(50),
		OUT pvImagen VARCHAR(250),
		OUT pdFechaNacimiento DATE,
		OUT pvDireccion VARCHAR(200)
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vn_existePassword 	INTEGER DEFAULT 0;
	DECLARE vn_existeAdmin 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET pnIdUsuario := NULL;
	SET pnIdAdmin := NULL;
	SET temMensaje := '';
	SET pvNombre := NULL;
	SET pvApellido := NULL;
	SET pvTelefeno := NULL;
	SET pvCorreo := NULL;
	SET pvImagen := NULL;
	SET pdFechaNacimiento := NULL;
	SET pvDireccion := NULL;
	/*Comprobando que el nombreUsuario de usuario no sea null:*/
	IF pc_correo = '' OR pc_correo IS NULL THEN
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
	WHERE usuario.correo = pc_correo;

	IF vn_existeUsuario = 0 THEN
		SET pcMensaje := CONCAT('No existe el usuario ',pc_correo);
	END IF;

	IF vn_existeUsuario = 1 THEN
		SELECT COUNT(*) INTO vn_existePassword FROM usuario
		WHERE usuario.correo = pc_correo AND usuario.password = pc_userPassword;

		IF vn_existePassword <> 1 THEN
			SET pcMensaje := 'Password incorrecta';
		END IF;
	END IF;

	IF vn_existeUsuario = 1 AND vn_existePassword = 1 THEN
		SET pcMensaje := 'Usuario y contraseña correctos';
		SET pbOcurreError:=FALSE;
		SELECT idUsuario, nombre, apellido, telefono, correo, imagenPerfil, fechaNacimiento, direccion
		INTO pnIdUsuario,pvNombre, pvApellido, pvTelefeno, pvCorreo, pvImagen, pdFechaNacimiento, pvDireccion FROM usuario
		WHERE usuario.correo = pc_correo AND usuario.password = pc_userPassword;
		/*Checando si es administrador*/
		SELECT COUNT(*) INTO vn_existeAdmin FROM administrador
		WHERE administrador.idUsuario = pnIdUsuario;
		IF vn_existeAdmin = 1 THEN
			SELECT idAdmin INTO pnIdAdmin FROM administrador
			WHERE administrador.idUsuario = pnIdUsuario;
		END IF;
	END IF;
END $$
DELIMITER ;
