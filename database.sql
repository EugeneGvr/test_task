-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2019 г., 04:06
-- Версия сервера: 10.1.37-MariaDB-2.cba
-- Версия PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `link6596`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Actors`
--

CREATE TABLE `Actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Actors`
--

INSERT INTO `Actors` (`id`, `name`, `surname`) VALUES
(73, 'Sally', 'Kellerman'),
(72, 'Elliot', 'Gould'),
(71, 'Donald', 'Sutherland'),
(28, 'Dennis', 'Farina'),
(29, 'Joe', 'Pesci'),
(30, 'Marrisa', 'Tomei'),
(31, 'Fred', 'Gwynne'),
(32, 'Lane', 'Smith'),
(33, 'Ralph', 'Macchio'),
(34, 'Russell', 'Crowe'),
(35, 'Joaquin', 'Phoenix'),
(36, 'Connie', 'Nielson'),
(37, 'Harrison', 'Ford'),
(38, 'Mark', 'Hamill'),
(39, 'Carrie', 'Fisher'),
(40, 'Alec', 'Guinness'),
(41, ' James Earl', 'Jones'),
(42, 'Karen', 'Allen'),
(43, 'Nathan', 'Fillion'),
(44, 'Alan', 'Tudyk'),
(45, 'Adam', 'Baldwin'),
(46, 'Ron', 'Glass'),
(47, 'Jewel', 'Staite'),
(48, 'Gina', 'Torres'),
(49, 'Morena', 'Baccarin'),
(50, 'Sean', 'Maher'),
(51, 'Summer', 'Glau'),
(52, 'Chiwetel', 'Ejiofor'),
(53, 'Barbara', 'Hershey'),
(54, 'Matthew', 'Broderick'),
(55, 'Ally', 'Sheedy'),
(56, 'Dabney', 'Coleman'),
(57, 'Barry', 'Corbin'),
(58, 'Bill', 'Pullman'),
(59, 'Rick', 'Moranis'),
(60, 'Daphne', 'Zuniga'),
(61, 'Joan', 'Rivers'),
(62, 'Kenneth', 'Mars'),
(63, 'Terri', 'Garr'),
(64, 'Val', 'Kilmer'),
(65, 'Gabe', 'Jarret'),
(66, 'Michelle', 'Meyrink'),
(67, 'William', 'Atherton'),
(68, 'Tom', 'Cruise'),
(69, 'Kelly', 'McGillis'),
(70, 'Anthony', 'Edwards'),
(27, 'Renne', 'Russo'),
(26, 'Danny', 'DeVito'),
(25, 'John', 'Travolta'),
(24, 'Austin', 'Pendleton'),
(23, 'Dave', 'Geolz'),
(3, 'Harvey', 'Korman'),
(4, 'Gene', 'Wilder'),
(5, 'Slim', 'Pickens'),
(6, 'Madeline', 'Kahn'),
(7, 'Humphrey', 'Bogart'),
(8, 'Ingrid', 'Bergman'),
(9, 'Claude', 'Rains'),
(10, 'Peter', 'Lorre'),
(11, 'Audrey', 'Hepburn'),
(12, 'Cary', 'Grant'),
(13, 'Walter', 'Matthau'),
(14, 'James', 'Coburn'),
(15, 'George', 'Kennedy'),
(16, 'Paul', 'Newman'),
(17, 'Strother', 'Martin'),
(18, 'Robert', 'Redford'),
(19, 'Katherine', 'Ross'),
(20, 'Charles', 'Durning'),
(21, 'Jim', 'Henson'),
(22, 'Frank', 'Oz'),
(2, 'Clevon', 'Little'),
(1, 'Mel', 'Brooks'),
(74, 'Carl', 'Reiner'),
(75, ' Eva Marie', 'Saint'),
(76, 'Brian', 'Keith'),
(77, 'Roy', 'Scheider'),
(78, 'Richard', 'Dreyfuss'),
(79, 'Lorraine', 'Gary'),
(80, 'Keir', 'Dullea'),
(81, 'Gary', 'Lockwood'),
(82, 'Douglas', 'Rain'),
(83, 'Josephine', 'Hull'),
(84, 'Peggy', 'Dow'),
(85, 'Seth', 'Rogen'),
(86, 'Leslie', 'Mann');

-- --------------------------------------------------------

--
-- Структура таблицы `FilmActorConnection`
--

CREATE TABLE `FilmActorConnection` (
  `film_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `FilmActorConnection`
--

INSERT INTO `FilmActorConnection` (`film_id`, `actor_id`) VALUES
(7, 1),
(7, 23),
(7, 22),
(7, 21),
(6, 20),
(6, 18),
(8, 4),
(8, 27),
(8, 26),
(8, 25),
(11, 37),
(10, 36),
(7, 24),
(7, 20),
(7, 14),
(10, 35),
(10, 34),
(9, 33),
(9, 32),
(9, 24),
(9, 31),
(11, 40),
(9, 30),
(9, 29),
(8, 28),
(13, 46),
(13, 45),
(13, 44),
(13, 43),
(12, 42),
(11, 39),
(11, 38),
(15, 54),
(14, 28),
(14, 53),
(12, 37),
(11, 41),
(14, 4),
(13, 52),
(13, 51),
(13, 50),
(13, 49),
(13, 48),
(15, 25),
(15, 56),
(13, 47),
(16, 59),
(16, 1),
(16, 25),
(16, 58),
(15, 55),
(17, 4),
(15, 57),
(18, 67),
(18, 66),
(18, 65),
(18, 64),
(17, 10),
(17, 63),
(17, 62),
(17, 4),
(16, 61),
(16, 60),
(19, 70),
(19, 64),
(19, 69),
(20, 73),
(20, 68),
(20, 72),
(20, 71),
(19, 68),
(21, 76),
(21, 44),
(21, 75),
(21, 74),
(20, 18),
(19, 68),
(23, 82),
(22, 79),
(22, 78),
(22, 18),
(22, 77),
(25, 86),
(23, 67),
(23, 81),
(23, 80),
(24, 20),
(24, 84),
(25, 16),
(25, 19),
(25, 85),
(1, 4),
(1, 3),
(1, 2),
(24, 83),
(24, 14),
(6, 16),
(6, 18),
(5, 19),
(5, 18),
(5, 16),
(4, 17),
(4, 15),
(4, 16),
(3, 15),
(3, 14),
(3, 13),
(3, 12),
(3, 11),
(2, 10),
(2, 9),
(2, 8),
(2, 7),
(1, 6),
(1, 5),
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Films`
--

CREATE TABLE `Films` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `format` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Films`
--

INSERT INTO `Films` (`id`, `name`, `year`, `format`) VALUES
(24, 'Harvey', 1950, 'DVD'),
(25, 'Knocked Up', 2007, 'Blu-Ray'),
(23, '2001: A Space Odyssey', 1968, 'DVD'),
(22, 'Jaws', 1975, 'DVD'),
(21, 'The Russians Are Coming, The Russians Are Coming', 1966, 'VHS'),
(20, 'MASH', 1970, 'DVD'),
(19, 'Top Gun', 1986, 'DVD'),
(18, 'Real Genius', 1985, 'VHS'),
(17, 'Young Frankenstein', 1974, 'VHS'),
(16, 'Spaceballs', 1987, 'DVD'),
(14, 'Hooisers', 1986, 'VHS'),
(15, 'WarGames', 1983, 'VHS'),
(13, 'Serenity', 2005, 'Blu-Ray'),
(12, 'Raiders of the Lost Ark', 1981, 'DVD'),
(9, 'My Cousin Vinny', 1992, 'DVD'),
(10, 'Gladiator', 2000, 'Blu-Ray'),
(11, 'Star Wars', 1977, 'Blu-Ray'),
(6, 'The Sting', 1973, 'DVD'),
(7, 'The Muppet Movie', 1979, 'DVD'),
(8, 'Get Shorty', 1995, 'DVD'),
(5, 'Butch Cassidy and the Sundance Kid', 1969, 'VHS'),
(4, 'Cool Hand Luke', 1967, 'VHS'),
(3, 'Charade', 1953, 'DVD'),
(2, 'Casablanca', 1942, 'DVD'),
(1, 'Blazing Saddles', 1974, 'VHS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Films`
--
ALTER TABLE `Films`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
