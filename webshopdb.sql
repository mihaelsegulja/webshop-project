-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 03:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(9) NOT NULL,
  `kor_ime` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `lozinka` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `ime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `prezime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `kor_ime`, `email`, `lozinka`, `ime`, `prezime`) VALUES
(1, 'user69', 'fakeemail@fake.fake', '1234', 'Steve', 'Stevenson'),
(2, 'randomflower2', 'fakee@fake.fake', '121212', 'No', 'Name'),
(3, 'somebodyoncetoldme', 'testfake@fake.fake', 'abcd', 'Test', 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbe`
--

CREATE TABLE `narudzbe` (
  `id` int(12) UNSIGNED ZEROFILL NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_proizvod` int(11) NOT NULL,
  `kolicina` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `cijena` decimal(10,2) UNSIGNED DEFAULT 0.00,
  `proizvodjac` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `naslov` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL DEFAULT 'naslov',
  `slika` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `cijena`, `proizvodjac`, `naslov`, `slika`) VALUES
(1, 'Windows 69', '69.69', 'Microsoft', 'Microsoft Windows 69 OS digitalni aktivacijski ključ, doživotno', 'images/product-images/windows69.jpg'),
(2, 'WinRAR', '29.99', 'winrar GmbH', 'WinRAR digitalni aktivacijski ključ, doživotno', 'images/product-images/winrar.jpg'),
(3, 'FL Studio', '179.99', 'Image-Line', 'FL Studio digitalni aktivacijski ključ, 12 mjeseci', 'images/product-images/flstudio.jpg'),
(4, 'Adobe Premiere Pro', '230.00', 'Adobe', 'Adobe Premiere Pro digitalni aktivacijski ključ, 24 mjeseci', 'images/product-images/adobepremierepro.jpg'),
(5, 'VMware Workstation 16 Pro', '19.90', 'VMware', 'VMware Workstation 16 Pro digitalni aktivacijski ključ, 12 mjeseci', 'images/product-images/vmwareworkstation16pro.jpg'),
(6, 'PhpStorm', '189.99', 'JetBrains', 'JetBrains PhpStorm IDE digitalni aktivacijski ključ, 24 mjeseci', 'images/product-images/phpstorm.jpg'),
(7, 'ESET NOD32', '79.99', 'ESET', 'ESET NOD32 antivirus digitalni aktivacijski ključ, 36 mjeseci', 'images/product-images/esetnod32.jpg'),
(9, 'Adobe Illustrator', '220.00', 'Adobe', 'Adobe Illustrator digitalni aktivacijski ključ, 24 mjeseci', 'images/product-images/adobeillustrator.jpg'),
(10, 'Playstation Plus', '45.99', 'Sony', 'Sony Playstation Plus digitalna pretplata, 12 mjeseci', 'images/product-images/psplus.jpg'),
(11, 'DataGrip', '189.99', 'JetBrains', 'JetBrains DataGrip IDE digitalni aktivacijski ključ, 12 mjeseci', 'images/product-images/datagrip.jpg'),
(12, 'Adobe Photoshop', '222.00', 'Adobe', 'Adobe Photoshop digitalni aktivacijski ključ, 24 mjeseci', 'images/product-images/adobephotoshop.jpg'),
(13, 'Avast', '311.99', 'Avast Software', 'Avast Premium Security antivirus digitalni aktivacijski ključ, 36 mjeseci', 'images/product-images/avast.jpg'),
(14, 'CLion', '189.99', 'JetBrains', 'JetBrains CLion IDE digitalni aktivacijski ključ, 12 mjeseci', 'images/product-images/clion.jpg'),
(15, 'XBOX Game Pass', '49.99', 'Microsoft', 'Microsoft XBOX Game Pass Ultimate digitalna pretplata, 3 mjeseca', 'images/product-images/xboxgamepass.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD PRIMARY KEY (`id`,`id_proizvod`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_proizvod` (`id_proizvod`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD CONSTRAINT `narudzbe_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `narudzbe_ibfk_2` FOREIGN KEY (`id_proizvod`) REFERENCES `proizvodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
