-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 28 2019 р., 04:12
-- Версія сервера: 10.1.37-MariaDB-2.cba
-- Версія PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `link6596`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Actors`
--

CREATE TABLE `Actors` (
  `film_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `Actors`
--

INSERT INTO `Actors` (`film_id`, `name`, `surname`) VALUES
(25, 'Leslie', 'Mann\n\n\n\n'),
(25, 'Paul', 'Rudd'),
(13, 'Jewel', 'Staite'),
(13, 'Ron', 'Glass'),
(25, 'Katherine', 'Heigl'),
(25, 'Seth', 'Rogen'),
(13, 'Gina', 'Torres'),
(13, 'Morena', 'Baccarin'),
(13, 'Sean', 'Maher'),
(13, 'Summer', 'Glau'),
(13, 'Chiwetel', 'Ejiofor\n\n'),
(14, 'Gene', 'Hackman'),
(14, 'Barbara', 'Hershey'),
(14, 'Dennis', 'Hopper\n\n'),
(15, 'Matthew', 'Broderick'),
(15, 'Ally', 'Sheedy'),
(15, 'Dabney', 'Coleman'),
(15, 'John', 'Wood'),
(15, 'Barry', 'Corbin\n\n'),
(16, 'Bill', 'Pullman'),
(16, 'John', 'Candy'),
(16, 'Mel', 'Brooks'),
(16, 'Rick', 'Moranis'),
(16, 'Daphne', 'Zuniga'),
(16, 'Joan', 'Rivers\n\n'),
(17, 'Gene', 'Wilder'),
(17, 'Kenneth', 'Mars'),
(17, 'Terri', 'Garr'),
(17, 'Gene', 'Hackman'),
(17, 'Peter', 'Boyle\n\n'),
(18, 'Val', 'Kilmer'),
(18, 'Gabe', 'Jarret'),
(18, 'Michelle', 'Meyrink'),
(18, 'William', 'Atherton\n\n'),
(19, 'Tom', 'Cruise'),
(19, 'Kelly', 'McGillis'),
(19, 'Val', 'Kilmer'),
(19, 'Anthony', 'Edwards'),
(19, 'Tom', 'Skerritt\n\n'),
(20, 'Donald', 'Sutherland'),
(20, 'Elliot', 'Gould'),
(20, 'Tom', 'Skerritt'),
(20, 'Sally', 'Kellerman'),
(20, 'Robert', 'Duvall\n\n'),
(21, 'Carl', 'Reiner'),
(21, 'Eva', 'Marie'),
(21, 'Alan', 'Arkin'),
(21, 'Brian', 'Keith\n\n'),
(22, 'Roy', 'Scheider'),
(22, 'Robert', 'Shaw'),
(22, 'Richard', 'Dreyfuss'),
(22, 'Lorraine', 'Gary'),
(23, 'Keir', 'Dullea'),
(23, 'Gary', 'Lockwood'),
(23, 'William', 'Sylvester'),
(23, 'Douglas', 'Rain\n\n'),
(24, 'James', 'Stewart'),
(24, 'Josephine', 'Hull'),
(24, 'Peggy', 'Dow'),
(24, 'Charles', 'Drake\n\n'),
(13, 'Adam', 'Baldwin'),
(1, 'Mel', 'Brooks'),
(1, 'Clevon', 'Little'),
(1, 'Harvey', 'Korman'),
(1, 'Gene', 'Wilder'),
(1, 'Slim', 'Pickens'),
(1, 'Madeline', 'Kahn\n\nine'),
(1, 'Peggy', 'Dow'),
(1, 'Charles', 'Drake\n\n'),
(2, 'Humphrey', 'Bogart'),
(2, 'Ingrid', 'Bergman'),
(2, 'Claude', 'Rains'),
(2, 'Peter', 'Lorre\n\n'),
(3, 'Audrey', 'Hepburn'),
(3, 'Cary', 'Grant'),
(3, 'Walter', 'Matthau'),
(3, 'James', 'Coburn'),
(3, 'George', 'Kennedy\n\n'),
(4, 'Paul', 'Newman'),
(4, 'George', 'Kennedy'),
(4, 'Strother', 'Martin\n\n'),
(5, 'Paul', 'Newman'),
(5, 'Robert', 'Redford'),
(5, 'Katherine', 'Ross\n\n'),
(6, 'Robert', 'Redford'),
(6, 'Paul', 'Newman'),
(6, 'Robert', 'Shaw'),
(6, 'Charles', 'Durning\n\n'),
(7, 'Jim', 'Henson'),
(7, 'Frank', 'Oz'),
(7, 'Dave', 'Geolz'),
(7, 'Mel', 'Brooks'),
(7, 'James', 'Coburn'),
(7, 'Charles', 'Durning'),
(7, 'Austin', 'Pendleton\n\n'),
(8, 'John', 'Travolta'),
(8, 'Danny', 'DeVito'),
(8, 'Renne', 'Russo'),
(8, 'Gene', 'Hackman'),
(8, 'Dennis', 'Farina\n\n'),
(9, 'Joe', 'Pesci'),
(9, 'Marrisa', 'Tomei'),
(9, 'Fred', 'Gwynne'),
(9, 'Austin', 'Pendleton'),
(9, 'Lane', 'Smith'),
(9, 'Ralph', 'Macchio\n\n'),
(10, 'Russell', 'Crowe'),
(10, 'Joaquin', 'Phoenix'),
(10, 'Connie', 'Nielson\n\n'),
(11, 'Harrison', 'Ford'),
(11, 'Mark', 'Hamill'),
(11, 'Carrie', 'Fisher'),
(11, 'Alec', 'Guinness'),
(11, 'James', 'Earl'),
(12, 'Harrison', 'Ford'),
(12, 'Karen', 'Allen\n\n'),
(13, 'Nathan', 'Fillion'),
(13, 'Alan', 'Tudyk');

-- --------------------------------------------------------

--
-- Структура таблиці `Films`
--

CREATE TABLE `Films` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `format` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `Films`
--

INSERT INTO `Films` (`id`, `name`, `year`, `format`) VALUES
(25, 'Knocked Up\nRelease ', 2007, 'Blu-Ray\n'),
(24, 'Harvey\nRelease ', 1950, 'DVD\n'),
(23, '2001: A Space Odyssey\nRelease ', 1968, 'DVD\n'),
(22, 'Jaws\nRelease ', 1975, 'DVD\n'),
(21, 'The Russians Are Coming, The Russians Are Coming\nRelease ', 1966, 'VHS\n'),
(20, 'MASH\nRelease ', 1970, 'DVD\n'),
(19, 'Top Gun\nRelease ', 1986, 'DVD\n'),
(18, 'Real Genius\nRelease ', 1985, 'VHS\n'),
(17, 'Young Frankenstein\nRelease ', 1974, 'VHS\n'),
(16, 'Spaceballs\nRelease ', 1987, 'DVD\n'),
(15, 'WarGames\nRelease ', 1983, 'VHS\n'),
(14, 'Hooisers\nRelease ', 1986, 'VHS\n'),
(13, 'Serenity\nRelease ', 2005, 'Blu-Ray\n'),
(12, 'Raiders of the Lost Ark\nRelease ', 1981, 'DVD\n'),
(11, 'Star Wars\nRelease ', 1977, 'Blu-Ray\n'),
(10, 'Gladiator\nRelease ', 2000, 'Blu-Ray\n'),
(9, 'My Cousin Vinny\nRelease ', 1992, 'DVD\n'),
(8, 'Get Shorty \nRelease ', 1995, 'DVD\n'),
(7, 'The Muppet Movie\nRelease ', 1979, 'DVD\n'),
(6, 'The Sting\nRelease ', 1973, 'DVD\n'),
(5, 'Butch Cassidy and the Sundance Kid\nRelease ', 1969, 'VHS\n'),
(4, 'Cool Hand Luke\nRelease ', 1967, 'VHS\n'),
(3, 'Charade\nRelease ', 1953, 'DVD\n'),
(2, 'Casablanca\nRelease ', 1942, 'DVD\n'),
(1, 'Blazing Saddles\nRelease ', 1974, 'VHS\n');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Films`
--
ALTER TABLE `Films`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
