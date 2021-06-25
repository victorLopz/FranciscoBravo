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


CREATE TABLE `almacencuatro` (
  `IDAlmacencuatro` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `almacendos` (
  `IDAlmacendos` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `almacentres` (
  `IDAlmacentres` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `almacenuno` (
  `IDAlmacenuno` int(11) NOT NULL,
  `IDCodigoAlmacenPK` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Notas` varchar(50) NOT NULL,
  `isVisible` int(11) NOT NULL DEFAULT 1,
  `TimeSpace` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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

ALTER TABLE `almacenuno`
  ADD PRIMARY KEY (`IDAlmacenuno`);

  
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`IDCodigoAlmacen`);


ALTER TABLE `almacencuatro`
  MODIFY `IDAlmacencuatro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacendos`
--
ALTER TABLE `almacendos`
  MODIFY `IDAlmacendos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacentres`
--
ALTER TABLE `almacentres`
  MODIFY `IDAlmacentres` int(11) NOT NULL AUTO_INCREMENT;

  
ALTER TABLE `almacenuno`
  MODIFY `IDAlmacenuno` int(11) NOT NULL AUTO_INCREMENT;

  
ALTER TABLE `almacen`
  MODIFY `IDCodigoAlmacen` int(11) NOT NULL AUTO_INCREMENT;

  
CREATE TABLE `detalledefactura` (
  `IDFacturaDetalle` int(11) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `Precio` double NOT NULL,
  `IDFacturaPK` int(11) NOT NULL,
  `TimeSpace` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

ALTER TABLE `detalledefactura`
  ADD PRIMARY KEY (`IDFacturaDetalle`);

ALTER TABLE `factura`
  ADD PRIMARY KEY (`IDFactura`);

ALTER TABLE `detalledefactura`
  MODIFY `IDFacturaDetalle` int(11) NOT NULL AUTO_INCREMENT;

  --
ALTER TABLE `factura`
  MODIFY `IDFactura` int(11) NOT NULL AUTO_INCREMENT;
