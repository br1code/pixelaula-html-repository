-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 20:07:42
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectopp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `correo`, `password`) VALUES
(1, 'Juan Cruz', 'juancruzcriado@outlook.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id` int(11) NOT NULL,
  `clase` varchar(1) NOT NULL,
  `subclase` varchar(10) NOT NULL,
  `automovil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id`, `clase`, `subclase`, `automovil`) VALUES
(1, 'A', 'A.1', 'Ciclomotores hasta 50 cc.'),
(2, 'A', 'A.2.1', 'Motocicletas (incluidos ciclomotores y triciclos) de hasta 150 cc de cilindrada.\r\n'),
(3, 'A', 'A.2.2', 'Motocicletas (incluidos ciclomotores y triciclos) de mas de 150 cc y hasta 300 cc de cilindrada.'),
(4, 'A', 'A.3', 'Motocicletas (incluidos ciclomotores y triciclos) de mas de 300 cc de cilindrada.'),
(5, 'A', 'A.4', 'Motocicletas (incluidos ciclomotores y triciclos) de cualquier cilindrada utilizados para el transporte comercial e industrial. '),
(6, 'B', 'B.1', 'Automóviles, utilitarios, camionetas y casas rodantes motorizadas hasta 3500 kg total.'),
(7, 'B', 'B.2', 'Automóviles y camionetas hasta 3500 kg de peso con acoplado de hasta 750 kg o casa rodante no motorizada.'),
(8, 'C', 'C', 'Camiones sin acoplado ni semiacoplado y casas rodantes motorizadas de mas de 3500 kg de peso y automotores comprendidos en la clase B1.'),
(9, 'D', 'D.1', 'Automotores del servicio de transporte de pasajeros de hasta 8 plazas y los comprendidos en la clase B1.'),
(10, 'D', 'D.2', 'Vehículos del servicio del transporte de mas de 8 pasajeros y los comprendidos en las clases B, C y D1.'),
(11, 'D', 'D.3', 'Servicios de urgencia, emergencia y similares.'),
(12, 'E', 'E.1 ', 'Camiones articulados y/o con acoplado y los vehículos comprendidos en las clases B y C.'),
(13, 'E', 'E.2', 'Maquinaria especial no agricola.'),
(14, 'E', 'E.3', 'Vehículos afectados al transporte de cargas peligrosas.'),
(15, 'F', 'F', 'Vehículos adaptados para personas con discapacidad (correspondiente a la discapacidad del titular).'),
(16, 'G', 'G.1', 'Tractores agrícolas.'),
(17, 'G', 'G.2', 'Maquinaria especial agrícola.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `id_senal` int(11) DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `id_senal`, `nivel`) VALUES
(1, '¿Cual es la velocidad máxima permitida en avenidas?', NULL, 1),
(2, '¿Que indica la siguiente señal de transito?', 62, 0),
(3, '¿Cual es la cantidad máxima de pasajeros en un vehículo? (no se contemplan motocicletas)', NULL, 1),
(4, '¿Que tipo de señal es la señal de "Lomo de Burro"?', NULL, 1),
(5, '¿Para que sirven las luces altas?', NULL, 1),
(6, '¿Cual de las siguientes situaciones le da el paso por sobre las otras?', NULL, 2),
(7, '¿Que licencia debo tener para conducir un vehículo adaptado (por discapacidad)?', NULL, 2),
(8, '¿Que vehículos incluye en la licencia B.1?', NULL, 1),
(9, '¿Que tipo de señales advierten acerca de la ejecución de trabajos de construcción y mantenimiento de la vía?', NULL, 1),
(10, '¿Que indica la siguiente señal de transito?', 40, 1),
(11, '¿A que clase de licencia corresponde la siguiente descripción?. "Automotores del servicio de transporte de pasajeros de hasta 8 plazas y los comprendidos en la clase B1".', NULL, 2),
(12, '¿A que clase de licencia corresponde la siguiente descripción?. Motocicletas (incluidos ciclomotores y triciclos) de hasta 150 cc de cilindrada.', NULL, 2),
(13, '¿A que clase de licencia corresponde la siguiente descripción?. Vehículos afectados al transporte de cargas peligrosas.', NULL, 2),
(14, '¿Cual es la siguiente señal de transito?', 50, 2),
(15, '¿Cual es la siguiente señal de transito?', 56, 2),
(16, '¿A que tipo de señal corresponde la que figura a continuación?', 86, 1),
(17, '¿A que tipo de señal corresponde la que figura a continuación?', 78, 1),
(18, '¿A que tipo de señal corresponde la que figura a continuación?', 24, 1),
(19, '¿Cual es la siguiente señal de transito?', 32, 0),
(20, '¿Que clase de licencia permite operar maquinaria agricola?', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `valor` tinyint(1) NOT NULL,
  `id_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `respuesta`, `valor`, `id_pregunta`) VALUES
(7, '80 kms/h', 2, 1),
(8, '60 kms/h', 0, 1),
(9, '70 kms/h', 1, 1),
(10, 'Indica "Detenerse completamente antes de cruzar".', 0, 2),
(11, 'Indica "Disminuir la velocidad antes de cruzar, y detenerse en caso del cruce de automóvil"', 1, 2),
(12, 'Indica "No detenerse ni disminuir la velocidad a excepción del cruce de automóvil"', 2, 2),
(13, 'Depende la licencia que posea el conductor.', 1, 3),
(14, 'Igual a la cantidad de cinturones en dicho automóvil. ', 0, 3),
(15, 'Todos los que entren en dicho automóvil.', 2, 3),
(16, 'Preventiva.', 0, 4),
(17, 'Informativa.', 2, 4),
(18, 'Reglamentación.', 1, 4),
(19, 'Para usar de noche.', 2, 5),
(20, 'Para indicar que se cede el paso.', 1, 5),
(21, 'Para indicar presencia. ', 0, 5),
(22, 'Tener la derecha.', 2, 6),
(23, 'Que una señal lo indique. ', 1, 6),
(24, 'Que una autoridad lo indique. (personal de transito)', 0, 6),
(25, 'F', 0, 7),
(26, 'E.1', 1, 7),
(27, 'C', 2, 7),
(28, 'Automóviles, utilitarios, camionetas y casas rodantes motorizadas hasta 3500 kg total.', 0, 8),
(29, 'Automóviles y camionetas hasta 3500 kg de peso con acoplado de hasta 750 kg o casa rodante no motorizada.', 1, 8),
(30, 'Motocicletas (incluidos ciclomotores y triciclos) de cualquier cilindrada utilizados para el transporte comercial e industrial.', 2, 8),
(31, 'Informativas', 1, 9),
(32, 'Preventivas', 2, 9),
(33, 'Transitorias', 0, 9),
(34, 'Indica la proximidad de un cruce de trenes a nivel.', 2, 10),
(35, 'Indica la proximidad de un cruce de trenes a nivel el cual no posee barreras.', 0, 10),
(36, 'Indica la proximidad de un cruce de trenes a nivel de doble vía', 1, 10),
(37, 'D.1', 0, 11),
(38, 'D.2', 1, 11),
(39, 'C', 2, 11),
(40, 'A.2.1', 0, 12),
(41, 'A.2.2', 1, 12),
(42, 'A.1', 2, 12),
(43, 'E.3', 0, 13),
(44, 'E.2', 1, 13),
(45, 'F', 2, 13),
(46, 'Zona de derrumbes.', 0, 14),
(47, 'Empalme.', 1, 14),
(48, 'Elevación transversal.', 2, 14),
(49, 'Calzada resbaladiza.', 0, 15),
(50, 'Camino Sinuoso.', 1, 15),
(51, 'Curva y contra curva.', 2, 15),
(52, 'Transitoria.', 0, 16),
(53, 'Informativa.', 1, 16),
(54, 'Preventiva.', 2, 16),
(55, 'Reglamentación.', 0, 17),
(56, 'Informativa.', 1, 17),
(57, 'Preventiva.', 2, 17),
(58, 'Informativa.', 0, 18),
(59, 'Preventiva.', 1, 18),
(60, 'Reglamentación.', 2, 18),
(61, 'Estrechamiento de camino.', 0, 19),
(62, 'Puente Angosto.', 1, 19),
(63, 'Calzada dividida.', 2, 19),
(64, 'G.', 0, 20),
(65, 'F.', 1, 20),
(66, 'E.', 2, 20),
(67, 'ej1', 0, 21),
(68, 'ej2', 1, 21),
(69, 'ej3', 2, 21),
(70, 'b', 0, 22),
(71, 'c', 1, 22),
(72, 'd', 2, 22),
(73, 'ej1', 0, 23),
(74, 'ej2', 1, 23),
(75, 'ej3', 2, 23),
(76, 'ej1', 0, 24),
(77, 'ej2', 1, 24),
(78, 'ej3', 2, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senal`
--

CREATE TABLE `senal` (
  `id` int(11) NOT NULL,
  `senal` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `tipo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `senal`
--

INSERT INTO `senal` (`id`, `senal`, `descripcion`, `img`, `tipo`) VALUES
(1, 'Aeropuerto ', 'Indica la proximidad de un aeropuerto.', './img/informativas/aerodromo.jpg', 0),
(2, 'Nomenclatura de autopista.', 'Indica la denominación de autopista por la cual se circula o la cual se atraviesa o accede.', './img/informativas/autopista.jpg', 0),
(3, 'Balneario.', 'Indica la proximidad de un balneario.', './img/informativas/balneario.jpg', 0),
(4, 'Bar', 'Indica la proximidad de un bar.', './img/informativas/bar.jpg', 0),
(5, 'Calle sin salida.', 'Indica la finalización de la calle o camino.', './img/informativas/calle_sin_salida.jpg', 0),
(6, 'Campamento.', 'Indica la proximidad de un campamento.', './img/informativas/campamento.jpg', 0),
(7, 'Comienzo autopista.', 'Indica la proximidad o el acceso a una autopista.', './img/informativas/comienzo_autopista.jpg', 0),
(8, 'Correo.', 'Indica la proximidad de un correo postal.', './img/informativas/correo.jpg', 0),
(9, 'Estación de servicio.', 'Indican la proximidad de una estación de servicio.', './img/informativas/estacion_servicio.jpg', 0),
(10, 'Estacionamiento.', 'Indica la proximidad de un garaje de estacionamiento vehicular.', './img/informativas/estacionamiento.jpg', 0),
(11, 'Fin de autopista.', 'Indica la finalización de la autopista.', './img/informativas/fin_autopista.jpg', 0),
(12, 'Gomería.', 'Indica la proximidad de una gomería.', './img/informativas/gomeria.jpg', 0),
(13, 'Hotel.', 'Indica la proximidad de un hotel.', './img/informativas/hotel.jpg', 0),
(14, 'Iglesia.', 'Indica la proximidad de una Iglesia.', './img/informativas/iglesia.jpg', 0),
(15, 'Prohibido cambiar de carril.', 'Indica la obligación de mantenerse en carril referido en la señal.', './img/reglamentacion/prohibido-cambiar-carril.jpg', 2),
(16, 'Museo.', 'Indica la proximidad de un museo.', './img/informativas/museo.jpg', 0),
(17, 'Orientación. (Caminos primarios y secundarios).', 'Indica las localidades o parajes a encontrar por la vía que se circula. En ocasiones puede incluir la distancia (representada en kms).', './img/informativas/orientacion.jpg', 0),
(18, 'Plaza.', 'Indica la proximidad de una plaza.', './img/informativas/plaza.jpg', 0),
(19, 'Taxi.', 'Indica la proximidad de una parada de taxis.', './img/informativas/taxi.jpg', 0),
(20, 'Policía.', 'Indica la presencia de policías o proximidad de puesto policial.', './img/informativas/policia.jpg', 0),
(21, 'Puesto Sanitario.', 'Indica la proximidad de un puesto sanitario o de socorro.', './img/informativas/puesto_sanitario.jpg', 0),
(22, 'Punto Panorámico. ', 'Indica la proximidad de un puesto de vista panorámica. ', './img/informativas/punto_panoramico.jpg', 0),
(23, 'Restaurante.', 'Indica la proximidad de un restaurante.', './img/informativas/restaurante.jpg', 0),
(24, 'Ruta Nacional.', 'Indica una ruta perteneciente a la red nacional de caminos e informa la denominación de la vía por la que se circula.', './img/informativas/ruta_nacional.jpg', 0),
(25, 'Ruta Panamericana.', 'Indica una ruta perteneciente al sistema panamericano de carreteras.', './img/informativas/ruta_panamericana.jpg', 0),
(26, 'Ruta Provincial.', 'Indica que la ruta por la cual se circula pertenece a la red provincial de caminos.', './img/informativas/ruta_provincial.jpg', 0),
(27, 'Servicio Mecánico.', 'Indica la proximidad de un taller de servicio mecánico.', './img/informativas/servicio_mecanico.jpg', 0),
(28, 'Servicio Telefónico.', 'Indica la proximidad de un establecimiento con servicio telefónico.', './img/informativas/servicio_telefonico.jpg', 0),
(29, 'Estacionamiento de casas rodantes.', 'Indica la proximidad de un estacionamiento para casas rodantes.', './img/informativas/est_casas.jpg', 0),
(30, 'Zona detención transporte públicos de pasajeros.', 'Indica la proximidad de una zona de detención para transportes públicos.', './img/informativas/det_publico.jpg', 0),
(31, 'Altura Máxima', 'Advierte acerca de una restricción de altura en proximidad por la vía que se circula.', './img/preventivas/altura_limitada.jpg', 1),
(32, 'Estrechamiento de camino.', 'Indica la proximidad de un estrechamiento de la vía por ambos lados.', './img/preventivas/estrechamiento_2.jpg', 1),
(33, 'Estrechamiento lateral de camino por derecha.', 'Indica la proximidad de un estrechamiento de camino por el lado derecho de la calzada.', './img/preventivas/estrechamiento_derecha.jpg', 1),
(34, 'Estrechamiento lateral de camino por izquierda.', 'Indica la proximidad de un estrechamiento de camino por el lado izquierdo de la calzada.', './img/preventivas/estrechamiento_izquierda.jpg', 1),
(35, 'Ganado Suelto.', 'Indica la posibilidad de la presencia de ganado suelto en la vía.', './img/preventivas/animales_sueltos.jpg', 1),
(36, 'Depresión transversal. Badén.', 'Indica la proximidad de una irregularidad física en la vía por la cual se debe reducir la velocidad.', './img/preventivas/baden.jpg', 1),
(37, 'Zona de ciclistas.', 'Indica la posible presencia de ciclistas en la vía indicada.', './img/preventivas/ciclista.jpg', 1),
(38, 'Cruce.', 'Indica la proximidad de una calle la cual cruza de forma perpendicular por la vía que se esta circulando.', './img/preventivas/cruce.jpg', 1),
(39, 'Bifurcación en Y.', 'Indica la proximidad de una división en forma de Y en la vía.', './img/preventivas/bifurcacion.jpg', 1),
(40, 'Cruce ferroviario a nivel, sin barrera.', 'Indica la proximidad de un cruce de trenes a nivel el cual no posee barreras.', './img/preventivas/cruce-de-trenes.jpg', 1),
(41, 'Ancho máximo.', 'Indica una restricción de máximo de ancho en proximidad por la vía que se circula.', './img/preventivas/ancho-limitado.jpg', 1),
(42, 'Camino Sinuoso.', 'Indica la proximidad de tres (3) o mas curvas seguidas en el camino.', './img/preventivas/camino-sinuoso.jpg', 1),
(43, 'Curva y contra curva.', 'Indica la proximidad de dos (2) curvas en sentido contrario separadas.', './img/preventivas/curva-s.jpg', 1),
(44, 'Curva.', 'Indica la proximidad de una curva en dirección indicada por la flecha que figura en la señal.', './img/preventivas/curva.jpg', 1),
(45, 'Curva Pronunciada.', 'Indica la proximidad de una curva mas pronunciada de lo normal en dirección indicada por la flecha.', './img/preventivas/curva-pronunciada.jpg', 1),
(46, 'Calzada Dividida.', 'Indica la separación de caminos manteniendo los sentidos de circulación indicados en la señal.', './img/preventivas/calzada-dividida.jpg', 1),
(47, 'Vientos fuertes laterales.', 'Indica la probabilidad de la presencia de fuertes vientos laterales.', './img/preventivas/fuertes-vientos-laterales.jpg', 1),
(48, 'Corredor aéreo.', 'Indica la proximidad de vuelos de baja altura sobre la vía por presencia de aeropuerto. ', './img/preventivas/corredor-aereo.jpg', 1),
(49, 'Empalme (camino lateral).', 'Indica empalme de las vías de circulación.', './img/preventivas/empalme-t.jpg', 1),
(50, 'Zona de derrumbes.', 'Indica que de la elevación próxima en la ruta pueden desprenderse rocas que caen o ruedan sobre la calzada.', './img/preventivas/derrumbes.jpg', 1),
(51, 'Elevación transversal. Lomo de burro.', 'Indica la proximidad de una irregularidad (elevación) en la vía.', './img/preventivas/lomo-de-burro.jpg', 1),
(52, 'Proyección de piedras.', 'Indica la posibilidad de presencia de piedras en la calzada, que pueden ser proyectadas por los automóviles que transitan.', './img/preventivas/proyeccion-piedras.jpg', 1),
(53, 'Niños jugando.', 'Indica que en la zona pueden aparecer niños, por la existencia de escuelas, campos de juego, etc.', './img/preventivas/niños-jugando.jpg', 1),
(54, 'Maquinas agrícolas. ', 'Indica la proximidad de zona de operación habitual de maquinaria agrícola. ', './img/preventivas/maquinaria-agricola.jpg', 1),
(55, 'Zona circulación ambulancias. ', 'Indica la proximidad de zona de operación habitual de ambulancias. ', './img/preventivas/ambulancia.jpg', 1),
(56, 'Calzada Resbaladiza.', 'Indica la proximidad de calzada que puede tornarse resbaladiza por defectos en la superficie o presencia de elementos extraños.', './img/preventivas/calzada-resbaladiza.jpg', 1),
(57, 'Pendiente en subida.', 'Indica la existencia de una pendiente con sentido de inclinación indicado en la señal.', './img/preventivas/pendiente-ascendente.jpg', 1),
(58, 'Pendiente en bajada.', 'Indica la existencia de una pendiente con sentido de inclinación indicado en la señal.', './img/preventivas/pendiente-descendente.jpg', 1),
(59, 'Rotonda.', 'Indica la proximidad de una rotonda. Se circula manteniendo la parte central a la izquierda.', './img/preventivas/rotonda.jpg', 1),
(60, 'Túnel.', 'Indica la proximidad de un túnel por la via que se circula.', './img/preventivas/tunel.jpg', 1),
(61, 'Ceda el paso.', 'Indica la perdida de prioridad de paso por regla general, asegurando la prioridad del cruce al automóvil que circula por la vía transversal.', './img/reglamentacion/ceda-paso.jpg', 2),
(62, 'Pare.', 'Indica la detención obligatoria antes del cruce, sin invadir la senda peatonal, y avanzar cuando no lo haga otro vehículo.', './img/reglamentacion/pare.jpg', 2),
(63, 'No estacionar.', 'Indica la prohibición de estacionamiento en el sector indicado. ', './img/reglamentacion/no-estacionar.jpg', 2),
(64, 'No estacionar ni detenerse.', 'Indica la prohibición tanto de estacionamiento como de detención (para ascenso o descenso de pasajeros por ejemplo), en el sector indicado.', './img/reglamentacion/no-estacionar-ni-detenerse.jpg', 2),
(65, 'Limite de velocidad máxima.', 'Indica la velocidad máxima en la que se puede circular por la vía en que se encuentra. ', './img/reglamentacion/limite-velocidad.jpg', 2),
(66, 'Prohibido girar izquierda.', 'Indica la prohibición de giro en la dirección indicada en la señal.', './img/reglamentacion/no-girar-izquierda.jpg', 2),
(67, 'Prohibido girar derecha.', 'Indica la prohibición de giro en la dirección indicada en la señal.', './img/reglamentacion/no-girar-derecha.jpg', 2),
(68, 'No girar en U.', 'Indica la prohibición de giro en forma de U. ', './img/reglamentacion/no-girar-U.jpg', 2),
(69, 'Prohibido adelantar.', 'Indica la prohibición de adelantar automóviles sobre la vía que se circula.', './img/reglamentacion/prohibido-adelantar.jpg', 2),
(70, 'Contramano.', 'Indica que la vía ante la que se encuentra es de sentido contrario por lo cual no puede accederse a ella.', './img/reglamentacion/contramano.jpg', 2),
(71, 'No avanzar.', 'Indica la prohibición de circulación sobre la vía que esta la señal.', './img/reglamentacion/no-avanzar.jpg', 2),
(72, 'No circular autos.', 'Indica la prohibición de la circulación de autos sobre la vía referida.', './img/reglamentacion/prohibido-circular-auto.jpg', 2),
(73, 'No circular motos.', 'Indica la prohibición de la circulación de motos sobre la vía referida.', './img/reglamentacion/prohibido-circular-motos.jpg', 2),
(74, 'No circular peatones.', 'Indica la prohibición de la circulación de peatones sobre la vía referida.', './img/reglamentacion/prohibido-circular-peaton.jpg', 2),
(75, 'No circular bicicletas.', 'Indica la prohibición de la circulación de bicicletas sobre la vía referida.', './img/reglamentacion/prohibido-circular-bicicleta.jpg', 2),
(76, 'Ruidos molestos.', 'Indica la prohibición de la emisión de ruidos molesto tales como los emitidos por la bocina.', './img/reglamentacion/no-ruidos-molestos.jpg', 2),
(77, 'Peatones por izquierda.', 'Indica la obligación de los peatones a circular por el lado izquierdo.', './img/reglamentacion/peatones-por-izquierda.jpg', 2),
(78, 'Giro Obligatorio.', 'Indica la obligación de avanzar en el sentido que indica la flecha de la señal.', './img/reglamentacion/giro-obligatorio.jpg', 2),
(80, 'Banderillero.', 'Indica la presencia de un hombre con una bandera con el fin de regular el transito en zona de construcción u obras.', './img/transitorias/banderillero.jpg', 3),
(81, 'Hombres trabajando.', 'Indica la presencia de hombres realizando trabajos de construcción u arreglos próximos en la vía.', './img/transitorias/hombres-trabajando.jpg', 3),
(82, 'Maquinaria vial.', 'Indica la presencia de maquinaria pesada operando en la vía o circulando a través de ella.', './img/transitorias/equipo-pesado.jpg', 3),
(83, 'Zona de explosivos.', 'Indica la presencia de un area de trabajo donde se utilizan explosivos.', './img/transitorias/zona-explosivos.jpg', 3),
(84, 'Desvió. ', 'Indica la necesidad de desvió señalando hacia donde debe dirigirse el curso. ', './img/transitorias/desvio.jpg', 3),
(85, 'Estrechamiento de calzada.', 'Indica el punto donde la calzada se torna angosta. ', './img/transitorias/estrechamiento-mano-izquierda-transitorias.jpg', 3),
(86, 'Trabajos en banquina.', '', './img/transitorias/trabajos-en-banquina.jpg', 3),
(87, 'Calle en construcción.', 'Indica el comienzo de una calle inhabilitada por reparaciones u otras obras. También suelen llevar la cantidad de metros de distancia a la que se encuentra.', './img/transitorias/longitud-construccion.jpg', 3),
(88, 'Fin de construcción. ', 'Indica el fin de una zona de obras en construcción. ', './img/transitorias/fin-de-construccion.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencia`
--

CREATE TABLE `sugerencia` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `respC` varchar(250) NOT NULL,
  `respI2` varchar(250) NOT NULL,
  `respI3` varchar(250) NOT NULL,
  `dificultad` tinyint(4) NOT NULL,
  `id_senal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sugerencia`
--

INSERT INTO `sugerencia` (`id`, `pregunta`, `respC`, `respI2`, `respI3`, `dificultad`, `id_senal`) VALUES
(99, 'Ejemplo 10', 'ej1', 'ej2', 'ej3', 1, NULL),
(100, 'Ejemplo 11', 'ej1', 'ej2', 'ej3', 1, NULL),
(101, 'Ejemplo 12', 'ej1', 'ej2', 'ej3', 1, NULL),
(102, 'Ejemplo 13', 'ej1', 'ej2', 'ej3', 1, NULL),
(103, 'Ejemplo 14', 'ej1', 'ej2', 'ej3', 1, NULL),
(105, 'Ejemplo 16', 'ej1', 'ej2', 'ej3', 1, NULL),
(106, 'Ejemplo 17', 'ej1', 'ej2', 'ej3', 1, NULL),
(108, 'Ejemplo 19', 'ej1', 'ej2', 'ej3', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`);

--
-- Indices de la tabla `senal`
--
ALTER TABLE `senal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `senal`
--
ALTER TABLE `senal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
