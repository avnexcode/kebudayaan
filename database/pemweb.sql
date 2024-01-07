-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 12:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `bad_habits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bad_habits`)),
  `good_habits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`good_habits`)),
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`id`, `name`, `email`, `hobby`, `nim`, `place_of_birth`, `date_of_birth`, `address`, `instagram`, `facebook`, `linkedin`, `github`, `bad_habits`, `good_habits`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Fauzi Nur Aziz', 'axnvee18@gmail.com', 'Tidur', '22104410046', 'Blitar', '2003/08/18', 'Kedungbunder, Sutojayan, Blitar', '', '', '', '', '[]', '[]', 'mfnaziz.png', NULL, NULL),
(2, 'Erwan', 'erwan@gmail.com', 'Mendengarkan Music', '22104410039', 'Blitar', '2002/09/24', 'Desa Dawuhan, Kec. Kademangan, Kabupaten Blitar', 'https://instagram.com/erwan_nanak', NULL, NULL, 'https://github.com/Oraika12', '[\"Suka pelupa\"]', '[\"Suka Mendengarkan Musik\",\"Suka Membaca Komik\"]', 'erwan.jpg', NULL, NULL),
(3, 'Muhammad Ikhsan', 'iksancjr@gmail.com', 'Bermain Game', '22104410004', 'Malang', '2001/11/02', 'Kelurahan Cepokomulyo, Kecamatan Kepanjen, Kabupaten Malang', 'instagram.com/kyzutogt', 'facebook.com/KyzutoFX', '', 'github.com/KyzutoGH/', '[\"Mager\",\"Suka Keributan\"]', '[\"Bantu Kawan\",\"Carry Teman\"]', 'bukanpedo.jpg', NULL, NULL),
(4, 'Mochamad Brilian Bani Adam', 'brilianadam09@gmail.com', 'Main Game', '22104410048', 'Blitar', '2003/05/12', 'Desa Kuningan Kecamatan Kanigoro Kabupaten Blitar', 'https://www.instagram.com/addmeeonn', 'https://www.facebook.com/mochamadbrilian.baniadam', '', 'https://github.com/Brilian-Maker', '[\"Begadang\",\"Suka menunda\"]', '[\"Olahraga\",\"Menjaga pola makan\"]', 'adam.jpg', NULL, NULL),
(5, 'Khariratul Istiqlaliyah', 'khariratulistiqlaliyah@gmail.com', 'Melukis', '22104410026', 'Tulungagung', '2004/08/20', 'Desa Rejotangan Kecamatan Rejotangan Kabupaten Tulungagung', 'https://www.instagram.com/artistiq_ly?igsh=M2Vvc3JlZWJucDlv&utm_source=qr', '-', 'http://www.linkedin.com/in/khariratulist', 'https://github.com/backarats', '[\"Pelupa\",\"Skeptis\"]', '[\"Bangun pagi\",\"Minum air putih yg cukup\"]', 'khar.jpg', NULL, NULL),
(6, 'Muhammad Rafa', 'mrmuhammadrafa61@gmail.com', 'Bermain Gitar', '22104410061', 'Batam', '2003/05/07', 'Kelurahan Tanggung, Kecamatan Wlingi, Kabupaten Blitar', 'https://www.instagram.com/muh_rafa722?igsh=YTQwZjQ0NmI0OA==', 'https://www.facebook.com/muhammad.r.r.75098?mibextid=ZbWKwL', NULL, 'https://github.com/Mrafa61', '[\"Mudah lupa\",\"gampang insomnia\"]', '[\"suka mendengarkan musik\",\"Suka bermain gitar\",\"Suka berolahraga\",\"Suka makan\"]', 'rafa.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, '22104410046', 'KONSOL KONSOL', NULL, NULL),
(2, '22104410039', 'CROT CROT', NULL, NULL),
(3, '22104410039', 'ENTOD ENTOD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ethnics`
--

CREATE TABLE `ethnics` (
  `id` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describe` text NOT NULL,
  `island_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `musical_instruments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`musical_instruments`)),
  `traditional_dance` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`traditional_dance`)),
  `traditional_food` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`traditional_food`)),
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`gallery`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ethnics`
--

INSERT INTO `ethnics` (`id`, `slug`, `name`, `describe`, `island_id`, `image`, `musical_instruments`, `traditional_dance`, `traditional_food`, `gallery`, `created_at`, `updated_at`) VALUES
('1', 'suku-jawa', 'Suku Jawa', 'Suku Jawa merupakan suku terbesar di Indonesia yang sebagian besar mendiami Pulau Jawa. Mereka memiliki warisan budaya yang kaya, termasuk tarian tradisional, musik, dan masakan. Tarian Jawa, seperti Sendratari Ramayana yang terkenal, mencerminkan keanggunan dan keanggunan budaya Jawa.', 'jawa-id', 'jawir.jpg', '[\"Gamelan\",\"Angklung\",\" Suling\",\"Rebab\",\"Karinding\"]', '[\"Reog Ponorogo\",\"Tari Gambyong\",\"Tari Beksan Wireng\",\"Tari Gambir Anom\",\"Tari Serimpi\"]', '[\"Soto\",\"Gudeg\",\"Nasi Liwet\",\"Soto\",\"Pecel\"]', '[\"Suku-Jawa-.png\",\"budaya2.jpg\",\"gamelan.jpg\",\"Festival-Reog-Ponorogo-Jawa-timur.jpg\",\"soto.jpg\"]', NULL, NULL),
('10', 'suku-dani', 'Suku Dani', 'Suku Dani adalah salah satu suku terbesar di Papua, Indonesia. Mereka mendiami wilayah Pegunungan Jayawijaya, yang terletak di bagian tengah Papua. Suku Dani memiliki budaya dan tradisi yang unik, termasuk bahasa, pakaian, rumah, dan adat istiadat.', 'papua-id', 'dani_.jpg', '[\"Pikon\",\"Yali Tambur\",\"Lang-Dani\",\"Fagot Gaya Dani\",\"Wai-Dani\"]', '[\"Tari Koteka\",\"Tari Lembeyan\",\"Tari Hudoq\",\"Tari Wambon\",\"Tari Mayu\"]', '[\"Papeda\",\"Babi Bakar\",\"Ubikayu Papeda\",\"Pisang Bakar\",\"Sagu Lembang\"]', '[\"suku_dani1.jpg\",\"tari_1.jpg\",\"alat-musik-pikon.jpg\",\"tari_-1.jpg\",\"Sejarah-Panjang-Papeda-Copy.jpg\"]', NULL, NULL),
('11', 'suku-mandar', 'Suku Mandar', 'Suku Mandar dikenal sebagai suku yang memiliki sejarah panjang dan budaya yang kaya. Suku Mandar memiliki kerajaan-kerajaan yang kuat pada masa lalu, seperti Kerajaan Balanipa, Kerajaan Banggae, dan Kerajaan Mamuju.', 'sulawesi-id', 'suku_mandar.jpg', '[\"Gongga Lima\",\"Saluang\",\"Talempong\",\"Gendang\",\"Bansi\"]', '[\"Tari Tenggang Tenggang Lopi\",\"Magellu\",\"Padendang\",\"Pa di Amma\",\"Ma gandangi\"]', '[\"Bikang\",\"Pallubasa\",\"Coto Makassar\",\"Burasa\",\"Sop Konro\"]', '[\"Suku-Pesisir-Mandar.jpg\",\"Tari_Pallake.jpg\",\"gongga-lima.jpg\",\"Tari_Tenggang_Tenggang_Lopi.jpg\",\"bikang.jpg\"]', NULL, NULL),
('12', 'suku-minahasa', 'Suku Minahasa', 'Asal usul suku Minahasa masih menjadi perdebatan. Ada yang berpendapat bahwa suku Minahasa berasal dari perpaduan suku-suku Austronesia, seperti suku Dayak dan suku Proto Melayu. Ada juga yang berpendapat bahwa suku Minahasa merupakan suku Austronesia asli yang telah menetap di Sulawesi Utara sejak ribuan tahun yang lalu.', 'sulawesi-id', 'minahasa.jpg', '[\"Kolintang\",\"Tambourine (Keteng-keteng)\",\"Tinutuan\",\"Gong\",\"Tambur\"]', '[\"Tari Kabasaran\",\"Tarian Kaweng\",\"Tarian Maengket\",\"Tarian Totobuang\",\"Tarian Tor-tor\"]', '[\"Pampis Cakalang\",\"Babi Rica-Rica\",\"Tinutuan\",\"Cakalang Fufu\",\"Bubur Manado\"]', '[\"suku_minahasa.jpg\",\"Tari-Mangkeat.jpg\",\"Kolintang.webp\",\"Tari_Kabasaran.jpg\",\"Resep-Pampis-Cakalang-Fufu.webp\"]', NULL, NULL),
('13', 'suku-toraja', 'Suku Toraja', 'Asal usul suku Toraja masih menjadi perdebatan. Ada yang berpendapat bahwa suku Toraja berasal dari perpaduan suku-suku Austronesia, seperti suku Dayak dan suku Bugis. Ada juga yang berpendapat bahwa suku Toraja merupakan suku asli Sulawesi Selatan.', 'sulawesi-id', 'Toraja.jpg', '[\"Pasuling\",\"Pong-Dekeng\",\"To Barana\",\"Pallu Mara\",\"Tallu Tambua\"]', '[\"Tari PaGellu\",\"Ma Badong\",\"Ma Randing\",\"Ma Gellu\",\"Ma lokku\"]', '[\"Pantollo Pamarrasan\",\"Pallubasa\",\"Pa Piong\",\"Indak Tala\",\"Sop Konro\"]', '[\"suku_toraja.jpg\",\"tari_ma-badong.jpeg\",\"Pasuling.jpeg\",\"TariPaGellu.jpg\",\"Pantollo_Pamarrasan.jpg\"]', NULL, NULL),
('14', 'suku-bali', 'Suku Bali', 'Masyarakat Bali bertempat tinggal di Pulau Bali dan terkenal dengan seni dan budayanya yang dinamis. Tarian Bali, seperti tari Legong dan Barong, menampilkan gerakan yang rumit dan kostum yang berwarna-warni. Masakan tradisional Bali, termasuk Babi Guling (babi guling), merupakan kuliner yang nikmat.', 'bali-id', 'Adat_Tradisional_Bali.jpg', '[\"Rindik Rindik\",\"Gamelan\",\"Rebab Bali\",\"Angklung\",\"Suling Bali\"]', '[\"Tari Kecak\",\"Tari Legong\",\"Tari Barong\",\"Tari Bandut\",\"Tari Pendet\"]', '[\"Bandut\",\"Bebek Betutu\",\"Lawar\",\"Babi Guling\",\"Urutan\"]', '[\"suku_bali_aga.jpg\",\"budaya.jpg\",\"Rindik_Rindik.jpg\",\"tari_kecak.jpg\",\"bandut.jpg\"]', NULL, NULL),
('15', 'suku-nyama_selam', 'Suku Nyama Selam', 'Suku Nyama Selam adalah salah satu suku asli Pulau Bali yang menganut agama Islam. Suku ini mendiami daerah pegunungan Kintamani, Kabupaten Bangli. Suku Nyama Selam memiliki budaya dan tradisi yang unik, yang merupakan perpaduan antara budaya Bali dan Islam.', 'bali-id', 'suku.jpg', '[\"Terompang\",\"Gamelan\",\"Angklung\",\"Sasando\",\"Suling\"]', '[\"Tari Sembah\",\"Tari Saman\",\"Tari Tor-Tor\",\"Tari Pendet\",\"Tari Legong\"]', '[\"Sate Lilit\",\"Nasi Goreng\",\"Gado-gado\",\"Babi Guling\",\"Lawar\"]', '[\"Ngusaba_Kusamba-3.jpg\",\"tari_puja.jpg\",\"Terompang.jpg\",\"tari_sembah.jpg\",\"Sate_lilit.jpg\"]', NULL, NULL),
('2', 'suku-sunda', 'Suku Sunda', 'Seni dan budaya Sunda dipengaruhi oleh berbagai budaya, termasuk budaya Hindu, Islam, dan Barat. Tarian tradisional Sunda, seperti tari Jaipong dan Topeng, menampilkan gerakan yang gemulai dan penuh energi. Musik tradisional Sunda, seperti gamelan dan suling, memiliki melodi yang lembut dan mendayu-dayu.', 'jawa-id', 'sunda.jpg', '[\"Angklung\",\"Suling\",\"Tarawangsa\",\"Jentreng\",\"Karinding\"]', '[\"Tari Jaipongan\",\"Tari Ketuk Tilu\",\" Tari Topeng\",\"Tari Sampiung\",\"Tari Sintren \"]', '[\"Nasi Liwet\",\"Awug\",\"Surabi\",\"Bandros\",\" Colenak\"]', '[\"sunda2.jpg\",\"nasi_timbel.jpg\",\"angklung.jpg\",\"Tari_Jaipongan.jpg\",\"nasi_liwet.jpg\"]', NULL, NULL),
('3', 'suku-minang', 'Suku Minang', 'Suku bangsa yang mendiami Provinsi Sumatra Barat, Indonesia. Mereka memiliki budaya dan tradisi yang unik, termasuk seni dan budayanya yang dinamis. Tarian Minang, seperti tari Piring dan tari Pasambahan, menampilkan gerakan yang dinamis dan penuh semangat.', 'jawa-id', 'minang.jpg', '[\"Rambatan\",\"Saluang\",\"Talempong\",\"Serunai\",\"Rabab\"]', '[\"Tari Minang\",\"Tari Piring\",\"Tari Indang\",\"Tari Rantak\",\"Tari Payung\"]', '[\"Lemang\",\"Rendang\",\"Sate Padang\",\"Nasi Kapau\",\"Lontong Sayur\"]', '[\"pulau_jawajpeg.jpeg\",\"rendang.jpg\",\"rambatan.jpg\",\"tari_minang.jpg\",\"lemang.jpg\"]', NULL, NULL),
('4', 'suku-batak', 'Suku Batak', 'Masyarakat Batak juga memiliki seni dan budaya yang dinamis, meskipun berbeda dengan masyarakat Bali. Tarian Batak, seperti tari Tor-tor dan Sigale-gale, menampilkan gerakan yang energik dan penuh semangat.', 'jawa-id', 'suku_Batak.jpg', '[\"Hasapi\",\"Gondang\",\"Sarune Bolon\",\"Sulim\",\"Balobat\"]', '[\"Tari Tortor\",\"Tari Gundala-gundala\",\"Tari Piso Surit\",\"Tari Sigale-gale\",\"Tor-tor Sipaha Lima\"]', '[\"Saksang\",\"Dali ni horbo\",\"Arsik\",\"Babi panggang Karo \",\"Naniura\"]', '[\"budaya4.jpg\",\"budaya5.jpg\",\"hasapi.jpg\",\"tari_tortor.jpg\",\"Saksang.jpg\"]', NULL, NULL),
('5', 'suku-banjar', 'Suku Banjar', 'Suku Banjar memiliki peran penting dalam pembangunan Kalimantan Selatan. Suku Banjar dikenal sebagai masyarakat yang pekerja keras dan kreatif. Suku Banjar juga memiliki peran penting dalam penyebaran agama Islam di Kalimantan Selatan.', 'kalimantan-id', 'suku_banjar.jpg', '[\"Marawis\",\"Panting\",\"Gong\",\"Kendang\",\"Suling\"]', '[\"Tari Pakarena\",\"Tari Baksa Kembang\",\"Tari Baksa Dadap\",\"Tari Baksa Hupak\",\"Tari Rudat\"]', '[\"Soto Banjar\",\"Soto Banjar\",\"Nasi Kuning Banjarmasin\",\"Nasi Itik Gambut\",\"Nasi Amparan Tatak\"]', '[\"suku_banjar1.jpg\",\"Tari_Baksa_dadap.jpg\",\"Marawis.jpg\",\"Baksa-Kembangjpg.jpg\",\"Soto_Banjar.jpg\"]', NULL, NULL),
('6', 'suku-bugis', 'Suku Bugis', 'Suku Bugis adalah salah satu kelompok etnis yang mendiami wilayah Sulawesi Selatan, Indonesia. Mereka juga tersebar di beberapa daerah di luar Sulawesi, seperti Kalimantan, Sumatra, dan Malaysia.', 'kalimantan-id', 'suku_bugis1.jpg', '[\"Puik-Puik\",\"Talindo\",\"Kecapi\",\"Suling\",\"Sinrili\"]', '[\"Tari Pakarena\",\"Tari Pattennung\",\"Tari Paduppa\",\"Tari Pakarena\",\"Tari Ma gellu\"]', '[\"Konro\",\"Coto Makassar\",\"Pallubasa\",\"Sop Konro\",\"Pallu Mara\"]', '[\"suku_bugis.jpg\",\"Tari_Pattennung.jpg\",\"puik-puik.jpg\",\"Tari_Pakarena.JPG\",\"konro.webp\"]', NULL, NULL),
('7', 'suku-dayak', 'Suku Dayak', 'Suku Dayak adalah suku bangsa yang mendiami pulau Kalimantan, Indonesia. Suku Dayak merupakan suku asli Kalimantan, dan memiliki populasi sekitar 4 juta jiwa. Suku Dayak terbagi menjadi beberapa sub-suku, yang masing-masing memiliki budaya dan tradisi yang berbeda.', 'kalimantan-id', 'Suku_dayak1.jpg', '[\"Genggong\",\"Sape\",\"Kecapi\",\"Gendang\",\"Bunsu\"]', '[\"Tari Kancet Papatai\",\"Tari Kancet Ledo\",\"Tari Kancet Papatai\",\"Tari Hudoq\",\"Tari Gong\"]', '[\"Hintalu Karuang\",\"Karuang\",\"Luba Laya\",\"Juhu Kujang\",\"Kue Dange\"]', '[\"Sape.jpg\",\"suku_dayak.jpg\",\"Genggong.jpg\",\"Tari_Kancet_Papatai.jpg\",\"hintalu-karuang.jpg\"]', NULL, NULL),
('8', 'suku-asmat', 'Suku Asmat', 'Suku Asmat adalah suku bangsa yang mendiami wilayah Papua Selatan, Indonesia. Suku Asmat dikenal dengan hasil ukiran kayunya yang unik. Populasi suku Asmat terbagi dua, yaitu mereka yang tinggal di pesisir pantai dan mereka yang tinggal di bagian pedalaman.', 'papua-id', 'The-Asmat-Indonesia.jpg', '[\"Tifa\",\"Kosong\",\"Tambur\",\"Kubing\",\"Beben\"]', '[\"Tari Suanggi\",\"Yospan (Yosim Pancar)\",\"Yos Sud Papua\",\" Sajojo\",\" Yamko Rambe Yamko\"]', '[\"Sagu Lempeng\",\"Papeda\",\"Udang Selingkuh\",\"Mansacar\",\"Soto Raja Ampat\"]', '[\"suku_Asmat.jpg\",\"tari_yospan.jpg\",\"Tifa.jpg\",\"Tari-Suanggi.jpg\",\"Sagu-Lempeng.jpg\"]', NULL, NULL),
('9', 'suku-biak', 'Suku Biak', 'Asal usul suku Biak masih menjadi perdebatan. Ada yang berpendapat bahwa suku Biak berasal dari perpaduan suku-suku Austronesia dan Melanesia. Ada juga yang berpendapat bahwa suku Biak merupakan suku Austronesia asli Papua.', 'papua-id', 'suku_biak.jpg', '[\"Triton\",\"Tifa\",\"Atowo\",\"Gendang\",\"Suku-suku\"]', '[\"Tari Yosim Pancar\",\"Tari Wor\",\"War Dance (Yospan)\",\"Tari War-Biak\",\"Tari Manarmakeri\"]', '[\"Ikan Bakar\",\"Papeda\",\"Kuah Kuning\",\"Klappertaart\",\"Sagu Bakar\"]', '[\"suku_dani.jpg\",\"budaya6.jpg\",\"Triton_dari_Papua.JPG\",\"Tari _Yosim_Pancar.jpg\",\"Ikan_bakar.jpg\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `islands`
--

CREATE TABLE `islands` (
  `id` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describe` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `islands`
--

INSERT INTO `islands` (`id`, `slug`, `name`, `describe`, `image`, `created_at`, `updated_at`) VALUES
('bali-id', 'bali', 'Bali', 'Bali adalah tujuan wisata populer yang terkenal dengan pemandangannya yang subur, pantainya yang indah, dan pemandangan seni yang semarak. Pulau ini terkenal dengan budaya Hindu yang unik, upacara adat, dan pertunjukan tari Bali.', 'pulau_bali.jpg', NULL, NULL),
('jawa-id', 'jawa', 'Jawa', 'Pulau Jawa merupakan pulau terpadat di Indonesia dan dunia. Kota ini terkenal dengan budayanya yang beragam, bangunan bersejarah, dan kota-kotanya yang dinamis. Merupakan rumah bagi ibu kota Jakarta, Jawa menawarkan situs ikonik seperti Candi Borobudur dan Gunung Bromo.', 'pulau_jawa.jpg', NULL, NULL),
('kalimantan-id', 'kalimantan', 'Kalimantan', 'Kalimantan, “Pulau Kalimantan” bagi sebagian orang, adalah surga bagi para petualang dan pecinta alam. Hutan hujan lebatnya terbentang luas, menyembunyikan sungai berkelok-kelok, air terjun tersembunyi, dan satwa liar eksotik seperti orangutan, bekantan, dan buaya', 'pulau_kalimantan.jpg', NULL, NULL),
('papua-id', 'papua', 'Papua', 'Papua adalah tujuan wisata menawan yang terkenal karena keindahan alamnya yang masih asli, bentang alam yang menakjubkan, dan warisan budaya yang kaya. Wilayah ini terkenal dengan beragam budaya asli, ritual tradisional, dan pertunjukan tari yang memukau, menawarkan gambaran unik tentang permadani Papua yang semarak.', 'pulau_papua.jpg', NULL, NULL),
('sulawesi-id', 'sulawesi', 'Sulawesi', 'Sulawesi adalah pulau terbesar kesebelas di dunia dan merupakan rumah bagi berbagai macam pemandangan alam yang menakjubkan, budaya yang kaya, dan sejarah yang menarik. Pulau ini terletak di Indonesia Timur dan berbatasan dengan Laut Jawa di utara, Selat Makassar di barat, Laut Flores di selatan, dan Laut Sulawesi di timur.', 'pulau_sulawesi.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_28_073044_create_islands_table', 1),
(6, '2023_12_28_074251_create_ethnics_table', 1),
(7, '2023_12_29_163710_create_biodatas_table', 1),
(8, '2024_01_07_095734_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
('22104410039', 'Erwan', 'erwan@gmail.com', '2024-01-07 03:10:01', '$2y$12$67MX2.R7shCDdW3/Ls5Fm.WZzqYKSL8RdTphEDeSWJvd51ZAgj51S', 1, 'W3Dd4ClTpn', '2024-01-07 03:10:01', '2024-01-07 03:10:01'),
('22104410046', 'Muhammad Fauzi Nur Aziz', 'axnvee18@gmail.com', '2024-01-07 03:10:00', '$2y$12$WdUtxBdASvm8FEAWW5Ywy.NnSTYcwTQSF125KZU71m6vIH73tb1O.', 1, 'nhYScfCeMx', '2024-01-07 03:10:01', '2024-01-07 03:10:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `ethnics`
--
ALTER TABLE `ethnics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ethnics_slug_unique` (`slug`),
  ADD KEY `ethnics_island_id_foreign` (`island_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `islands`
--
ALTER TABLE `islands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ethnics`
--
ALTER TABLE `ethnics`
  ADD CONSTRAINT `ethnics_island_id_foreign` FOREIGN KEY (`island_id`) REFERENCES `islands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
