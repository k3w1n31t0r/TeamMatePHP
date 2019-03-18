-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2019 a las 20:14:12
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
-- Estructura de tabla para la tabla `help_desk_activity_agent_admin`
--

CREATE TABLE `help_desk_activity_agent_admin` (
  `id` int(11) NOT NULL,
  `descrip` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sub_date` date NOT NULL,
  `time` time NOT NULL,
  `activ_type_id_id` int(11) NOT NULL,
  `ticket_id_id` int(11) NOT NULL,
  `user_id_id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_admin`
--

CREATE TABLE `help_desk_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `job_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `profile_picture` varchar(30) CHARACTER SET utf8 NOT NULL,
  `fk_username_admin` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(34) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `help_desk_admin`
--

INSERT INTO `help_desk_admin` (`id`, `name`, `email`, `job_title`, `profile_picture`, `fk_username_admin`, `telephone`) VALUES
(5, 'administradorNOM', '', '', '', 'administradorNOM', ''),
(6, 'administrador2', '12@hotmail.com', 'administrador2', '', 'administrador2', 'administrador2');

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
(22, 'usuarioAgente', 'usuarioAgente@hotmail.com', '123321123', 'Agente', NULL, NULL, 'e31a68073e84995965797418415a134d.jpg', 2, 'usuarioAgente'),
(23, 'administradorNOM', 'administrador@hotmail.com', NULL, 'ADMIN', NULL, NULL, '', 0, 'administradorNOM'),
(25, 'administrador2', '12@hotmail.com', 'administrador2', 'administrador2', NULL, NULL, '', 0, 'administrador2');

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
(21, 'usuarioCliente', 'usuarioCliente@hotmail.com', '3309823709', 'Cliente', '4b1d5b71dfe91c69423f67be483d77c0.jpg', 1, 'usuarioCliente'),
(22, 'administradorNOM', 'administrador@hotmail.com', NULL, NULL, '', 0, 'administradorNOM'),
(24, 'administrador2', '12@hotmail.com', 'administrador2', 'administrador2', '', 0, 'administrador2');

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
(0, 'ADMIN', NULL, NULL, NULL),
(1, 'HP', 'Calle Montemorelos 299, Loma Bonita, 45060 Zapopan, Jal.', '01 33 3134 7400', 'Matutino'),
(2, 'Intel', 'Av del Bosque 1001, Bajío, 45019 Zapopan, Jalisco', '01 33 1645 0000', 'Matutino'),
(3, 'Oracle', 'Av. Empresarios 135 Piso 4', ' 01 33 1253 1000', 'Matutino'),
(4, 'UDG', 'UDG', 'asda', 'asdasd');

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
(0, 'ADMIN'),
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
  `priority_id_id` int(11) DEFAULT NULL,
  `project_id_id` int(11) NOT NULL,
  `status_id_id` int(11) DEFAULT NULL,
  `type_id_id` int(11) NOT NULL,
  `user_id_id` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_ticket`
--

INSERT INTO `help_desk_ticket` (`id_ticket`, `subject`, `descrip`, `ind_asign`, `sub_date`, `due_date`, `close_date`, `priority_id_id`, `project_id_id`, `status_id_id`, `type_id_id`, `user_id_id`, `activo`) VALUES
(7, 'Primer', 'Primer ticket de un usuario', 1, '2019-03-12 05:02:47.000000', NULL, NULL, 2, 1, 1, 1, 'usuarioCliente', 1),
(8, 'asd', 'asd', 0, '2019-03-17 19:20:43.000000', NULL, NULL, NULL, 1, 1, 1, 'usuarioCliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_ticket_activity`
--

CREATE TABLE `help_desk_ticket_activity` (
  `id` int(11) NOT NULL,
  `descrip` longtext NOT NULL,
  `sub_date` date NOT NULL,
  `time` time NOT NULL,
  `activ_type_id_id` int(11) NOT NULL,
  `ticket_id_id` int(11) NOT NULL,
  `user_agent_id_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_ticket_activity`
--

INSERT INTO `help_desk_ticket_activity` (`id`, `descrip`, `sub_date`, `time`, `activ_type_id_id`, `ticket_id_id`, `user_agent_id_id`) VALUES
(4, 'Holis, necesito aiuda', '2019-03-11', '22:23:16', 1, 7, 'usuarioCliente');

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
(9, '2019-03-11 22:45:46.000000', 7, 22, 21),
(10, '2019-03-11 22:45:46.000000', 7, 23, 21);

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
  `type` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_ticket_stats`
--

INSERT INTO `help_desk_ticket_stats` (`id`, `descrip`, `type`) VALUES
(1, 'Abierto', 'class=\"label label-success\"'),
(2, 'En progreso', 'class=\"label label-warning\"'),
(3, 'Terminado', 'class=\"label label-danger\"'),
(5, 'Cerrado', 'class=\"label label-primary\"');

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
-- Estructura de tabla para la tabla `help_desk_type_account`
--

CREATE TABLE `help_desk_type_account` (
  `id_tipo_cuenta` int(11) NOT NULL,
  `tipo_cuenta` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `help_desk_type_account`
--

INSERT INTO `help_desk_type_account` (`id_tipo_cuenta`, `tipo_cuenta`) VALUES
(1, 'admin'),
(2, 'cliente'),
(3, 'agente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `help_desk_user_account`
--

CREATE TABLE `help_desk_user_account` (
  `username` varchar(20) NOT NULL,
  `password` varchar(254) NOT NULL,
  `type` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `profile_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `help_desk_user_account`
--

INSERT INTO `help_desk_user_account` (`username`, `password`, `type`, `correo`, `activo`, `profile_picture`) VALUES
('administrador2', 'qaqL', 1, '12@hotmail.com', 0, '22d56621ed23b30fa078e5dbb14ad885.bmp'),
('administradorNOM', '2dzFvaGd4MGm1ZfH6g==', 1, 'administrador@teammate.com', 1, '461a51db5ca1f2e24a5244388ab826e6.jpg 	'),
('usuarioAgente', 'qaqL', 3, 'usuarioAgente@hotmail.com', 1, 'e31a68073e84995965797418415a134d.jpg'),
('usuarioCliente', 'qaqL', 2, 'usuarioCliente@hotmail.com', 1, '4b1d5b71dfe91c69423f67be483d77c0.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `help_desk_activity_agent_admin`
--
ALTER TABLE `help_desk_activity_agent_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username_aa` (`user_id_id`),
  ADD KEY `fk_ticket_activity` (`activ_type_id_id`),
  ADD KEY `ticket_act_fk_help_desk` (`ticket_id_id`);

--
-- Indices de la tabla `help_desk_admin`
--
ALTER TABLE `help_desk_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_admin` (`fk_username_admin`);

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
  ADD KEY `kkk` (`user_client_id_id`);

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
-- Indices de la tabla `help_desk_type_account`
--
ALTER TABLE `help_desk_type_account`
  ADD PRIMARY KEY (`id_tipo_cuenta`);

--
-- Indices de la tabla `help_desk_user_account`
--
ALTER TABLE `help_desk_user_account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_type` (`type`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `help_desk_activity_agent_admin`
--
ALTER TABLE `help_desk_activity_agent_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `help_desk_admin`
--
ALTER TABLE `help_desk_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `help_desk_agent`
--
ALTER TABLE `help_desk_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `help_desk_client`
--
ALTER TABLE `help_desk_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `help_desk_company`
--
ALTER TABLE `help_desk_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_activity`
--
ALTER TABLE `help_desk_ticket_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `help_desk_ticket_asign`
--
ALTER TABLE `help_desk_ticket_asign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de la tabla `help_desk_type_account`
--
ALTER TABLE `help_desk_type_account`
  MODIFY `id_tipo_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `help_desk_activity_agent_admin`
--
ALTER TABLE `help_desk_activity_agent_admin`
  ADD CONSTRAINT `fk_ticket_activity` FOREIGN KEY (`activ_type_id_id`) REFERENCES `help_desk_ticket_stats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username_aa` FOREIGN KEY (`user_id_id`) REFERENCES `help_desk_user_account` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_act_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_admin`
--
ALTER TABLE `help_desk_admin`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`fk_username_admin`) REFERENCES `help_desk_user_account` (`username`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_agent`
--
ALTER TABLE `help_desk_agent`
  ADD CONSTRAINT `fk_username_agente` FOREIGN KEY (`fk_username_agente`) REFERENCES `help_desk_user_account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_agent_team_id_id_72c552ae_fk_help_desk_team_id` FOREIGN KEY (`team_id_id`) REFERENCES `help_desk_team` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_client`
--
ALTER TABLE `help_desk_client`
  ADD CONSTRAINT `fk_username_cliente_` FOREIGN KEY (`fk_username_cliente`) REFERENCES `help_desk_user_account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_client_company_id_id_d76dd55b_fk_help_desk_company_id` FOREIGN KEY (`company_id_id`) REFERENCES `help_desk_company` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_company_project`
--
ALTER TABLE `help_desk_company_project`
  ADD CONSTRAINT `help_desk_company_pr_company_id_id_3d6f2105_fk_help_desk` FOREIGN KEY (`company_id_id`) REFERENCES `help_desk_company` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_company_pr_project_id_id_f266acee_fk_help_desk` FOREIGN KEY (`project_id_id`) REFERENCES `help_desk_project` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_ticket`
--
ALTER TABLE `help_desk_ticket`
  ADD CONSTRAINT `help_desk_ticket_ibfk_1` FOREIGN KEY (`type_id_id`) REFERENCES `help_desk_ticket_type` (`id_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_ibfk_2` FOREIGN KEY (`priority_id_id`) REFERENCES `help_desk_ticket_priority` (`id_prioridad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_project_id_id_ca50a9f6_fk_help_desk_project_id` FOREIGN KEY (`project_id_id`) REFERENCES `help_desk_project` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_status_id_id_2a105cc1_fk_help_desk` FOREIGN KEY (`status_id_id`) REFERENCES `help_desk_ticket_stats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_user_id_id_6305e410_fk_help_desk` FOREIGN KEY (`user_id_id`) REFERENCES `help_desk_user_account` (`username`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_ticket_activity`
--
ALTER TABLE `help_desk_ticket_activity`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`user_agent_id_id`) REFERENCES `help_desk_user_account` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_act_activ_type_id_id_ce6a9a6d_fk_help_desk` FOREIGN KEY (`activ_type_id_id`) REFERENCES `help_desk_ticket_stats` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_act_ticket_id_id_def5c1e0_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_ticket_asign`
--
ALTER TABLE `help_desk_ticket_asign`
  ADD CONSTRAINT `fk_user_agente` FOREIGN KEY (`user_agent_id_id`) REFERENCES `help_desk_agent` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_asi_ticket_id_id_7139c7e0_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kkk` FOREIGN KEY (`user_client_id_id`) REFERENCES `help_desk_client` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `help_desk_ticket_tra_ticket_id_id_dd4db308_fk_help_desk` FOREIGN KEY (`ticket_id_id`) REFERENCES `help_desk_ticket` (`id_ticket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `help_desk_ticket_tra_user_id_id_30771084_fk_help_desk` FOREIGN KEY (`user_id_id`) REFERENCES `help_desk_user_account` (`username`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `help_desk_user_account`
--
ALTER TABLE `help_desk_user_account`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `help_desk_type_account` (`id_tipo_cuenta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
