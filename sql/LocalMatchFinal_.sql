-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3309
-- Tiempo de generación: 08-12-2024 a las 06:30:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `localmatch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenidades`
--

CREATE TABLE `amenidades` (
  `id_amenidades` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `amenidades`
--

INSERT INTO `amenidades` (`id_amenidades`, `nombre`) VALUES
(1, 'Alberca'),
(2, 'Estacionamiento'),
(3, 'Jardín'),
(4, 'Mobiliario'),
(5, 'Cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Populares'),
(2, 'Alberca'),
(3, 'Infantiles'),
(4, 'Formales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `telefono`, `email`, `contraseña`) VALUES
(1, 'Ana Torres', '1255688722', 'ana.torres@example.com', '$2y$10$VbfxI7BKpjt7Ls5xomeoTO5IdEJ70v5oQpkj8d8.L7yVT1CpFLz9C'),
(2, 'Luis Fernández', '5556677889', 'luis.fernandez@example.com', '$2y$10$QJar13dIJkCvTgCUZDjfA.Y7S3LHGdi3lV5jCZrx/ArfoKdk9VHHq'),
(3, 'Sofía Herrera', '5555544333', 'sofia.herrera@example.com', '$2y$10$YczAlQzXlz8sqbkiHngYoOtAUMkuXKfAVAp60WBQwmbD4YToFDqzu'),
(4, 'Carla Martínez', '5552233445', 'carla.martinez@example.com', '$2y$10$vBRJQIMKDbiRCZFvaQZV6eqhfxrpWJcTQuqO8XqkbZ7odslzQ8uf2'),
(5, 'Ricardo Álvarez', '5559988770', 'ricardo.alvarez@example.com', '$2y$10$LE1JTRZN1aL8n54/V0sRJeXnJ3rgBc5KCWoCaaV8DDW4xNoT6ALbm'),
(6, 'Hannia', '6122290338', 'hanniamtr09@gmail.com', '$2y$10$4GcxhoY2S4s8KM1mXqUTGev8bL7IG4SGQmEZR/1lWDK9CpCA8N8cu'),
(8, 'Ana', '1231231231', 'ana.torres@gmail.com', '$2y$10$c8tRc6NOL1wPEHmQyV9jie0sFYkBf9tQBVCpCeiP3dKOrprKrU.Cy'),
(9, 'Abi', '1231231231', 'abi@gmail.com', '$2y$10$LuKPDQJHikz.d7z7j9s1I.lTWNMU8Te4.Xhbv89EMiMSYWNTPXoIq'),
(15, 'Blanca Margarita', '6122290338', 'rostmar@hotmail.com', '$2y$10$DH37vYReF0pqNfqr1KhBQ.JVHBsoslXMROsv/Zn6rX4SvztRzGgNS'),
(16, '                       ddd', '1231231232', 'asdasda@mail.com', '$2y$10$FW1V0UuKmd/xbSSZ0KucZODhCmYxAqeJrou4YMLN88dJ3xxxroZo.'),
(17, 'test', '1212223334', 'test@mail.com', '$2y$10$PYN4y8vyAJP7sDU/vnjBMOEPTclbk3vbkqHyd/Mwb9EcHEuH/ZOCG'),
(18, 'Bibi', '1234567891', 'abi@hotmail.com', '$2y$10$cikRApww7LOln35LIPuNwe9PqHb28ztOqO6ZPMepsEBoXYTSjliDO'),
(19, 'Bibianita', '1478523698', 'bibi@gmail.com', '$2y$10$3Xm.zQLprunAhqiR./DB/ObZDKB2548nKeL8WbLRpRiMr1mMvz5kO'),
(20, 'prueba', '1234561236', 'prueba@gmail.com', '$2y$10$UzqZKkHy7PjgGpZO3KxjvOQxI44ZZxM8Ny3m9JW01WhwFF91S0SOi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_local`, `id_cliente`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario_precio` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `dia_inicio` varchar(15) NOT NULL,
  `dia_fin` varchar(15) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario_precio`, `id_local`, `dia_inicio`, `dia_fin`, `hora_inicio`, `hora_fin`, `precio`) VALUES
(1, 1, '2', '6', '08:00:00', '18:00:00', 5000.00),
(2, 1, '7', '1', '09:00:00', '20:00:00', 6000.00),
(3, 2, '2', '6', '10:00:00', '18:00:00', 7500.00),
(4, 2, '7', '1', '09:00:00', '22:00:00', 8500.00),
(5, 3, '2', '6', '12:00:00', '20:00:00', 6000.00),
(6, 4, '2', '6', '10:00:00', '18:00:00', 4000.00),
(7, 4, '7', '1', '09:00:00', '20:00:00', 4500.00),
(8, 5, '2', '6', '09:00:00', '18:00:00', 10000.00),
(9, 5, '7', '1', '08:00:00', '22:00:00', 12000.00),
(10, 3, '7', '1', '12:00:00', '21:00:00', 7200.00),
(11, 6, '2', '6', '14:00:00', '21:00:00', 12200.00),
(12, 6, '7', '1', '14:00:00', '24:00:00', 146000.00),
(13, 7, '2', '6', '12:00:00', '20:00:00', 4000.00),
(14, 7, '7', '1', '14:00:00', '21:00:00', 5100.00),
(15, 8, '2', '6', '10:00:00', '18:00:00', 13000.00),
(16, 8, '7', '1', '12:00:00', '20:00:00', 15000.00),
(17, 9, '2', '5', '12:00:00', '20:00:00', 4000.00),
(19, 10, '2', '3', '12:00:00', '20:00:00', 5500.00),
(20, 10, '4', '6', '12:00:00', '20:00:00', 6800.00),
(21, 10, '7', '1', '12:00:00', '21:00:00', 7500.00),
(22, 9, '6', '1', '12:00:00', '20:00:00', 4800.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicación` varchar(255) DEFAULT NULL,
  `capacidad_maxima` int(11) DEFAULT NULL,
  `precio_base` decimal(10,2) NOT NULL,
  `precio_hora_extra` decimal(10,2) DEFAULT NULL,
  `descripción` text DEFAULT NULL,
  `propietario_id` int(11) DEFAULT NULL,
  `promedio_calificacion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id_local`, `nombre`, `ubicación`, `capacidad_maxima`, `precio_base`, `precio_hora_extra`, `descripción`, `propietario_id`, `promedio_calificacion`) VALUES
(1, 'Salón Fiesta Bonita', 'Calle 123, Ciudad X', 100, 5000.00, 500.00, 'Un salón elegante con todas las comodidades para eventos sociales.', 1, 4.50),
(2, 'Jardín Los Pinos', 'Av. Principal 45, Ciudad Y', 200, 7500.00, 800.00, 'Espacio al aire libre ideal para bodas y eventos grandes.', 2, 5.00),
(3, 'Salón Las Estrellas', 'Calle Luna 89, Ciudad Z', 120, 6000.00, 700.00, 'Salón moderno y bien equipado para eventos sociales.', 3, 4.00),
(4, 'Fiesta Kids', 'Calle Niños 32, Ciudad X', 80, 4000.00, 500.00, 'Salón temático para fiestas infantiles con juegos y actividades.', 4, 4.63),
(5, 'Bodas Deluxe', 'Calle Rosas 101, Ciudad Y', 250, 10000.00, 1500.00, 'Elegante salón para bodas, con espacio para recepción y banquete.', 5, 4.25),
(6, 'Salón Elegance', 'Calle Diamante 123, Ciudad A', 300, 12200.00, 1200.00, 'Espacio de lujo para bodas y eventos de alto perfil.', 6, 5.00),
(7, 'Parque Aventuras', 'Av. Bosques 456, Ciudad B', 100, 4000.00, 600.00, 'Área al aire libre para fiestas infantiles y actividades recreativas.', 4, 4.50),
(8, 'Centro Corporativo Elite', 'Paseo Reforma 789, Ciudad C', 500, 13000.00, 1800.00, 'Lugar exclusivo para conferencias y eventos empresariales.', 3, 3.50),
(9, 'Salón Fiesta Feliz', 'Calle Sonrisa 101, Ciudad D', 80, 4000.00, 500.00, 'Salón temático para fiestas infantiles con decoración personalizada.', 7, 3.75),
(10, 'Hacienda Los Encinos', 'Carretera Nacional Km 32, Ciudad E', 350, 5500.00, 1000.00, 'Hermosa hacienda para bodas, quinceañeras y eventos sociales.', 1, 4.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales_categorias`
--

CREATE TABLE `locales_categorias` (
  `id_local` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `locales_categorias`
--

INSERT INTO `locales_categorias` (`id_local`, `id_categoria`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 3),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 3),
(8, 1),
(8, 4),
(9, 1),
(9, 3),
(10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local_amenidades`
--

CREATE TABLE `local_amenidades` (
  `id_local` int(11) NOT NULL,
  `id_amenidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `local_amenidades`
--

INSERT INTO `local_amenidades` (`id_local`, `id_amenidades`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 2),
(3, 4),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(6, 2),
(6, 4),
(6, 5),
(7, 3),
(7, 4),
(8, 2),
(8, 3),
(8, 4),
(9, 1),
(9, 5),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `id_opinion` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT 'Anónimo',
  `calidad_servicio` decimal(3,2) NOT NULL,
  `respuesta` decimal(3,2) NOT NULL,
  `profesionalidad` decimal(3,2) NOT NULL,
  `calidad_precio` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `id_local`, `comentario`, `fecha`, `nombre_usuario`, `calidad_servicio`, `respuesta`, `profesionalidad`, `calidad_precio`) VALUES
(1, 1, 'Excelente lugar para eventos, muy organizado y limpio.', '2024-11-20', 'Anónimo', 4.00, 5.00, 4.00, 4.00),
(2, 2, 'Espacio espectacular y excelente atención.', '2024-12-21', 'Anónimo', 5.00, 5.00, 5.00, 5.00),
(3, 3, 'Buen lugar, aunque algo pequeño para eventos grandes.', '2024-12-01', 'Anónimo', 4.00, 4.00, 4.00, 4.00),
(4, 4, 'Excelente lugar para fiestas infantiles. Los niños se divirtieron mucho.', '2024-12-04', 'Anónimo', 5.00, 5.00, 5.00, 4.00),
(5, 4, 'Buena atención, pero el espacio podría ser un poco más grande.', '2024-11-24', 'Anónimo', 5.00, 4.00, 5.00, 4.00),
(6, 5, 'Boda perfecta, todo fue como lo planeamos. El lugar es hermoso.', '2024-11-05', 'Anónimo', 5.00, 5.00, 5.00, 4.00),
(7, 5, 'Muy bien atendidos, pero el costo es un poco alto para algunas familias.', '2024-12-01', 'Anónimo', 4.00, 5.00, 4.00, 4.00),
(8, 1, 'Excelente servicio', '2024-12-10', 'Anónimo', 5.00, 4.00, 5.00, 5.00),
(13, 10, 'Buen lugar.', '2024-10-22', 'Anónimo', 4.00, 4.00, 4.00, 4.00),
(14, 9, 'Me encanto, el lugar cumple con las expectativas.', '2024-11-15', 'Anónimo', 4.00, 3.00, 3.00, 5.00),
(15, 8, 'Tiene puntos de mejora.', '2024-11-08', 'Anónimo', 3.00, 3.00, 4.00, 4.00),
(16, 6, 'Me encanto, lo volvería a rentar.', '2024-12-02', 'Anónimo', 5.00, 5.00, 5.00, 5.00),
(17, 7, 'Excelente lugar para eventos con niños.', '2024-10-01', 'Anónimo', 5.00, 4.00, 4.00, 5.00),
(18, 5, 'ddfgdfgdf', '2024-12-06', 'Anónimo', 5.00, 5.00, 1.00, 4.00);

--
-- Disparadores `opiniones`
--
DELIMITER $$
CREATE TRIGGER `after_insert_opinion` AFTER INSERT ON `opiniones` FOR EACH ROW BEGIN
    UPDATE local
    SET promedio_calificacion = (
        SELECT AVG((calidad_servicio + respuesta + profesionalidad + calidad_precio) / 4)
        FROM opiniones
        WHERE id_local = NEW.id_local
    )
    WHERE id_local = NEW.id_local;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id_propietarios` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id_propietarios`, `nombre`, `telefono`) VALUES
(1, 'Juan Pérez', '1231231234'),
(2, 'María López', '9910099910'),
(3, 'Carlos García', '1478523690'),
(4, 'Laura Méndez', '3334633346'),
(5, 'Diego Ramírez', '11411445411'),
(6, 'Patricia Gómez', '5554455667'),
(7, 'Pedro Sánchez', '5556677880');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reservas` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `no_invitados` int(11) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `información_extra` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reservas`, `id_local`, `id_cliente`, `fecha`, `no_invitados`, `precio_total`, `información_extra`) VALUES
(1, 1, 1, '2024-12-15', 80, 6000.00, 'Decoración temática de cumpleaños.'),
(2, 2, 2, '2024-12-20', 150, 7500.00, 'Boda con decoración especial.'),
(3, 3, 6, '2024-12-09', 200, 6000.00, 'Pruebita'),
(4, 4, 6, '2024-12-03', 70, 4000.00, 'Fiesta temática de superhéroes para niños.'),
(5, 4, 6, '2024-12-07', 50, 4000.00, 'Fiesta de cumpleaños con animación de payasos.'),
(6, 5, 5, '2024-12-15', 200, 12000.00, 'Boda con banquete y decoración floral.'),
(7, 5, 5, '2024-12-20', 150, 10000.00, 'Boda con música en vivo y catering de lujo.'),
(49, 2, 6, '2025-01-18', 22, 8500.00, ''),
(50, 2, 6, '2025-01-21', 100, 7500.00, ''),
(51, 2, 6, '2024-12-27', 22, 7500.00, ''),
(52, 2, 6, '2024-12-27', 22, 7500.00, 'a'),
(53, 2, 6, '2024-12-23', 55, 7500.00, ''),
(54, 2, 6, '2024-12-23', 55, 7500.00, ''),
(55, 2, 6, '2024-12-31', 100, 7500.00, ''),
(56, 2, 6, '2024-12-26', 66, 7500.00, ''),
(57, 2, 6, '2025-01-07', 122, 7500.00, ''),
(58, 1, 6, '2024-12-20', 100, 5000.00, ''),
(59, 1, 6, '2024-12-25', 100, 5000.00, 'aaa'),
(60, 1, 6, '2024-12-12', 100, 5000.00, ''),
(61, 1, 6, '2024-12-18', 100, 5000.00, ''),
(62, 1, 6, '2024-12-22', 56, 6000.00, ''),
(63, 1, 6, '2024-12-27', 100, 5000.00, ''),
(64, 8, 6, '2024-12-10', 100, 13000.00, ''),
(65, 9, 6, '2024-12-15', 80, 4000.00, ''),
(66, 9, 6, '2024-12-30', 80, 4800.00, 'Gracias'),
(67, 7, 6, '2024-12-28', 100, 5100.00, ''),
(68, 5, 6, '2024-12-26', 128, 10000.00, 'aaa'),
(69, 5, 6, '2024-12-24', 250, 10000.00, ''),
(70, 5, 6, '2024-12-31', 100, 10000.00, ''),
(71, 5, 6, '2024-12-11', 250, 10000.00, ''),
(72, 5, 6, '2025-03-07', 100, 10000.00, 'Prueba 070324');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amenidades`
--
ALTER TABLE `amenidades`
  ADD PRIMARY KEY (`id_amenidades`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_local` (`id_local`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario_precio`),
  ADD KEY `id_local` (`id_local`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`),
  ADD KEY `propietario_id` (`propietario_id`);

--
-- Indices de la tabla `locales_categorias`
--
ALTER TABLE `locales_categorias`
  ADD PRIMARY KEY (`id_local`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `local_amenidades`
--
ALTER TABLE `local_amenidades`
  ADD PRIMARY KEY (`id_local`,`id_amenidades`),
  ADD KEY `id_amenidades` (`id_amenidades`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `id_local` (`id_local`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id_propietarios`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reservas`),
  ADD KEY `id_local` (`id_local`),
  ADD KEY `cliente_id` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amenidades`
--
ALTER TABLE `amenidades`
  MODIFY `id_amenidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id_propietarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reservas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`);

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id_propietarios`);

--
-- Filtros para la tabla `locales_categorias`
--
ALTER TABLE `locales_categorias`
  ADD CONSTRAINT `locales_categorias_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  ADD CONSTRAINT `locales_categorias_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `local_amenidades`
--
ALTER TABLE `local_amenidades`
  ADD CONSTRAINT `local_amenidades_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  ADD CONSTRAINT `local_amenidades_ibfk_2` FOREIGN KEY (`id_amenidades`) REFERENCES `amenidades` (`id_amenidades`);

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `opiniones_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `actualizar_promedios` ON SCHEDULE EVERY 15 SECOND STARTS '2024-12-05 20:27:41' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE local
    SET promedio_calificacion = (
        SELECT IFNULL(AVG((calidad_servicio + respuesta + profesionalidad + calidad_precio) / 4), 0)
        FROM opiniones
        WHERE opiniones.id_local = local.id_local
    );
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
