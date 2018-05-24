-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 03:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inmap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `email`, `phone_number`, `gender`, `birthday`) VALUES
(1, 'inmap', '73782b1a6102b29fc47bf6f766bf272c', 'wiratmajaya62@gmail.com', '087853947663', 'male', '1997-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `transaction_account_id` int(10) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `name` varchar(120) NOT NULL,
  `rek_number` varchar(30) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`transaction_account_id`, `bank_name`, `name`, `rek_number`, `user_id`) VALUES
(1, 'bri', 'komang ganteng', '343-3242-32432-324', 12);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `comment_time` datetime(6) NOT NULL,
  `parent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `content`, `comment_time`, `parent_id`) VALUES
(13, 15, 'ass', '2018-05-11 16:33:00.000000', 58),
(14, 15, 'asas', '2018-05-11 16:33:00.000000', 13),
(15, 15, 'asasas', '2018-05-11 16:34:00.000000', 14),
(16, 15, 'goo', '2018-05-11 16:54:00.000000', 13),
(17, 15, 'sdsd', '2018-05-11 16:54:00.000000', 58),
(18, 15, 'dee', '2018-05-11 17:36:00.000000', 15),
(19, 15, 'asasas', '2018-05-11 17:36:00.000000', 58),
(20, 15, 'ok', '2018-05-11 17:36:00.000000', 17),
(21, 15, 'aaaa', '2018-05-11 17:50:00.000000', 58),
(22, 15, 'apa sih pak?', '2018-05-11 17:50:00.000000', 21),
(24, 15, 'as', '2018-05-11 18:55:00.000000', 46),
(25, 15, 'wah gue pasti dateng nih, keren eventnya, makasi udah undang aku ya', '2018-05-11 19:09:00.000000', 47),
(26, 12, 'siap sama sama, awas sampe ngga dateng ya :)', '2018-05-11 19:13:00.000000', 25),
(27, 16, 'keren nih event, deket lagi, cuss lah', '2018-05-11 19:34:00.000000', 46),
(28, 16, 'ni orang napa ya ?', '2018-05-11 19:34:00.000000', 21),
(29, 15, 'great, this is free, i will buy', '2018-05-13 13:14:00.000000', 60),
(30, 12, 'aaasas', '2018-05-14 18:41:00.000000', 61),
(31, 12, 'asdsd', '2018-05-14 18:41:00.000000', 61),
(32, 12, 'asdsad', '2018-05-14 18:41:00.000000', 30),
(33, 12, 'greatt', '2018-05-15 12:59:00.000000', 61),
(34, 12, 'ok', '2018-05-15 13:00:00.000000', 61);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` longtext NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `type` enum('public','private') NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `ticket` enum('yes','no') NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `timeStart` varchar(8) NOT NULL,
  `timeEnd` varchar(8) NOT NULL,
  `status` enum('offline','online') NOT NULL,
  `user_id` int(15) NOT NULL,
  `post_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `title`, `description`, `video_url`, `type`, `kategori_id`, `ticket`, `dateStart`, `dateEnd`, `timeStart`, `timeEnd`, `status`, `user_id`, `post_time`) VALUES
(46, '																																																																																																												<h1 class=\"listing-hero-title\" data-automation=\"listing-title\" style=\"margin-right: auto; margin-bottom: 0px; margin-left: auto; padding: 0px 0px 2px; font-size: 25px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: rgb(40, 44, 53); font-weight: 600; line-height: 30px; letter-spacing: 0.5px; word-break: break-word; font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgba(255,=\"\" 255,=\"\" 0.9);\"=\"\">TAKSU (KREATIVITAS PRAMUKA) 2018 - ZONA SKILL dan KREATIVITAS TANPA BATAS</h1>																																																																																																								', '																																																																																																												<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">Setiap Peserta Hanya Boleh Memilih 1 Pilihan Pada Tiap Zona Karena Kegiatan Tersebut Bersamaan.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">*Khusus Untuk Fotografi Lokasi Kegiatan Berada di Depan Monumen Bajra Sandhi, renon,</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">Perlengkapan yang perlu dibawa:</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">- Jurnalis : Alat Tulis dan Buku Catatan.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">- Kiat - Kiat Puisi : Alat Tulis dan Buku Catatan.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">- Fotografi : Kamera HP / Kamera Digital</p>																																																																																																								', 'https%3A%2F%2Fwww.youtube.com%2Fembed%2FqGMRnEuHPTE', 'public', 8, 'no', '2018-05-08', '2018-05-08', '9.00 am', '2.00 pm', 'online', 12, '2018-05-06 14:09:00.000000'),
(47, '																																																																																																																																																																																																																																																																																																																																																						<h1 class=\"listing-hero-title\" data-automation=\"listing-title\" style=\"margin-right: auto; margin-bottom: 0px; margin-left: auto; padding: 0px 0px 2px; font-size: 25px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: rgb(40, 44, 53); font-weight: 600; line-height: 30px; letter-spacing: 0.5px; word-break: break-word; font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgba(255,=\"\" 255,=\"\" 0.9);\"=\"\">AUSTRALIA AND NEW ZEALAND INFO SESSION uas</h1>				', '																																																																																																																																																																																																																																																																																																																																																						<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">Hi Guys,</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">SUN Education Bali akan mengadakan \"Australia &amp; New Zealand Info Session\", pada tanggal 3-4 Mei 2018.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">Acara ini khusus ditujukan untuk kalian yang memiliki rencana studi/kuliah di Australia &amp; New Zealand, dan berkonsultasi go langsung dengan Product Manager Australia &amp; New Zealand. Ada pula tips &amp; trik, dan info mengenai \"study grant\" dari universitas di 2 negara tersebut. Jangan sampai terlewatkan ya guys.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">Acara terbuka untuk umum dan FREE of charge.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: \" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">RSVP : keiza@suneducationgroup.com / 0361-222774 atau&nbsp;<br style=\"padding-top: 0px;\">Online registration: bit.ly/anzi-dps-0304mei18</p>																																																																																																																																																																																																																																																																																																																								', 'https%3A%2F%2Fwww.youtube.com%2Fembed%2FqGMRnEuHPTE', 'private', 2, 'no', '2018-05-19', '2018-05-20', '12.00 am', '11.30 pm', 'online', 12, '2018-05-06 15:31:00.000000'),
(48, '								', '								', '', 'private', 2, 'no', '0000-00-00', '0000-00-00', '12.00 am', '12.00 am', 'offline', 14, '2018-05-06 17:14:00.000000'),
(61, '<h1 class=\"listing-hero-title\" data-automation=\"listing-title\" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgba(255,=\"\" 255,=\"\" 0.9);\"=\"\" style=\"margin-right: auto; margin-bottom: 0px; margin-left: auto; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-weight: 600; line-height: 30px; color: rgb(40, 44, 53); font-size: 25px; text-align: justify; padding: 0px 0px 2px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; letter-spacing: 0.5px; word-break: break-word;\">The Music Network Hackathon Road To Campus</h1>								', '<div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><span class=\"author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">Do you have ideas about how to use blockchain to change the music industry and also kick start a global community to do just that…?</span></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><span class=\"author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">The Music Network Hackathon runs from 9am to 9pm with after party until midnight on Sunday 27th May 2018 at The Sheraton Resort Kuta Bali</span></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><br style=\"padding-top: 0px;\"></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><br style=\"padding-top: 0px;\"></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><span class=\"author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">The Music Network Blockchain hack brings together people interested in engaging with blockchain technology to change the future of the music industry, providing a fair and transparent financial reward model for all those who participate and building a sustainable Commonweath that is owned by the community for now and the future.</span></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><span class=\"author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">This hack provides consultants, students, experts, coders, designers, musicians, producers, DJs and anyone interested in blockchain opportunities and music to realise their blockchain project.</span></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><br style=\"padding-top: 0px;\"></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><span class=\"author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">Through the day there will be DJs playing, coffee, fruit, snacks and food and after the Hackathon there will be a chance to relax with a few beers and more music.</span></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><br style=\"padding-top: 0px;\"></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 600; line-height: 30px; color: rgb(40, 44, 53); font-size: 20px; padding: 0px;\"><span class=\"author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">The Goal Of The Hackathon</span></h2></div><div benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\" style=\"text-align: justify; margin: 0px; padding: 0px; color: rgb(102, 106, 115);\"><span class=\"thread-391327718949207285302410 author-d-iz88z86z86za0dz67zz78zz78zz74zz68zjz80zz71z9iz90za35z78zytz90zvz71zz77zz84zz81zz72zhuz72zpbz67zz71zz79zqbz68zyxz87zrz88z3z75z\" style=\"padding-top: 0px;\">The main purpose of this Hackathon is to develop an early prototype and beta platform that will kick start the community aspect of The Music Network. Secondary we want to raise awareness of The Music Network and encourage people to join the community and get further involved</span></div>								', 'https%3A%2F%2Fwww.youtube.com%2Fembed%2FXqMuHPGD9TQ', 'public', 8, 'yes', '2018-05-18', '2018-05-18', '9.00 am', '4.00 am', 'online', 12, '2018-05-13 13:32:00.000000'),
(62, '<h1 class=\"listing-hero-title\" data-automation=\"listing-title\" benton=\"\" sans\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" tahoma,=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgba(255,=\"\" 255,=\"\" 0.9);\"=\"\" style=\"margin-right: auto; margin-bottom: 0px; margin-left: auto; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-weight: 600; line-height: 30px; color: rgb(40, 44, 53); font-size: 25px; text-align: justify; padding: 0px 0px 2px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; letter-spacing: 0.5px; word-break: break-word;\">Experiencing Your Authentic Self: 5-Day Retreat</h1>								', '<p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-weight: bolder;\">EXPERIENCING YOUR AUTHENTIC SELF<br>6 Night / 5-Day Retreat<br>Limited to 6 Participants<br>Ubud, Bali<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-weight: bolder;\">Find out more at: www.koipondstrategy.com&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-weight: bolder;\">TIME &amp; SPACE TO FOCUS.....ON YOU!</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\">This is our foundation retreat. All roads start and end with you. This is the course that started it all for us back in 2006. It evolves and morphs each time we run it, but it always delivers on the promise to let you experience a more conscious version of you, and your potential within. You will walk away with not just clarity like you have never experience before, but also with a clear plan, next steps and more.&nbsp;<span style=\"font-size: 1rem;\">This is not a Yoga or Detox Retreat, though you will enjoy a&nbsp;</span><span style=\"font-size: 1rem;\">healthy organic menu (including meats if you like), but rather this is a&nbsp;</span><span style=\"font-size: 1rem;\">retreat focused on exploring more about yourself and the world around you to&nbsp;</span><span style=\"font-size: 1rem;\">bring about a higher level of understanding that you can apply to all aspects&nbsp;</span><span style=\"font-size: 1rem;\">of your life, from family to business. You will also learn tools and techniques&nbsp;</span><span style=\"font-size: 1rem;\">to better manage situations once you head back to the \"the real&nbsp;</span><span style=\"font-size: 1rem;\">world\" after your retreat.&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">As we limit any single programme size to 6 participants, we&nbsp;</span><span style=\"font-size: 1rem;\">ensure that you will have a personalised and individualised experience, even in&nbsp;</span><span style=\"font-size: 1rem;\">a group sessions.&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\"><span style=\"font-weight: bolder;\">WHAT ARE SOME OF THE AREAS TO BE COVERED?</span></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">• Identifying your primary, personal barrier to unleashing your fullest&nbsp;</span><span style=\"font-size: 1rem;\">potential; the glass ceiling or saboteur within&nbsp;</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">• Identifying who you really are beyond your limiting&nbsp;</span><span style=\"font-size: 1rem;\">beliefs and unwanted behaviours</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">• Exploring the option to make more conscious and responsible choices</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">• Shifting your perspective from unsustainable routines or patterns to a new,&nbsp;</span><span style=\"font-size: 1rem;\">more workable way forward</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">• Introducinga tools to bring about desirable changes; mentally, emotionally&nbsp;</span><span style=\"font-size: 1rem;\">and in your behaviours</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">• Understanding how to gain a deeper connection to your core values, passion&nbsp;</span><span style=\"font-size: 1rem;\">and purpose in life</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\"><span style=\"font-weight: bolder;\">WHAT IS THIS RETREAT REALLY LIKE?</span></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">Experiencing your authentic self is one of the most energising things you could&nbsp;</span><span style=\"font-size: 1rem;\">ever do for yourself. You will find that your mind is operating at levels and&nbsp;</span><span style=\"font-size: 1rem;\">speeds you have never experienced before. The environment itself will help&nbsp;</span><span style=\"font-size: 1rem;\">further fuel your creativity, thoughts and clarity that will get stronger with&nbsp;</span><span style=\"font-size: 1rem;\">each day you here.&nbsp;</span><span style=\"font-size: 1rem;\">The time spent over meals and in group sessions with&nbsp;</span><span style=\"font-size: 1rem;\">like-minded, well-traveled, global professionals like yourself will also&nbsp;</span><span style=\"font-size: 1rem;\">provide new perspective and confidence that you may have not felt for a very&nbsp;</span><span style=\"font-size: 1rem;\">long time. The one-on-one coaching, along with time to yourself either hanging&nbsp;</span><span style=\"font-size: 1rem;\">out on your balcony, going for a swim, or taking a walk, will all support the&nbsp;</span><span style=\"font-size: 1rem;\">learning and tools you are beginning to practice.</span></p>								', '', 'public', 2, 'yes', '2018-05-20', '2018-05-20', '9.30 am', '5.00 am', 'online', 12, '2018-05-13 13:35:00.000000'),
(63, '<h1 class=\"listing-hero-title\" data-automation=\"listing-title\" style=\"margin-right: auto; margin-bottom: 0px; margin-left: auto; padding: 0px 0px 2px; font-size: 25px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: rgb(40, 44, 53); font-weight: 600; line-height: 30px; letter-spacing: 0.5px; word-break: break-word; font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; background-color: rgba(255, 255, 255, 0.9);\">\"Digital Marketing\" Jurus efektif melakukan penjualan melalui platform digi...</h1>								', '<p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Banyaknya jumlah pengguna internet tidak lantas memberikan jaminan keberhasilan digital marketing. Ramainya brand yang mulai menggunakan digital marketing justru menjadi tantangan tersendiri untuk membuat digital marketing perusahaan dilirik pelanggan. Bagaimana strategi digital marketing bisa secara efektif mempengaruhi pelanggan di customer journey-nya menjadi kunci keberhasilan. Materi pembelajaran dibawakan dengan konsep pengajaran dua arah, sehingga setiap peserta mendapatkan kesempatan yang luas untuk mengajukan pertanyaan. Penggunaan berbagai tools praktis yang dapat dimanfaatkan dalam mengukur serta mengevaluasi kinerja Digital Marketing. Peserta akan mempelajari berbagai praktik unggulan yang telah terbukti sukses dilakukan oleh berbagai perusahaan nasional maupun internasional.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Poin-poin Pelatihan:</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">• Memahami perubahan perilaku konsumen di dunia online, berdasarkan hasil riset MarkPlus.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">• Mempelajari perencanaan dan pengembangan strategi Digital Marketing yang efektif.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">• Memahami taktik memilih digital channel yang tepat.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">• Memahami taktik membangun engagement yang efektif.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">• Mepelajari cara melakukan evaluasi terhadap pelaksanaan digital marketing.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"font-weight: 700; padding-top: 0px;\">WHO SHOULD ATTEND : Online Marketing Manager, Brand Manager, Brand Activator, Marketing Manager, Social Media Of­cer dan berbagai fungsi terkait lainnya.</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Public Education Program ini akan diselenggarakan pada:</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Hari/Tanggal :&nbsp;</span>Jumat 18 Mei 2018</p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Waktu&nbsp;</span>: 09.00 – 17.00 WITA</p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Tempat&nbsp;</span>: Hotel Berry Biz Jl. Sunset Road No.99, Kuta Bali</p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"font-weight: 700; padding-top: 0px;\">Promo 10 pendaftaran pertama Rp 1.000.000 / peserta</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Public Education Program Regular Fee per topik:</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Normal Price	: IDR 1.200.000 per peserta/topik</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">: IDR 3.000.000 per 3 peserta berasal dari 1 perusahaan/institusi yang sama/topik</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">: IDR 4.500.000 per 5 peserta,berasal dari 1 perusahaan/institusi yang sama/topik</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Biaya termasuk :</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">•	Sertifikat dari MarkPlus</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">•	Makan siang</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">•	Coffee Break 2 sesi / hari</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">•	Door Prize</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">•&nbsp;</span>Free access ke e-learning dari MarkPlus</p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">•	Materi hard copy dan soft copy</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\"></span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">Information &amp; Registration</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">P.	(0361) 8495 670</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">M.	Recca +62 857 1509 0744</span></p><p class=\"xgmail-xmsonormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 0px; color: rgb(102, 106, 115); font-family: &quot;Benton Sans&quot;, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 15px; letter-spacing: 0.5px;\"><span style=\"padding-top: 0px;\">E.	<a href=\"mailto:recca.rachmah@markplusinc.com\" target=\"_blank\" rel=\"noopener noreferrer nofollow\" style=\"color: rgb(0, 127, 140); padding-top: 0px;\"><span style=\"padding-top: 0px;\">recca.rachmah@markplusinc.com</span></a></span></p>								', '', 'public', 8, 'yes', '2018-05-17', '2018-05-24', '8.00 am', '8.00 am', 'online', 13, '2018-05-15 15:22:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `eventkategori`
--

CREATE TABLE `eventkategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori_name` varchar(100) NOT NULL,
  `kategori_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventkategori`
--

INSERT INTO `eventkategori` (`kategori_id`, `kategori_name`, `kategori_description`) VALUES
(2, 'Bazzar', 'Event that sell food or another.'),
(5, 'Sport', 'Sport event for every one love sport.'),
(6, 'Music', 'Music Event'),
(7, 'Competition', 'Competition Event like game and other'),
(8, 'Seminar or talking', 'Event of COnversation or talking about toipic.');

-- --------------------------------------------------------

--
-- Table structure for table `eventphoto`
--

CREATE TABLE `eventphoto` (
  `photo_id` int(10) NOT NULL,
  `photo_url` varchar(200) NOT NULL,
  `event_id` int(10) NOT NULL,
  `event_thubnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventphoto`
--

INSERT INTO `eventphoto` (`photo_id`, `photo_url`, `event_id`, `event_thubnail`) VALUES
(58, 'image/eventImage/47/tollwood-2017-hp-01.jpg', 47, ''),
(59, 'image/eventImage/46/new_statesman_events.jpg', 46, ''),
(75, 'image/eventImage/61/hack.jpg', 61, ''),
(76, 'image/eventImage/62/rt.jpg', 62, ''),
(77, 'image/eventImage/63/wewe.jpg', 63, '');

-- --------------------------------------------------------

--
-- Table structure for table `event_like`
--

CREATE TABLE `event_like` (
  `event_like_id` int(10) NOT NULL,
  `total_like` int(10) NOT NULL DEFAULT '0',
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_like`
--

INSERT INTO `event_like` (`event_like_id`, `total_like`, `event_id`) VALUES
(24, 2, 61),
(25, 1, 63),
(26, 1, 62);

-- --------------------------------------------------------

--
-- Table structure for table `event_location`
--

CREATE TABLE `event_location` (
  `event_location_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `admin_area` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `address_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_location`
--

INSERT INTO `event_location` (`event_location_id`, `event_id`, `latitude`, `longitude`, `admin_area`, `address`, `address_description`) VALUES
(48, 46, '-8.67038064197758', '115.23297586703472', 'Bali', 'Denpasar, Denpasar City, Bali, Indonesia', 'Lapangan Voli sebelah barat'),
(49, 47, '-8.811111958945178', '115.1283830620605', 'Bali', 'Pecatu, South Kuta, Badung Regency, Bali, Indonesia', 'samping alfamart kuta golf'),
(50, 48, '', '', 'Bali', 'Denpasar, Denpasar City, Bali, Indonesia', 'no description'),
(63, 61, '-8.798013405490284', '115.17184899413758', 'Bali', 'Kuta Selatan, South Kuta, Badung Regency, Bali, Indonesia', 'Di Auditorium widyasabha universitas udayana, Rektorat udayana'),
(64, 62, '-8.506853599999998', '115.26247779999994', 'Bali', 'Ubud, Gianyar, Bali, Indonesia', 'no description'),
(65, 63, '-8.724243772045439', '115.17608232670591', 'Bali', 'Kuta, Badung Regency, Bali, Indonesia', 'Di depan warung muslim');

-- --------------------------------------------------------

--
-- Table structure for table `event_view`
--

CREATE TABLE `event_view` (
  `event_view_id` int(10) NOT NULL,
  `total_view` int(10) NOT NULL DEFAULT '0',
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_view`
--

INSERT INTO `event_view` (`event_view_id`, `total_view`, `event_id`) VALUES
(2, 16, 62),
(3, 6, 61),
(4, 2, 47),
(5, 4, 46),
(6, 7, 63);

-- --------------------------------------------------------

--
-- Table structure for table `infriend`
--

CREATE TABLE `infriend` (
  `infriend_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infriend`
--

INSERT INTO `infriend` (`infriend_id`, `user_id`, `friend_id`) VALUES
(1, 15, 12),
(2, 15, 14),
(3, 15, 13),
(15, 12, 13),
(16, 12, 14),
(17, 14, 13),
(18, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifications_id` int(10) NOT NULL,
  `notif_type` enum('message','invitation') NOT NULL,
  `content` mediumtext NOT NULL,
  `user_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `time` datetime(6) NOT NULL,
  `read_message` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notifications_id`, `notif_type`, `content`, `user_id`, `sender_id`, `time`, `read_message`) VALUES
(4, 'invitation', '47', 14, 12, '2018-05-06 15:31:00.000000', 'yes'),
(5, 'invitation', '47', 13, 12, '2018-05-06 15:31:00.000000', 'yes'),
(6, 'invitation', '47', 15, 12, '2018-05-06 15:31:00.000000', 'yes'),
(17, 'message', '25', 13, 17, '2018-05-17 14:32:00.000000', 'yes'),
(18, 'message', '29', 15, 17, '2018-05-17 14:51:00.000000', 'no'),
(19, 'message', '30', 13, 17, '2018-05-23 20:33:00.000000', 'no'),
(20, 'message', '31', 15, 17, '2018-05-23 20:33:00.000000', 'no'),
(21, 'message', '32', 14, 17, '2018-05-23 23:22:00.000000', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `private_offline_friend`
--

CREATE TABLE `private_offline_friend` (
  `private_offline_friend_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `private_offline_friend`
--

INSERT INTO `private_offline_friend` (`private_offline_friend_id`, `event_id`, `friend_id`) VALUES
(27, 47, 14),
(28, 47, 13),
(29, 47, 15);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `ticket_title` varchar(200) NOT NULL,
  `ticket_description` varchar(1000) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `timeStart` varchar(8) NOT NULL,
  `timeEnd` varchar(8) NOT NULL,
  `ticketTotal` int(10) NOT NULL,
  `max_order` int(10) NOT NULL,
  `ticket_remaining` int(10) NOT NULL,
  `price` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `event_id`, `ticket_title`, `ticket_description`, `dateStart`, `dateEnd`, `timeStart`, `timeEnd`, `ticketTotal`, `max_order`, `ticket_remaining`, `price`, `email`, `facebook`, `phone`) VALUES
(9, 61, 'The Music Network Hackathon Road To Campus', '                Do you have ideas about how to use blockchain to change the music industry and also kick start a global community to do just that…?', '2018-05-18', '2018-05-18', '9.00 am', '4.00 am', 120, 3, 120, 0, 'komangwi87@gmail.com', 'fb.com%2Fwie', '087853947663'),
(10, 62, 'Experiencing Your Authentic Self: 5-Day Retreat', 'This is our foundation retreat. All roads start and end with you. This is the course that started it all for us back in 2006. It evolves and morphs each time we run it                ', '2018-05-20', '2018-05-20', '9.30 am', '5.00 am', 50, 1, 47, 350000, 'komangwi87@gmail.com', 'wie%2Ffb.com', '324324234324'),
(11, 63, '\"Digital Marketing\" Jurus efektif melakukan penjualan melalui platform digi...', '            Banyaknya jumlah pengguna internet tidak lantas memberikan jaminan keberhasilan digital marketing.     ', '2018-05-17', '2018-05-24', '8.00 am', '8.00 am', 100, 2, 99, 270000, 'wiratmajaya62@gmail.com', 'wie.fb.com%2Fwie', '087645234');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `ticket_id` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `number_of_items` int(10) NOT NULL,
  `payment_method` enum('empty','e_money','ots','free') NOT NULL,
  `payment_confirmation` enum('no','yes') NOT NULL,
  `user_id` int(10) NOT NULL,
  `img_confirmation` varchar(500) NOT NULL,
  `status` enum('not_complete','rejected','confirmed','wait_for_confirmation') NOT NULL,
  `transaction_time` datetime(6) NOT NULL,
  `exchange` enum('no','yes') NOT NULL,
  `bar_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `ticket_id`, `unit_price`, `total_price`, `number_of_items`, `payment_method`, `payment_confirmation`, `user_id`, `img_confirmation`, `status`, `transaction_time`, `exchange`, `bar_code`) VALUES
(29, 11, 270000, 270000, 1, 'e_money', 'yes', 15, 'payment_image/bank_transfer/29/download.jpg', 'confirmed', '2018-05-17 14:48:00.000000', 'no', 'image/bar_code/29/29.png'),
(30, 10, 350000, 350000, 1, 'e_money', 'yes', 13, 'payment_image/bank_transfer/30/download.jpg', 'confirmed', '2018-05-23 20:22:00.000000', 'no', 'image/bar_code/30/30.png'),
(31, 10, 350000, 350000, 1, 'e_money', 'yes', 15, 'payment_image/bank_transfer/31/download.jpg', 'confirmed', '2018-05-23 20:33:00.000000', 'no', 'image/bar_code/31/31.png'),
(32, 10, 350000, 350000, 1, 'ots', 'yes', 14, '', 'confirmed', '2018-05-23 23:22:00.000000', 'no', 'image/bar_code/32/32.png');

--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `update_ticket_remaining_delete` BEFORE DELETE ON `transaction` FOR EACH ROW BEGIN
update ticket set ticket.ticket_remaining = ticket.ticket_remaining + OLD.number_of_items where ticket.ticket_id = OLD.ticket_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_ticket_remaining_insert` BEFORE INSERT ON `transaction` FOR EACH ROW BEGIN
update ticket set ticket.ticket_remaining = ticket.ticket_remaining - NEW.number_of_items where ticket.ticket_id = NEW.ticket_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_ticket_remaining_update` AFTER UPDATE ON `transaction` FOR EACH ROW BEGIN
update ticket set ticket.ticket_remaining = (ticket.ticket_remaining + OLD.number_of_items) - NEW.number_of_items where ticket.ticket_id = NEW.ticket_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `birthday` date NOT NULL,
  `previlage` enum('user','super_admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `email`, `phone_number`, `gender`, `birthday`, `previlage`) VALUES
(12, 'inmap', '73782b1a6102b29fc47bf6f766bf272c', 'wiratmajaya62@gmail.com', '087853947663', 'male', '1997-02-16', 'user'),
(13, 'santa yana', '73782b1a6102b29fc47bf6f766bf272c', 'satayana06@gmail.com', '087853947634', 'Male', '2018-04-30', 'user'),
(14, 'yasa utama', '73782b1a6102b29fc47bf6f766bf272c', 'yasa@gmail.com', '3264823746832', 'male', '2018-04-23', 'user'),
(15, 'widyantary', '73782b1a6102b29fc47bf6f766bf272c', 'tary@gmail.com', '083738544645', 'female', '1996-12-09', 'user'),
(16, 'komangwie', '87965ab838fa8c24291ba98562cd6586', 'komangwi87@gmail.com', '089853947663', 'male', '2008-02-16', 'user'),
(17, 'Admin', '73782b1a6102b29fc47bf6f766bf272c', 'rh.developer01@gmail.com', '089853947663', 'female', '2018-05-09', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `userphoto`
--

CREATE TABLE `userphoto` (
  `photo_profile_id` int(10) NOT NULL,
  `original_photo` varchar(200) NOT NULL,
  `thubnail` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userphoto`
--

INSERT INTO `userphoto` (`photo_profile_id`, `original_photo`, `thubnail`, `user_id`) VALUES
(4, 'image/user/profile/12/45.PNG', '', 12),
(5, 'image/user/profile/15/IMG-20171002-WA0002.jpg', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_like`
--

CREATE TABLE `user_like` (
  `user_like_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_like`
--

INSERT INTO `user_like` (`user_like_id`, `user_id`, `event_id`) VALUES
(25, 12, 61),
(26, 15, 61),
(27, 15, 63),
(28, 13, 62);

--
-- Triggers `user_like`
--
DELIMITER $$
CREATE TRIGGER `add_like` AFTER INSERT ON `user_like` FOR EACH ROW BEGIN
update event_like set event_like.total_like = event_like.total_like + 1 where event_like.event_id = NEW.event_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_view_event`
--

CREATE TABLE `user_view_event` (
  `user_view_event_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_view_event`
--

INSERT INTO `user_view_event` (`user_view_event_id`, `user_id`, `event_id`) VALUES
(2, 12, 62),
(3, 12, 62),
(4, 12, 61),
(5, 15, 47),
(6, 13, 62),
(7, 13, 46),
(8, 15, 63),
(9, 13, 62),
(10, 15, 62),
(11, 15, 62),
(12, 15, 63),
(13, 15, 62),
(14, 15, 46),
(15, 15, 61),
(16, 13, 63),
(17, 13, 62),
(18, 13, 62),
(19, 13, 46),
(20, 13, 62),
(21, 15, 62),
(22, 13, 46),
(23, 13, 62),
(24, 13, 61),
(25, 13, 47),
(26, 13, 61),
(27, 15, 61),
(28, 15, 63),
(29, 15, 62),
(30, 15, 63),
(31, 12, 63),
(32, 12, 63),
(33, 12, 61),
(34, 13, 62),
(35, 15, 62),
(36, 14, 62);

--
-- Triggers `user_view_event`
--
DELIMITER $$
CREATE TRIGGER `add_views` AFTER INSERT ON `user_view_event` FOR EACH ROW BEGIN
update event_view set event_view.total_view = event_view.total_view + 1 where event_view.event_id = NEW.event_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`transaction_account_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`);

--
-- Indexes for table `eventkategori`
--
ALTER TABLE `eventkategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `eventphoto`
--
ALTER TABLE `eventphoto`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_like`
--
ALTER TABLE `event_like`
  ADD PRIMARY KEY (`event_like_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_location`
--
ALTER TABLE `event_location`
  ADD PRIMARY KEY (`event_location_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_view`
--
ALTER TABLE `event_view`
  ADD PRIMARY KEY (`event_view_id`);

--
-- Indexes for table `infriend`
--
ALTER TABLE `infriend`
  ADD PRIMARY KEY (`infriend_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `private_offline_friend`
--
ALTER TABLE `private_offline_friend`
  ADD PRIMARY KEY (`private_offline_friend_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userphoto`
--
ALTER TABLE `userphoto`
  ADD PRIMARY KEY (`photo_profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`user_like_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_view_event`
--
ALTER TABLE `user_view_event`
  ADD PRIMARY KEY (`user_view_event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `transaction_account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `eventkategori`
--
ALTER TABLE `eventkategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eventphoto`
--
ALTER TABLE `eventphoto`
  MODIFY `photo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `event_like`
--
ALTER TABLE `event_like`
  MODIFY `event_like_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `event_location`
--
ALTER TABLE `event_location`
  MODIFY `event_location_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `event_view`
--
ALTER TABLE `event_view`
  MODIFY `event_view_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `infriend`
--
ALTER TABLE `infriend`
  MODIFY `infriend_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifications_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `private_offline_friend`
--
ALTER TABLE `private_offline_friend`
  MODIFY `private_offline_friend_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userphoto`
--
ALTER TABLE `userphoto`
  MODIFY `photo_profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_like`
--
ALTER TABLE `user_like`
  MODIFY `user_like_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_view_event`
--
ALTER TABLE `user_view_event`
  MODIFY `user_view_event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `eventkategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventphoto`
--
ALTER TABLE `eventphoto`
  ADD CONSTRAINT `eventphoto_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_like`
--
ALTER TABLE `event_like`
  ADD CONSTRAINT `event_like_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_location`
--
ALTER TABLE `event_location`
  ADD CONSTRAINT `event_location_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private_offline_friend`
--
ALTER TABLE `private_offline_friend`
  ADD CONSTRAINT `private_offline_friend_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `private_offline_friend_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userphoto`
--
ALTER TABLE `userphoto`
  ADD CONSTRAINT `userphoto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_like`
--
ALTER TABLE `user_like`
  ADD CONSTRAINT `user_like_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_like_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
