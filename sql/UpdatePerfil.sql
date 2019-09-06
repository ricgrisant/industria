DROP PROCEDURE IF EXISTS Funcion_SignUp_Cliente;
DELIMITER $$
CREATE PROCEDURE Funcion_SignUp_Cliente(
		IN pc_idUsuario			INTEGER,
		IN pc_userPassword 	VARCHAR(50),
		IN pc_nombre 		VARCHAR(50),
		IN pc_apellido	 	VARCHAR(50),
		IN pc_telefono		VARCHAR(50),
		IN pc_correo		VARCHAR(50),
		IN pc_imagenPerfil		VARCHAR(250),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeCorreo 	INTEGER DEFAULT 0;
	DECLARE vn_existeTelefono 	INTEGER DEFAULT 0;
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el id no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id invalido, ');
	END IF;

	/*Comprobando que la contraseña no sea null:*/
	IF pc_userPassword = '' OR pc_userPassword IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'contraseña, ');
	END IF;

	/*Comprobando que el nombre no sea null:*/
	IF pc_nombre = '' OR pc_nombre IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'nombre, ');
	END IF;

	/*Comprobando que el apellido no sea null:*/
	IF pc_apellido = '' OR pc_apellido IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'apellido, ');
	END IF;

	/*Comprobando que el apellido no sea null:*/
	IF pc_telefono = '' OR pc_telefono IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'telefono, ');
	END IF;

	/*Comprobando que la imagen no sea null:*/
	IF pc_imagenPerfil = '' OR pc_imagenPerfil IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'imagen, ');
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUsuario;

	SELECT COUNT(*) INTO vn_existeCorreo FROM Usuario
	WHERE usuario.correo = pc_correo AND usuario.idUsuario <> pc_idUsuario;

	SELECT COUNT(*) INTO vn_existeTelefono FROM Usuario
	WHERE usuario.telefono = pc_telefono AND usuario.idUsuario <> pc_idUsuario;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	IF vn_existeCorreo >0 THEN
		SET pcMensaje := CONCAT('- Correo ya existe');
	END IF;

	IF vn_existeTelefono >0 THEN
		SET pcMensaje := CONCAT('- Telefono ya existe');
	END IF;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('Usuario con id ', pc_idUsuario, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		UPDATE usuario SET password = pc_userPassword, correo = pc_correo, nombre = pc_nombre, apellido = pc_apellido, 
		telefono = pc_telefono, imagenPerfil = pc_imagenPerfil
		WHERE usuario.idUsuario = pc_idUsuario;
		SET pcMensaje := 'Usuario actualizado con exito';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
