-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_akademik.about
CREATE TABLE IF NOT EXISTS `about` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_about` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ikon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.about: ~3 rows (approximately)
INSERT INTO `about` (`id`, `nama_about`, `keterangan`, `link`, `ikon`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Guru Profesional', 'Lorem ipsum dolor sit amet consectetur adipiscing elit potenti, nibh sed netus nulla a mauris dapibus. Lacinia donec aenean ultricies dis habitant euismod dignissim id, fames mi non ut parturient natoque. Tempus nulla sagittis sem id penatibus elementum turpis vivamus convallis a, sapien ultricies pretium felis cras lectus porta tristique eros.', 'https://drive.google.com/', 'fa fa-user', '1', '2023-11-02 19:19:12', '2024-04-22 15:56:23'),
	(2, 'Lokasi Strategis', 'Lorem ipsum dolor sit amet consectetur adipiscing elit potenti, nibh sed netus nulla a mauris dapibus. Lacinia donec aenean ultricies dis habitant euismod dignissim id, fames mi non ut parturient natoque. Tempus nulla sagittis sem id penatibus elementum turpis vivamus convallis a, sapien ultricies pretium felis cras lectus porta tristique eros.', 'https://forms.gle/rdYBfem7QmLGLzFC8', 'fa fa-user', '2', '2023-11-02 19:22:12', '2024-04-22 15:56:32'),
	(3, 'Kualitas Pendidikan', 'Lorem ipsum dolor sit amet consectetur adipiscing elit potenti, nibh sed netus nulla a mauris dapibus. Lacinia donec aenean ultricies dis habitant euismod dignissim id, fames mi non ut parturient natoque. Tempus nulla sagittis sem id penatibus elementum turpis vivamus convallis a, sapien ultricies pretium felis cras lectus porta tristique eros.', 'https://forms.gle/rdYBfem7QmLGLzFC8', 'fa fa-user', '3', '2023-11-03 02:31:27', '2024-04-22 15:56:38');

-- Dumping structure for table db_akademik.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_absensi` datetime NOT NULL,
  `guru_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.absensi: ~4 rows (approximately)
INSERT INTO `absensi` (`id`, `tanggal_absensi`, `guru_id`, `siswa_id`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
	(5, '2024-05-06 00:00:00', '7', '11', 'Hadir', 'Hadir', '2024-05-06 00:23:37', '2024-05-06 01:22:29'),
	(6, '2024-05-06 00:00:00', '7', '14', 'Hadir', 'Hadir', '2024-05-06 00:23:37', '2024-05-06 07:05:38'),
	(7, '2024-05-06 00:00:00', '7', '15', 'Alpa', 'Alpa', '2024-05-06 00:23:37', '2024-05-06 07:05:30'),
	(8, '2024-05-06 00:00:00', '7', '16', 'Izin', 'Izin', '2024-05-06 00:23:37', '2024-05-06 07:05:46');

-- Dumping structure for table db_akademik.alasan
CREATE TABLE IF NOT EXISTS `alasan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ikon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.alasan: ~1 rows (approximately)
INSERT INTO `alasan` (`id`, `nama_alasan`, `keterangan`, `ikon`, `urutan`, `created_at`, `updated_at`) VALUES
	(5, 'Mudah Digunakan', 'Mudah Digunakan', 'fa fa-user', '1', '2023-11-03 09:02:52', '2023-11-03 09:02:52');

-- Dumping structure for table db_akademik.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_barang_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_baik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_sedang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_rusak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_perolehan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.barang: ~1 rows (approximately)
INSERT INTO `barang` (`id`, `kategori_barang_id`, `kode_barang`, `nama_barang`, `merk`, `type`, `kondisi_baik`, `kondisi_sedang`, `kondisi_rusak`, `tanggal_masuk`, `status`, `ruangan_id`, `harga_perolehan`, `asal`, `pic`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
	(9, '2', '876877', 'Toolkit', 'Harm', 'Kit', '0', '0', '0', '2024-01-05', 'Baru', '1', '800000', 'Bengkel', 'Rudi Aja', '20240105014144_2.png.png', NULL, '2024-01-04 18:41:44', '2024-04-12 17:43:16');

-- Dumping structure for table db_akademik.bayar_spp_head
CREATE TABLE IF NOT EXISTS `bayar_spp_head` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_bayar` date NOT NULL,
  `kode_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_spp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_transfer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_head` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.bayar_spp_head: ~1 rows (approximately)
INSERT INTO `bayar_spp_head` (`id`, `tanggal_bayar`, `kode_pembayaran`, `siswa_id`, `jumlah_spp`, `jumlah_bayar`, `metode_pembayaran`, `bukti_transfer`, `keterangan`, `spp`, `bulan`, `tahun`, `status_head`, `created_at`, `updated_at`) VALUES
	(30, '2024-05-02', 'SPP02052024009', '11', '450000', '450000', 'Cash', NULL, NULL, '18', 'Juli', '2024', 'Lunas', '2024-05-01 21:59:37', '2024-05-01 21:59:37');

-- Dumping structure for table db_akademik.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_posting` date NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_berita_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.berita: ~3 rows (approximately)
INSERT INTO `berita` (`id`, `judul_berita`, `tanggal_posting`, `slug`, `penulis`, `kategori_berita_id`, `ringkasan`, `isi`, `gambar`, `sumber`, `urutan`, `status`, `views`, `created_at`, `updated_at`) VALUES
	(10, 'How to Study Online Courses Effectively', '2024-04-23', 'how-to-study-online-courses-effectively', 'Rafi', '1', 'How to Study Online Courses Effectively', '<pre style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: &quot;Source Sans Pro&quot;, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;" class="">Lorem ipsum dolor sit amet consectetur, adipiscing elit lacus nunc. Suspendisse phasellus sem eget cras euismod torquent a, aenean montes ligula faucibus aliquet ultrices, mollis egestas inceptos cursus gravida fusce. Taciti eleifend mauris suscipit fermentum nec habitant aenean, diam cras praesent volutpat posuere augue convallis, etiam euismod vel quisque facilisis ut.<br>Nisi lacus cum bibendum ultrices vivamus quis volutpat pellentesque, ridiculus primis cursus enim tortor laoreet nascetur, scelerisque aptent himenaeos facilisi sagittis potenti libero. Eget vehicula risus a tempor himenaeos, tellus tincidunt conubia elementum tortor cum, ullamcorper lobortis vitae nunc. Tristique sociosqu magna rutrum nisi cum non velit habitant pretium pulvinar, condimentum suspendisse posuere eget egestas porta congue mollis sed.</pre>', '1713889467.jpg', 'detik.com', '1', 'Aktif', 3, '2024-04-22 18:49:41', '2024-05-03 17:50:39'),
	(11, 'The best high schools in Massachusetts', '2024-04-23', 'the-best-high-schools-in-massachusetts', 'Rafi', '1', 'The best high schools in Massachusetts', '<p style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: &quot;Source Sans Pro&quot;, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit blandit vivamus dictumst lectus, erat arcu dignissim luctus dictum at sodales eleifend facilisis ultrices. Cum laoreet sagittis fringilla rhoncus class id, nostra consequat magnis nisl nunc facilisi, habitant interdum nibh metus blandit. Accumsan taciti ut faucibus vulputate vehicula erat tempus, vitae dignissim quisque dapibus placerat ornare hendrerit aenean, luctus volutpat dictum per eget parturient.</p><p style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: &quot;Source Sans Pro&quot;, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;">Eu semper faucibus commodo dapibus platea non dui id, metus duis nostra maecenas elementum purus nunc suspendisse, blandit varius vivamus fermentum ullamcorper torquent pulvinar. Molestie pharetra inceptos vulputate diam id imperdiet dis, elementum fames mollis etiam suspendisse ornare, facilisi habitasse vehicula magna ligula nullam. Augue facilisis fringilla lobortis vestibulum mollis ante vivamus, diam aptent netus neque a interdum himenaeos primis, dignissim pellentesque tempor nullam fusce sodales.</p>', '1713889303.jpg', 'detik.com', '2', 'Aktif', 3, '2024-04-23 09:21:43', '2024-04-28 10:59:23'),
	(12, 'Indiana school becomes first  in state to move', '2024-04-23', 'indiana-school-becomes-first-in-state-to-move', 'Rafi', '1', 'Indiana school becomes first', '<p style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: &quot;Source Sans Pro&quot;, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit rutrum vel donec nec, ut dictumst maecenas urna in scelerisque ac viverra facilisis. Vestibulum leo platea elementum nascetur lacinia curae pulvinar habitant dignissim conubia quis, ornare congue dictumst nostra pharetra metus sociis mattis eu class, maecenas accumsan etiam a phasellus scelerisque felis orci consequat risus. Senectus nascetur sed suspendisse sapien sem vitae integer congue, cras blandit ac donec feugiat odio lacus pulvinar ultricies, per duis quisque sollicitudin fringilla mus platea.</p><p style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 1.8em; line-height: 1.5; font-family: &quot;Source Sans Pro&quot;, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; letter-spacing: -0.003em; color: rgba(0, 0, 0, 0.8); text-align: justify;">Nulla et sem dictumst torquent id platea tristique porta rhoncus venenatis in, dictum sollicitudin ut fames montes tortor taciti etiam fermentum conubia ac, mattis eros viverra sagittis vehicula a augue mi penatibus felis. Gravida eros parturient aptent netus nulla morbi ullamcorper, iaculis himenaeos conubia accumsan enim mollis, cras laoreet mattis id ad suspendisse. Facilisis elementum dis dapibus posuere velit bibendum vel magnis egestas cum tellus ut, lectus accumsan potenti condimentum tincidunt justo lacus parturient in pharetra.</p>', '1713889389.jpeg', 'detik.com', '3', 'Aktif', 3, '2024-04-23 09:23:09', '2024-04-28 12:29:03');

-- Dumping structure for table db_akademik.bulan
CREATE TABLE IF NOT EXISTS `bulan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_bulan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_akademik.bulan: ~12 rows (approximately)
INSERT INTO `bulan` (`id`, `nama_bulan`) VALUES
	(1, 'JANUARI'),
	(2, 'FEBRUARI'),
	(3, 'MARET'),
	(4, 'APRIL'),
	(5, 'MEI'),
	(6, 'JUNI'),
	(7, 'JULI'),
	(8, 'AGUSTUS'),
	(9, 'SEPTEMBER'),
	(10, 'OKTOBER'),
	(11, 'NOVEMBER'),
	(12, 'DESEMBER');

-- Dumping structure for table db_akademik.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_akademik.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.faq: ~3 rows (approximately)
INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Bagaimana Caranya Lari ?', 'Langkahnya adalah seperti berikut', '1', '2023-09-25 23:59:26', '2023-11-03 04:30:31'),
	(3, 'Berapa biaya yang harus dikeluarkan ?', 'Harganya relatif murah kok guys', '2', '2023-10-09 07:50:13', '2023-10-09 07:50:13'),
	(4, 'Bisa custom ngga ?', 'Bisa dong kak', '3', '2023-10-09 07:50:37', '2023-12-26 17:41:34');

-- Dumping structure for table db_akademik.galeri
CREATE TABLE IF NOT EXISTS `galeri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_galeri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_galeri_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.galeri: ~3 rows (approximately)
INSERT INTO `galeri` (`id`, `nama_galeri`, `kategori_galeri_id`, `keterangan`, `link`, `gambar`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Kegiatan Malam', '1', 'Kegiatan Malam', 'https://forms.gle/rdYBfem7QmLGLzFC8', '20231204073821_WhatsApp_Image_2023-11-27_at_21.04.24.jpeg.jpeg', '1', '2023-11-03 03:53:07', '2023-12-04 00:38:21'),
	(3, 'Survey Acara', '1', 'Survey Acara', 'https://drive.google.com/file/d/13lofIH_M8FtOHFbDP2HXVw9UV4HwNhtp/preview', '20240423233622_biru_minimalis_ucapan_selamat_hari_raya_idul_fitri_instagram_post.png.png', '2', '2024-04-23 16:36:22', '2024-04-23 16:36:22'),
	(4, 'Kegiatan Malam', '2', 'dssf', 'https://drive.google.com/file/d/13lofIH_M8FtOHFbDP2HXVw9UV4HwNhtp/preview', '20240423234207_SNACK.png.png', '3', '2024-04-23 16:42:07', '2024-04-23 16:42:07');

-- Dumping structure for table db_akademik.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_depan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_belakang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `honor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tunjangan_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tunjangan_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tunjangan_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tunjangan_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.guru: ~11 rows (approximately)
INSERT INTO `guru` (`id`, `nip`, `nama_guru`, `kode_guru`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telp`, `instagram`, `email`, `gelar_depan`, `gelar_belakang`, `alamat`, `honor`, `tunjangan_1`, `tunjangan_2`, `tunjangan_3`, `tunjangan_4`, `gambar`, `username`, `password`, `tanggal_masuk`, `status`, `status_aktif`, `posisi`, `motto`, `created_at`, `updated_at`) VALUES
	(1, '000xxx', 'Guru Kosong', '000xxx', 'Tanjung Pinang', '1999-01-01', 'Laki-laki', '085320555394', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0@gmail.com', '12345678', '2023-12-29', 'Non Guru', 'Non Aktif', '', '', '2023-12-28 18:30:37', '2024-01-13 05:00:32'),
	(7, '32701', 'Muhammad Rafi Heryadi, S.Kom', 'GR01', 'Tanjung Pinang', '1994-12-28', 'Laki-laki', '085320555394', 'https://www.instagram.com/?hl=id', 'muhammadrafiheryadi94@gmail.com', NULL, NULL, NULL, '1000000', NULL, NULL, NULL, NULL, '20231229004027_5.png.png', 'muhammadrafiheryadi94@gmail.com', '12345678', '2023-12-29', 'Guru', 'Aktif', 'Guru TIK', 'Do The Best For Be The Best', '2023-12-28 16:50:09', '2024-04-23 02:25:48'),
	(9, '32702', 'Bram Setiadi, S.Pd', 'GR02', 'Tasikmalaya', '1993-12-02', 'Perempuan', '089524575452', NULL, NULL, NULL, NULL, NULL, '400000', NULL, NULL, NULL, NULL, '20231229004139_6.png.png', 'reni@gmail.com', '12345678', '2023-12-29', 'Guru', 'Aktif', 'Guru IPA', 'Hiduplah Bukan Hanya Sekedar Hidup', '2023-12-28 17:01:21', '2024-04-22 17:03:40'),
	(10, '32703', 'Fuja Pauziah, S.Pd', 'GR03', 'Tasikmalaya', '1993-11-11', 'Perempuan', '0896757666', NULL, NULL, NULL, NULL, NULL, '750000', NULL, NULL, NULL, NULL, '20240422235835_image-character-1.png.png', 'fuja@gmail.com', '12345678', '2023-12-29', 'Guru', 'Aktif', 'Guru IPS', 'Kamu adalah Kamu Yang Sekarang', '2023-12-28 17:46:44', '2024-04-22 17:03:54'),
	(11, '42701', 'Veti Sumaeti, S.Pd', 'NGR01', 'Jakarta', '1994-09-09', 'Perempuan', '08999999999', NULL, NULL, NULL, NULL, NULL, '1000000', NULL, NULL, NULL, NULL, '20240423095705_image-character-4.png.png', 'vety@gmail.com', '12345678', '2023-12-29', 'Non Guru', 'Aktif', 'Guru PJOK', 'Hiduplah Bukan Hanya Sekedar Hidup', '2023-12-28 17:49:03', '2024-04-23 02:57:05'),
	(12, '42702', 'Husni Mubarok, S.Pd', 'NGR02', 'Bandung', '1993-08-11', 'Laki-laki', '085320555394', NULL, NULL, NULL, NULL, NULL, '900000', NULL, NULL, NULL, NULL, '20240423095753_image-character-1.png.png', 'husni@gmail.com', '12345678', '2023-12-29', 'Non Guru', 'Aktif', 'Guru INGGRIS', 'Do The Best For Be The Best', '2023-12-28 17:50:37', '2024-04-23 02:57:53'),
	(13, '32704', 'Bram Setiadi', 'GR04', 'Tasikmalaya', '1993-01-22', 'Laki-laki', '0853205553949', NULL, NULL, 'Dr', NULL, NULL, '1000000', NULL, NULL, NULL, NULL, '20240422235956_image-character-4.png.png', 'bram@gmail.com', '12345678', '2024-01-21', 'Guru', 'Aktif', 'Guru Arab', 'Kamu adalah Kamu Yang Sekarang', '2024-01-20 15:26:12', '2024-04-23 02:58:35'),
	(18, '32710', 'Gibran Rakabuming', 'GR05', 'Tasikmalaya', '1994-12-12', 'Laki-laki', '085320555394', NULL, NULL, NULL, NULL, NULL, '750000', NULL, NULL, NULL, NULL, '20240504154057_IMG_20221204_110935.jpg.jpg', 'gibran@gmail.com', '12345678', '2023-12-12', 'Guru', 'Aktif', 'Guru PJOK', 'Do The Best For Be The Best', '2024-05-04 08:40:57', '2024-05-04 08:50:09'),
	(19, '32709', 'Hasby Junaedi', 'GR06', 'Jakarta', '1993-11-11', 'Laki-laki', '085320555394', 'https://www.instagram.com/muhammad_rafi94/?hl=id', 'hasby@gmail.com', 'Dr', 'SH', 'hasby@gmail.com', '750000', NULL, NULL, NULL, NULL, '20240504154948_WhatsApp_Image_2023-11-20_at_20.48.27_f6c9bdd2.jpg.jpg', 'hasby@gmail.com', '12345678', '2022-11-11', 'Guru', 'Aktif', 'Guru Kesenian', 'Hiduplah Bukan Hanya Sekedar Hidup', '2024-05-04 08:49:48', '2024-05-04 08:49:48'),
	(20, '32713', 'Suryati Aminarti', 'GR10', 'Tasikmalaya', '1992-11-11', 'Perempuan', '085320555394', NULL, NULL, NULL, NULL, NULL, '750000', NULL, NULL, NULL, NULL, '20240504155244_IMG_20221204_110935.jpg.jpg', 'suryarti@gmail.com', '12345678', '2022-11-11', 'Guru', 'Aktif', 'Guru Tarikh', 'Kamu adalah Kamu Yang Sekarang', '2024-05-04 08:52:44', '2024-05-04 08:52:44'),
	(21, '32719', 'Rere Samsara', 'GR11', 'Tasikmalaya', '1993-12-12', 'Perempuan', '085320555394', 'https://www.instagram.com/muhammad_rafi94/?hl=id', 'koperasisatu@gmail.com', 'Dr', 'SH', 'Test', '750000', NULL, NULL, NULL, NULL, '20240504155410_WhatsApp_Image_2023-11-20_at_20.48.27_f6c9bdd2.jpg.jpg', 'rere@gmail.com', '12345678', '2022-11-11', 'Guru', 'Aktif', 'Guru Tajwid', 'Do The Best For Be The Best', '2024-05-04 08:54:10', '2024-05-04 08:54:39');

-- Dumping structure for table db_akademik.hitung
CREATE TABLE IF NOT EXISTS `hitung` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_hitung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hitung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.hitung: ~4 rows (approximately)
INSERT INTO `hitung` (`id`, `nama_hitung`, `jumlah`, `hitung`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Siswa', '100', '100 Orang', '1', '2024-04-22 23:43:15', '2024-04-22 23:43:15'),
	(2, 'Alumni', '250', '250 Orang', '2', '2024-04-22 23:43:50', '2024-04-22 23:43:50'),
	(3, 'Guru', '38', '38 Orang', '3', '2024-04-22 23:44:12', '2024-04-22 23:44:12'),
	(4, 'Ruangan', '40', '40 Ruangan', '4', '2024-04-22 23:44:33', '2024-04-22 23:44:33');

-- Dumping structure for table db_akademik.jadwal_pelajaran
CREATE TABLE IF NOT EXISTS `jadwal_pelajaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.jadwal_pelajaran: ~5 rows (approximately)
INSERT INTO `jadwal_pelajaran` (`id`, `hari`, `kelas_id`, `created_at`, `updated_at`) VALUES
	(92, 'Senin', '5', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(93, 'Selasa', '5', '2024-04-06 09:15:57', '2024-04-06 09:15:57'),
	(94, 'Rabu', '5', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(95, 'Kamis', '5', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(96, 'Jumat', '5', '2024-04-06 09:29:10', '2024-04-06 09:29:10');

-- Dumping structure for table db_akademik.jadwal_pelajaran_detail
CREATE TABLE IF NOT EXISTS `jadwal_pelajaran_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jadwal_pelajaran_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mengajar_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.jadwal_pelajaran_detail: ~40 rows (approximately)
INSERT INTO `jadwal_pelajaran_detail` (`id`, `jadwal_pelajaran_id`, `hari`, `waktu_mengajar_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
	(306, '92', 'Senin', '25', '1', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(307, '92', 'Senin', '28', '8', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(308, '92', 'Senin', '29', '9', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(309, '92', 'Senin', '30', '12', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(310, '92', 'Senin', '31', '8', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(311, '92', 'Senin', '32', '14', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(312, '92', 'Senin', '33', '15', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(313, '92', 'Senin', '37', '1', '2024-04-06 09:15:38', '2024-04-06 09:15:38'),
	(314, '93', 'Selasa', '25', '12', '2024-04-06 09:15:57', '2024-04-06 09:15:57'),
	(315, '93', 'Selasa', '28', '13', '2024-04-06 09:15:57', '2024-04-06 09:15:57'),
	(316, '93', 'Selasa', '29', '13', '2024-04-06 09:15:57', '2024-04-06 09:15:57'),
	(317, '93', 'Selasa', '30', '14', '2024-04-06 09:15:58', '2024-04-06 09:15:58'),
	(318, '93', 'Selasa', '31', '15', '2024-04-06 09:15:58', '2024-04-06 09:15:58'),
	(319, '93', 'Selasa', '32', '8', '2024-04-06 09:15:58', '2024-04-06 09:15:58'),
	(320, '93', 'Selasa', '33', '13', '2024-04-06 09:15:58', '2024-04-06 09:15:58'),
	(321, '93', 'Selasa', '37', '16', '2024-04-06 09:15:58', '2024-04-06 09:15:58'),
	(322, '94', 'Rabu', '25', '9', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(323, '94', 'Rabu', '28', '14', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(324, '94', 'Rabu', '29', '12', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(325, '94', 'Rabu', '30', '13', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(326, '94', 'Rabu', '31', '16', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(327, '94', 'Rabu', '32', '8', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(328, '94', 'Rabu', '33', '14', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(329, '94', 'Rabu', '37', '13', '2024-04-06 09:16:24', '2024-04-06 09:16:24'),
	(330, '95', 'Kamis', '25', '13', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(331, '95', 'Kamis', '28', '14', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(332, '95', 'Kamis', '29', '14', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(333, '95', 'Kamis', '30', '14', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(334, '95', 'Kamis', '31', '13', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(335, '95', 'Kamis', '32', '16', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(336, '95', 'Kamis', '33', '9', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(337, '95', 'Kamis', '37', '8', '2024-04-06 09:28:45', '2024-04-06 09:28:45'),
	(338, '96', 'Jumat', '25', '15', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(339, '96', 'Jumat', '28', '8', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(340, '96', 'Jumat', '29', '16', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(341, '96', 'Jumat', '30', '9', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(342, '96', 'Jumat', '31', '13', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(343, '96', 'Jumat', '32', '15', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(344, '96', 'Jumat', '33', '8', '2024-04-06 09:29:10', '2024-04-06 09:29:10'),
	(345, '96', 'Jumat', '37', '12', '2024-04-06 09:29:10', '2024-04-06 09:29:10');

-- Dumping structure for table db_akademik.jenis_ujian
CREATE TABLE IF NOT EXISTS `jenis_ujian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_ujian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.jenis_ujian: ~12 rows (approximately)
INSERT INTO `jenis_ujian` (`id`, `nama_ujian`, `tanggal_ujian`, `keterangan`, `created_at`, `updated_at`) VALUES
	(9, 'PAS Semester 1', '2023-12-28', 'PAS Semester 1', '2023-12-27 20:56:45', '2023-12-27 20:56:45'),
	(10, 'PTS Semester 2', '2023-12-28', 'PTS Semester 2', '2023-12-27 20:57:05', '2023-12-27 20:57:05'),
	(11, 'PAT Semester 2', '2023-12-28', 'PAT Semester 2', '2023-12-27 20:57:26', '2023-12-27 20:57:26'),
	(12, 'Nilai Harian PTS Semester 1', '2023-12-27', 'Nilai Harian PTS Semester 1', '2023-12-27 21:16:17', '2023-12-27 21:16:17'),
	(13, 'Nilai Harian PAS Semester 1', '2023-12-28', 'Nilai Harian PAS Semester 1', '2023-12-27 21:16:41', '2023-12-27 21:16:41'),
	(14, 'Nilai Harian PTS Semester 2', '2023-12-28', 'Nilai Harian PTS Semester 2', '2023-12-27 21:17:22', '2023-12-27 21:17:22'),
	(15, 'Nilai Harian PAT Semester 2', '2023-12-28', 'Nilai Harian PAT Semester 2', '2023-12-27 21:17:35', '2023-12-27 21:17:35'),
	(16, 'Nilai Kehadiran PTS Semester 1', '2023-12-28', 'Nilai Kehadiran PTS Semester 1', '2023-12-27 21:18:25', '2023-12-27 21:18:25'),
	(17, 'Nilai Kehadiran PAS Semester 1', '2023-12-28', 'Nilai Kehadiran PAS Semester 1', '2023-12-27 21:18:36', '2023-12-27 21:18:36'),
	(18, 'Nilai Kehadiran PTS Semester 2', '2023-12-28', 'Nilai Kehadiran PTS Semester 2', '2023-12-27 21:18:52', '2023-12-27 21:18:52'),
	(19, 'Nilai Kehadiran PAT Semester 2', '2023-12-28', 'Nilai Kehadiran PAT Semester 2', '2023-12-27 21:19:07', '2024-01-13 05:15:03'),
	(21, 'PTS Semester 1', '2024-04-08', 'PTS Semester 1', '2024-04-08 00:59:31', '2024-04-08 00:59:31');

-- Dumping structure for table db_akademik.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.jurusan: ~2 rows (approximately)
INSERT INTO `jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
	(1, 'TKJ', 'TKJ', '2023-12-04 06:29:26', '2024-01-13 05:06:49'),
	(3, 'MMD', 'Multimedia', '2023-12-04 06:32:12', '2023-12-04 06:32:12');

-- Dumping structure for table db_akademik.kategori_barang
CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kategori_barang: ~2 rows (approximately)
INSERT INTO `kategori_barang` (`id`, `nama_kategori_barang`, `created_at`, `updated_at`) VALUES
	(2, 'Perkakas', '2024-01-03 00:40:51', '2024-01-03 00:40:51'),
	(4, 'Alat Peraga', '2024-01-04 18:40:36', '2024-01-04 18:40:36');

-- Dumping structure for table db_akademik.kategori_berita
CREATE TABLE IF NOT EXISTS `kategori_berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_berita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kategori_berita: ~6 rows (approximately)
INSERT INTO `kategori_berita` (`id`, `nama_kategori_berita`, `slug`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Pendidikan', 'pendidikan', '1', NULL, NULL),
	(2, 'Sosial', 'sosial', '2', NULL, NULL),
	(3, 'Kuliner', 'kuliner', '3', '2023-11-28 02:47:32', '2023-11-28 02:47:32'),
	(4, 'Sejarah Indonesia', 'sejarah-indonesia', '4', '2023-11-28 02:49:45', '2023-11-28 02:49:45'),
	(9, 'Politik', 'politik', '5', '2023-11-28 19:15:08', '2023-11-28 19:15:08'),
	(11, 'Umum', 'umum', '6', '2023-11-28 19:15:37', '2023-11-28 19:15:37');

-- Dumping structure for table db_akademik.kategori_galeri
CREATE TABLE IF NOT EXISTS `kategori_galeri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_galeri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kategori_galeri: ~2 rows (approximately)
INSERT INTO `kategori_galeri` (`id`, `nama_kategori_galeri`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'Umum Saja', '1', '2023-11-03 03:14:20', '2023-11-03 03:16:40'),
	(2, 'Pendidikan', '2', '2023-11-03 03:14:46', '2023-11-03 03:14:46');

-- Dumping structure for table db_akademik.kategori_produk
CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kategori_produk: ~2 rows (approximately)
INSERT INTO `kategori_produk` (`id`, `nama_kategori_produk`, `urutan`, `created_at`, `updated_at`) VALUES
	(2, 'Food', '1', '2024-03-03 09:42:39', '2024-03-03 09:42:39'),
	(3, 'Drink', '2', '2024-03-03 09:58:11', '2024-03-03 09:58:11');

-- Dumping structure for table db_akademik.kegiatan
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kegiatan: ~3 rows (approximately)
INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tanggal_kegiatan`, `jam`, `tempat`, `map`, `gambar`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'Seminar Parenting Sekolah', '2024-04-23', '02:00 - 04:00 WIB', 'Gedung Santika', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15828.989006170726!2d108.2199555!3d-7.3261021!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5748b3363aff%3A0x2f0e4a4f98e527ec!2sMasjid%20Agung%20Tasikmalaya!5e0!3m2!1sen!2sid!4v1713891379492!5m2!1sen!2sid', '20240423162706_1-13-website-blog-Family-in-the-Sunset-1160x665.webp', 'Aktif', 'Lorem ipsum dolor sit amet consectetur adipiscing elit suscipit, praesent posuere fames lobortis aptent augue fusce magnis netus, senectus aenean taciti mollis accumsan pretium risus. Ante erat ridiculus in vestibulum accumsan dignissim taciti tempor nibh, a enim justo tortor mi consequat penatibus porta, venenatis vivamus egestas euismod tristique pulvinar augue maecenas. Auctor aenean nam dignissim egestas cubilia risus cum ultricies nibh, sodales penatibus scelerisque gravida nec vivamus a id montes, tortor ad suscipit ut quam nisl tellus vestibulum.\r\n\r\nQuisque praesent sem lectus dictum condimentum, aliquet taciti netus hendrerit dapibus, justo ligula magna tellus. Rutrum suspendisse donec mollis nisi neque ridiculus accumsan, mus fringilla aptent dis ornare eget, mi eleifend tempus lacus mauris pulvinar suscipit, aliquet ultricies sociis montes dictumst. Conubia primis dapibus purus proin massa taciti sagittis, per nec scelerisque egestas tempor malesuada sociosqu curabitur, bibendum nulla lacinia nunc hendrerit ligula.', '2024-04-23 00:48:12', '2024-04-23 10:10:05'),
	(2, 'Camping Sabtu Minggu', '2024-04-23', '02:00 - 04:00 WIB', 'Gunung Syawal', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15853.720330527764!2d106.7916457!3d-6.5933468!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b6638f886b%3A0xa0790f704f7ca8ae!2sGreat%20Mosque%20Bogor!5e0!3m2!1sen!2sid!4v1713892323298!5m2!1sen!2sid', '20240423154906_depoknetizen-blogspot-com.jpg.jpg', 'Aktif', 'Lorem ipsum dolor sit amet consectetur adipiscing elit etiam, vulputate vel gravida pharetra cum dictumst posuere magnis taciti, nullam lacinia magna hendrerit facilisi tempor habitant. Velit condimentum lacinia laoreet felis scelerisque viverra eget morbi dapibus erat, neque commodo nostra etiam pellentesque sem suspendisse quam convallis venenatis ultricies, litora habitasse quisque aliquam eu lobortis per class urna. Nullam fringilla fames id justo commodo at tincidunt, ornare metus gravida lobortis semper euismod urna enim, pretium ullamcorper laoreet etiam purus molestie.\r\n\r\nMorbi nec massa eget odio sociis erat ut a, ac volutpat montes euismod dapibus gravida libero cursus, bibendum semper facilisis cum malesuada tellus porttitor. Penatibus ad fringilla ultricies fusce neque vulputate inceptos, hendrerit aptent facilisis eget nunc morbi bibendum primis, euismod sollicitudin iaculis lobortis praesent leo. Urna morbi lectus per habitasse curabitur molestie vitae, montes iaculis pulvinar ante fermentum conubia, consequat inceptos condimentum nibh blandit quis.', '2024-04-23 08:49:06', '2024-04-23 10:12:32'),
	(3, 'Pembangunan Gedung Sekolah', '2024-04-23', '02:00 - 04:00 WIB', 'Sekolah', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15828.989006170726!2d108.2199555!3d-7.3261021!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5748b3363aff%3A0x2f0e4a4f98e527ec!2sMasjid%20Agung%20Tasikmalaya!5e0!3m2!1sen!2sid!4v1713891379492!5m2!1sen!2sid', '20240423155459_willy-putra-desain-gedung-sekolah-muhammadiyah1656258326-m.jpeg.jpeg', 'Aktif', 'Lorem ipsum dolor sit amet consectetur adipiscing elit condimentum hendrerit erat, per diam maecenas integer primis id lobortis nullam gravida fermentum, risus iaculis ullamcorper commodo pellentesque viverra facilisis blandit curabitur. Ultricies dictum volutpat egestas montes eu laoreet a est, nascetur mi tincidunt platea litora duis nunc vivamus tristique, ac lacinia eget rutrum sapien erat arcu. Vivamus placerat cum est nulla mollis phasellus gravida bibendum donec lacinia velit, nibh dapibus in nunc posuere euismod blandit malesuada volutpat aptent integer, odio nisl vitae pharetra viverra eget mattis lacus netus a.\r\n\r\nQuis curabitur vehicula eget viverra sodales lectus phasellus, nibh ultrices nulla hendrerit mollis vitae aptent morbi, ornare sagittis feugiat augue risus non. At euismod sem a accumsan ullamcorper nibh, lobortis class malesuada faucibus eu tempor nullam, curae nam leo taciti odio. Tempor consequat dapibus ligula molestie penatibus, mollis donec erat himenaeos ornare volutpat, scelerisque vehicula vestibulum cras.', '2024-04-23 08:54:59', '2024-04-23 10:09:52');

-- Dumping structure for table db_akademik.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kelas: ~7 rows (approximately)
INSERT INTO `kelas` (`id`, `nama_kelas`, `wali_kelas`, `urutan`, `created_at`, `updated_at`) VALUES
	(5, 'KELAS 7A', '9', '2', '2023-12-28 18:06:37', '2023-12-28 18:28:17'),
	(6, 'KELAS 7B', '10', '3', '2023-12-28 18:06:51', '2023-12-28 18:28:24'),
	(7, 'Kelas Kosong', '7', '1', '2023-12-28 18:26:26', '2024-01-13 05:02:29'),
	(9, 'KELAS 8A', '11', '4', '2024-03-24 22:37:48', '2024-03-24 22:37:57'),
	(10, 'KELAS 8B', '12', '5', '2024-03-24 22:38:14', '2024-03-24 22:42:17'),
	(12, 'KELAS 9A', '18', '6', '2024-05-04 09:00:18', '2024-05-04 09:00:27'),
	(13, 'KELAS 9B', '21', '7', '2024-05-04 09:00:41', '2024-05-04 09:00:41');

-- Dumping structure for table db_akademik.kepala_sekolah
CREATE TABLE IF NOT EXISTS `kepala_sekolah` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kepala_sekolah: ~1 rows (approximately)
INSERT INTO `kepala_sekolah` (`id`, `nip`, `nama_kepala_sekolah`, `tanggal_mulai`, `tanggal_akhir`, `status`, `created_at`, `updated_at`) VALUES
	(1, '64654654', 'Muhammad Rafi Heryadi', '2023-12-04', '2023-12-04', 'Aktif', '2023-12-04 07:41:23', '2024-01-13 05:08:21');

-- Dumping structure for table db_akademik.kontak
CREATE TABLE IF NOT EXISTS `kontak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kontak: ~1 rows (approximately)
INSERT INTO `kontak` (`id`, `nama_kontak`, `email`, `no_telp`, `subjek`, `isi`, `created_at`, `updated_at`) VALUES
	(1, 'Rafi', 'muhammadrafiheryadi94@gmail.com', '085320555394', 'Pembuatan Hosting', 'Lorem ipsum dolor sit amet consectetur adipiscing elit, arcu sem aliquet molestie venenatis ridiculus ad ultricies, justo netus sociosqu suspendisse tincidunt congue. Malesuada pulvinar arcu nullam inceptos facilisis maecenas pharetra vulputate, dictumst eleifend viverra iaculis lobortis himenaeos bibendum, donec nostra curae quisque tristique vivamus sapien. Ad taciti at magnis a sapien ante vivamus, cras auctor enim turpis ligula congue, ullamcorper sagittis semper in posuere per.\r\n\r\nErat vestibulum mi sem maecenas quis nascetur suscipit turpis, sapien ante in quam feugiat felis risus, hac sodales urna eget morbi massa condimentum. Risus felis ante cum iaculis gravida blandit ornare, quis convallis molestie lectus mollis elementum magnis tortor, leo quisque fusce mauris nulla arcu. Mattis senectus natoque phasellus penatibus nulla in gravida risus venenatis torquent ultricies curabitur, elementum tempus neque tortor feugiat ullamcorper arcu pellentesque a pharetra accumsan, potenti etiam aliquet convallis netus blandit faucibus non tincidunt curae sem.', '2024-04-23 18:11:23', '2024-04-23 18:11:23');

-- Dumping structure for table db_akademik.kurikulum
CREATE TABLE IF NOT EXISTS `kurikulum` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kurikulum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.kurikulum: ~2 rows (approximately)
INSERT INTO `kurikulum` (`id`, `nama_kurikulum`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Kurtilas', 'Non Aktif', '2023-11-13 02:08:50', '2024-01-13 05:05:40'),
	(2, 'Merdeka', 'Aktif', '2023-11-13 02:09:05', '2024-01-13 05:05:58');

-- Dumping structure for table db_akademik.link
CREATE TABLE IF NOT EXISTS `link` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.link: ~2 rows (approximately)
INSERT INTO `link` (`id`, `nama_link`, `link`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'SMPIT Abu bakar', 'https://perdosni.org/unduhan', '1', '2024-04-23 19:23:52', '2024-04-23 19:30:59'),
	(2, 'Yayasan Abu bakar', 'https://drive.google.com/file/d/13lofIH_M8FtOHFbDP2HXVw9UV4HwNhtp/preview', '2', '2024-04-23 19:31:16', '2024-04-23 19:31:16');

-- Dumping structure for table db_akademik.log_histori
CREATE TABLE IF NOT EXISTS `log_histori` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Tabel_Asal` varchar(50) DEFAULT NULL,
  `ID_Entitas` int DEFAULT NULL,
  `Aksi` enum('Create','Read','Update','Delete') DEFAULT NULL,
  `Waktu` timestamp NULL DEFAULT NULL,
  `Pengguna` varchar(50) DEFAULT NULL,
  `Data_Lama` text,
  `Data_Baru` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=670 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_akademik.log_histori: ~31 rows (approximately)
INSERT INTO `log_histori` (`ID`, `Tabel_Asal`, `ID_Entitas`, `Aksi`, `Waktu`, `Pengguna`, `Data_Lama`, `Data_Baru`, `updated_at`, `created_at`) VALUES
	(639, 'Form Tahun Ajaran', 26, 'Update', '2024-05-03 18:03:09', '3', '{"id":26,"nama_tahun_ajaran":"2024\\/2025 Semester 2","status":"Non Aktif","created_at":"2024-04-29T13:08:54.000000Z","updated_at":"2024-04-29T16:27:12.000000Z"}', '{"nama_tahun_ajaran":"2024\\/2025 Semester 2","status":"Non Aktif"}', '2024-05-03 18:03:09', '2024-05-03 18:03:09'),
	(640, 'Form Tahun Ajaran', 9, 'Update', '2024-05-03 18:12:13', '3', '{"id":9,"nama_tahun_ajaran":"2024\\/2025 Semester 1","status":"Aktif","created_at":"2023-11-04T06:26:09.000000Z","updated_at":"2024-04-29T16:27:55.000000Z"}', '{"nama_tahun_ajaran":"2024\\/2025 Semester 1","status":"Non Aktif"}', '2024-05-03 18:12:13', '2024-05-03 18:12:13'),
	(641, 'Form Tahun Ajaran', 26, 'Update', '2024-05-03 18:12:19', '3', '{"id":26,"nama_tahun_ajaran":"2024\\/2025 Semester 2","status":"Non Aktif","created_at":"2024-04-29T13:08:54.000000Z","updated_at":"2024-04-29T16:27:12.000000Z"}', '{"nama_tahun_ajaran":"2024\\/2025 Semester 2","status":"Aktif"}', '2024-05-03 18:12:19', '2024-05-03 18:12:19'),
	(642, 'Form Tahun Ajaran', 27, 'Create', '2024-05-03 18:20:34', '3', NULL, '{"_token":"nifYD57Tupo4gYWROANZW1j83XoeHHejdfoOEKUe","nama_tahun_ajaran":"2023","status":"Non Aktif"}', '2024-05-03 18:20:34', '2024-05-03 18:20:34'),
	(643, 'Form Tahun Ajaran', 27, 'Delete', '2024-05-03 18:20:38', '3', '{"id":27,"nama_tahun_ajaran":"2023","status":"Non Aktif","created_at":"2024-05-04T01:20:34.000000Z","updated_at":"2024-05-04T01:20:34.000000Z"}', NULL, '2024-05-03 18:20:38', '2024-05-03 18:20:38'),
	(644, 'Form Tahun Ajaran', 26, 'Update', '2024-05-03 18:20:52', '3', '{"id":26,"nama_tahun_ajaran":"2024\\/2025 Semester 2","status":"Aktif","created_at":"2024-04-29T13:08:54.000000Z","updated_at":"2024-05-04T01:12:19.000000Z"}', '{"nama_tahun_ajaran":"2024\\/2025 Semester 2","status":"Non Aktif"}', '2024-05-03 18:20:52', '2024-05-03 18:20:52'),
	(645, 'Form Tahun Ajaran', 9, 'Update', '2024-05-03 18:20:56', '3', '{"id":9,"nama_tahun_ajaran":"2024\\/2025 Semester 1","status":"Non Aktif","created_at":"2023-11-04T06:26:09.000000Z","updated_at":"2024-05-04T01:12:13.000000Z"}', '{"nama_tahun_ajaran":"2024\\/2025 Semester 1","status":"Aktif"}', '2024-05-03 18:20:56', '2024-05-03 18:20:56'),
	(646, 'Form Tambah Guru', 18, 'Create', '2024-05-04 08:40:57', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nip":"GR05","kode_guru":"564646546543","nama_guru":"Gibran Rakabuming","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"alamat":null,"gelar_depan":null,"gelar_belakang":null,"username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","posisi":"Guru PJOK","mottto":"Do The Best","status_aktif":"Aktif","gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","honor":"750000"}', '2024-05-04 08:40:57', '2024-05-04 08:40:57'),
	(647, 'Form Update Guru', 18, 'Update', '2024-05-04 08:43:24', '3', '{"id":18,"nip":"GR05","nama_guru":"Gibran Rakabuming","kode_guru":"564646546543","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","status_aktif":"Aktif","posisi":"Guru PJOK","motto":null,"created_at":"2024-05-04T15:40:57.000000Z","updated_at":"2024-05-04T15:40:57.000000Z"}', '{"id":18,"nip":"44354666575","nama_guru":"Gibran Rakabuming","kode_guru":"GR05","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","status_aktif":"Aktif","posisi":"Guru PJOK","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:40:57.000000Z","updated_at":"2024-05-04T15:43:24.000000Z"}', '2024-05-04 08:43:24', '2024-05-04 08:43:24'),
	(648, 'Form Update Guru', 18, 'Update', '2024-05-04 08:47:58', '3', '{"id":18,"nip":"44354666575","nama_guru":"Gibran Rakabuming","kode_guru":"GR05","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","status_aktif":"Aktif","posisi":"Guru PJOK","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:40:57.000000Z","updated_at":"2024-05-04T15:43:24.000000Z"}', '{"id":18,"nip":"44354666575","nama_guru":"Gibran Rakabuming","kode_guru":"GR05","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","status_aktif":"Aktif","posisi":"Guru PJOK","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:40:57.000000Z","updated_at":"2024-05-04T15:43:24.000000Z"}', '2024-05-04 08:47:58', '2024-05-04 08:47:58'),
	(649, 'Form Tambah Guru', 19, 'Create', '2024-05-04 08:49:48', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nip":"32709","kode_guru":"GR06","nama_guru":"Hasby Junaedi","tempat_lahir":"Jakarta","tanggal_lahir":"1993-11-11","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":"https:\\/\\/www.instagram.com\\/muhammad_rafi94\\/?hl=id","email":"hasby@gmail.com","alamat":"hasby@gmail.com","gelar_depan":"Dr","gelar_belakang":"SH","username":"hasby@gmail.com","password":"12345678","tanggal_masuk":"2022-11-11","status":"Guru","posisi":"Guru Kesenian","motto":"Hiduplah Bukan Hanya Sekedar Hidup","status_aktif":"Aktif","gambar":"20240504154948_WhatsApp_Image_2023-11-20_at_20.48.27_f6c9bdd2.jpg.jpg","honor":"750000"}', '2024-05-04 08:49:48', '2024-05-04 08:49:48'),
	(650, 'Form Update Guru', 18, 'Update', '2024-05-04 08:50:09', '3', '{"id":18,"nip":"44354666575","nama_guru":"Gibran Rakabuming","kode_guru":"GR05","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","status_aktif":"Aktif","posisi":"Guru PJOK","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:40:57.000000Z","updated_at":"2024-05-04T15:43:24.000000Z"}', '{"id":18,"nip":"32710","nama_guru":"Gibran Rakabuming","kode_guru":"GR05","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1994-12-12","jenis_kelamin":"Laki-laki","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504154057_IMG_20221204_110935.jpg.jpg","username":"gibran@gmail.com","password":"12345678","tanggal_masuk":"2023-12-12","status":"Guru","status_aktif":"Aktif","posisi":"Guru PJOK","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:40:57.000000Z","updated_at":"2024-05-04T15:50:09.000000Z"}', '2024-05-04 08:50:09', '2024-05-04 08:50:09'),
	(651, 'Form Tambah Guru', 20, 'Create', '2024-05-04 08:52:44', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nip":"32713","kode_guru":"GR10","nama_guru":"Suryati Aminarti","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1992-11-11","jenis_kelamin":"Perempuan","no_telp":"085320555394","instagram":null,"email":null,"alamat":null,"gelar_depan":null,"gelar_belakang":null,"username":"suryarti@gmail.com","password":"12345678","tanggal_masuk":"2022-11-11","status":"Guru","posisi":"Guru Tarikh","motto":"Kamu adalah Kamu Yang Sekarang","status_aktif":"Aktif","gambar":"20240504155244_IMG_20221204_110935.jpg.jpg","honor":"750000"}', '2024-05-04 08:52:44', '2024-05-04 08:52:44'),
	(652, 'Form Tambah Guru', 21, 'Create', '2024-05-04 08:54:10', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nip":"32719","kode_guru":"GR11","nama_guru":"Rere Samsara","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1993-12-12","jenis_kelamin":"Perempuan","no_telp":"085320555394","instagram":null,"email":null,"alamat":null,"gelar_depan":null,"gelar_belakang":null,"username":"rere@gmail.com","password":"12345678","tanggal_masuk":"2022-11-11","status":"Guru","posisi":"Guru Tajwid","motto":"Do The Best For Be The Best","status_aktif":"Aktif","gambar":"20240504155410_WhatsApp_Image_2023-11-20_at_20.48.27_f6c9bdd2.jpg.jpg","honor":"750000"}', '2024-05-04 08:54:10', '2024-05-04 08:54:10'),
	(653, 'Form Update Guru', 21, 'Update', '2024-05-04 08:54:39', '3', '{"id":21,"nip":"32719","nama_guru":"Rere Samsara","kode_guru":"GR11","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1993-12-12","jenis_kelamin":"Perempuan","no_telp":"085320555394","instagram":null,"email":null,"gelar_depan":null,"gelar_belakang":null,"alamat":null,"honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504155410_WhatsApp_Image_2023-11-20_at_20.48.27_f6c9bdd2.jpg.jpg","username":"rere@gmail.com","password":"12345678","tanggal_masuk":"2022-11-11","status":"Guru","status_aktif":"Aktif","posisi":"Guru Tajwid","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:54:10.000000Z","updated_at":"2024-05-04T15:54:10.000000Z"}', '{"id":21,"nip":"32719","nama_guru":"Rere Samsara","kode_guru":"GR11","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1993-12-12","jenis_kelamin":"Perempuan","no_telp":"085320555394","instagram":"https:\\/\\/www.instagram.com\\/muhammad_rafi94\\/?hl=id","email":"koperasisatu@gmail.com","gelar_depan":"Dr","gelar_belakang":"SH","alamat":"Test","honor":"750000","tunjangan_1":null,"tunjangan_2":null,"tunjangan_3":null,"tunjangan_4":null,"gambar":"20240504155410_WhatsApp_Image_2023-11-20_at_20.48.27_f6c9bdd2.jpg.jpg","username":"rere@gmail.com","password":"12345678","tanggal_masuk":"2022-11-11","status":"Guru","status_aktif":"Aktif","posisi":"Guru Tajwid","motto":"Do The Best For Be The Best","created_at":"2024-05-04T15:54:10.000000Z","updated_at":"2024-05-04T15:54:39.000000Z"}', '2024-05-04 08:54:39', '2024-05-04 08:54:39'),
	(654, 'Form Tambah Siswa', 19, 'Create', '2024-05-04 08:57:36', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nik":"44354677555","nis":"20709","nama_siswa":"Martin Guera","email":"martin@gmail.com","jenis_kelamin":"Laki-laki","tempat_lahir":"Tanjung Pinang","tanggal_lahir":"1992-11-11","provinsi":"Jawa Barat","kota":"Tasikmalaya","alamat":"Perumahan CGM Sukarindik Kecamatan Bungursari. Blok C31. RT\\/RW 02\\/11. Kota Tasikmalaya\\r\\nJl. Tajur Indah","nama_ayah":"Gugun","pekerjaan_ayah":"Wiraswasta","penghasilan_ayah":"2-5 Jt","no_telp_ayah":"085345354354","nama_ibu":"Rini","pekerjaan_ibu":"IRT","penghasilan_ibu":"2-5 Jt","no_telp_ibu":"085345354354","nama_wali":"Herman","pekerjaan_wali":"Dokter","penghasilan_wali":">5 Jt","no_telp_wali":"085345354354","tahun_masuk":"2022","sekolah_asal":"SD ABBASH","kelas":"6B"}', '2024-05-04 08:57:36', '2024-05-04 08:57:36'),
	(655, 'Form Update Siswa', 19, 'Update', '2024-05-04 08:57:55', '3', '{"id":19,"nik":"44354677555","nis":"20709","nama_siswa":"Martin Guera","email":"martin@gmail.com","jenis_kelamin":"Laki-laki","tempat_lahir":"Tanjung Pinang","tanggal_lahir":"1992-11-11","provinsi":"Jawa Barat","kota":"Tasikmalaya","alamat":"Perumahan CGM Sukarindik Kecamatan Bungursari. Blok C31. RT\\/RW 02\\/11. Kota Tasikmalaya\\r\\nJl. Tajur Indah","nama_ayah":"Gugun","pekerjaan_ayah":"Wiraswasta","penghasilan_ayah":"2-5 Jt","no_telp_ayah":"085345354354","nama_ibu":"Rini","pekerjaan_ibu":"IRT","penghasilan_ibu":"2-5 Jt","no_telp_ibu":"085345354354","nama_wali":"Herman","pekerjaan_wali":"Dokter","penghasilan_wali":">5 Jt","no_telp_wali":"085345354354","tahun_masuk":"2022","sekolah_asal":"SD ABBASH","kelas":"6B","foto":null,"kk":null,"ijazah":null,"akte":null,"ktp":null,"jumlah_tabungan":null,"status":null,"created_at":"2024-05-04T15:57:36.000000Z","updated_at":"2024-05-04T15:57:36.000000Z"}', '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","_method":"put","nik":"44354677555","nis":"20709","nama_siswa":"Martin Guera","email":"martin@gmail.com","jenis_kelamin":"Laki-laki","tempat_lahir":"Tanjung Pinang","tanggal_lahir":"1992-11-11","provinsi":"Jawa Barat","kota":"Tasikmalaya","alamat":"Perumahan CGM Sukarindik Kecamatan Bungursari. Blok C31. RT\\/RW 02\\/11. Kota Tasikmalaya\\r\\nJl. Tajur Indah","nama_ayah":"Gugun","pekerjaan_ayah":"Wiraswasta","penghasilan_ayah":"2-5 Jt","no_telp_ayah":"085345354354","nama_ibu":"Rini","pekerjaan_ibu":"IRT","penghasilan_ibu":"2-5 Jt","no_telp_ibu":"085345354354","nama_wali":"Herman","pekerjaan_wali":"Dokter","penghasilan_wali":">5 Jt","no_telp_wali":"085345354354","tahun_masuk":"2022","sekolah_asal":"SD ABBASH","kelas":"6B","foto":"20240504155755_6.png.png"}', '2024-05-04 08:57:55', '2024-05-04 08:57:55'),
	(656, 'Form Update Siswa', 16, 'Update', '2024-05-04 08:58:20', '3', '{"id":16,"nik":"20704xx","nis":"20704xx","nama_siswa":"Sansan Sananta","email":"sansan@gmail.com","jenis_kelamin":"Laki-laki","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1992-12-29","provinsi":"Jawa Barat","kota":"Kota Tasikmalaya","alamat":"Jl. Cilacap","nama_ayah":"Rudi","pekerjaan_ayah":"Wiraswasta","penghasilan_ayah":">5 Jt","no_telp_ayah":"085345354354","nama_ibu":"Rini","pekerjaan_ibu":"IRT","penghasilan_ibu":">5 Jt","no_telp_ibu":"085345354354","nama_wali":"Herman","pekerjaan_wali":"Dokter","penghasilan_wali":">5 Jt","no_telp_wali":"085345354354","tahun_masuk":"2022","sekolah_asal":"SD ABBASH","kelas":"6C","foto":"20231229010508_3.png.png","kk":"20231229010508_12.pdf.pdf","ijazah":"20231229010508_12.pdf.pdf","akte":"20231229010508_12.pdf.pdf","ktp":"20231229010508_12.pdf.pdf","jumlah_tabungan":null,"status":null,"created_at":"2023-12-29T01:05:08.000000Z","updated_at":"2024-01-13T12:01:26.000000Z"}', '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","_method":"put","nik":"20704","nis":"20704","nama_siswa":"Sansan Sananta","email":"sansan@gmail.com","jenis_kelamin":"Laki-laki","tempat_lahir":"Tasikmalaya","tanggal_lahir":"1992-12-29","provinsi":"Jawa Barat","kota":"Kota Tasikmalaya","alamat":"Jl. Cilacap","nama_ayah":"Rudi","pekerjaan_ayah":"Wiraswasta","penghasilan_ayah":">5 Jt","no_telp_ayah":"085345354354","nama_ibu":"Rini","pekerjaan_ibu":"IRT","penghasilan_ibu":">5 Jt","no_telp_ibu":"085345354354","nama_wali":"Herman","pekerjaan_wali":"Dokter","penghasilan_wali":">5 Jt","no_telp_wali":"085345354354","tahun_masuk":"2022","sekolah_asal":"SD ABBASH","kelas":"6C"}', '2024-05-04 08:58:20', '2024-05-04 08:58:20'),
	(657, 'Form Tambah Kelas', 12, 'Create', '2024-05-04 09:00:18', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nama_kelas":"KELAS 9A","wali_kelas":"18","urutan":"5"}', '2024-05-04 09:00:18', '2024-05-04 09:00:18'),
	(658, 'Form Update Kelas', 12, 'Update', '2024-05-04 09:00:27', '3', '{"id":12,"nama_kelas":"KELAS 9A","wali_kelas":"18","urutan":"5","created_at":"2024-05-04T16:00:18.000000Z","updated_at":"2024-05-04T16:00:18.000000Z"}', '{"nama_kelas":"KELAS 9A","wali_kelas":"18","urutan":"6"}', '2024-05-04 09:00:27', '2024-05-04 09:00:27'),
	(659, 'Form Tambah Kelas', 13, 'Create', '2024-05-04 09:00:41', '3', NULL, '{"_token":"MJp0BP7JADLmTs3dxG8N6J7Tu6wEza70jS7Y2WPN","nama_kelas":"KELAS 9B","wali_kelas":"21","urutan":"7"}', '2024-05-04 09:00:41', '2024-05-04 09:00:41'),
	(660, 'Form Hapus Jadwal Pelajaran', 12, 'Delete', '2024-05-06 00:27:55', '3', '{"id":12,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"16","status":"Hadir","keterangan":null,"created_at":"2024-05-06T07:27:38.000000Z","updated_at":"2024-05-06T07:27:38.000000Z"}', NULL, '2024-05-06 00:27:55', '2024-05-06 00:27:55'),
	(661, 'Form Hapus Jadwal Pelajaran', 11, 'Delete', '2024-05-06 00:27:59', '3', '{"id":11,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"15","status":"Hadir","keterangan":null,"created_at":"2024-05-06T07:27:38.000000Z","updated_at":"2024-05-06T07:27:38.000000Z"}', NULL, '2024-05-06 00:27:59', '2024-05-06 00:27:59'),
	(662, 'Form Hapus Jadwal Pelajaran', 10, 'Delete', '2024-05-06 00:28:04', '3', '{"id":10,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"14","status":"Hadir","keterangan":null,"created_at":"2024-05-06T07:27:38.000000Z","updated_at":"2024-05-06T07:27:38.000000Z"}', NULL, '2024-05-06 00:28:04', '2024-05-06 00:28:04'),
	(663, 'Form Hapus Jadwal Pelajaran', 9, 'Delete', '2024-05-06 00:28:07', '3', '{"id":9,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"11","status":"Izin","keterangan":null,"created_at":"2024-05-06T07:27:38.000000Z","updated_at":"2024-05-06T07:27:38.000000Z"}', NULL, '2024-05-06 00:28:07', '2024-05-06 00:28:07'),
	(664, 'Form Update Absensi', 5, 'Update', '2024-05-06 01:22:30', '3', '{"id":5,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"11","status":"Hadir","keterangan":"Hadir","created_at":"2024-05-06T07:23:37.000000Z","updated_at":"2024-05-06T08:22:29.000000Z"}', '{"guru_id":"7","siswa_id":"11","status":"Hadir","keterangan":"Hadir"}', '2024-05-06 01:22:30', '2024-05-06 01:22:30'),
	(665, 'Form Update Absensi', 6, 'Update', '2024-05-06 01:22:40', '3', '{"id":6,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"14","status":"Hadir","keterangan":"hadir","created_at":"2024-05-06T07:23:37.000000Z","updated_at":"2024-05-06T08:22:39.000000Z"}', '{"guru_id":"7","siswa_id":"14","status":"Hadir","keterangan":"hadir"}', '2024-05-06 01:22:40', '2024-05-06 01:22:40'),
	(666, 'Form Update Absensi', 7, 'Update', '2024-05-06 07:05:30', '3', '{"id":7,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"15","status":"Alpa","keterangan":"Alpa","created_at":"2024-05-06T07:23:37.000000Z","updated_at":"2024-05-06T14:05:30.000000Z"}', '{"guru_id":"7","siswa_id":"15","status":"Alpa","keterangan":"Alpa"}', '2024-05-06 07:05:30', '2024-05-06 07:05:30'),
	(667, 'Form Update Absensi', 7, 'Update', '2024-05-06 07:05:30', '3', '{"id":7,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"15","status":"Alpa","keterangan":"Alpa","created_at":"2024-05-06T07:23:37.000000Z","updated_at":"2024-05-06T14:05:30.000000Z"}', '{"guru_id":"7","siswa_id":"15","status":"Alpa","keterangan":"Alpa"}', '2024-05-06 07:05:30', '2024-05-06 07:05:30'),
	(668, 'Form Update Absensi', 6, 'Update', '2024-05-06 07:05:38', '3', '{"id":6,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"14","status":"Hadir","keterangan":"Hadir","created_at":"2024-05-06T07:23:37.000000Z","updated_at":"2024-05-06T14:05:38.000000Z"}', '{"guru_id":"7","siswa_id":"14","status":"Hadir","keterangan":"Hadir"}', '2024-05-06 07:05:38', '2024-05-06 07:05:38'),
	(669, 'Form Update Absensi', 8, 'Update', '2024-05-06 07:05:46', '3', '{"id":8,"tanggal_absensi":"2024-05-06 00:00:00","guru_id":"7","siswa_id":"16","status":"Izin","keterangan":"Izin","created_at":"2024-05-06T07:23:37.000000Z","updated_at":"2024-05-06T14:05:46.000000Z"}', '{"guru_id":"7","siswa_id":"16","status":"Izin","keterangan":"Izin"}', '2024-05-06 07:05:46', '2024-05-06 07:05:46');

-- Dumping structure for table db_akademik.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_pengampu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.mapel: ~8 rows (approximately)
INSERT INTO `mapel` (`id`, `nama_mapel`, `guru_pengampu`, `kkm`, `created_at`, `updated_at`) VALUES
	(1, 'MAPEL KOSONG', '1', '0', '2023-12-28 18:32:59', '2024-01-13 05:03:44'),
	(8, 'MATEMATIKA', '9', '80', '2023-12-28 18:17:11', '2023-12-28 18:17:11'),
	(9, 'BAHASA INGGRIS', '10', '80', '2023-12-28 18:17:45', '2023-12-28 18:17:45'),
	(12, 'TIK', '12', '80', '2024-01-23 20:04:53', '2024-01-23 20:06:51'),
	(13, 'QURDITS', '11', '80', '2024-01-23 20:07:02', '2024-01-23 20:07:02'),
	(14, 'TAHSIN', '7', '80', '2024-01-23 20:08:19', '2024-01-23 20:08:19'),
	(15, 'IPA', '9', '80', '2024-03-24 22:45:58', '2024-03-24 22:45:58'),
	(16, 'IPS', '11', '80', '2024-03-24 22:46:09', '2024-03-24 22:46:09');

-- Dumping structure for table db_akademik.member
CREATE TABLE IF NOT EXISTS `member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_guru_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.member: ~2 rows (approximately)
INSERT INTO `member` (`id`, `kode_member`, `jenis_member`, `siswa_id`, `guru_id`, `member_siswa_id`, `member_guru_id`, `nama_member`, `saldo`, `status`, `created_at`, `updated_at`) VALUES
	(2, '4321', 'Umum', NULL, NULL, NULL, NULL, 'Pelanggan Umum', '100000', 'Aktif', '2024-03-23 21:26:16', '2024-04-07 09:37:20'),
	(7, '1234', 'Siswa', '14', NULL, '14', NULL, 'Susanti Setiawati', '100000', 'Aktif', '2024-03-23 23:37:45', '2024-03-23 23:41:03');

-- Dumping structure for table db_akademik.metode
CREATE TABLE IF NOT EXISTS `metode` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.metode: ~5 rows (approximately)
INSERT INTO `metode` (`id`, `nama`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
	(2, 'Gopay', 'Gopay', '20231009153317_Screenshot_7.png.png', '2023-10-09 08:33:17', '2023-10-09 08:33:17'),
	(3, 'QRIS', 'QRIS', '20231009153342_Screenshot_8.png.png', '2023-10-09 08:33:42', '2023-10-09 08:33:42'),
	(4, 'ShopeePay', 'ShopeePay', '20231009153436_Screenshot_9.png.png', '2023-10-09 08:34:36', '2023-10-09 08:34:36'),
	(5, 'Indomaret', 'Indomaret', '20231009153458_Screenshot_10.png.png', '2023-10-09 08:34:58', '2023-10-09 08:34:58'),
	(6, 'Akulaku', 'Akulaku', '20231009153519_Screenshot_12.png.png', '2023-10-09 08:35:19', '2023-10-09 08:35:19');

-- Dumping structure for table db_akademik.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.migrations: ~57 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(19, '2023_11_01_173357_create_siswas_table', 1),
	(20, '2023_11_02_154106_create_sliders_table', 2),
	(21, '2023_11_02_154823_create_add_gambar_sliders_table', 3),
	(22, '2023_11_03_015137_create_abouts_table', 4),
	(23, '2023_11_03_093438_create_galeris_table', 5),
	(24, '2023_11_03_094617_create_add_kategori_galeris_table', 6),
	(25, '2023_11_03_095827_create_kategori_galeris_table', 7),
	(26, '2023_11_03_113427_create_mitras_table', 8),
	(27, '2023_11_03_134745_create_add_gambar_mitras_table', 9),
	(29, '2023_11_03_151552_create_tahun_ajarans_table', 11),
	(30, '2023_11_04_065413_create_gurus_table', 12),
	(32, '2023_11_04_104025_create_kelass_table', 13),
	(33, '2023_11_05_115655_create_mapel_table', 14),
	(34, '2023_11_13_084727_create_kurikulum_table', 15),
	(35, '2023_11_28_061307_create_kategori_berita_table', 16),
	(36, '2023_11_29_053512_create_berita_table', 17),
	(37, '2023_12_04_114135_create_jurusan_table', 18),
	(38, '2023_12_04_133525_create_ruangan_table', 19),
	(39, '2023_12_04_135850_create_wali_kelas_table', 20),
	(40, '2023_12_04_140834_create_kepala_sekolah_table', 21),
	(41, '2023_12_05_163551_create_waktu_mengajar_table', 22),
	(42, '2023_12_06_054843_create_jadwal_pelajaran_table', 23),
	(43, '2023_12_06_055403_create_jadwal_pelajaran_detail_table', 24),
	(44, '2023_12_15_011517_create_penempatan_kelas_table', 25),
	(45, '2023_12_15_011517_create_penempatan_kelas_head_table', 26),
	(46, '2023_12_15_145952_create_penempatan_kelas_detail_table', 27),
	(47, '2023_12_27_221544_create_jenis_ujian_table', 28),
	(48, '2023_12_28_042425_create_nilai_siswa_head_table', 29),
	(49, '2023_12_28_044532_create_nilai_siswa_detail_table', 30),
	(50, '2023_12_29_053507_create_pengeluaran_table', 31),
	(51, '2023_12_29_141156_create_pemasukan_table', 32),
	(52, '2023_12_29_233054_create_spp_table', 33),
	(53, '2023_12_30_035048_create_bayar_spp_head_table', 34),
	(54, '2023_12_30_035404_create_bayar_spp_detail_table', 35),
	(55, '2023_12_31_010615_create_tabungan_table', 36),
	(56, '2024_01_03_064832_create_kategori_barang_table', 37),
	(57, '2024_01_03_063245_create_barang_table', 38),
	(58, '2024_01_03_064922_create_mutasi_barang_table', 39),
	(59, '2024_01_07_000903_create_surat_masuk_table', 40),
	(60, '2024_01_07_001606_create_surat_keluar_table', 41),
	(61, '2024_01_10_180723_create_tarik_tabungan_table', 42),
	(62, '2024_03_03_094228_create_kategori_produks_table', 43),
	(63, '2024_03_03_094702_create_produks_table', 44),
	(66, '2024_03_03_100211_create_suppliers_table', 47),
	(67, '2024_03_21_014354_create_satuan_produks_table', 48),
	(68, '2024_03_21_091320_create_pembelian_details_table', 49),
	(69, '2024_03_21_095243_create_pembelians_table', 50),
	(70, '2024_03_21_095310_create_penjualans_table', 51),
	(71, '2024_03_21_092828_create_penjualan_details_table', 52),
	(72, '2024_03_24_032405_create_members_table', 53),
	(73, '2024_03_24_054216_create_top_up_members_table', 54),
	(74, '2024_04_23_062013_create_hitungs_table', 55),
	(75, '2024_04_23_070445_create_kegiatans_table', 56),
	(76, '2024_04_23_235239_create_kontaks_table', 57),
	(77, '2024_04_24_011335_create_unduhans_table', 58),
	(78, '2024_04_24_021019_create_links_table', 59),
	(79, '2024_05_05_150738_create_absensis_table', 60);

-- Dumping structure for table db_akademik.mitra
CREATE TABLE IF NOT EXISTS `mitra` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.mitra: ~7 rows (approximately)
INSERT INTO `mitra` (`id`, `nama_mitra`, `no_telp`, `email`, `instagram`, `youtube`, `website`, `keterangan`, `gambar`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'PT. Dekan', '085320555394', 'admin@admin.com', '@muhraff', 'muhraff', 'https://a.com', 'Test keterangan', '20240423020837_Picture1.png.png', '1', '2023-11-03 07:13:46', '2024-04-22 19:08:37'),
	(2, 'PT. Dekan', '085320555394', 'koperasisatu@gmail.com', 'https://www.instagram.com/muhammad_rafi94/?hl=id', 'https://www.youtube.com/watch?v=r44RKWyfcFw&amp;fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM', 'https://www.youtube.com/watch?v=r44RKWyfcFw&amp;fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM', 'https://www.youtube.com/watch?v=r44RKWyfcFw&amp;fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM', '20240423020917_SMP_ISI_2.png.png', '2', '2024-04-22 19:09:17', '2024-04-22 19:09:17'),
	(3, 'PT. Dekan', '085320555394', 'koperasisatu@gmail.com', 'https://www.instagram.com/muhammad_rafi94/?hl=id', 'https://www.youtube.com/watch?v=r44RKWyfcFw&amp;fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM', 'www.ltpresent.com', NULL, '20240423100506_1.png.png', '3', '2024-04-23 03:05:06', '2024-04-23 03:05:06'),
	(4, 'PT. Dekan', '085320555394', 'koperasisatu@gmail.com', NULL, NULL, NULL, NULL, '20240423100646_2.png.png', '4', '2024-04-23 03:06:46', '2024-04-23 03:06:46'),
	(5, 'PT. Dekan', '085320555394', 'koperasisatu@gmail.com', NULL, NULL, NULL, NULL, '20240423100702_3.png.png', '5', '2024-04-23 03:07:02', '2024-04-23 03:07:02'),
	(6, 'PT. Dekan', '0853205553949', 'koperasisatu@gmail.com', NULL, NULL, NULL, NULL, '20240423100733_LOGO_MASJID_ABU_BAKAR_ASH_SHIDDIQ.png.png', '6', '2024-04-23 03:07:33', '2024-04-23 03:07:33'),
	(7, 'PT. Dekan', '0853205553949', 'koperasidua@gmail.com', NULL, NULL, NULL, NULL, '20240423100824_LOGO_ABMT.png.png', '7', '2024-04-23 03:08:24', '2024-04-23 03:08:24');

-- Dumping structure for table db_akademik.mutasi_barang
CREATE TABLE IF NOT EXISTS `mutasi_barang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_mutasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mutasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_mutasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tersedia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id_asal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id_tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.mutasi_barang: ~1 rows (approximately)
INSERT INTO `mutasi_barang` (`id`, `jenis_mutasi`, `tanggal_mutasi`, `tanggal_kembali`, `kode_mutasi`, `barang_id`, `qty`, `kondisi_barang`, `jumlah_tersedia`, `ruangan_id_asal`, `ruangan_id_tujuan`, `pic`, `bukti`, `keterangan`, `created_at`, `updated_at`) VALUES
	(17, 'Keluar', '2024-04-13', '2024-04-20', '1234', '9', '20', 'Baik', '20', '4', '1', 'Rudi Aja', '20240413004316_SNACK_(4).png.png', 'Keterangan', '2024-04-12 17:43:16', '2024-04-12 17:43:16');

-- Dumping structure for table db_akademik.nilai_siswa_detail
CREATE TABLE IF NOT EXISTS `nilai_siswa_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nilai_siswa_head_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_ujian_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.nilai_siswa_detail: ~12 rows (approximately)
INSERT INTO `nilai_siswa_detail` (`id`, `nilai_siswa_head_id`, `jenis_ujian_id`, `nilai`, `created_at`, `updated_at`) VALUES
	(145, '13', '9', '80', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(146, '13', '10', '70', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(147, '13', '11', '80', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(148, '13', '12', '90', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(149, '13', '13', '90', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(150, '13', '14', '90', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(151, '13', '15', '99', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(152, '13', '16', '70', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(153, '13', '17', '80', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(154, '13', '18', '70', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(155, '13', '19', '80', '2024-04-12 16:52:46', '2024-04-12 16:52:46'),
	(156, '13', '21', '70', '2024-04-12 16:52:46', '2024-04-12 16:52:46');

-- Dumping structure for table db_akademik.nilai_siswa_head
CREATE TABLE IF NOT EXISTS `nilai_siswa_head` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.nilai_siswa_head: ~1 rows (approximately)
INSERT INTO `nilai_siswa_head` (`id`, `tahun_ajaran_id`, `kelas_id`, `siswa_id`, `mapel_id`, `total_nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
	(13, '9', '5', '11', '8', '81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-04-12 16:52:45', '2024-04-12 16:52:45');

-- Dumping structure for table db_akademik.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.password_resets: ~0 rows (approximately)

-- Dumping structure for table db_akademik.pemasukan
CREATE TABLE IF NOT EXISTS `pemasukan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pemasukan` date NOT NULL,
  `nama_pemasukan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pemasukan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.pemasukan: ~1 rows (approximately)
INSERT INTO `pemasukan` (`id`, `tanggal_pemasukan`, `nama_pemasukan`, `jumlah_pemasukan`, `keterangan`, `pic`, `bukti`, `created_at`, `updated_at`) VALUES
	(4, '2024-04-07', 'Dana BOS', '1000000', '9876', 'Andrey', NULL, '2024-04-08 08:02:28', '2024-04-08 08:02:28');

-- Dumping structure for table db_akademik.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pembelian` date NOT NULL,
  `kode_pembelian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.pembelian: ~1 rows (approximately)
INSERT INTO `pembelian` (`id`, `tanggal_pembelian`, `kode_pembelian`, `supplier_id`, `nama_supplier`, `total_bayar`, `jenis_pembayaran`, `bukti`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES
	(60, '2024-03-23', 'LTPOS-20240323-000001', '3', 'Jaya Lestari', '30000', 'CASH', NULL, 'Muhammad Rafi Heryadi', NULL, '2024-03-23 09:03:44', '2024-03-23 09:03:44');

-- Dumping structure for table db_akademik.pembelian_detail
CREATE TABLE IF NOT EXISTS `pembelian_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pembelian_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.pembelian_detail: ~2 rows (approximately)
INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `produk_id`, `nama_produk`, `qty`, `harga_beli`, `total`, `created_at`, `updated_at`) VALUES
	(68, '60', '4', 'Es Teh Botol', '1', '10000', '10000', '2024-03-23 09:03:44', '2024-03-23 09:03:44'),
	(69, '60', '5', 'Keripik Taro', '1', '4000', '4000', '2024-03-23 09:03:44', '2024-03-23 09:03:44');

-- Dumping structure for table db_akademik.penempatan_kelas_detail
CREATE TABLE IF NOT EXISTS `penempatan_kelas_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penempatan_kelas_head_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.penempatan_kelas_detail: ~4 rows (approximately)
INSERT INTO `penempatan_kelas_detail` (`id`, `penempatan_kelas_head_id`, `siswa_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
	(51, '31', '11', '5', '2024-04-06 09:50:22', '2024-04-06 09:50:22'),
	(52, '31', '14', '5', '2024-04-06 09:50:22', '2024-04-06 09:50:22'),
	(53, '31', '15', '5', '2024-04-06 09:50:22', '2024-04-06 09:50:22'),
	(54, '31', '16', '5', '2024-04-06 09:50:22', '2024-04-06 09:50:22');

-- Dumping structure for table db_akademik.penempatan_kelas_head
CREATE TABLE IF NOT EXISTS `penempatan_kelas_head` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kelas_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penempatan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.penempatan_kelas_head: ~1 rows (approximately)
INSERT INTO `penempatan_kelas_head` (`id`, `kelas_id`, `tanggal_penempatan`, `created_at`, `updated_at`) VALUES
	(31, '5', '2024-04-06', '2024-04-06 09:50:22', '2024-04-06 09:50:22');

-- Dumping structure for table db_akademik.pengeluaran
CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_pengeluaran` date NOT NULL,
  `nama_pengeluaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.pengeluaran: ~2 rows (approximately)
INSERT INTO `pengeluaran` (`id`, `tanggal_pengeluaran`, `nama_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `pic`, `bukti`, `created_at`, `updated_at`) VALUES
	(17, '2024-04-08', 'Gaji Karyawan', '800000', '12345', 'Rudi Aja', NULL, '2024-04-08 07:59:56', '2024-04-08 07:59:56'),
	(18, '2024-04-08', 'Listrik', '200000', '999', 'Rudi', NULL, '2024-04-08 08:01:43', '2024-04-08 08:01:43');

-- Dumping structure for table db_akademik.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_penjualan` date NOT NULL,
  `kode_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_member` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.penjualan: ~0 rows (approximately)

-- Dumping structure for table db_akademik.penjualan_detail
CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.penjualan_detail: ~0 rows (approximately)

-- Dumping structure for table db_akademik.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table db_akademik.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_produk_id` bigint NOT NULL DEFAULT '0',
  `satuan_produk_id_1` bigint NOT NULL DEFAULT '0',
  `satuan_produk_id_2` bigint NOT NULL DEFAULT '0',
  `isi` bigint NOT NULL DEFAULT '0',
  `kode_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.produk: ~2 rows (approximately)
INSERT INTO `produk` (`id`, `kategori_produk_id`, `satuan_produk_id_1`, `satuan_produk_id_2`, `isi`, `kode_produk`, `nama_produk`, `merk`, `type`, `stok`, `status`, `lokasi`, `harga_beli`, `harga_jual_1`, `harga_jual_2`, `harga_jual_3`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(4, 3, 4, 1, 24, '1234', 'Es Teh Botol', 'Es Teh Botol', 'Es Teh Botol', '20', 'Aktif', 'Etalase', '10000', '11000', '12000', '13000', '20240321052058_Desain_tanpa_judul.png.png', 'Tes', '2024-03-20 22:20:58', '2024-04-07 09:36:17'),
	(5, 2, 3, 1, 12, '1234', 'Keripik Taro', 'Keripik Taro', 'Keripik Taro', '10', 'Aktif', 'Etalase', '4000', '5000', '6000', '7000', '20240322012950_Thumbnail_YouTube__(1).png.png', 'Keripik Taro', '2024-03-21 18:29:50', '2024-04-07 09:36:14');

-- Dumping structure for table db_akademik.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `kepala_sekolah_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bendahara_sekolah_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_sekolah_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.profil: ~1 rows (approximately)
INSERT INTO `profil` (`id`, `nama_sekolah`, `npsn`, `kepala_sekolah_id`, `bendahara_sekolah_id`, `operator_sekolah_id`, `status`, `alamat`, `no_telp`, `email`, `instagram`, `facebook`, `website`, `youtube`, `deskripsi`, `logo`, `favicon`, `gambar`, `map`, `created_at`, `updated_at`) VALUES
	(1, 'SDIT MARYAM LAYLA ALFATHUNISSA', '72328412233', '7', '11', '12', 'Swasta', 'Jl. Tajur Indah No 121 RT/RW 002/008 Indihiang Kota Tasikmalaya', '085320555394', 'sditmaryamlayla@gmail.com', 'https://www.instagram.com/?hl=id', 'https://www.facebook.com/', 'https://maryamlayla.com', 'https://www.youtube.com/watch?v=vUYpB1kwzE4', 'Sekolah Islam Terpadu MARYAM LAYLA ALFATHUNISSA. \r\nVel hac eleifend netus nibh, arcu platea aptent mi, viverra dictumst vitae. Tincidunt ultrices diam viverra enim vivamus inceptos molestie dapibus semper vehicula nam mauris, aliquam dictumst volutpat morbi a lobortis taciti odio venenatis magnis consequat, sagittis nisl massa et libero risus vel platea mollis bibendum in. Donec augue lobortis cum montes netus etiam interdum mus, semper iaculis torquent metus nullam aptent himenaeos id, blandit tempus magnis senectus risus placerat per.', 'logo_1714364503.png', 'favicon_1714365779.png', 'banner_1713827801.jpeg', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15828.989006170726!2d108.2199555!3d-7.3261021!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5748b3363aff%3A0x2f0e4a4f98e527ec!2sMasjid%20Agung%20Tasikmalaya!5e0!3m2!1sen!2sid!4v1713891379492!5m2!1sen!2sid', NULL, '2024-04-28 21:42:59');

-- Dumping structure for table db_akademik.ruangan
CREATE TABLE IF NOT EXISTS `ruangan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.ruangan: ~5 rows (approximately)
INSERT INTO `ruangan` (`id`, `kode_ruangan`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
	(1, 'R001', 'Aula Utama', '2023-12-04 06:44:47', '2024-01-13 05:07:27'),
	(4, 'R002', 'Gudang', '2024-01-03 11:28:01', '2024-01-04 06:54:13'),
	(5, 'R003', 'Pantry', '2024-01-03 11:28:10', '2024-01-04 06:55:00'),
	(6, 'R004', 'KELAS 1A', '2024-01-04 06:54:44', '2024-01-04 06:54:44'),
	(7, 'R005', 'KELAS 1B', '2024-01-04 06:54:51', '2024-01-04 06:54:51');

-- Dumping structure for table db_akademik.satuan_produk
CREATE TABLE IF NOT EXISTS `satuan_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_satuan_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.satuan_produk: ~6 rows (approximately)
INSERT INTO `satuan_produk` (`id`, `nama_satuan_produk`, `urutan`, `created_at`, `updated_at`) VALUES
	(1, 'PCS', '1', '2024-03-20 18:54:26', '2024-03-20 18:54:26'),
	(2, 'KG', '2', '2024-03-20 18:54:34', '2024-03-20 18:54:43'),
	(3, 'BOX', '3', '2024-03-20 18:54:53', '2024-03-20 18:54:53'),
	(4, 'KARTON', '4', '2024-03-20 18:55:04', '2024-03-20 18:55:04'),
	(5, 'PACK', '5', '2024-03-20 18:55:14', '2024-03-20 18:55:14'),
	(6, 'DUS', '6', '2024-03-20 18:55:28', '2024-03-20 18:55:28');

-- Dumping structure for table db_akademik.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_asal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_tabungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.siswa: ~5 rows (approximately)
INSERT INTO `siswa` (`id`, `nik`, `nis`, `nama_siswa`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `provinsi`, `kota`, `alamat`, `nama_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_telp_ayah`, `nama_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_telp_ibu`, `nama_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_telp_wali`, `tahun_masuk`, `sekolah_asal`, `kelas`, `foto`, `kk`, `ijazah`, `akte`, `ktp`, `jumlah_tabungan`, `status`, `created_at`, `updated_at`) VALUES
	(11, '20701', '20701', 'Ramdan Rahmatillah', 'ramdan@gmail.com', 'Perempuan', 'Tanjung Pinang', '1993-11-05', 'Jawa Barat', 'Kota Tasikmalaya', 'Jl. Tajur Indah', 'Rudi', 'Wiraswasta', '2-5 Jt', '085345354354', 'Rini', 'IRT', '2-5 Jt', '085345354354', 'Herman', 'Dokter', '2-5 Jt', '085345354354', '2022', 'SD ABBASH', '6B', '20231105103600_250222104235_gambar_icon_oran.jpg.jpg', '20231105113802_MUHAMMAD_RAFI_HERYADI.pdf.pdf', '20231105103600_ALUR_WEBSITE_MAUBIKINCV.pdf.pdf', '20231105103600_ALUR_WEBSITE_MAUBIKINCV.pdf.pdf', '20231105103600_ALUR_WEBSITE_MAUBIKINCV.pdf.pdf', '300000', NULL, '2023-11-05 03:36:00', '2024-01-19 06:36:25'),
	(14, '20702', '20702', 'Susanti Setiawati', 'susanti@gmail.com', 'Perempuan', 'Jakarta', '1993-12-29', 'Jawa Barat', 'Kota Tasikmalaya', 'Jl. Pamijahan', 'Rudi', 'Wiraswasta', '2-5 Jt', '085345354354', 'Rini', 'IRT', '2-5 Jt', '085345354354', 'Herman', 'Dokter', '>5 Jt', '085345354354', '2022', 'SD ABBASH', '6A', '20231229005826_5.png.png', '20231229005826_12.pdf.pdf', '20231229005826_12.pdf.pdf', '20231229005826_12.pdf.pdf', '20231229005826_12.pdf.pdf', '100000', NULL, '2023-12-28 17:58:26', '2024-01-19 06:39:23'),
	(15, '20703', '20703', 'Hasan Hamdalah', 'hasan@gmail.com', 'Laki-laki', 'Jakarta', '1993-11-11', 'Jawa Barat', 'Kota Tasikmalaya', 'Jl. Rajapolah', 'Rudi', 'Wiraswasta', '2-5 Jt', '085345354354', 'Rini', 'IRT', '2-5 Jt', '085345354354', 'Herman', 'Dokter', '>5 Jt', '085345354354', '2022', 'SD ABBASH', '6A', '20231229010158_6.png.png', '20231229010159_ilovepdf_merged.pdf.pdf', '20231229010159_ilovepdf_merged.pdf.pdf', '20231229010159_ilovepdf_merged.pdf.pdf', '20231229010159_ilovepdf_merged.pdf.pdf', NULL, NULL, '2023-12-28 18:01:59', '2023-12-28 18:01:59'),
	(16, '20704', '20704', 'Sansan Sananta', 'sansan@gmail.com', 'Laki-laki', 'Tasikmalaya', '1992-12-29', 'Jawa Barat', 'Kota Tasikmalaya', 'Jl. Cilacap', 'Rudi', 'Wiraswasta', '>5 Jt', '085345354354', 'Rini', 'IRT', '>5 Jt', '085345354354', 'Herman', 'Dokter', '>5 Jt', '085345354354', '2022', 'SD ABBASH', '6C', '20231229010508_3.png.png', '20231229010508_12.pdf.pdf', '20231229010508_12.pdf.pdf', '20231229010508_12.pdf.pdf', '20231229010508_12.pdf.pdf', NULL, NULL, '2023-12-28 18:05:08', '2024-05-04 08:58:20'),
	(19, '44354677555', '20709', 'Martin Guera', 'martin@gmail.com', 'Laki-laki', 'Tanjung Pinang', '1992-11-11', 'Jawa Barat', 'Tasikmalaya', 'Perumahan CGM Sukarindik Kecamatan Bungursari. Blok C31. RT/RW 02/11. Kota Tasikmalaya\r\nJl. Tajur Indah', 'Gugun', 'Wiraswasta', '2-5 Jt', '085345354354', 'Rini', 'IRT', '2-5 Jt', '085345354354', 'Herman', 'Dokter', '>5 Jt', '085345354354', '2022', 'SD ABBASH', '6B', '20240504155755_6.png.png', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-04 08:57:36', '2024-05-04 08:57:55');

-- Dumping structure for table db_akademik.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_slider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.slider: ~2 rows (approximately)
INSERT INTO `slider` (`id`, `nama_slider`, `keterangan`, `link`, `urutan`, `gambar`, `created_at`, `updated_at`) VALUES
	(2, 'Sekolah Terbaik Untuk Anak Anda', 'Jangan Salah Untuk Menyekolahkan Anak Anda Kami Mengajak Anda Untuk Bergabung Dengan Sekolah Terbaik Untuk Anak Anda', 'https://ltpresent.com', '1', '20240422223505_mengenal-kurikulum-sekolah-alam-banyak-bermain-tapi-bukan-mainmain-hnk.jpg.jpg', '2023-11-02 18:41:33', '2024-04-22 15:35:05'),
	(3, 'Dengan Program Terbaik', 'Memberikan Anda Dengan Program Terbaik', 'https://forms.gle/rdYBfem7QmLGLzFC8', '2', '20240422223516_depoknetizen-blogspot-com.jpg.jpg', '2023-11-03 02:30:48', '2024-04-22 15:35:16');

-- Dumping structure for table db_akademik.spp
CREATE TABLE IF NOT EXISTS `spp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_spp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_jatuh_tempo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.spp: ~12 rows (approximately)
INSERT INTO `spp` (`id`, `tahun_ajaran_id`, `jumlah_spp`, `tanggal_jatuh_tempo`, `bulan`, `tahun`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
	(18, '9', '450000', '29', 'Juli', '2024', NULL, 'Aktif', '2024-04-29 09:18:40', '2024-04-29 18:17:36'),
	(19, '9', '450000', '29', 'Agustus', '2024', NULL, 'Aktif', '2024-04-29 09:18:55', '2024-04-29 18:18:07'),
	(20, '9', '450000', '29', 'September', '2024', NULL, 'Aktif', '2024-04-29 09:19:10', '2024-04-29 18:18:12'),
	(21, '9', '450000', '29', 'Oktober', '2024', NULL, 'Aktif', '2024-04-29 09:19:24', '2024-04-29 18:18:19'),
	(22, '9', '450000', '29', 'November', '2024', NULL, 'Aktif', '2024-04-29 09:19:55', '2024-04-29 18:18:24'),
	(23, '9', '450000', '29', 'Desember', '2024', NULL, 'Aktif', '2024-04-29 09:20:10', '2024-04-29 18:18:30'),
	(24, '26', '450000', '29', 'Januari', '2025', NULL, 'Aktif', '2024-04-29 09:23:10', '2024-04-29 18:24:25'),
	(25, '26', '450000', '29', 'Februari', '2025', NULL, 'Aktif', '2024-04-29 09:23:29', '2024-04-29 18:24:16'),
	(26, '26', '450000', '29', 'Maret', '2025', NULL, 'Aktif', '2024-04-29 09:23:53', '2024-04-29 18:24:09'),
	(27, '9', '450000', '29', 'April', '2025', NULL, 'Aktif', '2024-04-29 09:24:11', '2024-05-01 18:07:18'),
	(30, '9', '450000', '30', 'Mei', '2025', NULL, 'Aktif', '2024-04-29 18:25:09', '2024-05-01 18:07:30'),
	(31, '9', '450000', '30', 'Juni', '2025', NULL, 'Aktif', '2024-04-29 18:25:36', '2024-05-01 18:07:39');

-- Dumping structure for table db_akademik.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.supplier: ~2 rows (approximately)
INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `pic`, `no_telp`, `alamat`, `keterangan`, `created_at`, `updated_at`) VALUES
	(3, '1111', 'Jaya Lestari', 'Rudi', '085320555394', NULL, NULL, '2024-03-03 08:14:39', '2024-03-03 08:14:39'),
	(4, '123142', 'Makaroni 2 Saudara', 's', '089524575452', NULL, NULL, '2024-03-03 09:58:51', '2024-03-03 09:58:51');

-- Dumping structure for table db_akademik.surat_keluar
CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_keluar` date NOT NULL,
  `nomor_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindak_lanjut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.surat_keluar: ~1 rows (approximately)
INSERT INTO `surat_keluar` (`id`, `tanggal_keluar`, `nomor_surat`, `penerima`, `jenis_surat`, `perihal`, `lampiran`, `tindak_lanjut`, `keterangan`, `created_at`, `updated_at`) VALUES
	(3, '2024-04-13', '6465646', 'Alex', 'Undangan', 'Undangan', '20240413001408_Qoutation-033-Point_of_Sale-Perhiasan.docx.docx', '1111', '4fyyryr5y', '2024-04-12 17:14:08', '2024-04-12 17:14:08');

-- Dumping structure for table db_akademik.surat_masuk
CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_masuk` date NOT NULL,
  `nomor_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.surat_masuk: ~2 rows (approximately)
INSERT INTO `surat_masuk` (`id`, `tanggal_masuk`, `nomor_surat`, `pengirim`, `jenis_surat`, `perihal`, `lampiran`, `disposisi`, `keterangan`, `created_at`, `updated_at`) VALUES
	(15, '2024-04-13', '35246455346346456', 'SD Al Islahiyah', 'Undangan', 'Undangan', '20240412234309_script_kisah_nabi.docx.docx', 'Pak. Syamsul', 'Surat Untuk SDIT Abu Bakar', '2024-04-12 16:43:09', '2024-04-12 17:06:14'),
	(16, '2024-04-13', 'bfdg', 'gdfgdfg', 'Umum', 'fdgdfgdf', '20240413000630_Qoutation-003-Financial_Management.docx.docx', 'dfgdfg', 'dfgdgd', '2024-04-12 17:06:30', '2024-04-12 17:06:30');

-- Dumping structure for table db_akademik.tabungan
CREATE TABLE IF NOT EXISTS `tabungan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_tabungan` date NOT NULL,
  `siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tabungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.tabungan: ~0 rows (approximately)

-- Dumping structure for table db_akademik.tahun_ajaran
CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tahun_ajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.tahun_ajaran: ~2 rows (approximately)
INSERT INTO `tahun_ajaran` (`id`, `nama_tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
	(9, '2024/2025 Semester 1', 'Aktif', '2023-11-03 23:26:09', '2024-05-03 18:20:56'),
	(26, '2024/2025 Semester 2', 'Non Aktif', '2024-04-29 06:08:54', '2024-05-03 18:20:52');

-- Dumping structure for table db_akademik.tarik_tabungan
CREATE TABLE IF NOT EXISTS `tarik_tabungan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_tarik` date NOT NULL,
  `siswa_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tarik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.tarik_tabungan: ~1 rows (approximately)
INSERT INTO `tarik_tabungan` (`id`, `tanggal_tarik`, `siswa_id`, `jumlah_tarik`, `keterangan`, `pic`, `created_at`, `updated_at`) VALUES
	(7, '2024-01-19', '14', '200000', 'zzzzz', 'zzzz', '2024-01-19 06:39:23', '2024-01-19 06:39:38');

-- Dumping structure for table db_akademik.tes
CREATE TABLE IF NOT EXISTS `tes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_akademik.tes: ~0 rows (approximately)

-- Dumping structure for table db_akademik.testimoni
CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_testimoni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.testimoni: ~4 rows (approximately)
INSERT INTO `testimoni` (`id`, `nama_testimoni`, `keterangan`, `gambar`, `urutan`, `created_at`, `updated_at`) VALUES
	(16, 'Regan Alamsyah', 'Mantap !!! semua thempletenya keren banget', '20240423013521_image-character-1.png.png', '1', '2023-10-09 06:54:01', '2024-04-22 18:35:21'),
	(17, 'Rendi Gumilar', 'MasyaAlloh mantap, pengerjaan cepat harga terjangkau', '20240423013539_image-character-3.png.png', '2', '2023-10-09 06:54:38', '2024-04-22 18:35:39'),
	(18, 'Muhammad Rafi Heryadi', 'Bagus Banget Sekolahnya. Suskes Kedepannya', '20240423012325_image.png.png', '3', '2024-04-22 18:23:25', '2024-04-23 09:35:25'),
	(19, 'Farid Alawi', 'Luar Biasa Bersyukur bisa sekolah disini. Sukses Kedepannya', '20240423013915_image-character-4.png.png', '4', '2024-04-22 18:39:15', '2024-04-23 09:35:47');

-- Dumping structure for table db_akademik.top_up_member
CREATE TABLE IF NOT EXISTS `top_up_member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_top_up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sebelum_top_up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_top_up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sesudah_top_up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.top_up_member: ~1 rows (approximately)
INSERT INTO `top_up_member` (`id`, `member_id`, `tanggal_top_up`, `jumlah_sebelum_top_up`, `jumlah_top_up`, `jumlah_sesudah_top_up`, `pic`, `created_at`, `updated_at`) VALUES
	(7, '7', '2024-03-24', '0', '100000', '100000', 'Muhammad Rafi Heryadi', '2024-03-23 23:41:04', '2024-03-23 23:41:04');

-- Dumping structure for table db_akademik.unduhan
CREATE TABLE IF NOT EXISTS `unduhan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_unduhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.unduhan: ~1 rows (approximately)
INSERT INTO `unduhan` (`id`, `tanggal_publish`, `nama_unduhan`, `kategori`, `link`, `thumbnail`, `file`, `created_at`, `updated_at`) VALUES
	(3, '2024-04-24', 'Dokumen Sekolah', 'Angka', 'https://drive.google.com/file/d/13lofIH_M8FtOHFbDP2HXVw9UV4HwNhtp/preview', '20240424014914_IMG_2894-scaled.jpg.jpg', '20240424014914_BRIEF_WEB_SISTEM_PT.PSI.pdf.pdf', '2024-04-23 18:49:14', '2024-04-23 18:49:14');

-- Dumping structure for table db_akademik.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Muhammad Rafi Heryadi', 'muhammadrafiheryadi94@gmail.com', NULL, '$2y$10$p96HVtHFrERLNA1s9kQYoeZTW5VfCXTjN5QRL29Wk/dXo1Nb79NLy', 'Superadmin', NULL, '2023-11-10 21:37:12', '2023-11-10 21:37:12'),
	(4, 'Maryam Layla Khoerunnisa', 'alfathunissamaryamlayla@gmail.com', NULL, '$2y$10$7eGwaCmM0XI2Ym.TcHoxqe6k4uTZImExky64YPHNWdmeukmYfoOuu', 'Guru', NULL, '2023-11-10 22:44:46', '2024-01-07 08:11:11');

-- Dumping structure for table db_akademik.visitor
CREATE TABLE IF NOT EXISTS `visitor` (
  `visitor_id` int NOT NULL AUTO_INCREMENT,
  `visit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(255) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_akademik.visitor: ~54 rows (approximately)
INSERT INTO `visitor` (`visitor_id`, `visit_time`, `ip_address`, `session_id`, `cookie_id`, `user_agent`, `device`, `platform`, `browser`, `created_at`, `updated_at`) VALUES
	(5, '2024-04-25 11:34:37', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 11:34:37', '2024-04-28 11:34:37'),
	(6, '2024-04-25 11:37:28', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'WebKit', 'Windows', 'Edge', '2024-04-28 11:37:29', '2024-04-28 11:37:29'),
	(7, '2024-04-26 11:44:41', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 11:44:41', '2024-04-28 11:44:41'),
	(8, '2024-04-27 11:44:43', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 11:44:43', '2024-04-28 11:44:43'),
	(9, '2024-04-28 11:44:46', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'WebKit', 'Windows', 'Edge', '2024-04-28 11:44:46', '2024-04-28 11:44:46'),
	(10, '2024-04-28 11:45:59', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 11:45:59', '2024-04-28 11:45:59'),
	(11, '2024-04-28 11:46:01', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 11:46:01', '2024-04-28 11:46:01'),
	(12, '2024-04-28 12:27:52', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 12:27:52', '2024-04-28 12:27:52'),
	(13, '2024-04-28 12:28:25', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 12:28:25', '2024-04-28 12:28:25'),
	(14, '2024-04-28 12:28:37', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 12:28:37', '2024-04-28 12:28:37'),
	(15, '2024-04-28 12:30:42', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 12:30:42', '2024-04-28 12:30:42'),
	(16, '2024-04-28 18:37:23', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 18:37:23', '2024-04-28 18:37:23'),
	(17, '2024-04-28 18:48:47', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 18:48:47', '2024-04-28 18:48:47'),
	(18, '2024-04-28 21:15:21', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:15:21', '2024-04-28 21:15:21'),
	(19, '2024-04-28 21:22:01', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:22:01', '2024-04-28 21:22:01'),
	(20, '2024-04-28 21:24:32', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:24:32', '2024-04-28 21:24:32'),
	(21, '2024-04-28 21:24:49', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:24:49', '2024-04-28 21:24:49'),
	(22, '2024-04-28 21:25:36', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:25:36', '2024-04-28 21:25:36'),
	(23, '2024-04-28 21:25:52', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:25:52', '2024-04-28 21:25:52'),
	(24, '2024-04-28 21:29:19', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:29:19', '2024-04-28 21:29:19'),
	(25, '2024-04-28 21:29:33', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:29:33', '2024-04-28 21:29:33'),
	(26, '2024-04-28 21:43:06', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:43:06', '2024-04-28 21:43:06'),
	(27, '2024-04-28 21:44:18', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:44:19', '2024-04-28 21:44:19'),
	(28, '2024-04-28 21:45:47', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:45:47', '2024-04-28 21:45:47'),
	(29, '2024-04-28 21:45:59', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-28 21:45:59', '2024-04-28 21:45:59'),
	(30, '2024-04-29 05:20:53', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-29 05:20:53', '2024-04-29 05:20:53'),
	(31, '2024-04-29 16:53:33', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-29 16:53:33', '2024-04-29 16:53:33'),
	(32, '2024-04-29 23:00:18', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-29 23:00:18', '2024-04-29 23:00:18'),
	(33, '2024-04-29 23:54:02', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-29 23:54:02', '2024-04-29 23:54:02'),
	(34, '2024-04-30 08:03:08', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-04-30 08:03:08', '2024-04-30 08:03:08'),
	(35, '2024-05-01 02:06:20', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 02:06:20', '2024-05-01 02:06:20'),
	(36, '2024-05-01 11:06:13', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 11:06:14', '2024-05-01 11:06:14'),
	(37, '2024-05-01 11:06:13', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 11:06:14', '2024-05-01 11:06:14'),
	(38, '2024-05-01 15:28:07', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 15:28:07', '2024-05-01 15:28:07'),
	(39, '2024-05-01 21:23:19', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 21:23:19', '2024-05-01 21:23:19'),
	(40, '2024-05-01 22:20:39', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 22:20:39', '2024-05-01 22:20:39'),
	(41, '2024-05-01 23:24:27', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-01 23:24:27', '2024-05-01 23:24:27'),
	(42, '2024-05-02 06:29:12', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-02 06:29:12', '2024-05-02 06:29:12'),
	(43, '2024-05-02 06:43:27', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-02 06:43:27', '2024-05-02 06:43:27'),
	(44, '2024-05-02 06:48:47', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-02 06:48:47', '2024-05-02 06:48:47'),
	(45, '2024-05-03 02:23:08', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-03 02:23:08', '2024-05-03 02:23:08'),
	(46, '2024-05-03 17:22:37', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-03 17:22:37', '2024-05-03 17:22:37'),
	(47, '2024-05-03 17:24:48', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-03 17:24:48', '2024-05-03 17:24:48'),
	(48, '2024-05-03 17:50:01', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-03 17:50:01', '2024-05-03 17:50:01'),
	(49, '2024-05-03 17:50:59', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-03 17:50:59', '2024-05-03 17:50:59'),
	(50, '2024-05-03 20:47:32', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-03 20:47:32', '2024-05-03 20:47:32'),
	(51, '2024-05-04 08:31:41', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-04 08:31:41', '2024-05-04 08:31:41'),
	(52, '2024-05-04 09:09:41', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-04 09:09:41', '2024-05-04 09:09:41'),
	(53, '2024-05-04 09:12:41', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-04 09:12:41', '2024-05-04 09:12:41'),
	(54, '2024-05-05 05:35:56', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-05 05:35:56', '2024-05-05 05:35:56'),
	(55, '2024-05-05 18:21:25', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-05 18:21:25', '2024-05-05 18:21:25'),
	(56, '2024-05-06 00:06:56', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-06 00:06:56', '2024-05-06 00:06:56'),
	(57, '2024-05-06 00:20:14', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-06 00:20:14', '2024-05-06 00:20:14'),
	(58, '2024-05-06 06:28:16', '127.0.0.1', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'WebKit', 'Windows', 'Chrome', '2024-05-06 06:28:16', '2024-05-06 06:28:16');

-- Dumping structure for table db_akademik.waktu_mengajar
CREATE TABLE IF NOT EXISTS `waktu_mengajar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.waktu_mengajar: ~8 rows (approximately)
INSERT INTO `waktu_mengajar` (`id`, `jam`, `waktu`, `created_at`, `updated_at`) VALUES
	(25, '1', '07:00-08:45', '2024-03-26 18:10:20', '2024-03-26 22:38:26'),
	(28, '2', '08:45-09:45', '2024-03-26 22:24:28', '2024-03-26 22:38:39'),
	(29, '3', '09:45-10:45', '2024-03-26 22:26:39', '2024-03-26 22:38:56'),
	(30, '4', '10:45-11:45', '2024-03-26 22:39:19', '2024-03-26 22:39:19'),
	(31, '5', '11:45-12.30', '2024-03-26 22:39:46', '2024-03-26 22:39:46'),
	(32, '6', '12.30-13.45', '2024-03-26 22:40:17', '2024-03-26 22:40:17'),
	(33, '7', '13.45-14.45', '2024-03-26 22:40:38', '2024-03-26 22:40:38'),
	(37, '8', '14:45-15:45', '2024-04-06 09:14:03', '2024-04-06 09:14:03');

-- Dumping structure for table db_akademik.wali_kelas
CREATE TABLE IF NOT EXISTS `wali_kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kelas_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_akademik.wali_kelas: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;