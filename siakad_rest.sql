-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(255) NOT NULL,
  `id_tahun` int(255) NOT NULL,
  `id_siswa` int(255) NOT NULL,
  `sakit` int(255) NOT NULL,
  `izin` int(255) NOT NULL,
  `alpa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_tahun`, `id_siswa`, `sakit`, `izin`, `alpa`) VALUES
(21, 2, 14, 1, 1, 1),
(22, 2, 15, 0, 0, 0),
(23, 2, 16, 0, 0, 0),
(24, 2, 17, 0, 0, 0),
(25, 2, 18, 0, 0, 0),
(26, 2, 19, 0, 0, 0),
(27, 2, 20, 0, 0, 0),
(28, 2, 21, 0, 0, 0),
(29, 2, 22, 0, 0, 0),
(30, 2, 23, 0, 0, 0),
(31, 2, 24, 0, 0, 0),
(32, 2, 25, 0, 0, 0),
(33, 2, 26, 0, 0, 0),
(34, 2, 27, 0, 0, 0),
(35, 2, 28, 0, 0, 0),
(36, 2, 29, 0, 0, 0),
(37, 2, 30, 0, 0, 0),
(38, 2, 31, 0, 0, 0),
(39, 2, 32, 0, 0, 0),
(40, 2, 33, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` int(255) NOT NULL,
  `id_tahun` int(255) NOT NULL,
  `id_siswa` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id`, `id_tahun`, `id_siswa`, `keterangan`, `note`) VALUES
(1, 2, 14, 'Yes', '-'),
(2, 2, 15, 'Yes', '-'),
(3, 2, 16, 'Yes', '-'),
(4, 2, 17, 'Yes', '-'),
(5, 2, 18, 'Yes', '-'),
(6, 2, 19, 'Yes', '-'),
(7, 2, 20, 'Yes', '-'),
(8, 2, 21, 'Yes', '-'),
(9, 2, 22, 'Yes', '-'),
(10, 2, 23, 'Yes', '-'),
(11, 2, 24, 'Yes', '-'),
(12, 2, 25, 'Yes', '-'),
(13, 2, 26, 'Yes', '-'),
(14, 2, 27, 'Yes', '-'),
(15, 2, 28, 'Yes', '-'),
(16, 2, 29, 'Yes', '-'),
(17, 2, 30, 'Yes', '-'),
(18, 2, 31, 'Yes', '-'),
(19, 2, 32, 'Yes', '-'),
(20, 2, 33, 'No', '-');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'guru', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nikk` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `gelar_depan` varchar(255) DEFAULT NULL,
  `gelar_belakang` varchar(255) DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nip`, `nik`, `nikk`, `alamat`, `gelar_depan`, `gelar_belakang`, `pendidikan_terakhir`, `email`, `telp`) VALUES
(1, 'Brendon Wheldon', 'L', 'Przyborów', '2019-06-05', '2204659611', '8959578942', '7978932968', '20 Graceland Lane', 'Honorable', 'Mr', 'University Institute of Architecture Venice', 'bwheldon0@deviantart.com', '8716224562'),
(2, 'Moria Orrum', 'L', 'Kara Suu', '2019-03-27', '5019239394', '5739026942', '4433975859', '3658 Brickson Park Road', 'Dr', 'Rev', 'Universitas Sebelas Maret', 'morrum1@sun.com', '8568002980'),
(3, 'Crawford Belfelt', 'L', 'Azilal', '2019-04-07', '2815275733', '5345833058', '5389548368', '857 Eastwood Circle', 'Dr', 'Dr', 'Bangladesh University of Engineering and Technology', 'cbelfelt2@unicef.org', '2854559028'),
(4, 'Willa Clampton', 'L', 'Z?otoryja', '2019-11-05', '4271574815', '1734867351', '7926157178', '9835 Hansons Pass', 'Dr', 'Rev', 'International University in Geneva', 'wclampton3@sina.com.cn', '7176492922'),
(5, 'Tony Southwell', 'P', 'Nanxing', '2019-04-09', '3735019834', '5345897176', '3308504618', '019 Gale Center', 'Honorable', 'Mrs', 'University of Naples Federico II', 'tsouthwell4@java.com', '6837604158'),
(6, 'Winni Brumble', 'L', 'La Roche-sur-Yon', '2019-01-08', '6284722360', '2754353769', '7429969780', '3 Bluejay Hill', 'Honorable', 'Rev', 'Eurasian Institute of market', 'wbrumble5@quantcast.com', '8174613611'),
(7, 'Esmaria Joskowicz', 'P', 'København', '2019-08-03', '7974872738', '8421660991', '1482782379', '4963 Commercial Road', 'Mr', 'Rev', 'Bond University', 'ejoskowicz6@hexun.com', '7686445453'),
(8, 'Nelli Colliver', 'L', 'Karabash', '2019-11-27', '3628084316', '6311416058', '5146554682', '8 Rusk Place', 'Ms', 'Rev', 'Hainan Normal University', 'ncolliver7@weather.com', '4793160373'),
(9, 'Sondra Arkell', 'P', 'Chengzhai', '2019-09-27', '5057505661', '4088006215', '7107160446', '3433 Pennsylvania Point', 'Rev', 'Dr', 'Central University College', 'sarkell8@unblog.fr', '5203834813'),
(10, 'Melantha Stancer', 'P', 'Tangpu', '2019-07-02', '2751131911', '7846626329', '1897565752', '35184 Blackbird Parkway', 'Mrs', 'Ms', 'Universidade do Porto', 'mstancer9@ifeng.com', '6767016933'),
(11, 'Heall Hackforth', 'P', 'Tuanai', '2019-04-25', '8322467596', '2821722552', '8257617063', '75758 Coleman Plaza', 'Dr', 'Honorable', 'Benha University', 'hhackfortha@sbwire.com', '1129359793'),
(12, 'Cori Younie', 'P', 'Rustam jo Goth', '2019-10-10', '9702238332', '4127520059', '6033018966', '97803 Mendota Hill', 'Honorable', 'Mr', 'Universidad Católica de La Plata', 'cyounieb@chicagotribune.com', '2251942010'),
(13, 'Pooh Burden', 'P', 'Pulau Pinang', '2019-11-10', '3517295411', '9881359680', '6026284390', '1 Graceland Parkway', 'Mrs', 'Dr', 'Saint George\'s Hospital Medical School, University of London', 'pburdenc@buzzfeed.com', '5656524423'),
(14, 'Adoree Brantzen', 'L', 'Shazhuang', '2019-09-18', '1878930735', '5213030287', '3172372733', '04 Grayhawk Junction', 'Dr', 'Dr', 'University of Constanta Medical School', 'abrantzend@goodreads.com', '2556755890'),
(15, 'Flor Quodling', 'L', 'Casa Quemada', '2019-10-15', '5522062900', '4664456482', '9922797070', '95294 Sheridan Lane', 'Mr', 'Rev', 'Universidad Empresarial Mateo Kuljis', 'fquodlinge@zimbio.com', '1827061063'),
(16, 'Torey Awty', 'L', 'Kiruna', '2019-03-13', '9776562626', '7931904607', '7141948220', '006 Washington Lane', 'Mrs', 'Mr', 'Hope Africa University', 'tawtyf@bizjournals.com', '4602264645'),
(17, 'Matty Craighill', 'P', 'Birigui', '2019-04-26', '6236721207', '7304566240', '9025998751', '650 Oak Street', 'Mrs', 'Ms', 'University of San Jose Recoletos', 'mcraighillg@fema.gov', '9522247053'),
(18, 'Lynelle Krinks', 'P', 'Dededo Village', '2019-06-16', '9009048008', '2592376042', '1304073817', '3 Orin Street', 'Mrs', 'Honorable', 'Fachhochschule JOANNEUM', 'lkrinksh@patch.com', '8049973607'),
(19, 'Morgun Beedham', 'P', 'Sheshan', '2019-08-14', '9739310905', '4428894041', '9489367823', '5 Thackeray Circle', 'Ms', 'Dr', 'Université de l\'Uélé', 'mbeedhami@ycombinator.com', '5347795249'),
(20, 'Bentlee Jouannisson', 'P', 'Ponyri Vtoryye', '2019-05-09', '2965153699', '2658275949', '6918653427', '9 Morrow Road', 'Mr', 'Honorable', 'University of Anbar', 'bjouannissonj@dropbox.com', '5846007196'),
(21, 'Blanca Cardow', 'L', 'San Jose', '2019-12-22', '3718431907', '1935076173', '7108006037', '7 Vermont Junction', 'Dr', 'Ms', 'Florida Agricultural and Mechanical University', 'bcardowk@eepurl.com', '9973176835'),
(22, 'Ban Claxton', 'P', 'Glubokiy', '2019-07-02', '4128638764', '6846667125', '5263935763', '22586 Lighthouse Bay Plaza', 'Mr', 'Dr', 'Banat\'s University of Agricultural Sciences', 'bclaxtonl@elegantthemes.com', '1696966977'),
(23, 'Marje Prew', 'L', 'Futtsu', '2019-06-17', '8599994605', '8063004645', '7279780218', '21 Magdeline Trail', 'Honorable', 'Mrs', 'Park College', 'mprewm@illinois.edu', '9666353816'),
(24, 'Theodore Allum', 'P', 'Serednye', '2019-06-23', '9664677566', '5758276247', '9885898144', '569 Calypso Court', 'Dr', 'Mr', 'Ecole Nationale Supérieure de Chimie de Mulhouse', 'tallumn@adobe.com', '5304703111'),
(25, 'Liesa Blayd', 'L', 'Wan’an', '2019-06-14', '4465448888', '5325052537', '5876722828', '9 Golf Course Street', 'Dr', 'Mrs', 'Zhezkazgan Baikonurov University', 'lblaydo@unblog.fr', '9679784534'),
(26, 'Maude Millins', 'P', 'Rozkishne', '2019-01-17', '7627986409', '9123995048', '8298661548', '29217 1st Avenue', 'Rev', 'Mr', 'Trident University', 'mmillinsp@live.com', '9999955182'),
(27, 'Ulberto Wharmby', 'P', 'Taung', '2019-10-28', '7671742389', '7473660481', '6081155396', '26033 Oakridge Center', 'Mrs', 'Honorable', 'State University of New York at Albany', 'uwharmbyq@reddit.com', '5176893579'),
(28, 'Cyndia Renac', 'L', 'Prokhorovka', '2019-12-07', '9475379161', '8787561142', '2114736889', '8 Northridge Lane', 'Mrs', 'Mrs', 'Colorado Christian University', 'crenacr@forbes.com', '4601418665'),
(29, 'Bat Poznan', 'P', 'San Nicolas', '2019-04-06', '8279345067', '4108258570', '5396815181', '827 Dottie Circle', 'Rev', 'Ms', 'Uniformed Services Universty of the Health Sciences', 'bpoznans@princeton.edu', '3443553652'),
(30, 'Issi Huke', 'P', 'Lillehammer', '2019-12-30', '2307858087', '9425500217', '5489635247', '8662 Oriole Hill', 'Mr', 'Ms', 'Universidade do Algarve', 'ihuket@nyu.edu', '1446970354'),
(31, 'Shina Graveston', 'P', 'Tijucas', '2019-03-16', '1694916149', '6075126499', '6775317265', '30704 Mockingbird Center', 'Dr', 'Honorable', 'Universidade do Sagrado Coração', 'sgravestonu@cpanel.net', '3029044891'),
(32, 'Ingrid Rattenberie', 'P', 'Pita', '2019-06-27', '3851866211', '2617538536', '6994110070', '841 Pawling Pass', 'Rev', 'Mrs', 'Central South Forestry University', 'irattenberiev@cam.ac.uk', '7987665235'),
(33, 'Ramonda McKinlay', 'L', 'Basud', '2019-06-20', '4809446545', '7791042222', '8201852685', '740 Talisman Place', 'Dr', 'Honorable', 'Ecole des Hautes Etudes Commerciales du Nord', 'rmckinlayw@g.co', '1658217249'),
(34, 'Marni Johann', 'L', 'Dongxi', '2019-12-19', '9892307701', '6148294929', '8428777725', '74 Transport Hill', 'Mr', 'Dr', 'Fachhochschule Bingen', 'mjohannx@time.com', '2876308112'),
(35, 'Devlen Amesbury', 'P', 'Yangpu', '2019-12-30', '1428339500', '2673704314', '6762934341', '2684 Arizona Lane', 'Mrs', 'Dr', 'Bergische Universität Gesamthochschule Wuppertal', 'damesburyy@reuters.com', '4978511621'),
(36, 'Aileen Starkie', 'P', 'Dadong', '2019-10-03', '7492645774', '5664055543', '5408897957', '4925 Brown Point', 'Rev', 'Rev', 'University of Nebraska - Omaha', 'astarkiez@squidoo.com', '6042945272'),
(37, 'Barnabas Abbie', 'P', 'Portland', '2019-01-24', '9714507888', '9952382425', '1287919584', '62 Stone Corner Circle', 'Ms', 'Mrs', 'Zimbabwe Ezekiel Guti University', 'babbie10@ustream.tv', '4961637681'),
(38, 'Miguelita Leyband', 'L', 'Yuhe', '2019-08-31', '3857292429', '9934127180', '9035721416', '644 Declaration Center', 'Dr', 'Mrs', 'Universitas Haluoleo', 'mleyband11@wisc.edu', '1216051057'),
(39, 'Edmon Emlen', 'L', 'Bani', '2019-06-02', '6066852222', '9313068002', '1492565724', '5684 Randy Road', 'Mrs', 'Mrs', 'Centro Universitário Adventista de São Paulo', 'eemlen12@ca.gov', '8537357481'),
(40, 'Crista Scafe', 'L', 'Paccho', '2019-10-31', '6296480093', '9155134696', '8917609144', '50283 Cordelia Plaza', 'Dr', 'Mr', 'Diaconia University of Applied Sciences', 'cscafe13@yellowpages.com', '2321015013'),
(41, 'Rebekah Gethouse', 'P', 'Jagong', '2019-11-04', '8563686680', '5517366397', '7923330928', '8936 Norway Maple Parkway', 'Ms', 'Ms', 'St. Petersburg State Chemical Pharmaceutical Academy', 'rgethouse14@opensource.org', '2738257359'),
(42, 'Sherye Chittenden', 'P', 'Eystur', '2019-05-09', '7254444841', '5622806600', '8814096349', '3 Reinke Lane', 'Mrs', 'Mr', 'Ecole Nationale Supérieure d\'Ingénieurs de Génie Chimique', 'schittenden15@sina.com.cn', '1456793004'),
(43, 'Sarene Kindley', 'P', 'Kosmach', '2019-01-13', '7901964594', '3763966412', '8179296079', '60 Haas Street', 'Ms', 'Dr', 'Air University', 'skindley16@chicagotribune.com', '2051573329'),
(44, 'Meggi Kingcote', 'P', 'Keffi', '2019-12-19', '1506082179', '9839466314', '3871423035', '0 Veith Avenue', 'Dr', 'Mrs', 'Belarussian State Agricultural Academy', 'mkingcote17@xrea.com', '9847248486'),
(45, 'Malchy Archibould', 'L', 'Ariz', '2019-04-24', '7669994854', '9308694560', '2939326725', '7 Debs Street', 'Dr', 'Mrs', 'Addis Ababa Science & Technology University', 'marchibould18@yellowbook.com', '9392442966'),
(46, 'Terrel Wainscoat', 'L', 'Trashigang', '2019-02-13', '3451673798', '1488867838', '2643537518', '0050 Gale Street', 'Rev', 'Rev', 'Universitas Indonesia', 'twainscoat19@google.co.jp', '7394367531'),
(47, 'Ilyssa Whitmore', 'L', 'Postmasburg', '2019-06-11', '6605773423', '9797924718', '9206906391', '2170 Schmedeman Alley', 'Dr', 'Mrs', 'Southern Arkansas University', 'iwhitmore1a@linkedin.com', '5643977095'),
(48, 'Herbie Fowell', 'P', 'Sagara', '2019-01-06', '7466287857', '1856234056', '9129615190', '9246 Center Road', 'Honorable', 'Ms', 'Gauhati University', 'hfowell1b@sfgate.com', '4142299217'),
(49, 'Kathe Thibodeaux', 'L', 'Chencun', '2019-12-16', '8687579946', '8275795900', '4527889472', '325 Messerschmidt Alley', 'Mr', 'Mrs', 'Instituto de Artes Visuais, Design e Marketing - IADE', 'kthibodeaux1c@joomla.org', '9043409617'),
(50, 'Bernardo Marsden', 'L', 'Chiry?', '2019-05-26', '5637721107', '3802454765', '8803630123', '0 Namekagon Avenue', 'Honorable', 'Dr', 'Wayne State University', 'bmarsden1d@mozilla.com', '3087403693'),
(51, 'Sonny Garard', 'P', 'Ramenki', '2019-10-08', '1414143044', '8231726010', '7159141958', '75047 Sunfield Center', 'Honorable', 'Mr', 'Universidad Católica Tecnológica del Cibao', 'sgarard1e@feedburner.com', '5877238435'),
(52, 'Davon Gavaran', 'P', 'North Bay', '2019-08-11', '2242182424', '7827807796', '1526319516', '28 Upham Alley', 'Mrs', 'Rev', 'Ohka Gakuen University', 'dgavaran1f@technorati.com', '3918132886'),
(53, 'Kit Mournian', 'L', 'Besko', '2019-01-29', '2434330760', '8343954004', '2552042379', '43 Warrior Way', 'Rev', 'Honorable', 'Politeknik Negeri Sambas', 'kmournian1g@twitpic.com', '9026633359'),
(54, 'Terry Ebdin', 'L', 'Odolanów', '2019-05-19', '5518690370', '4457892367', '4815823675', '34 Kenwood Street', 'Mrs', 'Ms', 'Kirksville College of Osteopathic Medicine', 'tebdin1h@etsy.com', '6756365538'),
(55, 'Court Sunman', 'P', 'Wololele A', '2019-07-10', '1716520326', '2212940576', '9464510248', '9397 Prairie Rose Street', 'Rev', 'Mrs', 'Xavier University of Louisiana', 'csunman1i@skype.com', '8616792897'),
(56, 'Nerty Sherwill', 'L', 'Yangping', '2019-01-07', '3129709534', '3738361929', '9299088534', '79678 Shopko Hill', 'Mrs', 'Dr', 'Huron University USA in London', 'nsherwill1j@pcworld.com', '6375655867'),
(57, 'Grant Ambrozik', 'L', 'Luanda', '2019-04-22', '5369320259', '6973772118', '2232873454', '59906 Golf Course Road', 'Honorable', 'Honorable', 'American University Extension, Okinawa', 'gambrozik1k@globo.com', '6435136693'),
(58, 'Linc Keener', 'P', 'Ciparakan', '2019-06-25', '5184467819', '8284141592', '1868607196', '13245 Armistice Parkway', 'Rev', 'Ms', 'Gustav-Siewerth-Akademie', 'lkeener1l@meetup.com', '1741444811'),
(59, 'Inge Lathleiff', 'P', 'Tuka', '2019-06-17', '1864729559', '5267076678', '8124708655', '2 Magdeline Avenue', 'Honorable', 'Honorable', 'Universidad Latina de Costa Rica', 'ilathleiff1m@cocolog-nifty.com', '1565622757'),
(60, 'Jada Rittelmeyer', 'L', 'Zgornje Bitnje', '2019-11-06', '3564743238', '4122399809', '9799755924', '04161 Orin Crossing', 'Ms', 'Mr', 'Armenian State University of Economics', 'jrittelmeyer1n@reddit.com', '7515634874'),
(61, 'Tommi Voelker', 'P', 'Huangqiao', '2019-07-14', '9772165033', '2075819932', '6324025620', '26716 Summer Ridge Street', 'Dr', 'Mr', 'American Graduate School in Paris', 'tvoelker1o@earthlink.net', '7205746976'),
(62, 'Charles Edgington', 'P', 'Uthai Thani', '2019-11-10', '6626710110', '6999161606', '4576009801', '082 Mariners Cove Avenue', 'Rev', 'Ms', 'Universidad Autónoma del Estado de México', 'cedgington1p@google.es', '2196335985'),
(63, 'Duky Kopelman', 'L', 'Th? Tr?n Trùng Khánh', '2019-12-09', '7241997494', '3357610970', '6415197336', '514 Burning Wood Avenue', 'Rev', 'Ms', 'Mzuzu University', 'dkopelman1q@usda.gov', '2051116118'),
(64, 'Melinde Prin', 'P', 'Saint Louis', '2019-10-30', '3145384541', '6633124715', '2041913985', '14 Randy Junction', 'Ms', 'Mrs', 'Universitas 17 Agustus 1945 Jakarta', 'mprin1r@flickr.com', '1135179797'),
(65, 'Shoshanna Nicholes', 'L', 'Tsaghkaber', '2019-12-24', '2634072633', '1853058586', '7927931292', '81 Bunker Hill Circle', 'Rev', 'Mr', 'Instituto Tecnológico de Aeronáutica', 'snicholes1s@omniture.com', '1022844870'),
(66, 'Stanwood Ballentime', 'P', 'Bay??n', '2019-09-30', '4936776048', '3498994462', '1703678803', '951 Rieder Park', 'Mrs', 'Honorable', 'Texas A&M International University', 'sballentime1t@dion.ne.jp', '1752947065'),
(67, 'Basilius Swaddle', 'L', 'Gamboula', '2019-07-12', '4773976707', '3316355618', '5715398973', '9815 Messerschmidt Street', 'Mr', 'Rev', 'Universidad de San Buenaventura Medellin', 'bswaddle1u@barnesandnoble.com', '9662781377'),
(68, 'Elihu Beetles', 'P', 'Baizhang', '2019-11-07', '9407272542', '3233378576', '7251583051', '19 Oneill Road', 'Honorable', 'Mrs', 'Bluefield State College', 'ebeetles1v@biglobe.ne.jp', '5662300750'),
(69, 'Erie Bungey', 'L', 'Choszczno', '2019-11-12', '4225131388', '7226699100', '4766031391', '9 Randy Plaza', 'Rev', 'Rev', 'Gujarat Technological University Ahmedabad', 'ebungey1w@reddit.com', '5237293497'),
(70, 'Pietro Outright', 'L', 'Kalimati', '2019-09-17', '3644664845', '4475424070', '3263289004', '49743 Mandrake Place', 'Dr', 'Dr', 'Jishou University', 'poutright1x@fotki.com', '2907034972'),
(71, 'Rea De Luna', 'P', 'Yamen', '2019-11-16', '3565323065', '1133478090', '3974162073', '3 East Lane', 'Honorable', 'Dr', 'Universitas Negeri Makassar', 'rde1y@smh.com.au', '3981615388'),
(72, 'Verena McCard', 'P', 'Mirsíni', '2019-05-08', '6699826407', '1107705933', '3078580832', '04568 Coleman Court', 'Rev', 'Dr', 'Music Academy \"Felix Nowowiejski\" in Bydgoszcz', 'vmccard1z@hud.gov', '5942218047'),
(73, 'Tomi Matthis', 'P', 'K?nan', '2019-04-09', '8544094117', '8783047191', '6872493804', '0282 Holy Cross Junction', 'Dr', 'Honorable', 'North Ossetian State University', 'tmatthis20@slashdot.org', '9001163408'),
(74, 'Ailbert Ramsell', 'L', 'K?leke Mandi', '2019-12-03', '8865856176', '7547001153', '7595303238', '9 Melrose Street', 'Dr', 'Honorable', 'Ferghana Politechnical Institute', 'aramsell21@mlb.com', '5432767773'),
(75, 'Abra Chartman', 'P', 'Kuhmo', '2019-05-04', '9238981351', '3312615340', '3734025624', '55392 Sullivan Way', 'Mr', 'Rev', 'Universitas Kristen Krida Wacana', 'achartman22@guardian.co.uk', '8385959502'),
(76, 'Lissi Chewter', 'L', 'Labrador City', '2019-09-07', '9051199405', '5703593622', '1453714847', '61908 Fulton Lane', 'Rev', 'Rev', 'Tabriz College of Technology', 'lchewter23@sciencedirect.com', '1858915175'),
(77, 'Justine Spellissy', 'P', 'Jiuxian', '2019-09-17', '7406204872', '1886042635', '9743512343', '0 Killdeer Drive', 'Ms', 'Mr', 'Deutsche Sporthochschule Köln', 'jspellissy24@uol.com.br', '8422087660'),
(78, 'Ario Dumbrill', 'L', 'Gradizhsk', '2019-03-10', '1208992825', '3332980955', '7033501614', '63 Susan Court', 'Mrs', 'Mrs', 'Western Illinois University', 'adumbrill25@statcounter.com', '7621298432'),
(79, 'Jennine Keuning', 'P', 'Lipnik', '2019-12-21', '1179981468', '9778630805', '9744524117', '02 Walton Crossing', 'Dr', 'Mr', 'School of Planning and Architecture', 'jkeuning26@last.fm', '5754980959'),
(80, 'Jedd Margerison', 'L', 'Luleå', '2019-12-02', '6042880993', '4459848102', '3675346994', '86875 Meadow Ridge Park', 'Honorable', 'Mrs', 'COMSATS Institute of Information Technology, Abbottabad', 'jmargerison27@amazon.co.uk', '2233554167'),
(81, 'Budd Cluse', 'L', 'Drammen', '2019-12-30', '9132387064', '9045819324', '6976300157', '74 Hoepker Street', 'Mrs', 'Mr', 'Jilin University of Technology', 'bcluse28@prlog.org', '4608812477'),
(82, 'Tabb Callar', 'L', 'Reutlingen', '2019-07-05', '7002599219', '7884636595', '1359843794', '4448 Coolidge Street', 'Honorable', 'Rev', 'Adventist University of the Philippines', 'tcallar29@amazon.co.jp', '8791591743'),
(83, 'Myrna Brotherhead', 'P', 'Anniston', '2019-03-09', '2561348914', '5763252286', '1579793449', '70 Barby Pass', 'Mr', 'Mrs', 'Instituto Universitario CEMA', 'mbrotherhead2a@ox.ac.uk', '8473310925'),
(84, 'Lethia McKeowon', 'P', 'Vagonoremont', '2019-10-20', '6296764325', '8128558413', '6547081493', '33 Oxford Park', 'Mrs', 'Honorable', 'Universidade Bandeirante de São Paulo', 'lmckeowon2b@usnews.com', '3009737744'),
(85, 'Lewie Cringle', 'P', 'Brak', '2019-06-30', '8319040924', '9228026208', '8228564833', '86 6th Parkway', 'Rev', 'Rev', 'Silla University', 'lcringle2c@51.la', '2431253300'),
(86, 'Sara-ann McDuall', 'L', 'Nyinqug', '2019-03-03', '7892579784', '2084586410', '3412169083', '6763 Sutteridge Lane', 'Ms', 'Honorable', 'Clarkson University', 'smcduall2d@jimdo.com', '3524687082'),
(87, 'Stella Stott', 'P', 'San Vicente', '2019-12-14', '4496161213', '5713727632', '6387057256', '83 Green Lane', 'Ms', 'Ms', 'Universität Lüneburg', 'sstott2e@scientificamerican.com', '9369889054'),
(88, 'Auberta Sellers', 'L', 'Novo-Peredelkino', '2019-03-31', '3517436992', '3858859844', '3515145143', '988 Schlimgen Street', 'Mr', 'Honorable', 'East Ukrainian National University', 'asellers2f@salon.com', '1057807910'),
(89, 'Chiarra Mabley', 'L', 'Natarleba', '2019-04-06', '1431992266', '3964346258', '7289425455', '4 Holmberg Center', 'Rev', 'Dr', 'The Superior College ', 'cmabley2g@indiatimes.com', '4118991553'),
(90, 'Allyn Burstowe', 'P', 'Baidian', '2019-10-27', '9509999899', '5011153004', '6591420511', '1210 Oxford Place', 'Rev', 'Honorable', 'Chongqing Three Gorges University', 'aburstowe2h@weather.com', '2711568883'),
(91, 'Vinny Openshaw', 'P', 'Petite Anse', '2019-05-26', '7464064201', '7346976577', '7185343139', '33634 Merrick Center', 'Honorable', 'Mr', 'Nagoya Economics University', 'vopenshaw2i@paginegialle.it', '9921919573'),
(92, 'Adrianne Van Waadenburg', 'P', 'Hunkuyi', '2020-01-02', '4935905309', '4711907965', '7283844611', '9137 Raven Junction', 'Dr', 'Ms', 'Arab American University - Jenin', 'avan2j@technorati.com', '3769254926'),
(93, 'Shannah Sadler', 'L', 'Yingtou', '2019-06-29', '2853753670', '5511444571', '8495517327', '4690 Sunbrook Trail', 'Rev', 'Honorable', 'Towson University', 'ssadler2k@google.pl', '7936608177'),
(94, 'Fina Brolan', 'L', 'Yingshouyingzi', '2019-01-05', '9324580403', '8232433744', '9122856917', '54 Moland Crossing', 'Rev', 'Mr', 'Hyupsung University', 'fbrolan2l@live.com', '3081998619'),
(95, 'Mead Rizzolo', 'P', 'Darnah', '2019-03-01', '1011004642', '8705835772', '7837655543', '62 Morning Street', 'Rev', 'Dr', 'Omsk State Transport University', 'mrizzolo2m@dion.ne.jp', '9291563558'),
(96, 'Olag O\'Carran', 'P', 'Ugep', '2019-06-03', '7845554527', '3674008161', '1769045271', '088 Loeprich Alley', 'Mrs', 'Dr', 'Universidad Autónoma Metropolitana - Xochimilco', 'oocarran2n@ifeng.com', '9345082483'),
(97, 'Jaquenette Simondson', 'L', 'Formiga', '2019-08-22', '9926399376', '4306591234', '5878460503', '386 Troy Street', 'Rev', 'Ms', 'George Wythe College', 'jsimondson2o@w3.org', '9889953248'),
(98, 'Galen Oxlee', 'P', 'Baiyang', '2019-07-22', '2749541060', '9399406033', '3092336411', '0420 Dapin Road', 'Ms', 'Mr', 'Chosun University', 'goxlee2p@google.fr', '3439750838'),
(99, 'Seumas Rousell', 'P', 'Peroguarda', '2019-03-19', '9405671174', '3395497290', '2508763484', '3 Sherman Court', 'Ms', 'Mr', 'Gwynedd-Mercy College', 'srousell2q@paypal.com', '8691299891'),
(100, 'Gabi Mulryan', 'P', 'Niort', '2019-07-21', '1886084382', '8159779385', '9973371809', '0949 Pearson Road', 'Ms', 'Mrs', 'Zia-ud-Din Medical University', 'gmulryan2r@reference.com', '1345159856'),
(101, 'Rosy Whitters', 'P', 'Barra de São Francisco', '2019-11-18', '6597262724', '4648499365', '9874581616', '786 Bunting Court', 'Mr', 'Mrs', 'Jamestown College', 'rwhitters2s@google.es', '4179510964'),
(102, 'Alisander Langthorne', 'P', 'Piteå', '2019-03-16', '2349806243', '5479201609', '2965802804', '21425 Eagan Lane', 'Rev', 'Mrs', 'Lebanese American University', 'alangthorne2t@symantec.com', '2372917577'),
(103, 'Mallory Cromb', 'L', 'La Unión', '2019-09-02', '7844039741', '4706134934', '3899019522', '37 Dryden Avenue', 'Rev', 'Honorable', 'British Columbia Open University', 'mcromb2u@google.pl', '4287088230'),
(104, 'Mervin Veldens', 'L', 'Jeseník', '2019-11-24', '8612051981', '7531326928', '7097656666', '617 Magdeline Crossing', 'Mr', 'Dr', 'Sotheby´s Institute of Art - London', 'mveldens2v@blog.com', '6609821787'),
(105, 'Anthea Weedall', 'L', 'L\'viv', '2019-01-05', '9767408289', '1351876589', '6637692028', '0 Kedzie Pass', 'Rev', 'Dr', 'Ekiti State University', 'aweedall2w@abc.net.au', '7366584899'),
(106, 'Clarance Rosenkrantz', 'P', 'V? Quang', '2019-03-15', '5302707453', '1276248599', '2153440682', '0321 Goodland Alley', 'Ms', 'Mrs', 'Military academy of Lithuania', 'crosenkrantz2x@ucla.edu', '9095999246'),
(107, 'Clywd Kirkhouse', 'P', 'Xinfeng', '2019-05-20', '3754914496', '1192157212', '5624105730', '53 Grim Avenue', 'Rev', 'Dr', 'Zetech College', 'ckirkhouse2y@weather.com', '4277490617'),
(108, 'Amandi Younie', 'L', 'Kalapanunggal', '2019-11-19', '5754596250', '4723861414', '7631753394', '424 Fairfield Trail', 'Rev', 'Rev', 'Arkansas State University', 'ayounie2z@amazon.co.uk', '5442025682'),
(109, 'Camellia Mineghelli', 'P', 'Cardona', '2019-12-01', '5768369933', '8892269187', '7466000139', '10821 Mosinee Crossing', 'Honorable', 'Rev', 'Leading University', 'cmineghelli30@umn.edu', '5279986025'),
(110, 'Candie Sircomb', 'P', 'Åmål', '2019-10-13', '9624746493', '9421932391', '5412524286', '25 Mesta Alley', 'Mrs', 'Ms', 'Sambalpur University', 'csircomb31@patch.com', '8357586205'),
(111, 'Judd Brydell', 'L', 'Kowale Oleckie', '2019-05-02', '7128470532', '6584707671', '3986254636', '46 Kenwood Parkway', 'Honorable', 'Ms', 'MGH Institute of Health Professions', 'jbrydell32@youtube.com', '9584118621'),
(112, 'Jeanie Joerning', 'P', 'Adelaide', '2019-04-04', '9402976168', '8304697894', '2624758837', '1380 Red Cloud Pass', 'Mr', 'Honorable', 'Novosibirsk State Music Academy M. Glinka', 'jjoerning33@bloomberg.com', '4957525558'),
(113, 'Nolan Cantera', 'P', 'Trambalan', '2019-02-07', '9331890758', '2804463973', '3952103958', '96 Buell Lane', 'Mr', 'Ms', 'Obirin University', 'ncantera34@abc.net.au', '8752907513'),
(114, 'Sigmund Tumelty', 'P', 'Takari', '2019-02-10', '4014222691', '5546746357', '4436051065', '1 Spenser Place', 'Mrs', 'Ms', 'Christelijke Hogeschool Windesheim', 'stumelty35@ameblo.jp', '1277507644'),
(115, 'Shane Kilbourn', 'P', 'Huangtan', '2019-02-03', '2756283181', '5243161641', '7746273387', '1 Golf View Circle', 'Mrs', 'Honorable', 'Bethel College McKenzie', 'skilbourn36@hao123.com', '5549259234'),
(116, 'Aleta Reichhardt', 'L', 'San Rafael', '2019-04-22', '4155801146', '8025653614', '9242561239', '97 Fairview Road', 'Mr', 'Ms', 'Centenary College', 'areichhardt37@moonfruit.com', '3273775022'),
(117, 'Christal Heardman', 'P', 'Bukonyo', '2019-09-26', '7987862518', '4819531460', '2039540684', '639 Lakewood Street', 'Honorable', 'Dr', 'Instituto Tecnológico de San Luis Potosí', 'cheardman38@weebly.com', '9163231157'),
(118, 'Stanton Hamer', 'P', 'Volochys’k', '2019-09-13', '2185465261', '7575617245', '2063615831', '08440 Elmside Plaza', 'Dr', 'Rev', 'University of Winnipeg', 'shamer39@taobao.com', '6228137611'),
(119, 'Sherwood Readwood', 'L', 'Ji’ergele Teguoleng', '2019-02-01', '7579608515', '2368432303', '2061235218', '43720 Merchant Junction', 'Ms', 'Ms', 'Ecole Nationale Supérieure des Arts et Industries Textiles', 'sreadwood3a@instagram.com', '3463114769'),
(120, 'Jordanna Cawthera', 'L', 'Kromasan', '2019-08-05', '2422989866', '7155547140', '4158288260', '0 Nelson Trail', 'Dr', 'Ms', 'Universitas Pancasakti Tegal', 'jcawthera3b@wikia.com', '5403183794'),
(121, 'Leif Robley', 'L', 'Voronezh', '2019-09-11', '1502542212', '6914901168', '7806182249', '2320 Paget Trail', 'Rev', 'Ms', 'Universidad Casa Grande', 'lrobley3c@w3.org', '4017649366'),
(122, 'Davita Creaven', 'P', 'Trzci?sko Zdrój', '2019-01-17', '7429857010', '1929974046', '2455680886', '59112 Everett Way', 'Mrs', 'Mr', 'National Dong Hwa University', 'dcreaven3d@furl.net', '4466686967'),
(123, 'Annaliese Mascall', 'P', 'Changfeng', '2019-09-06', '4711163748', '9391613839', '5223422738', '204 Jenna Terrace', 'Dr', 'Rev', 'Hartford Graduate Center (Rensselaer at Hartford)', 'amascall3e@wikimedia.org', '3575572700'),
(124, 'Gayla Voelker', 'P', 'Vännäs', '2019-06-06', '4102627419', '5516537110', '2595344484', '15 West Hill', 'Honorable', 'Mr', 'University of South Carolina - Aiken', 'gvoelker3f@angelfire.com', '3921065256'),
(125, 'Tonie Westnage', 'L', 'Las Trojes', '2019-12-07', '6474898496', '9488179529', '6698136737', '31 Hoard Parkway', 'Dr', 'Mrs', 'University of Modena', 'twestnage3g@studiopress.com', '3716939433'),
(126, 'Chet Burthom', 'L', 'Guisguis', '2019-10-02', '7682511620', '8416164693', '7064187876', '77 Karstens Alley', 'Dr', 'Rev', 'Memphis College of Art', 'cburthom3h@reference.com', '6991851628'),
(127, 'Karlens Corre', 'P', 'Qorashina', '2019-08-02', '7117164605', '8371281011', '6925835058', '94 Riverside Hill', 'Ms', 'Dr', 'Karel De Grote Hogeschool', 'kcorre3i@mapy.cz', '3704576469'),
(128, 'Laurens Astie', 'L', 'Sa‘sa‘', '2019-09-20', '1898923663', '1974165091', '5624569421', '150 Corry Way', 'Mr', 'Rev', 'Musashi University', 'lastie3j@creativecommons.org', '7275104620'),
(129, 'Rasia Archdeckne', 'P', 'Al ?umayd?t', '2019-01-13', '2967884183', '2034051975', '5248833735', '5 Brown Alley', 'Dr', 'Honorable', 'Grace University', 'rarchdeckne3k@noaa.gov', '7779915053'),
(130, 'Ettie Worsfold', 'L', 'Dongzhang', '2019-06-03', '7344824230', '5521144762', '6836207557', '50 John Wall Point', 'Dr', 'Rev', 'American International College', 'eworsfold3l@alexa.com', '7499171463'),
(131, 'Boigie Wilcott', 'P', 'Ladozhskaya', '2019-02-21', '8515885984', '5901262716', '7028832145', '3418 Sunnyside Street', 'Rev', 'Honorable', 'School of Pharmacy, University of London', 'bwilcott3m@nydailynews.com', '7972374602'),
(132, 'Maurizio Lukash', 'L', 'Pô', '2019-11-12', '9441527105', '3097825837', '1894539906', '0 Florence Court', 'Honorable', 'Honorable', 'Universidad Metropolitana Castro Carazo', 'mlukash3n@sciencedirect.com', '6222572479'),
(133, 'Harvey Metterick', 'P', 'Manzanares', '2019-07-22', '3657698336', '6113619941', '2684658757', '818 Ridgeview Lane', 'Rev', 'Mrs', 'Technical University of Gabrovo', 'hmetterick3o@xrea.com', '7903324814'),
(134, 'Onida Halton', 'P', 'Néa Róda', '2019-05-22', '1003868054', '4554520400', '8634126261', '2 Straubel Park', 'Honorable', 'Mr', 'Texas A&M University - Corpus Christi', 'ohalton3p@fda.gov', '5064425024'),
(135, 'Cordelia Ossenna', 'P', 'Nanshao', '2019-04-05', '6426903416', '5667707444', '7218756787', '1 Alpine Park', 'Ms', 'Honorable', 'Universidad de Ciencias y Humanidades', 'cossenna3q@statcounter.com', '2039972262'),
(136, 'Tammi Widdup', 'L', 'Dezhou', '2019-01-25', '2056550078', '3403287407', '1442904509', '78936 Sugar Place', 'Dr', 'Mr', 'Universidad Privada San Juan Bautista', 'twiddup3r@harvard.edu', '2434171934'),
(137, 'Darnall Febvre', 'L', 'Vasyl\'evsky Ostrov', '2019-07-23', '5188826662', '3003215485', '3483634747', '17243 Northfield Plaza', 'Dr', 'Ms', 'Universidad de Los Andes', 'dfebvre3s@aol.com', '8147441768'),
(138, 'Bourke Barden', 'L', 'Xindian', '2019-12-24', '5387711538', '4706340540', '4051341718', '39720 Homewood Drive', 'Ms', 'Ms', 'Hochschule Coburg', 'bbarden3t@usgs.gov', '6408108907'),
(139, 'Armin Downgate', 'P', '?arów', '2019-06-08', '6149485482', '1715370353', '8801822998', '6 Sloan Terrace', 'Mrs', 'Mrs', 'University of the Punjab, Gujranwala Campus', 'adowngate3u@mediafire.com', '1807641117'),
(140, 'Ferdie Dobrowolski', 'L', 'Cimanggu Girang', '2019-07-17', '3886362786', '5393429943', '5486176468', '648 Hoffman Hill', 'Honorable', 'Mrs', 'City University of New York, School of Law at Queens College', 'fdobrowolski3v@marketwatch.com', '1917967714'),
(141, 'Emalia Lorent', 'P', 'Roza', '2019-12-31', '5725316125', '2045407941', '8177065166', '41 Westridge Court', 'Mrs', 'Honorable', 'Southwestern College Santa Fe', 'elorent3w@123-reg.co.uk', '4962088147'),
(142, 'Adelaide Babcock', 'P', 'Noeltoko', '2019-02-22', '2249567966', '5589168969', '9663808981', '91975 Carioca Street', 'Honorable', 'Ms', 'Universidad de Las Palmas de Gran Canaria', 'ababcock3x@hc360.com', '3079067532'),
(143, 'Panchito Jinkins', 'L', 'Nofoali‘i', '2019-11-06', '7255335192', '6409001121', '8037827956', '13367 Almo Place', 'Mr', 'Dr', 'Altai State Technical University', 'pjinkins3y@webs.com', '6227519089'),
(144, 'Janos Raistrick', 'L', 'Pubal', '2019-06-21', '6823013479', '7569037656', '8547981066', '27654 Messerschmidt Trail', 'Mrs', 'Mr', 'Nagoya University', 'jraistrick3z@opera.com', '4951214441'),
(145, 'Sheffy Robertazzi', 'L', 'Prelog', '2019-11-12', '2166565173', '3247583955', '6714908460', '53875 Gulseth Place', 'Mr', 'Mrs', 'Institute of Space Technology', 'srobertazzi40@china.com.cn', '6367836940'),
(146, 'Robin Salaman', 'P', 'Columbus', '2019-10-08', '6146226752', '2785142565', '6765273223', '6 Welch Parkway', 'Rev', 'Dr', 'Buddhasravaka Bhikshu University', 'rsalaman41@dyndns.org', '5424453401'),
(147, 'Katrina Neles', 'L', 'Fálanna', '2019-11-11', '2176558674', '2007297686', '7337330308', '93 John Wall Alley', 'Mr', 'Dr', 'Florida Community College at Jacksonville', 'kneles42@nih.gov', '1347294381'),
(148, 'Keefer Dickens', 'L', 'Stuttgart', '2019-05-08', '4284970038', '2534994855', '2338746351', '11 Vermont Street', 'Ms', 'Honorable', 'International University of Health and Welfare', 'kdickens43@bloomberg.com', '1931884869'),
(149, 'Leslie Bambridge', 'L', 'Makumbako', '2019-02-14', '5989625118', '3836360462', '5743952150', '73 Vermont Road', 'Rev', 'Dr', 'Myanmar Aerospace Engineering University', 'lbambridge44@imdb.com', '1747012040'),
(150, 'Mayer Swait', 'P', 'Liancheng', '2019-08-27', '3583345450', '9606512836', '4172101146', '85655 Dakota Court', 'Ms', 'Ms', 'Shandong University', 'mswait45@free.fr', '4585299814'),
(151, 'Cori Siddle', 'L', 'Magdaleno Aguilar', '2019-01-13', '7259169921', '3812669509', '2214685664', '15780 Corben Place', 'Mrs', 'Honorable', 'Swiss Business School Zurich (SBS)', 'csiddle46@prweb.com', '3178995993'),
(152, 'Eldridge Jarville', 'P', 'Lengor', '2019-01-08', '9898341895', '2628467277', '9441039795', '04 Buena Vista Way', 'Mr', 'Honorable', 'Hilbert College', 'ejarville47@mayoclinic.com', '3532512660'),
(153, 'Oliver Baitman', 'P', 'Enschede', '2019-06-24', '4323759286', '6081564566', '6074935543', '43 Portage Alley', 'Mrs', 'Mrs', 'School of Business and Finance', 'obaitman48@forbes.com', '9772325467'),
(154, 'Allister Sieur', 'L', 'M?t Ngàn', '2019-08-09', '3705370953', '1155137927', '3864370631', '4072 Mallory Center', 'Honorable', 'Mrs', 'National Hualien Teachers College', 'asieur49@theglobeandmail.com', '7749513501'),
(155, 'haloo', 'L', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `kode_kelas`, `tingkat`) VALUES
(2, '11 mipa', '11mipa', '11'),
(3, '10 mipa', '10mipa', '10'),
(4, '10 ips', '10ips', '10'),
(5, '11 ips', '11ips', '11');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_dasar`
--

CREATE TABLE `kompetensi_dasar` (
  `id` int(255) NOT NULL,
  `id_tahun` int(255) NOT NULL,
  `id_mapel` int(255) NOT NULL,
  `tingkat` int(255) NOT NULL COMMENT 'kelas tingkat',
  `id_guru` int(255) NOT NULL,
  `kd` varchar(255) NOT NULL COMMENT 'kompetensi dasar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompetensi_dasar`
--

INSERT INTO `kompetensi_dasar` (`id`, `id_tahun`, `id_mapel`, `tingkat`, `id_guru`, `kd`) VALUES
(11, 2, 2, 10, 75, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(14, 2, 2, 10, 75, 'KD 2'),
(15, 2, 2, 11, 75, 'asdasdad'),
(16, 2, 1, 10, 75, 'asdaasdfds');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `kelompok` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama`, `kode`, `kelompok`) VALUES
(1, 'matematika', 'mtk', 'A'),
(2, 'bahasa indonesia', 'bin', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sikap`
--

CREATE TABLE `nilai_sikap` (
  `id` int(255) NOT NULL,
  `id_tahun` int(255) NOT NULL,
  `id_guru` int(255) NOT NULL,
  `id_siswa` int(255) NOT NULL,
  `nilai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_sikap`
--

INSERT INTO `nilai_sikap` (`id`, `id_tahun`, `id_guru`, `id_siswa`, `nilai`) VALUES
(6, 2, 75, 9, 4),
(7, 2, 75, 2, 4),
(8, 2, 75, 4, 4),
(11, 2, 75, 14, 4),
(12, 2, 75, 15, 4),
(13, 2, 75, 16, 4),
(14, 2, 75, 17, 4),
(15, 2, 75, 18, 4),
(16, 2, 75, 19, 4),
(17, 2, 75, 20, 4),
(18, 2, 75, 21, 4),
(19, 2, 75, 22, 4),
(20, 2, 75, 23, 4),
(21, 2, 75, 24, 4),
(22, 2, 75, 25, 4),
(23, 2, 75, 26, 4),
(24, 2, 75, 27, 4),
(25, 2, 75, 28, 4),
(26, 2, 75, 29, 4),
(27, 2, 75, 30, 4),
(28, 2, 75, 31, 4),
(29, 2, 75, 32, 4),
(30, 2, 75, 33, 0),
(31, 2, 75, 3, 4),
(32, 2, 75, 5, 3),
(33, 2, 75, 6, 3),
(34, 2, 75, 10, 2),
(35, 2, 75, 11, 1),
(36, 2, 75, 34, 3),
(37, 2, 75, 35, 2),
(38, 2, 75, 36, 1),
(39, 2, 75, 37, 3),
(40, 2, 75, 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(255) NOT NULL,
  `id_guru` int(255) NOT NULL,
  `id_mapel` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_tahun` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `id_guru`, `id_mapel`, `id_kelas`, `id_tahun`) VALUES
(17, 154, 1, 3, 2),
(18, 75, 2, 5, 2),
(19, 75, 2, 3, 2),
(20, 75, 2, 2, 2),
(22, 75, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(255) NOT NULL,
  `namaSekolah` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `bentukSekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desaKelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupatenKota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `rw` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `kodePos` varchar(255) DEFAULT NULL,
  `lintang` varchar(255) DEFAULT NULL,
  `bujur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id` int(100) NOT NULL,
  `id_tahun` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_siswa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id`, `id_tahun`, `id_kelas`, `id_siswa`) VALUES
(39, 2, 4, 1),
(40, 2, 4, 8),
(41, 2, 4, 7),
(42, 2, 4, 12),
(43, 2, 4, 13),
(44, 1, 3, 1),
(45, 1, 3, 2),
(61, 2, 5, 14),
(62, 2, 5, 15),
(63, 2, 5, 16),
(64, 2, 5, 17),
(65, 2, 5, 18),
(66, 2, 5, 19),
(67, 2, 5, 20),
(68, 2, 5, 21),
(69, 2, 5, 22),
(70, 2, 5, 23),
(71, 2, 5, 24),
(72, 2, 5, 25),
(73, 2, 5, 26),
(74, 2, 5, 27),
(75, 2, 5, 28),
(76, 2, 5, 29),
(77, 2, 5, 30),
(78, 2, 5, 31),
(79, 2, 5, 32),
(80, 2, 5, 33),
(81, 2, 3, 3),
(82, 2, 3, 5),
(83, 2, 3, 6),
(84, 2, 3, 10),
(85, 2, 3, 11),
(86, 2, 3, 34),
(87, 2, 3, 35),
(88, 2, 3, 36),
(89, 2, 3, 37),
(90, 2, 3, 38),
(91, 1, 4, 3),
(92, 1, 4, 9),
(93, 1, 4, 38),
(94, 2, 2, 9),
(95, 2, 2, 2),
(96, 2, 2, 4),
(97, 2, 2, 39),
(98, 2, 2, 40);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nikk` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota_kab` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `penghasilan_ayah` varchar(255) DEFAULT NULL,
  `ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `penghasilan_ibu` varchar(255) DEFAULT NULL,
  `wali` varchar(255) DEFAULT NULL,
  `pekerjaan_wali` varchar(255) DEFAULT NULL,
  `penghasilan_wali` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `telp_siswa` varchar(255) DEFAULT NULL,
  `telp_ayah` varchar(255) DEFAULT NULL,
  `telp_ibu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_lengkap`, `nama_panggilan`, `nis`, `nisn`, `nik`, `nikk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelurahan`, `kecamatan`, `kota_kab`, `provinsi`, `kode_pos`, `agama`, `ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `wali`, `pekerjaan_wali`, `penghasilan_wali`, `foto`, `tanggal_masuk`, `aktif`, `telp_siswa`, `telp_ayah`, `telp_ibu`) VALUES
(1, 'Lucais Paterson', 'Donalt', '392-03-9959', '853-44-7951', '497-51-0767', '487-72-9415', 'L', 'Brooklyn', '2019-09-02', '75456 Vahlen Crossing', 'Park', 'Street', 'Arlington', 'New York', '11231', 'Budha', 'Lucais Bucky', 'Database Administrator II', '$6.37', 'Lucais', 'Senior Cost Accountant', '$4.17', 'Lucais Knottley', 'Occupational Therapist', '$3.68', NULL, '2019-10-21', 1, '9175442197', '5712495589', '2679630600'),
(2, 'Slade Martinyuk', 'Rossie', '668-44-0654', '235-01-9250', '458-30-7182', '523-74-4955', 'L', 'Lynchburg', '2018-12-20', '38 Hudson Point', 'Crossing', 'Hill', 'Carol Stream', 'Virginia', '24515', 'Katholik', 'Slade Brogi', 'Legal Assistant', '$3.49', 'Slade', 'Analyst Programmer', '$5.05', 'Slade Besemer', 'Dental Hygienist', '$3.30', NULL, '2019-05-19', 1, '4349708664', '3093815515', '3041875559'),
(3, 'Renaud Inchcomb', 'Orlan', '605-01-5441', '650-05-7670', '803-45-8986', '489-93-8619', 'P', 'Phoenix', '2019-04-26', '377 7th Road', 'Road', 'Lane', 'Pasadena', 'Arizona', '85020', 'Konghuchu', 'Renaud Ansett', 'Civil Engineer', '$7.32', 'Renaud', 'Legal Assistant', '$7.10', 'Renaud Trevain', 'Librarian', '$7.61', NULL, '2019-01-01', 1, '6023783634', '3233323189', '7015742400'),
(4, 'Tore Walkden', 'Efrem', '495-73-3501', '145-10-4030', '647-86-9487', '618-37-1053', 'P', 'Lubbock', '2019-02-20', '2931 Dwight Park', 'Center', 'Pass', 'Santa Ana', 'Texas', '79491', 'Budha', 'Tore Hawney', 'Account Representative IV', '$9.35', 'Tore', 'Software Consultant', '$8.12', 'Tore Turley', 'Database Administrator II', '$9.62', NULL, '2019-05-05', 1, '8069214677', '7143920917', '7143466520'),
(5, 'Rafaello Czajka', 'Shalom', '249-64-0713', '328-73-0458', '767-71-4578', '664-71-7168', 'L', 'San Antonio', '2019-05-21', '1 Michigan Terrace', 'Crossing', 'Hill', 'Newport News', 'Texas', '78250', 'Islam', 'Rafaello Vines', 'Senior Quality Engineer', '$0.49', 'Rafaello', 'Computer Systems Analyst IV', '$2.24', 'Rafaello Rembrandt', 'Research Nurse', '$8.82', NULL, '2019-05-30', 1, '2104076547', '7571630573', '7017805962'),
(6, 'Jorge Krinks', 'Aldin', '200-15-6917', '463-11-3348', '730-76-9805', '760-11-1268', 'P', 'Kansas City', '2018-12-24', '643 Grasskamp Lane', 'Street', 'Point', 'Newton', 'Missouri', '64125', 'Konghuchu', 'Jorge Ixor', 'Chemical Engineer', '$7.83', 'Jorge', 'Senior Financial Analyst', '$1.45', 'Jorge Nortunen', 'Paralegal', '$0.58', NULL, '2019-03-27', 1, '8165264530', '7816516584', '8132624624'),
(7, 'Steve Zwicker', 'Simone', '806-73-0140', '269-69-5008', '538-07-6611', '612-32-5263', 'L', 'El Paso', '2018-12-04', '4784 Spenser Alley', 'Parkway', 'Avenue', 'Los Angeles', 'Texas', '79911', 'Hindu', 'Steve Scattergood', 'Database Administrator II', '$1.48', 'Steve', 'Chief Design Engineer', '$6.55', 'Steve Felton', 'Paralegal', '$6.62', NULL, '2018-11-05', 1, '9153752823', '3237288472', '6108285441'),
(8, 'Tremayne Kures', 'Harris', '448-37-5211', '517-27-0827', '234-97-6977', '349-41-8006', 'L', 'Virginia Beach', '2019-07-06', '8723 Redwing Court', 'Way', 'Court', 'Amarillo', 'Virginia', '23471', 'Katholik', 'Tremayne Rozier', 'Product Engineer', '$9.31', 'Tremayne', 'Mechanical Systems Engineer', '$3.32', 'Tremayne Gillett', 'Staff Scientist', '$1.35', NULL, '2019-07-26', 1, '7577722771', '8066238712', '4078958528'),
(9, 'Van Bes', 'Humfrid', '411-78-5092', '876-91-9038', '866-03-9912', '680-41-3786', 'P', 'Montgomery', '2019-06-16', '5079 Warbler Circle', 'Crossing', 'Avenue', 'West Palm Beach', 'Alabama', '36109', 'Kristen', 'Van Hollyard', 'VP Accounting', '$7.75', 'Van', 'Sales Associate', '$3.50', 'Van Fransemai', 'Systems Administrator III', '$6.64', NULL, '2019-05-09', 1, '3342805371', '7723699368', '3035617647'),
(10, 'Cletis Ponte', 'Kennan', '527-31-3147', '193-30-9430', '376-60-6002', '181-07-2877', 'P', 'San Antonio', '2019-06-23', '77 Huxley Hill', 'Center', 'Trail', 'Durham', 'Texas', '78285', 'Katholik', 'Cletis Edmonson', 'Teacher', '$6.59', 'Cletis', 'Staff Scientist', '$6.01', 'Cletis Denisyev', 'Quality Engineer', '$1.91', NULL, '2019-04-01', 1, '2104699655', '9196439646', '8129644165'),
(11, 'Stanleigh Mordacai', 'Devland', '566-46-9059', '552-63-2882', '229-87-9137', '422-24-4418', 'P', 'Indianapolis', '2019-05-26', '1427 Shasta Road', 'Center', 'Alley', 'Omaha', 'Indiana', '46226', 'Kristen', 'Stanleigh Pedroni', 'Human Resources Manager', '$7.34', 'Stanleigh', 'Business Systems Development Analyst', '$1.01', 'Stanleigh Eadie', 'Senior Sales Associate', '$3.08', NULL, '2019-03-31', 1, '3175883880', '4023602019', '2628626069'),
(12, 'Thoma Hardaway', 'Wesley', '282-76-6874', '613-33-5625', '126-07-9527', '395-48-8160', 'P', 'Louisville', '2019-09-17', '50 Dennis Circle', 'Crossing', 'Circle', 'Dallas', 'Kentucky', '40205', 'Kristen', 'Thoma Bartolomucci', 'Chemical Engineer', '$9.35', 'Thoma', 'Community Outreach Specialist', '$7.25', 'Thoma Cleife', 'Structural Engineer', '$7.88', NULL, '2019-06-14', 1, '5026777979', '2143436298', '9157722855'),
(13, 'Freedman Bolan', 'Alphonso', '752-57-3635', '345-84-1799', '109-14-0022', '114-79-8578', 'L', 'Chicago', '2019-07-18', '905 Harper Parkway', 'Circle', 'Crossing', 'Ogden', 'Illinois', '60609', 'Konghuchu', 'Freedman Leades', 'Structural Engineer', '$3.73', 'Freedman', 'Senior Developer', '$4.91', 'Freedman Bonnyson', 'Analyst Programmer', '$0.34', NULL, '2019-05-07', 1, '7731075426', '8014311904', '2052279625'),
(14, 'Colet McRobert', 'Fairlie', '652-18-4382', '815-01-2161', '273-65-0423', '488-03-5507', 'P', 'Chicago', '2018-11-03', '415 Anthes Place', 'Trail', 'Junction', 'Houston', 'Illinois', '60691', 'Konghuchu', 'Colet Glenn', 'Analog Circuit Design manager', '$8.41', 'Colet', 'General Manager', '$8.31', 'Colet Kurth', 'Financial Analyst', '$8.40', NULL, '2018-12-29', 1, '3126800827', '2818875036', '9074951577'),
(15, 'Devin Mertgen', 'Micheil', '137-57-7247', '617-69-1965', '433-01-0334', '719-97-6547', 'L', 'Springfield', '2019-05-09', '01444 Oakridge Hill', 'Hill', 'Place', 'Nashville', 'Illinois', '62705', 'Hindu', 'Devin Rotte', 'Geological Engineer', '$4.05', 'Devin', 'Assistant Media Planner', '$9.18', 'Devin Marzello', 'Help Desk Operator', '$0.78', NULL, '2019-04-02', 1, '2171242201', '6154913381', '7143141646'),
(16, 'Calv Danell', 'Marcellus', '395-71-0844', '385-44-1982', '592-37-9868', '591-24-0798', 'P', 'Glendale', '2019-09-09', '30 Larry Street', 'Parkway', 'Plaza', 'Greensboro', 'Arizona', '85305', 'Kristen', 'Calv Crucitti', 'Senior Editor', '$4.77', 'Calv', 'Clinical Specialist', '$6.47', 'Calv Grattan', 'Pharmacist', '$3.77', NULL, '2019-09-01', 1, '6234440689', '3367144712', '2341291818'),
(17, 'Lynn Curragh', 'Roger', '712-25-4259', '361-52-9369', '302-68-7693', '447-65-9695', 'L', 'Cumming', '2019-08-12', '57 Parkside Trail', 'Way', 'Road', 'Corpus Christi', 'Georgia', '30130', 'Kristen', 'Lynn Harkins', 'Biostatistician III', '$6.48', 'Lynn', 'Quality Engineer', '$0.96', 'Lynn Dargie', 'Accountant IV', '$0.76', NULL, '2019-02-04', 1, '7062903424', '3614332052', '7012162455'),
(18, 'Herbie MacNamee', 'Burtie', '815-84-7944', '616-06-7038', '810-99-8263', '385-19-8114', 'P', 'Peoria', '2019-01-05', '7489 Cottonwood Road', 'Hill', 'Trail', 'Washington', 'Arizona', '85383', 'Hindu', 'Herbie Simmons', 'Database Administrator II', '$5.46', 'Herbie', 'Analyst Programmer', '$0.59', 'Herbie McCreadie', 'Recruiting Manager', '$9.70', NULL, '2019-06-09', 1, '6023555168', '2027238717', '4344746426'),
(19, 'Darrick Rabbe', 'Wayland', '273-61-9141', '611-56-0661', '445-94-4222', '693-37-0168', 'P', 'Irving', '2019-05-07', '0037 Blaine Pass', 'Street', 'Terrace', 'Tyler', 'Texas', '75037', 'Islam', 'Darrick Dioniso', 'Community Outreach Specialist', '$4.15', 'Darrick', 'Mechanical Systems Engineer', '$2.60', 'Darrick Stare', 'Senior Developer', '$9.49', NULL, '2019-10-22', 1, '2143417434', '9031469015', '7856570293'),
(20, 'Hall Bines', 'Alexio', '846-37-7121', '323-88-3854', '581-36-5234', '148-78-9883', 'P', 'Miami', '2019-01-01', '6 John Wall Avenue', 'Plaza', 'Parkway', 'Richmond', 'Florida', '33261', 'Kristen', 'Hall Villalta', 'Registered Nurse', '$8.81', 'Hall', 'VP Marketing', '$4.03', 'Hall Simcox', 'Tax Accountant', '$3.96', NULL, '2019-10-10', 1, '3055308471', '8043801268', '4109223452'),
(21, 'De witt Jakucewicz', 'Rogers', '819-53-7707', '892-97-1043', '316-15-7102', '329-31-3139', 'L', 'Birmingham', '2018-11-20', '56464 Rieder Crossing', 'Court', 'Center', 'Austin', 'Alabama', '35279', 'Budha', 'De witt Andreopolos', 'Pharmacist', '$8.44', 'De witt', 'Compensation Analyst', '$4.67', 'De witt Askew', 'Actuary', '$3.90', NULL, '2019-01-22', 1, '2056063451', '5125141197', '2533130725'),
(22, 'Lester Dablin', 'Stanleigh', '554-69-8519', '656-79-8300', '675-75-3946', '194-96-6337', 'L', 'Saint Augustine', '2019-03-12', '1 Fieldstone Court', 'Place', 'Point', 'Winston Salem', 'Florida', '32092', 'Hindu', 'Lester Heckner', 'Accountant IV', '$3.88', 'Lester', 'Account Representative II', '$5.46', 'Lester Livock', 'Electrical Engineer', '$3.12', NULL, '2018-12-19', 1, '9049183362', '3369372085', '7576208569'),
(23, 'Mordy Greves', 'Hill', '445-60-4960', '505-28-9102', '443-87-1772', '487-18-8234', 'L', 'Bakersfield', '2019-08-25', '9426 Southridge Court', 'Plaza', 'Junction', 'Sarasota', 'California', '93386', 'Kristen', 'Mordy Skarin', 'Internal Auditor', '$7.47', 'Mordy', 'General Manager', '$0.79', 'Mordy Yakobovicz', 'Safety Technician II', '$7.80', NULL, '2019-08-02', 1, '6618884187', '9413686649', '2548253791'),
(24, 'Eugenius Towne', 'Abbie', '713-96-6158', '241-15-9758', '331-19-4307', '385-22-3847', 'L', 'Chicago', '2019-08-23', '3 Northport Drive', 'Alley', 'Alley', 'Washington', 'Illinois', '60686', 'Katholik', 'Eugenius Pauleit', 'Financial Analyst', '$3.52', 'Eugenius', 'Financial Analyst', '$8.54', 'Eugenius Maciak', 'Research Assistant IV', '$2.12', NULL, '2019-06-22', 1, '3124890248', '2023091744', '5205156363'),
(25, 'Domenico Sunners', 'Spencer', '285-87-5749', '652-16-4129', '349-46-9061', '301-84-5387', 'P', 'New York City', '2019-06-20', '2 Rutledge Plaza', 'Trail', 'Lane', 'Washington', 'New York', '10090', 'Budha', 'Domenico Loughran', 'Environmental Tech', '$2.88', 'Domenico', 'Editor', '$1.49', 'Domenico Kinnach', 'Project Manager', '$6.87', NULL, '2019-06-18', 1, '2129346933', '2023320048', '2129084124'),
(26, 'Fair McCleary', 'Wainwright', '206-30-3070', '385-59-5707', '523-82-0567', '205-54-7515', 'L', 'Charlotte', '2019-08-15', '9189 Lien Point', 'Crossing', 'Crossing', 'Columbus', 'North Carolina', '28210', 'Konghuchu', 'Fair Skippings', 'Assistant Manager', '$6.02', 'Fair', 'Data Coordiator', '$0.37', 'Fair Pohlke', 'Chemical Engineer', '$1.00', NULL, '2019-01-16', 1, '7048896064', '6146188131', '6156557772'),
(27, 'Pattie Bayle', 'Lion', '440-47-9153', '724-71-0793', '367-91-8853', '503-91-1883', 'L', 'Zephyrhills', '2019-04-14', '3 Bluestem Way', 'Pass', 'Lane', 'Gatesville', 'Florida', '33543', 'Kristen', 'Pattie Loughran', 'Analyst Programmer', '$5.83', 'Pattie', 'Occupational Therapist', '$5.76', 'Pattie Davidwitz', 'Information Systems Manager', '$9.56', NULL, '2019-04-23', 1, '8135206049', '2543035245', '2035064970'),
(28, 'Ax Landeg', 'Ford', '242-06-4487', '689-97-5114', '616-99-9239', '639-24-6986', 'P', 'Fort Worth', '2019-05-23', '291 Bartillon Alley', 'Street', 'Parkway', 'Columbia', 'Texas', '76178', 'Kristen', 'Ax Vischi', 'Human Resources Manager', '$7.02', 'Ax', 'Product Engineer', '$4.65', 'Ax Featherbie', 'Legal Assistant', '$6.48', NULL, '2019-03-16', 1, '6825665133', '8036784556', '2106210067'),
(29, 'Ermin Morilla', 'Dav', '105-20-3017', '184-05-7155', '367-67-6164', '802-84-0630', 'P', 'Odessa', '2018-11-20', '904 Artisan Center', 'Avenue', 'Circle', 'Tampa', 'Texas', '79769', 'Hindu', 'Ermin Littlemore', 'Chief Design Engineer', '$8.51', 'Ermin', 'Statistician II', '$6.10', 'Ermin Fitchet', 'Human Resources Assistant II', '$6.23', NULL, '2018-12-08', 1, '4327319743', '8134862809', '2139845107'),
(30, 'Dan Deex', 'Rocky', '164-54-8344', '124-65-5432', '724-17-0208', '279-61-5195', 'L', 'Fort Worth', '2019-03-09', '729 Old Gate Hill', 'Plaza', 'Junction', 'San Jose', 'Texas', '76129', 'Budha', 'Dan Addenbrooke', 'Recruiter', '$5.12', 'Dan', 'Cost Accountant', '$9.66', 'Dan Rulf', 'Account Executive', '$0.60', NULL, '2019-02-04', 1, '8175730833', '4088924407', '7189733661'),
(31, 'Rod Quinell', 'Cesaro', '212-76-5525', '196-02-3316', '899-17-4103', '289-75-6344', 'P', 'Tulsa', '2019-06-11', '7 Mesta Terrace', 'Hill', 'Road', 'Columbus', 'Oklahoma', '74126', 'Budha', 'Rod Krysiak', 'Media Manager II', '$5.76', 'Rod', 'Electrical Engineer', '$9.95', 'Rod Kyberd', 'Nurse Practicioner', '$9.47', NULL, '2019-10-06', 1, '9188568540', '6143680147', '3136343098'),
(32, 'Samson Leishman', 'Jesus', '444-13-0547', '271-43-5337', '829-88-8710', '582-73-9704', 'L', 'Raleigh', '2018-11-14', '66 Mitchell Court', 'Plaza', 'Trail', 'Flint', 'North Carolina', '27658', 'Hindu', 'Samson Fowley', 'Cost Accountant', '$8.89', 'Samson', 'Cost Accountant', '$0.53', 'Samson Howood', 'Tax Accountant', '$5.64', NULL, '2019-10-17', 1, '9197706410', '8102218153', '6106677050'),
(33, 'Yul Scourfield', 'Tibold', '364-83-7002', '769-81-5767', '809-94-3152', '322-57-4909', 'P', 'Saint Louis', '2019-10-18', '361 Blue Bill Park Court', 'Court', 'Terrace', 'Detroit', 'Missouri', '63196', 'Budha', 'Yul Wicklin', 'Internal Auditor', '$0.76', 'Yul', 'Quality Engineer', '$3.83', 'Yul Domek', 'Research Associate', '$2.70', NULL, '2019-08-10', 1, '3147284701', '3138519397', '7576612617'),
(34, 'Dan Verlinden', 'Karlens', '258-76-3763', '892-67-0034', '191-55-7108', '602-12-5537', 'P', 'San Jose', '2019-06-05', '9 Paget Avenue', 'Pass', 'Point', 'Spokane', 'California', '95123', 'Konghuchu', 'Dan Olczak', 'Marketing Assistant', '$9.26', 'Dan', 'Staff Accountant I', '$0.52', 'Dan Bach', 'Systems Administrator II', '$4.48', NULL, '2019-01-18', 1, '4089309746', '5098097132', '3342759702'),
(35, 'King Allardyce', 'Putnam', '382-80-3263', '210-04-0337', '472-68-3085', '888-15-9371', 'P', 'Providence', '2019-03-15', '47554 Milwaukee Drive', 'Road', 'Plaza', 'Miami', 'Rhode Island', '2912', 'Budha', 'King Birney', 'VP Product Management', '$9.26', 'King', 'GIS Technical Architect', '$5.50', 'King Sonnenschein', 'Civil Engineer', '$8.43', NULL, '2019-07-10', 1, '4019589365', '7866665691', '7148761681'),
(36, 'Alfredo Brayley', 'Somerset', '801-38-1296', '874-71-5763', '721-64-6710', '246-12-0746', 'L', 'Seattle', '2018-11-30', '74553 Artisan Road', 'Trail', 'Avenue', 'Des Moines', 'Washington', '98127', 'Hindu', 'Alfredo Sneddon', 'Senior Financial Analyst', '$5.81', 'Alfredo', 'Systems Administrator IV', '$5.58', 'Alfredo Grayston', 'Health Coach III', '$7.32', NULL, '2019-01-05', 1, '2066348223', '5155931771', '3183191081'),
(37, 'Gal Pegden', 'Alberik', '315-94-0211', '680-71-0696', '222-29-2125', '239-67-3820', 'P', 'Port Charlotte', '2019-05-03', '8 Derek Alley', 'Circle', 'Pass', 'Dallas', 'Florida', '33954', 'Konghuchu', 'Gal Errey', 'Assistant Media Planner', '$6.80', 'Gal', 'Staff Accountant IV', '$8.06', 'Gal Farrear', 'Human Resources Assistant III', '$9.94', NULL, '2018-11-13', 1, '9413082317', '2146687613', '8017739486'),
(38, 'Carce Ghidini', 'Jdavie', '464-85-1557', '558-46-1029', '525-16-3890', '512-82-6322', 'L', 'El Paso', '2018-12-04', '850 Bellgrove Parkway', 'Road', 'Center', 'Buffalo', 'Texas', '88514', 'Katholik', 'Carce McKeaveney', 'Financial Advisor', '$6.13', 'Carce', 'Analyst Programmer', '$5.29', 'Carce Batrip', 'Tax Accountant', '$6.20', NULL, '2019-01-17', 1, '9158246011', '7161523420', '9155933022'),
(39, 'Brion Allwright', 'Kendell', '783-19-4082', '566-40-2174', '570-31-8775', '347-21-9919', 'P', 'Lake Worth', '2019-07-27', '468 3rd Place', 'Plaza', 'Hill', 'Stockton', 'Florida', '33462', 'Katholik', 'Brion Borleace', 'Speech Pathologist', '$4.05', 'Brion', 'Desktop Support Technician', '$9.33', 'Brion Boise', 'Cost Accountant', '$8.63', NULL, '2019-08-24', 1, '5619295620', '2094039144', '5207484128'),
(40, 'Haily Domerc', 'Jed', '608-86-1560', '658-36-1889', '660-78-5880', '549-90-1508', 'P', 'Troy', '2019-03-23', '96960 Coleman Place', 'Parkway', 'Junction', 'Saint Paul', 'Michigan', '48098', 'Islam', 'Haily Jozefowicz', 'Database Administrator IV', '$6.54', 'Haily', 'Engineer II', '$9.76', 'Haily Charrington', 'Editor', '$7.27', NULL, '2018-12-08', 1, '2483860521', '6515164805', '5109990730'),
(41, 'Benjamen McColm', 'Dru', '610-59-8061', '672-66-0156', '883-75-0984', '670-09-8628', 'P', 'Dallas', '2018-12-17', '59 Summerview Plaza', 'Way', 'Drive', 'Houston', 'Texas', '75221', 'Islam', 'Benjamen Albrook', 'Account Executive', '$7.88', 'Benjamen', 'Senior Quality Engineer', '$2.58', 'Benjamen Obbard', 'Design Engineer', '$0.43', NULL, '2019-04-17', 1, '2146514510', '7137423057', '7403418191'),
(42, 'Ulberto Gofton', 'Rhys', '340-17-9719', '630-67-8478', '885-37-9546', '151-57-5209', 'P', 'Katy', '2019-09-20', '322 Bunting Circle', 'Way', 'Place', 'Atlanta', 'Texas', '77493', 'Budha', 'Ulberto Windrass', 'Account Executive', '$1.79', 'Ulberto', 'Mechanical Systems Engineer', '$3.42', 'Ulberto Dimitrijevic', 'Senior Developer', '$7.11', NULL, '2019-01-15', 1, '2819571144', '4049118389', '2561643937'),
(43, 'Allyn Garron', 'Mitchael', '894-04-2990', '777-24-4552', '183-82-6728', '214-72-6110', 'L', 'Washington', '2019-10-20', '30257 Northwestern Junction', 'Alley', 'Place', 'Sparks', 'District of Columbia', '20310', 'Katholik', 'Allyn Harg', 'Sales Associate', '$5.39', 'Allyn', 'Cost Accountant', '$2.98', 'Allyn Shortan', 'VP Accounting', '$7.54', NULL, '2019-05-14', 1, '2024952384', '7753995807', '4079132025'),
(44, 'Alexio Morant', 'Carmine', '384-44-1407', '470-35-9928', '237-51-3797', '309-14-8056', 'P', 'Aurora', '2019-08-02', '28640 Vernon Pass', 'Trail', 'Street', 'Dayton', 'Colorado', '80044', 'Konghuchu', 'Alexio Finker', 'Software Test Engineer II', '$0.12', 'Alexio', 'Automation Specialist III', '$6.56', 'Alexio Doulton', 'Environmental Tech', '$5.31', NULL, '2018-12-30', 1, '3033805176', '9377423971', '5174112473'),
(45, 'Emilio Bastide', 'Russ', '747-42-2657', '340-60-1686', '699-27-4232', '683-49-9064', 'P', 'Houston', '2019-03-20', '0755 Namekagon Center', 'Park', 'Way', 'Macon', 'Texas', '77250', 'Konghuchu', 'Emilio Kleanthous', 'Project Manager', '$0.26', 'Emilio', 'Environmental Specialist', '$5.45', 'Emilio Katte', 'VP Sales', '$5.47', NULL, '2019-04-08', 1, '7135639956', '4783357340', '2018877862'),
(46, 'Hastie Fintoph', 'Alaster', '358-16-1039', '698-26-8172', '688-76-2808', '750-79-4309', 'P', 'Melbourne', '2019-06-11', '2 Clarendon Park', 'Park', 'Parkway', 'Phoenix', 'Florida', '32919', 'Konghuchu', 'Hastie Elnough', 'Help Desk Operator', '$7.44', 'Hastie', 'Research Associate', '$5.06', 'Hastie Van der Linde', 'Compensation Analyst', '$0.14', NULL, '2019-10-22', 1, '3213406773', '6023183510', '7633531307'),
(47, 'Sauveur Rowland', 'Lydon', '773-58-6299', '621-83-7447', '127-25-7244', '339-30-0899', 'P', 'Greensboro', '2018-12-01', '40584 School Terrace', 'Place', 'Drive', 'Syracuse', 'North Carolina', '27425', 'Budha', 'Sauveur McFall', 'Teacher', '$7.83', 'Sauveur', 'Food Chemist', '$6.41', 'Sauveur Hattam', 'Computer Systems Analyst IV', '$1.43', NULL, '2019-05-07', 1, '3365378291', '3159682048', '2026503156'),
(48, 'Kaine Merriott', 'Hazel', '409-82-0686', '765-92-6237', '265-43-4200', '168-89-8568', 'P', 'Long Beach', '2019-09-11', '35374 Warner Crossing', 'Park', 'Way', 'Albany', 'California', '90840', 'Islam', 'Kaine Pocknell', 'Software Test Engineer I', '$7.29', 'Kaine', 'Marketing Assistant', '$2.06', 'Kaine Fawltey', 'Marketing Assistant', '$9.44', NULL, '2019-06-02', 1, '5623734112', '5184338723', '8509207239'),
(49, 'Findlay Mannock', 'Daron', '256-33-9386', '748-63-8233', '344-48-9079', '306-48-2573', 'L', 'Anderson', '2019-01-15', '51504 Del Mar Point', 'Circle', 'Center', 'Prescott', 'South Carolina', '29625', 'Budha', 'Findlay Marking', 'Software Engineer I', '$6.29', 'Findlay', 'Environmental Tech', '$1.28', 'Findlay Tattam', 'Account Executive', '$0.37', NULL, '2019-08-25', 1, '8643901540', '5205045271', '4057334058'),
(50, 'Cy Strode', 'Laird', '205-54-0218', '581-37-4371', '326-30-9887', '499-52-8395', 'L', 'New Brunswick', '2019-08-10', '99309 Reinke Circle', 'Point', 'Junction', 'Atlanta', 'New Jersey', '8922', 'Islam', 'Cy Stendall', 'Chemical Engineer', '$6.81', 'Cy', 'Administrative Officer', '$1.05', 'Cy Eighteen', 'Chief Design Engineer', '$5.82', NULL, '2019-02-14', 1, '7327200679', '4047519020', '2607033344'),
(51, 'Gery Torra', 'Ricard', '401-84-7872', '202-15-2654', '855-45-6822', '141-68-3271', 'L', 'Boulder', '2019-02-16', '09 Nobel Terrace', 'Place', 'Trail', 'New Bedford', 'Colorado', '80310', 'Kristen', 'Gery Godart', 'Media Manager II', '$2.40', 'Gery', 'Web Designer II', '$4.85', 'Gery Doerren', 'Actuary', '$9.45', NULL, '2019-04-30', 1, '3036923361', '5085088290', '6518394195'),
(53, 'Orton Crummay', 'Dalis', '400-11-7651', '318-88-0285', '452-41-7855', '148-51-0459', 'L', 'Nashville', '2019-01-10', '780 Pennsylvania Drive', 'Place', 'Court', 'Orlando', 'Tennessee', '37205', 'Islam', 'Orton Hick', 'Staff Accountant IV', '$7.01', 'Orton', 'Analog Circuit Design manager', '$6.43', 'Orton Trump', 'Administrative Officer', '$6.06', NULL, '2019-01-19', 1, '6153270602', '4078787625', '6022635293'),
(54, 'Barclay Romanski', 'Giffer', '309-43-1576', '378-25-8543', '843-87-1004', '360-23-6376', 'P', 'Tulsa', '2019-05-05', '5124 Oneill Place', 'Center', 'Hill', 'Gary', 'Oklahoma', '74193', 'Hindu', 'Barclay Kenelin', 'Data Coordiator', '$5.91', 'Barclay', 'Analyst Programmer', '$9.39', 'Barclay Trainer', 'Legal Assistant', '$0.98', NULL, '2019-09-01', 1, '9182318216', '2199468652', '3373280709'),
(55, 'Patton Hardy-Piggin', 'Fowler', '193-32-2678', '492-95-1443', '355-44-1584', '628-23-5007', 'L', 'Anaheim', '2019-02-05', '2839 Nova Drive', 'Pass', 'Way', 'Indianapolis', 'California', '92825', 'Kristen', 'Patton August', 'Office Assistant IV', '$6.73', 'Patton', 'Human Resources Manager', '$6.36', 'Patton Denge', 'Electrical Engineer', '$1.29', NULL, '2019-08-30', 1, '7145463046', '3172841554', '9167835295'),
(56, 'Bjorn Hackett', 'Darrin', '601-02-9169', '788-58-6363', '266-32-0899', '518-63-8932', 'P', 'New York City', '2019-08-08', '11 Hollow Ridge Avenue', 'Terrace', 'Drive', 'Seattle', 'New York', '10115', 'Islam', 'Bjorn Kisbee', 'Help Desk Operator', '$1.58', 'Bjorn', 'Geological Engineer', '$8.37', 'Bjorn Feighney', 'Project Manager', '$9.68', NULL, '2019-09-23', 1, '2126615767', '4258316529', '9078340897'),
(57, 'Carmine Kett', 'Rudiger', '479-09-3334', '613-41-8939', '570-33-6552', '880-72-6759', 'P', 'Rochester', '2019-02-05', '6 Elmside Circle', 'Pass', 'Point', 'Gainesville', 'New York', '14646', 'Kristen', 'Carmine Menchenton', 'Budget/Accounting Analyst I', '$8.75', 'Carmine', 'Senior Cost Accountant', '$6.41', 'Carmine Brailsford', 'VP Accounting', '$0.30', NULL, '2018-12-28', 1, '5856485514', '7703663168', '2149242391'),
(58, 'Kerr Kitson', 'D\'arcy', '180-21-9471', '341-43-7820', '401-24-4928', '457-76-3683', 'P', 'Washington', '2019-07-19', '34 South Trail', 'Park', 'Court', 'Lexington', 'District of Columbia', '20599', 'Islam', 'Kerr Sparshott', 'Payment Adjustment Coordinator', '$0.00', 'Kerr', 'Safety Technician III', '$1.86', 'Kerr Penna', 'Quality Control Specialist', '$9.18', NULL, '2019-10-14', 1, '2021553385', '8599707638', '7604107412'),
(59, 'Alistair Doust', 'Cass', '482-70-0879', '137-46-4892', '284-32-2590', '812-77-5400', 'P', 'Alexandria', '2018-12-18', '245 Dovetail Alley', 'Junction', 'Junction', 'San Diego', 'Virginia', '22313', 'Konghuchu', 'Alistair Hopewell', 'Senior Quality Engineer', '$5.28', 'Alistair', 'Sales Representative', '$6.10', 'Alistair Mugglestone', 'Analog Circuit Design manager', '$4.02', NULL, '2018-12-23', 1, '5713355889', '6197467541', '7138631442'),
(60, 'Emmanuel Hatfield', 'John', '483-46-1974', '683-39-7559', '870-20-6682', '465-67-7495', 'L', 'Huntington', '2019-07-25', '8 Russell Crossing', 'Center', 'Place', 'Kansas City', 'West Virginia', '25705', 'Konghuchu', 'Emmanuel Pafford', 'Environmental Tech', '$6.25', 'Emmanuel', 'Professor', '$4.49', 'Emmanuel Mein', 'Systems Administrator II', '$7.77', NULL, '2019-02-28', 1, '3048840967', '8162344572', '5618899907'),
(61, 'Stillman Breydin', 'Luis', '833-63-0876', '171-85-1101', '550-59-8699', '709-56-1456', 'P', 'Canton', '2019-10-17', '4 High Crossing Lane', 'Junction', 'Hill', 'Houston', 'Ohio', '44710', 'Katholik', 'Stillman McRae', 'Recruiter', '$0.11', 'Stillman', 'Human Resources Assistant I', '$6.45', 'Stillman Jendrusch', 'Office Assistant II', '$8.16', NULL, '2019-03-03', 1, '3306792810', '8322408984', '4056972380'),
(62, 'Devin Baudou', 'Salmon', '794-57-3094', '602-51-1794', '118-53-6423', '346-10-7346', 'P', 'El Paso', '2019-05-28', '38 Carey Pass', 'Plaza', 'Circle', 'Philadelphia', 'Texas', '88530', 'Hindu', 'Devin Gambles', 'Design Engineer', '$9.18', 'Devin', 'Marketing Manager', '$3.68', 'Devin Labell', 'Food Chemist', '$0.63', NULL, '2018-11-18', 1, '9158599912', '2155062486', '5042642842'),
(63, 'Carling Rodden', 'Claudian', '799-77-5644', '502-55-5675', '545-20-5434', '873-15-8192', 'L', 'Huntsville', '2018-12-29', '3 Bonner Place', 'Circle', 'Court', 'Pomona', 'Alabama', '35815', 'Konghuchu', 'Carling Sprott', 'Office Assistant I', '$1.94', 'Carling', 'Physical Therapy Assistant', '$4.70', 'Carling Avarne', 'Actuary', '$2.42', NULL, '2019-02-20', 1, '2561384720', '9097111058', '6199860227'),
(64, 'Arlin Blackman', 'Sayer', '876-32-9380', '838-63-6836', '238-64-4728', '722-26-2101', 'L', 'Springfield', '2019-01-21', '259 Fairview Street', 'Plaza', 'Plaza', 'Elmira', 'Illinois', '62794', 'Islam', 'Arlin Crocket', 'Analyst Programmer', '$9.24', 'Arlin', 'Assistant Media Planner', '$7.02', 'Arlin Calver', 'Compensation Analyst', '$7.65', NULL, '2019-04-28', 1, '2175042593', '6073864459', '6152272542'),
(65, 'Victoir Gemeau', 'Reinold', '210-05-7724', '866-53-5552', '277-46-0685', '186-64-9975', 'P', 'Charlotte', '2019-08-11', '57495 Esch Alley', 'Park', 'Park', 'Pittsburgh', 'North Carolina', '28256', 'Budha', 'Victoir Silver', 'Web Developer III', '$4.60', 'Victoir', 'Compensation Analyst', '$2.09', 'Victoir Kobke', 'Environmental Tech', '$5.59', NULL, '2019-01-29', 1, '7048083282', '4123223444', '3025401498'),
(66, 'Maje Riolfo', 'Sammy', '612-03-7145', '263-05-4530', '785-45-4144', '111-31-0119', 'P', 'Colorado Springs', '2019-06-20', '30 3rd Crossing', 'Road', 'Center', 'Peoria', 'Colorado', '80951', 'Konghuchu', 'Maje Alelsandrovich', 'Professor', '$2.32', 'Maje', 'Junior Executive', '$7.43', 'Maje Oldroyde', 'Senior Quality Engineer', '$6.61', NULL, '2018-11-19', 1, '7198108985', '3091229635', '4177634781'),
(67, 'Ricki Abbis', 'Erastus', '271-04-7084', '456-52-2822', '778-79-2533', '512-82-6650', 'L', 'Bradenton', '2018-11-11', '2482 Daystar Road', 'Court', 'Drive', 'Phoenix', 'Florida', '34210', 'Budha', 'Ricki Lundberg', 'Food Chemist', '$6.76', 'Ricki', 'General Manager', '$9.49', 'Ricki Slimm', 'Environmental Tech', '$0.13', NULL, '2019-08-30', 1, '9411458837', '6027737451', '9159731153'),
(68, 'Bordy Lowrey', 'Dewitt', '422-45-5625', '712-26-2543', '396-31-4405', '102-45-8352', 'P', 'Green Bay', '2018-12-08', '0557 Dwight Place', 'Junction', 'Junction', 'Sioux Falls', 'Wisconsin', '54305', 'Hindu', 'Bordy Henworth', 'Senior Cost Accountant', '$6.71', 'Bordy', 'Accounting Assistant II', '$1.94', 'Bordy Simonutti', 'Project Manager', '$5.31', NULL, '2019-10-13', 1, '9205837130', '6059813385', '9199593667'),
(69, 'Sloane Lewsy', 'Gallard', '802-26-5040', '813-14-1593', '185-62-6803', '489-68-1229', 'L', 'Corpus Christi', '2019-09-22', '6 Transport Circle', 'Point', 'Crossing', 'Helena', 'Texas', '78410', 'Islam', 'Sloane Miche', 'Database Administrator III', '$0.86', 'Sloane', 'Electrical Engineer', '$1.48', 'Sloane Yakunin', 'Budget/Accounting Analyst I', '$9.85', NULL, '2019-08-11', 1, '3613754113', '4066496908', '6826113172'),
(70, 'Reinwald Van', 'Bron', '563-37-8927', '309-83-2701', '546-62-3568', '359-88-6584', 'L', 'Fort Worth', '2019-04-05', '014 Lyons Park', 'Center', 'Park', 'Phoenix', 'Texas', '76129', 'Konghuchu', 'Reinwald Bridgland', 'VP Accounting', '$5.04', 'Reinwald', 'Community Outreach Specialist', '$1.49', 'Reinwald Szimoni', 'Paralegal', '$1.24', NULL, '2019-06-08', 1, '8175464788', '6236664066', '7176220840'),
(71, 'Oran Snellman', 'Nat', '800-67-8045', '539-01-4531', '472-79-6388', '156-82-2056', 'P', 'Pasadena', '2019-07-03', '99 Chinook Avenue', 'Trail', 'Way', 'Cincinnati', 'California', '91125', 'Islam', 'Oran Diggle', 'Physical Therapy Assistant', '$8.67', 'Oran', 'Operator', '$7.72', 'Oran Aubin', 'Executive Secretary', '$9.41', NULL, '2019-09-05', 1, '6266926839', '5134364587', '6613734510'),
(72, 'Raynor Ertel', 'Claiborne', '600-10-7778', '285-15-4086', '260-81-0998', '144-11-7077', 'P', 'Dayton', '2018-12-17', '5 Portage Center', 'Place', 'Point', 'Peoria', 'Ohio', '45432', 'Konghuchu', 'Raynor Oakshott', 'Nurse', '$1.95', 'Raynor', 'Sales Associate', '$7.17', 'Raynor Bick', 'Senior Cost Accountant', '$5.98', NULL, '2019-10-16', 1, '9371816325', '3094306614', '2158853129'),
(73, 'Lorens Greggs', 'Lindy', '862-58-2305', '676-72-8260', '685-68-0266', '590-35-6011', 'L', 'New York City', '2019-03-05', '9975 Jana Alley', 'Point', 'Road', 'Cambridge', 'New York', '10280', 'Katholik', 'Lorens Clayson', 'Senior Quality Engineer', '$9.43', 'Lorens', 'Technical Writer', '$6.74', 'Lorens Feldhorn', 'Pharmacist', '$3.05', NULL, '2018-11-06', 1, '3473378973', '6171924512', '8163996414'),
(74, 'Arty Cristofolini', 'Cornall', '539-18-4026', '443-91-3993', '674-74-4675', '831-51-2827', 'L', 'Los Angeles', '2019-06-08', '7929 Forest Dale Junction', 'Hill', 'Avenue', 'Austin', 'California', '90040', 'Konghuchu', 'Arty Brigg', 'Media Manager IV', '$5.92', 'Arty', 'Office Assistant IV', '$3.78', 'Arty Meakes', 'Software Test Engineer III', '$5.50', NULL, '2018-12-18', 1, '6264383717', '5124371270', '2029567766'),
(75, 'Yvon Bourdon', 'Morey', '237-56-8786', '710-62-5371', '247-25-0618', '296-16-0969', 'P', 'Buffalo', '2019-03-04', '987 Express Point', 'Avenue', 'Court', 'Houston', 'New York', '14233', 'Budha', 'Yvon Bonhome', 'VP Sales', '$9.63', 'Yvon', 'Librarian', '$6.80', 'Yvon Tredgold', 'VP Product Management', '$9.70', NULL, '2019-06-07', 1, '7166719877', '7134983403', '8067054750'),
(76, 'Reidar Boik', 'Pat', '293-90-7712', '389-78-7394', '776-27-7524', '109-77-7735', 'P', 'Champaign', '2019-02-17', '1700 Schurz Hill', 'Point', 'Alley', 'Englewood', 'Illinois', '61825', 'Islam', 'Reidar Sargent', 'Administrative Officer', '$7.06', 'Reidar', 'Engineer I', '$6.53', 'Reidar Gadesby', 'Sales Representative', '$6.09', NULL, '2018-11-12', 1, '2175785926', '3033846987', '6182232859'),
(77, 'Rodrigo Gueste', 'Ilario', '687-90-6634', '490-29-0619', '422-70-2138', '184-83-0227', 'P', 'Syracuse', '2019-03-18', '6 Valley Edge Trail', 'Junction', 'Lane', 'Denver', 'New York', '13205', 'Budha', 'Rodrigo Wright', 'Design Engineer', '$7.27', 'Rodrigo', 'Health Coach III', '$1.00', 'Rodrigo Karby', 'Financial Analyst', '$6.22', NULL, '2019-08-28', 1, '3158095314', '3035748010', '3109103149'),
(78, 'Horst Summerlee', 'Early', '872-64-7716', '683-34-2538', '586-03-7507', '318-40-6289', 'P', 'Jacksonville', '2018-11-17', '2540 Surrey Road', 'Alley', 'Plaza', 'Greensboro', 'Florida', '32255', 'Hindu', 'Horst Chamberlain', 'Social Worker', '$5.84', 'Horst', 'Information Systems Manager', '$3.54', 'Horst Whiscard', 'VP Accounting', '$9.72', NULL, '2019-10-15', 1, '9044626276', '3362589736', '5021532035'),
(79, 'Dalli Aylott', 'Gunar', '514-90-1663', '343-70-7790', '254-14-9357', '639-90-9981', 'P', 'Indianapolis', '2019-03-12', '20 Arizona Lane', 'Place', 'Street', 'Huntington', 'Indiana', '46207', 'Budha', 'Dalli Seater', 'Mechanical Systems Engineer', '$3.51', 'Dalli', 'Safety Technician II', '$7.56', 'Dalli Gentreau', 'Accountant II', '$4.85', NULL, '2019-09-18', 1, '3178568533', '3042185923', '4074037638'),
(80, 'Stearne Grills', 'Kingsly', '128-32-6994', '171-95-6951', '588-72-9525', '382-15-7760', 'P', 'Topeka', '2019-10-01', '4059 Pennsylvania Alley', 'Alley', 'Trail', 'Garland', 'Kansas', '66642', 'Islam', 'Stearne De La Salle', 'Product Engineer', '$4.46', 'Stearne', 'Account Coordinator', '$3.05', 'Stearne Ivanyushkin', 'Nurse Practicioner', '$6.03', NULL, '2019-09-12', 1, '7852823173', '2148513797', '7136559443'),
(81, 'Silvanus Black', 'Lucius', '449-28-5125', '864-90-9711', '396-65-2882', '561-55-9951', 'P', 'Trenton', '2019-02-20', '152 Commercial Terrace', 'Point', 'Lane', 'Boise', 'New Jersey', '8650', 'Kristen', 'Silvanus Desmond', 'Database Administrator II', '$1.39', 'Silvanus', 'Software Test Engineer II', '$8.73', 'Silvanus Bouzan', 'Computer Systems Analyst II', '$7.42', NULL, '2019-07-25', 1, '6093645452', '2087577047', '4125642582'),
(82, 'Shay Gritsaev', 'Rudie', '872-73-6304', '583-74-4946', '725-31-1978', '540-48-4849', 'P', 'New York City', '2019-10-30', '928 Butterfield Terrace', 'Alley', 'Point', 'Buffalo', 'New York', '10099', 'Kristen', 'Shay Culcheth', 'Analyst Programmer', '$4.53', 'Shay', 'Accountant I', '$7.19', 'Shay Nockolds', 'Community Outreach Specialist', '$0.38', NULL, '2019-04-06', 1, '6466524576', '7168446188', '7063915651'),
(83, 'Darwin Boggas', 'Giraud', '223-19-5532', '398-55-0295', '783-20-1584', '461-80-7001', 'L', 'Tacoma', '2018-11-11', '3 Division Junction', 'Point', 'Lane', 'Columbia', 'Washington', '98481', 'Islam', 'Darwin Stockle', 'Senior Sales Associate', '$5.42', 'Darwin', 'Nurse Practicioner', '$5.43', 'Darwin Vallintine', 'VP Quality Control', '$1.28', NULL, '2019-08-06', 1, '2531981441', '8032419758', '7244913804'),
(84, 'Leonid Rampling', 'Ricky', '877-32-2267', '741-72-9743', '758-78-5940', '379-24-5535', 'P', 'Santa Fe', '2018-12-20', '5 Pankratz Crossing', 'Drive', 'Terrace', 'Columbus', 'New Mexico', '87592', 'Islam', 'Leonid Martensen', 'Health Coach I', '$1.48', 'Leonid', 'Recruiting Manager', '$0.22', 'Leonid Schneidar', 'Senior Cost Accountant', '$8.18', NULL, '2019-01-31', 1, '5054827972', '6145866824', '4057597046'),
(85, 'Christiano Sommersett', 'Gallard', '417-50-2296', '523-67-4899', '165-43-4030', '572-47-1893', 'L', 'Newport News', '2019-09-04', '053 Loeprich Junction', 'Road', 'Place', 'New Orleans', 'Virginia', '23612', 'Islam', 'Christiano Pinchin', 'Editor', '$1.50', 'Christiano', 'Community Outreach Specialist', '$3.56', 'Christiano Grason', 'Editor', '$4.71', NULL, '2018-11-27', 1, '7577253739', '5044134013', '6163973225'),
(86, 'Farlie Eisig', 'Verge', '704-52-9935', '877-48-1974', '778-34-2822', '258-47-0276', 'L', 'Chico', '2019-07-27', '8456 Ramsey Center', 'Avenue', 'Plaza', 'Great Neck', 'California', '95973', 'Konghuchu', 'Farlie Bennellick', 'Cost Accountant', '$8.40', 'Farlie', 'Health Coach II', '$0.66', 'Farlie Pantling', 'Programmer III', '$2.57', NULL, '2019-07-13', 1, '5308849187', '5162678928', '2404510455'),
(88, 'Carlos Allmen', 'Mikael', '253-35-8397', '539-94-0889', '454-20-0773', '586-51-1479', 'P', 'Macon', '2019-09-22', '729 Trailsway Pass', 'Junction', 'Avenue', 'Harrisburg', 'Georgia', '31217', 'Islam', 'Carlos Abramowitch', 'Administrative Assistant IV', '$6.19', 'Carlos', 'Compensation Analyst', '$5.11', 'Carlos Paulo', 'Software Test Engineer II', '$3.07', NULL, '2019-09-22', 1, '4785802023', '7174969030', '9017984760'),
(89, 'Coop Mariaud', 'Owen', '352-87-6162', '158-67-8811', '585-96-0416', '249-98-8895', 'L', 'Scranton', '2019-03-27', '7626 Caliangt Terrace', 'Parkway', 'Park', 'Lexington', 'Pennsylvania', '18505', 'Konghuchu', 'Coop Silverman', 'Account Executive', '$6.91', 'Coop', 'Dental Hygienist', '$3.94', 'Coop Crosier', 'Actuary', '$1.02', NULL, '2019-08-02', 1, '5703858271', '8594958955', '7657711548'),
(90, 'Meredeth Iacovaccio', 'Raleigh', '277-05-3089', '428-93-0658', '513-37-9663', '180-12-3227', 'L', 'Pueblo', '2019-02-26', '0 Reinke Street', 'Way', 'Park', 'Great Neck', 'Colorado', '81015', 'Katholik', 'Meredeth Whitty', 'Recruiting Manager', '$9.34', 'Meredeth', 'Senior Financial Analyst', '$3.10', 'Meredeth Hockey', 'Registered Nurse', '$0.01', NULL, '2019-05-17', 1, '7194832487', '5163076727', '3308072548'),
(91, 'Prentiss Wilby', 'Antonius', '463-76-5248', '470-47-2172', '711-15-0775', '731-39-5134', 'P', 'Richmond', '2019-01-09', '03284 Johnson Trail', 'Avenue', 'Lane', 'Sunnyvale', 'Virginia', '23242', 'Konghuchu', 'Prentiss Goullee', 'Statistician IV', '$7.68', 'Prentiss', 'Media Manager IV', '$1.43', 'Prentiss Grazier', 'Junior Executive', '$1.33', NULL, '2019-01-26', 1, '8046354178', '6501183712', '2513320922'),
(92, 'Hinze Brian', 'Phillipp', '754-81-7356', '809-45-4913', '116-23-1031', '700-50-1763', 'P', 'Tampa', '2019-06-15', '5 Kings Alley', 'Circle', 'Crossing', 'Ridgely', 'Florida', '33661', 'Katholik', 'Hinze Woonton', 'Account Executive', '$4.39', 'Hinze', 'Operator', '$5.88', 'Hinze Silverston', 'Recruiting Manager', '$4.92', NULL, '2019-10-18', 1, '8135350466', '4104712179', '7171361024'),
(93, 'Trenton Boarleyson', 'Hamil', '262-90-3672', '546-80-0222', '450-54-4609', '305-64-1018', 'P', 'Washington', '2019-09-30', '3991 Grim Lane', 'Court', 'Parkway', 'Fresno', 'District of Columbia', '20397', 'Islam', 'Trenton Rizzelli', 'Engineer III', '$6.13', 'Trenton', 'Civil Engineer', '$9.39', 'Trenton Stenhouse', 'Staff Scientist', '$7.31', NULL, '2019-06-06', 1, '2026890617', '2098881952', '5014782605'),
(94, 'Hurleigh Di Bartolommeo', 'Morty', '120-20-5734', '629-53-6143', '293-66-4302', '385-24-2610', 'P', 'Denver', '2019-05-08', '28083 Judy Circle', 'Hill', 'Plaza', 'Sacramento', 'Colorado', '80249', 'Budha', 'Hurleigh Mottinelli', 'Chief Design Engineer', '$4.36', 'Hurleigh', 'VP Sales', '$8.43', 'Hurleigh Lillegard', 'Technical Writer', '$4.95', NULL, '2019-08-04', 1, '3031577255', '9165792002', '8137677103'),
(95, 'Hugo Ponton', 'Heindrick', '636-94-9481', '449-77-3947', '397-15-9697', '706-99-0973', 'P', 'Lexington', '2018-11-03', '15 5th Trail', 'Street', 'Terrace', 'Atlanta', 'Kentucky', '40515', 'Kristen', 'Hugo Bangiard', 'Pharmacist', '$2.20', 'Hugo', 'Information Systems Manager', '$4.73', 'Hugo Cavnor', 'Pharmacist', '$9.45', NULL, '2019-07-30', 1, '8592534792', '4042119557', '8329171650'),
(96, 'Osbert Goodey', 'Reggis', '166-63-1306', '608-90-3754', '174-88-6946', '514-58-5798', 'L', 'Danbury', '2019-03-20', '31194 Vidon Way', 'Pass', 'Drive', 'Washington', 'Connecticut', '6816', 'Kristen', 'Osbert Melross', 'Assistant Media Planner', '$8.55', 'Osbert', 'Engineer IV', '$1.65', 'Osbert Torrese', 'Internal Auditor', '$8.64', NULL, '2019-09-23', 1, '2038565803', '2029145558', '4358081501'),
(97, 'Dar Stoyle', 'Horatio', '433-44-6200', '310-86-6346', '318-39-1137', '880-60-6777', 'L', 'Elizabeth', '2019-02-15', '87 Coleman Circle', 'Trail', 'Circle', 'Pasadena', 'New Jersey', '7208', 'Islam', 'Dar Rable', 'Software Engineer III', '$9.08', 'Dar', 'Analog Circuit Design manager', '$9.29', 'Dar Thaller', 'Information Systems Manager', '$5.43', NULL, '2019-10-11', 1, '9088486808', '6261152129', '7752195576'),
(98, 'Tiebout Smaleman', 'Johnnie', '578-49-7945', '603-21-6914', '663-12-5312', '263-75-5980', 'P', 'Honolulu', '2019-10-26', '43532 Bultman Pass', 'Terrace', 'Center', 'Houston', 'Hawaii', '96815', 'Katholik', 'Tiebout Welds', 'Clinical Specialist', '$1.32', 'Tiebout', 'Graphic Designer', '$5.50', 'Tiebout Oliveira', 'Statistician I', '$9.08', NULL, '2019-07-04', 1, '8089530052', '8329628427', '3529545096'),
(99, 'Gare Lattie', 'Silvanus', '652-54-7399', '247-94-5910', '195-57-3586', '818-58-9560', 'L', 'Charlottesville', '2019-05-11', '712 Surrey Junction', 'Park', 'Center', 'Long Beach', 'Virginia', '22908', 'Hindu', 'Gare Stuffins', 'Mechanical Systems Engineer', '$2.74', 'Gare', 'Assistant Media Planner', '$3.54', 'Gare Longforth', 'Administrative Assistant I', '$1.94', NULL, '2019-07-06', 1, '4345253645', '5623958444', '6264913589'),
(100, 'Mack Kincey', 'Giff', '795-40-2450', '536-84-7192', '628-18-7931', '503-02-1833', 'P', 'Fort Smith', '2019-07-23', '6631 Crest Line Drive', 'Hill', 'Junction', 'Daytona Beach', 'Arkansas', '72905', 'Kristen', 'Mack Dowsett', 'Electrical Engineer', '$8.39', 'Mack', 'VP Product Management', '$4.81', 'Mack Larn', 'Sales Associate', '$2.95', NULL, '2019-06-10', 1, '4796018766', '3864621502', '8084135230'),
(101, 'Templeton Discombe', 'Benedicto', '123-22-9896', '592-45-7333', '606-29-7912', '316-21-4823', 'P', 'Houston', '2019-09-29', '2434 Crownhardt Drive', 'Hill', 'Road', 'Arlington', 'Texas', '77223', 'Kristen', 'Templeton Canelas', 'Administrative Officer', '$5.20', 'Templeton', 'Registered Nurse', '$7.84', 'Templeton McClounan', 'Tax Accountant', '$5.69', NULL, '2019-06-13', 1, '7131520777', '5717381054', '2021713321'),
(102, 'Rubin Haitlie', 'Pavlov', '284-02-2851', '340-92-3361', '105-50-1605', '881-87-9566', 'P', 'Charlotte', '2019-02-12', '9 Browning Road', 'Hill', 'Plaza', 'Asheville', 'North Carolina', '28225', 'Islam', 'Rubin Cabena', 'Human Resources Manager', '$9.79', 'Rubin', 'Human Resources Manager', '$5.29', 'Rubin Tuddenham', 'Computer Systems Analyst II', '$1.96', NULL, '2019-09-21', 1, '7048225701', '8285398734', '7062972726'),
(103, 'Eldridge Siemon', 'Emery', '179-55-5141', '173-70-8722', '810-42-0721', '331-93-1170', 'P', 'Evansville', '2019-05-30', '664 Golf Avenue', 'Junction', 'Pass', 'Naples', 'Indiana', '47705', 'Hindu', 'Eldridge Dorber', 'Assistant Media Planner', '$5.34', 'Eldridge', 'Environmental Specialist', '$1.89', 'Eldridge Lisciandri', 'Associate Professor', '$2.51', NULL, '2019-03-21', 1, '8124402537', '2392789998', '3144494944'),
(104, 'Mar Lincke', 'Leigh', '448-05-2052', '160-69-2745', '736-66-7010', '646-60-8439', 'P', 'Roanoke', '2019-06-04', '4070 Harbort Lane', 'Way', 'Center', 'Springfield', 'Virginia', '24040', 'Hindu', 'Mar Danat', 'Nurse Practicioner', '$5.49', 'Mar', 'Recruiter', '$4.37', 'Mar Coucher', 'Software Engineer IV', '$1.17', NULL, '2019-07-28', 1, '5405115207', '2171253156', '6514771509'),
(105, 'Barnabas McNabb', 'Tobiah', '150-37-7293', '771-28-8082', '231-58-3022', '533-84-7803', 'P', 'San Jose', '2019-05-04', '357 Hayes Way', 'Lane', 'Circle', 'Santa Monica', 'California', '95108', 'Konghuchu', 'Barnabas Rowter', 'Developer I', '$2.70', 'Barnabas', 'Assistant Manager', '$6.43', 'Barnabas Aucutt', 'Mechanical Systems Engineer', '$5.24', NULL, '2019-06-24', 1, '4083537959', '3109389804', '6015608025'),
(106, 'Hieronymus Antonsson', 'Clarence', '310-30-3597', '584-02-5082', '465-98-6870', '842-91-3189', 'L', 'Spartanburg', '2019-03-31', '13025 Kedzie Place', 'Parkway', 'Plaza', 'Kansas City', 'South Carolina', '29305', 'Katholik', 'Hieronymus Veall', 'VP Sales', '$8.89', 'Hieronymus', 'Junior Executive', '$6.89', 'Hieronymus Lind', 'Biostatistician II', '$8.33', NULL, '2018-12-16', 1, '8645743071', '8167984020', '9132174471'),
(107, 'Brendin Goodier', 'Noel', '671-15-8850', '335-71-3409', '369-28-0370', '600-58-1153', 'P', 'Fort Worth', '2019-04-21', '2139 Iowa Center', 'Court', 'Plaza', 'Cincinnati', 'Texas', '76178', 'Kristen', 'Brendin Mothersdale', 'Nuclear Power Engineer', '$8.38', 'Brendin', 'VP Sales', '$0.56', 'Brendin Jamblin', 'Civil Engineer', '$2.40', NULL, '2019-07-18', 1, '6827640915', '5131345812', '7205276127'),
(108, 'Harland Spratt', 'Nobie', '337-93-7893', '291-87-9815', '221-74-1102', '851-47-0764', 'L', 'Fort Worth', '2019-02-04', '54 Buell Pass', 'Point', 'Street', 'Dallas', 'Texas', '76129', 'Budha', 'Harland Marini', 'Financial Advisor', '$6.22', 'Harland', 'Marketing Manager', '$6.39', 'Harland Girdlestone', 'Staff Scientist', '$6.41', NULL, '2019-10-02', 1, '8171086495', '4698496018', '7575851734'),
(109, 'Ely Iliff', 'Lance', '665-17-4473', '637-83-7282', '382-44-0609', '435-62-6153', 'L', 'Cleveland', '2019-02-04', '68 Ludington Park', 'Place', 'Street', 'Evansville', 'Ohio', '44111', 'Katholik', 'Ely Ingold', 'Research Assistant II', '$8.02', 'Ely', 'VP Marketing', '$8.76', 'Ely Magrane', 'Recruiting Manager', '$7.15', NULL, '2019-01-16', 1, '2168934850', '8121829327', '5613933817'),
(110, 'Vincenty Tiner', 'Alexandre', '876-14-4959', '650-73-2574', '881-61-8924', '871-88-5063', 'P', 'El Paso', '2018-11-07', '66473 Quincy Parkway', 'Drive', 'Park', 'Columbus', 'Texas', '88530', 'Hindu', 'Vincenty Patrickson', 'Financial Advisor', '$6.80', 'Vincenty', 'Electrical Engineer', '$5.07', 'Vincenty Poe', 'Social Worker', '$0.66', NULL, '2019-05-29', 1, '9154045035', '6148754360', '3108692820'),
(111, 'Alexio Joisce', 'Rees', '431-49-8455', '250-47-8480', '814-88-5921', '805-39-7730', 'P', 'Tulsa', '2018-12-08', '5 Esch Point', 'Pass', 'Park', 'Detroit', 'Oklahoma', '74141', 'Katholik', 'Alexio Dykins', 'Librarian', '$4.47', 'Alexio', 'Clinical Specialist', '$5.72', 'Alexio Legrand', 'Sales Associate', '$1.46', NULL, '2019-10-05', 1, '9189830753', '3133415375', '6145451614'),
(112, 'Nikolas Perris', 'Rem', '158-80-0681', '743-30-2330', '428-51-6217', '643-92-6193', 'L', 'Philadelphia', '2019-03-13', '9 Jay Pass', 'Way', 'Terrace', 'Birmingham', 'Pennsylvania', '19196', 'Katholik', 'Nikolas Freer', 'Payment Adjustment Coordinator', '$6.95', 'Nikolas', 'Sales Associate', '$2.84', 'Nikolas Derdes', 'VP Quality Control', '$2.46', NULL, '2019-04-07', 1, '2157933407', '2053189961', '2149603481'),
(113, 'Erick Hindenburg', 'Cobbie', '470-14-6367', '720-54-0035', '135-52-5117', '532-30-1736', 'L', 'Houston', '2019-05-30', '002 Darwin Point', 'Circle', 'Way', 'Saint Cloud', 'Texas', '77045', 'Kristen', 'Erick Tomczynski', 'Compensation Analyst', '$4.67', 'Erick', 'Structural Engineer', '$2.76', 'Erick Siene', 'Pharmacist', '$2.61', NULL, '2019-01-22', 1, '2811947037', '3207389927', '7026772625'),
(114, 'Valentijn Gisby', 'Pablo', '800-21-3706', '898-83-7581', '838-77-8144', '174-28-8460', 'L', 'Kansas City', '2019-03-24', '4683 Mandrake Trail', 'Way', 'Street', 'Tallahassee', 'Missouri', '64125', 'Hindu', 'Valentijn Kentish', 'Information Systems Manager', '$9.28', 'Valentijn', 'Marketing Manager', '$3.02', 'Valentijn McKimmie', 'Database Administrator IV', '$9.24', NULL, '2019-08-01', 1, '8168702686', '8505090799', '3177219786'),
(115, 'Upton Keets', 'Parker', '587-43-1866', '338-35-6611', '356-31-2354', '389-74-4057', 'L', 'Punta Gorda', '2018-12-09', '49800 Union Alley', 'Trail', 'Pass', 'Independence', 'Florida', '33982', 'Hindu', 'Upton Orrill', 'VP Marketing', '$9.59', 'Upton', 'Account Executive', '$9.70', 'Upton Boorman', 'VP Quality Control', '$8.87', NULL, '2019-05-11', 1, '9416105522', '8166194676', '7241709371'),
(116, 'Elvis Greeves', 'Ulysses', '219-66-9465', '257-25-6307', '438-12-9454', '270-68-9334', 'P', 'Scottsdale', '2018-12-04', '2 Hanover Junction', 'Hill', 'Hill', 'Anchorage', 'Arizona', '85255', 'Islam', 'Elvis Kirkebye', 'Director of Sales', '$4.25', 'Elvis', 'Staff Accountant II', '$3.68', 'Elvis Keighly', 'Nurse Practicioner', '$5.29', NULL, '2018-12-09', 1, '6024589887', '9076334242', '5035273715'),
(117, 'Samuel Vaillant', 'Ezra', '417-60-1941', '350-43-3680', '476-12-6264', '770-94-0817', 'P', 'Pittsburgh', '2019-02-09', '11 Loftsgordon Trail', 'Court', 'Junction', 'Nashville', 'Pennsylvania', '15274', 'Islam', 'Samuel Waliszewski', 'Dental Hygienist', '$3.30', 'Samuel', 'Social Worker', '$2.53', 'Samuel Markushkin', 'Human Resources Assistant II', '$2.83', NULL, '2019-01-13', 1, '4122728489', '6157526805', '5038776942'),
(118, 'Stanford Dalgarno', 'Lalo', '516-35-5245', '242-66-4412', '274-47-2765', '724-64-4479', 'P', 'White Plains', '2019-02-23', '89431 Morningstar Pass', 'Circle', 'Circle', 'Johnstown', 'New York', '10606', 'Budha', 'Stanford Varnam', 'Occupational Therapist', '$3.35', 'Stanford', 'Speech Pathologist', '$2.83', 'Stanford Jobbing', 'VP Quality Control', '$1.35', NULL, '2019-09-25', 1, '9149094976', '8144265649', '4083005689'),
(119, 'Adriano Luckwell', 'Menard', '710-16-1909', '678-81-8146', '788-65-3553', '558-28-6895', 'L', 'Seattle', '2018-12-08', '20 Straubel Trail', 'Drive', 'Point', 'Dayton', 'Washington', '98133', 'Katholik', 'Adriano Kohrs', 'Junior Executive', '$4.94', 'Adriano', 'Sales Associate', '$6.63', 'Adriano Dyson', 'Budget/Accounting Analyst I', '$3.39', NULL, '2019-04-21', 1, '4257859726', '9375359442', '9164490270'),
(120, 'Gene Raper', 'Judah', '313-32-3831', '747-01-3221', '669-45-9680', '356-67-4756', 'L', 'Seattle', '2019-09-08', '171 Cordelia Center', 'Way', 'Point', 'Garland', 'Washington', '98133', 'Konghuchu', 'Gene Spinige', 'Database Administrator III', '$4.35', 'Gene', 'Analog Circuit Design manager', '$4.50', 'Gene Ranyard', 'Marketing Assistant', '$3.13', NULL, '2019-01-20', 1, '4258721009', '2145368112', '4198016907'),
(121, 'Constantin MacFadden', 'Lothaire', '224-47-0800', '703-60-6179', '536-60-4601', '249-87-6549', 'P', 'Scranton', '2019-06-17', '6 High Crossing Hill', 'Center', 'Way', 'Clearwater', 'Pennsylvania', '18505', 'Islam', 'Constantin Mandre', 'Project Manager', '$0.81', 'Constantin', 'Product Engineer', '$9.32', 'Constantin Sparshott', 'Computer Systems Analyst III', '$9.84', NULL, '2019-03-11', 1, '5703698227', '7274935526', '6265167408'),
(122, 'Allister Buttel', 'Nappy', '727-93-3319', '602-30-3487', '187-84-2924', '854-07-1980', 'P', 'Tyler', '2019-02-01', '0 Del Sol Terrace', 'Plaza', 'Avenue', 'Atlanta', 'Texas', '75705', 'Islam', 'Allister Houseago', 'Occupational Therapist', '$2.72', 'Allister', 'Tax Accountant', '$0.11', 'Allister Hudel', 'Recruiter', '$8.30', NULL, '2019-07-24', 1, '9038309972', '4042044923', '8056560405');
INSERT INTO `siswa` (`id`, `nama_lengkap`, `nama_panggilan`, `nis`, `nisn`, `nik`, `nikk`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kelurahan`, `kecamatan`, `kota_kab`, `provinsi`, `kode_pos`, `agama`, `ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `wali`, `pekerjaan_wali`, `penghasilan_wali`, `foto`, `tanggal_masuk`, `aktif`, `telp_siswa`, `telp_ayah`, `telp_ibu`) VALUES
(123, 'Corbet Ewbank', 'Weber', '671-93-8540', '863-26-4984', '312-78-5719', '776-03-2488', 'P', 'Jamaica', '2019-02-26', '69337 Old Shore Court', 'Pass', 'Alley', 'Laurel', 'New York', '11436', 'Budha', 'Corbet Enstone', 'Quality Engineer', '$3.10', 'Corbet', 'Account Coordinator', '$8.31', 'Corbet Espina', 'Speech Pathologist', '$3.63', NULL, '2019-10-09', 1, '7188066461', '2022234462', '2083310734'),
(124, 'Caesar Summergill', 'Lemuel', '304-15-9397', '302-10-1765', '575-65-9638', '287-87-7184', 'L', 'Cincinnati', '2019-06-23', '63 6th Junction', 'Alley', 'Crossing', 'Johnson City', 'Ohio', '45243', 'Hindu', 'Caesar Pleager', 'Registered Nurse', '$0.62', 'Caesar', 'Automation Specialist II', '$4.89', 'Caesar Friend', 'Business Systems Development Analyst', '$4.98', NULL, '2019-01-10', 1, '5131514074', '4233702726', '2544686645'),
(125, 'Lannie Jamme', 'Padriac', '605-43-0711', '162-70-6014', '701-64-6581', '267-42-1001', 'P', 'Tampa', '2019-09-24', '77352 Cody Point', 'Trail', 'Trail', 'Fresno', 'Florida', '33680', 'Budha', 'Lannie Mailey', 'Staff Scientist', '$3.29', 'Lannie', 'Sales Representative', '$0.40', 'Lannie Gillfillan', 'Safety Technician III', '$5.52', NULL, '2019-10-24', 1, '8135704741', '2096113529', '7138299908'),
(126, 'Goober Bront', 'Arvy', '848-98-4460', '298-32-5054', '115-21-3939', '707-76-0584', 'P', 'Spokane', '2019-06-25', '353 Mockingbird Hill', 'Plaza', 'Hill', 'Oklahoma City', 'Washington', '99215', 'Konghuchu', 'Goober Royse', 'Librarian', '$2.27', 'Goober', 'GIS Technical Architect', '$0.53', 'Goober Kelston', 'GIS Technical Architect', '$8.99', NULL, '2019-01-02', 1, '5099515212', '4058017142', '5307488961'),
(127, 'Alard Jankiewicz', 'Buck', '417-95-7078', '580-76-7587', '103-39-0699', '485-44-4494', 'P', 'Huntington', '2018-12-01', '45031 Lakewood Gardens Avenue', 'Hill', 'Lane', 'Pomona', 'West Virginia', '25775', 'Konghuchu', 'Alard Heed', 'Environmental Specialist', '$7.14', 'Alard', 'Dental Hygienist', '$4.49', 'Alard Kilgallon', 'Payment Adjustment Coordinator', '$0.71', NULL, '2019-10-02', 1, '3046954354', '9091355732', '7183397213'),
(128, 'Moore Duplock', 'Delaney', '207-91-1698', '413-18-8148', '492-95-3997', '467-70-6558', 'L', 'Lubbock', '2018-11-28', '313 Doe Crossing Terrace', 'Way', 'Pass', 'Cincinnati', 'Texas', '79410', 'Budha', 'Moore Torfin', 'Paralegal', '$7.75', 'Moore', 'Programmer IV', '$4.59', 'Moore Probey', 'Biostatistician II', '$3.32', NULL, '2018-12-11', 1, '8063103623', '5132803706', '2027779295'),
(129, 'Consalve Lindell', 'Dael', '244-71-9823', '114-58-2202', '297-70-3783', '221-95-5819', 'L', 'Detroit', '2018-11-11', '446 Warbler Court', 'Plaza', 'Parkway', 'Rochester', 'Michigan', '48295', 'Konghuchu', 'Consalve Pitceathly', 'Sales Associate', '$8.96', 'Consalve', 'Marketing Manager', '$6.82', 'Consalve Jollye', 'Research Assistant IV', '$1.85', NULL, '2019-05-02', 1, '3139382331', '3155203946', '4175701456'),
(130, 'Adamo Cuningham', 'Ogden', '548-54-0998', '221-60-7752', '800-88-9634', '712-81-7599', 'P', 'Pasadena', '2019-02-03', '5845 Banding Way', 'Place', 'Junction', 'Longview', 'California', '91186', 'Hindu', 'Adamo Kleimt', 'Budget/Accounting Analyst IV', '$6.00', 'Adamo', 'Statistician III', '$9.67', 'Adamo Rhodes', 'Administrative Officer', '$4.23', '', '2019-01-06', 1, '6266109830', '9038663075', '9106710822'),
(131, 'Ellwood Josskovitz', 'Ty', '832-19-7515', '121-24-3239', '876-32-5848', '645-44-8164', 'P', 'Arlington', '2019-08-01', '895 Eastwood Pass', 'Avenue', 'Pass', 'Miami Beach', 'Virginia', '22217', 'Kristen', 'Ellwood Grassin', 'Director of Sales', '$4.37', 'Ellwood', 'Sales Representative', '$2.52', 'Ellwood Paling', 'Technical Writer', '$2.90', NULL, '2019-07-20', 1, '5719793846', '3053793717', '8593894284'),
(132, 'Thatcher Gorini', 'Hillier', '527-58-7911', '770-04-2354', '425-08-7037', '538-17-0091', 'P', 'Dallas', '2019-09-21', '36 New Castle Hill', 'Center', 'Terrace', 'Tampa', 'Texas', '75392', 'Budha', 'Thatcher Earthfield', 'Health Coach IV', '$2.66', 'Thatcher', 'Geologist III', '$0.44', 'Thatcher Rickets', 'Developer II', '$3.47', NULL, '2019-08-14', 1, '2144599750', '8132866176', '3218796964'),
(133, 'Ferrell Posselow', 'Cornelius', '679-80-0976', '274-76-1095', '320-34-4733', '748-27-8435', 'P', 'Carson City', '2019-01-02', '09 Havey Court', 'Parkway', 'Road', 'Arlington', 'Nevada', '89706', 'Kristen', 'Ferrell Peppett', 'Payment Adjustment Coordinator', '$2.06', 'Ferrell', 'Cost Accountant', '$2.03', 'Ferrell Rosendorf', 'Web Developer III', '$0.97', NULL, '2019-07-14', 1, '7753759504', '9722621232', '6086671878'),
(134, 'Kinny Alfonsetto', 'Cosme', '152-53-4734', '715-41-4649', '756-78-6869', '677-90-6183', 'P', 'Fullerton', '2019-09-10', '439 Becker Avenue', 'Park', 'Place', 'Albany', 'California', '92835', 'Katholik', 'Kinny Jaggs', 'Recruiter', '$4.01', 'Kinny', 'Software Test Engineer III', '$6.00', 'Kinny Jakeway', 'Automation Specialist II', '$4.05', NULL, '2019-01-09', 1, '7149856308', '5189817547', '4051584419'),
(135, 'Yehudit Bamlett', 'Benn', '570-44-5882', '708-28-2365', '818-36-6632', '232-04-2372', 'L', 'Fort Lauderdale', '2019-07-26', '0393 Independence Drive', 'Street', 'Avenue', 'Saint Louis', 'Florida', '33355', 'Kristen', 'Yehudit Bazley', 'Database Administrator II', '$2.01', 'Yehudit', 'Geological Engineer', '$8.69', 'Yehudit Kingshott', 'Web Developer IV', '$3.65', NULL, '2019-02-04', 1, '7541140258', '3149148115', '2058361640'),
(136, 'Jourdain Harroway', 'Reagen', '649-15-2385', '511-96-5904', '728-05-0697', '268-60-1376', 'P', 'Hicksville', '2019-03-14', '03625 Manley Plaza', 'Court', 'Lane', 'Charlotte', 'New York', '11854', 'Budha', 'Jourdain Platts', 'Civil Engineer', '$4.12', 'Jourdain', 'Software Consultant', '$7.21', 'Jourdain Renehan', 'Senior Developer', '$7.92', NULL, '2019-10-29', 1, '5167924310', '7043723015', '4049586015'),
(137, 'Herby Matkovic', 'Sheppard', '527-84-2361', '735-78-5616', '135-92-8824', '499-74-5816', 'L', 'Indianapolis', '2018-12-18', '846 Messerschmidt Way', 'Drive', 'Hill', 'Richmond', 'Indiana', '46207', 'Budha', 'Herby Schimmang', 'Chemical Engineer', '$3.46', 'Herby', 'Marketing Assistant', '$2.69', 'Herby Gajewski', 'VP Quality Control', '$8.10', NULL, '2019-07-10', 1, '3174832460', '8042110470', '2023399054'),
(138, 'Erl Eidelman', 'Rolf', '442-93-6741', '513-77-5467', '498-36-8077', '278-97-4353', 'L', 'Florence', '2018-12-30', '265 Macpherson Terrace', 'Park', 'Road', 'Saint Petersburg', 'South Carolina', '29505', 'Kristen', 'Erl Synke', 'Accounting Assistant IV', '$4.26', 'Erl', 'Tax Accountant', '$6.27', 'Erl Halsey', 'Junior Executive', '$8.25', NULL, '2018-11-27', 1, '8438947166', '7276415453', '4055232942'),
(139, 'Walsh Le Provost', 'Efren', '256-93-2801', '251-05-2089', '787-99-3588', '178-54-8471', 'P', 'Montgomery', '2019-04-28', '79026 Hollow Ridge Court', 'Point', 'Crossing', 'Colorado Springs', 'Alabama', '36125', 'Hindu', 'Walsh Kaye', 'VP Sales', '$6.89', 'Walsh', 'Programmer II', '$4.73', 'Walsh Philot', 'Electrical Engineer', '$3.55', NULL, '2019-06-10', 1, '3349372753', '7192818892', '9017688684'),
(140, 'Silvan Huortic', 'Onfroi', '464-51-6300', '762-31-5812', '345-34-7361', '257-58-1699', 'L', 'Duluth', '2019-07-24', '03793 Weeping Birch Pass', 'Place', 'Avenue', 'Madison', 'Georgia', '30096', 'Hindu', 'Silvan Castillo', 'Occupational Therapist', '$7.77', 'Silvan', 'Senior Financial Analyst', '$0.85', 'Silvan Leitche', 'Automation Specialist II', '$9.57', NULL, '2019-02-18', 1, '6781535195', '6081198298', '8081123941'),
(141, 'Inness Glastonbury', 'Paul', '812-44-0014', '764-46-0205', '505-05-1624', '198-13-5843', 'P', 'Bronx', '2019-03-26', '960 Schiller Court', 'Way', 'Junction', 'Huntington', 'New York', '10469', 'Islam', 'Inness May', 'Tax Accountant', '$1.15', 'Inness', 'GIS Technical Architect', '$0.63', 'Inness Martijn', 'Senior Developer', '$3.97', NULL, '2019-03-01', 1, '3471650570', '3049245084', '5122068171'),
(142, 'Mattias Maxweell', 'Chrotoem', '196-09-4277', '581-05-1549', '535-01-1753', '611-68-5339', 'P', 'Miami', '2019-07-16', '4771 Sommers Trail', 'Point', 'Parkway', 'Houston', 'Florida', '33134', 'Islam', 'Mattias Fairtlough', 'Actuary', '$4.85', 'Mattias', 'Developer II', '$2.71', 'Mattias Dhennin', 'Research Assistant III', '$5.02', NULL, '2018-11-12', 1, '7869293929', '7139816178', '7272291004'),
(143, 'Jodi Spring', 'Culver', '258-25-9715', '273-98-3352', '423-32-4688', '142-35-6397', 'L', 'Springfield', '2019-01-05', '07905 Ridgeway Alley', 'Road', 'Hill', 'Albuquerque', 'Illinois', '62764', 'Katholik', 'Jodi Malim', 'Paralegal', '$9.34', 'Jodi', 'Cost Accountant', '$4.70', 'Jodi Kinrade', 'Recruiter', '$9.97', NULL, '2019-05-08', 1, '2171554612', '5053765271', '3611497477'),
(144, 'Olav Schulze', 'Abelard', '883-05-4421', '261-04-4501', '675-08-1249', '242-03-2821', 'L', 'Atlanta', '2018-11-14', '9 Oneill Trail', 'Court', 'Court', 'Saint Cloud', 'Georgia', '30386', 'Katholik', 'Olav Bercher', 'Food Chemist', '$9.30', 'Olav', 'Quality Engineer', '$3.04', 'Olav Peniello', 'Chief Design Engineer', '$1.83', NULL, '2018-12-30', 1, '4042573970', '3205186232', '9373916939'),
(145, 'Alfred Hairsine', 'Aubert', '562-26-2002', '539-18-8647', '543-38-5375', '393-03-9830', 'L', 'Las Vegas', '2019-03-27', '3002 Fairfield Court', 'Drive', 'Park', 'San Francisco', 'Nevada', '89125', 'Islam', 'Alfred Frederick', 'Account Representative I', '$5.08', 'Alfred', 'Programmer I', '$9.27', 'Alfred Ruddle', 'Cost Accountant', '$9.68', NULL, '2019-09-17', 1, '7025286766', '4156546906', '2025229182'),
(146, 'Lamond Saint', 'Beau', '287-03-2466', '710-33-4855', '433-36-6555', '546-31-1197', 'L', 'San Rafael', '2018-11-25', '41 4th Court', 'Plaza', 'Center', 'Memphis', 'California', '94913', 'Islam', 'Lamond Terris', 'Budget/Accounting Analyst I', '$6.06', 'Lamond', 'Programmer IV', '$2.19', 'Lamond Oldaker', 'Paralegal', '$2.89', NULL, '2019-06-16', 1, '4158150996', '9018422675', '5176544041'),
(147, 'Lawry Klebes', 'Henrik', '721-09-3476', '780-01-4176', '522-34-8942', '385-18-6507', 'P', 'Bakersfield', '2019-03-25', '1 Sutteridge Place', 'Circle', 'Crossing', 'Rochester', 'California', '93399', 'Konghuchu', 'Lawry Northern', 'Statistician III', '$3.45', 'Lawry', 'Administrative Officer', '$9.87', 'Lawry Danzey', 'Data Coordiator', '$0.19', NULL, '2018-11-06', 1, '6612583168', '5858302620', '8171398871'),
(148, 'Hugibert Sawart', 'Christian', '471-47-2968', '125-42-7695', '149-65-6775', '661-39-9709', 'P', 'Los Angeles', '2019-03-17', '6 Mockingbird Avenue', 'Crossing', 'Alley', 'Boston', 'California', '90087', 'Islam', 'Hugibert Ivasyushkin', 'Senior Developer', '$4.62', 'Hugibert', 'Civil Engineer', '$6.72', 'Hugibert Smallridge', 'Project Manager', '$7.25', NULL, '2019-07-28', 1, '2132926504', '6176646112', '3044725931'),
(149, 'Gaven Marfell', 'Iorgo', '423-86-2201', '738-37-4185', '822-87-2902', '700-51-6944', 'L', 'Toledo', '2019-02-28', '46633 Marquette Road', 'Pass', 'Terrace', 'Hialeah', 'Ohio', '43605', 'Budha', 'Gaven Di Ruggero', 'Physical Therapy Assistant', '$9.86', 'Gaven', 'Structural Engineer', '$6.00', 'Gaven Mathwin', 'Environmental Tech', '$7.04', NULL, '2019-02-15', 1, '4196161385', '7861063643', '6191906430'),
(150, 'Yard Brien', 'Jimmie', '688-88-0678', '240-62-5877', '693-06-7147', '496-64-7647', 'P', 'San Antonio', '2019-07-01', '95 Bultman Pass', 'Junction', 'Point', 'Miami', 'Texas', '78240', 'Katholik', 'Yard Auston', 'Staff Scientist', '$9.86', 'Yard', 'Paralegal', '$3.68', 'Yard Barlthrop', 'Senior Financial Analyst', '$5.04', NULL, '2018-12-04', 1, '2101482344', '3058986667', '7603396446'),
(151, 'Raymond Trahearn', 'Alfred', '680-91-8617', '168-46-2539', '553-29-1116', '505-35-2580', 'L', 'Merrifield', '2019-01-24', '3622 Springs Court', 'Hill', 'Avenue', 'Allentown', 'Virginia', '22119', 'Islam', 'Raymond Snell', 'Structural Engineer', '$1.60', 'Raymond', 'Design Engineer', '$5.38', 'Raymond Miche', 'Structural Engineer', '$9.57', NULL, '2019-01-27', 1, '5717724261', '6102496487', '9497125558'),
(152, 'Donal Saundercock', 'Yardley', '671-82-6386', '660-28-6439', '418-73-7510', '237-72-2294', 'P', 'Birmingham', '2019-05-21', '61057 Nevada Junction', 'Hill', 'Road', 'Sioux Falls', 'Alabama', '35279', 'Islam', 'Donal Jervoise', 'Executive Secretary', '$6.20', 'Donal', 'Administrative Assistant IV', '$9.98', 'Donal Davidowsky', 'Editor', '$8.14', NULL, '2019-04-07', 1, '2054023740', '6059916517', '7208640169'),
(153, 'Bondy Aslott', 'Shelby', '578-10-2917', '534-78-1325', '589-96-9193', '219-14-9210', 'P', 'Pittsburgh', '2019-08-17', '90400 Brickson Park Court', 'Crossing', 'Terrace', 'San Jose', 'Pennsylvania', '15210', 'Katholik', 'Bondy Forth', 'Occupational Therapist', '$3.39', 'Bondy', 'Professor', '$9.65', 'Bondy Drummond', 'Paralegal', '$2.38', NULL, '2019-06-25', 1, '4124281479', '4081596782', '2407375206'),
(154, 'Dieter Crackel', 'Leif', '402-75-3967', '445-16-5922', '660-53-3911', '703-72-3233', 'L', 'Pensacola', '2019-10-23', '59122 Pond Avenue', 'Road', 'Way', 'North Little Rock', 'Florida', '32526', 'Hindu', 'Dieter Gerardot', 'Programmer II', '$8.42', 'Dieter', 'VP Marketing', '$0.30', 'Dieter Akers', 'Staff Scientist', '$5.24', NULL, '2019-01-05', 1, '8506900358', '5016617211', '9406159153'),
(155, 'Pierson Strowger', 'Clim', '341-58-8033', '454-05-4773', '131-32-6113', '136-01-7650', 'L', 'Hampton', '2019-03-10', '0 Loftsgordon Crossing', 'Lane', 'Park', 'Erie', 'Virginia', '23668', 'Hindu', 'Pierson Rois', 'Recruiter', '$4.61', 'Pierson', 'GIS Technical Architect', '$0.28', 'Pierson Milton-White', 'GIS Technical Architect', '$1.49', NULL, '2019-03-11', 1, '7575933289', '8146285725', '3123164879'),
(156, 'Terrill Patrick', 'Delano', '365-68-5470', '138-62-6533', '845-17-5798', '418-52-0884', 'P', 'Corpus Christi', '2019-07-19', '2199 Scott Road', 'Crossing', 'Parkway', 'Santa Monica', 'Texas', '78415', 'Budha', 'Terrill Firbank', 'Research Assistant IV', '$0.57', 'Terrill', 'Senior Financial Analyst', '$7.19', 'Terrill Kirrage', 'Legal Assistant', '$4.93', NULL, '2019-06-19', 1, '3611072469', '8182671254', '7869236245'),
(157, 'Clarence Jimes', 'Karim', '143-13-6183', '242-84-3377', '549-75-9249', '748-35-2610', 'L', 'Wilmington', '2019-03-20', '13 Emmet Park', 'Trail', 'Hill', 'Pomona', 'North Carolina', '28410', 'Budha', 'Clarence McGinn', 'Recruiter', '$7.34', 'Clarence', 'Quality Engineer', '$7.11', 'Clarence Ondra', 'Payment Adjustment Coordinator', '$7.96', NULL, '2019-08-01', 1, '9109726899', '9099027579', '2092746028'),
(158, 'Alister Purselowe', 'Orran', '551-75-4446', '769-30-0532', '565-16-1224', '382-57-0367', 'P', 'Houston', '2019-03-06', '31120 Farragut Way', 'Lane', 'Pass', 'Houston', 'Texas', '77250', 'Konghuchu', 'Alister Searby', 'Health Coach III', '$7.44', 'Alister', 'Computer Systems Analyst III', '$3.38', 'Alister Toleman', 'Senior Cost Accountant', '$2.19', NULL, '2019-05-04', 1, '7132334893', '7131738637', '9544160771'),
(159, 'Raymond Jarad', 'Edwin', '294-65-8268', '414-23-4223', '562-17-3038', '532-45-9120', 'L', 'Shreveport', '2018-12-15', '96027 Hallows Place', 'Plaza', 'Place', 'Inglewood', 'Louisiana', '71115', 'Katholik', 'Raymond Fardell', 'Civil Engineer', '$0.51', 'Raymond', 'Technical Writer', '$4.39', 'Raymond Treharne', 'Compensation Analyst', '$2.72', NULL, '2019-06-06', 1, '3183474649', '3101649356', '8647403638'),
(160, 'Maurice McKiddin', 'Rudolph', '405-38-5652', '653-20-6372', '771-63-8779', '615-63-4788', 'L', 'Newark', '2019-08-29', '3331 Crowley Park', 'Way', 'Drive', 'West Palm Beach', 'Delaware', '19714', 'Islam', 'Maurice Stilgo', 'Systems Administrator III', '$0.73', 'Maurice', 'Programmer Analyst IV', '$6.11', 'Maurice Thorns', 'Biostatistician I', '$6.61', NULL, '2019-04-21', 1, '3026798909', '5614357511', '5744222276'),
(161, 'Ambros Sweatland', 'Tim', '108-66-2701', '517-42-9349', '791-46-2520', '629-56-0416', 'L', 'Omaha', '2018-11-28', '5305 Sloan Terrace', 'Terrace', 'Street', 'Minneapolis', 'Nebraska', '68117', 'Hindu', 'Ambros Petrenko', 'Software Consultant', '$3.51', 'Ambros', 'Compensation Analyst', '$5.70', 'Ambros Volante', 'Environmental Tech', '$2.51', NULL, '2019-05-24', 1, '4027140841', '6122754212', '7194197163'),
(162, 'Rodd Kivits', 'Charlie', '857-40-5686', '600-92-8868', '637-69-4525', '691-49-1178', 'P', 'Washington', '2019-03-14', '37 Forest Run Park', 'Court', 'Park', 'Washington', 'District of Columbia', '20580', 'Kristen', 'Rodd Tracey', 'Assistant Media Planner', '$7.90', 'Rodd', 'Statistician IV', '$6.71', 'Rodd Maslen', 'Information Systems Manager', '$2.70', NULL, '2018-11-11', 1, '2023413722', '2027604391', '3189454562'),
(163, 'Matthaeus Hadwin', 'Skipton', '477-33-6222', '516-26-9406', '854-54-8020', '844-89-3203', 'P', 'Amarillo', '2019-09-17', '40868 High Crossing Center', 'Park', 'Alley', 'Muncie', 'Texas', '79116', 'Katholik', 'Matthaeus Kennea', 'Assistant Media Planner', '$6.56', 'Matthaeus', 'Help Desk Technician', '$8.19', 'Matthaeus Danzig', 'Senior Sales Associate', '$4.33', NULL, '2019-06-14', 1, '8064987033', '7655099689', '5418473400'),
(164, 'Jamison Kopecka', 'Rupert', '716-02-8040', '420-17-2507', '519-95-1319', '485-89-4227', 'P', 'Columbia', '2019-10-09', '095 West Alley', 'Trail', 'Court', 'San Jose', 'Missouri', '65211', 'Hindu', 'Jamison Bickle', 'Senior Developer', '$0.86', 'Jamison', 'Actuary', '$9.16', 'Jamison Spaduzza', 'Actuary', '$9.83', NULL, '2019-10-04', 1, '5733870755', '4086847645', '2163338090'),
(165, 'Saxe Learmont', 'Shae', '622-31-6417', '254-44-0954', '402-28-8532', '315-68-0344', 'P', 'San Diego', '2018-11-28', '7794 Bultman Avenue', 'Terrace', 'Trail', 'Mobile', 'California', '92132', 'Hindu', 'Saxe Bignold', 'Senior Editor', '$2.66', 'Saxe', 'Web Developer IV', '$7.65', 'Saxe Maccaig', 'Teacher', '$3.81', NULL, '2019-01-12', 1, '8581585447', '2511935532', '6629677223');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id` int(255) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `id_kepsek` int(255) DEFAULT NULL,
  `tanggal_rapor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id`, `tahun`, `semester`, `id_kepsek`, `tanggal_rapor`) VALUES
(1, '2019', 'ganjil', 154, '1'),
(2, '2020', 'genap', 152, '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$LDGmMnMv/vfhEGd/lVssTuEjTNccQH.QLYYSKHgPg..6sycG9azFu', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1586118862, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(9, '::1', 'achartman22@guardian.co.uk', '$2y$10$omkTHm/xovhxQbH7BlZKXuOel5ZnjdkwMUpr8SUxVc92P25/rW5/2', 'achartman22@guardian.co.uk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582721880, 1586379911, 1, 'Abra', 'Chartman', NULL, '8385959502'),
(10, '::1', 'ababcock3x@hc360.com', '$2y$10$nc2uZpn0lFRDsHKZh10B8er96I1iYpbqlrBitqPudgRkM4dLlol02', 'ababcock3x@hc360.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582722180, 1582813816, 1, 'Adelaide', 'Babcock', NULL, '3079067532'),
(11, '::1', 'abrantzend@goodreads.com', '$2y$10$T9h5yWVlcnAnq9LJHsgMuuJGlfRCHHfsxpHi2zR3lh92KNDYT/FBe', 'abrantzend@goodreads.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582722180, NULL, 1, 'Adoree', 'Brantzen', NULL, '2556755890'),
(12, '::1', 'avan2j@technorati.com', '$2y$10$34esYJswErJNxyVQvb/hgOg3SM7h22lIGmYpdIv3b1olJruEKOw3m', 'avan2j@technorati.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582722240, NULL, 1, 'Adrianne Van', 'Waadenburg', NULL, '3769254926'),
(13, '::1', 'aramsell21@mlb.com', '$2y$10$UY4IUJ1dcDBxlJMqOI8kvu1c/15Cfn5ybU7qBPJeceGZ9w3KPReWa', 'aramsell21@mlb.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1582722240, 1582812715, 1, 'Ailbert', 'Ramsell', NULL, '5432767773');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(10, 9, 3),
(11, 10, 3),
(12, 11, 3),
(13, 12, 3),
(14, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `id` int(255) NOT NULL,
  `id_guru` int(255) NOT NULL,
  `id_kelas` int(255) NOT NULL,
  `id_tahun` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`id`, `id_guru`, `id_kelas`, `id_tahun`) VALUES
(4, 142, 4, 2),
(5, 75, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_tahun` (`id_tahun`,`id_siswa`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_tahun` (`id_tahun`,`id_siswa`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_tahun` (`id_tahun`,`id_siswa`,`id_guru`) USING BTREE;

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `walikelas`
--
ALTER TABLE `walikelas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
