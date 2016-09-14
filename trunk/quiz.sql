-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Aug 2016 la 10:33
-- Versiune server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `answers`
--

CREATE TABLE `answers` (
  `id_answer` int(7) NOT NULL,
  `id_question` int(6) NOT NULL,
  `txt` varchar(30) NOT NULL,
  `is_correst` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `answers`
--

INSERT INTO `answers` (`id_answer`, `id_question`, `txt`, `is_correst`) VALUES
(1000008, 100002, 'a muri vreodata', 1),
(1000009, 100002, 'a iubi vreodata', 0),
(1000010, 100002, 'a canta cu tine', 0),
(1000011, 100002, 'a citi mai bine', 0),
(1000012, 100003, '2', 0),
(1000013, 100003, '4', 0),
(1000014, 100003, '3', 0),
(1000015, 100003, '5', 1),
(1000016, 100004, 'Inimi cicatrizate', 1),
(1000017, 100004, 'Veronica', 0),
(1000018, 100004, 'Enigma Otiliei', 0),
(1000019, 100004, 'La tiganci', 0),
(1000020, 100005, '1859', 1),
(1000021, 100005, '1918', 0),
(1000022, 100005, '1889', 0),
(1000023, 100005, '1601', 0),
(1000024, 100006, '1889-1894', 0),
(1000025, 100006, '1914-1920', 0),
(1000026, 100006, '1914-1918', 1),
(1000027, 100006, '1900-1907', 0),
(1000028, 100007, '1859-1861', 0),
(1000029, 100007, '1918-1920', 0),
(1000030, 100007, '1889-1890', 0),
(1000031, 100007, '1877-1878', 1),
(1000032, 100008, '1595', 1),
(1000033, 100008, '1596', 0),
(1000034, 100008, '1601', 0),
(1000035, 100008, '1599', 0),
(1000036, 100009, 'Marea Unire', 1),
(1000037, 100009, 'Finalul razboiului', 0),
(1000038, 100009, 'O nunta mare', 0),
(1000039, 100009, 'Prima olimpiada', 0),
(1000040, 100010, 'Budapesta', 0),
(1000041, 100010, 'Brasov', 0),
(1000042, 100010, 'Bucuresti', 1),
(1000043, 100010, 'Iasi', 0),
(1000044, 100011, 'Prut', 0),
(1000045, 100011, 'Zimbru', 0),
(1000046, 100011, 'Dunarea', 1),
(1000047, 100011, 'Rin', 0),
(1000048, 100012, 'Serbia', 0),
(1000049, 100012, 'Grecia', 0),
(1000050, 100012, 'Polonia', 0),
(1000051, 100012, 'Bulgaria', 1),
(1000052, 100013, 'Baia-Mare', 0),
(1000053, 100013, 'Turda', 0),
(1000054, 100013, 'Bistrita', 0),
(1000055, 100013, 'CLuj-Napoca', 1),
(1000056, 100014, 'Vf.Omu', 0),
(1000057, 100014, 'Vf.Fagaras', 0),
(1000058, 100014, 'Vf. Ardelan', 0),
(1000059, 100014, 'Vf. Moldoveanu', 1),
(1000060, 100015, '1990', 0),
(1000061, 100015, '1975', 0),
(1000062, 100015, '1993', 0),
(1000063, 100015, '1995', 1),
(1000064, 100016, 'Google', 0),
(1000065, 100016, 'Sun Microsystems', 1),
(1000066, 100016, 'Levi9', 0),
(1000067, 100016, 'Oracle', 0),
(1000068, 100017, 'Java SE 9', 0),
(1000069, 100017, 'Java SE 8', 1),
(1000070, 100017, 'Java SE 2.0', 0),
(1000071, 100017, 'Java SE 10.3', 0),
(1000072, 100018, 'Net Beans', 1),
(1000073, 100018, 'Codeigniter', 0),
(1000074, 100018, 'Laravel', 0),
(1000075, 100018, 'NqSistems', 0),
(1000076, 100019, 'Oracle', 0),
(1000077, 100019, 'Yahoo', 1),
(1000078, 100019, 'Apple', 0),
(1000079, 100019, 'Android', 0),
(1000080, 100020, '2004', 0),
(1000081, 100020, '2008', 1),
(1000082, 100020, '1999', 0),
(1000083, 100020, '2007', 0),
(1000084, 100021, 'stiinta si arta de a convinge', 1),
(1000085, 100021, 'imaginea unui produs', 0),
(1000086, 100021, 'cum sa te afisezi', 0),
(1000087, 100021, 'stiinta de a cumpara', 0),
(1000088, 100022, 'un echipament sportiv', 0),
(1000089, 100022, 'o bautura racoritoare', 1),
(1000090, 100022, 'o prajiruta', 0),
(1000091, 100022, 'o echipa de sport', 0),
(1000092, 100023, 'Ning Nang', 0),
(1000093, 100023, 'Reebok', 0),
(1000094, 100023, 'Genius', 0),
(1000095, 100023, 'Adidas', 1),
(1000096, 100024, 'Peace and love', 0),
(1000097, 100024, 'Just do it', 1),
(1000098, 100024, 'Be you', 0),
(1000099, 100024, 'Just love it', 0),
(1000100, 100025, '?', 0),
(1000101, 100025, '+', 1),
(1000102, 100025, '>>', 0),
(1000103, 100025, '&', 0),
(1000104, 100026, '16', 0),
(1000105, 100026, '32', 1),
(1000106, 100026, '34', 0),
(1000107, 100026, '18', 0),
(1000108, 100027, 'Da', 1),
(1000109, 100027, 'Nu', 0),
(1000110, 100027, 'Doar uneori', 0),
(1000111, 100027, 'Doar in anumite tari', 0),
(1000112, 100028, 'Bill Gates', 0),
(1000113, 100028, 'Bjarne Stroustrup', 1),
(1000114, 100028, 'John Marshall', 0),
(1000115, 100028, 'Piotr Alexei Vildrov', 0),
(1000116, 100029, 'Sterge variabilele', 0),
(1000117, 100029, 'Revine la valorile initiale', 0),
(1000118, 100029, 'Sorteaza un sir', 0),
(1000119, 100029, 'Schimba valorile variabilelor', 1),
(1000120, 100030, 'Franta', 0),
(1000121, 100030, 'Italia', 1),
(1000122, 100030, 'Brazilia', 0),
(1000123, 100030, 'Spania', 0),
(1000124, 100031, 'Livorno', 0),
(1000125, 100031, 'Real Madrid', 1),
(1000126, 100031, 'PSG', 0),
(1000127, 100031, 'Liverpool', 0),
(1000128, 100032, 'Ibrahimovic', 0),
(1000129, 100032, 'Adriano', 0),
(1000130, 100032, 'Dan Petrescu', 1),
(1000131, 100032, 'Andy Murray', 0),
(1000132, 100033, '31', 0),
(1000133, 100033, '26', 1),
(1000134, 100033, '21', 0),
(1000135, 100033, '18', 0),
(1000136, 100034, 'Shaktar Donetk', 1),
(1000137, 100034, 'Sevilla', 0),
(1000138, 100034, 'Hamburg', 0),
(1000139, 100034, 'AC Milan', 0),
(1000140, 100035, 'Franta', 0),
(1000141, 100035, 'Italia', 1),
(1000142, 100035, 'Brazilia', 0),
(1000143, 100035, 'Spania', 0),
(1000144, 100036, '30', 0),
(1000145, 100036, '28', 0),
(1000146, 100036, '24', 1),
(1000147, 100036, '36', 0),
(1000148, 100037, 'Osul lingan', 0),
(1000149, 100037, 'Osul coxal', 1),
(1000150, 100037, 'Osul piciorului', 0),
(1000151, 100037, 'Osul cruxal', 0),
(1000152, 100038, 'Constipatie', 0),
(1000153, 100038, 'Alergie', 0),
(1000154, 100038, 'Mahmureala', 0),
(1000155, 100038, 'Amnezie', 1),
(1000177, 100073, 'Europa', 1),
(1000178, 100073, 'Africa', 0),
(1000179, 100073, 'Asia', 0),
(1000180, 100073, 'Australia', 0),
(1000185, 100001, '1889', 0),
(1000186, 100001, '1850', 1),
(1000187, 100001, '1990', 0),
(1000188, 100001, '1598', 0),
(1000189, 100075, 'Mihai', 1),
(1000190, 100075, 'Radu', 0),
(1000191, 100075, 'Mircea', 0),
(1000192, 100075, 'Sava', 0),
(1000197, 100000, 'Liviu Rebreanu', 1),
(1000198, 100000, 'I.Creanga', 0),
(1000199, 100000, 'Eminescu', 0),
(1000200, 100000, 'I.Slavici', 0),
(1000201, 100076, 'Cardiff', 0),
(1000202, 100076, 'Dublin', 0),
(1000203, 100076, 'Londra', 1),
(1000204, 100076, 'Manchester', 0),
(1000205, 100077, 'Alliantz Arena', 1),
(1000206, 100077, 'Spitzbacher Stadium', 0),
(1000207, 100077, 'Fussball Arena', 0),
(1000208, 100077, 'Der Bildstadt', 0),
(1000209, 100078, 'britanica', 0),
(1000210, 100078, 'franceza', 1),
(1000211, 100078, 'olandeza', 0),
(1000212, 100078, 'italiana', 0),
(1000213, 100079, 'Olanda', 0),
(1000214, 100079, 'Franta', 0),
(1000215, 100079, 'Spania', 0),
(1000216, 100079, 'Portugalia', 1),
(1000217, 100080, 'Traian Basescu', 0),
(1000218, 100080, 'Iosif Stalin', 0),
(1000219, 100080, 'Adolf Hitler', 1),
(1000220, 100080, 'Paul McCarthney', 0),
(1000221, 100081, '2', 0),
(1000222, 100081, '6', 0),
(1000223, 100081, '8', 1),
(1000224, 100081, '16', 0),
(1000225, 100082, '12', 1),
(1000226, 100082, '15', 1),
(1000227, 100082, '9', 0),
(1000228, 100082, '10', 0),
(1000229, 100083, '12', 1),
(1000230, 100083, '2', 1),
(1000231, 100083, '4', 1),
(1000232, 100083, '890', 1),
(1000233, 100084, '12', 0),
(1000234, 100084, '7', 1),
(1000235, 100084, '3', 1),
(1000236, 100084, '13', 1),
(1000237, 100085, '4', 0),
(1000238, 100085, '6', 1),
(1000239, 100085, '8', 0),
(1000240, 100085, '7', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `classes`
--

CREATE TABLE `classes` (
  `id_class` int(2) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `classes`
--

INSERT INTO `classes` (`id_class`, `name`) VALUES
(10, '12A'),
(11, '12B'),
(12, '12C'),
(13, '12D');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `questions`
--

CREATE TABLE `questions` (
  `id_question` int(6) NOT NULL,
  `txt` varchar(50) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `questions`
--

INSERT INTO `questions` (`id_question`, `txt`, `grade`) VALUES
(100000, 'Cine a scris romanul "Ion"?', 3),
(100001, 'In ce an s-a nascut Eminescu?', 4),
(100002, 'Completati versul: "Nu credeam sa-nvat..."', 2),
(100003, 'Cati copii avea Moromete?', 2),
(100004, 'Care roman de mai jos e scris de Max Blecher?', 2),
(100005, 'Cand s-a facut Unirea Moldovei cu Tara Romaneasa?', 2),
(100006, 'Intre ce ani a avut loc primul razboi mondial?', 2),
(100007, 'Razboiul de Independenta al României a avut loc în', 2),
(100008, 'În ce an a avut loc Batalia de la Calugareni?', 2),
(100009, 'În data de 1 Decembrie 1918 a avut loc...', 2),
(100010, 'Care este capitala Romaniei?', 2),
(100011, 'Ce fluviu trece prin Romania?', 2),
(100012, 'Cu cine se invecineaza Romania la sud?', 2),
(100013, 'Care este cel mai mare oras din Transilvania?', 2),
(100014, 'Care este cel mai inalt munte din Romania?', 2),
(100015, 'Cand a aparut Java?', 2),
(100016, 'Cine a dezvoltat Java?', 2),
(100017, 'Care este ultima versiune Java?', 2),
(100018, 'Care din urmatoarele e mediu de dezvoltare Java?', 2),
(100019, 'Cine detine in momentul actual Java?.', 2),
(100020, 'In ce an a aparut primul iPhone?', 2),
(100021, 'Ce reprezinta marketingul conform wikipedia?', 2),
(100022, 'Ce reprezinta Coca-Cola?', 2),
(100023, 'Care din urmatoarele brand-uri e mai cunoscut?', 2),
(100024, 'Care este tagline-ul comaniei "Nike"?', 2),
(100025, 'Care din urmatorii e operator aritmetic?', 2),
(100026, 'Cat este x in x=2^4+16 ?', 2),
(100027, 'Este prezent POO in C++?', 2),
(100028, 'Cine este creatorul limbajului C++?', 2),
(100029, 'Care este rolul functie swap()?', 2),
(100030, 'Cine a castigat Cupa Mondiala in 2006?', 2),
(100031, 'La ce echipa de jos a jucat Figo?', 2),
(100032, 'Care jucator a jucat la Chelsea?', 2),
(100033, 'Cate titluri de campiona are Steaua?', 2),
(100034, 'Cine a castigat Cupa UEFA in 2009?', 2),
(100035, 'Cate coaste are un om?', 2),
(100036, 'Cati cromozomi are un om?', 2),
(100037, 'Care e cel mai lat os al scheletului?', 2),
(100038, 'Cum se numeste pierderea memoriei?', 2),
(100073, 'Unde este Romania?', 3),
(100075, 'Cine sunt eu?', 2),
(100076, 'In ce oras se afla echipa Arsenal?', 3),
(100077, 'Care este stadionul echipei Bayern Munchen?', 3),
(100078, 'Ce nationalitate are Paul Pogba?', 2),
(100079, 'Cine a castigat EURO 2016?', 1),
(100080, 'Cine a condus Germania in WW2?', 10),
(100081, 'Cat face 2^3?', 2),
(100082, 'Care numar e mai mare ca 10?', 2),
(100083, 'Care numere sunt pare?', 2),
(100084, 'Care numere sunt impare?', 2),
(100085, 'Cat face 2+2*2 ?', 2);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `questions_to_tests`
--

CREATE TABLE `questions_to_tests` (
  `id_test` int(4) DEFAULT NULL,
  `id_questions` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `questions_to_tests`
--

INSERT INTO `questions_to_tests` (`id_test`, `id_questions`) VALUES
(1000, 100001),
(1000, 100002),
(1000, 100003),
(1000, 100004),
(1001, 100001),
(1001, 100005),
(1001, 100006),
(1001, 100007),
(1001, 100014),
(1002, 100010),
(1002, 100011),
(1002, 100012),
(1002, 100013),
(1002, 100014),
(1003, 100015),
(1003, 100016),
(1004, 100020),
(1004, 100021),
(1004, 100022),
(1004, 100023),
(1004, 100024),
(1005, 100025),
(1005, 100026),
(1005, 100027),
(1005, 100029),
(1006, 100030),
(1006, 100032),
(1007, 100036),
(1007, 100037),
(1008, 100076),
(1008, 100077),
(1008, 100078),
(1008, 100079),
(1009, 100080),
(1010, 100081),
(1010, 100082),
(1010, 100083),
(1010, 100084),
(1010, 100085);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `results`
--

CREATE TABLE `results` (
  `id_result` int(5) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_test` int(4) NOT NULL,
  `final_grade` int(11) NOT NULL,
  `lim` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `results`
--

INSERT INTO `results` (`id_result`, `id_user`, `id_test`, `final_grade`, `lim`) VALUES
(10231, 100, 1004, 2, 2),
(10232, 100, 1001, 4, 1),
(10234, 100, 1003, 6, 2),
(10236, 140, 1003, 0, 2),
(10237, 106, 1001, 6, 1),
(10239, 131, 1004, 8, 1),
(10240, 131, 1003, 6, 2),
(10241, 106, 1002, 10, 1),
(10245, 137, 1006, 4, 2),
(10247, 137, 1007, 2, 2),
(10248, 137, 1000, 10, 1),
(10249, 103, 1000, 8, 1),
(10250, 103, 1002, 6, 1),
(10251, 102, 1000, 8, 1),
(10252, 102, 1002, 6, 1),
(10253, 128, 1000, 10, 1),
(10254, 128, 1006, 4, 1),
(10256, 108, 1000, 6, 2),
(10257, 108, 1002, 10, 1),
(10258, 105, 1000, 8, 1),
(10259, 105, 1002, 2, 1),
(10260, 120, 1006, 4, 1),
(10261, 120, 1000, 10, 1),
(10262, 123, 1006, 2, 1),
(10263, 125, 1000, 6, 1),
(10264, 125, 1006, 2, 1),
(10265, 107, 1000, 4, 1),
(10266, 107, 1002, 2, 1),
(10267, 132, 1007, 0, 1),
(10268, 132, 1006, 0, 1),
(10269, 132, 1000, 4, 1),
(10270, 110, 1002, 4, 1),
(10271, 110, 1000, 4, 1),
(10272, 103, 1008, 9, 1),
(10273, 108, 1008, 9, 1),
(10274, 113, 1008, 8, 1),
(10275, 104, 1008, 8, 1),
(10276, 109, 1008, 3, 1),
(10277, 107, 1008, 1, 1),
(10278, 106, 1008, 9, 1),
(10279, 128, 1005, 8, 1),
(10280, 128, 1008, 3, 1),
(10281, 116, 1009, 10, 1),
(10282, 104, 1009, 10, 1),
(10283, 103, 1009, 10, 1),
(10284, 106, 1009, 10, 1),
(10285, 120, 1009, 10, 1),
(10286, 120, 1008, 5, 1),
(10287, 120, 1005, 8, 1),
(10288, 105, 1009, 10, 1),
(10289, 105, 1008, 4, 1),
(10290, 101, 1008, 1, 1),
(10291, 101, 1009, 0, 1),
(10292, 137, 1008, 5, 1),
(10293, 121, 1010, 5, 1),
(10296, 141, 1010, 9, 3),
(10300, 108, 1010, 1, 4),
(10302, 102, 1010, 2, 2),
(10303, 110, 1010, 4, 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tests`
--

CREATE TABLE `tests` (
  `id_test` int(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `date_time` date NOT NULL,
  `limit_test` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `tests`
--

INSERT INTO `tests` (`id_test`, `name`, `description`, `date_time`, `limit_test`) VALUES
(1000, 'Literatura', 'Operele romane', '2016-08-22', 3),
(1001, 'Istorie', 'Istoria romana si universala', '2016-08-19', 3),
(1002, 'Geografie', 'Geografia Romaniei', '2016-08-22', 2),
(1003, 'Java', 'Java basic', '2016-08-30', 2),
(1004, 'Marketing', 'Notiuni de marketing', '2016-08-21', 2),
(1005, 'Informatic', 'C/C++', '2016-08-23', 2),
(1006, 'Sport', 'Istoria fotbalului', '2016-08-22', 2),
(1007, 'Biologie', 'Biologie umana', '2016-08-22', 2),
(1008, 'Fotbal 1.0', 'Intrebari fotbal', '2016-08-23', 1),
(1009, 'Istorie 2', 'Istorie universala', '2016-08-24', 1),
(1010, 'Matematica', 'Mate', '2016-08-24', 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tests_to_classes`
--

CREATE TABLE `tests_to_classes` (
  `id_test` int(4) DEFAULT NULL,
  `id_class` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `tests_to_classes`
--

INSERT INTO `tests_to_classes` (`id_test`, `id_class`) VALUES
(1000, 10),
(1000, 11),
(1000, 12),
(1000, 13),
(1001, 10),
(1001, 11),
(1002, 10),
(1002, 11),
(1003, 10),
(1003, 11),
(1003, 12),
(1003, 13),
(1004, 10),
(1004, 11),
(1004, 12),
(1004, 13),
(1005, 12),
(1006, 12),
(1006, 13),
(1007, 13),
(1008, 10),
(1008, 11),
(1008, 12),
(1008, 13),
(1009, 10),
(1009, 11),
(1009, 12),
(1009, 13),
(1010, 10),
(1010, 11),
(1010, 12),
(1010, 13);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `name`, `type`) VALUES
(100, 'mih@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Mihai', 'student'),
(101, 'ionut@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Ionut', 'student'),
(102, 'gabi@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Gabi', 'student'),
(103, 'catalin@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Catalin', 'student'),
(104, 'radu@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Radu', 'student'),
(105, 'luca@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Luca', 'student'),
(106, 'bogdan@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Bogdan', 'student'),
(107, 'vasile@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Vasile', 'student'),
(108, 'petrea@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Petre', 'student'),
(109, 'rares@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Rares', 'student'),
(110, 'claudiu@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Claudiu', 'student'),
(111, 'elena@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Elena', 'student'),
(112, 'maria@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Maria', 'student'),
(113, 'rovana@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Rovana', 'student'),
(114, 'elvira@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Elvira', 'student'),
(115, 'madalina@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Madalina', 'student'),
(116, 'ramona@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Ramona', 'student'),
(117, 'sebi@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Sebi', 'student'),
(118, 'andrei@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Andrei', 'student'),
(119, 'mircea@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Mircea', 'student'),
(120, 'florin@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Florin', 'student'),
(121, 'ana@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Ana', 'student'),
(122, 'sergiu@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Sergiu', 'student'),
(123, 'ion@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Ion', 'student'),
(124, 'sava@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Sava', 'student'),
(125, 'vlad@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Vlad', 'student'),
(126, 'oli@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Oloer', 'student'),
(127, 'mut@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Mut', 'student'),
(128, 'narcis@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Narcis', 'student'),
(129, 'alin@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Alin', 'student'),
(130, 'simona@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Simona', 'student'),
(131, 'frank@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Frank', 'student'),
(132, 'alexeii@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Alex', 'student'),
(133, 'joeyy@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Joeyy', 'student'),
(134, 'ama@yahoo.com', '92829e7b9c96f08d0e216871cd9468f9', 'Ama', 'student'),
(137, 'rafaela@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Rafaela', 'student'),
(138, 'mica@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Mica', 'student'),
(139, 'mike@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Mike', 'student'),
(140, 'luke@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Luke', 'student'),
(141, 'admin@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Admin', 'admin'),
(142, 'onis@yahoo.com', 'd1b9c41c07716869f0ca58308f33617a', 'Onis', 'student');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users_to_classes`
--

CREATE TABLE `users_to_classes` (
  `id_class` int(2) DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users_to_classes`
--

INSERT INTO `users_to_classes` (`id_class`, `id_user`) VALUES
(10, 100),
(10, 101),
(10, 102),
(10, 103),
(10, 104),
(10, 105),
(10, 106),
(10, 107),
(10, 108),
(10, 109),
(11, 110),
(11, 111),
(11, 112),
(11, 113),
(11, 114),
(11, 115),
(11, 116),
(11, 117),
(11, 118),
(11, 119),
(12, 120),
(12, 121),
(12, 122),
(12, 123),
(12, 124),
(12, 125),
(12, 126),
(12, 127),
(12, 128),
(12, 129),
(13, 130),
(13, 131),
(13, 132),
(13, 133),
(13, 134),
(13, 137),
(13, 138),
(13, 139),
(13, 140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `ref_answer_questions` (`id_question`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `questions_to_tests`
--
ALTER TABLE `questions_to_tests`
  ADD UNIQUE KEY `id_test` (`id_test`,`id_questions`),
  ADD KEY `ref_questions_to_tests_questions` (`id_questions`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `ref_results_users` (`id_user`),
  ADD KEY `ref_results_tests` (`id_test`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id_test`);

--
-- Indexes for table `tests_to_classes`
--
ALTER TABLE `tests_to_classes`
  ADD UNIQUE KEY `id_test` (`id_test`,`id_class`),
  ADD KEY `ref_tests_to_classes_classes` (`id_class`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_to_classes`
--
ALTER TABLE `users_to_classes`
  ADD UNIQUE KEY `id_class` (`id_class`,`id_user`),
  ADD KEY `ref_users_to_clases_users` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000241;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_class` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100086;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id_result` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10304;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id_test` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `ref_answer_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`);

--
-- Restrictii pentru tabele `questions_to_tests`
--
ALTER TABLE `questions_to_tests`
  ADD CONSTRAINT `ref_questions_to_tests_questions` FOREIGN KEY (`id_questions`) REFERENCES `questions` (`id_question`),
  ADD CONSTRAINT `ref_questions_to_tests_tests` FOREIGN KEY (`id_test`) REFERENCES `tests` (`id_test`);

--
-- Restrictii pentru tabele `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `ref_results_tests` FOREIGN KEY (`id_test`) REFERENCES `tests` (`id_test`),
  ADD CONSTRAINT `ref_results_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Restrictii pentru tabele `tests_to_classes`
--
ALTER TABLE `tests_to_classes`
  ADD CONSTRAINT `ref_tests_to_clases_classes` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id_class`),
  ADD CONSTRAINT `ref_tests_to_classes_classes` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id_class`),
  ADD CONSTRAINT `ref_tests_to_classes_tests` FOREIGN KEY (`id_test`) REFERENCES `tests` (`id_test`);

--
-- Restrictii pentru tabele `users_to_classes`
--
ALTER TABLE `users_to_classes`
  ADD CONSTRAINT `ref_users_to_clases_classes` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id_class`),
  ADD CONSTRAINT `ref_users_to_clases_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
