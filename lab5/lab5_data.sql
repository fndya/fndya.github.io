-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 06 2025 г., 21:29
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab5_data`
--

-- --------------------------------------------------------

--
-- Структура таблицы `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `term` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `terms`
--

INSERT INTO `terms` (`id`, `term`, `definition`, `image`) VALUES
(1, 'PHP', 'Язык программирования для веб-разработки', 'php.png'),
(2, 'HTML', 'Язык разметки гипертекста', 'html.png'),
(3, 'CSS', 'Язык для описания стилей', 'css.png'),
(4, 'MySQL', 'СУБД для работы с данными', 'mysql.png'),
(5, 'JavaScript', 'Язык для создания интерактивных веб-страниц.', 'javascript.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
