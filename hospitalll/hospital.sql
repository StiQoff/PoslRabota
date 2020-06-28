-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2020 г., 17:31
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `card_id` int(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `diagnose` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postup_id` int(55) NOT NULL,
  `data_postup` date NOT NULL,
  `hospital_ward_id` int(55) NOT NULL,
  `telephone` int(55) NOT NULL,
  `data_vip` date DEFAULT NULL,
  `prichina_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`card_id`, `patient_id`, `diagnose`, `postup_id`, `data_postup`, `hospital_ward_id`, `telephone`, `data_vip`, `prichina_id`) VALUES
(1, 1, 'Сотрясение мозга(В легкой форме)', 1, '2020-06-29', 2, 6460466, '2020-06-30', 3),
(2, 2, 'Сердечный приступ', 1, '2020-06-29', 3, 5035350, '2020-06-30', NULL),
(3, 3, 'Сердечный приступ', 1, '2020-06-22', 4, 5353221, '2020-06-27', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'Мужской'),
(2, 'Женский');

-- --------------------------------------------------------

--
-- Структура таблицы `hair_color`
--

CREATE TABLE `hair_color` (
  `hair_color_id` int(11) NOT NULL,
  `Name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hair_color`
--

INSERT INTO `hair_color` (`hair_color_id`, `Name`) VALUES
(1, 'Рыжие'),
(2, 'Русые'),
(3, 'Черные'),
(4, 'Коричневые'),
(5, 'Каштановые'),
(6, 'Красные'),
(7, 'Синие'),
(8, 'Желтые'),
(9, 'Блондин'),
(10, 'Оранжевые'),
(11, 'Разноцветные'),
(12, 'Розовые'),
(13, 'Белые'),
(14, 'Седые');

-- --------------------------------------------------------

--
-- Структура таблицы `hospital_ward`
--

CREATE TABLE `hospital_ward` (
  `hospital_ward_id` int(11) NOT NULL,
  `number` int(55) NOT NULL,
  `telephone` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hospital_ward`
--

INSERT INTO `hospital_ward` (`hospital_ward_id`, `number`, `telephone`) VALUES
(1, 1223, 700700454),
(2, 2332, 6460466),
(3, 3453, 5035350),
(4, 4533, 5030535),
(5, 6445, 5353221);

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronomic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `hair_color_id` int(11) NOT NULL,
  `primeti` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`patient_id`, `lastname`, `firstname`, `patronomic`, `age`, `gender_id`, `height`, `weight`, `hair_color_id`, `primeti`) VALUES
(1, 'Моисеенко', 'Дмитрий', 'Юрьевич', '19', 1, 182, 70, 11, 'Идиот'),
(2, 'Иванова', 'Иванна', 'Ивановна', '27', 2, 180, 60, 5, 'Студент');

-- --------------------------------------------------------

--
-- Структура таблицы `patient_ward`
--

CREATE TABLE `patient_ward` (
  `ward_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hospital_ward_id` int(11) NOT NULL,
  `ward_telephone` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `patient_ward`
--

INSERT INTO `patient_ward` (`ward_id`, `patient_id`, `hospital_ward_id`, `ward_telephone`) VALUES
(1, 1, 2, 6460466),
(2, 2, 3, 5035350);

-- --------------------------------------------------------

--
-- Структура таблицы `postup`
--

CREATE TABLE `postup` (
  `postup_id` int(11) NOT NULL,
  `Place_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `postup`
--

INSERT INTO `postup` (`postup_id`, `Place_name`) VALUES
(1, 'Скорая помощь'),
(2, 'Направление из поликлиники'),
(3, 'Приведен в больницу свидетелем происшествия ');

-- --------------------------------------------------------

--
-- Структура таблицы `prichina_vip`
--

CREATE TABLE `prichina_vip` (
  `prichina_id` int(11) NOT NULL,
  `prichina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `prichina_vip`
--

INSERT INTO `prichina_vip` (`prichina_id`, `prichina`) VALUES
(1, 'Отправлен на источники, для окончательного исцеления'),
(2, 'Отправлен в санаторий'),
(3, 'Полное выздоровление '),
(4, 'Осложнения, переведен в другую больницу'),
(5, 'Переведен в другую больницу, для окончательного выздоровления'),
(6, 'Отправлен в другую больницу, для прохождения обязательных процедур');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `gender` (`postup_id`),
  ADD KEY `patient` (`patient_id`),
  ADD KEY `patient_2` (`patient_id`),
  ADD KEY `hospital_ward` (`hospital_ward_id`),
  ADD KEY `prichina_vip` (`prichina_id`),
  ADD KEY `ward_telephone` (`telephone`);

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Индексы таблицы `hair_color`
--
ALTER TABLE `hair_color`
  ADD PRIMARY KEY (`hair_color_id`);

--
-- Индексы таблицы `hospital_ward`
--
ALTER TABLE `hospital_ward`
  ADD PRIMARY KEY (`hospital_ward_id`),
  ADD UNIQUE KEY `telephone_2` (`telephone`),
  ADD KEY `telephone` (`telephone`);

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `gender` (`gender_id`),
  ADD KEY `hair_color` (`hair_color_id`),
  ADD KEY `hair_color_2` (`hair_color_id`);

--
-- Индексы таблицы `patient_ward`
--
ALTER TABLE `patient_ward`
  ADD PRIMARY KEY (`ward_id`),
  ADD KEY `patient_id` (`patient_id`,`hospital_ward_id`),
  ADD KEY `hospital_ward_id` (`hospital_ward_id`),
  ADD KEY `ward_telephone` (`ward_telephone`);

--
-- Индексы таблицы `postup`
--
ALTER TABLE `postup`
  ADD PRIMARY KEY (`postup_id`);

--
-- Индексы таблицы `prichina_vip`
--
ALTER TABLE `prichina_vip`
  ADD PRIMARY KEY (`prichina_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `hair_color`
--
ALTER TABLE `hair_color`
  MODIFY `hair_color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `hospital_ward`
--
ALTER TABLE `hospital_ward`
  MODIFY `hospital_ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `patient_ward`
--
ALTER TABLE `patient_ward`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `postup`
--
ALTER TABLE `postup`
  MODIFY `postup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `prichina_vip`
--
ALTER TABLE `prichina_vip`
  MODIFY `prichina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
