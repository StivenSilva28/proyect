-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2022 a las 20:23:52
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradoras`
--

CREATE TABLE `aseguradoras` (
  `aseguradoras_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aseguradoras`
--

INSERT INTO `aseguradoras` (`aseguradoras_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'SIN AFILIACION', NULL, NULL),
(2, 'SISBEN', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'aaa', '2022-11-21 18:43:01', '2022-11-21 18:43:01'),
(2, 'll', '2022-11-24 00:17:30', '2022-11-24 00:17:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `categoria_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 2, 'jkji', '2022-11-24 00:22:30', '2022-11-24 00:22:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_17_024652_categorias', 1),
(6, '2022_11_17_024723_libros', 1),
(7, '2022_11_18_033728_tipo_sexo', 1),
(9, '2022_11_18_033844_zonas_residencia', 1),
(10, '2022_11_18_033907_tipo_estado_civil', 1),
(11, '2022_11_18_034132_tipo_municipio', 1),
(12, '2022_11_18_034154_system_usuarios', 1),
(13, '2022_11_18_034216_tipos_estratos', 1),
(14, '2022_11_18_034300_tipos_regimen_salud', 1),
(15, '2022_11_18_034324_aseguradoras', 1),
(16, '2022_11_18_042851_tipo_departamento', 1),
(17, '2022_11_18_043053_tipo_pais', 1),
(18, '2022_11_18_033821_tipos_id_pacientes', 2),
(20, '2022_11_18_051744_pacientes', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_id_paciente` bigint(20) UNSIGNED NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_residencia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_residencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona_residencia_id` bigint(20) UNSIGNED NOT NULL,
  `ocupacion_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_estado_civil` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` bigint(20) UNSIGNED NOT NULL,
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_estrato_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_madre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_expedicion_documentoervacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular_telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_paciente` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_regimen_id` bigint(20) UNSIGNED NOT NULL,
  `aseguradoras_id` bigint(20) UNSIGNED NOT NULL,
  `foto_paciente_huella` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_usuarios`
--

CREATE TABLE `system_usuarios` (
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sw_admin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_caducidad_contrasena` datetime NOT NULL,
  `fecha_caducidad_cuenta` datetime NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `system_usuarios`
--

INSERT INTO `system_usuarios` (`usuario_id`, `usuario`, `nombre`, `descripcion`, `passwd`, `sw_admin`, `activo`, `fecha_caducidad_contrasena`, `fecha_caducidad_cuenta`, `telefono`, `tel_celular`, `indicativo`, `extension`, `email`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `firma`, `created_at`, `updated_at`) VALUES
(1, 'JBASTIDAS', 'JULIAN BASTIDAS', 'DESARROLLO E IMPLEMENTACION', '1234', '1', '1', '2022-11-23 03:30:24', '2022-11-23 03:30:24', '32323432', '423432', '4234324', '432432', '4342', 'JULIAN', '', 'BASTIDAS', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_estratos`
--

CREATE TABLE `tipos_estratos` (
  `tipo_estrato_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_estratos`
--

INSERT INTO `tipos_estratos` (`tipo_estrato_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'ESTRATO 1', NULL, NULL),
(2, 'ESTRATO 2', NULL, NULL),
(3, 'ESTRATO 3', NULL, NULL),
(4, 'ESTRATO 4', NULL, NULL),
(5, 'ESTRATO 5', NULL, NULL),
(6, 'ESTRATO 6', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_id_pacientes`
--

CREATE TABLE `tipos_id_pacientes` (
  `tipo_id_paciente` bigint(20) UNSIGNED NOT NULL,
  `abreviado` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_alterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_id_pacientes`
--

INSERT INTO `tipos_id_pacientes` (`tipo_id_paciente`, `abreviado`, `descripcion`, `codigo_alterno`, `created_at`, `updated_at`) VALUES
(1, 'RC', 'REGISTRO CIVIL', '1', NULL, NULL),
(2, 'CC', 'CEDULA CIUDADANIA ', '1', NULL, NULL),
(3, 'TI', 'TARJETA DE IDENTIDAD', '1', NULL, NULL),
(4, 'CE', 'CEDULA EXTRANJERIA', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_regimen_salud`
--

CREATE TABLE `tipos_regimen_salud` (
  `tipo_regimen_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sw_activo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_regimen_salud`
--

INSERT INTO `tipos_regimen_salud` (`tipo_regimen_id`, `descripcion`, `sw_activo`, `created_at`, `updated_at`) VALUES
(1, 'SIN AFILIACION', '1', NULL, NULL),
(2, 'ESPECIAL', '1', NULL, NULL),
(3, 'SUBSIDIADO', '1', NULL, NULL),
(4, 'CONTRIBUTIVO', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_departamento`
--

CREATE TABLE `tipo_departamento` (
  `departamento_id` bigint(20) UNSIGNED NOT NULL,
  `Codigo_depa` int(11) NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_departamento`
--

INSERT INTO `tipo_departamento` (`departamento_id`, `Codigo_depa`, `departamento`, `created_at`, `updated_at`) VALUES
(1, 5, 'VALLE DEL CAUCA', NULL, NULL),
(2, 6, 'ANTIOQUIA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estado_civil`
--

CREATE TABLE `tipo_estado_civil` (
  `tipo_estado_civil_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_municipio`
--

CREATE TABLE `tipo_municipio` (
  `municipio_id` bigint(20) UNSIGNED NOT NULL,
  `cod_municipio` int(4) NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_municipio`
--

INSERT INTO `tipo_municipio` (`municipio_id`, `cod_municipio`, `municipio`, `created_at`, `updated_at`) VALUES
(1, 1, 'CALI', NULL, NULL),
(2, 2, 'CANDELARIA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pais`
--

CREATE TABLE `tipo_pais` (
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `cod_pais` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_pais`
--

INSERT INTO `tipo_pais` (`pais_id`, `cod_pais`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'CO', 'COLOMBIA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sexo`
--

CREATE TABLE `tipo_sexo` (
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `sexo_tipo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sw_mostrar` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_sexo`
--

INSERT INTO `tipo_sexo` (`sexo_id`, `sexo_tipo`, `descripcion`, `sw_mostrar`, `created_at`, `updated_at`) VALUES
(1, 'M', 'MASCULINO', '1', NULL, NULL),
(2, 'F', 'FEMENINO', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'StivenS', 'ztivn@misena.edu.co', NULL, '$2y$10$OtAm48gGjCD3ObamDONH4elDXymM6iKHPLfW29hiFHbevb88tTn2O', 'sJ1nZxnjUK03I4s31AEIioeJqQ51fqnOxze1GE51zUOTleFLDW5YQZRMfKOK', '2022-11-21 06:53:43', '2022-11-21 06:53:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_residencia`
--

CREATE TABLE `zona_residencia` (
  `zona_residencia_id` bigint(20) UNSIGNED NOT NULL,
  `zona_id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zona_residencia`
--

INSERT INTO `zona_residencia` (`zona_residencia_id`, `zona_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'U', 'urbano', NULL, NULL),
(2, 'R', 'Rural', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aseguradoras`
--
ALTER TABLE `aseguradoras`
  ADD PRIMARY KEY (`aseguradoras_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libros_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`paciente_id`),
  ADD KEY `pacientes_tipo_id_paciente_foreign` (`tipo_id_paciente`),
  ADD KEY `pacientes_zona_residencia_id_foreign` (`zona_residencia_id`),
  ADD KEY `pacientes_sexo_id_foreign` (`sexo_id`),
  ADD KEY `pacientes_departamento_id_foreign` (`departamento_id`),
  ADD KEY `pacientes_municipio_id_foreign` (`municipio_id`),
  ADD KEY `pacientes_pais_id_foreign` (`pais_id`),
  ADD KEY `pacientes_tipo_estrato_id_foreign` (`tipo_estrato_id`),
  ADD KEY `pacientes_usuario_id_foreign` (`usuario_id`),
  ADD KEY `pacientes_tipo_regimen_id_foreign` (`tipo_regimen_id`),
  ADD KEY `pacientes_aseguradoras_id_foreign` (`aseguradoras_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `system_usuarios`
--
ALTER TABLE `system_usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `tipos_estratos`
--
ALTER TABLE `tipos_estratos`
  ADD PRIMARY KEY (`tipo_estrato_id`);

--
-- Indices de la tabla `tipos_id_pacientes`
--
ALTER TABLE `tipos_id_pacientes`
  ADD PRIMARY KEY (`tipo_id_paciente`);

--
-- Indices de la tabla `tipos_regimen_salud`
--
ALTER TABLE `tipos_regimen_salud`
  ADD PRIMARY KEY (`tipo_regimen_id`);

--
-- Indices de la tabla `tipo_departamento`
--
ALTER TABLE `tipo_departamento`
  ADD PRIMARY KEY (`departamento_id`);

--
-- Indices de la tabla `tipo_estado_civil`
--
ALTER TABLE `tipo_estado_civil`
  ADD PRIMARY KEY (`tipo_estado_civil_id`);

--
-- Indices de la tabla `tipo_municipio`
--
ALTER TABLE `tipo_municipio`
  ADD PRIMARY KEY (`municipio_id`);

--
-- Indices de la tabla `tipo_pais`
--
ALTER TABLE `tipo_pais`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indices de la tabla `tipo_sexo`
--
ALTER TABLE `tipo_sexo`
  ADD PRIMARY KEY (`sexo_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `zona_residencia`
--
ALTER TABLE `zona_residencia`
  ADD PRIMARY KEY (`zona_residencia_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aseguradoras`
--
ALTER TABLE `aseguradoras`
  MODIFY `aseguradoras_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `paciente_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `system_usuarios`
--
ALTER TABLE `system_usuarios`
  MODIFY `usuario_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_estratos`
--
ALTER TABLE `tipos_estratos`
  MODIFY `tipo_estrato_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipos_id_pacientes`
--
ALTER TABLE `tipos_id_pacientes`
  MODIFY `tipo_id_paciente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_regimen_salud`
--
ALTER TABLE `tipos_regimen_salud`
  MODIFY `tipo_regimen_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_departamento`
--
ALTER TABLE `tipo_departamento`
  MODIFY `departamento_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_estado_civil`
--
ALTER TABLE `tipo_estado_civil`
  MODIFY `tipo_estado_civil_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_municipio`
--
ALTER TABLE `tipo_municipio`
  MODIFY `municipio_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_pais`
--
ALTER TABLE `tipo_pais`
  MODIFY `pais_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_sexo`
--
ALTER TABLE `tipo_sexo`
  MODIFY `sexo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zona_residencia`
--
ALTER TABLE `zona_residencia`
  MODIFY `zona_residencia_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_aseguradoras_id_foreign` FOREIGN KEY (`aseguradoras_id`) REFERENCES `aseguradoras` (`aseguradoras_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `tipo_departamento` (`departamento_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `tipo_municipio` (`municipio_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `tipo_pais` (`pais_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `tipo_sexo` (`sexo_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_tipo_estrato_id_foreign` FOREIGN KEY (`tipo_estrato_id`) REFERENCES `tipos_estratos` (`tipo_estrato_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_tipo_id_paciente_foreign` FOREIGN KEY (`tipo_id_paciente`) REFERENCES `tipos_id_pacientes` (`tipo_id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_tipo_regimen_id_foreign` FOREIGN KEY (`tipo_regimen_id`) REFERENCES `tipos_regimen_salud` (`tipo_regimen_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `system_usuarios` (`usuario_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_zona_residencia_id_foreign` FOREIGN KEY (`zona_residencia_id`) REFERENCES `zona_residencia` (`zona_residencia_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
