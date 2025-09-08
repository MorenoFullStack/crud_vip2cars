-- 1. Crear la base de datos
CREATE DATABASE EncuestasAnonimasDB;
GO

-- 2. Usar la base de datos
USE EncuestasAnonimasDB;
GO

-- 3. Tabla de Encuestas
CREATE TABLE Encuestas (
    id INT IDENTITY(1,1) PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha_creacion DATETIME DEFAULT GETDATE(),
    estado VARCHAR(20) DEFAULT 'activa',
    fecha_inicio DATETIME,
    fecha_cierre DATETIME NULL,
    tipo_encuesta VARCHAR(50)
);
GO

-- 4. Tabla de Preguntas
CREATE TABLE Preguntas (
    id INT IDENTITY(1,1) PRIMARY KEY,
    encuesta_id INT,
    pregunta TEXT NOT NULL,
    tipo_respuesta VARCHAR(50),
    es_obligatoria BIT DEFAULT 1,
    FOREIGN KEY (encuesta_id) REFERENCES Encuestas(id)
);
GO

-- 5. Tabla de Opciones de Respuesta
CREATE TABLE OpcionesRespuestas (
    id INT IDENTITY(1,1) PRIMARY KEY,
    pregunta_id INT,
    opcion TEXT NOT NULL,
    FOREIGN KEY (pregunta_id) REFERENCES Preguntas(id)
);
GO

-- 6. Tabla de Participantes
CREATE TABLE Participantes (
    id INT IDENTITY(1,1) PRIMARY KEY,
    encuesta_id INT,
    fecha_participacion DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (encuesta_id) REFERENCES Encuestas(id)
);
GO

-- 7. Tabla de Respuestas de los Participantes
CREATE TABLE RespuestasParticipante (
    id INT IDENTITY(1,1) PRIMARY KEY,
    participante_id INT,
    pregunta_id INT,
    respuesta TEXT NOT NULL,
    FOREIGN KEY (participante_id) REFERENCES Participantes(id),
    FOREIGN KEY (pregunta_id) REFERENCES Preguntas(id)
);
GO

-- 8. Tabla de Auditoria
CREATE TABLE Auditoria (
    id INT IDENTITY(1,1) PRIMARY KEY,
    accion VARCHAR(255),
    fecha_accion DATETIME DEFAULT GETDATE(),
    usuario VARCHAR(255),
    id_registro_afectado INT,
    tabla_afectada VARCHAR(255)
);
GO

-- 9. Tabla de Categorias
CREATE TABLE Categorias (
    id INT IDENTITY(1,1) PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT
);
GO

-- Relacionar la tabla de Encuestas con Categorias
ALTER TABLE Encuestas ADD categoria_id INT;
ALTER TABLE Encuestas ADD FOREIGN KEY (categoria_id) REFERENCES Categorias(id);
GO
