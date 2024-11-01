-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 01 2024 г., 11:40
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
-- База данных: `clothing_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `image_url`, `price`, `stock`, `size`, `color`, `material`) VALUES
(1, 'Футболка белая', 'Классическая белая футболка из хлопка', 'images/white_tshirt.png', 750.00, 50, 'M', 'Белый', 'Хлопок'),
(2, 'Джинсы синие', 'Синие джинсы, прямой покрой', 'images/jeans_blue.jpg', 2200.00, 30, 'L', 'Синий', 'Джинса'),
(3, 'Куртка кожаная', 'Стильная черная кожаная куртка', 'images/jacket_black.jpg', 6500.00, 15, 'XL', 'Черный', 'Кожа'),
(4, 'Футболка черная', 'Стильная черная футболка из хлопка.', 'images/tshirt_black.jpg', 750.00, 50, 'M', 'Черный', 'Хлопок'),
(5, 'Худи серое', 'Уютное серое худи с капюшоном.', 'images/hoodie_gray.jpg', 1500.00, 30, 'L', 'Серый', 'Полиэстер'),
(6, 'Кроссовки белые', 'Белые кроссовки для активного отдыха.', 'images/sneakers_white.jpg', 3000.00, 20, '42', 'Белый', 'Текстиль'),
(7, 'Шорты джинсовые', 'Удобные джинсовые шорты для лета.', 'images/denim_shorts.jpg', 1200.00, 25, 'M', 'Синий', 'Деним'),
(8, 'Куртка утепленная', 'Утепленная куртка для холодной погоды.', 'images/winter_jacket.jpg', 4500.00, 15, 'L', 'Темно-синий', 'Нейлон'),
(9, 'Рубашка в клетку', 'Классическая рубашка в клетку из натурального хлопка.', 'images/checkered_shirt.jpg', 2000.00, 40, 'M', 'Красный', 'Хлопок'),
(10, 'Платье летнее', 'Летнее платье с ярким принтом.', 'images/summer_dress.jpg', 3500.00, 10, 'S', 'Многоцветный', 'Шелк');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
