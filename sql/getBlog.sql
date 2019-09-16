DROP PROCEDURE IF EXISTS getBlog;
DELIMITER $$
CREATE PROCEDURE getBlog(
		IN pc_idBlog 		INTEGER,
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeBlog 	INTEGER DEFAULT 0;

	SET pbOcurreError :=TRUE;
	SET pcMensaje :='';

	/*Comprobando que la contraseña no sea null:*/
	IF pc_idBlog = 0 OR pc_idBlog IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'id blog ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeBlog FROM Usuario
	WHERE usuario.idUsuario = pc_idBlog;

	IF vn_existeBlog = 0 THEN
		SET pcMensaje := CONCAT('No existe el blog ',pc_idBlog);
	END IF;

	IF pcMensaje = '' THEN
		SELECT blog.idBlog, blog.nombre, blog.descripcion, blog.imagenPerfil, blog.fecha, usuario.idUsuario, usuario.nombre, usuario.apellido FROM blog
		INNER JOIN usuario ON blog.idUsuario = usuario.idUsuario
		WHERE blog.idBlog = pc_idBlog;

		SET pbOcurreError := FALSE;
		SET pcMensaje :='Todo bien';
	END IF;
END $$
DELIMITER ;
