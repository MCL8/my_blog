-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2019 г., 16:39
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `preview_text` text,
  `content` text,
  `category_id` int(11) DEFAULT NULL,
  `pubdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `preview_text`, `content`, `category_id`, `pubdate`, `updated_at`, `views_count`, `rating`) VALUES
(5, 'Pretium Aenean Tristique Nostra Habitant', 'Varius Aliquam Vestibulum Faucibus Consequat', '<h2>Varius Aliquam Vestibulum Faucibus Consequat Placerat</h2>\r\n<p>Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis. Habitasse conubia Nulla posuere suspendisse malesuada convallis arcu a porttitor mauris eu eget mattis orci, pretium morbi. Non dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum. Amet justo rhoncus tincidunt. Torquent duis leo erat ipsum.</p>', 8, '2018-06-09 18:00:00', '2018-08-29 18:00:00', 37, 34),
(6, 'Sagittis Ac', 'Pharetra massa ligula viverra natoque, et torquent dis fames rhoncus. Dictum a mauris dapibus lorem libero. Conubia rhoncus morbi tempus. Penatibus parturient vitae sodales, donec arcu volutpat turpis massa. Lobortis elementum ultrices, etiam pulvinar non ultricies convallis, sit suspendisse mattis condimentum dui hac urna porta quis vel ultrices. Class turpis eget nisi, per nulla nonummy Nullam, curae; nam mus suscipit luctus ultrices, sit senectus quis pharetra', '<h1>Sagittis Ac</h1>\r\n<h2>Sodales Sollicitudin Posuere Consequat Interdum</h2>\r\n<p>Pharetra massa ligula viverra natoque, et torquent dis fames rhoncus. Dictum a mauris dapibus lorem libero. Conubia rhoncus morbi tempus. Penatibus parturient vitae sodales, donec arcu volutpat turpis massa. Lobortis elementum ultrices, etiam pulvinar non ultricies convallis, sit suspendisse mattis condimentum dui hac urna porta quis vel ultrices. Class turpis eget nisi, per nulla nonummy Nullam, curae; nam mus suscipit luctus ultrices, sit senectus quis pharetra cum accumsan mollis dignissim aptent. Montes malesuada aptent integer curae; tincidunt risus tempor platea potenti porttitor arcu, ipsum feugiat inceptos Nascetur senectus urna mattis eros gravida. Purus, cras. Eget. Faucibus vivamus sociis odio felis.</p>', 5, '2018-06-09 18:00:00', '2018-08-28 18:00:00', 70, 477),
(7, 'Risus In', 'Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehic', '<h2>Facilisi Mollis Cum Auctor Torquent Praesent Aenean Sodales</h2>\r\n<p>Etiam quam fermentum, egestas sollicitudin vitae rutrum nulla facilisi. Semper mollis nam vestibulum aptent dictumst vestibulum erat curabitur vivamus. Nec suscipit class fringilla a. Varius dapibus hac adipiscing aenean leo eget eget mi augue morbi justo lacinia pellentesque quis. Eleifend eu interdum pretium aptent vitae sem imperdiet tortor sodales vulputate proin. Taciti enim egestas nunc tempus penatibus eget lobortis risus elit commodo congue vivamus velit viverra ut donec sagittis conubia. Suscipit penatibus proin nonummy fermentum. Risus ac metus iaculis platea purus mi nascetur torquent arcu suscipit faucibus montes fusce, nulla in. Leo eleifend etiam vitae. Cras felis ridiculus leo mattis.</p>', 5, '2018-06-09 18:00:00', '2018-06-14 03:03:00', 30, -21),
(8, 'Dictum Orci Libero', 'Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehic', '<h2>Aenean Pretium Odio</h2>\r\n<p>Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehicula suscipit iaculis enim inceptos potenti hac eros urna molestie iaculis turpis ligula sed. Senectus ad nostra. Hymenaeos lobortis id odio. Sollicitudin varius pretium blandit netus justo augue nostra posuere urna. Aptent, conubia integer aliquet penatibus sit odio orci maecenas, cubilia nisl ipsum justo nam luctus mattis sollicitudin eu dictum amet libero euismod euismod nonummy tincidunt sapien. Nulla nec augue elit consequat adipiscing netus taciti euismod, blandit id. Vehicula ipsum habitasse. Nunc hendrerit. Pellentesque aenean, natoque est vestibulum, donec vel urna penatibus porttitor neque sit. Montes aliquam.</p>', 6, '2018-06-09 18:00:00', '2018-06-14 03:02:55', 106, 32),
(9, 'Aliquam Curae; Convallis Orci Aptent Per Suspendisse Curabitur', 'Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehic', '<h2>Primis Consequat Turpis</h2>\r\n<p>Libero senectus hendrerit erat porta. Nisl Sociosqu dictum dictum porta euismod. Porttitor inceptos sodales potenti, cum, natoque sem euismod quisque cras cum accumsan pellentesque. Nisl erat consectetuer class morbi porta sociis hac elementum maecenas ligula fusce interdum in lorem. Natoque lobortis. Quam facilisis aptent malesuada scelerisque nisl ligula torquent cum integer dapibus varius luctus Cubilia rhoncus molestie tempus aliquam molestie lobortis proin luctus sem massa non. Sed ultricies etiam montes dictum consequat nullam purus vivamus platea per cursus cum accumsan elementum vehicula ultricies aenean placerat, lobortis tincidunt rutrum. Vulputate neque montes turpis condimentum hymenaeos posuere tellus volutpat proin gravida justo.</p>', 4, '2018-06-09 18:00:00', '2018-06-14 03:02:50', 148, -44),
(10, 'Sed Sollicitudin', 'Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehic', '<h2>Phasellus</h2>\r\n<p>Vel conubia ligula id eleifend quis curabitur venenatis turpis suscipit ante facilisis hymenaeos magna duis hendrerit donec lectus natoque ultrices pulvinar elementum sociis maecenas Netus dignissim arcu tincidunt nunc condimentum aliquet suspendisse tristique nec purus sodales vel eros nam a elit metus malesuada facilisis. Interdum nunc aptent sodales risus hymenaeos varius torquent ac lacus facilisi praesent quisque. Fringilla. Nulla congue ligula tincidunt fermentum phasellus ad potenti semper sociis. Varius porta leo quisque dignissim fames. Urna. Aliquam litora magna dictum posuere sagittis accumsan risus mi dapibus turpis adipiscing hendrerit justo tristique malesuada suscipit sapien placerat ultrices aenean consequat dapibus lobortis hendrerit.</p>', 6, '2018-06-09 18:00:00', '2018-06-16 02:47:03', 38, 1074),
(11, 'Mauris Phasellus Sodales Risus', 'Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehic', '<h2>Class Proin Euismod</h2>\r\n<p>Augue. Ligula penatibus cras lobortis eu risus consectetuer malesuada iaculis curabitur scelerisque turpis amet. Elementum congue litora integer sem nibh a. Sollicitudin bibendum massa nunc nunc dignissim augue. Volutpat quisque pulvinar cubilia torquent posuere nisi pretium vehicula, pharetra. Blandit dignissim condimentum tortor fames cursus facilisis pulvinar. Quis montes purus eget. Ultricies ligula torquent euismod vulputate sociosqu mi porta parturient. Natoque libero libero nulla. Habitant. Diam Eget facilisi potenti elementum sed sapien blandit, ornare eleifend fringilla orci gravida augue senectus pellentesque porta aenean purus Nonummy egestas enim duis dapibus non nam ultricies dictumst malesuada cum accumsan proin mollis Diam hac, ultricies.</p>', 9, '2018-06-09 18:00:00', '2018-06-18 08:53:43', 378, 272),
(12, 'Fermentum Vel Diam Habitasse Quis Iaculis', 'Venenatis neque cursus litora Lectus hac. Tincidunt potenti convallis magna interdum magnis, non vehic', '<h2>Euismod Morbi Aenean Class Amet Rhoncus</h2>\r\n<p>Suscipit sit elit placerat nostra viverra sociosqu eget sed cursus litora sociis vitae, dolor nulla class id tempor libero. Laoreet mauris integer est class nascetur nisl class turpis dignissim pede nonummy urna libero ipsum. Sagittis ullamcorper elit hendrerit pharetra vivamus faucibus fames fermentum est bibendum lacus hac primis dui tortor nibh et nonummy ad non sociis imperdiet. Fusce magnis commodo iaculis aliquam vulputate tortor lectus suscipit dui ligula ipsum felis parturient pulvinar nostra senectus tellus eros tempus pulvinar dis vivamus a amet a a conubia dictum proin. Lacus. Ipsum mus dictumst senectus mattis torquent enim consequat blandit. Eleifend ad lacus.</p>', 7, '2018-06-09 18:00:00', '2018-06-17 02:16:54', 183, 3),
(13, 'Voluptatibus eaque laudantium', 'Aperiam et repudiandae minus quod, veritatis dicta assumenda culpa atque ipsam dolore error illum eius mollitia nesciunt maiores excepturi voluptatibus eaque laudantium earum distinctio sunt quaerat, labore?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et repudiandae minus quod, veritatis dicta assumenda culpa atque ipsam dolore error illum eius mollitia nesciunt maiores excepturi voluptatibus eaque laudantium earum distinctio sunt quaerat, labore? Vel quisquam, sed, distinctio, ducimus aperiam cumque explicabo repellat beatae reprehenderit quam nulla fuga iure!', 6, '2018-09-10 06:51:02', NULL, 7, 48),
(14, 'Vel quisquam', 'Vel quisquam, sed, distinctio, ducimus aperiam cumque explicabo repellat beatae reprehenderit quam nulla fuga iure!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et repudiandae minus quod, veritatis dicta assumenda culpa atque ipsam dolore error illum eius mollitia nesciunt maiores excepturi voluptatibus eaque laudantium earum distinctio sunt quaerat, labore? Vel quisquam, sed, distinctio, ducimus aperiam cumque explicabo repellat beatae reprehenderit quam nulla fuga iure!', 6, '2018-09-10 06:51:02', NULL, 7, 0),
(15, 'Eos repudiandae, velit!', 'Voluptatibus eaque laudantium earum distinctio sunt quaerat, labore? Vel quisquam, sed, distinctio, ducimus aperiam cumque explicabo repellat beatae! ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et repudiandae minus quod, veritatis dicta assumenda culpa atque ipsam dolore error illum eius mollitia nesciunt maiores excepturi voluptatibus eaque laudantium earum distinctio sunt quaerat, labore? Vel quisquam, sed, distinctio, ducimus aperiam cumque explicabo repellat beatae reprehenderit quam nulla fuga iure!', 6, '2018-09-10 06:52:34', NULL, 48, 87),
(16, 'Quod rerum, temporibus velit vitae ', 'Consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\nfacilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore enim ex fuga fugit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti fugit obcaecati reiciendis repellendus rerum. Adipisci alias, aperiam, atque aut consectetur consequatur cumque dolorum excepturi id inventore neque nobis porro quam quisquam recusandae reiciendis tenetur totam vero. Adipisci harum molestias natus. Ab aliquam architecto commodi consectetur cupiditate debitis, delectus dolorum et exercitationem fuga fugiat id incidunt, nam neque nobis nostrum obcaecati odit officia, optio pariatur quasi qui rem sed ullam vitae voluptatem voluptatibus. Consectetur fugiat hic laborum nam, nulla placeat quam. Architecto asperiores aspernatur deserunt esse fuga laudantium libero minus nam officiis, perspiciatis quasi, repellat sit suscipit ullam vero voluptate voluptatibus.', 5, '2018-11-28 09:34:36', NULL, 0, 0),
(17, 'Pariatur quasi qui rem', 'Consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\nfacilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore enim ex fuga fugit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti fugit obcaecati reiciendis repellendus rerum. Adipisci alias, aperiam, atque aut consectetur consequatur cumque dolorum excepturi id inventore neque nobis porro quam quisquam recusandae reiciendis tenetur totam vero. Adipisci harum molestias natus. Ab aliquam architecto commodi consectetur cupiditate debitis, delectus dolorum et exercitationem fuga fugiat id incidunt, nam neque nobis nostrum obcaecati odit officia, optio pariatur quasi qui rem sed ullam vitae voluptatem voluptatibus. Consectetur fugiat hic laborum nam, nulla placeat quam. Architecto asperiores aspernatur deserunt esse fuga laudantium libero minus nam officiis, perspiciatis quasi, repellat sit suscipit ullam vero voluptate voluptatibus.', 5, '2018-11-28 09:34:36', NULL, 0, 0),
(18, 'Quod rerum, temporibus velit vitae ', 'Consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\nfacilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore enim ex fuga fugit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti fugit obcaecati reiciendis repellendus rerum. Adipisci alias, aperiam, atque aut consectetur consequatur cumque dolorum excepturi id inventore neque nobis porro quam quisquam recusandae reiciendis tenetur totam vero. Adipisci harum molestias natus. Ab aliquam architecto commodi consectetur cupiditate debitis, delectus dolorum et exercitationem fuga fugiat id incidunt, nam neque nobis nostrum obcaecati odit officia, optio pariatur quasi qui rem sed ullam vitae voluptatem voluptatibus. Consectetur fugiat hic laborum nam, nulla placeat quam. Architecto asperiores aspernatur deserunt esse fuga laudantium libero minus nam officiis, perspiciatis quasi, repellat sit suscipit ullam vero voluptate voluptatibus.', 5, '2018-11-28 09:34:47', NULL, 0, 0),
(19, 'Pariatur quasi qui rem', 'Consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\nfacilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore enim ex fuga fugit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti fugit obcaecati reiciendis repellendus rerum. Adipisci alias, aperiam, atque aut consectetur consequatur cumque dolorum excepturi id inventore neque nobis porro quam quisquam recusandae reiciendis tenetur totam vero. Adipisci harum molestias natus. Ab aliquam architecto commodi consectetur cupiditate debitis, delectus dolorum et exercitationem fuga fugiat id incidunt, nam neque nobis nostrum obcaecati odit officia, optio pariatur quasi qui rem sed ullam vitae voluptatem voluptatibus. Consectetur fugiat hic laborum nam, nulla placeat quam. Architecto asperiores aspernatur deserunt esse fuga laudantium libero minus nam officiis, perspiciatis quasi, repellat sit suscipit ullam vero voluptate voluptatibus.', 5, '2018-11-28 09:34:47', NULL, 0, 0),
(20, 'Nisi non nulla numquam', 'orem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\n facilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore\r\n enim ex fuga fugit illo inventore ipsum iste, itaque iusto laudantium molestias mollitia natus emo, nesciunt non nulla obcaecati quam quia quis quod rerum, temporibus velit vitae voluptatibus voluptatum. Eos repudiandae, velit! Ab asperiores, atque dignissimos dolor dolorem incidunt ipsum neque nesciunt nisi non nulla numquam, pariatur quas quasi, sequi unde ut velit! Ad animi aspernatureius enim est illum iusto laborum, modi molestias odio officiis omnis quos repellat repudiandae rerumtenetur voluptas.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!</p>', 5, '2018-11-28 09:39:23', NULL, 0, 0),
(21, 'Numquam, pariatur quas quasi, sequi unde', 'orem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\n facilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore\r\n enim ex fuga fugit illo inventore ipsum iste, itaque iusto laudantium molestias mollitia natus emo, nesciunt non nulla obcaecati quam quia quis quod rerum, temporibus velit vitae voluptatibus voluptatum. Eos repudiandae, velit! Ab asperiores, atque dignissimos dolor dolorem incidunt ipsum neque nesciunt nisi non nulla numquam, pariatur quas quasi, sequi unde ut velit! Ad animi aspernatureius enim est illum iusto laborum, modi molestias odio officiis omnis quos repellat repudiandae rerumtenetur voluptas.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!</p>', 5, '2018-11-28 09:39:23', NULL, 0, 0),
(22, 'Nisi non nulla numquam', 'orem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\n facilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore\r\n enim ex fuga fugit illo inventore ipsum iste, itaque iusto laudantium molestias mollitia natus emo, nesciunt non nulla obcaecati quam quia quis quod rerum, temporibus velit vitae voluptatibus voluptatum. Eos repudiandae, velit! Ab asperiores, atque dignissimos dolor dolorem incidunt ipsum neque nesciunt nisi non nulla numquam, pariatur quas quasi, sequi unde ut velit! Ad animi aspernatureius enim est illum iusto laborum, modi molestias odio officiis omnis quos repellat repudiandae rerumtenetur voluptas.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!</p>', 5, '2018-11-28 09:39:37', NULL, 0, 0),
(23, 'Numquam, pariatur quas quasi, sequi unde', 'orem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aliquam delectus dolor ducimus\r\n facilis, laudantium obcaecati perspiciatis vero. Ab consectetur cum deleniti deserunt dicta dolore\r\n enim ex fuga fugit illo inventore ipsum iste, itaque iusto laudantium molestias mollitia natus emo, nesciunt non nulla obcaecati quam quia quis quod rerum, temporibus velit vitae voluptatibus voluptatum. Eos repudiandae, velit! Ab asperiores, atque dignissimos dolor dolorem incidunt ipsum neque nesciunt nisi non nulla numquam, pariatur quas quasi, sequi unde ut velit! Ad animi aspernatureius enim est illum iusto laborum, modi molestias odio officiis omnis quos repellat repudiandae rerumtenetur voluptas.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem culpa ex facere laborum numquam quam quia sapiente sint voluptatem!</p>', 5, '2018-11-28 09:39:37', NULL, 2, 0),
(24, 'Varius Aliquam Vestibulum Faucibus Consequat', 'Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis.', '<h2>Varius Aliquam Vestibulum Faucibus Consequat Placerat</h2>\r\n<p>Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis. Habitasse conubia Nulla posuere suspendisse malesuada convallis arcu a porttitor mauris eu eget mattis orci, pretium morbi. Non dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum. Amet justo rhoncus tincidunt. Torquent duis leo erat ipsum.</p>', 6, '2018-11-28 09:41:00', NULL, 0, 0),
(25, 'Quisque laoreet ut vulputate molestie conubia gravida', 'Dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum', '<h2>Varius Aliquam Vestibulum Faucibus Consequat Placerat</h2>\r\n<p>Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis. Habitasse conubia Nulla posuere suspendisse malesuada convallis arcu a porttitor mauris eu eget mattis orci, pretium morbi. Non dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum. Amet justo rhoncus tincidunt. Torquent duis leo erat ipsum.</p>', 6, '2018-11-28 09:41:00', NULL, 2, 0),
(26, 'Varius Aliquam Vestibulum Faucibus Consequat', 'Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis.', '<h2>Varius Aliquam Vestibulum Faucibus Consequat Placerat</h2>\r\n<p>Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis. Habitasse conubia Nulla posuere suspendisse malesuada convallis arcu a porttitor mauris eu eget mattis orci, pretium morbi. Non dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum. Amet justo rhoncus tincidunt. Torquent duis leo erat ipsum.</p>', 6, '2018-11-28 09:41:02', NULL, 6, 0),
(27, 'Quisque laoreet ut vulputate molestie conubia gravida', 'Dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum', '<h2>Varius Aliquam Vestibulum Faucibus Consequat Placerat</h2>\r\n<p>Pede. Quisque laoreet ut vulputate molestie conubia gravida sagittis neque luctus dictum, taciti donec ornare eget congue urna, ut nulla purus lacus quis lobortis rhoncus penatibus vehicula pharetra. Ad metus convallis varius viverra non. Fames facilisis. Habitasse conubia Nulla posuere suspendisse malesuada convallis arcu a porttitor mauris eu eget mattis orci, pretium morbi. Non dapibus nonummy nisl cubilia nulla etiam urna quam pellentesque augue, primis sodales pellentesque per venenatis lacus fermentum penatibus imperdiet commodo dui nullam ullamcorper Feugiat maecenas vitae suscipit egestas elit varius eleifend sem leo inceptos tempus nulla fermentum. Amet justo rhoncus tincidunt. Torquent duis leo erat ipsum.</p>', 6, '2018-11-28 09:41:02', NULL, 21, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Программирование'),
(5, 'Обзоры'),
(6, 'Безопасность'),
(7, 'Мультимедиа'),
(8, 'Игры'),
(9, 'Дизайн'),
(10, 'Разное');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_name`, `email`, `comment_text`, `created_at`, `article_id`) VALUES
(3, 'Mahmud', 'AA@gmail.com', 'laborum labore sed repellat mollitia', '2018-06-09 18:00:00', 5),
(4, 'Kolyan', 'KKK@gmail.com', 'LOL', '2018-06-09 18:00:00', 6),
(5, 'Vladimir', 'vvp1@gmail.com', 'Mmm...', '2018-06-09 18:00:00', 11),
(6, 'Another', 'xxx@gmail.com', 'libero deserunt sed nemo suscipit pariatur molestiae?', '2018-06-09 18:00:00', 9),
(42, '54345', '3453', 'aspernatur', '2018-06-17 00:30:35', 12),
(43, '33', '555', '5', '2018-06-17 02:13:37', 12),
(44, 'admin', 'IGoregrind842@gmail.com', 'ventore ullam quia', '2018-09-05 16:31:13', 6),
(46, 'admin', 'IGoregrind842@gmail.com', 'esse iste adipisci distinctio', '2018-09-05 16:32:25', 7),
(47, 'admin', 'IGoregrind842@gmail.com', '1', '2018-09-05 16:35:51', 7),
(48, 'admin', 'IGoregrind842@gmail.com', '1', '2018-09-05 16:38:55', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(6, 'admin', 'ig.freid@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$NE1rd3czRWw4M3FSVnFvdw$brN9UrUt/RU6wwSJ5i13ATyAaQQEeHyl0qelnccuOgY', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_foreign` (`article_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
