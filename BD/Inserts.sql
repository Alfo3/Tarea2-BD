-- Inserta autores (usuarios)
INSERT INTO usuario (Rut_usuario, Nombre_usuario, Email_usuario, Contrasena_usuario, Rol_usuario)
VALUES
('12345678-9', 'Juan Pérez', 'juan.perez@email.com', 'contrasena1', 'autor'),
('98765432-1', 'María López', 'maria.lopez@email.com', 'contrasena2', 'autor'),
('11223344-5', 'Carlos Ruiz', 'carlos.ruiz@email.com', 'contrasena3', 'autor');

-- Inserta artículos (contacto_autor es el email)
INSERT INTO articulo (articulo_ID, titulo, resumen, fecha_envio, contacto_autor)
VALUES
(1, 'Inteligencia Artificial en la Educación', 'Estudio sobre el impacto de la IA en procesos educativos.', '2024-05-01 10:00:00', 'juan.perez@email.com'),
(2, 'Energías Renovables en Chile', 'Análisis de la adopción de energías limpias en el país.', '2024-05-02 11:30:00', 'maria.lopez@email.com'),
(3, 'Avances en Biotecnología', 'Revisión de los últimos avances en biotecnología aplicada.', '2024-05-03 09:15:00', 'juan.perez@email.com'),
(4, 'Ciberseguridad y Privacidad', 'Desafíos actuales en la protección de datos personales.', '2024-05-04 14:45:00', 'carlos.ruiz@email.com');