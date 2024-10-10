CREATE DATABASE db_escuelaJ23;
USE db_escuelaJ23;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    apellido_usuario VARCHAR(50) NOT NULL,
    username_usuario VARCHAR(20) NOT NULL UNIQUE,
    password_usuario CHAR(64) NOT NULL,
    tipo_usuario ENUM('alumno', 'docente', 'conserjeria') NOT NULL,
    DNI_usuario CHAR(9) NOT NULL,
    correo_usuario VARCHAR(50) NOT NULL UNIQUE
);

-- Insercion para conserjería
INSERT INTO usuarios (nombre_usuario, apellido_usuario, username_usuario, password_usuario, tipo_usuario, DNI_usuario, correo_usuario) VALUES
('Christian', 'Monrabal', 'cmonrabal', SHA2('qweQWE123', 256), 'conserjeria', '12345678A', 'cmonrabal@j23.edu'),
('Juan Carlos', 'Prado', 'jcprado', SHA2('qweQWE123', 256), 'conserjeria', '87654321B', 'jcprado@j23.edu'),
('Daniel', 'Becerra', 'dbecerra', SHA2('qweQWE123', 256), 'conserjeria', '45678901C', 'dbecerra@j23.edu'),
('Sergi', 'Masip', 'smasip', SHA2('qweQWE123', 256), 'conserjeria', '32165498D', 'smasip@j23.edu');

-- Insercion para docentes
INSERT INTO usuarios (nombre_usuario, apellido_usuario, username_usuario, password_usuario, tipo_usuario, DNI_usuario, correo_usuario) VALUES
('Agnes', 'Plans', 'aplans', SHA2('asdASD123', 256), 'docente', '65432178E', 'aplans@j23.edu'),
('Alberto', 'Desantos', 'adesantos', SHA2('asdASD123', 256), 'docente', '98765432F', 'adesantos@j23.edu'),
('Fatima', 'Martinez', 'fmartinez', SHA2('asdASD123', 256), 'docente', '34567890G', 'fmartinez@j23.edu');

-- Inserciones para alumnos
INSERT INTO usuarios (nombre_usuario, apellido_usuario, username_usuario, password_usuario, tipo_usuario, DNI_usuario, correo_usuario) VALUES
('Javier', 'Gonzalez', 'jgonzalez', SHA2('zxcZXC123', 256), 'alumno', '13579246H', 'jgonzalez@j23.edu'),
('Laura', 'Ruiz', 'lruiz', SHA2('zxcZXC123', 256), 'alumno', '24681357I', 'lruiz@j23.edu'),
('Pedro', 'Lopez', 'plopez', SHA2('zxcZXC123', 256), 'alumno', '35792468J', 'plopez@j23.edu');

select * from usuarios;