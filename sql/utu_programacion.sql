CREATE DATABASE utu_programacion;
USE utu_programacion;

CREATE TABLE niveles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    nivel ENUM('basico', 'intermedio', 'avanzado') NOT NULL
);

CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    horas INT,
    fechaInicio DATE,
    nivelId INT,
    FOREIGN KEY (nivelId) REFERENCES niveles(id)
);
