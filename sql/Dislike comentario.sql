DROP PROCEDURE IF EXISTS Funcion_DislikeComentario;
DELIMITER $$
CREATE PROCEDURE Funcion_DislikeComentario(
		IN pc_idUsuario			INTEGER,
		IN pc_idComentario			INTEGER,
		OUT pc_numLikes		INTEGER,
		OUT pc_numDislikes	INTEGER,
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeUsuario 	INTEGER DEFAULT 0;
	DECLARE vn_existeComentario 	INTEGER DEFAULT 0;
	DECLARE vn_existeDislike INTEGER;
	DECLARE vn_existeLike INTEGER;

	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el idusuario no sea null:*/
	IF pc_idUsuario = 0 OR pc_idUsuario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idusuario, ');
	END IF;

	/*Comprobando que el idComentario no sea null:*/
	IF pc_idComentario = 0 OR pc_idComentario IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idComentario, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeUsuario FROM Usuario
	WHERE usuario.idUsuario = pc_idUsuario;

	SELECT COUNT(*) INTO vn_existeComentario FROM comentarioBlog
	WHERE comentarioBlog.idComentarioBlog = pc_idComentario;

	IF vn_existeUsuario <>1 THEN
		SET pcMensaje := CONCAT('Usuario con id ', pc_idUsuario, ' no existe');
	END IF;

	IF vn_existeComentario <>1 THEN
		SET pcMensaje := CONCAT('Comentario con id ', pc_idComentario, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		SELECT COUNT(*) INTO vn_existeLike FROM likeComentario
		WHERE likeComentario.idComentarioBlog = pc_idComentario AND likeComentario.idUsuario = pc_idUsuario;
		SELECT COUNT(*) INTO vn_existeDislike FROM dislikeComentario
		WHERE dislikeComentario.idComentarioBlog = pc_idComentario AND dislikeComentario.idUsuario = pc_idUsuario;
		IF vn_existeLike > 0 THEN
			DELETE FROM likeComentario WHERE likeComentario.idComentarioBlog = pc_idComentario AND likeComentario.idUsuario = pc_idUsuario;
		END IF;
		IF vn_existeDislike = 0 THEN
			INSERT INTO dislikeComentario(idComentarioBlog, idUsuario)
				VALUES(pc_idComentario, pc_idUsuario);
				SET pcMensaje := 'Marcado como no favorito';
		ELSE
			SET pcMensaje := 'Ya lo has marcado como no favorito antes';
		END IF;
		SET pbOcurreError:=FALSE;
		SELECT COUNT(*) INTO pc_numLikes FROM likeComentario WHERE likeComentario.idComentarioBlog = pc_idComentario;
		SELECT COUNT(*) INTO pc_numDislikes FROM dislikeComentario WHERE dislikeComentario.idComentarioBlog = pc_idComentario;

		COMMIT;
	END IF;
END $$
DELIMITER ;
