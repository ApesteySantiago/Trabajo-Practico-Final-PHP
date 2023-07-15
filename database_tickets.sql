CREATE DATABASE db_tickets;

USE db_tickets;

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    correo VARCHAR(50),
    cantidad INT,
    categoria VARCHAR(50)
);
