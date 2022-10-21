-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql311.byetcluster.com
-- Generation Time: Oct 21, 2022 at 08:37 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32068285_shinimark`
--

-- --------------------------------------------------------

--
-- Table structure for table `hinds`
--

CREATE TABLE `hinds` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `latest` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinds`
--

INSERT INTO `hinds` (`id`, `name`, `link`, `category`, `current`, `latest`, `status`, `time`) VALUES
(1, 'Yome Ga Kore Na Monde', 'https://manganato.com/manga-ya956435', 'Manga', '11', '11', '0', 1656818146375),
(2, 'Lonely Alien (Hitoribocchi No Chikyuu Shinryaku)', 'https://readmanganato.com/manga-po952897', 'Manga', '0', '78', '0', 1656839068759),
(3, 'Kanojo ga Iru no ni, Betsu no Onnanoko ni Kokuhaku Sareta', 'https://mangakakalot.com/read-av8oj158524511882', 'Manga', '8', '8', '1', 1656839187576),
(4, 'Siscon Ani To Brocon Imouto Ga Shoujiki Ni Nattara', 'https://readmanganato.com/manga-bh978716', 'Manga', '48', '48', '2', 1656839244122),
(5, 'Siscon Ani to Brocon Imouto ga Fuufu ni Nattara Shiawase Sugite Bakuhatsushisou', 'https://mangadex.org/title/e2336915-4adf-462b-96c0-ffc6f637ba6c', 'Manga', '1', '1', '0', 1656839325540),
(6, 'Nidome No Yuusha', 'https://readmanganato.com/manga-bn979196', 'Manga', '11', '11', '1', 1656839372460),
(7, 'Kuchi Ga Saketemo Kimi Niwa - [Oneshot]', 'https://readmanganato.com/manga-ia985409', 'Manga', '3', '3', '0', 1656839427672),
(8, 'Teach Me What Happiness Is [Oneshot]', 'https://readmanganato.com/manga-ir985552', 'Manga', '2', '2', '0', 1656839489158),
(9, 'For My Daughter, I Might Even Be Able to Defeat the Demon King', 'https://readmanganato.com/manga-ut972276', 'Manga', '33', '33', '3', 1656839580062),
(10, 'On The Way Home, I Got A Bride And Twin Daughters, But They Were Dragons', 'https://mangakakalot.com/read-wn1us158504872227', 'Manga', '10', '10', '1', 1656841530629),
(14, 'Kaerizaki ~Wakai Osu to no Bonnou Kozukuri~ | Second Blooming ~Baby Making With a Young Man', 'https://readmanganato.com/manga-lt988628', 'Hentai', '1', '1', '0', 1656841770400),
(15, 'Kore Haha Desu [Oneshot]', 'https://readmanganato.com/manga-ls988627', 'Hentai', '1', '1', '0', 1656841818638),
(16, 'I Am The Sorcerer King', 'https://readmanganato.com/manga-ej981992', 'Manhwa', '143', '143', '0', 1656841887163),
(17, 'Maou no Hajimekata', 'https://readmanganato.com/manga-ki952417', 'Manga', '45', '45', '1', 1656844670410),
(18, 'The Boy in the All-Girls School', 'https://readmanganato.com/manga-bm979295', 'Manga', '0', '473', '1', 1657521426330),
(19, 'Kou 1 Desu ga Isekai de Joushu Hajimemashita', 'https://mangakakalot.com/read-yn3nw158504862503', 'Manga', '44', '44', '1', 1656844824154),
(20, 'My Affair With a Ghostly Girlfriend', 'https://readmanganato.com/manga-jk986567', 'Manhua', '160', '160', '1', 1656845022320),
(21, 'Remake Our Life!', 'https://mangakakalot.com/read-cb8uc158505006738', 'Manga', '0', '31', '1', 1656845128456),
(23, 'My Harem Is Entirely Female Demon Villains', 'https://mangakakalot.com/manga/lx927546', 'Manga', '27', '48', '1', 1657032670219),
(24, 'I Want Your Mother To Be With Me!', 'https://readmanganato.com/manga-fl983068', 'Manga', '26', '33.5', '0', 1657291012685),
(25, 'Banging My Aunt', 'https://hentai3z.com/manga/banging-my-aunt-1/', 'Pornhwa', '45', '45', '1', 1657438601811),
(26, 'The Neighborhood Celebrity', 'https://hentai3z.com/manga/the-neighborhood-celebrity-5/', 'Pornhwa', '37', '37', '1', 1657438591451),
(27, 'Committee Chairman ', 'https://hiperdex.com/manga/committee-chairman-didnt-you-just-masturbate-in-the-bathroom-i-can-see-the-number-of-times-people-orgasm-07/', 'Hentai', '114', '115', '1', 1657438746123),
(28, 'Dear my mother ', 'https://hentai3z.com/manga/dear-my-mother/', 'Hentai', '19', '19', '0', 1657438788830),
(29, 'Unable To Become The Main Force', 'https://readmanganato.com/manga-md989538', 'Manhua', '40.5', '40.5', '3', 1657439109121),
(30, 'Target 1 Billion Points! Open The Ultimate Game Of Second Life!', 'https://readmanganato.com/manga-hy985133', 'Manhua', '0', '67', '1', 1657439259207),
(31, 'Banished Disciple-s Counterattack', 'https://readmanganato.com/manga-hc984537', 'Manhua', '177', '346', '1', 1657439599103),
(32, '1/6 SADAKO IN MY HOME', 'https://manganato.com/manga-oi991565', 'Manga', '24', '24', '0', 1657465233074),
(33, 'Ani to Imouto no Shitai Shitai Shitai Koto', 'https://mangadex.org/title/71c05dbe-2012-4a7b-bc22-4970b7d0afc4/ani-to-imouto-no-shitai-shitai-shitai-koto', 'Manga', '3', '3', '1', 1657520541856),
(34, 'Home Cabaret ~Operation: Making a Cabaret Club at Home so Nii-chan Can Get Used to Girls~', 'https://mangadex.org/title/68daa7ca-809f-4d32-a4fd-f2d2911fec34/home-cabaret-operation-making-a-cabaret-club-at-home-so-nii-chan-can-get-used-to-girls', 'Manga', '5', '5', '1', 1657520650061),
(35, 'Kazoku [Oneshot]', 'https://mangadex.org/title/45414abb-e7e3-4f10-99d1-83979709dc98/kazoku', 'Hentai', '0', '1', '0', 1657520866140),
(36, 'Saotome Shimai Ha Manga No Tame Nara!?', 'https://readmanganato.com/manga-cm979521', 'Manga', '0', '68', '0', 1657521162064),
(37, 'Sekai ka Kanojo ka Erabenai', 'https://mangakakalot.com/read-kc9ff158504896607', 'Manga', '0', '40.6', '0', 1657521360354),
(38, 'Mimibukuro-san no Chiebukuro', 'https://mangakakalot.com/manga/qj923588', 'Manga', '9.5', '9.5', '0', 1657521464176),
(39, 'Kemokko Dobutsuen!', 'https://mangakakalot.com/read-jc2zj158504892913', 'Manga', '26.5', '26.5', '0', 1657521486132),
(40, 'My Little Sister Has Amnesia', 'https://mangadex.org/title/a15e3ae9-7a36-4131-a271-f2dbf885e0b1/shoujo-no-a-squeezecandyheaven-soushuuhen', 'Hentai', '6', '6', '0', 1657530938183),
(41, 'Drink and Swallow [Oneshot]', 'https://mangadex.org/title/ed7d9195-65f1-4d9b-83c7-284f82d7dc81/drink-and-swallow', 'Hentai', '1', '1', '0', 1657532171675),
(42, 'The Uninvited Stepsister [Oneshot]', 'https://mangadex.org/title/daab531a-2fe6-4178-8df2-70efb3f85c1d/the-uninvited-stepsister', 'Hentai', '1', '1', '0', 1657617657354),
(45, 'Sassy-Sister Complex!', 'https://mangadex.org/title/c021e67f-ced2-499d-9f5a-e7ead915c1e2/sassy-sister-complex', 'Hentai', '0', '4', '1', 1657614535794),
(46, 'Ane wa Yanmama Juniuuchuu in Atami Da~!!', 'https://mangadex.org/title/f9706976-db1c-4b70-afe8-648af8c01de2/ane-wa-yanmama-juniuuchuu-in-atami-da', 'Hentai', '2.5', '2.5', '0', 1657532864549),
(47, 'Nee-chan no Sakauramix [Oneshot]', 'https://mangadex.org/title/a494cfee-5293-4d37-b316-a2634700f474/nee-chan-no-sakauramix', 'Hentai', '1', '1', '0', 1657533119040),
(48, 'Megamori Milky Pie', 'https://mangadex.org/title/67e9ab23-3737-4254-9c24-2c0fe508e323/megamori-milky-pie', 'Hentai', '0', '5', '0', 1657533466460),
(50, 'Climbing to The Top of the Esper Academy', 'https://mangadex.org/title/c02166b7-4a35-43a9-976c-0b354d831bab/climbing-to-the-top-of-the-esper-academy', 'Hentai', '12', '12', '0', 1657623566347),
(52, 'Sexless no Kibo ga guigui Semete kuru [Oneshot]', 'https://mangadex.org/title/1fc4ccf7-1301-4554-a127-86b5a52c6cdc/sexless-no-kibo-ga-guigui-semete-kuru', 'Hentai', '1', '1', '0', 1657610568578),
(53, 'Ane ga Kensei de Imouto ga Kenja de', 'https://rawkuma.com/manga/ane-ga-kensei-de-imouto-ga-kenja-de/', 'Manga', '0', '18', '1', 1657611727897),
(54, 'Kazokukan Ecchi Manga [Oneshot]', 'https://mangadex.org/title/b5190af1-308e-4adf-9491-aef3fc4bc02b/kazokukan-ecchi-manga', 'Hentai', '1', '1', '0', 1657611959453),
(55, 'Bibo Soukan', '', 'Hentai', '0', '8', '0', 1657612247904),
(56, 'Flower Garden of Temptation', 'https://mangadex.org/title/a80243e3-4d66-41ca-8ee2-853764ed0bd1/flower-garden-of-temptation', 'Hentai', '0', '10', '0', 1657612404848),
(57, 'BroConflict [Oneshot]', 'https://mangadex.org/title/9739c5e7-a148-4785-897b-026b3e96febf/broconflict', 'Hentai', '1', '1', '0', 1657612539995),
(58, 'Dosukebe Onei-chan', 'https://mangadex.org/title/08bf6107-625f-42c8-bad3-4aea5a6f1efa/dosukebe-onei-chan', 'Hentai', '1', '11.5', '0', 1657613196038),
(59, 'Konjiki no Moji Tsukai - Yuusha Yonin ni Makikomareta Unique Cheat', 'https://readmanganato.com/manga-nm952721', 'Manga', '82', '82', '1', 1657614216144),
(60, 'My Way of Killing Gods In Another World', 'https://readmanganato.com/manga-lu989303', 'Manhua', '30', '58', '1', 1664130348495),
(61, 'Maou to Ore no Hangyakuki', 'https://readmanganato.com/manga-mi989743', 'Manga', '35', '35', '1', 1657614314312),
(62, 'His Place ', 'https://hentai3z.com/manga/his-place/', 'Pornhwa', '176.5', '176.5', '0', 1657614364094),
(63, 'Hahakogui', 'https://mangadex.org/title/e75fe250-baa2-4ac3-9aeb-fbdef5246f10/hahakogui', 'Hentai', '1', '7.3', '0', 1657624205159),
(64, 'Natsume-ke no Nichijou', 'https://mangadex.org/title/e436d4f4-aef0-430e-a346-bb644814edae/natsume-ke-no-nichijou', 'Hentai', '0', '3', '0', 1657624266723),
(65, 'My three horny mom', 'https://mangadex.org/title/57300ff0-914d-4296-86e4-3f4f85b9c90d/my-three-horny-moms', 'Hentai', '8', '8', '0', 1660393329693),
(66, 'ShiKi OroOri', 'https://mangadex.org/title/4095a5f9-3f3a-4cb0-9750-d5e2ca67ae82/shiki-oroori', 'Hentai', '9.5', '9.5', '0', 1659363554388),
(67, 'Sister Removal Declaration', 'https://mangadex.org/title/336b2519-33ee-4b73-9b7c-71728ee814ab/sister-removal-declaration', 'Hentai', '12.5', '12.5', '0', 1659363373317),
(68, 'H na onegai', 'https://mangadex.org/title/7aa324b2-9756-40c9-aca0-effbc652b5bc/sex-please', 'Hentai', '10', '10', '0', 1657644476305),
(69, 'Bitch na In`ane-sama', 'https://mangadex.org/title/053410d0-39ed-4e30-8aa0-b2ba12021234/bitch-na-in-ane-sama', 'Hentai', '7', '7', '0', 1657723781056),
(70, 'M.E.M.O.R.I.Z.E.', 'https://readmanganato.com/manga-jo986949', 'Manhwa', '100', '100', '1', 1657646939744),
(71, 'Excuse me, This is my Room', 'https://hentai3z.com/manga/excuse-me-this-is-my-room-6/', 'Pornhwa', '120', '120', '0', 1657698594417),
(72, 'My Neighbors Are Aliens', 'https://mangadex.org/title/5bf31610-45ac-4fea-a905-1f03dc94b3c4/my-neighbors-are-aliens', 'Hentai', '0', '8', '0', 1657723761684),
(73, 'Solo Leveling', 'https://readmanganato.com/manga-dr980474', 'Manhwa', '179', '179', '2', 1657731242796),
(74, 'An Evil Dragon That Was Sealed Away For 300 Years Became My Friend', 'https://mangakakalot.com/read-qv7pb158524511076', 'Manga', '32', '32', '3', 1657775065345),
(75, 'SSS-Class Suicide Hunter', 'https://readmanganato.com/manga-ko987549', 'Manhwa', '80', '80', '2', 1657813719829),
(76, 'Secret Class', 'https://hentai3z.com/manga/secret-class-8/', 'Pornhwa', '135', '135', '1', 1657887220817),
(77, 'Kekkon Yubiwa Monogatari', 'https://mangakakalot.com/read-yd3ev158504850815', 'Manga', '36', '70', '1', 1657899250473),
(78, 'Mashle', 'https://readmanganato.com/manga-hu985203', 'Manga', '90', '120', '1', 1661100007032),
(79, 'Survive on a deserted island with beautiful girls', 'https://readmanganato.com/manga-jv987178', 'Manhua', '110', '185', '1', 1657899325429),
(80, 'Rebirth of Abandoned Young Master', 'https://readmanganato.com/manga-hd984760', 'Manhua', '235', '250', '1', 1657899360990),
(81, 'Yandere Imouto ni Aisaresugite Kozukuri Kankin Seikatsu THE COMIC', 'https://mangadex.org/title/cc0fb464-6c71-42f6-8e4a-422041f4af46/yandere-imouto-ni-aisaresugite-kozukuri-kankin-seikatsu-the-comic', 'Manga', '1', '1', '1', 1657902896254),
(82, 'Imouto ga Ichi Nichi Ikkai Shika Me wo Awasete Kurenai', 'https://mangadex.org/title/b594962d-bb5a-4e57-880e-21f5864b08b1/imouto-ga-ichi-nichi-ikkai-shika-me-wo-awasete-kurenai', 'Manga', '6', '6', '1', 1657903015959),
(83, 'Kinjo Yuuwaku Musuko o Yobai ni Sasou Haha Hen [Oneshot]', 'https://mangadex.org/title/6d572eaf-8539-4953-bc32-a4acd133803d/kinjo-yuuwaku-musuko-o-yobai-ni-sasou-haha-hen?tab=chapters', 'Hentai', '4', '4', '1', 1658038420894),
(84, 'Lovemare', 'https://mangadex.org/chapter/98b6790c-aad8-4a30-a37a-e721e33e9c11/1', 'Hentai', '13', '13', '0', 1657993788499),
(85, 'Kyuuketsuki no Inshitsuai', 'https://mangakakalot.com/manga/pn928252', 'Manga', '8', '8', '0', 1658212614237),
(86, 'HUMAN RANCH', 'https://manganato.com/manga-is985901', 'Manga', '27', '27', '0', 1659702143575),
(87, 'Hakoniwa Oukoku no Souzoushu-sama', 'https://mangakakalot.com/read-ap3le158524534881', 'Manga', '15', '31', '1', 1658316067271),
(88, 'I Have A Mansion In The Post-Apocalyptic World', 'https://readmanganato.com/manga-do980749', 'Manhua', '253', '539', '1', 1660199987271),
(89, 'I am The Great Immortal', 'https://readmanganato.com/manga-gc983811', 'Manhua', '354', '449', '1', 1663871071892),
(90, 'Jungle Juice ', 'https://readmanganato.com/manga-kp987650', 'Manhwa', '83', '83', '2', 1658584987894),
(91, 'Maxed Out Leveling', 'https://readmanganato.com/manga-mx990132', 'Manhwa', '53', '53', '2', 1658731621063),
(92, 'Spare Me, Great Lord!', 'https://readmanganato.com/manga-ga984235', 'Manga', '488', '541', '1', 1665236175289),
(93, 'I Am A God Of Medicine', 'https://manganato.com/manga-jz986434', 'Manhua', '15', '51', '1', 1659362670814),
(94, 'Tono No Kanri O Shite Miyou', 'https://manganato.com/manga-dg980789', 'Manga', '18', '48', '1', 1659455185945),
(95, 'Re:Monster', 'https://readmanganato.com/manga-se953187', 'Manga', '82', '82', '1', 1659702092040),
(96, 'Hairankai', 'https://mangadex.org/title/956e83df-e623-4ba4-875d-189896b84b9e/hairankai', 'Hentai', '8', '8', '0', 1659814197067),
(97, 'Leveling With The Gods', 'https://readmanganato.com/manga-ml989546', 'Manhwa', '61', '61', '2', 1660074225827),
(98, 'Talent-Swallowing Magician', 'https://readmanganato.com/manga-ni990391', 'Manhwa', '40', '40', '1', 1660074199156),
(99, 'Gigantis', 'https://mangakakalot.com/manga/jd927309', 'Manga', '0', '7', '1', 1660074304309),
(100, 'A Story about Living with a Ghost who will Attain Enlightenment in a Year. ', 'https://mangakakalot.com/manga/vf925754', 'Manga', '19', '19', '0', 1660112078047),
(101, 'Ghost Love', 'https://readmanganato.com/manga-up971372', 'Manhwa', '0', '63.5', '2', 1660157790347),
(102, 'Trapped in the Academy&amp;#39s Eroge', 'https://hentai3z.com/manga/trapped-in-the-academys-eroge/', 'Pornhwa', '5', '11', '1', 1660198344796),
(103, 'I Was Summoned By The Demon Lord, But I Can&amp;#39;t Understand Her Language', 'https://readmanganato.com/manga-is985527', 'Manga', '0', '31', '0', 1660203215437),
(104, 'The Drifting Classroom', 'https://readmanganato.com/manga-dg981163', 'Manhua', '20', '65', '1', 1660203376906),
(105, 'Apartment Ghost', 'https://readmanganato.com/manga-ix985706', 'Manga', '0', '10', '0', 1660203413434),
(106, 'A Story about Living with a Ghost who will Attain Enlightenment in a Year.', 'https://mangakakalot.com/manga/vf925754', 'Manga', '19', '19', '0', 1660203446605),
(107, 'Hagure Seirei Ino Shinsatsu Kiroku ~ Seijo Kishi-dan to Iyashi no Kamiwaza ~', 'https://mangakakalot.com/read-aw0xl158504891029', 'Manga', '0', '13', '1', 1660203505589),
(108, 'Sister&amp;#39;s Sex Education', 'https://mangakakalot.com/manga/au926901', 'Pornhwa', '41', '41', '0', 1660203527365),
(109, 'World&amp;#39;s End Harem', 'https://readmanganato.com/manga-uu971429', 'Manga', '0', '89', '0', 1660203652749),
(110, 'Dragon King&amp;#39;s Son-in-law', 'https://readmanganato.com/manga-mu990055', 'Manhwa', '94', '94', '1', 1660302079447),
(111, 'Earth Savior Selection', 'https://manganato.com/manga-mx989606', 'Manhwa', '16', '42', '1', 1660326262245),
(112, 'Life On An Uninhabited Planet With An Android', 'https://manganato.com/manga-nh991342', 'Manga', '100', '100', '0', 1660359909236),
(113, 'Reincarnation Of The Suicidal Battle God', 'https://readmanganato.com/manga-lu989229', 'Manhwa', '60', '60', '2', 1660360026983),
(114, 'Murabito Tensei: Saikyou no Slow Life', 'https://mangadex.org/title/f0933b14-091a-4540-a395-287e38f74260/murabito-tensei-saikyou-no-slow-life', 'Manga', '0', '35', '1', 1660594293045),
(115, 'Murabito Tensei: Saikyou no Slow Life [RAW]', 'https://rawkuma.com/manga/murabito-tensei-saikyou-no-slow-life/', 'Manga', '0', '51.3', '1', 1660594445878),
(116, 'The Return Of The Disaster-Class Hero', 'https://readmanganato.com/manga-md990338', 'Manhwa', '48', '48', '2', 1660913467851),
(117, 'My First Time is withâ€¦. My Little Sister?!', 'https://hentai3z.com/manga/my-first-time-is-with-my-little-sister/', 'Hentai', '5', '78', '1', 1660947011408),
(118, 'Cultivating the supreme dantian', 'https://readmanganato.com/manga-ld988838', 'Manhua', '101', '154', '1', 1661183250166),
(119, 'The Reincarnated Inferior Magic Swordsman ', 'https://readmanganato.com/manga-jd986360', 'Manga', '70', '70', '1', 1661195758082),
(120, 'Water Overflow ', 'https://manga18hot.net/manga-water-overflow.html', 'Pornhwa', '74', '74', '1', 1662207560735),
(121, 'Suki Na Ko Ga Megane Wo Wasureta', 'https://manganato.com/manga-ea981357', 'Manga', '66', '92', '1', 1662207536845),
(122, 'Yancha Gal No Anjou-San', 'https://readmanganato.com/manga-bu979003', 'Manga', '36', '129', '1', 1662207585430),
(123, 'The Healing Priest Of The Sun ', 'https://readmanganato.com/manga-nt990576', 'Manhwa', '48', '48', '2', 1662239155936),
(124, 'Hoarding In Hell ', 'https://readmanganato.com/manga-nf990362', 'Manhwa', '40', '40', '2', 1662783968404),
(126, 'Jigoku no Gouka de Yaka re Tsuzuketa Shounen. Saikyou no Honou Tsukai to Natte Fukkatsu Suru.', 'https://mangakakalot.com/manga/ia925015', 'Manga', '105', '105', '3', 1662881808843),
(127, 'Shimoeda-san chi no Akarui Shokutaku', 'https://hentairead.com/hentai/shimoeda-san-chi-no-akarui-shokutaku/', 'Hentai', '1', '1', '0', 1662906124219),
(128, 'Jukujo Daisuki : Naomi-san (40-sai) 1-5 + Epilogue', 'https://hentairead.com/hentai/jukujo-daisuki-naomi-san-40-sai-1-5-plus-epilogue/', 'Hentai', '1', '6', '0', 1662911539155),
(129, 'Boku no Aderia', 'https://mangakakalot.com/manga/ma929164', 'Manga', '34', '34', '2', 1663126181886),
(130, 'Awakening SSS-Rank skill after a Kiss', 'https://readmanganato.com/manga-nz990608', 'Manhua', '66', '79', '1', 1663260010340),
(131, 'Heroic Chronicles Of The Three Continents ', 'https://readmanganato.com/manga-kp987372', 'Manga', '19.2', '19.2', '2', 1663576871429),
(132, 'Autophagy Regulation', 'https://readmanganato.com/manga-mr952626', 'Manhua', '3', '328', '1', 1663870950267),
(133, 'Valhalla penis mansion', 'https://readmanganato.com/manga-mn989548', 'Hentai', '17', '17', '1', 1663959121818),
(134, 'The World After the Fall', 'https://readmanganato.com/manga-nb990510', 'Manhwa', '0', '40', '1', 1664001226953),
(136, 'Phantom High', 'https://readmanganato.com/manga-ny990681', 'Manhwa', '0', '132', '1', 1664130458709),
(137, 'Dungeon master', 'https://readmanganato.com/manga-ds980601', 'Manhwa', '134', '140', '1', 1664546703365),
(138, 'I just want to be killed', 'https://mangakakalot.com/manga/mx927416', 'Manhua', '110', '112', '1', 1664718656371),
(139, 'If I Die, I will Be Invincible', 'https://readmanganato.com/manga-ok991793', 'Manhua', '0', '20', '1', 1664718767323),
(140, '100,000 Levels of Body Refining : All the dogs I raise are the Emperor', 'https://readmanganato.com/manga-lt988502', 'Manhua', '185', '187', '1', 1664718823223),
(141, 'Childhood Bride', 'https://readmanganato.com/manga-or991500', 'Pornhwa', '0', '21', '1', 1664718888332),
(142, 'Max Level Returner', 'https://readmanganato.com/manga-jy987133', 'Manhwa', '177', '183', '1', 1664719045541),
(143, 'Legend of Star General', 'https://readmanganato.com/manga-nn990370', 'Manhwa', '71', '72', '1', 1664719113308),
(144, 'Mezametara saikyou soubi to uchuusen-mochi datta no de, ikkodate mezashite youhei toshite jiyuu ni ikitai', 'https://readmanganato.com/manga-gq984273', 'Manga', '0', '26.2', '1', 1664719449018),
(145, 'Kyoukai Meikyuu to Ikai no Majutsushi', 'https://readmanganato.com/manga-ce979561', 'Manga', '0', '50', '1', 1664719546533),
(149, 'Mother Hunting', 'https://readmanganato.com/manga-oa991757', 'Pornhwa', '88', '88', '0', 1664937788164),
(150, 'Wicked Trapper: Hunter Of Heroes ', 'https://readmanganato.com/manga-gq983899', 'Manga', '20', '20', '2', 1664953410966),
(152, 'Level Up Alone', 'https://chapmanganato.com/manga-jf987288', 'Manga', '110', '110', '2', 1666356036274);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hinds`
--
ALTER TABLE `hinds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hinds`
--
ALTER TABLE `hinds`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
