-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2021 a las 21:20:33
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `innova-virtual-inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `IDCodigoAlmacen` int(11) NOT NULL,
  `NombreArticulo` varchar(50) DEFAULT NULL,
  `Marca` varchar(50) DEFAULT NULL,
  `Modelopresentacion` varchar(50) DEFAULT NULL,
  `Codigo1` varchar(50) DEFAULT NULL,
  `Codigo2` varchar(50) DEFAULT NULL,
  `Notas` varchar(400) DEFAULT NULL,
  `precioVenta` double NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1,
  `PrecioCompra` double NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `TimeSpace` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`IDCodigoAlmacen`, `NombreArticulo`, `Marca`, `Modelopresentacion`, `Codigo1`, `Codigo2`, `Notas`, `precioVenta`, `IsVisible`, `PrecioCompra`, `Stock`, `TimeSpace`) VALUES
(1, 'Cuaderno', 'Loro', 'Negro', '01234', '0043', 'Es un buen cuaderno', 25, 1, 18, 1, '2021-03-08 20:48:17'),
(2, 'Balinera', 'Koyo', 'Motocicleta', '0043', '0045', 'Es Buena Balinera', 50, 1, 30, 1, '2021-03-15 02:31:26'),
(3, 'bateria', 'Samsung', '6700', '6969', '9696', '', 50, 1, 30, 1, '2021-03-15 13:02:07'),
(4, 'Helmet', 'MT', 'MTHelmet', '0015', '0017', '', 1800, 1, 1500, 1, '2021-03-15 13:03:11'),
(5, 'Coca cola', 'COCA-COLA', 'Gaseosa', '1357', '2468', '', 10, 1, 5, 1, '2021-03-15 13:04:46'),
(6, 'Bujulla', 'LED', 'TRESB', '74115126100917411512610091', '74115126100917411512610092', 'Bujilla LED', 80, 1, 50, 1, '2021-03-15 22:34:25'),
(7, 'FACTURADORA', 'HTRP-58210108038HTRP-58210108038', 'JOBH58', 'HTRP-58210108038', 'HTRP-5821010783', 'ESTA ES LA HTRP-58210108038', 70, 1, 50, 1, '2021-03-15 22:36:43'),
(8, 'FACTURADORA', 'HTRP-58210108038HTRP-58210108038', 'JOBH58', 'HTRP-58210108038', 'HTRP-5821010783', 'ESTA ES LA HTRP-58210108038', 70, 1, 50, 1, '2021-03-15 22:36:43'),
(11, 'Lampara', 'Koyo', 'TCL-2345', 'Lamp0043-2020', '2020-kes-lamp', 'Buena Lampara', 200, 1, 150, 1, '2021-03-17 00:42:09'),
(12, 'wdfegtr', 'efghj', 'ewgthrkyu', '2238473892747', 'ergty', 'sdfghj', 4567, 1, 43567, 1, '2021-03-22 00:41:15'),
(13, 'werty', 'ertyu', 'ertyu', '2238473892747', 'ertyu', 'sdfghj', 3456, 1, 567, 1, '2021-03-22 00:41:52'),
(14, 'wderghj', 'werty', 'esdtgrhy', 'edrgth', 'wertyu', 'sdfgh', 2, 1, 2, 1, '2021-03-22 01:19:43'),
(15, 'sdfgh', 'dfghjk', 'dfghjk', '001534', 'sdfgh', 'dscfvbn', 4, 1, 5, 1, '2021-03-22 01:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacencuatro`
--

CREATE TABLE `almacencuatro` (
  `IDAlmacencuatro` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacencuatro`
--

INSERT INTO `almacencuatro` (`IDAlmacencuatro`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 0, 'Es un buen cuaderno', 1, '2021-03-09 02:48:18'),
(2, 2, 0, 'Es Buena Balinera', 1, '2021-03-15 08:31:26'),
(3, 3, 0, '', 1, '2021-03-15 19:02:08'),
(4, 4, 0, '', 1, '2021-03-15 19:03:11'),
(5, 5, 0, '', 1, '2021-03-15 19:04:47'),
(6, 6, 0, 'Bujilla LED', 1, '2021-03-16 04:34:25'),
(7, 8, 0, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-16 04:36:43'),
(8, 8, 0, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-16 04:36:44'),
(9, 9, 0, '', 1, '2021-03-16 04:36:46'),
(10, 10, 0, '', 1, '2021-03-16 04:36:49'),
(11, 11, 0, 'Buena Lampara', 1, '2021-03-17 06:42:09'),
(12, 12, 0, 'sdfghj', 1, '2021-03-22 06:41:15'),
(13, 13, 0, 'sdfghj', 1, '2021-03-22 06:41:52'),
(14, 14, 0, 'sdfgh', 1, '2021-03-22 07:19:44'),
(15, 15, 0, 'dscfvbn', 1, '2021-03-22 07:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacendos`
--

CREATE TABLE `almacendos` (
  `IDAlmacendos` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacendos`
--

INSERT INTO `almacendos` (`IDAlmacendos`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 0, 'Es un buen cuaderno', 1, '2021-03-09 02:48:17'),
(2, 2, 0, 'Es Buena Balinera', 1, '2021-03-15 08:31:26'),
(3, 3, 0, '', 1, '2021-03-15 19:02:07'),
(4, 4, 0, '', 1, '2021-03-15 19:03:11'),
(5, 5, 0, '', 1, '2021-03-15 19:04:47'),
(6, 6, 0, 'Bujilla LED', 1, '2021-03-16 04:34:25'),
(7, 7, 0, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-16 04:36:43'),
(8, 8, 0, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-16 04:36:43'),
(9, 9, 0, '', 1, '2021-03-16 04:36:46'),
(10, 10, 0, '', 1, '2021-03-16 04:36:49'),
(11, 11, 0, 'Buena Lampara', 1, '2021-03-17 06:42:09'),
(12, 12, 0, 'sdfghj', 1, '2021-03-22 06:41:15'),
(13, 13, 0, 'sdfghj', 1, '2021-03-22 06:41:52'),
(14, 14, 0, 'sdfgh', 1, '2021-03-22 07:19:44'),
(15, 15, 0, 'dscfvbn', 1, '2021-03-22 07:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacentres`
--

CREATE TABLE `almacentres` (
  `IDAlmacentres` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacentres`
--

INSERT INTO `almacentres` (`IDAlmacentres`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 0, 'Es un buen cuaderno', 1, '2021-03-09 02:48:17'),
(2, 2, 0, 'Es Buena Balinera', 1, '2021-03-15 08:31:26'),
(3, 3, 0, '', 1, '2021-03-15 19:02:07'),
(4, 4, 0, '', 1, '2021-03-15 19:03:11'),
(5, 5, 0, '', 1, '2021-03-15 19:04:47'),
(6, 6, 0, 'Bujilla LED', 1, '2021-03-16 04:34:25'),
(7, 7, 0, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-16 04:36:43'),
(8, 8, 0, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-16 04:36:44'),
(9, 9, 0, '', 1, '2021-03-16 04:36:46'),
(10, 10, 0, '', 1, '2021-03-16 04:36:49'),
(11, 11, 0, 'Buena Lampara', 1, '2021-03-17 06:42:09'),
(12, 12, 0, 'sdfghj', 1, '2021-03-22 06:41:15'),
(13, 13, 0, 'sdfghj', 1, '2021-03-22 06:41:52'),
(14, 14, 0, 'sdfgh', 1, '2021-03-22 07:19:44'),
(15, 15, 0, 'dscfvbn', 1, '2021-03-22 07:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenuno`
--

CREATE TABLE `almacenuno` (
  `IDAlmacenuno` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacenuno`
--

INSERT INTO `almacenuno` (`IDAlmacenuno`, `IDCodigoAlmacenPK`, `Stock`, `Notas`, `isVisible`, `TimeSpace`) VALUES
(1, 1, 23, 'Es un buen cuaderno', 1, '2021-03-17 17:18:04'),
(2, 2, 4, 'Es Buena Balinera', 1, '2021-03-17 17:28:41'),
(3, 3, 3, '', 1, '2021-03-17 08:12:59'),
(4, 4, 17, '', 1, '2021-03-18 07:48:17'),
(5, 5, 3, '', 1, '2021-03-17 08:19:34'),
(6, 6, 3, 'Bujilla LED', 1, '2021-03-17 08:12:59'),
(7, 7, 1, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-17 08:17:20'),
(8, 8, 3, 'ESTA ES LA HTRP-58210108038', 1, '2021-03-17 08:12:59'),
(9, 9, 3, '', 1, '2021-03-17 08:12:59'),
(10, 10, 3, '', 1, '2021-03-17 08:12:59'),
(11, 11, 0, 'Buena Lampara', 1, '2021-03-17 18:31:30'),
(12, 12, 0, 'sdfghj', 1, '2021-03-22 06:41:15'),
(13, 13, 0, 'sdfghj', 1, '2021-03-22 06:41:52'),
(14, 14, 0, 'sdfgh', 1, '2021-03-22 07:19:44'),
(15, 15, 0, 'dscfvbn', 1, '2021-03-22 07:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogodatos`
--

CREATE TABLE `catalogodatos` (
  `IDcatalogoDatos` int(11) NOT NULL,
  `Primer_Nombre_Empresa` varchar(50) NOT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `NumeroRUC_Cedula` varchar(20) NOT NULL,
  `Direccion` varchar(1000) NOT NULL,
  `Numero_Telefonico` int(11) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1,
  `Comentario` varchar(1000) DEFAULT NULL,
  `TimeSpace` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogodatos`
--

INSERT INTO `catalogodatos` (`IDcatalogoDatos`, `Primer_Nombre_Empresa`, `Apellidos`, `NumeroRUC_Cedula`, `Direccion`, `Numero_Telefonico`, `Email`, `IsVisible`, `Comentario`, `TimeSpace`) VALUES
(1, 'Victor Joaquin', 'Lopez Castillo', '0010301990000S', 'Sabana Grande', 89823811, 'admin@admin.com', 1, 'Hola', '2021-02-21 23:09:19'),
(2, 'Josue', 'Salinas', '', '1000', 89823811, 'castillolopez735@gma', 1, 'Hola', '2021-02-24 22:05:51'),
(3, 'Kessler', 'Torres', '000000000000S', 'Saban Grande', 88888888, 'kesler@admin.com', 1, 'Segundo Usuario', '2021-02-24 22:12:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDClientes` int(11) NOT NULL,
  `IDcatalogoDatosPK` int(11) NOT NULL,
  `IDEstadoClientePK` int(11) NOT NULL,
  `Comentario` varchar(300) NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledefactura`
--

CREATE TABLE `detalledefactura` (
  `IDFacturaDetalle` int(11) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `Precio` double NOT NULL,
  `IDFacturaPK` int(11) NOT NULL,
  `TimeSpace` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalledefactura`
--

INSERT INTO `detalledefactura` (`IDFacturaDetalle`, `Unidades`, `producto`, `Precio`, `IDFacturaPK`, `TimeSpace`) VALUES
(1, 2, 3, 100, 9, '2021-03-22'),
(2, 1, 4, 1800, 9, '2021-03-22'),
(3, 1, 3, 50, 10, '2021-03-22'),
(4, 1, 4, 1800, 10, '2021-03-22'),
(5, 2, 1, 50, 10, '2021-03-22'),
(6, 1, 7, 70, 10, '2021-03-22'),
(7, 2, 6, 160, 10, '2021-03-22'),
(8, 2, 5, 20, 11, '2021-03-22'),
(9, 2, 5, 20, 12, '2021-03-22'),
(10, 3, 8, 210, 12, '2021-03-22'),
(11, 4, 2, 200, 13, '2021-03-22'),
(12, 20, 1, 500, 14, '2021-03-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesinventario`
--

CREATE TABLE `detallesinventario` (
  `IDDetalleINV` int(11) NOT NULL,
  `IDArticuloPK` int(11) NOT NULL,
  `CantIngresada` int(11) NOT NULL,
  `CostoUnitario` double NOT NULL,
  `PrecioVenta/Unitario` double NOT NULL,
  `IDIngresoINVPK` int(11) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocliente`
--

CREATE TABLE `estadocliente` (
  `IDEstadoCliente` int(11) NOT NULL,
  `Comentario` varchar(500) NOT NULL,
  `Numero_de_Estado` int(11) NOT NULL,
  `SystemName` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IDFactura` int(11) NOT NULL,
  `Timespace` date NOT NULL DEFAULT current_timestamp(),
  `AlmacenNumero` int(11) NOT NULL,
  `SubTotal` double DEFAULT NULL,
  `Iva` tinyint(1) DEFAULT NULL,
  `Total` double NOT NULL,
  `fechaEmision` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `montopagado` double NOT NULL,
  `cambio` double NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IDFactura`, `Timespace`, `AlmacenNumero`, `SubTotal`, `Iva`, `Total`, `fechaEmision`, `montopagado`, `cambio`, `IsVisible`) VALUES
(9, '2021-03-19', 1, NULL, NULL, 1900, '2021-03-20 03:48:12', 2000, 100, 1),
(10, '2021-03-20', 1, NULL, NULL, 2130, '2021-03-20 08:03:15', 2500, 370, 1),
(11, '2021-03-22', 1, NULL, NULL, 20, '2021-03-22 19:30:53', 122, 102, 1),
(12, '2021-03-22', 1, NULL, NULL, 230, '2021-03-22 19:35:35', 400, 170, 1),
(13, '2021-03-22', 1, NULL, NULL, 200, '2021-03-22 19:40:34', 300, 100, 1),
(14, '2021-03-22', 1, NULL, NULL, 500, '2021-03-22 20:06:20', 600, 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresoinventario`
--

CREATE TABLE `ingresoinventario` (
  `IDIngresoINV` int(11) NOT NULL,
  `Timespace` datetime NOT NULL DEFAULT current_timestamp(),
  `Comentario` varchar(500) NOT NULL,
  `MontoPrecio/Costo` double NOT NULL,
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuarios`
--

CREATE TABLE `roles_usuarios` (
  `IDRolControlUsuariosPK` int(11) NOT NULL,
  `RolUsuario` varchar(50) NOT NULL,
  `Comentario` varchar(1000) DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles_usuarios`
--

INSERT INTO `roles_usuarios` (`IDRolControlUsuariosPK`, `RolUsuario`, `Comentario`, `Nivel`) VALUES
(1, 'Administrador', 'Control del sistema total', 1),
(2, 'Trabajador Almacen 1', 'Trabajador del almacen 1', 2),
(3, 'Trabajador Almacen 2', 'Trabajador del almacen 2', 3),
(4, 'Trabajador Almacen 3', 'Trabajador del almacen 3', 4),
(5, 'Trabajador Almacen 4', 'Trabajador del almacen 4', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoalmacenes`
--

CREATE TABLE `tipoalmacenes` (
  `IDalmacentipo` int(11) NOT NULL,
  `NombreAlmacen` varchar(50) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `Nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoalmacenes`
--

INSERT INTO `tipoalmacenes` (`IDalmacentipo`, `NombreAlmacen`, `Comentario`, `Nivel`) VALUES
(1, 'Almacen 1', 'Este es el primer almacen', 1),
(2, 'Almacen 2', 'Este es el segundo almacen', 2),
(3, 'Almacen 3', 'Este es el Tercer almacen', 3),
(4, 'Almacen 4', 'Este es el Cuarto almacen', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocambio`
--

CREATE TABLE `tipocambio` (
  `IDcambio` int(11) NOT NULL,
  `TipoMoneda` varchar(20) NOT NULL,
  `Valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocambio`
--

INSERT INTO `tipocambio` (`IDcambio`, `TipoMoneda`, `Valor`) VALUES
(1, 'Dolar EstadoUnidense', 35.12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuarios` int(11) NOT NULL,
  `IDcatalogoDatosPK` int(11) DEFAULT NULL,
  `IDRolControlUsuariosPK` int(11) NOT NULL COMMENT 'Campos de roles para control de Usuarios',
  `UserName` varchar(20) NOT NULL,
  `PasswordName` varchar(50) NOT NULL,
  `TimeSpace` datetime NOT NULL DEFAULT current_timestamp(),
  `IsVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuarios`, `IDcatalogoDatosPK`, `IDRolControlUsuariosPK`, `UserName`, `PasswordName`, `TimeSpace`, `IsVisible`) VALUES
(1, 1, 1, 'admin@admin.com', 'demo', '2021-02-21 23:14:05', 1),
(2, NULL, 2, 'demo@admin.com', 'demo', '2021-03-01 22:13:39', 1),
(3, NULL, 3, 'kesler@admin.com', 'demo2', '2021-03-07 11:25:41', 1),
(4, NULL, 4, 'victor@almacen2.com', '12345', '2021-03-07 13:14:42', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`IDCodigoAlmacen`);

--
-- Indices de la tabla `almacencuatro`
--
ALTER TABLE `almacencuatro`
  ADD PRIMARY KEY (`IDAlmacencuatro`);

--
-- Indices de la tabla `almacendos`
--
ALTER TABLE `almacendos`
  ADD PRIMARY KEY (`IDAlmacendos`);

--
-- Indices de la tabla `almacentres`
--
ALTER TABLE `almacentres`
  ADD PRIMARY KEY (`IDAlmacentres`);

--
-- Indices de la tabla `almacenuno`
--
ALTER TABLE `almacenuno`
  ADD PRIMARY KEY (`IDAlmacenuno`);

--
-- Indices de la tabla `catalogodatos`
--
ALTER TABLE `catalogodatos`
  ADD PRIMARY KEY (`IDcatalogoDatos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDClientes`);

--
-- Indices de la tabla `detalledefactura`
--
ALTER TABLE `detalledefactura`
  ADD PRIMARY KEY (`IDFacturaDetalle`);

--
-- Indices de la tabla `detallesinventario`
--
ALTER TABLE `detallesinventario`
  ADD PRIMARY KEY (`IDDetalleINV`);

--
-- Indices de la tabla `estadocliente`
--
ALTER TABLE `estadocliente`
  ADD PRIMARY KEY (`IDEstadoCliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFactura`);

--
-- Indices de la tabla `ingresoinventario`
--
ALTER TABLE `ingresoinventario`
  ADD PRIMARY KEY (`IDIngresoINV`);

--
-- Indices de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  ADD PRIMARY KEY (`IDRolControlUsuariosPK`);

--
-- Indices de la tabla `tipoalmacenes`
--
ALTER TABLE `tipoalmacenes`
  ADD PRIMARY KEY (`IDalmacentipo`);

--
-- Indices de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
  ADD PRIMARY KEY (`IDcambio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `IDCodigoAlmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `almacencuatro`
--
ALTER TABLE `almacencuatro`
  MODIFY `IDAlmacencuatro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `almacendos`
--
ALTER TABLE `almacendos`
  MODIFY `IDAlmacendos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `almacentres`
--
ALTER TABLE `almacentres`
  MODIFY `IDAlmacentres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `almacenuno`
--
ALTER TABLE `almacenuno`
  MODIFY `IDAlmacenuno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `catalogodatos`
--
ALTER TABLE `catalogodatos`
  MODIFY `IDcatalogoDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDClientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalledefactura`
--
ALTER TABLE `detalledefactura`
  MODIFY `IDFacturaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detallesinventario`
--
ALTER TABLE `detallesinventario`
  MODIFY `IDDetalleINV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadocliente`
--
ALTER TABLE `estadocliente`
  MODIFY `IDEstadoCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IDFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ingresoinventario`
--
ALTER TABLE `ingresoinventario`
  MODIFY `IDIngresoINV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles_usuarios`
--
ALTER TABLE `roles_usuarios`
  MODIFY `IDRolControlUsuariosPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipoalmacenes`
--
ALTER TABLE `tipoalmacenes`
  MODIFY `IDalmacentipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
  MODIFY `IDcambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
