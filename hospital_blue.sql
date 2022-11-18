-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2022 at 08:31 AM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_blue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user`, `pass`) VALUES
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `especialidades`
--

CREATE TABLE `especialidades` (
  `codigo` int NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `especialidades`
--

INSERT INTO `especialidades` (`codigo`, `descripcion`) VALUES
(1, 'Enfermero'),
(2, 'Cirugía'),
(3, 'Clinico'),
(4, 'Pediatria'),
(5, 'Guardia'),
(6, 'Cardiologia'),
(7, 'Otorrinolaringologia'),
(8, 'Radiologia'),
(9, 'Anestesiologia'),
(10, 'Anatomia'),
(11, 'Dermatologia'),
(12, 'Ginecologia'),
(13, 'Urologia'),
(14, 'Hematologia'),
(15, 'Medicina de Rehabilitacion'),
(16, 'Neurologia'),
(17, 'Nefrologia'),
(18, 'Neumologia'),
(19, 'Ortopedia'),
(20, 'Psiquiatria');

-- --------------------------------------------------------

--
-- Table structure for table `obrassociales`
--

CREATE TABLE `obrassociales` (
  `codigo` int NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obrassociales`
--

INSERT INTO `obrassociales` (`codigo`, `nombre`) VALUES
(1, 'Apros'),
(2, 'Osde'),
(3, 'Swiss Medical'),
(4, 'Galeno'),
(5, 'SanCor Salud'),
(6, 'Omint'),
(7, 'Medice'),
(8, 'Medius'),
(9, 'Acord'),
(10, 'No tiene');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int UNSIGNED NOT NULL,
  `name_paciente` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dire` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `obra` int NOT NULL,
  `dni` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `name_paciente`, `surname`, `dire`, `phone`, `obra`, `dni`) VALUES
(1, 'asd', 'asd', 'asdsd', 'sads', 9, 23213);

-- --------------------------------------------------------

--
-- Table structure for table `prioridades`
--

CREATE TABLE `prioridades` (
  `codigo` int NOT NULL,
  `descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prioridades`
--

INSERT INTO `prioridades` (`codigo`, `descripcion`) VALUES
(1, 'Emergencia'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `profile_123`
--

CREATE TABLE `profile_123` (
  `id_profile` int UNSIGNED NOT NULL,
  `user` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `biography` varchar(90) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `url_profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_123`
--

INSERT INTO `profile_123` (`id_profile`, `user`, `status`, `biography`, `phone`, `url_profile`) VALUES
(1, '123', 'SIN DATOS ', 'SIN DATOS ', 'SIN DATOS ', './profile_name/kung.jpg'),
(2, '123', 'SIN DATOS ', 'SIN DATOS ', 'SIN DATOS ', './profile_name/kung.jpg'),
(3, '123', 'SIN DATOS ', 'SIN DATOS ', 'SIN DATOS ', './profile_name/kung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_3213`
--

CREATE TABLE `profile_3213` (
  `id_profile` int UNSIGNED NOT NULL,
  `user` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `biography` varchar(90) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `url_profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_3213`
--

INSERT INTO `profile_3213` (`id_profile`, `user`, `status`, `biography`, `phone`, `url_profile`) VALUES
(1, 'Pedro', 'SIN DATOS ', 'SIN DATOS ', 'SIN DATOS ', './profile_name/Pañol_3.png'),
(2, 'Pedro', 'dsad', 'dsad', 'asd', './profile_name/Pañol_3.png'),
(3, 'Pedro', 'Pepe', 'ssad', '121', './profile_name/Pañol_3.png'),
(4, 'Pedro', 'Pepe', 'ssad', '121', './profile_name/Pañol_3.png'),
(5, 'Pedro', 'adsad', 'ssad', '121', './profile_name/Pañol_3.png'),
(6, 'Pedro', '1', 'ssad', '121', './profile_name/Pañol_3.png'),
(7, 'Pedro', '3213', 'ssad', '121', './profile_name/Pañol_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `profile_admin`
--

CREATE TABLE `profile_admin` (
  `id_profile` int UNSIGNED NOT NULL,
  `user` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `biography` varchar(90) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `url_profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_admin`
--

INSERT INTO `profile_admin` (`id_profile`, `user`, `status`, `biography`, `phone`, `url_profile`) VALUES
(1, 'admin', 'SIN DATOS ', 'SIN DATOS ', 'SIN DATOS ', './img/default_pic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `DNI` int NOT NULL,
  `num_mat` int NOT NULL,
  `name2` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `especialidad` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`DNI`, `num_mat`, `name2`, `surname`, `especialidad`, `email`, `tel`, `password`) VALUES
(3213, 312321, 'Pedro', 'Alva', '10', 'alba@gmail.com', '123213', '1234'),
(123, 123, '123', '123', '4', '123@123.123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int UNSIGNED NOT NULL,
  `dni` varchar(10) NOT NULL,
  `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(20) NOT NULL,
  `description` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `medicamentos` varchar(60) NOT NULL,
  `patologias` varchar(30) NOT NULL,
  `zona` varchar(15) NOT NULL,
  `fecha_turno` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `time_estimated` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `prioridad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`id_turno`, `dni`, `title`, `surname`, `description`, `medicamentos`, `patologias`, `zona`, `fecha_turno`, `time`, `time_estimated`, `status`, `prioridad`) VALUES
(17, '23213', 'asd', 'asd', 'Dolor de cabeza', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '16:48:50', '17:03:50', 'ACCEPT', 1),
(18, '23213', 'asd', 'asd', 'Dolor de muela', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Cardiologia', '2022-11-16', '20:56:43', '21:11:43', 'PENDING', 2),
(19, '23213', 'asd', 'asd', 'Dolor de muela', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Cardiologia', '2022-11-16', '21:27:36', '21:42:36', 'PENDING', 2),
(20, '44370506', '', '', '1123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:27:41', '21:42:41', 'PENDING', 2),
(21, '123', '', '', '123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Cardiologia', '2022-11-16', '21:28:37', '21:43:37', 'PENDING', 2),
(22, '123213', '', '', '123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Cardiologia', '2022-11-16', '21:31:25', '21:46:25', 'PENDING', 1),
(23, '213123321', '', '', '231', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:31:48', '21:46:48', 'ACCEPT', 1),
(24, '123', '', '', '123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:32:27', '21:47:27', 'PENDING', 1),
(25, '213123', '', '', '123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:32:46', '21:47:46', 'PENDING', 1),
(26, '123321132', '', '', '12', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:33:57', '21:48:57', 'PENDING', 1),
(27, '123213321', '', '', '123321', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:34:22', '21:49:22', 'PENDING', 1),
(28, '123312', '', '', '12', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:34:38', '21:49:38', 'PENDING', 1),
(29, '23', '', '', '213', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', 'Guardia', '2022-11-16', '21:34:50', '21:49:50', 'ACCEPT', 1),
(30, '23213', 'asd', 'asd', 'Dolor de muela', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '8', '2022-11-16', '21:51:50', '22:06:50', 'ACCEPT', 1),
(31, '23213', 'asd', 'asd', 'Dolor de muela', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '8', '2022-11-16', '23:44:53', '23:59:53', 'PENDING', 1),
(32, '23213', 'asd', 'asd', '123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '8', '2022-11-16', '23:45:08', '00:00:08', 'PENDING', 2),
(33, '23213', 'asd', 'asd', '123123', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '4', '2022-11-16', '23:45:48', '00:00:48', 'PENDING', 1),
(34, '44370506', '', '', '123132', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '1', '2022-11-17', '21:27:12', '21:42:12', 'PENDING', 1),
(35, '23213', 'asd', 'asd', '321312', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '1', '2022-11-17', '21:27:18', '21:42:18', 'PENDING', 1),
(36, '23213', 'asd', 'asd', 'Dolor de Cabeza', 'SIN CONSUMO DE MEDICAMENTOS', 'SIN PATOLOGIAS PREVIAS', '5', '2022-11-18', '08:29:49', '08:44:49', 'PENDING', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` int NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zonas`
--

INSERT INTO `zonas` (`id_zona`, `nombre`, `descripcion`) VALUES
(1, 'Guardia', 'Abierto 24 Hrs'),
(2, 'Cardiologia', 'Para el corazón'),
(3, 'Pediatria', 'Para niños');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `obrassociales`
--
ALTER TABLE `obrassociales`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indexes for table `prioridades`
--
ALTER TABLE `prioridades`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `profile_123`
--
ALTER TABLE `profile_123`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `profile_3213`
--
ALTER TABLE `profile_3213`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `profile_admin`
--
ALTER TABLE `profile_admin`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `obrassociales`
--
ALTER TABLE `obrassociales`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prioridades`
--
ALTER TABLE `prioridades`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile_123`
--
ALTER TABLE `profile_123`
  MODIFY `id_profile` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile_3213`
--
ALTER TABLE `profile_3213`
  MODIFY `id_profile` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile_admin`
--
ALTER TABLE `profile_admin`
  MODIFY `id_profile` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
