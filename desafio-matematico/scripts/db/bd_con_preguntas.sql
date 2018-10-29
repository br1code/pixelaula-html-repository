-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2018 a las 23:01:00
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `des_matematico`
--
CREATE DATABASE IF NOT EXISTS `des_matematico` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `des_matematico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) NOT NULL,
  `opcion_a` varchar(100) NOT NULL,
  `opcion_b` varchar(100) NOT NULL,
  `opcion_c` varchar(100) NOT NULL,
  `opcion_d` varchar(100) NOT NULL,
  `opcion_correcta` varchar(150) NOT NULL,
  `archivo_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `opcion_a`, `opcion_b`, `opcion_c`, `opcion_d`, `opcion_correcta`, `archivo_img`) VALUES
(1, 'Cuanto es 3+1?', '4', '31', '2', '5', 'A. 4', 'yes.png'),
(2, 'Si tengo una banana y tres peras, cuantas frutas tengo?', 'Ninguna', '4 frutas', '2 frutas', '5 frutas', 'B. 4 frutas', 'yes.png'),
(5, 'en el kiosco, 10 caramelos me los cobraron 5 pesos, cuanto vale cada caramelo?', '1 peso', '10 centavos', '50 centavos', '50 pesos', 'C. 50 centavos', 'yes.png'),
(6, 'Un kilo de papas vale $4, cuanto me salen 2 kilos?', '$7', '$4', '$8', '$33', 'C. $8', 'yes.png'),
(7, 'Tengo $40, el kilo de mandarinas esta $5, cuantos kilos puedo comprar?', '12 kilos', '5 kilos', '9 kilos', '8 kilos', 'D. 8 kilos', 'yes.png'),
(8, '45+5=?', '50', '455', '40', '130', 'A. 50', 'yes.png'),
(9, '3x2=?', '32', '6', '23', '5', 'B. 6', 'yes.png'),
(10, '5x6=?', '50', '11', '56', '30', 'D. 30', 'yes.png'),
(11, 'Cuanto es 6x6?', '26', '36', '16', '12', 'C. 36', 'yes.png'),
(12, 'Una panadera vendio 160 tortas en un mes. La mitad eran de chocolate y el resto mitad de vainilla y mitad de naranja. Cuantas tortas de vainilla vendio?', '40 tortas', '60 tortas', '80 tortas', '30 tortas', 'A. 40 tortas', 'yes.png'),
(13, 'Un tablero de ajedrez tiene 64 cuadrados. Un tablero semejante con 144 cuadrados, cuantos cuadrados tiene de cada lado?', '14', '8', '10', '12', 'D. 12', 'yes.png'),
(14, 'Resuelve: 6x6-2x8=...', '28', '272', '20', '192', 'C. 20', 'yes.png'),
(15, 'Selecciona la opcion que completa la secuencia: 6 – 12 – 18 – 24 – x – 36', '28', '30', '32', '34', 'B. 30', 'yes.png'),
(16, 'Selecciona la opcion que completa la secuencia: 5 - 8 - x', '3', '33', '11', '14', 'D. 14', 'yes.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
