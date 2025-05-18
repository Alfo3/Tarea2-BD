CREATE OR REPLACE VIEW vista_busqueda_articulos AS
SELECT
    a.articulo_ID,
    a.titulo,
    a.resumen,
    a.fecha_envio,
    a.contacto_autor,
    u.Nombre_usuario AS nombre_autor,
    u.Email_usuario AS email_autor
FROM articulo a
JOIN usuario u ON a.contacto_autor = u.Email_usuario;;