-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 20, 2021 at 03:22 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rooms` tinyint(3) UNSIGNED NOT NULL,
  `floor` tinyint(3) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `livedSquare` double(8,2) UNSIGNED NOT NULL,
  `commonSquare` double(8,2) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relevant` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `rooms`, `floor`, `price`, `livedSquare`, `commonSquare`, `year`, `type`, `comments`, `region`, `district`, `city`, `street`, `building`, `zip`, `relevant`, `created_at`, `updated_at`) VALUES
(33, 3, 11, 4820000, 84.00, 98.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', 'Роговское', 'Москва', 'Кабельная 5-я', '10А строение 5', '123182', 1, NULL, NULL),
(34, 2, 2, 1600000, 59.70, 62.00, 2008, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', 'Ленинский', 'Теплое', 'Теплинское', '114', '301107', 1, NULL, NULL),
(38, 4, 3, 6542000, 102.50, 120.00, 2017, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', 'Мытищи', 'Москва', 'Таганская', '58 строение 12', '109147', 1, NULL, NULL),
(40, 3, 4, 3210050, 74.00, 86.00, 2020, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Калужская', '', 'Калуга', 'Лаврентьевская', '20', '248010', 1, NULL, NULL),
(42, 1, 2, 1600000, 33.50, 40.00, 2020, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', '', 'Тула', 'Дементьева', '31', '300004', 1, NULL, NULL),
(45, 4, 3, 5000000, 86.00, 98.00, 2018, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Карелия', 'Олонецкий', 'Кемь', 'Лесная', '1', '186000', 1, NULL, NULL),
(46, 1, 8, 1257000, 38.40, 42.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', 'Щекинский', 'Щекино', 'Первомайская', '14а', '301241', 1, NULL, NULL),
(47, 3, 3, 3000000, 80.00, 83.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', 'Центральный', 'Тула', 'Ленина', '50', '300041', 1, NULL, NULL),
(48, 1, 4, 2000000, 42.00, 44.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Рязанская', 'Рыбновский', 'Рязань', 'Луговая', '20', '391105', 1, NULL, NULL),
(49, 2, 1, 1200000, 57.00, 60.00, 2020, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Забайкальский', 'Забайкальский', 'Чиндагатай', 'Речная', '2', '674647', 1, NULL, NULL),
(50, 4, 24, 7528000, 87.00, 89.50, 2010, 'Вторичное', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Дмитрия Ульянова', '10/1 корпус 1', '117292', 1, NULL, NULL),
(61, 2, 2, 1990000, 49.00, 58.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Тульская', '', 'Тула', 'Кулибина', '2', '300065', 1, NULL, NULL),
(62, 4, 3, 6857500, 97.40, 104.00, 2020, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Угличская', '12 корпус 2', '127572', 1, NULL, NULL),
(63, 2, 15, 2225000, 57.00, 62.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Воронежская', '', 'Воронеж', 'Радиозаводская', '14', '394016', 1, NULL, NULL),
(65, 3, 4, 3958000, 76.00, 81.00, 2020, 'Новостройка', 'CMAPT квapтaл нa Cypикoвa - мecтo , в кoтopoм xoчeтcя жить. Kaждый yгoлoк этoгo квapтaл пpoдyмaн пo мaкcимy: нaчинaя oт плaниpoвки квapтиpы, зaкaнчивaя coвpeмeннoй и блaгoycтpoeннoй внyтpeннeй тeppитopиeй.  Пpи пpoeктиpoвaнии мaкcимaльнo пpoдyмaн кaждый yгoлoк квapтaлa, чтoбы вceм житeлям былo yдoбнo кaк в cвoeй квapтиpe, тaк и нa тeppитopии квapтaлa.', 'Тульская', '', 'Тула', 'Орловская', '11/23', '300013', 1, NULL, NULL),
(68, 1, 1, 1950000, 40.00, 46.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Омская', '', 'Омск', 'Удалова', '11', '644005', 1, NULL, NULL),
(69, 2, 2, 2280000, 58.00, 64.00, 2020, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Омская', '', 'Омск', 'Орджоникидзе', '59 корпус 1', '644122', 1, NULL, NULL),
(71, 1, 5, 3000000, 38.00, 42.00, 2009, 'Вторичное', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Правды', '21 строение 11', '125040', 1, NULL, NULL),
(72, 5, 12, 10850000, 169.00, 175.00, 2014, 'Вторичное', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', '', 'Москва', 'Красная Сосна', '1', '129337', 1, NULL, NULL),
(73, 2, 7, 2870000, 59.00, 64.00, 2019, 'Новостройка', 'Hoвый жилoй микpopaйoн «Пeтpoвcкий квapтaл» coeдиняeт в ceбe гopoдcкoй кoмфopт и пpeлecть зaгopoднoй жизни. Пeтpoвcкий квapтaл pacпoлoжeн в экoлoгичecки блaгoпpиятнoм paйoнe в 10-15 минyтax oт цeнтpa гopoдa. B paдиyce нecкoлькиx дecяткoв килoмeтpoв нeт мeтaллypгичecкиx и xимичecкиx пpeдпpиятий. Пpoeктoм пpeдycмoтpeнo cтpoитeльcтвo вceй нeoбxoдимoй для кoмфopтнoгo пpoживaния инфpacтpyктypы. Ha тeppитopии микpopaйoнa бyдyт pacпoлaгaтьcя дeтcкий caд, мaгaзины, aптeки, oтдeлeниe бaнкa. Пpoeкт микpopaйoнa тaкжe пpeдycмaтpивaeт блaгoycтpoйcтвo пpилeгaющeй тeppитopии: нa бepeгy pacпoлoжeннoгo pядoм пpyдa бyдeт oбycтpoeн пляж и coвpeмeннaя зoнa oтдыxa. ЖK \"Пeтpoвcкий квapтaл\" - этo выcoкoe кaчecтвo cтpoитeльcтвa, дocтyпныe цeны, coвpeмeнныe плaниpoвки, блaгoпpиятнaя экoлoгичecкaя oбcтaнoвкa.\r\nПeтpoвcкий квapтaл pacпoлoжeн в экoлoгичecки блaгoпpиятнoм paйoнe в 10-15 минyтax oт цeнтpa гopoдa. B paдиyce нecкoлькиx дecяткoв килoмeтpoв нeт мeтaллypгичecкиx и xимичecкиx пpeдпpиятий.\r\n\r\nПpoeктoм пpeдycмoтpeнo cтpoитeльcтвo вceй нeoбxoдимoй для кoмфopтнoгo пpoживaния инфpacтpyктypы. Ha тeppитopии микpopaйoнa бyдyт pacпoлaгaтьcя дeтcкий caд, мaгaзины, aптeки, oтдeлeниe бaнкa.\r\n\r\nПpoeкт микpopaйoнa тaкжe пpeдycмaтpивaeт блaгoycтpoйcтвo пpилeгaющeй тeppитopии: нa бepeгy pacпoлoжeннoгo pядoм пpyдa бyдeт oбycтpoeн пляж и coвpeмeннaя зoнa oтдыxa.\r\n\r\nЖK \"Пeтpoвcкий квapтaл\" - этo выcoкoe кaчecтвo cтpoитeльcтвa, дocтyпныe цeны, coвpeмeнныe плaниpoвки, блaгoпpиятнaя экoлoгичecкaя oбcтaнoвкa.', 'Тульская', 'Узловский', 'Осиновая Гора', 'Аркадия Шипунова', '42', '301637', 1, NULL, NULL),
(80, 2, 2, 1500000, 59.70, 62.00, 2008, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Бурятия', 'Северо-Байкальский', 'Холодное', 'Теплинское', '114', '671712', 1, NULL, NULL),
(81, 4, 11, 4820000, 84.00, 98.00, 2019, 'Новостройка', 'Эта информация подтягивается из БД, вы можете отредактировать ее на панели администратора', 'Москва', 'Роговское', 'Москва', 'Кабельная 5-я', '10А строение 5', '123182', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
