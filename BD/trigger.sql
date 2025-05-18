DELIMITER $$
CREATE TRIGGER borrar_articulo_usario
AFTER DELETE ON usuario
FOR EACH ROW
BEGIN
    DELETE FROM articulo WHERE contacto_autor = OLD.Email_usuario;
END$$
DELIMITER ;