-- El meu usuari mysql.
CREATE USER 'nelipe'@'localhost' IDENTIFIED BY 'pirineus';
GRANT ALL PRIVILEGES ON neiman_elipe_iticdesk.* TO 'nelipe'@'localhost'
FLUSH PRIVILEGES;

CREATE DATABASE neiman_elipe_iticdesk;

USE  neiman_elipe_iticdesk;



-- Servidor: localhost:3306
-- Tiempo de generación: 23-02-2025 a las 16:22:47
-- Versión del servidor: 8.0.41-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `neiman_elipe_iticdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencies`
--

CREATE TABLE `incidencies` (
  `id` int NOT NULL,
  `referencia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prioritat` enum('Tipus I','Tipus II','Tipus III','Tipus IV') NOT NULL,
  `titol` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usuari_email` varchar(100) NOT NULL,
  `data_creacio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estat` enum('Oberta','Gestió','Tancada','Reoberta') NOT NULL DEFAULT 'Oberta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidencies`
--

INSERT INTO `incidencies` (`id`, `referencia`, `prioritat`, `titol`, `descripcio`, `usuari_email`, `data_creacio`, `estat`) VALUES
(1, 'REF67b38df5f3b7b', 'Tipus III', 'HOla', 'asdasd', 'neimanelipe@iticdesk.bcn', '2025-02-17 19:29:03', 'Oberta'),
(2, 'REF67bb44c39b743', 'Tipus II', 'PROVA', 'SIONO', 'neimanelipe@iticdesk.bcn', '2025-02-23 15:54:53', 'Oberta'),
(3, 'REF67bb45335986a', 'Tipus III', 'TTT', 'TTT', 'neimanelipe@iticdesk.bcn', '2025-02-23 15:56:43', 'Oberta'),
(4, 'REF67bb460509674', 'Tipus III', 'OLE', 'sio', 'neimanelipe@iticdesk.bcn', '2025-02-23 16:00:14', 'Oberta'),
(5, 'REF67bb4690299cf', 'Tipus III', 'Headertry1', '1', 'neimanelipe@iticdesk.bcn', '2025-02-23 16:03:02', 'Oberta'),
(6, 'REF67bb46e778b52', 'Tipus IV', 'HEADER2', 'ada', 'neimanelipe@iticdesk.bcn', '2025-02-23 16:03:59', 'Oberta'),
(7, 'REF67bb4b0e6a83e', 'Tipus I', 'Prova usuari profe', 'ola', 'analea@iticbcn.cat', '2025-02-23 16:21:42', 'Oberta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `cognom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol` enum('professor','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `dni`, `nom`, `cognom`, `email`, `password`, `rol`) VALUES
(1, '9X', 'Neiman', 'Elipe', 'neimanelipe@iticdesk.bcn', 'pirineus', 'administrador'),
(2, '55555x', 'joan', 'iznardo', 'joaniznardo@iticbcn.cat', 'pirineus', 'professor'),
(3, '444444x', 'ana', 'lea', 'analea@iticbcn.cat', 'pirineus', 'professor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencies`
--
ALTER TABLE `incidencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referència` (`referencia`),
  ADD KEY `usuari_email` (`usuari_email`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencies`
--
ALTER TABLE `incidencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencies`
--
ALTER TABLE `incidencies`
  ADD CONSTRAINT `incidencies_ibfk_1` FOREIGN KEY (`usuari_email`) REFERENCES `usuaris` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
