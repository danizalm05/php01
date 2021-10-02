 SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
 
--
-- Table structure for table `artists`
--
 
CREATE TABLE `artists` (
  `id` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `movement` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `school` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `movement` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `pic`, `movement`, `school`) VALUES
(46, 'Pietro da Cortona', 'http://images.artnet.com/images_us/magazine/news/artmarketwatch/artmarketwatch11-3-06-8.jpg', 'Baroque', 'פייטרו ברטיני (באיטלקית: Pietro Berrettini; ‏ 1 בנ'),
(45, 'Bernini', 'https://i.pinimg.com/originals/10/09/71/100971e671ae0d7abe8da559b65241dd.jpg', 'Baroque', 'ג''ובאני לורנצו ברניני'),
(43, 'Luca Giordano ', ' http://s005.radikal.ru/i212/1302/e5/3b3f6f04cd11.jpg', 'Baroque', 'לוקה ג''ורדאנו'),
(50, 'Rubens', 'https://www.peterpaulrubens.org/thumbnail/68000/68474/mini_normal/Self-Portrait.jpg', 'Flemish Baroque', ''),
(30, 'Caspar David Friedrich', 'http://www.thebookoflife.org/wp-content/uploads/2014/11/Caspardavidfriedrich_self1-1.jpg', 'German Romanticism', 'na'),
(44, 'Nicolas Poussin', 'http://www.grandpalais.fr/sites/default/files/field_magazine_thumbnail/arton1066.jpg', 'Baroque', ' Classicism ,ניקולא פוסן'),
(47, 'Caravaggio', 'https://www.artble.com/imgs/c/2/c/54894/caravaggio.jpg', 'Baroque', ''),
(48, 'Velázquez ', 'http://www.diego-velazquez.org/images/Diego-Velazquez.jpg', 'Baroque', ''),
(49, 'John Sloan ', 'http://explorepahistory.com/kora/files/1/2/1-2-325-25-ExplorePAHistory-a0b1n1-a_349.jpg', 'American Realism', 'תקופות: נאו-קלאסיציזם, ריאליזם, אמנות מודרנית, American Realism, אסכולת אש קאן'),
(51, 'de Chirico', 'https://uploads1.wikiart.org/images/giorgio-de-chirico.jpg!Portrait.jpg', 'Surrealism', 'Movement Metaphysical art, surrealism Giorgio de Chirico'),
(52, 'Maurice Prendergast', 'http://1.bp.blogspot.com/-ldy1qkineuQ/UQZV7y-mHkI/AAAAAAAAYhE/AHjb1TG9-Ak/s1600/Prendergast+1913.jpg', 'Post Impressionism', ' תאריך לידה: 10 באוקטובר 1858, סנט ג''ונס, קנדה תאריך ומקום המוות: 1 בפברואר 1924, ניו יורק, ניו יורק, ארצות הברית יצירות אמנות: Ladies in the Rain, Low Tide, Beachmont, עוד תקופות: פוסט-אימפרסיוניזם, אימפרסיוניזם, אמנות נאיבית, פוינטיליזםמאוריס פרנדרגאסט'),
(53, 'Goya ', 'https://1.bp.blogspot.com/-V_NjSboommo/U-4qx3CZZsI/AAAAAAAA4aE/QAhCKoUvQdU/s1600/640px-Vicente_L%C3%B3pez_Porta%C3%B1a_-_el_pintor_Francisco_de_Goya.jpg', 'Romanticism', 'Francisco José de Goya y Lucientes ');


--
-- Dumping data for table `movement`
--

INSERT INTO `movement` (`id`, `title`) VALUES
(1, 'na'),
(2, 'Social Realism'),
(3, 'Art Deco'),
(4, 'Abstract Expressionism'),
(5, 'Northern Mannerism'),
(6, 'Surrealism'),
(7, 'German Romanticism'),
(8, 'Flemish Baroque'),
(9, 'International Style'),
(10, 'Baroque'),
(11, 'American Realism'),
(12, 'Post Impressionism'),
(13, 'fhfgfgf'),
(14, 'dddadasd'),
(15, 'Romanticism');

-- --------------------------------------------------------

--
-- Table structure for table `paintings`
--
 
CREATE TABLE `paintings` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` char(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `artist_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paintings`
--

INSERT INTO `paintings` (`id`, `name`, `url`, `artist_id`) VALUES
(47, ' Dance to the Music of Time', 'https://www.artble.com/imgs/8/d/1/227587/dance_to_the_music_of_time.jpg', 44),
(46, 'Midas and Bacchus', 'https://www.artble.com/imgs/0/f/a/627533/midas_and_bacchus.jpg', 44),
(45, 'Les mystérieux tableaux codés', 'http://www.renne-le-chateau.com/poussin/images/pous6_b.jpg', 44),
(44, 'Helios and Phaeton with Saturn and the Four Seasons – seetheline', 'https://seethelineinthesand.files.wordpress.com/2014/09/th_1410267959_nicolas_poussin_-_helios_and_phaeton_with_saturn_and_the_four_seasons.jpg', 44),
(43, 'Venus and Mercury', 'https://static.artuk.org/w800h800/LSE/LSE_DPG_DPG481.jpg', 44),
(42, ' Bacchanal Before a Statue of Pan', 'https://www.artble.com/imgs/d/0/f/827551/bacchanal_before_a_statue_of_pan.jpg', 44),
(41, 'The Disarming of Cupid', 'https://static.artuk.org/w800h800/BCN/BCN_NMG_1978_33.jpg', 43),
(49, 'Psyche Honoured by the People', 'http://www.hellenicaworld.com/Greece/Mythology/Paintings/PsychePeopleLucaGiordano.jpg', 43),
(39, 'Saint john the baptist preaching', 'https://studyprayserve.files.wordpress.com/2016/11/saint-john-the-baptist-preaching-1695.jpg', 43),
(38, 'The Triumph of David', 'http://www.the-athenaeum.org/art/display_image.php?id=398823', 43),
(37, 'Hommage to Walter Benjamin', 'http://www.the-athenaeum.org/art/display_image.php?id=868316', 42),
(36, 'The Sacrifice of Manoah', 'http://www.the-athenaeum.org/art/display_image.php?id=562626', 41),
(35, 'Self Portrait', 'http://www.the-athenaeum.org/art/display_image.php?id=930065', 31),
(34, 'fiddler_on_the_roof', 'https://www.art-prints-on-demand.com/kunst/carl_spitzweg_70/spitzweg_fiddler_on_the_roof.jpg', 29),
(33, 'Sunset', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Sunset_by_Caspar_David_Friedrich.jpg/1277px-Sunset_by_Caspar_David_Friedrich.jpg', 30),
(32, 'Moonrise over the Sea', 'https://www.kimbellart.org/sites/default/files/styles/interior_banner/public/1998_friedrich_moonrise_header.jpg', 30),
(31, 'Sunday Stroll', 'http://www.the-athenaeum.org/art/display_image.php?id=381856', 29),
(48, 'Apollo And Daphne', 'http://www.oceansbridge.com/paintings/artists/p/poussin_nicolas/thumb-oil/apollo_and_daphne_1625_XX_alte_pinakothek_munich.jpg', 44),
(50, 'Main Street, Gloucester', 'http://www.the-athenaeum.org/art/display_image.php?id=96757', 49),
(51, 'The Feast of Venus', 'http://arthistoryproject.com/site/assets/files/13977/peter-paul-rubens-the-feast-of-venus-1637-trivium-art-history.jpg', 50),
(52, 'The Judgement of Paris', 'http://www.peterpaulrubens.net/images/gallery/the-judgement-of-paris.jpg', 50),
(53, 'The Feast of Achelous', 'http://www.metmuseum.org/toah/images/hb/hb_45.141.jpg', 50),
(54, 'The Red Tower', 'http://www.pitturametafisica.it/ITA_VERSION/Copie/Big/1%20-%20Nuova%20torre.jpg', 51),
(56, ' The Red Tower', 'https://uploads0.wikiart.org/images/giorgio-de-chirico/piazza-d-italia-1913.jpg', 51),
(57, 'The enigma of arrival & the afternoon', 'http://photos1.blogger.com/blogger/2957/438/1600/10big.jpg', 51),
(58, 'enigma of an autumn afternoon', 'http://photos1.blogger.com/blogger/2957/438/1600/autumn%20afternoon.jpg', 0),
(59, 'Torino a primavera', 'https://uploads6.wikiart.org/images/giorgio-de-chirico/turin-spring-1914.jpg', 51),
(60, 'Enigma Of A Day', 'http://ayay.co.uk/arts/surrealist/giorgio_de_chirico/the-enigma-of-a-day.jpg', 51),
(61, 'Piazze d''Italia', 'http://www.italianways.com/wp-content/uploads/2016/03/giorgio-de-chirico-02-665x532.jpg', 51),
(78, 'Dona Isabel De Porcel', 'https://1.bp.blogspot.com/-_w5VLh_Pb5E/VBZpBnMkg6I/AAAAAAAB8n0/zK3G0D7Gh8k/s1600/Francisco%2BJos%C3%A9%2Bde%2BGoya%2By%2BLucientes%2B(Spanish%2Bpainter%2C%2B1746%E2%80%931828)%2BDo%C3%B1a%2BIsabel%2Bde%2BPorcel%2C%2B1805.jpg', 53),
(77, ' The third of May 1808', 'https://d32dm0rphc51dk.cloudfront.net/m4X41Fun8gpDjn7Gat9cUg/larger.jpg', 53);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`) 
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(12, 'zamberg312@gmail.com', 'zamberg312', '155c5f0d6958466b8209fb5fc9c78f5d');
 
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
