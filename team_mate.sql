-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2019 a las 07:01:07
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `team_mate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_agent`
--

CREATE TABLE `help_desk_agent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `ind_supervisor` int(11) DEFAULT NULL,
  `ind_suspend` int(11) DEFAULT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `team_id_id` int(11) NOT NULL,
  `fk_username_agente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_agent`
--

INSERT INTO `help_desk_agent` (`id`, `name`, `email`, `telephone`, `job_title`, `ind_supervisor`, `ind_suspend`, `profile_picture`, `team_id_id`, `fk_username_agente`) VALUES
(1, 'El keven agente', 'elkevenagente@hotmail.com', '9999999', 'Estudiante', NULL, NULL, '', 1, 'Keven agente'),
(2, 'La estrella  agente', 'Laestrellaagente@hotmail.com', '1111111', 'Estudiante', NULL, NULL, '', 2, 'Estrella agente'),
(3, 'El pablo agente', 'pablo@agente.com', '123345567', '00000', NULL, NULL, '', 3, 'Pablo agente'),
(8, 'Gael Valenzuela', '12@hotmail.com', '123321', 'no c', NULL, NULL, '', 1, 'Gaelw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_client`
--

CREATE TABLE `help_desk_client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `company_id_id` int(11) NOT NULL,
  `fk_username_cliente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_client`
--

INSERT INTO `help_desk_client` (`id`, `name`, `email`, `telephone`, `job_title`, `profile_picture`, `company_id_id`, `fk_username_cliente`) VALUES
(1, 'Keven Maria Valenzuela cliente', 'Keven.mv@hotmail.com', '3317\'81392', 'Desarrollador', '', 2, 'Keven cliente'),
(2, 'Estrella montiel sanchez cliente', 'lastar@hotmail.com', '331781300', 'Desarrolladoraa', '', 2, 'Estrella cliente'),
(3, 'Pablo cliente', 'pabloliente@hotmail.com', '331781300', 'Desarrollador6', '', 1, 'Pablo agente'),
(4, 'Santoyo cliente', 'pabloliente@hotmail.com', '331781300', 'Desarrollador6', '', 3, 'Santoyo cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_company`
--

CREATE TABLE `help_desk_company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `bussiness_turn` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_company`
--

INSERT INTO `help_desk_company` (`id`, `name`, `address`, `telephone`, `bussiness_turn`) VALUES
(1, 'HP', 'Calle Montemorelos 299, Loma Bonita, 45060 Zapopan, Jal.', '01 33 3134 7400', 'Matutino'),
(2, 'Intel', 'Av del Bosque 1001, Bajío, 45019 Zapopan, Jalisco', '01 33 1645 0000', 'Matutino'),
(3, 'Oracle', 'Av. Empresarios 135 Piso 4', ' 01 33 1253 1000', 'Matutino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_company_project`
--

CREATE TABLE `help_desk_company_project` (
  `id` int(11) NOT NULL,
  `ind_date` date NOT NULL,
  `fin_date` date DEFAULT NULL,
  `company_id_id` int(11) NOT NULL,
  `project_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_company_project`
--

INSERT INTO `help_desk_company_project` (`id`, `ind_date`, `fin_date`, `company_id_id`, `project_id_id`) VALUES
(1, '2019-02-01', '0000-00-00', 1, 1),
(2, '2019-02-26', '0000-00-00', 2, 2),
(4, '2019-02-27', NULL, 3, 3),
(5, '2019-02-01', '0000-00-00', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_project`
--

CREATE TABLE `help_desk_project` (
  `id` int(11) NOT NULL,
  `descrip_p` varchar(100) NOT NULL,
  `ind_suspend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_project`
--

INSERT INTO `help_desk_project` (`id`, `descrip_p`, `ind_suspend`) VALUES
(1, 'Proyecto numero 1', 0),
(2, 'Proyecto numero 2', 0),
(3, 'Proyecto 3', 0),
(4, 'proyecto4 HP', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_team`
--

CREATE TABLE `help_desk_team` (
  `id` int(11) NOT NULL,
  `descrip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_team`
--

INSERT INTO `help_desk_team` (`id`, `descrip`) VALUES
(1, 'EQUIPO 1'),
(2, 'EQUIPO 2'),
(3, 'equipo 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket`
--

CREATE TABLE `help_desk_ticket` (
  `id_ticket` int(11) NOT NULL,
  `subject` varchar(254) NOT NULL,
  `descrip` longtext,
  `ind_asign` int(11) DEFAULT NULL,
  `sub_date` datetime(6) NOT NULL,
  `due_date` datetime(6) DEFAULT NULL,
  `close_date` datetime(6) DEFAULT NULL,
  `priority_id_id` int(11) NOT NULL,
  `project_id_id` int(11) NOT NULL,
  `status_id_id` int(11) NOT NULL,
  `type_id_id` int(11) NOT NULL,
  `user_id_id` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_ticket`
--

INSERT INTO `help_desk_ticket` (`id_ticket`, `subject`, `descrip`, `ind_asign`, `sub_date`, `due_date`, `close_date`, `priority_id_id`, `project_id_id`, `status_id_id`, `type_id_id`, `user_id_id`, `activo`) VALUES
(22, '123', '123', 1, '2019-02-20 05:51:05.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 1),
(23, '123', '123', 1, '2019-02-20 05:56:01.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 1),
(24, '213', '123213', 1, '2019-02-20 06:02:22.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 0),
(25, '213', '123213', 1, '2019-02-20 06:02:22.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 0),
(26, '213', '123213', 1, '2019-02-20 06:02:22.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 0),
(31, 'value=\"1\"', 'value=\"1\"', 1, '2019-02-24 00:13:51.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 1),
(32, 'session_start();', 'session_start();', 1, '2019-02-24 00:47:18.000000', NULL, NULL, 1, 1, 1, 1, 'administradorNOM', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_activity`
--

CREATE TABLE `help_desk_ticket_activity` (
  `id` int(11) NOT NULL,
  `descrip` longtext NOT NULL,
  `sub_date` date NOT NULL,
  `time` int(11) NOT NULL,
  `activ_type_id_id` int(11) NOT NULL,
  `ticket_id_id` int(11) NOT NULL,
  `user_agent_id_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_asign`
--

CREATE TABLE `help_desk_ticket_asign` (
  `id` int(11) NOT NULL,
  `asign_date` datetime(6) DEFAULT NULL,
  `ticket_id_id` int(11) DEFAULT NULL,
  `user_agent_id_id` int(11) DEFAULT NULL,
  `user_client_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_ticket_asign`
--

INSERT INTO `help_desk_ticket_asign` (`id`, `asign_date`, `ticket_id_id`, `user_agent_id_id`, `user_client_id_id`) VALUES
(1, '2019-02-21 00:00:00.000000', 22, 1, 1),
(2, '2019-02-21 00:00:00.000000', 23, 2, 1),
(3, '2019-02-23 00:00:00.000000', 32, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_log`
--

CREATE TABLE `help_desk_ticket_log` (
  `id` int(11) NOT NULL,
  `descrip` varchar(50) NOT NULL,
  `log_date` datetime(6) NOT NULL,
  `ticket_id_id` int(11) NOT NULL,
  `user_id_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_priority`
--

CREATE TABLE `help_desk_ticket_priority` (
  `id_prioridad` int(11) NOT NULL,
  `prioridad` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `help_desk_ticket_priority`
--

INSERT INTO `help_desk_ticket_priority` (`id_prioridad`, `prioridad`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_stats`
--

CREATE TABLE `help_desk_ticket_stats` (
  `id` int(11) NOT NULL,
  `descrip` varchar(20) NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_ticket_stats`
--

INSERT INTO `help_desk_ticket_stats` (`id`, `descrip`, `type`) VALUES
(1, 'Abierto', 'A'),
(2, 'En progreso', 'P'),
(3, 'Terminado', 'T'),
(5, 'Cerrado', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_tracking`
--

CREATE TABLE `help_desk_ticket_tracking` (
  `id` int(11) NOT NULL,
  `descrip` longtext NOT NULL,
  `sub_date` datetime(6) NOT NULL,
  `ticket_id_id` int(11) NOT NULL,
  `user_id_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_type`
--

CREATE TABLE `help_desk_ticket_type` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `help_desk_ticket_type`
--

INSERT INTO `help_desk_ticket_type` (`id_tipo`, `tipo`) VALUES
(1, 'Problema'),
(2, 'Consulta'),
(3, 'Reunion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_user_account`
--

CREATE TABLE `help_desk_user_account` (
  `username` varchar(20) NOT NULL,
  `password` varchar(254) NOT NULL,
  `type` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_user_account`
--

INSERT INTO `help_desk_user_account` (`username`, `password`, `type`, `correo`) VALUES
('administradorNOM', 'administrador', 1, 'administrador@teammate.com'),
('Estrella ', '1234', 1, 'Estrella@hotmail.com'),
('Estrella agente', '1234', 2, 'Estrellagente@hotmail.com'),
('Estrella cliente', '1234', 3, 'Estrellacliente@hotmail.com'),
('Gaelw', '123', 2, '12@hotmail.com'),
('Keven', '123', 1, 'keven.mv@hotmail.com'),
('Keven agente', '123', 2, 'keven.mvAgente@hotmail.com'),
('Keven cliente', '123', 3, 'keven.mvCliente@hotmail.com'),
('Pablo', '1234', 1, 'Pablo@hotmail.com'),
('Pablo agente', '1234', 2, 'Pabloagente@hotmail.com'),
('Pablo cliente', '1234', 3, 'PabloCliente@hotmail.com'),
('Santoyo cliente', '1234', 3, 'Santoyo@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noc`
--

CREATE TABLE `noc` (
  `kk` int(11) NOT NULL,
  `kk2` varchar(123) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noc`
--

INSERT INTO `noc` (`kk`, `kk2`) VALUES
(1, 'Algo perron'),
(2, '123123'),
(3, '123123'),
(4, '123123'),
(5, '2019-02-20 05:35:12'),
(6, '1'),
(7, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `help_desk_agent`
--
ALTER TABLE `help_desk_agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_agent_team_id_id_72c552ae_fk_help_desk_team_id` (`team_id_id`),
  ADD KEY `fk_username_agente` (`fk_username_agente`);

--
-- Indices de la tabla `help_desk_client`
--
ALTER TABLE `help_desk_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_client_company_id_id_d76dd55b_fk_help_desk_company_id` (`company_id_id`),
  ADD KEY `fk_username_cliente_` (`fk_username_cliente`);

--
-- Indices de la tabla `help_desk_company`
--
ALTER TABLE `help_desk_company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `help_desk_company_project`
--
ALTER TABLE `help_desk_company_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_company_pr_company_id_id_3d6f2105_fk_help_desk` (`company_id_id`),
  ADD KEY `help_desk_company_pr_project_id_id_f266acee_fk_help_desk` (`project_id_id`);

--
-- Indices de la tabla `help_desk_project`
--
ALTER TABLE `help_desk_project`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `help_desk_team`
--
ALTER TABLE `help_desk_team`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `help_desk_ticket`
--
ALTER TABLE `help_desk_ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `help_desk_ticket_priority_id_id_2d8aa139_fk_help_desk` (`priority_id_id`),
  ADD KEY `help_desk_ticket_project_id_id_ca50a9f6_fk_help_desk_project_id` (`project_id_id`),
  ADD KEY `help_desk_ticket_status_id_id_2a105cc1_fk_help_desk` (`status_id_id`),
  ADD KEY `help_desk_ticket_type_id_id_796fb420_fk_help_desk` (`type_id_id`),
  ADD KEY `help_desk_ticket_user_id_id_6305e410_fk_help_desk` (`user_id_id`);

--
-- Indices de la tabla `help_desk_ticket_activity`
--
ALTER TABLE `help_desk_ticket_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_ticket_act_activ_type_id_id_ce6a9a6d_fk_help_desk` (`activ_type_id_id`),
  ADD KEY `help_desk_ticket_act_ticket_id_id_def5c1e0_fk_help_desk` (`ticket_id_id`),
  ADD KEY `help_desk_ticket_act_user_agent_id_id_b07f2f66_fk_help_desk` (`user_agent_id_id`);

--
-- Indices de la tabla `help_desk_ticket_asign`
--
ALTER TABLE `help_desk_ticket_asign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_ticket_asi_ticket_id_id_7139c7e0_fk_help_desk` (`ticket_id_id`),
  ADD KEY `help_desk_ticket_asi_user_agent_id_id_6cb8660a_fk_help_desk` (`user_agent_id_id`),
  ADD KEY `fk_user_cliente` (`user_client_id_id`);

--
-- Indices de la tabla `help_desk_ticket_log`
--
ALTER TABLE `help_desk_ticket_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_ticket_log_ticket_id_id_e39ae239_fk_help_desk` (`ticket_id_id`),
  ADD KEY `help_desk_ticket_log_user_id_id_e81add9e_fk_help_desk` (`user_id_id`);

--
-- Indices de la tabla `help_desk_ticket_priority`
--
ALTER TABLE `help_desk_ticket_priority`
  ADD PRIMARY KEY (`id_prioridad`);

--
-- Indices de la tabla `help_desk_ticket_stats`
--
ALTER TABLE `help_desk_ticket_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `help_desk_ticket_tracking`
--
ALTER TABLE `help_desk_ticket_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_desk_ticket_tra_ticket_id_id_dd4db308_fk_help_desk` (`ticket_id_id`),
  ADD KEY `help_desk_ticket_tra_user_id_id_30771084_fk_help_desk` (`user_id_id`);

--
-- Indices de la tabla `help_desk_ticket_type`
--
ALTER TABLE `help_desk_ticket_type`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `help_desk_user_account`
--
ALTER TABLE `help_desk_user_account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_type` (`type`);

--
-- Indices de la tabla `noc`
--
ALTER TABLE `noc`
  ADD PRIMARY KEY (`kk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `help_desk_agent`
--
ALTER TABLE `help_desk_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `help_desk_client`
--
ALTER TABLE `help_desk_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `help_desk_company`
--
ALTER TABLE `help_desk_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `help_desk_company_project`
--
ALTER TABLE `help_desk_company_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `help_desk_project`
--
ALTER TABLE `help_desk_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `help_desk_team`
--
ALTER TABLE `help_desk_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket`
--
ALTER TABLE `help_desk_ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_activity`
--
ALTER TABLE `help_desk_ticket_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_asign`
--
ALTER TABLE `help_desk_ticket_asign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_log`
--
ALTER TABLE `help_desk_ticket_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_priority`
--
ALTER TABLE `help_desk_ticket_priority`
  MODIFY `id_prioridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_stats`
--
ALTER TABLE `help_desk_ticket_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_tracking`
--
ALTER TABLE `help_desk_ticket_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_type`
--
ALTER TABLE `help_desk_ticket_type`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noc`
--
ALTER TABLE `noc`
  MODIFY `kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `help_desk_agent`
--
ALTER TABLE `help_desk_agent`
  ADD CONSTRAINT `fk_username_agente` FOREIGN KEY (`fk_username_agente`) REFERENCES `help_desk_user_account` (`username`),
  ADD CONSTRAINT `help_desk_agent_team_id_id_72c552ae_fk_help_desk_team_id` FOREIGN KEY (`team_id_id`) REFERENCES `help_desk_team` (`id`);

--
-- Filtros para la tabla `help_desk_client`
--
ALTER TABLE `help_desk_client`
  ADD CONSTRAINT `fk_username_cliente_` FOREIGN KEY (`fk_username_cliente`) REFERENCES `help_desk_user_account` (`username`),
  ADD CONSTRAINT `help_desk_client_company_id_id_d76dd55b_fk_help_desk_company_id` FOREIGN KEY (`company_id_id`) REFERENCES `help_desk_company` (`id`);

--
-- Filtros para la tabla `help_desk_company_project`
--
ALTER TABLE `help_desk_company_project`
  ADD CONSTRAINT `help_desk_company_pr_company_id_id_3d6f2105_fk_help_desk` FOREIGN KEY (`company_id_id`) REFERENCES `help_desk_company` (`id`),
  ADD CONSTRAINT `help_desk_company_pr_project_id_id_f266acee_fk_help_desk` FOREIGN KEY (`project_id_id`) REFERENCES `help_desk_project` (`id`);

--
-- Filtros para la tabla `help_desk_ticket`
--
ALTER TABLE `help_desk_ticket`
  ADD CONSTRAINT `help_desk_ticket_ibfk_1` FOREIGN KEY (`type_id_id`) REFERENCES `help_desk_ticket_type` (`id_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_ibfk_2` FOREIGN KEY (`priority_id_id`) REFERENCES `help_desk_ticket_priority` (`id_prioridad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_project_id_id_ca50a9f6_fk_help_desk_project_id` FOREIGN KEY (`project_id_id`) REFERENCES `help_desk_project` (`id`),
  ADD CONSTRAINT `help_desk_ticket_status_id_id_2a105cc1_fk_help_desk` FOREIGN KEY (`status_id_id`) REFERENCES `help_desk_ticket_stats` (`id`),
  ADD CONSTRAINT `help_desk_ticket_user_id_id_6305e410_fk_help_desk` FOREIGN KEY (`user_id_id`) REFERENCES `help_desk_user_account` (`username`);

--
-- Filtros para la tabla `help_desk_ticket_activity`
--
ALTER TABLE `help_desk_ticket_activity`
  ADD CONSTRAINT `help_desk_ticket_act_activ_type_id_id_ce6a9a6d_fk_help_desk` FOREIGN KEY (`activ_type_id_id`) REFERENCES `help_desk_ticket_stats` (`id`),
  ADD CONSTRAINT `help_desk_ticket_act_ticket_id_id_def5c1e0_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`),
  ADD CONSTRAINT `help_desk_ticket_act_user_agent_id_id_b07f2f66_fk_help_desk` FOREIGN KEY (`user_agent_id_id`) REFERENCES `help_desk_user_account` (`username`);

--
-- Filtros para la tabla `help_desk_ticket_asign`
--
ALTER TABLE `help_desk_ticket_asign`
  ADD CONSTRAINT `fk_user_agente` FOREIGN KEY (`user_agent_id_id`) REFERENCES `help_desk_agent` (`id`),
  ADD CONSTRAINT `help_desk_ticket_asi_ticket_id_id_7139c7e0_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`),
  ADD CONSTRAINT `kkk` FOREIGN KEY (`user_client_id_id`) REFERENCES `help_desk_client` (`id`);

--
-- Filtros para la tabla `help_desk_ticket_log`
--
ALTER TABLE `help_desk_ticket_log`
  ADD CONSTRAINT `help_desk_ticket_log_ticket_id_id_e39ae239_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`),
  ADD CONSTRAINT `help_desk_ticket_log_user_id_id_e81add9e_fk_help_desk` FOREIGN KEY (`user_id_id`) REFERENCES `help_desk_user_account` (`username`);

--
-- Filtros para la tabla `help_desk_ticket_tracking`
--
ALTER TABLE `help_desk_ticket_tracking`
  ADD CONSTRAINT `help_desk_ticket_tra_ticket_id_id_dd4db308_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`),
  ADD CONSTRAINT `help_desk_ticket_tra_user_id_id_30771084_fk_help_desk` FOREIGN KEY (`user_id_id`) REFERENCES `help_desk_user_account` (`username`);

--
-- Filtros para la tabla `help_desk_user_account`
--
ALTER TABLE `help_desk_user_account`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `help_desk_type_account` (`id_tipo_cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
