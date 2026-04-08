-- Estructura de la Base de Datos para el Sistema de Campus
-- Tablas Principales compatibles con SQLite / Room

-- Usuarios: Almacena las credenciales y el perfil del usuario (Estudiante, Docente o Trabajador)
CREATE TABLE IF NOT EXISTS Usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,  -- Hash de la contraseña
    email TEXT UNIQUE NOT NULL,
    perfil TEXT NOT NULL CHECK(perfil IN ('Estudiante', 'Docente', 'Trabajador')),
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Documentos: Registra la información guardada, ya sean resúmenes, guiones o presentaciones generadas
CREATE TABLE IF NOT EXISTS Documentos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario_id INTEGER NOT NULL,
    tipo TEXT NOT NULL CHECK(tipo IN ('resumen', 'guion', 'presentacion')),
    titulo TEXT NOT NULL,
    contenido TEXT NOT NULL,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);

-- Herramientas: Catálogo de aplicaciones recomendadas (Canva, CapCut, etc.) categorizadas por tarea
CREATE TABLE IF NOT EXISTS Herramientas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    descripcion TEXT,
    categoria TEXT,
    url TEXT,
    tarea TEXT  -- Tipo de tarea que soporta
);

-- Historial_Recomendaciones: Registro de qué herramientas ha consultado cada usuario para personalizar futuras sugerencias
CREATE TABLE IF NOT EXISTS Historial_Recomendaciones (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario_id INTEGER NOT NULL,
    herramienta_id INTEGER NOT NULL,
    fecha_consulta DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (herramienta_id) REFERENCES Herramientas(id) ON DELETE CASCADE
);

-- Índices recomendados para mejorar consultas en Room
CREATE INDEX IF NOT EXISTS idx_documentos_usuario ON Documentos(usuario_id);
CREATE INDEX IF NOT EXISTS idx_historial_usuario ON Historial_Recomendaciones(usuario_id);
CREATE INDEX IF NOT EXISTS idx_historial_herramienta ON Historial_Recomendaciones(herramienta_id);

-- Relaciones:
-- Usuarios  Documentos (1:N): Un usuario puede crear y guardar múltiples documentos, pero cada documento pertenece a un único autor.
-- Usuarios  Historial_Recomendaciones (1:N): Permite rastrear qué herramientas han sido sugeridas a un usuario específico.
-- Herramientas  Historial_Recomendaciones (1:N): Una herramienta puede aparecer en muchos registros de recomendaciones para distintos usuarios.
