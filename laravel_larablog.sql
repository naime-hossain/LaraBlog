-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 11:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_larablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'uncategorized', '2017-06-23 04:23:18', '2017-06-23 04:23:18'),
(2, 'Energy and power', '2017-06-23 04:23:18', '2017-06-23 04:23:18'),
(3, 'laravel', '2017-06-23 16:45:51', '2017-06-23 16:45:51'),
(4, 'short story', '2017-07-08 10:10:43', '2017-07-08 10:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2017_05_30_201715_create_roles_table', 1),
(38, '2017_06_03_013658_Photo', 1),
(39, '2017_06_10_145514_create_posts_table', 1),
(40, '2017_06_11_035042_create_categories_table', 1),
(41, '2017_06_16_000817_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'naime2689777327.jpg', '2017-06-23 04:23:18', '2017-06-23 04:23:18'),
(4, 'sakib1286038021thumnail.JPG', '2017-06-23 16:45:51', '2017-06-23 16:45:51'),
(6, 'sakib17319702521.jpg', '2017-06-23 16:49:32', '2017-06-23 16:49:32'),
(7, '1132126536502676407avatar.jpg', '2017-06-24 06:07:04', '2017-06-24 06:07:04'),
(8, 'naime1294218863232932591bg3.jpeg', '2017-06-24 06:20:39', '2017-06-24 06:20:39'),
(10, 'naime987834535104.jpg', '2017-06-30 21:45:42', '2017-06-30 21:45:42'),
(11, '497668121258610628christian.jpg', '2017-06-30 21:48:19', '2017-06-30 21:48:19'),
(12, '6544290691891194_457751420993291_11964599_n.jpg', '2017-07-08 07:25:57', '2017-07-08 07:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `photo_id`, `category_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(63, 97, 9, 3, 'Qui et magni enim sed ipsum sunt sed.', 'Odit tempora minus id illum aliquam. Earum doloribus voluptas dicta. Libero deserunt earum id.\nPerspiciatis earum rerum quia ut officiis. Vel reiciendis ut aut tenetur enim iusto enim autem. Ut quae non praesentium mollitia.\nIste consequatur facilis quia et. Facere consectetur soluta et dolore ut eum. Amet similique omnis modi laudantium cum.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(64, 70, 6, 1, 'Velit ipsa illum aut qui sed.', 'Quam aut ut sequi ut corrupti omnis eum. Corporis iure laborum quis exercitationem cumque. Quia et esse quia non quasi aut.\nVoluptatem molestias quibusdam cum facere ut rerum omnis ipsam. Adipisci assumenda id voluptatem consequatur. Et pariatur tenetur reiciendis sit earum quia repellendus.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(65, 60, 3, 1, 'Quia hic ipsa sunt nisi sed harum.', 'Cum amet error repellendus omnis optio omnis atque qui. Optio et omnis vel non dicta voluptatem neque sint. Repellendus aut quos aliquam ea rerum nisi. Voluptatem quaerat cumque sequi a soluta.\nQui inventore consequatur rerum. Omnis eaque facere hic. Perferendis maiores qui qui eius quisquam. Repellat et corrupti quo corporis voluptas.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(66, 62, 6, 1, 'Hic non sequi excepturi ut architecto harum.', 'Doloremque rerum ea doloribus facilis quia. Et reprehenderit sit dolorem eum distinctio accusamus exercitationem.\nCorrupti quia saepe ad aliquid quo. Eum doloribus fuga repellendus dolor et placeat error. Doloribus odit quas iste ut cupiditate officiis rerum aut.\nIure eos voluptas nihil qui. Voluptas ut excepturi est quo. Dicta sed soluta facere adipisci dolorem vero quia.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(67, 62, 2, 2, 'Rerum et laboriosam rerum quod.', 'Corporis quae doloremque aperiam a possimus vel illo unde. Est iste rem ut. Quod omnis accusamus accusantium aliquid.\nNihil laborum rerum dolore cum omnis suscipit provident. Eos quam et accusamus ullam non. Magnam autem voluptas repellat provident facilis.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(68, 61, 7, 2, 'Sit et nulla repudiandae voluptatum debitis.', 'Animi tenetur a non blanditiis nobis pariatur. Distinctio sit placeat corrupti dolores. Laborum dignissimos dolorum molestiae dicta praesentium consequatur. Minus magnam dignissimos earum odit voluptatem error quo.\nDignissimos aperiam in tempora rerum. Delectus facilis quia sunt consequatur omnis.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(69, 94, 5, 1, 'Quo qui iusto itaque ad ut adipisci.', 'Ut quaerat alias voluptatem aut. Autem distinctio excepturi soluta est ipsum quia. Eos quis dolor asperiores doloribus amet totam ex eveniet. Facere omnis magni corporis ut.\nTempore quidem expedita consequatur quia tempore nihil aut. Architecto qui optio qui accusamus molestiae non alias. Quis pariatur sit voluptas voluptatibus et fugit. Ut voluptatibus sunt aut minima debitis qui quia.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(70, 85, 6, 2, 'Aspernatur similique nisi nihil tempora.', 'Est et deserunt eaque non illum enim placeat. Culpa reiciendis illo doloremque aut aliquid. Est consequuntur aliquid unde quaerat et et. Fuga beatae placeat et ut delectus voluptatem.\nPariatur et enim incidunt veritatis similique voluptas labore ut. Molestiae in doloremque veritatis consectetur recusandae. Est occaecati consequatur et dolor.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(71, 85, 8, 2, 'Exercitationem a voluptates quos minima magnam.', 'Quo veritatis enim sequi. Provident tempore ut fugiat ducimus impedit autem. Nihil et voluptatibus similique. Sed vitae magni voluptas expedita qui qui tempora.\nReprehenderit enim sint qui qui quidem ad. Et sit dolorem tenetur saepe assumenda. Vel aut iste exercitationem dolorem odit voluptas. Exercitationem rerum esse tenetur ullam optio nemo. Repellat nisi optio impedit deserunt facere sed.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(72, 74, 3, 1, 'Quis amet et animi nesciunt voluptatum sed magni.', 'Illo officia et officiis quidem nesciunt libero corporis. Aut numquam sunt tempora voluptas est et dolorem.\nAspernatur quod voluptas voluptas ut soluta. Iusto autem perferendis ratione expedita libero sit ratione dolore. Quos eveniet sit aut suscipit maiores rem voluptas.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(73, 82, 7, 3, 'Voluptates autem cumque aperiam tenetur quos.', 'Dolorum non sed repudiandae nemo accusantium odit. Quia expedita accusamus quia placeat sint. Consectetur suscipit esse recusandae rerum. Deserunt vel ipsa accusantium nostrum.\nMolestiae pariatur omnis commodi magnam molestiae. Porro corporis consequuntur accusantium qui beatae dicta a.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(74, 64, 6, 3, 'Et ex qui rerum deserunt doloribus rerum.', 'Omnis illo quo exercitationem eum eum qui. Quia ducimus pariatur fugit numquam. Autem quaerat sequi aut illo. Eveniet suscipit aut delectus et laboriosam ea.\nMinima consequatur labore tenetur ducimus quo. Aut et cum et pariatur occaecati. Tempore libero quo eum quas.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(75, 85, 9, 1, 'Atque aut odit illum.', 'Temporibus aperiam voluptatem rerum aut. Sed et quo est aperiam voluptates eum quia. Et maiores aut dolor pariatur. Aut quae et illo.\nAb soluta dolore libero sapiente iste. Rem temporibus in ipsa numquam aliquam eos deleniti. Maxime omnis sunt labore non exercitationem laborum velit.\nA explicabo nulla eum rerum molestiae consequatur hic autem. Maiores dolor perferendis nobis minima dolores amet.', '2017-06-28 11:46:38', '2017-06-28 11:46:38'),
(76, 65, 8, 1, 'Fuga eaque natus esse doloribus fugiat nisi.', 'Minima cupiditate eum dolor voluptas aliquid aut omnis. Atque voluptatem perspiciatis consequatur itaque pariatur impedit esse. Iusto accusantium ea occaecati blanditiis unde qui. Et et est dolor nobis. Distinctio qui est non esse.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(77, 81, 5, 2, 'Alias qui est reprehenderit voluptate.', 'Dolorem iure ea quaerat explicabo sunt est temporibus incidunt. Aut illo natus molestiae in voluptas voluptate. Quidem consectetur et et sunt. Cum cumque non sit laudantium iusto qui et.\nQuia dolores sed illo ipsam est sapiente. Ut eaque consectetur laboriosam praesentium itaque eos. Et esse reiciendis consequatur. Quia amet impedit praesentium consectetur dolor porro eveniet.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(78, 100, 4, 1, 'Dolores et expedita iusto et illo et.', 'Reprehenderit ut nobis dolores. Quos recusandae similique cupiditate esse deserunt. Delectus cupiditate exercitationem omnis et quo. Amet dolorem quia temporibus voluptas architecto ut.\nQuo debitis tenetur quis esse. Dolore rerum perferendis id et corporis debitis rerum. Ad placeat sint provident est voluptate recusandae libero et. Enim fuga rerum quo dolorum et temporibus.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(79, 80, 7, 1, 'Voluptatem eum nihil sint.', 'Impedit molestias nobis voluptatum praesentium. Sapiente et et hic voluptatibus voluptatem. Aut recusandae aspernatur nulla animi ut velit ipsam. Fugit molestias ipsa est quidem minima aspernatur.\nEt fuga incidunt rerum aut. Cum quaerat ducimus sed non et ut qui nam. Aut quo voluptatum in ad.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(80, 56, 9, 2, 'Est et qui ut doloribus temporibus.', 'Eum aut porro vero ea rem in cumque vero. Vitae qui vero quo sed voluptas illum porro. Aperiam non velit aspernatur quod et ut rerum.\nSunt voluptas qui quis culpa sed et. Cum assumenda placeat nihil. Et aut modi dolor voluptas.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(81, 100, 4, 1, 'Voluptas non quisquam quia ipsum.', 'Laborum reiciendis dolor laudantium ut nam dolores dolorem. Ut sapiente minus voluptates libero harum sunt temporibus. Asperiores quibusdam exercitationem necessitatibus reprehenderit in.\nEt nihil nam exercitationem. Sed veritatis soluta eos aspernatur autem omnis. Voluptatem aut in corporis et. Officia repellendus nostrum non dolores ea vitae. Eligendi rerum atque quod natus enim.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(82, 81, 6, 2, 'Blanditiis qui quam possimus.', 'Pariatur eum aut iste quo blanditiis ad. Reiciendis placeat fugiat minima nostrum sed.\nNihil amet minima maxime adipisci. Nisi earum quia laboriosam ea non quis. Maiores omnis unde earum beatae. Ut vel natus repellendus voluptas dolores sunt.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(83, 88, 5, 3, 'Libero a est cum et quas.', 'Nihil beatae voluptatem sint provident aspernatur voluptatem pariatur. Esse voluptatem qui at natus asperiores vero et quas. Perspiciatis omnis eos inventore dolorum repellendus cum.\nEt alias laboriosam porro fuga et qui rerum. Distinctio provident minima corporis voluptatem. Consequuntur iusto eum similique illum dolore asperiores est. Est iusto voluptate nihil dignissimos.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(84, 63, 2, 1, 'Reprehenderit architecto ea quas in.', 'Tempore earum nihil eveniet dolorum qui. Rerum laboriosam quidem ex totam. Illo asperiores aspernatur odio consequuntur alias aut provident. Eos quia a a animi sit ipsa magnam voluptate. Est quaerat laudantium eveniet soluta.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(85, 64, 6, 1, 'Unde autem laboriosam veniam quo.', 'Quos numquam quam aut reiciendis inventore non sapiente. Debitis tenetur dolores iure aut rerum. Et alias commodi et rerum. Ea qui labore voluptatem dolores ipsam.\nNam rem velit quo vel pariatur ad eaque commodi. Nobis quia alias ab ullam. Deserunt qui magni doloremque neque hic rem vero. In maiores ut nam.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(86, 80, 2, 2, 'Asperiores deleniti iure corrupti modi.', 'Iste neque veniam ut similique possimus eum. Quasi voluptas fugit ut vero. Omnis perspiciatis aut accusamus dolores atque. Esse ipsum laborum ipsa laboriosam explicabo odit placeat eum.\nReprehenderit quia veritatis quisquam saepe. Hic reiciendis fuga aut explicabo voluptatem nam sed. Modi mollitia culpa facilis quis. Similique quam aut ut quam et.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(87, 99, 4, 1, 'Voluptatum repellendus qui ipsum consequatur.', 'Est qui voluptatem dolorem aspernatur omnis aut deleniti. Excepturi eveniet et explicabo expedita consequatur quis. Voluptatem magnam modi itaque omnis nulla non consequuntur. Quisquam quod omnis provident quidem nemo sit.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(88, 81, 6, 2, 'Voluptatum ut quo possimus maiores sed.', 'Perspiciatis iusto assumenda et quia ducimus deserunt ullam. Ut velit sed ut repudiandae sit aut qui. Aut pariatur consequatur omnis qui.\nFuga neque sequi cupiditate itaque sunt ex. Odit iste ad dolorum illum tempore quam. Officiis rerum vel est. Facilis aut numquam impedit voluptatem dolore ab.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(89, 91, 4, 1, 'Ratione recusandae illum delectus qui optio.', 'Magnam libero eos esse placeat voluptas autem. Non at pariatur consectetur modi voluptatem necessitatibus voluptas. Deleniti et nemo reprehenderit officia debitis aut.\nVoluptatem voluptatem aut placeat autem est et. Quos hic exercitationem velit perferendis inventore dolores. Sed consequatur expedita rem ad modi nulla nam. Voluptate accusantium nihil voluptatem.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(90, 66, 5, 2, 'Libero accusamus velit vitae libero.', 'Sunt dignissimos fugit laborum fuga sit. Velit reiciendis nostrum est quod aut quisquam. Ipsum animi est nihil quam molestiae. Veniam ut vitae at sed. Non veniam beatae temporibus aliquid.\nSit occaecati provident odit voluptas. A molestiae quisquam illo. Corporis dolorum tempore dignissimos perferendis qui hic adipisci perferendis. Est natus ipsum nobis illum ut libero.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(91, 87, 9, 1, 'In dolores nesciunt impedit repudiandae.', 'Et qui et praesentium sapiente asperiores. Adipisci repellendus minima ut maxime fuga officia et numquam. Consequuntur aspernatur praesentium et deleniti quod repudiandae et iure. Qui adipisci ipsam voluptatibus rerum qui est qui similique.\nSed dolor voluptatem sint mollitia quae repellat sint minima. Maiores quisquam qui in quis et. Consequatur odit voluptatem quia velit.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(92, 70, 7, 2, 'Unde et dicta impedit totam.', 'Qui quia saepe animi qui est ipsam. Veritatis quia amet modi quis laudantium alias qui. Culpa sunt numquam debitis eum accusantium. Nisi consequatur nisi quo eum.\nCulpa necessitatibus cupiditate eos enim vel quidem aliquam impedit. Praesentium quae nesciunt nisi et suscipit ipsam. Dolorum commodi occaecati aut cumque sed.\nLaborum ut et magnam eos. Fugit saepe repellat in quod.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(93, 62, 8, 1, 'Officia debitis cum facere ullam ut ipsa.', 'Quo ipsa ratione harum et fuga sit quod. Accusamus maiores ut minus omnis sunt ducimus incidunt. Id perspiciatis voluptas omnis. Et et praesentium dolor odit quasi consectetur dolore.\nSoluta dolores rerum nihil alias. Error voluptatem dolore quia temporibus qui consequuntur quis dolor. Sed dolor animi cumque nobis.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(94, 80, 7, 2, 'Fuga praesentium libero libero.', 'Voluptatem velit labore consequatur dolore unde. Ducimus est mollitia eum consequuntur ut laudantium. Quas esse fugit dolores quisquam atque exercitationem. Nostrum id nesciunt quasi repellat.\nPraesentium est ipsa at. Asperiores sint adipisci est sed ut cum sunt. Odio id soluta voluptas aut.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(95, 91, 7, 1, 'Sed blanditiis dolorem et quibusdam sunt.', 'Illo rem eum est accusamus tenetur laboriosam. Ratione laboriosam facere tenetur aut optio et iure. Sed quos officia tenetur facilis aut. Est impedit cupiditate voluptas nisi id velit.\nUnde ipsum officia quia alias numquam. Sit fugiat ut itaque repellat quam. Est ut eum aut voluptatem commodi iste. Nostrum non nemo ut itaque.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(96, 79, 2, 3, 'Et in accusamus enim quaerat.', 'Aliquam consequuntur aut excepturi blanditiis dolores libero. Minima error modi nulla. Rem et error recusandae aut. Harum iusto non deserunt eum sapiente eos.\nAd dolor harum nihil sapiente dolorem. Voluptatem earum perspiciatis ducimus ut. Omnis veniam debitis voluptates vero at voluptatem.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(97, 65, 7, 3, 'Dicta culpa quisquam architecto.', 'Nesciunt doloribus aut provident et impedit cum sed. A earum quis praesentium quasi asperiores molestiae. Quidem unde consequatur eos dolor expedita itaque et magni. Id provident maiores laboriosam cumque dolorum tempore.\nQuam consequatur libero neque nulla temporibus omnis. Omnis totam temporibus labore et impedit omnis sint. Nisi et non ullam nemo vel non. Repudiandae possimus et beatae.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(98, 62, 6, 3, 'Eum et neque eum ut sit. Non ipsa cumque ab.', 'Ut enim quod ullam sit. Et voluptas sit voluptatem et. Dolorem dolor magnam cupiditate autem consequatur.\nNesciunt error non cupiditate vitae. Reiciendis necessitatibus deleniti dolorum odio ipsum ut. Nisi enim repellat laboriosam facilis tenetur velit et. Expedita adipisci tempore est.\nMinima voluptatibus repellat molestiae aut ut asperiores. Consequatur nam vel aperiam et vel magnam nisi.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(102, 73, 6, 2, 'Dicta laborum blanditiis et et.', 'Praesentium vel quis labore. Quia aut consequuntur voluptas veritatis odit aut. Blanditiis aperiam nobis dolorem pariatur non ut ducimus. Fugiat ut ea incidunt ipsam quia repudiandae sint.\nUnde in mollitia ut quia. Quas nostrum voluptates sit cum repellendus nostrum in quibusdam. Aliquid et et excepturi sed et.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(103, 87, 8, 1, 'Aut nam facilis aut sit expedita.', 'Atque illum consectetur neque maxime omnis sapiente. Assumenda modi sint sunt maiores. Quo ut iure est dolor. Velit voluptatem enim fugiat autem officia possimus quas.\nQuae unde rem sunt et animi. Culpa et amet praesentium. Facilis itaque harum saepe deleniti perspiciatis modi. Iure quod ut ipsum eum.', '2017-06-28 11:46:39', '2017-06-28 11:46:39'),
(104, 73, 7, 1, 'Ut aut et eligendi natus aut.', 'Cum maiores eos voluptas placeat dolorum et. Nihil praesentium vel neque non facere animi.\nQuo earum et sed deleniti voluptatem repellat nihil. Beatae aut iusto nobis voluptatem impedit perspiciatis consequatur. Et asperiores ex et saepe omnis quis voluptate voluptate.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(106, 69, 5, 2, 'Fugiat non dolores soluta alias.', 'Laudantium qui culpa hic expedita. Et et ab doloribus quam voluptas quo laborum voluptatem. Facere aut eius enim dolorum. Deserunt aut sint consequatur praesentium corrupti quis in ullam.\nNon quos ut iure minima deleniti non. Dolores quia provident facere rem velit. Quia qui culpa qui enim sint adipisci.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(107, 60, 2, 3, 'Et enim accusantium praesentium at voluptatem.', 'Incidunt quia est commodi ea aut qui quaerat. Animi laboriosam libero doloremque quis praesentium. Doloribus voluptatem voluptates hic perspiciatis. Ut quasi ex consequatur numquam.\nVel maiores maiores nisi deleniti commodi aut consequatur. Recusandae numquam enim autem earum sed amet eum. Tempora qui omnis commodi ut. Ratione occaecati aut autem voluptatem atque.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(108, 86, 5, 3, 'Enim quos at architecto dolorem.', 'Esse iste exercitationem placeat tempora omnis voluptas. Accusantium quis possimus nobis ipsam dolore qui soluta. Quam eius vero optio neque illum laboriosam accusantium. Rem voluptas recusandae consectetur rem quia quia sit.\nEa dolores odio adipisci. Quibusdam animi non dolore. Nobis in ipsum et repellat nisi qui deleniti.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(109, 65, 8, 3, 'Sint veritatis error corporis et sapiente.', 'Voluptatem voluptatum laboriosam nostrum. Aperiam quo dolor alias nisi consequatur modi. Odio voluptas quaerat quos explicabo consequuntur dicta. Quasi quos est accusantium nisi provident.\nOccaecati in tenetur eaque rerum fugiat itaque consectetur. Deleniti laudantium adipisci fuga occaecati eaque. Ea non fugiat minima at eos impedit.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(110, 60, 8, 2, 'Aperiam debitis doloribus et id velit quos.', 'Inventore dolorum quasi ut qui esse. Ipsa nihil dolor maiores et consequatur cupiditate. Numquam voluptatem quo nisi quae et quos vero. Reiciendis quidem modi a expedita. Perferendis molestias aut unde eum omnis et quam nulla.\nQuia debitis facilis pariatur soluta. Sit ab est eligendi voluptate aut. Tenetur sit deleniti et voluptatem ad laboriosam est.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(112, 99, 6, 1, 'Vel voluptas labore dolorum quis.', 'Voluptas ut earum nulla neque magnam. Voluptates dolorem hic rerum possimus. Facilis iure quae voluptas. Qui sequi qui voluptatibus itaque est nisi aut officiis. Debitis ut cumque harum sed vero.\nMolestiae qui veritatis voluptas et. Dolorum reiciendis nihil quidem aspernatur.', '2017-06-28 11:46:40', '2017-06-28 11:46:40'),
(113, 1, 10, 3, 'laravel is the lovely framework so love it', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-06-30 21:45:42', '2017-06-30 21:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', NULL, NULL),
(2, 'author', NULL, NULL),
(3, 'subscriber', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `photo_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `photo_id`, `is_active`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'naime', 2, 11, 1, 'hossain.naime@yahoo.com', '$2y$10$YdLMpDe1bDwDcmfniUIea.SZayc75NVEdpZGwXMBDcYECezgEl6AO', 'BjBrejPnIFjHDbiiWcy1Rp7hZzchJKRg7E92zY4cUr0wqqsESQ1QEUWuptfN', '2017-06-23 04:12:37', '2017-07-15 12:52:43'),
(2, 'admin', 1, 12, 1, 'admin@admin.com', '$2y$10$k1ICo6H820BoFhnvRt/01uTlap55.HFL0svLn3rz9Ofv6g2CmRRKy', 'PJOBgE9MbQH2z2ii016Ub69jaZwqS4bkM1aonqt6uU9GNBHZJH3wiU3M2qPC', '2017-06-23 04:15:13', '2017-07-08 07:25:57'),
(56, 'Donny Mraz', 2, NULL, 1, 'erling.batz@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'GyREvyj8ur', '2017-06-28 11:45:02', '2017-06-28 11:45:02'),
(57, 'Kaycee Kessler', 2, NULL, 1, 'raymundo94@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '0c9W2O9GdZ', '2017-06-28 11:45:02', '2017-06-28 11:45:02'),
(58, 'Mr. Ceasar Hammes', 2, NULL, 1, 'maurice.lockman@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'IIwV3AHqz1', '2017-06-28 11:45:02', '2017-06-28 11:45:02'),
(59, 'Ms. Virginia Halvorson Sr.', 2, NULL, 1, 'tlynch@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'woQN1sFRvU', '2017-06-28 11:45:02', '2017-06-28 11:45:02'),
(60, 'Eric Veum', 2, NULL, 1, 'abelardo.langosh@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'OhDkYZTbgE', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(61, 'Dr. Erin Conroy', 2, NULL, 1, 'haag.jesse@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '6u4Gq8BTSq', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(62, 'Aliyah Pagac', 2, NULL, 1, 'pietro.brakus@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'FEAkzqKFlE', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(63, 'Sam Gutkowski IV', 2, NULL, 1, 'patricia47@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'Yqbv6MKHQ3', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(64, 'June Flatley', 2, NULL, 1, 'stiedemann.spencer@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'EUDud3mLCd', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(65, 'Nella Steuber', 2, NULL, 1, 'adonis.davis@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '27gEawr904', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(66, 'Odell Waelchi', 2, NULL, 1, 'gleichner.johanna@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'fbxTYZX34b', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(67, 'Deon Ledner', 2, NULL, 1, 'bsenger@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'bySQqNzDER', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(68, 'Judson Williamson', 2, NULL, 1, 'lorenza58@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'Xe2s45gLxD', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(69, 'Prof. Jean O''Conner II', 2, NULL, 1, 'weimann.lilian@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'tYCh4wmzs6', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(70, 'Lou Spencer', 2, NULL, 1, 'altenwerth.cole@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'R6GRbjpSeE', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(71, 'Santina Dooley', 2, NULL, 1, 'arne17@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'NYkrL52vrL', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(73, 'Josiane O''Connell', 2, NULL, 1, 'qwisoky@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'fcdtvVAcRG', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(74, 'Dr. Sonia Crooks', 2, NULL, 1, 'traynor@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'K9eMA4BG0u', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(75, 'Prof. Aileen Mante', 2, NULL, 1, 'lavern68@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'jAiqleMmDd', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(76, 'Donato Muller', 2, NULL, 1, 'xzulauf@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '7mOGzaRAKB', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(77, 'Ressie Klein', 2, NULL, 1, 'lenore.bahringer@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'tZzdZwXkfr', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(78, 'Hayley Ritchie', 2, NULL, 1, 'dadams@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '5LqY0dV80d', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(79, 'Enoch Bahringer', 2, NULL, 1, 'ypaucek@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'DIKFLajlzS', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(80, 'Zoie Kilback', 2, NULL, 1, 'dillon94@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'BLn2BfFxQZ', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(81, 'Dr. Wallace Green', 2, NULL, 1, 'arjun.bosco@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'o6zX5mzEy1', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(82, 'Dr. Craig Goldner', 2, NULL, 1, 'romaguera.jaclyn@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'lEXpda1aqg', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(83, 'Maiya Dare', 2, NULL, 1, 'bennett57@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'NZrLjxTefY', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(84, 'Trycia Stark', 2, NULL, 1, 'marcos72@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'p72vGHumOo', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(85, 'Brandy Terry', 2, NULL, 1, 'manley28@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'B8V2ulYAJm', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(86, 'Dr. Gunner Harris III', 2, NULL, 1, 'cchamplin@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'VnWCgIVPtP', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(87, 'Miss Maegan Kautzer', 2, NULL, 1, 'nhoeger@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '5XwoOt8cRB', '2017-06-28 11:45:03', '2017-06-28 11:45:03'),
(88, 'Lucie Murray', 2, NULL, 1, 'sophie.beatty@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'Bfk57S6ZKp', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(89, 'Alphonso Deckow IV', 2, NULL, 1, 'dortha17@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'S1UoFulOkX', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(90, 'Marvin Wiegand', 2, NULL, 1, 'lebsack.helga@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'OkGa5gtYrr', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(91, 'Mr. Bradford Sanford MD', 2, NULL, 1, 'ashley81@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'pbIqYAiAIY', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(92, 'Anastasia McDermott', 2, NULL, 1, 'yundt.dustin@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'ltnlCMOPGr', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(93, 'Ms. Margaretta Carter', 2, NULL, 1, 'sipes.dangelo@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'ZvKkiSSWdO', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(94, 'Kelton Cormier IV', 2, NULL, 1, 'gorczany.karine@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'BANm2TujIc', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(95, 'Harvey Braun', 2, NULL, 1, 'zetta04@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '1eLwWC84Fv', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(96, 'Jakob Hoeger Sr.', 2, NULL, 1, 'benton53@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'TwNfRJDEyd', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(97, 'Brittany Robel', 2, NULL, 1, 'humberto.dare@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'jEYY2Ocmiy', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(98, 'Juliet Gerlach', 2, NULL, 1, 'bcrona@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', '7UrT3iTNbR', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(99, 'Ursula Hermiston', 2, NULL, 1, 'littel.syble@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'kvLeG4wHUS', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(100, 'Ellie McKenzie', 2, NULL, 1, 'demetris.lemke@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'JItzyNicNB', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(101, 'Hannah Schuppe', 2, NULL, 1, 'schiller.kelley@example.com', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'xet7vQY2a3', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(102, 'Evalyn Oberbrunner', 2, NULL, 1, 'jaskolski.manuel@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'preJ0MFVdl', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(103, 'Ilene Conroy', 2, NULL, 1, 'laurence40@example.org', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'NCnwk6d7BV', '2017-06-28 11:45:04', '2017-06-28 11:45:04'),
(104, 'Miss Jeanette Johnston I', 2, NULL, 1, 'nola46@example.net', '$2y$10$/MuE60lsw7RPlWm6Zsz7H.KdvWHMrJENOBdVa6zI4gcDBqA4UkUj.', 'Xny7wOaAHs', '2017-06-28 11:45:04', '2017-06-28 11:45:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_photo_id_index` (`photo_id`),
  ADD KEY `posts_category_id_index` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `users_photo_id_index` (`photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
