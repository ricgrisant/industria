DROP PROCEDURE IF EXISTS getBlog_Comments;
DELIMITER $$
CREATE PROCEDURE getBlog_Comments(
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
		SELECT COUNT(*) FROM likeComentario
		INNER JOIN comentarioBlog ON likeComentario.idComentarioBlog = comentarioBlog.idComentarioBlog
		WHERE comentarioBlog.idBlog = pc_idBlog;
	END IF;
END $$
DELIMITER ;
