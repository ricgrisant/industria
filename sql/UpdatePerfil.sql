DROP PROCEDURE IF EXISTS Funcion_UpdatePerfil;
DELIMITER $$
CREATE PROCEDURE Funcion_UpdatePerfil(
		IN pc_idUsuario			INTEGER,
		IN pc_nombre 		VARCHAR(50),
		IN pc_apellido	 	VARCHAR(50),
		IN pc_telefono		VARCHAR(50),
		IN pc_correo		VARCHAR(50),
		IN pc_imagenPerfil		VARCHAR(250),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN,
		OUT pc_nombre_Nuevo	VARCHAR(50),
		OUT pc_apellido_Nuevo	VARCHAR(50),
		OUT pc_telefono_Nuevo	VARCHAR(50),
		OUT pc_correo_Nuevo		VARCHAR(50),
		OUT pc_imagenPerfil_Nuevo	VARCHAR(250)
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeCorreo 	INTEGER DEFAULT 0;
	DECLARE vn_existeTelefono 	INTEGER DEFAULT 0;
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vd_fecha			DATE;

	DECLARE optionalImage		VARCHAR(250);

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';
	SET optionalImage := "images\Profile-null.png";

	/*Comprobando que el id no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id invalido, ');
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

	/*Comprobando que la imagen:*/
	IF !(pc_imagenPerfil = '' OR pc_imagenPerfil IS NULL) THEN
		SET optionalImage := pc_imagenPerfil;
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
		UPDATE usuario SET correo = pc_correo, nombre = pc_nombre, apellido = pc_apellido,
		telefono = pc_telefono, imagenPerfil = optionalImage
		WHERE usuario.idUsuario = pc_idUsuario;
		COMMIT;
		SELECT correo, nombre, apellido, telefono, imagenPerfil INTO
			pc_correo_Nuevo, pc_nombre_Nuevo, pc_apellido_Nuevo, pc_telefono_nuevo, pc_imagenPerfil_Nuevo
			FROM usuario WHERE usuario.idUsuario = pc_idUsuario;
		SET pcMensaje := 'Usuario actualizado con exito';
		SET pbOcurreError:=FALSE;
	END IF;
END $$
DELIMITER ;
