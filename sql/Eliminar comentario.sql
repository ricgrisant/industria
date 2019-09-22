DROP PROCEDURE IF EXISTS Funcion_Eliminar_Comentario;
DELIMITER $$
CREATE PROCEDURE Funcion_Eliminar_Comentario(
		IN pc_idCom			INTEGER,
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	DECLARE temMensaje 			VARCHAR(1000);
	DECLARE vn_existeCom 	INTEGER DEFAULT 0;


	SET pbOcurreError :=TRUE;
	SET temMensaje := '';
	SET pcMensaje := '';

	/*Comprobando que el idCom no sea null:*/
	IF pc_idCom = 0 OR pc_idCom IS NULL THEN
		SET temMensaje := CONCAT(temMensaje,'idblog, ');
	END IF;

	IF temMensaje<>'' THEN
		SET pcMensaje := CONCAT('Campos requeridos para poder realizar la matrícula:',temMensaje);
	END IF;

	SELECT COUNT(*) INTO vn_existeCom FROM comentarioBlog
	WHERE comentarioBlog.idComentarioBlog = pc_idCom;

	IF vn_existeCom <>1 THEN
		SET pcMensaje := CONCAT('Comentario con id ', pc_idCom, ' no existe');
	END IF;

	IF pcMensaje = '' THEN
		SET autocommit = 0;
		DELETE FROM comentarioBlog WHERE comentarioBlog.idComentarioBlog = pc_idCom;
		DELETE FROM likeComentario WHERE likeComentario.idComentarioBlog = pc_idCom;
		DELETE FROM dislikeComentario WHERE dislikeComentario.idComentarioBlog = pc_idCom;
		COMMIT;
		SET pcMensaje := 'Comentario eliminado con exito';
		SET pbOcurreError:=FALSE;

	END IF;
END $$
DELIMITER ;
