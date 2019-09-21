DROP PROCEDURE IF EXISTS Funcion_Eliminar_Blog;
DELIMITER $$
CREATE PROCEDURE Funcion_Eliminar_Blog(
		IN pc_idBlog			INTEGER,
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN,
		OUT pvImagen VARCHAR(250)
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeBlog 	INTEGER DEFAULT 0;


	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';
	SET pvImagen := null;

	/*Comprobando que el idBlog no sea null:*/
	IF pc_idBlog = 0 OR pc_idBlog IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idblog, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar el proceso :',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeBlog FROM Blog
	WHERE blog.idBlog = pc_idBlog;

	IF vn_existeBlog <>1 THEN
		SET pcMensaje := CONCAT('Blog con id ', pc_idBlog, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		SELECT imagenPerfil INTO pvImagen FROM blog WHERE idBlog = pc_idBlog;

		DELETE FROM likeComentario WHERE idComentarioBlog IN
		(SELECT idComentarioBlog FROM comentarioBlog WHERE idBlog = pc_idBlog);

		DELETE FROM dislikeComentario WHERE idComentarioBlog IN
		(SELECT idComentarioBlog FROM comentarioBlog WHERE idBlog = pc_idBlog);

		DELETE FROM comentarioBlog WHERE idBlog = pc_idBlog;
		DELETE FROM blog WHERE idBlog = pc_idBlog;
		COMMIT;

		SET pcMensaje := 'Blog eliminado con exito';
		SET pbOcurreError:=FALSE;

	END IF;
END $$
DELIMITER ;
