-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2020 г., 07:56
-- Версия сервера: 5.6.38
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shermat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 2, 1588439781),
('inspektor', 17, 1588332681),
('kotib', 18, 1588492988),
('kotib', 22, 1588736591),
('mahhallaRaisi', 11, 1588492456),
('mahhallaRaisi', 12, 1588491361),
('mahhallaRaisi', 20, 1588514183),
('maslahatchi', 19, 1588350657),
('pospon', 16, 1588492788),
('pospon', 21, 1588520810),
('respublikaHodimi', 13, 1588442585),
('respublikaRaisi', 3, 1588441757),
('theCreator', 1, 1588439914),
('tumanHodimi', 15, 1588487340),
('tumanRaisi', 7, 1588301618),
('tumanRaisi', 8, 1588301967),
('tumanRaisi', 9, 1588489153),
('tumanRaisi', 10, 1588302607),
('viloyatHodimi', 14, 1588486585),
('viloyatRaisi', 4, 1588327242),
('viloyatRaisi', 5, 1588485241),
('viloyatRaisi', 6, 1588327175);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Asosiy Admin', NULL, NULL, 1566550627, 1566550627),
('inspektor', 1, 'Inspektor (Uchastka noziri)', NULL, NULL, 1566550627, 1566550627),
('kotib', 1, 'Mahalla Kotibi', NULL, NULL, 1566550627, 1566550627),
('mahhallaRaisi', 1, 'Hodimlariga rol beradi', NULL, NULL, 1566550627, 1566550627),
('maslahatchi', 1, 'Mahalla Maslahatchisi', NULL, NULL, 1566550627, 1566550627),
('pospon', 1, 'Mahalla posponi', NULL, NULL, 1566550627, 1566550627),
('respublikaHodimi', 1, 'Respublika raisi Hodimi', NULL, NULL, 1566550627, 1566550627),
('respublikaRaisi', 1, 'Hodimlarga va Viloyatlarga rol beradi', NULL, NULL, 1566550627, 1566550627),
('theCreator', 1, 'Tizim Yaratuvchisi', NULL, NULL, 1566550627, 1566550627),
('tumanHodimi', 1, 'Tuman Mahalla hodimlari', NULL, NULL, 1566550627, 1566550627),
('tumanRaisi', 1, 'Hodimlarga va Mahallalarga rol beradi', NULL, NULL, 1566550627, 1566550627),
('viloyatHodimi', 1, 'Viloyat Hodimlari', NULL, NULL, 1566550627, 1566550627),
('viloyatRaisi', 1, 'Hodimlarga va Tumanlarga rol beradi', NULL, NULL, 1566550627, 1566550627);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('theCreator', 'admin'),
('admin', 'mahhallaRaisi'),
('respublikaRaisi', 'mahhallaRaisi'),
('tumanRaisi', 'mahhallaRaisi'),
('admin', 'respublikaHodimi'),
('respublikaRaisi', 'respublikaHodimi'),
('admin', 'respublikaRaisi'),
('admin', 'tumanRaisi'),
('respublikaHodimi', 'tumanRaisi'),
('respublikaRaisi', 'tumanRaisi');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:25:\"app\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1566550627;s:9:\"updatedAt\";i:1566550627;}', 1566550627, 1566550627);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `region_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `region_id`) VALUES
(1, 'Олтинкўл тумани', 1),
(2, 'Андижон тумани', 1),
(3, 'Асака тумани', 1),
(4, 'Балиқчи тумани', 1),
(5, 'Бўз тумани', 1),
(6, 'Булоқбоши тумани', 1),
(7, 'Жалолқудуқ тумани', 1),
(8, 'Избоскан тумани', 1),
(9, 'Қўрғонтепа тумани', 1),
(10, 'Марҳамат тумани', 1),
(11, 'Пахтаобод тумани', 1),
(12, 'Улуғнор тумани', 1),
(13, 'Хўжаобод тумани', 1),
(14, 'Шахрихон тумани', 1),
(15, 'Андижон шаҳар', 1),
(16, 'Хонобод шаҳар', 1),
(17, 'Олот тумани', 2),
(18, 'Бухоро тумани', 2),
(19, 'Вобкент тумани', 2),
(20, 'Ғиждувон тумани', 2),
(21, 'Жондор тумани', 2),
(22, 'Когон тумани', 2),
(23, 'Қоракўл тумани', 2),
(24, 'Қоровулбозор тумани', 2),
(25, 'Пешку тумани', 2),
(26, 'Ромитан тумани', 2),
(27, 'Шофиркон тумани', 2),
(28, 'Бухоро шаҳар', 2),
(29, 'Арнасой тумани', 3),
(30, 'Бахмал тумани', 3),
(31, 'Ғаллаорол тумани', 3),
(32, 'Жиззах тумани', 3),
(33, 'Дўстлик тумани', 3),
(34, 'Зомин тумани', 3),
(35, 'Зарбдор тумани', 3),
(36, 'Зафаробод тумани', 3),
(37, 'Мирзачўл тумани', 3),
(38, 'Пахтакор тумани', 3),
(39, 'Фориш тумани', 3),
(40, 'Янгиобод тумани', 3),
(41, 'Жиззах шаҳар', 3),
(42, 'Ғузор тумани', 4),
(43, 'Деҳқонобод тумани', 4),
(44, 'Қамаши тумани', 4),
(45, 'Қарши тумани', 4),
(46, 'Косон тумани', 4),
(47, 'Касби тумани', 4),
(48, 'Китоб тумани', 4),
(49, 'Миришкор тумани', 4),
(50, 'Муборак тумани', 4),
(51, 'Нишон тумани', 4),
(52, 'Чироқчи тумани', 4),
(53, 'Шаҳрисабз тумани', 4),
(54, 'Яккабоғ тумани', 4),
(55, 'Қарши шаҳар', 4),
(56, 'Конимех тумани', 5),
(57, 'Кармана тумани', 5),
(58, 'Қизилтепа тумани', 5),
(59, 'Навбаҳор тумани', 5),
(60, 'Нурота тумани', 5),
(61, 'Томди тумани', 5),
(62, 'Учқудуқ тумани', 5),
(63, 'Хатирчи тумани', 5),
(64, 'Зарафшон шаҳар', 5),
(65, 'Навоий шаҳар', 5),
(66, 'Косонсой тумани', 6),
(67, 'Мингбулоқ тумани', 6),
(68, 'Наманган тумани', 6),
(69, 'Норин тумани', 6),
(70, 'Поп тумани', 6),
(71, 'Тўрақўрғон тумани', 6),
(72, 'Уйчи тумани', 6),
(73, 'Учқўрғон тумани', 6),
(74, 'Чортоқ тумани', 6),
(75, 'Чуст тумани', 6),
(76, 'Янгиқўрғон тумани', 6),
(77, 'Наманган шаҳар', 6),
(78, 'Оқдарё тумани', 7),
(79, 'Булунғур тумани', 7),
(80, 'Жомбой тумани', 7),
(81, 'Иштихон тумани', 7),
(82, 'Каттақўрғон тумани', 7),
(83, 'Қўшработ тумани', 7),
(84, 'Нарпай тумани', 7),
(85, 'Нуробод тумани', 7),
(86, 'Паяриқ тумани', 7),
(87, 'Пастдарғом тумани', 7),
(88, 'Пахтачи тумани', 7),
(89, 'Самарқанд тумани', 7),
(90, 'Тайлоқ тумани', 7),
(91, 'Ургут тумани', 7),
(92, 'Каттақўрғон шаҳар', 7),
(93, 'Самарқанд шаҳар', 7),
(94, 'Олтинсой тумани', 8),
(95, 'Ангор тумани', 8),
(96, 'Бойсун тумани', 8),
(97, 'Денов тумани', 8),
(98, 'Жарқўрғон тумани', 8),
(99, 'Қизириқ тумани', 8),
(100, 'Қумқўрғон тумани', 8),
(101, 'Музработ тумани', 8),
(102, 'Сариосиё тумани', 8),
(103, 'Термиз тумани', 8),
(104, 'Узун тумани', 8),
(105, 'Шеробод тумани', 8),
(106, 'Шўрчи тумани', 8),
(107, 'Термиз шаҳар', 8),
(108, 'Оқолтин тумани', 9),
(109, 'Боёвут тумани', 9),
(110, 'Гулистон тумани', 9),
(111, 'Мирзаобод тумани', 9),
(112, 'Сайхунобод тумани', 9),
(113, 'Сардоба тумани', 9),
(114, 'Сирдарё тумани', 9),
(115, 'Ховос тумани', 9),
(116, 'Гулистон шаҳар', 9),
(117, 'Ширин шаҳар', 9),
(118, 'Янгиер шаҳар', 9),
(119, 'Оққўрғон тумани', 10),
(120, 'Оҳангарон тумани', 10),
(121, 'Бекобод тумани', 10),
(122, 'Бўстонлиқ тумани', 10),
(123, 'Бўка тумани', 10),
(124, 'Зангиота тумани', 10),
(125, 'Қибрай тумани', 10),
(126, 'Қуйичирчиқ тумани', 10),
(127, 'Паркент тумани', 10),
(128, 'Пискент тумани', 10),
(129, 'Ўртачирчиқ тумани', 10),
(130, 'Чиноз тумани', 10),
(131, 'Юқоричирчиқ тумани', 10),
(132, 'Янгийўл тумани', 10),
(133, 'Олмалиқ шаҳар', 10),
(134, 'Ангрен шаҳар', 10),
(135, 'Бекобод шаҳар', 10),
(136, 'Чирчиқ шаҳар', 10),
(137, 'Олтиариқ тумани', 11),
(138, 'Боғдод тумани', 11),
(139, 'Бешариқ тумани', 11),
(140, 'Бувайда тумани', 11),
(141, 'Данғара тумани', 11),
(142, 'Қува тумани', 11),
(143, 'Қўштепа тумани', 11),
(144, 'Риштон тумани', 11),
(145, 'Сўх тумани', 11),
(146, 'Тошлоқ тумани', 11),
(147, 'Ўзбекистон тумани', 11),
(148, 'Учкўприқ тумани', 11),
(149, 'Фарғона тумани', 11),
(150, 'Фурқат тумани', 11),
(151, 'Ёзёвон тумани', 11),
(152, 'Қўқон шаҳар', 11),
(153, 'Қувасой тумани', 11),
(154, 'Марғилон шаҳар', 11),
(155, 'Фарғона шаҳар', 11),
(156, 'Боғот тумани', 12),
(157, 'Гурлан тумани', 12),
(158, 'Қўшкўпир тумани', 12),
(159, 'Урганч тумани', 12),
(160, 'Хазорасп тумани', 12),
(161, 'Хонқа тумани', 12),
(162, 'Хива тумани', 12),
(163, 'Шовот тумани', 12),
(164, 'Янгибозор туман', 12),
(165, 'Янгиариқ тумани', 12),
(166, 'Урганч шаҳар', 12),
(167, 'Амударё тумани', 13),
(168, 'Беруний тумани', 13),
(169, 'Қораўзак тумани', 13),
(170, 'Кегейли тумани', 13),
(171, 'Қўнғирот тумани', 13),
(172, 'Қонликўл тумани', 13),
(173, 'Мўйноқ тумани', 13),
(174, 'Нукус тумани', 13),
(175, 'Тахтакўпир тумани', 13),
(176, 'Тўрткўл тумани', 13),
(177, 'Хўжайли тумани', 13),
(178, 'Чимбой тумани', 13),
(179, 'Шаманай тумани', 13),
(180, 'Елликқалъа тумани', 13),
(181, 'Нукус шаҳар', 13),
(189, 'Олмазор тумани', 14),
(190, 'Бектемир тумани', 14),
(191, 'Миробод тумани', 14),
(192, 'Мирзо Улуғбек тумани', 14),
(193, 'Сирғали тумани', 14),
(194, 'Учтепа тумани', 14),
(195, 'Яшнобод тумани', 14),
(196, 'Чилонзор тумани', 14),
(197, 'Шайхонтохур тумани', 14),
(198, 'Юнусобод тумани', 14),
(199, 'Яккасарой тумани', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `person_where`
--

CREATE TABLE `person_where` (
  `id` int(10) NOT NULL,
  `republic` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `working_place` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `export` varchar(255) NOT NULL,
  `import` varchar(255) NOT NULL,
  `population_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `population`
--

CREATE TABLE `population` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` int(10) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `region_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `town_block_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `population`
--

INSERT INTO `population` (`id`, `user_id`, `first_name`, `second_name`, `middle_name`, `birthday`, `gender`, `passport`, `nation`, `region_id`, `city_id`, `town_block_id`, `address`, `phone`, `email`, `image`, `created_at`, `updated_at`) VALUES
(3, 20, 'Zokirov', 'Botir', 'Mardon o\'g\'li', '11.11.1993', 1, 'AA 4532635', 'O\'zbek', 3, 30, 3, 'Kamar MFY', '(93) 336-30-36', 'mail@ru', '', '2020-05-03 15:14:48', '2020-05-03 15:14:48'),
(4, 11, 'Usmonkulov', 'Bobur', 'Raxmatulla o\'g\'li', '29.05.1994', 1, 'AA 3655480', 'O\'zbek', 7, 79, 1, 'Qo\'ng\'ir ot qishlog\'i', '(90) 655-05-43', 'usmonkulov5@gmail.com', '', '2020-05-03 15:42:38', '2020-05-03 15:42:38'),
(5, 16, 'Olishev', 'Oloviddin', 'Asliddin o\'g\'li', '04.16.1994', 1, 'AA 4555645', 'O\'zbek', 7, 79, 2, 'Qo\'ng\'ir ot qishlog\'i', '(90) 555-45-25', '', 'uploads/upload/populationss/image/15887372765eb234fcef83a2.38681566.jpg', '2020-05-04 07:01:12', '2020-05-06 03:54:36'),
(6, 11, 'Usmonkulov', 'Bobur', 'Usmonkqulovich', '29.05.1994', 1, 'AA 3655480', 'O\'zbek', 7, 79, 1, 'Qo\'ng\'ir ot qishlog\'i', '(90) 655-05-43', 'usmonkulov5@gmail.com', '', '2020-05-04 10:20:00', '2020-05-04 10:20:00');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` smallint(6) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `region_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `town_block_id` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `be_elected_den` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Андижон вилояти'),
(2, 'Бухоро вилояти'),
(3, 'Жиззах вилояти'),
(4, 'Қашқадарё вилояти'),
(5, 'Навоий вилояти'),
(6, 'Наманган вилояти'),
(7, 'Самарқанд вилояти'),
(8, 'Сурхондарё вилояти'),
(9, 'Сирдарё вилояти'),
(10, 'Тошкент вилояти'),
(11, 'Фарғона вилояти'),
(12, 'Хоразм вилояти'),
(13, 'Қорақалпоғистон Республикаси'),
(14, 'Тошкент шаҳар');

-- --------------------------------------------------------

--
-- Структура таблицы `town_block`
--

CREATE TABLE `town_block` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(10) NOT NULL,
  `region_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `town_block`
--

INSERT INTO `town_block` (`id`, `name`, `city_id`, `region_id`) VALUES
(1, 'Лалмикор МФЙ', 79, 7),
(2, 'Ғобдин МФЙ', 79, 7),
(3, 'Камар МФЙ', 30, 3),
(4, 'Гулбулоқ МФЙ', 30, 3),
(9, 'Beshqo\'ton MFY', 79, 7),
(10, 'Barlos MFY', 30, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` smallint(6) NOT NULL,
  `passport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(10) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `town_block_id` int(10) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `be_elected_den` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `avatar`, `first_name`, `second_name`, `middle_name`, `birthday`, `gender`, `passport`, `nation`, `region_id`, `city_id`, `town_block_id`, `address`, `phone`, `specialist`, `be_elected_den`, `username`, `email`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'uploads/upload/userss/image/15884399145eadab6aefa573.41940296.jpg', 'Usmonkulov', 'Bobur', 'Raxmatulla o\'g\'li', '', 1, '', '', NULL, NULL, NULL, '', '(90) 655-05-43', '', '', 'yaratuvchi', 'bobur1533@gmail.com', '$2y$13$CshK63CXfyoqPwVyY3Ie.et1p0b1swc/GuMFOTNE1Qb8xrb.EO8vO', 10, 'ikC7jEdzPVPAPrGSvXnbcpqAHh2yvuBx', NULL, NULL, 1566550774, 1588439914),
(2, 'uploads/upload/userss/image/15884397815eadaae53b6657.66240096.jpg', 'Cho\'liyev', 'Shermat', 'Nurmatovich', '09.09.1994', 1, 'AA 5286562', 'O\'zbek', NULL, NULL, NULL, '', '(90) 500-88-38', '', '', 'adminka', 'shermat500@mail.ru', '$2y$13$c2Dzfx6mzErU0n8DkHi.BeZfCP4fB516uucglyY25buEUZs12fp3u', 10, 'axv_zbl6Bhj7_NE9s5AulZDRp7tx2fpM', NULL, NULL, 1588266671, 1588483576),
(3, 'uploads/upload/userss/image/15884404495eadad81c8e199.58391197.jpg', 'Respublika', 'Respublika', 'Respublika', '00.00.0000', 1, 'FE 5645256', 'O\'zbek', 15, NULL, NULL, '', '(85) 621-98-56', 'Iqtisodchi', '46.54.154_', 'respublika', 'respublika@gmail.com', '$2y$13$IWU59bt1F.RKLIyZ7Oiq6e2CFtqyIfZ2jRaYAriDoT3FvHdE0Gczi', 10, 'iOoiNLwiYFXVpKZnP3UCDqdraVO3tYci', NULL, NULL, 1588300379, 1588570543),
(4, '', 'Zokirov', 'Botir', 'Mardon o\'g\'li', '16.11.1993', 1, 'AF 1524556', 'O\'zbek', 3, NULL, NULL, '', '(54) 521-15-12', 'Infarmatik', '11.11.2016', 'jizzax', 'jizzax@gmail.com', '$2y$13$oF10l4M.NjM9vS6CDXkjiu0xmEvvs3qCDOCz/uSVEH3xa9kRLy5Oa', 10, 'hHdKIZos03rPTSzb8MQlUvxP18vOmDGI', NULL, NULL, 1588300492, 1588566386),
(5, 'uploads/upload/userss/image/15884852415eae5c79325ac5.69522728.jpg', 'Urolov', 'Saidmurod', 'Saidaxmad o\'g\'li', '04.03.1994', 1, 'SD 8456214', 'O\'zbek', 7, NULL, NULL, '', '(99) 125-21-45', 'Infarmatik', '01.05.2008', 'samarqand', 'samarqand@gmail.com', '$2y$13$NmZVbM1e.WyTtsV3fRCoh.KpikNPQESeLt2qc4LKYOMxdEjdHMdQW', 10, 'l3Py4DTDxvDERWq8RIq2gPc4G22BAqYX', NULL, NULL, 1588300598, 1588485241),
(6, '', 'Choliyev', 'Shermat', 'Nurmatovich', '09.09.1994', 1, 'AA 7412562', 'O\'zbek', 5, NULL, NULL, '', '(90) 500-88-38', 'Infarmatik', '01.02.2019', 'navoiy', 'shermat@gmail.com', '$2y$13$1lFTQTM5S11OIYfEs4vLUu/UyjOeWRJ.psomCfDKQ/kKwkwPnn2wW', 10, 'GevqjljoTZKmNTjrEIMQ-Rk4BLNtvqkh', NULL, NULL, 1588300924, 1588327175),
(7, '', 'Navoiy shahri', 'Navoiy shahri', 'Navoiy shahri', '45.62.1563', 1, 'AS 4554596', 'O\'zbek', 5, 65, NULL, '', '(56) 234-52-15', 'Infarmatik', '10.05.2019', 'navoiyshahri', 'navoiyshahri@gmail.com', '$2y$13$d3mI9Q4K7R5gAAWWGndDqepObuscgzMfStXOITKwPyZnBOxNxuPMu', 10, 'CmVd3Ehug10FpS7249H85W55acFVWnPo', NULL, NULL, 1588301618, 1588301618),
(8, '', 'Nuriyev', 'Hushnud', 'Hushnud o\'g\'li', '05.14.1995', 1, 'AS 4541524', 'O\'zbek', 3, 30, NULL, '', '(93) 955-45-45', 'Matematik', '05.08.2017', 'baxmal', 'baxmal@gmail.com', '$2y$13$r4hGl006iYdjG3C4EA9D.u8GCNJVAhGjShWZc9/W4vRnl1OT34rFi', 10, 'SzpVGnOWg3y1NTwjQ9WqtV9WRGQWnJcm', NULL, NULL, 1588301967, 1588301967),
(9, 'uploads/upload/userss/image/15884891535eae6bc1eec573.91775073.jpg', 'Mamatqulov', 'Mustafoqul', 'Baxriddin o\'g\'li', '02.01.1991', 1, 'SA 4521563', 'O\'zbek', 7, 79, NULL, '', '(84) 521-45-62', 'Iqtisodchi', '02.08.2014', 'bulungur', 'bulungur@gmail.com', '$2y$13$r.wtkaVc0qVrrmnzeeWqXO5vfXYYO4g9X5mERrvvw/IFbyHH6if5u', 10, '8S-_KQHPb6UXkCO2qSxG2wNQKq0pDzUl', NULL, NULL, 1588302342, 1588489153),
(10, '', 'Habibov', 'Urol', 'Habibov', '02.05.1990', 1, 'AX 5478563', 'O\'zbek', 7, 91, NULL, '', '(56) 236-32-62', 'Informatik', '10.02.2015', 'urgut', 'urgut@gmail.com', '$2y$13$nrOixhHjcAj4VgZZjN72p.cm8GJEndEJIqJazJRW6hP88GClS3EDm', 10, 'QSnkcg-qGXEmewIzfF8j802ia6_R2O7G', NULL, NULL, 1588302607, 1588302607),
(11, 'uploads/upload/userss/image/15884924565eae78a878f1e9.25734608.jpg', 'Umurzoqov', 'Raim', 'Umurzoqov', '05.04.1956', 1, 'SS 8756285', 'O\'zbek', 7, 79, 1, '', '(99) 520-53-22', 'Arxitektor', '05.06.2019', 'lalmikor', 'raim@gmail.com', '$2y$13$ZxCAeGIRs3Wsf1lCI7YIVOtNCZJ5kuZTzCI9ONumaxpC3qlbonhDi', 10, 'zkD9sBZTh8MeStQr0M0J6Uuqj3cvENrC', NULL, NULL, 1588306426, 1588573993),
(12, 'uploads/upload/userss/image/15884891165eae6b9cdddb64.67135705.jpg', 'Toshpo\'lov', 'Mansur', 'Beldiyorovich', '01.02.1983', 1, 'AD 9563296', 'O\'zbek', 7, 79, 2, '', '(89) 562-35-89', 'Harbiy ', '14.05.2018', 'gobdin', 'gobdin@gmail.com', '$2y$13$KixsPNZuv6yKQR.Ol9.sbec8oa3z/F6hwA5.bRJTi0wUJQFi/nB6K', 10, '4AiQCqEQIOLddgOIYyrhSylRgqPIfcyQ', NULL, NULL, 1588306638, 1588491361),
(13, 'uploads/upload/userss/image/15884425855eadb5d9004934.13222079.jpg', 'RespublikaHodimi', 'RespublikaHodimi', 'RespublikaHodimi', '00.00.0000', 1, 'AD 5128541', 'O\'zbek', 7, NULL, NULL, '', '(99) 999-99-99', 'Infarmatik', '00.00.0000', 'respublikaHodimi', 'respublikaHodimi@gmail.com', '$2y$13$m87/zBy7.3JOM10OQAAzVuR6SuVnl/B.8yKriGLt5DCVZxqxvic3O', 10, '3jWUx4ulJpWG9Nrs4yrse4c1RDPUoVWW', NULL, NULL, 1588322962, 1588442585),
(14, 'uploads/upload/userss/image/15884865855eae61b980f928.02327716.jpg', 'ViloyatHodimi', 'ViloyatHodimi', 'ViloyatHodimi', '45.18.5632', 1, 'FV 4444545', 'O\'zbek', 7, 79, NULL, '', '(52) 652-02-00', 'Infarmatik', '01.02.2001', 'viloyathodimi', 'viloyathodimi@gmail.com', '$2y$13$pPMUnyxEaGDG4OTTfa6ZWOnOgKURXPT70EDHZMvznzhzGufp48hgi', 10, '1ATpkYqLtmlAuxS4nh07IP-dhWu1SCsI', NULL, NULL, 1588328924, 1588486585),
(15, 'uploads/upload/userss/image/15884873405eae64acacba08.23123044.jpg', 'TumanHodimi', 'TumanHodimi', 'TumanHodimi', '02.45.1555', 1, 'AD 5454152', 'O\'zbek', 7, 79, NULL, '', '(56) 529-65-29', 'Infarmatik', '52.65.2635', 'tumanhodimi', 'tumanhodimi@gmail.com', '$2y$13$7myCWQ9kVvwynSzlN5XpRuvDCnr4HKOq3M0koUDFETfpBTgS9GUPy', 10, 'ol-tX-2IOk8gyizg6dKnBlGrxs0blHwS', NULL, NULL, 1588330672, 1588487340),
(16, 'uploads/upload/userss/image/15884927885eae79f4043932.53140356.jpg', 'Pospon', 'Pospon', 'Pospon', '84.51.6526', 1, 'JB 8562352', 'O\'zbek', 7, 79, 2, '', '(45) 128-55-13', 'Harbiy', '20.02.2002', 'pospon', 'pospon@gmail.com', '$2y$13$bhFjc4vyjDsk9FV26vjxDeRsuooRyidp5axjP82EvBlKj/w6Y1JfK', 10, 'MgjJuxtnfYmiizp0sN7HUkDHAkB41ed3', NULL, NULL, 1588332573, 1588492788),
(17, '', 'Inspektor', 'Inspektor', 'Inspektor', '45.45.2635', 1, 'GG 4521521', 'O\'zbek', 7, 79, 2, '', '(51) 635-26-35', 'Matematik', '45.21.5526', 'inspektor', 'inspektor@gmail.com', '$2y$13$OREtZzbkfchHnxysRiz72eSbk6G8aHKJAmZuPya.df1qdAle1dKKy', 10, '9W9oboKDJ7Q_8WqHsytQT2iGDL_kmzN3', NULL, NULL, 1588332681, 1588332681),
(18, 'uploads/upload/userss/image/15884929885eae7abc39b5c5.68843853.jpg', 'Kotib', 'Kotib', 'Kotib', '45.21.3526', 1, 'DS 4634613', 'O\'zbek', 7, 79, 2, '', '(56) 235-26-35', 'Dasturchi', '56.21.6352', 'kotib', 'kotib@gmail.com', '$2y$13$NaJuezdNA2dM.nR9HQ6mzuj68raN1qKdOInqreTYm6qy8dLVsxqcm', 10, 'OU6-o-5nm8DwUH1c_eGizJlDVmQ2Hi4_', NULL, NULL, 1588332746, 1588492988),
(19, 'uploads/upload/userss/image/15883506575eac4ec125c943.22555814.jpg', 'Maslahatchi', 'Maslahatchi', 'Maslahatchi', '81.65.2635', 1, 'AA 5454456', 'O\'zbek', 7, 79, 2, '', '(48) 532-11-45', 'Matematik', '54.53.5263', 'maslahatchi', 'maslahatchi@gmail.com', '$2y$13$o8H8woY4MzmAylgkzYAaO.WrdQnZKzEJYWIF2xkjyVVOsuX/Hl3La', 10, 'MVH4Y8Rh6Yum4-bHkH4R4f-a8_bjtPxj', NULL, NULL, 1588332837, 1588350657),
(20, '', 'Kamar', 'Kamar', 'Kamar', '56.52.6263', 1, 'AA 6526326', 'O\'zbek', 3, 30, 3, '', '(46) 321-56-32', 'Dasturchi', '51.23.4526', 'kamar', 'kamar@gmail.com', '$2y$13$3GWswCbdgBW5KAepNJ3OzO93Mq8XjYPb.kWoxk2Ndmc0RgFpVsX2q', 10, 'NHlkmhgHdsERZwvZHhWDVtAJ05Y9DUjj', NULL, NULL, 1588514183, 1588514183),
(21, '', 'Pospo', 'Pospo', 'Pospo', '52.35.8963', 1, 'DS 8748754', 'O\'zbek', 7, 79, 1, '', '(56) 324-56-25', 'Infarmatik', '56.21.5562', 'pospo', 'pospo@gmail.com', '$2y$13$VrtjXSbHWIEEa4Qp5DQdfuLf14Ivls9i5p8HHfmbTw9SBvRhOqb7O', 10, 'L0oWqi80L4BDvKpl19sMNLPTdnXuhWqt', NULL, NULL, 1588520810, 1588574481),
(22, '', 'Xolboyeva', 'Roqiya', 'Abdumurodovna', '02.04.1975', 10, 'QW 4514152', 'O\'zbek', 7, 79, 1, '', '(90) 658-42-77', 'Dasturchi', '01.02.2018', 'roqiya', 'kotiba@mail.ru', '$2y$13$5n6y8.xgS3qgkwr/7nB7A.I/Y1CzLoYgNwrIhpiPTJyWzKGuxtdRC', 10, 'KFwS75KMn6GHkyO9sEGd0bcQu4LEnOPF', NULL, NULL, 1588736591, 1588736591);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Индексы таблицы `person_where`
--
ALTER TABLE `person_where`
  ADD PRIMARY KEY (`id`),
  ADD KEY `population_id` (`population_id`);

--
-- Индексы таблицы `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `town_block_id` (`town_block_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `town_block_id` (`town_block_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `town_block`
--
ALTER TABLE `town_block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `register_id` (`region_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `account_activation_token` (`account_activation_token`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `town_block_id` (`town_block_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT для таблицы `person_where`
--
ALTER TABLE `person_where`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `population`
--
ALTER TABLE `population`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `town_block`
--
ALTER TABLE `town_block`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Ограничения внешнего ключа таблицы `person_where`
--
ALTER TABLE `person_where`
  ADD CONSTRAINT `person_where_ibfk_1` FOREIGN KEY (`population_id`) REFERENCES `population` (`id`);

--
-- Ограничения внешнего ключа таблицы `population`
--
ALTER TABLE `population`
  ADD CONSTRAINT `population_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `population_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `population_ibfk_3` FOREIGN KEY (`town_block_id`) REFERENCES `town_block` (`id`),
  ADD CONSTRAINT `population_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `town_block`
--
ALTER TABLE `town_block`
  ADD CONSTRAINT `town_block_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `town_block_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`town_block_id`) REFERENCES `town_block` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
