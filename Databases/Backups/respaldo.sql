-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2024 a las 17:11:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `albergue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albergue`
--

CREATE TABLE `albergue` (
  `albergue_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `vacantes` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `encargado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id`, `title`, `description`, `date`, `time`, `location`) VALUES
(1, 'Reunión de Planificación', 'Reunión para planificar las próximas actividades.', '2024-09-15', '10:00:00', 'Sala de Conferencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `tipo_donacion` varchar(50) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `cuenta` varchar(255) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `vigencia` varchar(7) DEFAULT NULL,
  `productos` text DEFAULT NULL,
  `tipoRopa` varchar(255) DEFAULT NULL,
  `albergue` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`id`, `tipo_donacion`, `nombre`, `monto`, `cuenta`, `cvv`, `vigencia`, `productos`, `tipoRopa`, `albergue`, `direccion`) VALUES
(1, 'monetario', 'Juan Pérez', 150.00, '1234567890123', '456', '30/12', NULL, NULL, NULL, NULL),
(2, 'monetario', 'Ana López', 200.00, '9876543210987', '789', '15/11', NULL, NULL, NULL, NULL),
(3, 'monetario', 'Carlos Ruiz', 120.00, '4567890123456', '321', '12/24', NULL, NULL, NULL, NULL),
(4, 'monetario', 'María Fernández', 250.00, '6543210987654', '654', '08/25', NULL, NULL, NULL, NULL),
(5, 'monetario', 'Pedro Sánchez', 300.00, '3216549870321', '987', '22/11', NULL, NULL, NULL, NULL),
(6, 'monetario', 'Sofía García', 175.00, '9873214560987', '654', '05/26', NULL, NULL, NULL, NULL),
(7, 'monetario', 'Luis Martínez', 220.00, '8765432109876', '321', '09/24', NULL, NULL, NULL, NULL),
(8, 'monetario', 'Elena López', 190.00, '5432109876543', '987', '16/12', NULL, NULL, NULL, NULL),
(9, 'monetario', 'Ricardo Gómez', 230.00, '2109876543210', '678', '03/25', NULL, NULL, NULL, NULL),
(10, 'monetario', 'Gabriela Pérez', 260.00, '1098765432109', '432', '07/26', NULL, NULL, NULL, NULL),
(11, 'ropa', 'Laura González', NULL, NULL, NULL, NULL, NULL, 'Camisetas', 'Hogar Esperanza', 'Xicotepec'),
(12, 'ropa', 'Luis Rodríguez', NULL, NULL, NULL, NULL, NULL, 'Chaquetas', 'Refugio San Juan', 'Puebla'),
(13, 'ropa', 'María López', NULL, NULL, NULL, NULL, NULL, 'Pantalones', 'Albergue Esperanza', 'Veracruz'),
(14, 'ropa', 'Jorge Ramírez', NULL, NULL, NULL, NULL, NULL, 'Suéteres', 'Casa de la Esperanza', 'Tlalnepantla'),
(15, 'ropa', 'Ana Morales', NULL, NULL, NULL, NULL, NULL, 'Zapatos', 'Refugio Vida', 'Ciudad de México'),
(16, 'ropa', 'Carlos Méndez', NULL, NULL, NULL, NULL, NULL, 'Abrigos', 'Albergue San José', 'Guadalajara'),
(17, 'ropa', 'Natalia Fernández', NULL, NULL, NULL, NULL, NULL, 'Bufandas', 'Centro de Acogida', 'Monterrey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `encargado` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `telefono` int(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `edad` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`encargado`, `nombre_completo`, `telefono`, `correo`, `edad`) VALUES
(1, 'Juan Galindo', 764123321, 'juang@gmail.com', 27),
(2, 'Arturo Ramirez', 77653453, 'art54@gmail.com', 32),
(3, 'Andres Lopez', 55443355, 'Andy0302@gmal.com', 32),
(4, 'Rosa Olivares', 764102921, 'rosita@gmail.com', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL,
  `satisfaccion` enum('1','2','3','4','5') NOT NULL,
  `mejorar` varchar(250) NOT NULL,
  `comentarios` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id_encuesta`, `satisfaccion`, `mejorar`, `comentarios`) VALUES
(2, '2', 'Muy bien el servicio', 'muchas gracias por la atencion.'),
(3, '5', 'Muy bien el servicio', 'muchas gracias por la atencion.'),
(4, '5', 'Muy bien el servicio', 'muchas gracias por la atencion.'),
(5, '5', 'Muy bien el servicio', 'muchas gracias por la atencion.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `num_identificador` int(11) NOT NULL,
  `habilidades` varchar(250) NOT NULL,
  `disponibilidad` enum('tiempo completo','medio tiempo','por horas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre_completo`, `edad`, `num_identificador`, `habilidades`, `disponibilidad`) VALUES
(1, 'Idai Vargas Galindo ', 33, 5, 'Sabe cocinar muy bien.', 'medio tiempo'),
(2, 'Adrian Perez Jimenez', 47, 5, 'Sabe arreglar electrodomesticos', 'medio tiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `descripcion`, `cantidad`, `fecha_adquisicion`, `ubicacion`) VALUES
(1, 'Cobijas', 'Nos donaron un paquete de cobijas', 3, '2024-08-18', 'Xicotepec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_sin_hogar`
--

CREATE TABLE `persona_sin_hogar` (
  `persona_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `enfermedades` enum('si','no','','') NOT NULL,
  `tipo_enfermedad` varchar(50) NOT NULL,
  `familiares` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_sin_hogar`
--

INSERT INTO `persona_sin_hogar` (`persona_id`, `nombre`, `apellidos`, `curp`, `enfermedades`, `tipo_enfermedad`, `familiares`) VALUES
(3, 'Jesus', 'Ramirez', 'RALJ080305HPLFNNA', 'si', 'Gripa', 'no'),
(4, 'inosencia ', 'Mendoza', 'MEJI860622MPLFNA2', 'si', 'Presenta nauseas', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`) VALUES
(1, 'Comida Caliente'),
(2, 'Baños Completos'),
(3, 'Ropa'),
(4, 'Artículos de Limpieza'),
(5, 'Cobijas'),
(6, 'Techo Seguro'),
(7, 'Agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `nombre` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre`, `username`, `password`, `id`) VALUES
('PANESDECHOCLO', 'pancitouwu', '2233', 1),
('PANESDECHOCLO', 'pancitouwu', '2233', 2),
('Angel', 'pancitouwu', '2233', 3),
('Angel', 'admin', '1111', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` enum('admin','donante','usuario','homeless') NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasenna` blob NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estatus` enum('activo','inactivo','','') NOT NULL,
  `id_albergue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `tipo`, `correo`, `contrasenna`, `telefono`, `fecha_registro`, `estatus`, `id_albergue`) VALUES
(16, 'Juan Pérez', 'admin', 'juan.perez@example.com', 0x70617373313233, '555-1234', '2024-08-01', 'activo', 1),
(17, 'María López', 'donante', 'maria.lopez@example.com', 0x70617373313233, '555-5678', '2024-08-02', 'activo', 2),
(18, 'Carlos Ruiz', 'usuario', 'carlos.ruiz@example.com', 0x70617373313233, '555-8765', '2024-08-03', 'activo', 1),
(19, 'Ana Torres', 'homeless', 'ana.torres@example.com', 0x70617373313233, '555-4321', '2024-08-04', 'inactivo', 3),
(20, 'José García', 'admin', 'jose.garcia@example.com', 0x70617373313233, '555-6789', '2024-08-05', 'activo', 2),
(21, 'Laura Jiménez', 'donante', 'laura.jimenez@example.com', 0x70617373313233, '555-7890', '2024-08-06', 'inactivo', 1),
(22, 'Miguel Sánchez', 'usuario', 'miguel.sanchez@example.com', 0x70617373313233, '555-9876', '2024-08-07', 'activo', 3),
(23, 'Sofía Herrera', 'homeless', 'sofia.herrera@example.com', 0x70617373313233, '555-6543', '2024-08-08', 'activo', 2),
(24, 'Luis Fernández', 'admin', 'luis.fernandez@example.com', 0x70617373313233, '555-3456', '2024-08-09', 'activo', 1),
(25, 'Elena Martínez', 'donante', 'elena.martinez@example.com', 0x70617373313233, '555-4567', '2024-08-10', 'activo', 3),
(26, 'Andrés Pérez', 'usuario', 'andres.perez@example.com', 0x70617373313233, '555-7654', '2024-08-11', 'inactivo', 2),
(27, 'Valeria Ortiz', 'homeless', 'valeria.ortiz@example.com', 0x70617373313233, '555-2345', '2024-08-12', 'activo', 1),
(28, 'Roberto Díaz', 'admin', 'roberto.diaz@example.com', 0x70617373313233, '555-5674', '2024-08-13', 'activo', 3),
(29, 'Patricia Morales', 'donante', 'patricia.morales@example.com', 0x70617373313233, '555-8767', '2024-08-14', 'inactivo', 2),
(30, 'Fernando Gómez', 'usuario', 'fernando.gomez@example.com', 0x70617373313233, '555-4325', '2024-08-15', 'activo', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albergue`
--
ALTER TABLE `albergue`
  ADD PRIMARY KEY (`albergue_id`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`encargado`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id_encuesta`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona_sin_hogar`
--
ALTER TABLE `persona_sin_hogar`
  ADD PRIMARY KEY (`persona_id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `id_albergue` (`id_albergue`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albergue`
--
ALTER TABLE `albergue`
  MODIFY `albergue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `encargado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona_sin_hogar`
--
ALTER TABLE `persona_sin_hogar`
  MODIFY `persona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
