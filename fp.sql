CREATE DATABASE IF NOT EXISTS FP;
USE FP;


CREATE TABLE IF NOT EXISTS Modulos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Departamento VARCHAR(255) NOT NULL,
    Nomenclatura VARCHAR(50) NOT NULL
);

-- Insertar más módulos en la base de datos
INSERT INTO Modulos (Nombre, Departamento, Nomenclatura) VALUES
('Desarrollo de Aplicaciones Multiplataforma', 'Informática', 'INF104'),
('Ciberseguridad', 'Informática', 'INF105'),
('Inteligencia Artificial', 'Informática', 'INF106'),
('Análisis de Datos', 'Informática', 'INF107'),
('Diseño de Interfaces Web', 'Informática', 'INF108'),

('Electrónica Digital', 'Electrónica', 'ELE202'),
('Robótica y Automatización', 'Electrónica', 'ELE203'),
('Sistemas Embebidos', 'Electrónica', 'ELE204'),
('Telecomunicaciones', 'Electrónica', 'ELE205'),
('Internet de las Cosas (IoT)', 'Electrónica', 'ELE206'),

('Contabilidad y Finanzas', 'Administración', 'ADM202'),
('Marketing Digital', 'Administración', 'ADM203'),
('Gestión de Recursos Humanos', 'Administración', 'ADM204'),
('Emprendimiento e Innovación', 'Administración', 'ADM205'),
('Logística y Distribución', 'Administración', 'ADM206'),

('Automatización Industrial', 'Mecatrónica', 'MEC301'),
('Mantenimiento Industrial', 'Mecatrónica', 'MEC302'),
('Ingeniería de Materiales', 'Mecatrónica', 'MEC303'),
('Energías Renovables', 'Mecatrónica', 'MEC304'),
('Dibujo Técnico Asistido por Ordenador (CAD)', 'Mecatrónica', 'MEC305'),

('Producción Audiovisual', 'Comunicación', 'COM401'),
('Diseño Gráfico', 'Comunicación', 'COM402'),
('Fotografía Profesional', 'Comunicación', 'COM403'),
('Animación 3D y Efectos Visuales', 'Comunicación', 'COM404'),
('Edición y Postproducción de Video', 'Comunicación', 'COM405');


CREATE TABLE IF NOT EXISTS Noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    enlace VARCHAR(500) NOT NULL,
    fecha DATETIME NOT NULL
);