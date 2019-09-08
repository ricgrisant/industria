DROP PROCEDURE IF EXISTS Funcion_Editar_blog;
DELIMITER $$
CREATE PROCEDURE Funcion_Editar_blog(
		IN pc_idUsuario			INTEGER,
		IN pc_idBlog			INTEGER,
		IN pc_nombre				VARCHAR(50),
		IN pc_descripcion 	VARCHAR(100),
		IN pc_imagenPerfil		VARCHAR(250),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vn_existeBlog INTEGER DEFAULT 0;
	DECLARE vn_existeBlogUsuario INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el id no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idUsuario, ');
	END IF;

	/*Comprobando que el idBlog no sea null:*/
	IF pc_idBlog = 0 OR pc_idBlog IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idBlog, ');
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
	IF pc_imagenPerfil = '' OR pc_imagenPerfil IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'imagen, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUsuario;

	SELECT COUNT(*) INTO vn_existeBlog FROM blog
	WHERE blog.idBlog = pc_idBlog;

	SELECT COUNT(*) INTO vn_existeBlogUsuario FROM blog
	WHERE blog.idBlog = pc_idBlog AND blog.idUsuario = pc_idUsuario;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('Usuario con id ', pc_idUsuario, ' no existe');
	END IF;

	IF vn_existeBlog <>1 THEN
		SET pcMensaje := CONCAT('Blog con id ', pc_idBlog, ' no existe');
	END IF;

	IF vn_existeBlogUsuario <>1 AND vn_existeBlog = 1 THEN
		SET pcMensaje := CONCAT('Blog con id ', pc_idBlog, ' no pertenece al usuario con id ', pc_idUsuario);
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		UPDATE blog SET nombre = pc_nombre, descripcion = pc_descripcion, imagenPerfil = pc_imagenPerfil
			WHERE blog.idBlog = pc_idBlog;
		SET pcMensaje := 'Blog actualizado con exito';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
