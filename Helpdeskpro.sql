-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2024 at 01:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Helpdeskpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `AreaUser`
--

CREATE TABLE `AreaUser` (
  `IdArea` int(11) NOT NULL,
  `NombreArea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AreaUser`
--

INSERT INTO `AreaUser` (`IdArea`, `NombreArea`) VALUES
(1, 'Contabilidad'),
(2, 'Administracion'),
(3, 'Back End'),
(4, 'Front End');

-- --------------------------------------------------------

--
-- Table structure for table `EstadoTicket`
--

CREATE TABLE `EstadoTicket` (
  `IdEstado` int(11) NOT NULL,
  `NombreEstado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EstadoTicket`
--

INSERT INTO `EstadoTicket` (`IdEstado`, `NombreEstado`) VALUES
(1, 'NUEVO'),
(2, 'EN PROCESO'),
(3, 'EN ESPERA'),
(4, 'RESUELTO');

-- --------------------------------------------------------

--
-- Table structure for table `ItAnalyst`
--

CREATE TABLE `ItAnalyst` (
  `IdIt` int(11) NOT NULL,
  `ItName` varchar(150) NOT NULL,
  `ItLastName` varchar(255) DEFAULT NULL,
  `ItEmail` varchar(150) NOT NULL,
  `ItPassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ItAnalyst`
--

INSERT INTO `ItAnalyst` (`IdIt`, `ItName`, `ItLastName`, `ItEmail`, `ItPassword`) VALUES
(1, 'Neyder Alberto', 'Quemba Ruiz', 'neyder@zagalabs.com', 'neyder'),
(2, 'Grupo de soporte', 'Soporte', 'soporte@zagalabs.com', 'Idontknow'),
(3, 'Daniel', 'Perez', 'daniel.perez@dominio.com', 'prueba');

-- --------------------------------------------------------

--
-- Table structure for table `Logs`
--

CREATE TABLE `Logs` (
  `IdLog` int(11) NOT NULL,
  `FechaLog` timestamp NOT NULL DEFAULT current_timestamp(),
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `IdTicket` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `TituloTicket` varchar(255) NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaActualizacion` datetime DEFAULT NULL,
  `FechaResuelto` datetime DEFAULT NULL,
  `IdResolutor` int(11) NOT NULL,
  `DescripcionTicket` longtext NOT NULL,
  `RespuestaTicket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`IdTicket`, `IdUsuario`, `TituloTicket`, `IdEstado`, `FechaCreacion`, `FechaActualizacion`, `FechaResuelto`, `IdResolutor`, `DescripcionTicket`, `RespuestaTicket`) VALUES
(1, 2, 'No puedo imprimir', 4, '2024-10-17 18:28:14', '2024-10-28 14:28:42', '2024-10-28 14:28:42', 1, 'Cuando envio una impresion, aparece un cartel en la parte de abajo de la pantalla que dice que no hay conexion con la impresora.', NULL),
(2, 3, 'Tengo fallas de red', 2, '2024-10-22 16:28:45', '2024-11-11 14:17:26', NULL, 2, 'Buenas tardes, cuando conecto mi computador al wifi de la oficina sale conectado pero no puedo navegar, ya intente borrar la red y conectarme de nuevo. Tengo reunion a las 2:00 pm y es muy importante. Estoy al tanto de su ayuda.', NULL),
(3, 1, 'Tengo un problema con el mouse', 2, '2024-10-22 16:55:32', '2024-11-11 19:33:05', NULL, 1, 'Estoy probando el mouse pero no srive', 'Se estan buscando los drivers'),
(4, 2, 'asdfghjk', 4, '2024-10-23 22:53:45', '2024-11-11 14:17:21', '2024-11-11 14:17:21', 2, 'wertyuiop[', NULL),
(5, 2, 'Tengo un problema con el mouse', 3, '2024-10-24 20:38:50', '2024-11-11 14:16:30', NULL, 2, 'prueba', NULL),
(6, 3, 'Mi equipo enciende muy lento', 1, '2024-10-31 22:05:18', '2024-11-11 14:18:06', NULL, 3, 'Quiero que quiten los programas de inicio en mi computador son muchos, traen publicidad y lo hacen lento', NULL),
(7, 1, 'Ticket Nuevo', 4, '2024-11-01 16:17:53', '2024-11-11 14:16:14', '2024-11-11 14:16:14', 2, 'Este es un Ticket Nuevo', NULL),
(8, 2, 'asdfghjk', 2, '2024-11-01 16:33:20', '2024-11-11 14:16:30', NULL, 2, 'qwertyuiop[', NULL),
(9, 2, 'asdfghjk', 4, '2024-11-01 16:33:48', '2024-11-11 19:19:22', '2024-11-11 19:19:22', 3, 'qwertyuiop[', 'ya quedo'),
(10, 2, 'Tengo un problema con el mouse', 4, '2024-11-01 16:37:48', '2024-11-11 14:16:14', '2024-11-11 14:16:14', 2, 'qwertyuio', NULL),
(11, 2, 'Tengo un problema con el mouse', 4, '2024-11-01 16:38:38', '2024-11-11 14:18:06', '2024-11-11 14:18:06', 3, 'qwertyuio', NULL),
(12, 2, 'Tengo un problema con el mouse', 4, '2024-11-01 16:38:58', '2024-11-11 14:16:14', '2024-11-11 14:16:14', 2, 'qwertyuio', NULL),
(13, 2, 'Tengo un problema con el mouse', 4, '2024-11-01 16:39:19', '2024-11-11 14:18:06', '2024-11-11 14:18:06', 3, 'qwertyuio', NULL),
(14, 2, 'Mi equipo enciende muy lento', 4, '2024-11-01 16:44:31', '2024-11-11 14:16:14', '2024-11-11 14:16:14', 2, 'qwertyuio', NULL),
(15, 1, 'Ticket Prueba', 4, '2024-11-11 18:02:07', '2024-11-11 19:19:57', '2024-11-11 19:19:57', 3, 'Este ticket es de prueba', 'Prueba resuelta'),
(16, 4, 'Tengo un problema con el mouse', 1, '2024-11-12 00:39:50', NULL, NULL, 2, 'Quiero cmbiar el color de la flecha', NULL);

--
-- Triggers `Ticket`
--
DELIMITER $$
CREATE TRIGGER `HoraActualizacion` BEFORE UPDATE ON `Ticket` FOR EACH ROW BEGIN
   SET NEW.FechaActualizacion = CURRENT_TIMESTAMP();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `HoraResuelto` BEFORE UPDATE ON `Ticket` FOR EACH ROW BEGIN
    IF NEW.IdEstado = 4 THEN
       SET NEW.FechaResuelto = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `IdUser` int(11) NOT NULL,
  `NombreUser` varchar(100) NOT NULL,
  `CorreoUser` varchar(255) NOT NULL,
  `AreaUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`IdUser`, `NombreUser`, `CorreoUser`, `AreaUser`) VALUES
(1, 'Pedro Lopez', 'pedro.lopez@zagalabs.com', 3),
(2, 'Camila Osorio Gomez', 'camila.osorio@zagalabs.com', 3),
(3, 'Danilo Romero', 'danilo.romero@zagalabs.com', 2),
(4, 'Maria Lopez', 'maria.lopez@dominio.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AreaUser`
--
ALTER TABLE `AreaUser`
  ADD PRIMARY KEY (`IdArea`);

--
-- Indexes for table `EstadoTicket`
--
ALTER TABLE `EstadoTicket`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indexes for table `ItAnalyst`
--
ALTER TABLE `ItAnalyst`
  ADD PRIMARY KEY (`IdIt`);

--
-- Indexes for table `Logs`
--
ALTER TABLE `Logs`
  ADD PRIMARY KEY (`IdLog`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`IdTicket`),
  ADD KEY `IdEstado` (`IdEstado`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdResolutor` (`IdResolutor`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `AreaUser` (`AreaUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AreaUser`
--
ALTER TABLE `AreaUser`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `EstadoTicket`
--
ALTER TABLE `EstadoTicket`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ItAnalyst`
--
ALTER TABLE `ItAnalyst`
  MODIFY `IdIt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Logs`
--
ALTER TABLE `Logs`
  MODIFY `IdLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `IdTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`IdEstado`) REFERENCES `EstadoTicket` (`IdEstado`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `User` (`IdUser`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`IdResolutor`) REFERENCES `ItAnalyst` (`IdIt`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`AreaUser`) REFERENCES `AreaUser` (`IdArea`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
