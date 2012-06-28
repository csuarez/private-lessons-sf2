-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-06-2012 a las 15:07:40
-- Versión del servidor: 5.1.61
-- Versión de PHP: 5.3.5-1ubuntu7.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `symfony`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'author_0'),
(2, 'author_1'),
(3, 'author_2'),
(4, 'author_3'),
(5, 'author_4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_documents`
--

CREATE TABLE IF NOT EXISTS `categories_documents` (
  `document_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`,`category_id`),
  KEY `IDX_FD630429C33F7837` (`document_id`),
  KEY `IDX_FD63042912469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `categories_documents`
--

INSERT INTO `categories_documents` (`document_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(4, 4),
(4, 5),
(5, 1),
(5, 5),
(6, 1),
(6, 2),
(7, 2),
(7, 3),
(8, 3),
(8, 4),
(9, 4),
(9, 5),
(10, 1),
(10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'category_0'),
(2, 'category_1'),
(3, 'category_2'),
(4, 'category_3'),
(5, 'category_4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(140) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8698A76F675F31B` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `document`
--

INSERT INTO `document` (`id`, `author_id`, `title`, `year`) VALUES
(1, 1, 'document_0', 2010),
(2, 2, 'document_1', 2011),
(3, 3, 'document_2', 2012),
(4, 4, 'document_3', 2013),
(5, 5, 'document_4', 2014),
(6, 1, 'document_5', 2015),
(7, 2, 'document_6', 2016),
(8, 3, 'document_7', 2017),
(9, 4, 'document_8', 2018),
(10, 5, 'document_9', 2019);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `categories_documents`
--
ALTER TABLE `categories_documents`
  ADD CONSTRAINT `FK_FD63042912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_FD630429C33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

--
-- Filtros para la tabla `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_D8698A76F675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);
