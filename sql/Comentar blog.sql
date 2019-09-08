DROP PROCEDURE IF EXISTS Funcion_Comentar_blog;
DELIMITER $$
CREATE PROCEDURE Funcion_Comentar_blog(
		IN pc_idUsuario			INTEGER,
		IN pc_idBlog			INTEGER,
		IN pc_comentario				VARCHAR(200),
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vn_existeBlog 	INTEGER DEFAULT 0;
	DECLARE vd_fecha DATE;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el idusuario no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idusuario, ');
	END IF;

	/*Comprobando que el idblog no sea null:*/
	IF pc_idBlog = 0 OR pc_idBlog IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idblog, ');
	END IF;

	/*Comprobando que el comentario no sea null:*/
	IF pc_comentario = '' OR pc_comentario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'comentario, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUsuario;

	SELECT COUNT(*) INTO vn_existeBlog FROM blog
	WHERE blog.idBlog = pc_idBlog;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('Usuario con id ', pc_idUsuario, ' no existe');
	END IF;

	IF vn_existeBlog <>1 THEN
		SET pcMensaje := CONCAT('Blog con id ', pc_idBlog, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		SELECT CURDATE() INTO vd_fecha;
		INSERT INTO comentarioBlog (idUsuario, idBlog, comentario, fecha)
			VALUES (pc_idUsuario, pc_idBlog, pc_comentario, vd_fecha);
		/*SELECT idBlog INTO pnIdBlog FROM blog ORDER BY idBlog LIMIT 1;*/
		SET pcMensaje := 'Comentario creado con exito';
		SET pbOcurreError:=FALSE;
		COMMIT;
	END IF;
END $$
DELIMITER ;
