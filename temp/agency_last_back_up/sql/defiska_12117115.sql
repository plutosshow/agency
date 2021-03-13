-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 01 2020 г., 10:38
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `defiska_12117115`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Customers`
--

CREATE TABLE IF NOT EXISTS `Customers` (
  `Id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `Second_name` varchar(15) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Midle_name` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL DEFAULT 'Мужчина',
  `Id_passport` varchar(5) NOT NULL,
  `Number` varchar(12) NOT NULL,
  PRIMARY KEY (`Id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Customers`
--

INSERT INTO `Customers` (`Id_customer`, `Second_name`, `First_name`, `Midle_name`, `Gender`, `Id_passport`, `Number`) VALUES
(1, '0', 'Юрий', 'Владимирович', 'Мужчина', '2', '+79531881844'),
(2, '0', 'Иван', 'Александрович', 'Мужчина', '5', '+79026664512');

-- --------------------------------------------------------

--
-- Структура таблицы `Deals`
--

CREATE TABLE IF NOT EXISTS `Deals` (
  `Id_deal` int(5) NOT NULL AUTO_INCREMENT,
  `Id_employee` int(5) DEFAULT NULL,
  `Id_flat` int(5) DEFAULT NULL,
  `Id_customer` int(5) DEFAULT NULL,
  `Commentary` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_deal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `Employees`
--

CREATE TABLE IF NOT EXISTS `Employees` (
  `Id_employee` int(11) NOT NULL AUTO_INCREMENT,
  `Second_name` varchar(15) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Midle_name` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_employee`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Employees`
--

INSERT INTO `Employees` (`Id_employee`, `Second_name`, `First_name`, `Midle_name`) VALUES
(1, 'Пилипенко', 'Даниил', 'Игоревич'),
(2, 'Ромашкова', 'Дарья', 'Сергеевна');

-- --------------------------------------------------------

--
-- Структура таблицы `Flats`
--

CREATE TABLE IF NOT EXISTS `Flats` (
  `Id_flat` int(11) NOT NULL AUTO_INCREMENT,
  `Number_of_rooms` int(3) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Lived_square` float NOT NULL,
  `Common_square` float DEFAULT NULL,
  `Floor` int(3) DEFAULT NULL,
  `Type_of_construction` varchar(15) NOT NULL,
  `Year_of_construction` varchar(10) NOT NULL,
  `Commentary` text NOT NULL,
  `Region` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Building` varchar(20) NOT NULL,
  `Zip` varchar(20) NOT NULL,
  `Id_owner` int(5) DEFAULT NULL,
  `Relevant` int(1) NOT NULL DEFAULT '1' COMMENT '1 - актуальна, 0 - не актуальна',
  PRIMARY KEY (`Id_flat`),
  KEY `FK_owner` (`Id_owner`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Flats`
--

INSERT INTO `Flats` (`Id_flat`, `Number_of_rooms`, `Price`, `Lived_square`, `Common_square`, `Floor`, `Type_of_construction`, `Year_of_construction`, `Commentary`, `Region`, `District`, `City`, `Street`, `Building`, `Zip`, `Id_owner`, `Relevant`) VALUES
(34, 2, 1600000, 59.7, 62, 2, 'Новостройка', '2008', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', 'Ленинский', 'Теплое', 'Теплинское', '114', '301107', 6, 1),
(33, 3, 4820000, 84, 98, 11, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', 'Роговское', 'Москва', 'Кабельная 5-я', '10А строение 5', '123182', 5, 1),
(38, 4, 6542000, 102.5, 120, 3, 'Новостройка', '2017', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', 'Мытищи', 'Москва', 'Таганская', '58 строение 12', '109147', 8, 1),
(40, 3, 3210050, 74, 86, 4, 'Новостройка', '2020', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Калужская', '', 'Калуга', 'Лаврентьевская', '20', '248010', 6, 1),
(42, 1, 1600000, 33.5, 40, 2, 'Новостройка', '2020', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', '', 'Тула', 'Дементьева', '31', '300004', 7, 1),
(47, 3, 3000000, 80, 83, 3, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', 'Центральный', 'Тула', 'Ленина', '50', '300041', 5, 1),
(45, 4, 5000000, 86, 98, 3, 'Новостройка', '2018', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Карелия', 'Олонецкий', 'Кемь', 'Лесная', '1', '186000', 10, 1),
(46, 1, 1257000, 38.4, 42, 8, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', 'Щекинский', 'Щекино', 'Первомайская', '14а', '301241', 11, 1),
(48, 1, 2000000, 42, 44, 4, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Рязанская', 'Рыбновский', 'Рязань', 'Луговая', '20', '391105', 5, 1),
(49, 2, 1200000, 57, 60, 1, 'Новостройка', '2020', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Забайкальский', 'Забайкальский', 'Чиндагатай', 'Речная', '2', '674647', 6, 1),
(50, 4, 7528000, 87, 89.5, 24, 'Вторичное', '2010', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Дмитрия Ульянова', '10/1 корпус 1', '117292', 12, 1),
(61, 2, 1990000, 49, 58, 2, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', '', 'Тула', 'Кулибина', '2', '300065', 8, 1),
(62, 4, 6857500, 97.4, 104, 3, 'Новостройка', '2020', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Угличская', '12 корпус 2', '127572', 10, 1),
(63, 2, 2225000, 57, 62, 15, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Воронежская', '', 'Воронеж', 'Радиозаводская', '14', '394016', 13, 1),
(65, 3, 3958000, 76, 81, 4, 'Новостройка', '2020', 'CMAPT квapтaл нa Cypикoвa - мecтo , в кoтopoм xoчeтcя жить. Kaждый yгoлoк этoгo квapтaл пpoдyмaн пo мaкcимy: нaчинaя oт плaниpoвки квapтиpы, зaкaнчивaя coвpeмeннoй и блaгoycтpoeннoй внyтpeннeй тeppитopиeй.  Пpи пpoeктиpoвaнии мaкcимaльнo пpoдyмaн кaждый yгoлoк квapтaлa, чтoбы вceм житeлям былo yдoбнo кaк в cвoeй квapтиpe, тaк и нa тeppитopии квapтaлa.', 'Тульская', '', 'Тула', 'Орловская', '11/23', '300013', 13, 1),
(69, 2, 2280000, 58, 64, 2, 'Новостройка', '2020', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Омская', '', 'Омск', 'Орджоникидзе', '59 корпус 1', '644122', 11, 1),
(68, 1, 1950000, 40, 46, 1, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Омская', '', 'Омск', 'Удалова', '11', '644005', 14, 1),
(71, 1, 3000000, 38, 42, 5, 'Вторичное', '2009', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Правды', '21 строение 11', '125040', 6, 1),
(72, 5, 10850000, 169, 175, 12, 'Вторичное', '2014', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Красная Сосна', '1', '129337', 13, 1),
(73, 2, 2870000, 59, 64, 7, 'Новостройка', '2019', 'Hoвый жилoй микpopaйoн «Пeтpoвcкий квapтaл» coeдиняeт в ceбe гopoдcкoй кoмфopт и пpeлecть зaгopoднoй жизни. Пeтpoвcкий квapтaл pacпoлoжeн в экoлoгичecки блaгoпpиятнoм paйoнe в 10-15 минyтax oт цeнтpa гopoдa. B paдиyce нecкoлькиx дecяткoв килoмeтpoв нeт мeтaллypгичecкиx и xимичecкиx пpeдпpиятий. Пpoeктoм пpeдycмoтpeнo cтpoитeльcтвo вceй нeoбxoдимoй для кoмфopтнoгo пpoживaния инфpacтpyктypы. Ha тeppитopии микpopaйoнa бyдyт pacпoлaгaтьcя дeтcкий caд, мaгaзины, aптeки, oтдeлeниe бaнкa. Пpoeкт микpopaйoнa тaкжe пpeдycмaтpивaeт блaгoycтpoйcтвo пpилeгaющeй тeppитopии: нa бepeгy pacпoлoжeннoгo pядoм пpyдa бyдeт oбycтpoeн пляж и coвpeмeннaя зoнa oтдыxa. ЖK \"Пeтpoвcкий квapтaл\" - этo выcoкoe кaчecтвo cтpoитeльcтвa, дocтyпныe цeны, coвpeмeнныe плaниpoвки, блaгoпpиятнaя экoлoгичecкaя oбcтaнoвкa.\r\nПeтpoвcкий квapтaл pacпoлoжeн в экoлoгичecки блaгoпpиятнoм paйoнe в 10-15 минyтax oт цeнтpa гopoдa. B paдиyce нecкoлькиx дecяткoв килoмeтpoв нeт мeтaллypгичecкиx и xимичecкиx пpeдпpиятий.\r\n\r\nПpoeктoм пpeдycмoтpeнo cтpoитeльcтвo вceй нeoбxoдимoй для кoмфopтнoгo пpoживaния инфpacтpyктypы. Ha тeppитopии микpopaйoнa бyдyт pacпoлaгaтьcя дeтcкий caд, мaгaзины, aптeки, oтдeлeниe бaнкa.\r\n\r\nПpoeкт микpopaйoнa тaкжe пpeдycмaтpивaeт блaгoycтpoйcтвo пpилeгaющeй тeppитopии: нa бepeгy pacпoлoжeннoгo pядoм пpyдa бyдeт oбycтpoeн пляж и coвpeмeннaя зoнa oтдыxa.\r\n\r\nЖK \"Пeтpoвcкий квapтaл\" - этo выcoкoe кaчecтвo cтpoитeльcтвa, дocтyпныe цeны, coвpeмeнныe плaниpoвки, блaгoпpиятнaя экoлoгичecкaя oбcтaнoвкa.', 'Тульская', 'Узловский', 'Осиновая Гора', 'Аркадия Шипунова', '42', '301637', 7, 1),
(80, 2, 1500000, 59.7, 62, 2, 'Новостройка', '2008', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Бурятия', 'Северо-Байкальский', 'Холодное', 'Теплинское', '114', '671712', 6, 1),
(81, 4, 4820000, 84, 98, 11, 'Новостройка', '2019', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', 'Роговское', 'Москва', 'Кабельная 5-я', '10А строение 5', '123182', 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Images_for_flat`
--

CREATE TABLE IF NOT EXISTS `Images_for_flat` (
  `Id_image` int(11) NOT NULL AUTO_INCREMENT,
  `Id_flat` int(11) NOT NULL,
  `Link` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_image`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Images_for_flat`
--

INSERT INTO `Images_for_flat` (`Id_image`, `Id_flat`, `Link`) VALUES
(1, 1, 'https://i.ibb.co/YW1JXz5/img-7.jpg'),
(2, 2, 'https://i.ibb.co/YNb755w/img-6.jpg'),
(3, 63, 'https://i.ibb.co/0hqfgBX/img-1.jpg'),
(5, 62, 'https://i.ibb.co/Krcvx3x/img-3.jpg'),
(4, 65, 'https://i.ibb.co/ns1D8Jz/img-4.jpg'),
(6, 61, 'https://i.ibb.co/rMX601Q/img-5.jpg'),
(7, 50, 'https://i.ibb.co/WK6YhLR/img-2.jpg'),
(8, 49, 'https://i.ibb.co/vhtbcfs/img-8.jpg'),
(9, 48, 'https://i.ibb.co/rMX601Q/img-5.jpg'),
(10, 47, 'https://i.ibb.co/Krcvx3x/img-3.jpg'),
(11, 69, 'https://i.ibb.co/vhtbcfs/img-8.jpg'),
(12, 71, 'https://i.ibb.co/WK6YhLR/img-2.jpg'),
(13, 72, 'https://i.ibb.co/0hqfgBX/img-1.jpg'),
(14, 73, 'https://i.ibb.co/YNb755w/img-6.jpg'),
(16, 34, 'https://i.ibb.co/Krcvx3x/img-3.jpg'),
(17, 35, 'https://i.ibb.co/rMX601Q/img-5.jpg'),
(18, 33, 'https://i.ibb.co/YNb755w/img-6.jpg'),
(19, 40, 'https://i.ibb.co/vhtbcfs/img-8.jpg'),
(24, 79, 'https://i.ibb.co/Krcvx3x/img-3.jpg'),
(25, 80, 'https://i.ibb.co/Krcvx3x/img-3.jpg'),
(26, 81, 'https://i.ibb.co/YNb755w/img-6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `admin`) VALUES
(2, 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(3, 'admin', 'plutosshow@gmail.com', 'b2e831d5002a31a0b48b66f463249eea', 1),
(4, 'new', 'new@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', NULL),
(7, 'fasaf', 'test1@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', NULL),
(19, 'test2', 'test2000@gmail.com', '698d51a19d8a121ce581499d7b701668', NULL),
(11, 'test_admin', 'test_admin@gmail.com', 'b2e831d5002a31a0b48b66f463249eea', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Owners`
--

CREATE TABLE IF NOT EXISTS `Owners` (
  `Id_owner` int(11) NOT NULL AUTO_INCREMENT,
  `Second_name` varchar(40) NOT NULL,
  `First_name` varchar(40) NOT NULL,
  `Midle_name` varchar(40) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Id_passport` int(5) DEFAULT NULL,
  PRIMARY KEY (`Id_owner`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Owners`
--

INSERT INTO `Owners` (`Id_owner`, `Second_name`, `First_name`, `Midle_name`, `Gender`, `Id_passport`) VALUES
(6, 'Цезарь', 'Гай', 'Юлий', 'Мужчина', 6),
(5, 'Папов', 'Павел', 'Павлович', 'Мужчина', 1),
(7, 'Дамблдор', 'Альбус', 'Персиваль Вульфрик Брайан', 'Мужчина', 7),
(8, 'Прихожин', 'Алексей', 'Александрович', 'Мужчина', 8),
(10, 'Лучникова', 'Елизавета', 'Андреевна', 'Женщина', 10),
(11, 'Кипелов', 'Вадим', 'Игнатьевич', 'Мужчина', 11),
(12, 'Прокофий', 'Василий', 'Иванович', 'Мужчина', 12),
(13, 'Гореликова', 'Галина', 'Сергеевна', 'Женщина', 13),
(14, 'Кравецкая', 'Татьяна', 'Александровна', 'Женщина', 14),
(15, 'Мареев', 'Роман', 'Любоевич', 'Мужчина', 15),
(16, 'Пушкин', 'Александ', 'Сергеевич', 'Мужчина', 16),
(17, 'Романов', 'Роман', 'Романович', 'Мужчина', 17),
(18, 'Пушкн', 'Александ', 'Сергеевич', 'Мужчина', 18),
(20, 'Щерба', 'Юрий', 'Владимирович', 'Мужчина', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `Passports`
--

CREATE TABLE IF NOT EXISTS `Passports` (
  `Id_passport` int(5) NOT NULL AUTO_INCREMENT,
  `Passport_series` varchar(4) DEFAULT NULL,
  `Passport_ID` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Id_passport`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Passports`
--

INSERT INTO `Passports` (`Id_passport`, `Passport_series`, `Passport_ID`) VALUES
(1, '6895', '541263'),
(2, '5471', '998469'),
(5, '7899', '231154'),
(6, '2010', '315421'),
(7, '5217', '213185'),
(8, '7471', '849727'),
(10, '2135', '264487'),
(11, '5461', '245615'),
(12, '8497', '861943'),
(13, '5467', '549712'),
(14, '5477', '145562'),
(15, '4562', '124856'),
(16, '0001', '000001'),
(17, '1227', '602034'),
(18, '5416', '123211'),
(19, '354', '345'),
(20, '1111', '101010');

-- --------------------------------------------------------

--
-- Структура таблицы `Zapros`
--

CREATE TABLE IF NOT EXISTS `Zapros` (
  `Id_zapros` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_zapros`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Zapros`
--

INSERT INTO `Zapros` (`Id_zapros`, `Name`, `Phone`) VALUES
(70, 'Роки', '+79201236549'),
(77, 'Бальбо', '+79201225469');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
