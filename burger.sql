-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2017 г., 22:28
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `home` varchar(255) DEFAULT NULL,
  `part` varchar(10) DEFAULT NULL,
  `appt` varchar(10) DEFAULT NULL,
  `floor` varchar(5) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `callback` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `street`, `home`, `part`, `appt`, `floor`, `comment`, `payment`, `callback`) VALUES
(4, 'dorfen32', '2b', '3', '456', '32', 'lorem ipsum la la la', 'card pay', 'callback'),
(5, 'dorfen321', '2b', '31', '456', '323', 'lorem ipsum la la ladsadasasdsadsad', 'odd money', 'callback'),
(6, 'dorfen321', '2b', '31', '456', '323', 'lorem ipsum la la ladsadasasdsadsad', 'odd money', 'callback'),
(7, 'dorfen321', '2b', '31', '456', '323', 'lorem ipsum la la ladsadasasdsadsad', 'odd money', 'callback'),
(8, 'dorfen321', '2b', '31', '456', '323', 'lorem ipsum la la ladsadasasdsadsad', 'card pay', ''),
(9, 'dorfen321', '2b', '31', '456', '323', 'lorem ipsum la la ladsadasasdsadsad', 'odd money', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `counter` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `counter`) VALUES
(3, 'alexander', 'alexandr@mail.ru', '+7 (312) 323 21 12', 1),
(4, 'alexander2', 'al3exandr@mail.ru', '+7 (312) 323 21 13', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
