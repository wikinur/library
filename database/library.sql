/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `library`;

/*Table structure for table `authors` */

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `authors` */

insert  into `authors`(`id`,`name`,`email`,`phone_number`,`address`,`created_at`,`updated_at`) values 
(3,'Lutfan Sihombing S.KOM','widodo.caket@pudjiastuti.id','0812927301776','Ki. Camar No. 273, Parepare 57931, Kalsel','2023-03-01 04:14:01','2023-03-09 04:59:25'),
(4,'Bagiya Wahyudin','agustina.wani@yuniar.ac.id','081271335926','Jr. Adisucipto No. 173, Pontianak 23795, Jambi','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(5,'Kasiyah Nadia Usada','ymayasari@utami.my.id','081217666805','Kpg. Tambun No. 770, Pagar Alam 57552, Kalsel','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(6,'Jatmiko Mahdi Rajasa','lili.megantara@gmail.com','081276459375','Gg. BKR No. 155, Sorong 57323, Papua','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(7,'Rina Laksmiwati','simon.usada@gmail.com','081232231504','Gg. Bahagia No. 97, Kendari 99653, Kalbar','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(8,'Ajimin Sakti Salahudin','xanana73@prasetyo.biz.id','081298617698','Ds. Jaksa No. 337, Tanjung Pinang 67301, Kaltara','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(9,'Ina Safitri','hakim.raden@gmail.com','081285246188','Ki. Cut Nyak Dien No. 295, Tangerang Selatan 44883, Papua','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(10,'Atmaja Maulana','olga32@gmail.co.id','081264116042','Jln. Bahagia  No. 257, Prabumulih 89721, Kalbar','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(11,'Atma Prasetya Samosir','rhasanah@yahoo.com','081217747267','Gg. Madiun No. 874, Kupang 53744, Kaltim','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(12,'Hafshah Susanti','marsudi84@latupono.biz','081225827185','Ds. Cikutra Timur No. 161, Palu 63978, Kaltara','2023-03-01 04:14:01','2023-03-01 04:14:01'),
(13,'Sadina Maida Hasanah','maryadi.farida@laksita.org','081286354809','Ki. Cut Nyak Dien No. 682, Pontianak 15835, Sulut','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(14,'Jatmiko Uwais S.Ked','suartini.septi@hasanah.info','081296887430','Kpg. Bahagia  No. 887, Malang 70088, Sulbar','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(15,'Jelita Karimah Kuswandari S.T.','irawan.raharja@tarihoran.tv','08128973658','Dk. Ketandan No. 729, Administrasi Jakarta Timur 15901, Kaltim','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(16,'Wardaya Warsa Hutapea M.M.','usudiati@suryono.sch.id','08125093365','Kpg. Sukabumi No. 543, Bogor 39241, Pabar','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(17,'Maryanto Januar','baktiadi.agustina@yahoo.co.id','081288672796','Gg. Basket No. 661, Ambon 59594, Maluku','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(18,'Prima Saputra','tyolanda@mandala.name','081237565393','Dk. Adisumarmo No. 416, Sungai Penuh 52649, Sulteng','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(19,'Dadap Prasetyo','halimah.ophelia@thamrin.or.id','081298092985','Gg. Gatot Subroto No. 752, Singkawang 84773, NTT','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(20,'Zaenab Padmasari S.Gz','nadine87@prayoga.name','08126529483','Dk. Raden Saleh No. 693, Administrasi Jakarta Utara 56756, Sumut','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(21,'Usyi Susanti S.IP','elisa30@gmail.co.id','081269996742','Dk. Gading No. 249, Palopo 21003, NTT','2023-03-01 04:14:02','2023-03-01 04:14:02'),
(28,'zzz','zz@gmail.com','8687','hjhjh','2023-03-18 13:46:14','2023-03-18 13:46:14'),
(33,'error','error@gmail.com','087','Bandung','2023-03-19 09:24:25','2023-03-19 09:24:25'),
(34,'publishers','pub@gmail.com','087819920234','Bekasi','2023-03-19 09:46:45','2023-03-22 02:37:55');

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) unsigned NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `catalog_id` bigint(20) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_publisher_id_foreign` (`publisher_id`),
  KEY `books_author_id_foreign` (`author_id`),
  KEY `books_catalog_id_foreign` (`catalog_id`),
  CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `books` */

insert  into `books`(`id`,`isbn`,`title`,`year`,`publisher_id`,`author_id`,`catalog_id`,`qty`,`price`,`created_at`,`updated_at`) values 
(1,345990419,'Waylon Hill',2014,20,11,1,20,15486,'2023-03-01 04:53:39','2023-04-02 06:53:33'),
(2,100509716,'Mafalda Doyle',2017,1,17,1,16,17945,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(3,918971961,'Florencio Schoen',2023,12,9,1,19,21493,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(4,614754493,'Burdette Feil',2019,12,7,5,20,19775,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(5,521476340,'Maryse Bogisich III',2012,3,4,21,13,17994,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(6,303379272,'Blanche Wisoky',2014,2,5,4,16,23308,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(7,875646510,'Erika Barrows',2018,15,8,4,10,16058,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(8,536210878,'Gilda Marks',2016,9,18,8,19,21270,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(9,993971636,'Thomas Herman PhD',2010,6,20,21,16,18410,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(10,665289720,'Anibal Schaefer PhD',2016,5,10,22,13,12138,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(11,117110144,'Anahi Langosh',2017,6,12,21,18,13535,'2023-03-01 04:53:39','2023-04-02 06:53:33'),
(16,513334256,'Glennie Kub',2020,17,15,1,19,15528,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(17,225949376,'Brigitte Klocko',2020,2,11,4,19,22187,'2023-03-01 04:53:39','2023-03-01 04:53:39'),
(18,433875663,'Johanna Blanda',2010,10,3,4,16,21555,'2023-03-01 04:53:40','2023-03-01 04:53:40'),
(19,331115059,'Mr. Wilhelm Klein III',2017,12,7,21,18,13825,'2023-03-01 04:53:40','2023-03-01 04:53:40'),
(21,212,'Book',2007,22,28,26,346,25500,'2023-03-20 12:18:58','2023-04-02 06:41:23'),
(23,213,'Dua',2023,26,28,28,12,126000,'2023-03-20 12:55:52','2023-03-21 01:10:59');

/*Table structure for table `catalogs` */

DROP TABLE IF EXISTS `catalogs`;

CREATE TABLE `catalogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `catalogs` */

insert  into `catalogs`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'HTML','2023-03-01 04:51:54','2023-03-08 09:27:35'),
(4,'Pemrograman Dasar','2023-03-01 04:51:54','2023-03-08 09:27:59'),
(5,'Logika Pemrograman','2023-03-01 04:51:54','2023-03-08 09:48:36'),
(8,'Fundamental','2023-03-01 04:51:54','2023-03-08 09:47:47'),
(21,'Programming Language','2023-03-06 02:55:26','2023-03-06 03:41:37'),
(22,'Laravel Vue','2023-03-06 02:57:40','2023-03-06 03:41:18'),
(26,'wan','2023-03-08 12:25:09','2023-03-08 12:25:09'),
(27,'COding','2023-03-08 12:27:05','2023-03-08 12:27:05'),
(28,'Komik','2023-03-08 12:39:40','2023-03-08 12:39:40');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `date_entry` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `members` */

insert  into `members`(`id`,`name`,`gender`,`phone_number`,`address`,`email`,`date_entry`,`created_at`,`updated_at`) values 
(1,'Ana Hastuti','L','087769683079','Jr. Adisucipto No. 433, Payakumbuh 85689, Bandung','paulin02@yahoo.com','2023-06-08','2023-03-03 07:27:10','2023-03-20 07:20:06'),
(2,'Queen Ida Zulaika M.TI.','P','087796008553','Bandung','cmaryati@prastuti.web.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(3,'Catur Elvin Mustofa S.E.I','P','08779869150','Gg. Yogyakarta No. 273, Sukabumi 88893, Jatim','usada.dewi@yahoo.co.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(4,'Vanesa Puspasari','P','087786569564','Ki. Baja No. 726, bandung','damanik.juli@gmail.com',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(5,'Lantar Dono Wahyudin S.Sos','P','087749545248','Jr. B.Agam 1 No. 888, Binjai 77829, Kalteng','ina16@yahoo.com',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(6,'Slamet Sihombing','L','087760731678','Gg. Bakaru No. 64, Surakarta 50378, Papua','rina.riyanti@gmail.com',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(7,'Jayadi Thamrin S.Gz','L','087764547327','Jln. Bakaru No. 760, Kotamobagu 62393, Kepri','melani.betania@yahoo.com',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(8,'Septi Tari Farida S.E.I','L','08778038026','Gg. Hang No. 774, Madiun 12462, Lampung','dewi41@yahoo.com',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(9,'Latika Janet Hasanah S.Sos','L','087783096538','Jln. Industri No. 702, Sungai Penuh 81732, Kalteng','pthamrin@gmail.co.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(10,'Ajimat Lanang Firmansyah M.TI.','L','087772574760','Dk. Barat No. 825, Cirebon 36786, Malut','hassanah.yahya@nasyidah.desa.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(11,'Ibrani Nainggolan S.Gz','P','087795053619','Ki. Bazuka Raya No. 915, Bengkulu 59754, Sulut','tiara94@gmail.com',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(12,'Jamalia Pratiwi S.Psi','L','087753116332','Ds. Bakau No. 442, Payakumbuh 54519, Jatim','nuraini.nadia@gmail.co.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(13,'Zelda Pertiwi','L','087757132557','Jr. Uluwatu No. 498, Lubuklinggau 12944, Kaltara','ohassanah@sihombing.in',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(14,'Lala Yuliarti','P','087774400935','Jr. Untung Suropati No. 539, Kotamobagu 22229, Jatim','anggraini.zaenab@sirait.info',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(15,'Carla Maya Lestari S.I.Kom','L','087713759246','Jln. Yos Sudarso No. 461, Batu 29485, Jateng','jessica97@gmail.co.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(16,'Ganda Gunawan','L','087710887147','Ki. Setiabudhi No. 396, Madiun 94191, Banten','hasim.rahayu@gmail.co.id',NULL,'2023-03-03 07:27:12','2023-03-03 07:27:12'),
(17,'Rahayu Hasanah','L','087735646139','Ds. Lada No. 328, Solok 61770, Gorontalo','siska.pranowo@wijayanti.com',NULL,'2023-03-03 07:27:13','2023-03-03 07:27:13'),
(18,'Ani Yolanda','L','087749081346','Ki. Sutan Syahrir No. 769, Tegal 37317, Aceh','permata.yunita@suartini.info',NULL,'2023-03-03 07:27:13','2023-03-03 07:27:13'),
(19,'Simon Megantara M.Pd','P','087792137579','Kpg. Daan No. 254, Pekanbaru 73968, DKI','hidayanto.widya@sirait.web.id',NULL,'2023-03-03 07:27:13','2023-03-03 07:27:13'),
(20,'Gadang Wijaya','L','087768200234','Psr. Kalimalang No. 769, Singkawang 65321, Sultra','wacana.intan@laksita.biz.id',NULL,'2023-03-03 07:27:13','2023-03-03 07:27:13'),
(22,'Member','P','08771992','cimahi','member@gmail.com',NULL,'2023-03-20 07:21:23','2023-03-20 07:21:23'),
(23,'Yuli','P','087719920328','Cimahi','Yuli@gmail.com',NULL,'2023-03-22 02:15:23','2023-03-22 02:15:23');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(13,'2010_03_01_010052_create_members_table',1),
(14,'2014_10_12_000000_create_users_table',1),
(15,'2014_10_12_100000_create_password_reset_tokens_table',1),
(16,'2014_10_12_100000_create_password_resets_table',1),
(17,'2019_08_19_000000_create_failed_jobs_table',1),
(18,'2019_12_14_000001_create_personal_access_tokens_table',1),
(19,'2023_03_01_010612_create_publishers_table',1),
(20,'2023_03_01_010720_create_authors_table',1),
(21,'2023_03_01_010811_create_catalogs_table',1),
(22,'2023_03_01_010921_create_books_table',1),
(23,'2023_03_01_011010_create_transactions_table',1),
(25,'2023_03_28_062429_add_status_column_to_transactions_table',2),
(26,'2023_03_01_011049_create_transaction_details_table',3),
(27,'2023_03_28_104628_create_transaction_details_table',4),
(28,'2023_04_14_024635_create_permission_tables',5);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'index transaction','web','2023-04-14 03:05:55','2023-04-14 03:05:55');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `publishers` */

DROP TABLE IF EXISTS `publishers`;

CREATE TABLE `publishers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `publishers` */

insert  into `publishers`(`id`,`name`,`email`,`phone_number`,`address`,`created_at`,`updated_at`) values 
(1,'Ralph Casper','schoen.juwan@yahoo.com','081284007877','418 Maximo Inlet\nWest Verda, CO 18484','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(2,'Golden Jerde','serenity.funk@hills.com','081211769869','747 Lisandro Summit\nLarsontown, KS 36682-0767','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(3,'Karolann Harvey','christop.tillman@yahoo.com','081238982630','553 Zieme Hills\nEldaport, VA 06499','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(5,'Kelley Kub III','tracy83@carroll.com','081250249532','196 Monahan Oval\nRafaelahaven, MA 44304','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(6,'Clare Schmidt','burnice.brown@kovacek.net','081254553270','838 Merritt Bridge\nNew Ambrose, OK 88823','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(7,'Ms. Elsie Walsh DVM','zachary.lebsack@gmail.com','081227378423','807 Bernadette Estates\nNorth Carissa, MD 27570-1302','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(8,'Juvenal Cormier','lori30@gmail.com','081250421298','9804 Boehm Ways\nWilkinsonshire, IL 63716','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(9,'Miss Jaquelin Connelly Jr.','amy32@larson.com','081253679743','33195 O\'Kon Groves Suite 715\nInesfurt, WA 11266','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(10,'Talon Cole','vwhite@gmail.com','081261736018','521 Ahmed Drive\nBoyerfort, LA 09815','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(11,'Dr. Gwen Paucek II','neoma60@schimmel.com','081213947813','5004 Diego Motorway Suite 793\nBartonbury, CO 46703-4442','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(12,'Dawn Schaden','anita84@tillman.com','081210920769','32236 Hill Divide Suite 515\nWest Edbury, TX 28127','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(13,'Prof. Madelyn Johnston','elisha50@gmail.com','081214642405','96941 Bartoletti Mountain Suite 546\nSouth Madelinemouth, DE 94270-1858','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(14,'Prof. Dedrick Langosh','urempel@gmail.com','081252587865','90387 Gaylord Shoal\nNew Donatobury, NJ 69394-6453','2023-03-01 04:39:28','2023-03-01 04:39:28'),
(15,'Miss Shea Metz','bernie95@damore.biz','081212621515','5254 Strosin Grove Suite 842\nKaleychester, OR 37531','2023-03-01 04:39:29','2023-03-01 04:39:29'),
(17,'Meredith Boehm','nickolas.doyle@yahoo.com','081219176104','93428 Carter Village Suite 571\nAidamouth, TN 23491','2023-03-01 04:39:29','2023-03-01 04:39:29'),
(20,'Augustine Hickle V','fhessel@volkman.com','081238042506','561 Ole Parks Apt. 758\nWest Isaacchester, AR 39310','2023-03-01 04:39:29','2023-03-01 04:39:29'),
(22,'Aris Sultan sekali','Aris_Sultan2@gmail.com','089656305147','Cimahi jawa barat','2023-03-08 10:46:29','2023-03-08 11:12:55'),
(25,'publisher','publisher7@gmail.com','08887','Garut Selatan','2023-03-10 03:07:57','2023-03-10 03:08:20'),
(26,'Wahyu','Wahyu@gmail.com','0887','Bandung','2023-03-19 09:44:48','2023-03-19 10:07:39');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'admin','web','2023-04-14 03:05:55','2023-04-14 03:05:55');

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) unsigned NOT NULL,
  `book_id` bigint(20) unsigned NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_details_book_id_foreign` (`book_id`),
  KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`id`,`transaction_id`,`book_id`,`qty`,`created_at`,`updated_at`) values 
(1,1,11,1,NULL,NULL),
(4,4,17,1,NULL,NULL),
(7,7,21,1,'2023-04-02 06:41:23','2023-04-02 06:41:23'),
(8,7,11,1,'2023-04-02 06:53:33','2023-04-02 06:53:33'),
(9,7,1,1,'2023-04-02 06:53:33','2023-04-02 06:53:33');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) unsigned NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_member_id_foreign` (`member_id`),
  CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`member_id`,`date_start`,`date_end`,`status`,`created_at`,`updated_at`) values 
(1,1,'2023-03-01','2023-03-02',1,NULL,NULL),
(4,18,'2023-06-01','2023-06-09',0,NULL,NULL),
(7,15,'2023-03-29','2023-04-01',1,'2023-04-02 06:41:23','2023-04-02 06:53:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_member_id_foreign` (`member_id`),
  CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`member_id`,`created_at`,`updated_at`) values 
(1,'New User','user@gmail.com',NULL,'$2y$10$kn0mEUNL/cb82iFNGkZNbuv6S22oT4Je0xnI5xTTncMYDpPBsrZM6',NULL,1,'2023-03-01 02:14:24','2023-03-01 02:14:24'),
(4,'baru','baru@gmail.com',NULL,'$2y$10$bFmwey2/2Du8fnKz4azX6uNW7NRxeShwj74NzKZyeUKE1WBJKNPYq',NULL,NULL,'2023-03-05 05:41:30','2023-03-05 05:41:30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
