-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2020 a las 19:51:37
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `critica`
--

CREATE TABLE `critica` (
  `user` varchar(25) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `dropyear` varchar(10) DEFAULT NULL,
  `critica` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `critica`
--

INSERT INTO `critica` (`user`, `title`, `dropyear`, `critica`) VALUES
('PMC', 'Joker', '2019-08-31', 'esto mola'),
(NULL, NULL, NULL, NULL),
('ser', 'Knive', '2019-11-27', 'Entreteni'),
('ser', 'Knive', '2019-11-27', 'Entretenimiento de calidad, con una pléyade de excelentes actores, con un guión bien urdido, que sobrevuela la trama clásica de las novelas de Agatha Christie, que se sigue sin demasiada dificultad por más que contenga algún que otro doble tirabuzón; todo en un tono fresco, ligero. Bien dirigida, con un ritmo cadencioso que deja respirar al espectador, pero al mismo tiempo con la conveniente agilidad. Con unos diálogos brillantes, no demasiado recargados, componiendo algunos aforismos que cualquier escritor de renombre firmaría, con un humor fino. Una película que no te reporta más de lo que cabría esperar de las de su género, pero tampoco te ofrece menos de lo que promete, ya que está realizada con mimo, con artesanía, con buen gusto.'),
('sergiovsg99', 'Knives Out', '2019-11-27', 'Entretenimiento de calidad, con una pléyade de excelentes actores, con un guión bien urdido, que sobrevuela la trama clásica de las novelas de Agatha Christie, que se sigue sin demasiada dificultad por más que contenga algún que otro doble tirabuzón; todo en un tono fresco, ligero. Bien dirigida, con un ritmo cadencioso que deja respirar al espectador, pero al mismo tiempo con la conveniente agilidad. Con unos diálogos brillantes, no demasiado recargados, componiendo algunos aforismos que cualquier escritor de renombre firmaría, con un humor fino. Una película que no te reporta más de lo que cabría esperar de las de su género, pero tampoco te ofrece menos de lo que promete, ya que está realizada con mimo, con artesanía, con buen gusto.'),
('tomas.rb', 'Joker', '2019-08-31', 'sin mas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nombre` varchar(11) DEFAULT NULL,
  `Fnac` varchar(10) DEFAULT NULL,
  `nacionalidad` varchar(11) DEFAULT NULL,
  `apellido` varchar(14) DEFAULT NULL,
  `apodo` varchar(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`nombre`, `Fnac`, `nacionalidad`, `apellido`, `apodo`) VALUES
('Ana', '1988-04-30', 'Cuba/España', 'De Armas', 'Ana De Armas'),
('Anjelica', '1951-07-08', 'EEUU', 'Huston', 'Anjelica Huston'),
('Arnold', '1947-07-30', 'EEUU', 'Schwarzenegger', 'Arnold Schwarzenegger'),
('Barry', '1953-04-01', 'EEUU', 'Sonnerfeld', 'Barry Sonnerfeld'),
('Brett', '1956-08-26', 'EEUU', 'Cullen', 'Brett Cullen'),
('Chris', '1958-02-24', 'EEUU', 'Evans', 'Chris Evans'),
('Chris', '1981-06-13', 'EEUU', 'Evans', 'Chris Evans'),
('Christopher', '1938-10-22', 'EEUU', 'Lloyd', 'Christopher Lloyd'),
('Cristina', '1980-02-12', 'EEUU', 'Ricci', 'Cristina Ricci'),
('Daniel', '1968-03-02', 'EEUU', 'Craig', 'Daniel Craig'),
('Enrique', '1972-10-08', 'España', 'Arce', 'Enrique Arce'),
('Frances', '1953-11-13', 'EEUU', 'Conroy', 'Frances Conroy'),
('Idina', '1982-06-29', 'EEUU', 'Menzel', 'Idina Menzel'),
('Jamie', '1958-11-22', 'EEUU', 'Lee Curtis', 'Jamie Lee Curtis'),
('Jennifer', '1971-10-22', 'EEUU', 'Lee', 'Jennifer Lee'),
('Joaquin', '1974-10-28', 'EEUU', 'Phoenix', 'Joaquin Phoenix'),
('Jonathan', '1985-03-26', 'EEUU', 'Groff', 'Jonathan Groff'),
('Josh', '1981-02-23', 'EEUU', 'Gad', 'Josh Gad'),
('Kristen', '1982-07-18', 'EEUU', 'Anne Bell', 'Kristen Anne Bell'),
('Linda', '1956-09-26', 'EEUU', 'Hamilton', 'Linda Hamilton'),
('Mackenzie', '1987-04-01', 'EEUU', 'Davis', 'Mackenzie Davis'),
('Michael', '1974-08-07', 'EEUU', 'Shannon', 'Michael Shannon'),
('Natalia', '1987-02-06', 'Colombia', 'Reyes', 'Natalia Reyes'),
('Raul', '1940-03-09', 'EEUU', 'Julia', 'Raul Julia'),
('Rian', '1973-12-17', 'EEUU', 'Johnson', 'Rian Johnson'),
('Robert', '1943-08-17', 'EEUU', 'De Niro', 'Robert De Niro'),
('Tim', '1964-10-10', 'EEUU', 'Miller', 'Tim Miller'),
('Todd', '1970-12-20', 'EEUU', 'Philips', 'Todd Philips'),
('Zazie', '1991-06-01', 'EEUU', 'Beetz', 'Zazie Beetz'),
(NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `title` varchar(21) DEFAULT NULL,
  `gener` varchar(9) DEFAULT NULL,
  `dropyear` varchar(10) DEFAULT NULL,
  `length` int(3) DEFAULT NULL,
  `sipnosis` varchar(770) DEFAULT NULL,
  `src` varchar(23) DEFAULT NULL,
  `pais` varchar(4) DEFAULT NULL,
  `musica` varchar(22) DEFAULT NULL,
  `productora` varchar(24) DEFAULT NULL,
  `YT` varchar(43) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`title`, `gener`, `dropyear`, `length`, `sipnosis`, `src`, `pais`, `musica`, `productora`, `YT`) VALUES
('Frozen II', 'animacion', '2019-08-21', 103, 'La reina Elsa, su hermana Anna, Kristoff, Olaf y Sven se embarcan en un nuevo viaje en lo profundo del bosque, más allá de su tierra natal de Arendelle, para descubrir la verdad sobre un antiguo misterio de su reino. Su objetivo principal es descubrir por qué Elsa oye voces procedentes del Bosque encantado, donde desde hace tiempo nadie puede entrar ni salir. De no lograrlo su reino estaría en peligro.', 'img/frozen.jpg', 'EEUU', 'Kristen Anderson-Lopez', 'Walt Disney Pictures', 'https://www.youtube.com/watch?v=I-oJ5QjrX9M'),
('Joker', 'Drama', '2019-08-31', 122, 'En 1981, Arthur Fleck (Joaquin Phoenix) trabaja como payaso a sueldo y vive con su madre enferma, Penny (Frances Conroy), en Gotham City. La ciudad se derrumba bajo el desempleo, el crimen y la ruina financiera, dejando segmentos de la población privados de sus derechos y empobrecidos. Arthur sufre de un trastorno neurológico que lo hace reír en momentos inapropiados, y visita regularmente a una trabajadora de los servicios sociales para obtener su medicación. Después de que un grupo de jóvenes de la calle lo atacaran en un callejón, el compañero de trabajo de Arthur, Randall (Glenn Fleshler), le presta un arma para protegerse. Arthur también conoce a Sophie (Zazie Beetz), una madre soltera que vive en un apartamento vecino, y la invita a su rutina de comedia.', 'img/joker.jpg', 'EEUU', 'Hildur Guðnadóttir', 'DC Films', 'https://www.youtube.com/watch?v=ygUHhImN98w'),
('Knives Out', 'Suspense', '2019-11-27', 130, 'El rico novelista del crimen Harlan Thrombey invita a su familia a su mansión para su fiesta de cumpleaños número 85. A la mañana siguiente, el ama de llaves de Harlan, Fran, lo encuentra muerto, aparentemente habiéndose cortado la garganta. Un personaje anónimo contrata al detective privado Benoit Blanc para investigar el caso. Blanc se entera de que Harlan había enajenado a muchos de la familia: había amenazado con exponer a su yerno Richard por tener una aventura; recortó la asignación de su nuera Joni por robar dinero destinado a la matrícula de su nieta; despidió a su hijo menor, Walt, de su editorial; y retiró a su perezoso nieto Ransom de su testamento.', 'img/proximos/knives.jpg', 'EEUU', 'Thomas Newman', 'FilmNation Entertainment', 'https://www.youtube.com/watch?v=xi-1NchUqMA'),
('La familia Addams', 'Comedia', '2019-08-11', 105, 'The Addams Family (La familia Addams en España y Los locos Addams en Hispanoamérica) es una película estadounidense de comedia animada por computadora basada en los cómics de The Addams Family de Charles Addams. La película es dirigida por Conrad Vernon y Greg Tiernan, y cuenta con las voces de Oscar Isaac, Charlize Theron, Chloë Grace Moretz, Finn Wolfhard, Nick Kroll, Bette Midler, Aimee Garcia, Elsie Fisher, Chelsea Frei, Allison Janney y Haley Tju. Fue estrenada el 11 de octubre de 2019 por United Artists en Estados Unidos y por Universal Pictures internacionalmente.', 'img/addams.jpg', 'EEUU', 'Mychael Danna', 'Metro-Goldwyn-Mayer', 'https://www.youtube.com/watch?v=F7Ug863S8dQ'),
('Terminator: Dark Fate', 'Acción', '2019-08-31', 128, 'En 1998, tres años después de anular la amenaza de Skynet, Sarah y John Connor viven una vida tranquila después de eliminar a varios Terminators que Skynet había enviado a través del tiempo antes de ser borrada de la existencia. Sin saberlo, un Terminator T-800 los localiza en Livingston, Guatemala, atacándolos sorpresivamente en un restaurante en la playa y asesina brutalmente a John Connor antes de desaparecer, dejando a Sarah totalmente devastada.', 'img/terminator.jpg', 'EEUU', 'Junkie XL', 'Paramount Pictures', 'https://www.youtube.com/watch?v=jCyEX6u-Yhs'),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `title` varchar(25) DEFAULT NULL,
  `dropYear` varchar(8) DEFAULT NULL,
  `user` varchar(25) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rating`
--

INSERT INTO `rating` (`title`, `dropYear`, `user`, `rate`) VALUES
('Frozen II', '08/21/19', 'El trucha', 7),
('Frozen II', '08/21/19', 'PMC', 6),
('Joker', '08/31/19', 'PMC', 7),
(NULL, NULL, NULL, NULL),
('Knives Ou', '2019-11-', 'davidbarr', 9),
('Knives Ou', '2019-11-', 'davidbarr', 9),
('Knives Out', '2019-11-', 'davidbarrios', 9),
('Knives Out', '2019-11-', 'davidbarrios', 9),
('Knives Out', '2019-11-', 'davidbarrios', 10),
('Knives Out', '2019-11-', 'davidbarrios', 10),
('Knives Out', '2019-11-', 'davidbarrios', 9),
('Knives Out', '2019-11-', 'sergiovsg99', 9),
('Knives Out', '2019-11-', 'sergiovsg99', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabaja`
--

CREATE TABLE `trabaja` (
  `title_film` varchar(21) DEFAULT NULL,
  `dropyear` varchar(10) DEFAULT NULL,
  `rol` varchar(8) DEFAULT NULL,
  `nombre` varchar(11) DEFAULT NULL,
  `Fnac` varchar(10) DEFAULT NULL,
  `apellido_empleado` varchar(14) DEFAULT NULL,
  `apodo` varchar(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabaja`
--

INSERT INTO `trabaja` (`title_film`, `dropyear`, `rol`, `nombre`, `Fnac`, `apellido_empleado`, `apodo`) VALUES
('Frozen II', '2019-08-21', 'director', 'Chris', '1958-02-24', 'Evans', 'Chris Evans'),
('Frozen II', '2019-08-21', 'actor', 'Idina', '1982-06-29', 'Menzel', 'Idina Menzel'),
('Frozen II', '2019-08-21', 'director', 'Jennifer', '1971-10-22', 'Lee', 'Jennifer Lee'),
('Frozen II', '2019-08-21', 'actor', 'Jonathan', '1985-03-26', 'Groff', 'Jonathan Groff'),
('Frozen II', '2019-08-21', 'actor', 'Josh', '1981-02-23', 'Gad', 'Josh Gad'),
('Frozen II', '2019-08-21', 'actor', 'Kristen', '1982-07-18', 'Anne Bell', 'Kristen Anne Bell'),
('Joker', '2019-08-31', 'actor', 'Brett', '1956-08-26', 'Cullen', 'Brett Cullen'),
('Joker', '2019-08-31', 'actor', 'Frances', '1953-11-13', 'Conroy', 'Frances Conroy'),
('Joker', '2019-08-31', 'actor', 'Joaquin', '1974-10-28', 'Phoenix', 'Joaquin Phoenix'),
('Joker', '2019-08-31', 'actor', 'Robert', '1943-08-17', 'De Niro', 'Robert De Niro'),
('Joker', '2019-08-31', 'director', 'Todd', '1970-12-20', 'Philips', 'Todd Philips'),
('Joker', '2019-08-31', 'actor', 'Zazie', '1991-06-01', 'Beetz', 'Zazie Beetz'),
('Knives Out', '2019-11-27', 'actor', 'Ana', '1988-04-30', 'De Armas', 'Ana De Armas'),
('Knives Out', '2019-11-27', 'actor', 'Chris', '1981-06-13', 'Evans', 'Chris Evans'),
('Knives Out', '2019-11-27', 'actor', 'Daniel', '1968-03-02', 'Craig', 'Daniel Craig'),
('Knives Out', '2019-11-27', 'actor', 'Jamie', '1958-11-22', 'Lee Curtis', 'Jamie Lee Curtis'),
('Knives Out', '2019-11-27', 'actor', 'Michael', '1974-08-07', 'Shannon', 'Michael Shannon'),
('Knives Out', '2019-11-27', 'director', 'Rian', '1973-12-17', 'Johnson', 'Rian Johnson'),
('La familia Addams', '2019-08-11', 'actor', 'Anjelica', '1951-07-08', 'Huston', 'Anjelica Huston'),
('La familia Addams', '2019-08-11', 'director', 'Barry', '1953-04-01', 'Sonnerfeld', 'Barry Sonnerfeld'),
('La familia Addams', '2019-08-11', 'actor', 'Christopher', '1938-10-22', 'Lloyd', 'Christopher Lloyd'),
('La familia Addams', '2019-08-11', 'actor', 'Cristina', '1980-02-12', 'Ricci', 'Cristina Ricci'),
('La familia Addams', '2019-08-11', 'actor', 'Raul', '1940-03-09', 'Julia', 'Raul Julia'),
('Terminator: Dark Fate', '2019-08-31', 'actor', 'Arnold', '1947-07-30', 'Schwarzenegger', 'Arnold Schwarzenegger'),
('Terminator: Dark Fate', '2019-08-31', 'actor', 'Enrique', '1972-10-08', 'Arce', 'Enrique Arce'),
('Terminator: Dark Fate', '2019-08-31', 'actor', 'Linda', '1956-09-26', 'Hamilton', 'Linda Hamilton'),
('Terminator: Dark Fate', '2019-08-31', 'actor', 'Mackenzie', '1987-04-01', 'Davis', 'Mackenzie Davis'),
('Terminator: Dark Fate', '2019-08-31', 'actor', 'Natalia', '1987-02-06', 'Reyes', 'Natalia Reyes'),
('Terminator: Dark Fate', '2019-08-31', 'director', 'Tim', '1964-10-10', 'Miller', 'Tim Miller'),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user` varchar(12) DEFAULT NULL,
  `nombre` varchar(9) DEFAULT NULL,
  `apellido` varchar(17) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `Fnac` varchar(10) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `foto_perfil` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user`, `nombre`, `apellido`, `email`, `Fnac`, `admin`, `password`, `foto_perfil`) VALUES
('abgr', 'Ana Belen', 'Gonzalez Rogado', 'abgr@usal.es', '2020-01-01', 0, 'profesor', NULL),
('davidbarrios', 'David', 'Barrios', 'davidbarrios@usal.es', '1997-05-26', 1, '1111', NULL),
('El trucha', 'JJ', 'VV', 'javi@trucha.es', '2019-12-05', 0, '111', NULL),
('PMC', 'piero', 'MC', 'p@usal.es', '1998-07-02', 1, '1111', NULL),
('sergiovsg99', 'Sergio', 'Vicente', 'sergiovsg99@usal.es', '2019-01-14', 1, '1111', NULL),
('tomas.rb', 'Tomas', 'Rodriguez Barrios', 'tomas.rb@usal.es', '2020-01-01', 0, 'profesor', NULL),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Memelin', 'Miguel', 'Perez', 'mgr@usal.es', '2000-01-01', 0, '1111', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
