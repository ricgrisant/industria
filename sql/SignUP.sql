DROP PROCEDURE IF EXISTS Funcion_SignUp_Cliente;
DELIMITER $$
CREATE PROCEDURE Funcion_SignUp_Cliente(
		IN pc_userPassword 	VARCHAR(50),
		IN pc_nombre 		VARCHAR(50),
		IN pc_apellido	 	VARCHAR(50),
		IN pc_telefono		VARCHAR(50),
		IN pc_correo		VARCHAR(50),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeCorreo 	INTEGER DEFAULT 0;
	DECLARE vn_existeTelefono 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

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

	SELECT COUNT(*) INTO vn_existeCorreo FROM Usuario
	WHERE usuario.correo = pc_correo;

	SELECT COUNT(*) INTO vn_existeTelefono FROM Usuario
	WHERE usuario.telefono = pc_telefono;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	IF vn_existeCorreo >0 THEN
		SET pcMensaje := CONCAT('- Correo ya existe');
	END IF;

	IF vn_existeTelefono >0 THEN
		SET pcMensaje := CONCAT('- Telefono ya existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;

		INSERT INTO usuario (password, correo, nombre, apellido, telefono)
			VALUES (pc_userPassword, pc_correo, pc_nombre, pc_apellido, pc_telefono);
		SET pcMensaje := 'Usuario agregado con exito';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
