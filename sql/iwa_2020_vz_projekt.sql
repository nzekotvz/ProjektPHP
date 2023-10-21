-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 21, 2023 at 06:51 PM
-- Server version: 5.7.41-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwa_2020_vz_projekt`
--
CREATE DATABASE IF NOT EXISTS `iwa_2020_vz_projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `iwa_2020_vz_projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `tip_korisnika_id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `blokiran` int(1) NOT NULL,
  `slika` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `tip_korisnika_id`, `korisnicko_ime`, `lozinka`, `ime`, `prezime`, `email`, `blokiran`, `slika`) VALUES
(1, 0, 'admin', 'foi', 'Administrator', 'Admin', 'admin@foi.hr', 0, 'korisnici/admin.jpg'),
(2, 1, 'voditelj', '123456', 'voditelj', 'Vodi', 'voditelj@foi.hr', 0, 'korisnici/admin.jpg'),
(3, 2, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 0, 'korisnici/pkos.jpg'),
(4, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 0, 'korisnici/vzec.jpg'),
(5, 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 0, 'korisnici/qtarantino.jpg'),
(6, 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 0, 'korisnici/mbellucci.jpg'),
(7, 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 0, 'korisnici/vmortensen.jpg'),
(8, 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 0, 'korisnici/jgarner.jpg'),
(9, 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 0, 'korisnici/nportman.jpg'),
(10, 2, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 0, 'korisnici/dradcliffe.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 0, 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 0, 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 0, 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 0, 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 0, 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 0, 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 0, 'korisnici/ewatson.jpg'),
(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 0, 'korisnici/kdunst.jpg'),
(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 0, 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 0, 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 0, 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 0, 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 0, 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 0, 'korisnici/ajolie.jpg'),
(25, 2, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 0, 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 0, 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 0, 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 0, 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 0, 'korisnici/kreeves.jpg'),
(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 0, 'korisnici/thanks.jpg'),
(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 0, 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 0, 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 0, 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 0, 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 0, 'korisnici/cbale.jpg'),
(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 0, 'korisnici/jalba.jpg'),
(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 0, 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 0, 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 0, 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 0, 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 0, 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 0, 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 0, 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 0, 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 0, 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 0, 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 0, 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 0, 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 0, 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 0, 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 0, 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 0, 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 0, 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 0, 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 0, 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 0, 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 0, 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 0, 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 0, 'korisnici/srogen.jpg'),
(65, 2, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 0, 'korisnici/nreed.jpg'),
(66, 2, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 1, 'korisnici/agreene.jpg'),
(67, 2, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 1, 'korisnici/zdeschanel.jpg'),
(68, 2, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 1, 'korisnici/dfanning.jpg'),
(69, 2, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 1, 'korisnici/tlautner.jpg'),
(70, 2, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 1, 'korisnici/rpattinson.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `korisnik_id` int(11) NOT NULL,
  `planina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`korisnik_id`, `planina_id`) VALUES
(2, 1),
(18, 1),
(2, 2),
(2, 3),
(18, 3),
(30, 3),
(36, 3),
(18, 4),
(18, 5),
(30, 5);

-- --------------------------------------------------------

--
-- Table structure for table `planina`
--

CREATE TABLE `planina` (
  `planina_id` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `lokacija` text COLLATE utf8_unicode_ci,
  `geografska_sirina` double DEFAULT NULL,
  `geografska_duzina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `planina`
--

INSERT INTO `planina` (`planina_id`, `naziv`, `opis`, `lokacija`, `geografska_sirina`, `geografska_duzina`) VALUES
(1, 'Dinara', 'Dinara je planina u Dinarskom gorju na granici Republike Hrvatske i Bosne i Hercegovine. Dinara dijeli Livanjsko polje od Sinjskoga, te čini prirodnu granicu između Bosne i Hercegovine i Hrvatske.', 'Šibensko-kninska županija', 44.062475, 16.387691),
(2, 'Ivančica', 'Ivanščica (zvana i Ivančica) 1061 mnv. , najviša planina sjeverozapadne Hrvatske, smještena u Hrvatskom Zagorju. Proteže se u smjeru zapad-istok, duga oko 30 km i široka do 9 km, a omeđena je vodotocima Bednje, gornjeg toka Lonje, Krapine i Velikog potoka.', 'Ivanec', 46.1755513581999, 16.10595703125),
(3, 'Medvednica', 'Medvednica ili Zagrebačka gora je planina sjeverno od Zagreba. Sljeme, njezin najviši vrh (1033 m), je popularno izletničko mjesto do kojeg se može doći cestom ili pješice, planinareći.Od 1963. do 2007. do Sljemena je vozila turistička žičara.[2] Bilo Medvednice dugo je 42 km, a proteže se u smjeru sjeveroistok - jugozapad. Površina planine je pošumljena. Godine 1981. zapadni dio Medvednice proglašen je parkom prirode.', 'Zagreb', 45.91073831, 15.94433172),
(4, 'Velebit', 'Velebit ili velebitski masiv je najduža (145 km), ali po nadmorskoj visini tek četvrta planina u Hrvatskoj. Niži je od planina u Zagori - Dinare (1831 m), Kamešnice (1809 m) i Biokova (1762 m). Velebit je širine od 10 do 30 km, a površina mu je oko 2200 km2, a najviši vrh Vaganski vrh (1.757 m). Pripada Dinarskome gorju.', 'Ličko senjska i zadarska županija', 44.78956682, 14.94328614),
(5, 'Papuk', 'Papuk je planina u istočnoj Hrvatskoj, na sjevernoj i sjeverozapadnoj granici Požeške kotline.', 'Požega', 45.531986, 17.592906);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `slika_id` int(11) NOT NULL,
  `planina_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_vrijeme_slikanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='korisnik_korisnik_id';

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`slika_id`, `planina_id`, `korisnik_id`, `naziv`, `url`, `opis`, `datum_vrijeme_slikanja`, `status`) VALUES
(1, 1, 3, 'Dinara iz daljine', 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Dinara_central.jpg', 'Najbolji pogled', '2020-10-02 10:00:00', 1),
(2, 1, 3, 'Kod vrha', 'https://croatia.hr/sites/default/files/styles/image_full_width/public/migrate/badanj-14-alan-caplar.jpg', 'Zadnja ravnica prije kraja', '2020-10-03 10:00:00', 1),
(3, 1, 3, 'Dinara najviša planina', 'https://live.staticflickr.com/4511/36844950564_70b897f770_z.jpg', 'Sunset on the higest mountain in Croatia, and the first snow this fall. Below the mountain, Krčić river runs out.', '2020-10-22 10:00:00', 1),
(4, 2, 3, 'Šume Ivanščice', 'https://live.staticflickr.com/4564/26859026319_8345211dc1_o.jpg', 'Predivna staza', '2020-10-04 10:00:00', 1),
(5, 2, 3, 'Ivanščica zalazak', 'http://www.mnovine.hr/wp-content/uploads/2017/12/Zalazak-sunca-Ivan%C5%A1%C4%8Dica-3.jpg', 'Pogled s Ivanščice na očaravajući zimski zalazak', '2020-10-05 10:00:00', 1),
(6, 3, 3, 'Medvednica iz zraka', 'https://croatia.hr/sites/default/files/styles/image_full_width/public/migrate/medvedgrad-iz-zraka-17-alan-caplar-dronom.jpg', 'Slikano sa dronom', '2020-10-06 10:00:00', 1),
(7, 3, 3, 'Medvednica park', 'http://www.discoverdinarides.com/content/big_579b3d9f62a92.jpg', 'Nature Park Medvednica | Parks Dinarides', '2020-10-07 10:00:00', 1),
(8, 1, 3, 'Mali Troglav Dinara', 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Mali_Troglav,_Dinara-0024.jpg', 'Ljepi vrh', '2020-10-08 13:00:00', 0),
(9, 1, 70, 'Dinara most', 'https://croatia.hr/sites/default/files/styles/image_full_width/public/migrate/rijeka-cetina-alan-caplar.jpg?itok=EoUfafQk', 'Super mjesto', '2020-10-09 10:00:00', 0),
(10, 1, 70, 'Novac dinara', 'https://www.leftovercurrency.com/wp-content/uploads/2017/11/serbia-5-dinara-coin-obverse-1.jpg', 'Novac', '2020-10-09 12:00:00', 0),
(11, 1, 4, 'Dinara', 'https://media-cdn.tripadvisor.com/media/photo-s/12/ba/02/6b/dinara.jpg', 'Dinara umjetnička slika', '2020-10-03 12:00:00', 1),
(12, 1, 4, 'Dinara točka na vrhu', 'https://img.oastatic.com/img2/16338673/600x300r/dinara.jpg', 'Uspon završen', '2020-10-02 13:00:00', 1),
(13, 1, 4, 'Vrh dinare', 'https://www.virtualmountains.co.uk/esc/Croatia/Dinara_Summit.jpg', 'Na samom vrhu', '2020-10-02 14:00:00', 0),
(14, 2, 4, 'Milengrad', 'https://live.staticflickr.com/65535/48685919028_c4be46ee65_o.jpg', 'zidine starog Milengrada koji je sagrađen u 13. stoljeću nakon provale Tatara na južnim padinama gore Ivanščice, Budinščina.', '2020-10-02 15:00:00', 1),
(15, 3, 4, 'Medvednica Mountain', 'https://static.toiimg.com/photo/58851964/.jpg', 'Medvednica Mountain - Zagreb: Get the Detail of Medvednica Mountain on Times of India Travel', '2020-10-02 16:00:00', 1),
(16, 1, 5, 'Troglav', 'https://www.total-croatia-cycling.com/media/k2/items/cache/011e88ef4a8328e08be9d913808b8290_XL.jpg', 'Stigli do vrha', '2020-10-02 17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_korisnika_id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'voditelj'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `fk_korisnik_tip_korisnika_idx` (`tip_korisnika_id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`korisnik_id`,`planina_id`),
  ADD KEY `fk_korisnik_has_planina_planina1_idx` (`planina_id`),
  ADD KEY `fk_korisnik_has_planina_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `planina`
--
ALTER TABLE `planina`
  ADD PRIMARY KEY (`planina_id`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`slika_id`),
  ADD KEY `fk_slika_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_slika_planina1_idx` (`planina_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_korisnika_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `planina`
--
ALTER TABLE `planina`
  MODIFY `planina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `slika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `tip_korisnika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika_id`) REFERENCES `tip_korisnika` (`tip_korisnika_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `fk_korisnik_has_planina_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_planina_planina1` FOREIGN KEY (`planina_id`) REFERENCES `planina` (`planina_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slika`
--
ALTER TABLE `slika`
  ADD CONSTRAINT `fk_slika_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_slika_planina1` FOREIGN KEY (`planina_id`) REFERENCES `planina` (`planina_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
