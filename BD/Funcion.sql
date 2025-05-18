DELIMITER $$
CREATE FUNCTION cantidad_articulos_usuario(email VARCHAR(100))
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE cantidad INT;
    SELECT COUNT(*) INTO cantidad
    FROM articulo
    WHERE contacto_autor = email;
    RETURN cantidad;
END $$
DELIMITER ;