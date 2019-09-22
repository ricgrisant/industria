DROP PROCEDURE IF EXISTS getBlogs;
DELIMITER $$
CREATE PROCEDURE getBlogs(
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
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUser;

	IF vn_existeUsuario = 0 THEN
		SET pcMensaje := CONCAT('No existe el usuario ',pc_idUser);
	END IF;

	IF pcMensaje = '' THEN
		SELECT idBlog, nombre, descripcion, imagenPerfil, fecha, idUsuario FROM blog
		WHERE blog.idUsuario = pc_idUser
		ORDER BY idBlog;
	END IF;
END $$
DELIMITER ;
