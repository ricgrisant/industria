DROP PROCEDURE IF EXISTS getBlogsAll;
DELIMITER $$
CREATE PROCEDURE getBlogsAll(
		OUT pcMensaje 		VARCHAR(2000),
		OUT pbOcurreError 	BOOLEAN
	)

BEGIN
	SELECT blog.idBlog, blog.nombre, blog.descripcion, blog.imagenPerfil, blog.fecha, usuario.idUsuario, usuario.nombre, usuario.apellido FROM blog
	INNER JOIN usuario ON usuario.idUsuario = blog.idUsuario;
	SET pcMensaje := "Todo bien";
	SET pbOcurreError := TRUE;
END $$
DELIMITER ;
