-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 05:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `job` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `sorter` int(11) DEFAULT NULL,
  `lang_id` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `lang_id` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL,
  `is_opened` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `lang_id` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`lang_id`, `deskripsi`) VALUES
('eng', 'English'),
('ina', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lang_id` varchar(255) NOT NULL,
  `sorter` int(11) DEFAULT NULL,
  `is_hyperlink` bit(1) NOT NULL DEFAULT b'0',
  `id_pagestatic` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `deskripsi`, `link`, `level`, `parent_id`, `lang_id`, `sorter`, `is_hyperlink`, `id_pagestatic`, `date_create`, `date_update`) VALUES
(2, 'Tentang', '#', 1, NULL, 'ina', 1, b'0', NULL, '2017-12-07 14:09:51', NULL),
(3, 'Link Terkait', '#', 1, NULL, 'ina', 2, b'0', NULL, '2017-12-07 14:10:18', NULL),
(4, 'Struktur Organisasi', 'struktur-organisasi', 2, 2, 'ina', 1, b'0', 2, '2017-12-07 14:12:18', NULL),
(6, 'Dasar Hukum', 'dasar-hukum', 2, 2, 'ina', 2, b'0', 3, '2017-12-07 14:13:15', NULL),
(7, 'Informasi dan Dokumentasi', '#', 2, 2, 'ina', 3, b'0', NULL, '2017-12-07 14:14:34', '2018-01-01 17:01:23'),
(8, 'Website POM', 'http://www.pom.go.id', 2, 3, 'ina', 1, b'1', NULL, '2017-12-07 14:17:03', NULL),
(9, 'Web Registrasi', 'http://www.pom.go.id/webreg', 2, 3, 'ina', 2, b'1', NULL, '2017-12-07 14:17:46', NULL),
(11, 'e-Registration', '#', 2, 3, 'ina', 3, b'0', NULL, '2017-12-07 14:18:44', NULL),
(12, 'e-Notifikasi Kosmetik', 'http://notifkos.pom.go.id', 2, 3, 'ina', 4, b'1', NULL, '2017-12-07 14:19:34', NULL),
(13, 'e-bpom', 'http://e-bpom.pom.go.id', 2, 3, 'ina', 5, b'1', NULL, '2017-12-07 14:20:12', NULL),
(14, 'Secara Berkala', 'secara-berkala', 3, 7, 'ina', 1, b'0', 4, '2017-12-07 14:21:34', NULL),
(15, 'Secara Serta Merta', 'secara-serta-merta', 3, 7, 'ina', 2, b'0', 5, '2017-12-07 14:22:24', '2017-12-14 16:00:33'),
(16, 'Setiap Saat', 'setiap-saat', 3, 7, 'ina', 3, b'0', 8, '2017-12-07 14:23:06', NULL),
(17, 'e-Registration Obat', 'http://aero.pom.go.id', 3, 11, 'ina', 1, b'1', NULL, '2017-12-07 14:25:31', '2018-01-01 17:01:32'),
(18, 'e-Registration Obat Tradisional', 'http://asrot.pom.go.id', 3, 11, 'ina', 2, b'1', NULL, '2017-12-07 14:26:38', '2018-01-01 17:01:41'),
(19, 'e-Registration Pangan Olahan', 'http://e-reg.pom.go.id', 3, 11, 'ina', 3, b'1', NULL, '2017-12-07 14:27:40', '2018-01-01 17:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `menu_level`
--

CREATE TABLE `menu_level` (
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_level`
--

INSERT INTO `menu_level` (`level`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_pict` varchar(255) DEFAULT NULL,
  `second_pict` text,
  `content` text NOT NULL,
  `short_desc` text,
  `other_desc` text,
  `is_hot` varchar(1) DEFAULT NULL,
  `lang_id` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsticker`
--

CREATE TABLE `newsticker` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `content` text,
  `lang_id` varchar(255) NOT NULL,
  `sorter` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsticker`
--

INSERT INTO `newsticker` (`id`, `tag`, `content`, `lang_id`, `sorter`, `date_create`, `date_update`) VALUES
(1, 'Siaran Pers/Peringatan Publik', 'SIARAN PERS  AKSI PEDULI KOSMETIKA AMAN  DAN OBAT TRADISIONAL BEBAS BAHAN KIMIA OBAT', 'ina', 1, '2018-01-02 08:26:58', NULL),
(2, 'Berita Aktual', 'PENGUMUMAN PELAMAR YANG DINYATAKAN LULUS DAN DITERIMA SEBAGAI CALON PEGAWAI NEGERI SIPIL BADAN PENGAWAS OBAT DAN MAKANAN TAHUN ANGGARAN 2017', 'ina', 3, '2018-01-02 08:28:08', NULL),
(3, 'Berita Aktual', 'Pemberitahuan Jadwal Wawancara untuk Lokasi Tes Jakarta Badan Pengawas Obat dan Makanan Tahun 2017', 'ina', 2, '2018-01-02 09:15:23', NULL),
(4, NULL, 'Pemberitahuan Jadwal Wawancara untuk Lokasi Tes Jakarta Badan Pengawas Obat dan Makanan Tahun 2017', 'ina', 4, '2018-01-02 09:15:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_static`
--

CREATE TABLE `page_static` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `main_pict` varchar(255) DEFAULT NULL,
  `second_pict` text,
  `content` text NOT NULL,
  `short_desc` text,
  `other_desc` text,
  `is_sharing` bit(1) NOT NULL DEFAULT b'1',
  `lang_id` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_static`
--

INSERT INTO `page_static` (`id`, `title`, `link`, `main_pict`, `second_pict`, `content`, `short_desc`, `other_desc`, `is_sharing`, `lang_id`, `date_create`, `date_update`) VALUES
(1, 'Pendahuluan', 'beranda', NULL, NULL, '&lt;p&gt;Bahwa berdasarkanUndang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik, Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan Undang-Undang Nomor 14 Tahun 2008 tentangKeterbukaan Informasi Publik, dan Pasal 4 huruf a Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Layanan Informasi Publik, Badan Pengawas Obat dan Makanan (Badan POM) sebagai salah satu Badan Publik sebagaimana dimaksud dalam Undang-Undang Nomor 14 Tahun 2008 mempunyai kewajiban untuk memberikan layanan informasi yang dapat diakses oleh publik atau masyarakat khususnya pemangku kepentingan di bidang pengawasan obat dan makanan.&lt;/p&gt;\n\n&lt;p&gt;Layanan informasi publik di Badan POM sudah ada sejak Badan POM dibentuk sebagai Lembaga Pemerintah Nonkementerian pada 2001. Layanan informasi publik di Badan POM juga sudah terdapat di website Badan POM sejak website di-&lt;em&gt;release &lt;/em&gt;pada 2001 , informasi publik yang tersedia di website tersebar pada beberapa subsite. Oleh karenanya, dalam subsite PPID ini hanya dicantumkan dalam bentuk narasi yang di-&lt;em&gt;hyperlink&lt;/em&gt;-an dengan informasi publik yang terdiri atas:&lt;/p&gt;\n\n&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n	&lt;li&gt;Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala;&lt;/li&gt;\n	&lt;li&gt;Informasi yang Wajib Diumumkan Secara Serta Merta; dan&lt;/li&gt;\n	&lt;li&gt;Informasi yang Wajib Tersedia Setiap Saat.&lt;/li&gt;\n&lt;/ol&gt;\n\n&lt;h3&gt;Permohonan Informasi Publik&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/tatacara_permohonan_2017.pdf&quot;&gt;Tata Cara Permohonan Informasi Publik&lt;/a&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;img src=&quot;{{contenturl}}images/UPLOAD.jpg&quot; /&gt;&lt;/p&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/rar/Formulir_Permohonan_Informasi_Publik.pdf&quot;&gt;Formulir Permohonan Informasi Publik&lt;/a&gt; (Print dalam 1 (satu) halaman/ Bolak-balik)&lt;/li&gt;\n	&lt;li&gt;&lt;a name=&quot;BIAYA&quot;&gt;&lt;strong&gt;PENGENAAN BIAYA SALINAN&lt;/strong&gt;&lt;/a&gt;&lt;br /&gt;\n	Pejabat Pengelola Informasi dan Dokumentasi menyediakan informasi publik secara gratis (tidak dipungut biaya), sedangkan untuk penggandaan atau perekaman, pemohon/pengguna informasi publik dapat melakukan penggandaan/fotocopy sendiri disekitar gedung Badan Pengawas Obat dan Makanan atau menyediakan CD/DVD kosong atau flashdisk untuk perekaman data dan informasinya.&lt;/li&gt;\n	&lt;li&gt;&lt;a href=&quot;http://jdih.pom.go.id/showpdf.php?u=%2Fa9dy7GvJANU8c5GLmCvoGvyqgbPtLLs2V1VZNtGF8M%3D&quot;&gt;PERKA BPOM HK.03.1.23.08.11.07456 Tahun 2011 Tentang Tata Cara Pelayanan Informasi Publik di Linkgkungan BPOM&lt;/a&gt;&lt;/li&gt;\n	&lt;li&gt;Formulir Keberatan Download &lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/(23c)formulirkeberatan.pdf&quot;&gt;Disini&lt;/a&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;a name=&quot;AI&quot;&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;RINGKASAN LAPORAN AKSES INFORMASI PUBLIK Tahun 2017&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;Data Januari - September 2017&lt;/p&gt;\n	&lt;img src=&quot;{{contenturl}}images/statistik2017-2.jpg&quot; style=&quot;height:auto; width:800px&quot; /&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;a name=&quot;AI&quot;&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;RINGKASAN LAPORAN AKSES INFORMASI PUBLIK Tahun 2016&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;Data Januari - Desember 2016&lt;/p&gt;\n	&lt;img src=&quot;{{contenturl}}images/statistik2016.jpg&quot; style=&quot;height:auto; width:800px&quot; /&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;a name=&quot;AI&quot;&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;RINGKASAN LAPORAN AKSES INFORMASI PUBLIK Tahun 2015&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;Data Januari - Desember 2015&lt;/p&gt;\n	&lt;img src=&quot;{{contenturl}}images/statistik.jpg&quot; style=&quot;height:auto; width:800px&quot; /&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;a name=&quot;LWLU&quot;&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;LAMA WAKTU LAYANAN ULPK BPOM TAHUN 2017&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;Data Januari - September 2017&lt;/p&gt;\n	&lt;img src=&quot;{{contenturl}}images/LWLU2017-2.jpg&quot; style=&quot;height:auto; width:800px&quot; /&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;a name=&quot;LWLU&quot;&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;LAMA WAKTU LAYANAN ULPK BPOM TAHUN 2016&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;Data Januari - Desember 2016&lt;/p&gt;\n	&lt;img src=&quot;{{contenturl}}images/LWLU2016.jpg&quot; style=&quot;height:auto; width:800px&quot; /&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;p&gt;&lt;a name=&quot;LWLU&quot;&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;h3&gt;LAMA WAKTU LAYANAN ULPK BPOM TAHUN 2015&lt;/h3&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;Data Januari - Desember 2015&lt;/p&gt;\n	&lt;img src=&quot;{{contenturl}}images/LWLU.jpg&quot; style=&quot;height:auto; width:800px&quot; /&gt;&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;h3&gt;Sistematika&lt;/h3&gt;\n\n&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n	&lt;li&gt;Pendahuluan&lt;/li&gt;\n	&lt;li&gt;Struktur Organisasi&lt;/li&gt;\n	&lt;li&gt;Dasar Hukum&lt;/li&gt;\n	&lt;li&gt;Jenis-Jenis Informasi dan Dokumentasi&lt;/li&gt;\n&lt;/ol&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n', NULL, NULL, b'1', 'ina', '2017-12-07 21:56:31', '2018-01-01 18:23:46'),
(2, 'Struktur Organisasi', 'struktur-organisasi', NULL, NULL, '&lt;p&gt;Untuk&amp;nbsp;mengelola informasi dan dokumentasi telah dibentuk Pejabat Pengelola Informasi dan Dokumentasi berdasarkan Peraturan Kepala Badan POM Nomor HK.03.1.23.08.11.07456 Tahun 2011 tentang Tata Cara Pelayanan Informasi Publik di Lingkungan Badan Pengawas Obat dan Makanan dan Keputusan Kepala Badan POM Nomor HK.04.1.23.08.11.07457 Tahun 2011 tent ang Pejabat Pengelola Informasi dan Dokumentasi di Lingkungan Badan Pengawas Obat dan Makanan dengan struktur organisasi sebagai berikut:&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&lt;img src=&quot;{{contenturl}}images/strukor.jpg&quot; /&gt;&lt;/p&gt;\n', NULL, NULL, b'1', 'ina', '2017-12-07 22:25:26', '2018-01-04 17:14:11'),
(3, 'Dasar Hukum', 'dasar-hukum', NULL, NULL, '&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n	&lt;li&gt;&lt;a href=&quot;http://jdih.pom.go.id/produk/UNDANG-UNDANG/UU_14_Tahun_2008%5B1%5D.pdf&quot;&gt;Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik&lt;/a&gt;&lt;/li&gt;\n	&lt;li&gt;&lt;a href=&quot;http://jdih.pom.go.id/produk/UNDANG-UNDANG/UU_25_Tahun_2009%5B1%5D.pdf&quot;&gt;Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik&lt;/a&gt;&lt;/li&gt;\n	&lt;li&gt;&lt;a href=&quot;http://jdih.pom.go.id/produk/PERATURAN%20PEMERINTAH/PP_61_Tahun_2010%5B1%5D.pdf&quot;&gt;Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik&lt;/a&gt;&lt;/li&gt;\n	&lt;li&gt;&lt;a href=&quot;d_perKI.pdf&quot;&gt;Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Layanan Informasi Publik&lt;/a&gt;&lt;/li&gt;\n	&lt;li&gt;&lt;a href=&quot;http://jdih.pom.go.id/produk/PERATURAN%20KEPALA%20BPOM/Per%20Ka%20BPOM_Tata%20Cara%20Pelayanan%20Informasi%20Publik%20plus%20lampiran.pdf&quot;&gt;Peraturan Kepala Badan POM Nomor HK.03.1.23.08.11.07456 Tahun 2011tentang Tata Cara Pelayanan Informasi Publik di Lingkungan Badan Pengawas Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n	&lt;li&gt;&lt;a href=&quot;SK-2016.pdf&quot;&gt;Keputusan Kepala Badan POM Nomor HK.04.1.23.04.16.1875 Tahun 2016 tentang Organisasi Pengelola Informasi dan Dokumentasi di Lingkungan Badan Pengawas Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n&lt;/ol&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n', NULL, NULL, b'1', 'ina', '2017-12-07 22:31:31', '2018-01-01 17:57:05'),
(4, 'Informasi yang Wajib Disediakan dan Diumumkan secara Berkala', 'secara-berkala', NULL, NULL, '&lt;p&gt;&lt;strong&gt;PANDUAN DOWNLOAD&lt;/strong&gt;&lt;br /&gt;\n1. Jika Anda menggunakan browser &lt;strong&gt;Internet Explorer&lt;/strong&gt; atau &lt;strong&gt;Google Chrome&lt;/strong&gt;, &lt;strong&gt;klik &lt;/strong&gt; pada menu/link sesuai dengan nama dokumen yang Anda inginkan.&lt;br /&gt;\n2. Jika Anda menggunakan browser &lt;strong&gt;Mozilla Fire Fox&lt;/strong&gt;, &lt;strong&gt;klik kanan&lt;/strong&gt; pada menu/link kemudian pilih &amp;quot;Save Link As&amp;quot; lalu tekan &amp;quot;Save&amp;quot;.&lt;br /&gt;\n3. Detail Data disajikan dalam format RAR dan PDF. Jika belum memiliki Adobe Acrobat Reader, dapat &lt;a href=&quot;http://www.adobe.com/products/acrobat/readstep.html&quot;&gt;klik disini&lt;/a&gt; untuk mendownload.&lt;/p&gt;\n\n&lt;ol&gt;\n	&lt;li&gt;&lt;strong&gt;1. Informasi mengenai Badan POM&lt;/strong&gt;\n\n	&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new&quot; target=&quot;_blank&quot;&gt;Profil Organisasi&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/visimisi&quot;&gt;Visi dan Misi Organisasi&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/tugas&quot;&gt;Tugas&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/fungsi&quot;&gt;Fungsi&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/wenang&quot;&gt;Kewenangan&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/budayaorganisasi&quot;&gt;Budaya Organisasi&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;Konsep Sistem Pengawasan Obat dan Makanan (&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/prinsipdasar&quot;&gt;Prinsip Dasar&lt;/a&gt; dan &lt;a href=&quot;http://www.pom.go.id/new/index.php/view/kerangkakonsep&quot;&gt;Kerangka Konsep&lt;/a&gt;)&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/view/kebijakan&quot;&gt;Kebijakan Strategis&lt;/a&gt;&lt;/li&gt;\n		&lt;br /&gt;\n		&lt;li&gt;Pejabat Eselon 1\n		&lt;ol&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/view/direct/head&quot;&gt;Kepala Badan POM&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/view/direct/secretary&quot;&gt;Sekretaris Utama Badan POM&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/view/direct/deputy1&quot;&gt;Deputi Bidang Pengawasan Produk Terapetik dan Narkotika, Psikotropika &amp;amp; Zat Adiktif &lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/view/direct/deputy2&quot;&gt;Deputi Bidang Pengawasan Obat Tradisional, Kosmetik dan Produk Komplemen&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/view/direct/deputy3&quot;&gt;Deputi Bidang Pengawasan Keamanan Pangan dan Bahan Berbahaya&lt;/a&gt;&lt;/li&gt;\n		&lt;/ol&gt;\n		&lt;/li&gt;\n		&lt;br /&gt;\n		&lt;li&gt;&lt;a href=&quot;unitbalai.php&quot;&gt;Kantor Unit Pusat dan Balai&lt;/a&gt;&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n	&lt;br /&gt;\n	&lt;li&gt;&lt;strong&gt;2. Informasi mengenai Kegiatan dan Kinerja Badan POM&lt;/strong&gt;\n	&lt;ol&gt;\n		&lt;li&gt;&lt;strong&gt;2.1 SAKIP 2015-2019&lt;/strong&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a name=&quot;RS&quot;&gt;&lt;strong&gt;2.1.1 Rencana Strategi&lt;/strong&gt;&lt;/a&gt;\n		&lt;ol&gt;\n			&lt;li&gt;&lt;strong&gt;2.1.1.1 &lt;/strong&gt;&lt;a href=&quot;http://jdih.pom.go.id/produk/PERATURAN%20KEPALA%20BPOM/PerKaBPOM%20Nomor%202%20Tahun%202015%20tentang%20Renstra%20Badan%20POM%20Tahun%202015-2019.pdf&quot;&gt;Badan POM&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;strong&gt;2.1.1.2 Unit Pusat&lt;/strong&gt;\n			&lt;ol&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/sestama.pdf&quot;&gt;Sekretariat Utama&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/dep1.pdf&quot;&gt;Deputi Bidang Pengawasan Produk Terapetik dan Napza&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/dep3.pd&quot;&gt;Deputi Bidang Pengawasan Keamanan Pangan dan Bahan Berbahaya&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/inspektorat.pdf&quot;&gt;Inspektorat&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/hukmas.pdf&quot;&gt;Biro Hukmas&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/roren.pdf&quot;&gt;Biro Perencanaan dan Keuangan&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/napza.pdf&quot;&gt;Direktorat Pengawasan Napza&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/pbb.pdf&quot;&gt;Direktorat Pengawasan Produk dan Bahan Berbahaya&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/pkp.pdf&quot;&gt;Direktorat Penilaian Keamanan Pangan&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/spkp.pdf&quot;&gt;Direktorat Surveilan dan Peyuluhan Keamanan Pangan&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/spp.pdf&quot;&gt;Direktorat Standardisasi Produk Pangan&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/std_ptpkrt.pdf&quot;&gt;Direktorat Standardisasi PT dan PKRT&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/piom.pdf&quot;&gt;Pusat Informasi Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rpusat/prom.pdf&quot;&gt;Pusat Riset Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;strong&gt;2.1.1.3 Balai&lt;/strong&gt;\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/aceh.pdf&quot;&gt;Balai Besar POM di Banda Aceh&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/medan.pdf&quot;&gt;Balai Besar POM di Medan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/padang.pdf&quot;&gt;Balai Besar POM di Padang&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/palembang.pdf&quot;&gt;Balai Besar POM di Palembang&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/bandung.pdf&quot;&gt;Balai Besar POM di Bandung&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/yogya.pdf&quot;&gt;Balai Besar POM di Yogyakarta&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/surabaya.pdf&quot;&gt;Balai Besar POM di Surabaya&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/denpasar.pdf&quot;&gt;Balai Besar POM di Denpasar&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/mataram.pdf&quot;&gt;Balai Besar POM di Mataram&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/manado.pdf&quot;&gt;Balai Besar POM di Manado&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/makassar.pdf&quot;&gt;Balai Besar POM di Makassar&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/pontianak.pdf&quot;&gt;Balai Besar POM di Pontianak&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n				&lt;li&gt;&lt;strong&gt;2.1.1.3 Balai&lt;/strong&gt;\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/batam.pdf&quot;&gt;Balai POM di Batam&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/jambi.pdf&quot;&gt;Balai POM di Jambi&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/bengkulu.pdf&quot;&gt;Balai POM di Bengkulu&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/pinang.pdf&quot;&gt;Balai POM di Pangkal Pinang&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/kupang.pdf&quot;&gt;Balai POM di Kupang&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/palangkaraya.pdf&quot;&gt;Balai POM di Palangka Raya&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/palu.pdf&quot;&gt;Balai POM di Palu&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/kendari.pdf&quot;&gt;Balai POM di Kendari&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/manokwari.pdf&quot;&gt;Balai POM di Manokwari&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rbalai/sofifi.pdf&quot;&gt;Balai POM di Sofifi&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;PK&quot;&gt;&lt;strong&gt;2.1.2 Perjanjian Kinerja&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol&gt;\n				&lt;li&gt;&lt;strong&gt;2.1.2.1 Unit Pusat&lt;/strong&gt;\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-Badan-POM-2017.pdf&quot;&gt;BADAN POM&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_sestama.pdf&quot;&gt;Sekretariat Utama&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_dep1.pdf&quot;&gt;Deputi Bidang Pengawasan Produk Terapetik dan Napza&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_dep2.pdf&quot;&gt;Deputi Bidang Pengawasan OT, Kos dan PK&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_dep3.pdf&quot;&gt;Deputi Bidang Pengawasan Keamanan Pangan dan Bahan Berbahaya&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Biro-Hukmas.pdf&quot;&gt;Biro Hukmas&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Biro-Perencanaan-dan-Keuangan.pdf&quot;&gt;Biro Perencanaan dan Keuangan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Biro-KSLN.pdf&quot;&gt;Biro Kerjasama Luar Negeri&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Biro-Umum.pdf&quot;&gt;Biro Umum&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_inspektorat.pdf&quot;&gt;Inspektorat&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-Wasprod.pdf&quot;&gt;Direktorat Pengawasan Produksi PT dan PKRT&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Ditwas-NAPZA.pdf&quot;&gt;Direktorat Pengawasan Napza&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Ditlai-Obat.pdf&quot;&gt;Direktorat Penilaian Obat dan PB&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-Std-PT-PKRT.pdf&quot;&gt;Direktorat Standardisasi Produk PT dan PKRT&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-OAI.pdf&quot;&gt;Direktorat OAI&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-Insert-OTKosPK.pdf&quot;&gt;Direktorat Insert OT, Kos dan PK&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-Std-OTKosPK.pdf&quot;&gt;Direktorat Standardisasi OT, Kos dan PK&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Ditai-OTSMKos.pdf&quot;&gt;Direktorat Penilaian OT, Kos dan SM&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-Insert-Pangan.pdf&quot;&gt;Direktorat Insert Pangan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_PKP.pdf&quot;&gt;Direktorat Penilaian Keamanan Pangan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Dit-SPKP.pdf&quot;&gt;Direktorat Surveilan dan Penyuluhan Keamanan Pangan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_stdpangan.pdf&quot;&gt;Direktorat Standardisasi Produk Pangan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_wasprod.pdf&quot;&gt;Direktorat Pengawasan Produk dan Bahan Berbahaya&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-PIOM.pdf&quot;&gt;Pusat Informasi Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-PPOMN.pdf&quot;&gt;Pusat Pengujian Obat dan Makanan Nasional&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/2016pk_PROM.pdf&quot;&gt;Pusat Riset Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PK/PK-2017-Pusdik.pdf&quot;&gt;Pusat Penyidikan&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n				&lt;li&gt;&lt;strong&gt;2.1.2.2 Balai&lt;/strong&gt;\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/aceh.pdf&quot;&gt;Balai Besar POM di Banda Aceh &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/medan.pdf&quot;&gt;Balai Besar POM di Medan &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/pekanbaru.pdf&quot;&gt;Balai Besar POM di Pekanbaru &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/padang.pdf&quot;&gt;Balai Besar POM di Padang &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/palembang.pdf&quot;&gt;Balai Besar POM di Palembang &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/lampung.pdf&quot;&gt;Balai Besar POM di Bandar Lampung &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/jakarta.pdf&quot;&gt;Balai Besar POM di Jakarta &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/bandung.pdf&quot;&gt;Balai Besar POM di Bandung &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/semarang.pdf&quot;&gt;Balai Besar POM di Semarang &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/yogyakarta.pdf&quot;&gt;Balai Besar POM di Yogyakarta &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/surabaya.pdf&quot;&gt;Balai Besar POM di Surabaya &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/denpasar.pdf&quot;&gt;Balai Besar POM di Denpasar &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/mataram.pdf&quot;&gt;Balai Besar POM di Mataram &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/pontianak.pdf&quot;&gt;Balai Besar POM di Pontianak &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/samarinda.pdf&quot;&gt;Balai Besar POM di Samarinda &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/banjarmasin.pdf&quot;&gt;Balai Besar POM di Banjarmasin &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/manado.pdf&quot;&gt;Balai Besar POM di Manado &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/makassar.pdf&quot;&gt;Balai Besar POM di Makassar &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/jayapura.pdf&quot;&gt;Balai Besar POM di Jayapura &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/batam.pdf&quot;&gt;Balai POM di Batam &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/jambi.pdf&quot;&gt;Balai POM di Jambi &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/bengkulu.pdf&quot;&gt;Balai POM di Bengkulu &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/pangkalpinang.pdf&quot;&gt;Balai POM di Pangkal Pinang &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/serang.pdf&quot;&gt;Balai POM di Serang &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/kupang.pdf&quot;&gt;Balai POM di Kupang &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/palangkaraya.pdf&quot;&gt;Balai POM di Palangka Raya &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/gorontalo.pdf&quot;&gt;Balai POM di Gorontalo &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/palu.pdf&quot;&gt;Balai POM di Palu &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/kendari.pdf&quot;&gt;Balai POM di Kendari &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/ambon.pdf&quot;&gt;Balai POM di Ambon &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/manokwari.pdf&quot;&gt;Balai POM di Manokwari &lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/PKB/sofifi.pdf&quot;&gt;Balai POM di Sofifi &lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;LAKIP&quot;&gt;&lt;strong&gt;2.1.3 LAKIP/Laporan Kinerja&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol&gt;\n				&lt;li&gt;Laporan Kinerja\n				&lt;ol&gt;\n					&lt;li&gt;Tahun 2016 :&amp;nbsp;&amp;nbsp;&lt;a href=&quot;http://www.pom.go.id/files/2016/lap_kinerja_2016.pdf&quot;&gt;Pusat&lt;/a&gt;&amp;nbsp;&amp;nbsp;&lt;a href=&quot;http://www.pom.go.id/files/2016/lapkin-balai-2016.rar&quot;&gt;Balai&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/files/2016/lap_kinerja_2015.pdf&quot;&gt;Tahun 2015&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/R2TN2014.pdf&quot;&gt;Tahun 2014&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n				&lt;li&gt;LAKIP\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/files/2014/lakip_2013.rar&quot;&gt;LAKIP 2013&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/LAKIP_2012.rar&quot;&gt;LAKIP 2012&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/LAKIP_2011.pdf&quot;&gt;LAKIP 2011&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;strong&gt;2.2 Laporan Tahunan&lt;/strong&gt;\n			&lt;ol&gt;\n				&lt;li&gt;LAPTAH\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/laptah2016.pdf&quot;&gt;LAPTAH 2016&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/laptah2015.pdf&quot;&gt;LAPTAH 2015&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/rar/2016/laptah2014.pdf&quot;&gt;LAPTAH 2014&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/laptah2013.rar&quot;&gt;LAPTAH 2013&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/Laptah_2012.rar&quot;&gt;LAPTAH 2012&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/LAPTAH_2011.pdf&quot;&gt;LAPTAH 2011&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;li&gt;Laporan Keuangan\n			&lt;ol&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/kelengkapan/keuangan2016.pdf&quot;&gt;Laporan Keuangan 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/kelengkapan/1.13.c.2.LK.pdf&quot;&gt;Laporan Keuangan 2015&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/keu_2014.pdf&quot;&gt;Laporan Keuangan 2014&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/files/2014/BADANPOM_AUDITED_2013.pdf&quot;&gt;Laporan Keuangan 2013&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;rar/LK_Audited_2012.rar&quot;&gt;Laporan Keuangan 2012&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;rar/Laporan_Keuangan2011.pdf&quot;&gt;Laporan Keuangan 2011&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;li&gt;Neraca\n			&lt;ol&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/index.php/home/wtp&quot;&gt;Catatan atas Laporan Keuangan&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;strong&gt;2.3 Laporan Semesteran&lt;/strong&gt;\n			&lt;ol&gt;\n				&lt;li&gt;Laporan BMN\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/lap_bmn_2016.pdf&quot;&gt;Laporan Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;rar/lap_bmn_2014.pdf&quot;&gt;Laporan Tahun 2014 Semester 1&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;strong&gt;2.4 Laporan Triwulan&lt;/strong&gt;&lt;/li&gt;\n			&lt;li&gt;Report to the Nation\n			&lt;ol&gt;\n				&lt;li&gt;\n				&lt;ol&gt;\n					&lt;li&gt;\n					&lt;ol&gt;\n						&lt;li&gt;\n						&lt;ol&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rtn2017tw1.pdf&quot;&gt;Tahun 2017 Triwulan I&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rtn2017tw2.pdf&quot;&gt;Tahun 2017 Triwulan II&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rtn2017tw3.pdf&quot;&gt;Tahun 2017 Triwulan III&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rtn2015tw1.pdf&quot;&gt;Tahun 2015 Triwulan I&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/R2TN2014SEME.pdf&quot;&gt;Tahun 2014&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/files/rt2n2014_tw1.rar&quot;&gt;Tahun 2014 Triwulan I&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rtn2014tw2.pdf&quot;&gt;Tahun 2014 Triwulan II&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/rtn2014tw3.pdf&quot;&gt;Tahun 2014 Triwulan III&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/files/rt2n2013_tw4.rar&quot;&gt;Tahun 2013 Triwulan IV&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;rar/r2tn_2013_tw3.rar&quot;&gt;Tahun 2013 Triwulan III&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;rar/R2TN-TW2-2013.pdf&quot;&gt;Tahun 2013 Triwulan II&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;rar/Report_smt2.pdf&quot;&gt;Tahun 2012 Semester I&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;rar/Report_triwulanKwtrl2.pdf&quot;&gt;Tahun 2012 Triwulan I&lt;/a&gt;&lt;/li&gt;\n							&lt;li&gt;&lt;a href=&quot;rar/R2TN.pdf&quot;&gt;Tahun 2012&lt;/a&gt;&lt;/li&gt;\n						&lt;/ol&gt;\n						&lt;/li&gt;\n					&lt;/ol&gt;\n					&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;lapPPID&quot;&gt;&lt;strong&gt;2.5 Laporan PPID&lt;/strong&gt; &lt;/a&gt;&lt;a name=&quot;lapPPID&quot;&gt; &lt;/a&gt;\n			&lt;ol&gt;\n				&lt;li&gt;&lt;a name=&quot;lapPPID&quot;&gt;&lt;/a&gt;&lt;a href=&quot;2016/kelengkapan/PPID2016.pdf&quot;&gt;Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/kelengkapan/1.25Laporan PPID2015b.pdf&quot;&gt;Tahun 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;rkakl&quot;&gt;&lt;strong&gt;2.6 RKAKL TA 2017&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol&gt;\n				&lt;li&gt;&lt;strong&gt;2.6.2 Unit Pusat&lt;/strong&gt;\n				&lt;ol&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/sestama2017.pdf&quot;&gt;Sekretaris Utama&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/deputi12017.pdf&quot;&gt;Deputi I&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/deputi22017.pdf&quot;&gt;Deputi II&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/deputi32017.pdf&quot;&gt;Deputi III&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/inspektorat2017.pdf&quot;&gt;Inspektorat&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/piom2017.pdf&quot;&gt;Pusat Informasi Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/prom2017.pdf&quot;&gt;Pusat Riset Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/ppom2017.pdf&quot;&gt;Pusat Penyidikan Obat dan Makanan&lt;/a&gt;&lt;/li&gt;\n					&lt;li&gt;&lt;a href=&quot;2016/RKAKL/ppomn2017.pdf&quot;&gt;Pusat Pengujian Obat dan Makanan Nasional&lt;/a&gt;&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n				&lt;li&gt;&lt;strong&gt;2.6.2 Balai&lt;/strong&gt;\n				&lt;ol&gt;\n					&lt;li&gt;&lt;strong&gt;2.6.2.1 Balai Besar POM&lt;/strong&gt;\n					&lt;ol&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-bandaaceh2017.pdf&quot;&gt;Balai Besar POM di Banda Aceh &lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-medan2017.pdf&quot;&gt;Balai Besar POM di Medan&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-pekanbaru2017.pdf&quot;&gt;Balai Besar POM di Pekanbaru &lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-padang2017.pdf&quot;&gt;Balai Besar POM di Padang&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-palembang2017.pdf&quot;&gt;Balai Besar POM di Palembang&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-bandarlampung2017.pdf&quot;&gt;Balai Besar POM di Bandar Lampung &lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-jakarta2017.pdf&quot;&gt;Balai Besar POM di Jakarta&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-bandung2017.pdf&quot;&gt;Balai Besar POM di Bandung&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-semarang2017.pdf&quot;&gt;Balai Besar POM di Semarang&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-yogyakarta2017.pdf&quot;&gt;Balai Besar POM di Yogyakarta&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-surabaya2017.pdf&quot;&gt;Balai Besar POM di Surabaya&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-denpasar2017.pdf&quot;&gt;Balai Besar POM di Denpasar&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-mataram2017.pdf&quot;&gt;Balai Besar POM di Mataram&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-pontianak2017.pdf&quot;&gt;Balai Besar POM di Pontianak&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-samarinda2017.pdf&quot;&gt;Balai Besar POM di Samarinda&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-banjarmasin2017.pdf&quot;&gt;Balai Besar POM di Banjarmasin&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-manado2017.pdf&quot;&gt;Balai Besar POM di Manado&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-makassar2017.pdf&quot;&gt;Balai Besar POM di Makassar&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bbpom-jayapura2017.pdf&quot;&gt;Balai Besar POM di Jayapura&lt;/a&gt;&lt;/li&gt;\n					&lt;/ol&gt;\n					&lt;/li&gt;\n					&lt;li&gt;&lt;strong&gt;2.6.2.2 Balai POM&lt;/strong&gt;\n					&lt;ol&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-batam2017.pdf&quot;&gt;Balai POM di Batam&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-jambi2017.pdf&quot;&gt;Balai POM di Jambi&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-bengkulu2017.pdf&quot;&gt;Balai POM di Bengkulu&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-pangkalpinang2017.pdf&quot;&gt;Balai POM di Pangkal Pinang &lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-serang2017.pdf&quot;&gt;Balai POM di Serang&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-kupang2017.pdf&quot;&gt;Balai POM di Kupang&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-palangkaraya2017.pdf&quot;&gt;Balai POM di Palangka Raya &lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-gorontalo2017.pdf&quot;&gt;Balai POM di Gorontalo&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-palu2017.pdf&quot;&gt;Balai POM di Palu&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-kendari2017.pdf&quot;&gt;Balai POM di Kendari&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-ambon2017.pdf&quot;&gt;Balai POM di Ambon&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-manokwari2017.pdf&quot;&gt;Balai POM di Manokwari&lt;/a&gt;&lt;/li&gt;\n						&lt;li&gt;&lt;a href=&quot;2016/RKAKL/bpom-sofifi2017.pdf&quot;&gt;Balai POM di Sofifi&lt;/a&gt;&lt;/li&gt;\n					&lt;/ol&gt;\n					&lt;/li&gt;\n				&lt;/ol&gt;\n				&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;rkakl&quot;&gt;&lt;strong&gt;2.7 RENCANA KERJA BADAN POM TAHUN 2017&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/renja2017.pdf&quot;&gt;RENCANA KERJA BADAN POM TAHUN 2017&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;agenda&quot;&gt;&lt;strong&gt;2.8 Agenda Kegiatan&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/roren2017.pdf&quot;&gt;Perencanaan dan Penganggaran TA 2017&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;2016/roren.pdf&quot;&gt;Perencanaan dan Penganggaran TA 2016&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;strong&gt;2.9 Informasi lain yang diatur dalam peraturan perundang-undangan &lt;/strong&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/webreg/index.php/home/produk/01&quot;&gt;Nomor Izin Edar Obat &lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/webreg/index.php/home/produk/10&quot;&gt;Nomor Izin Edar Obat Tradisional&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/webreg/index.php/home/produk/12&quot;&gt;Nomor Izin Edar Kosmetika&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/webreg/index.php/home/produk/13&quot;&gt;Nomor Izin Edar Pangan Olahan (Makanan dan Minuman)&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/webreg/index.php/home/produk/11&quot;&gt;Nomor Izin Edar Suplemen Makanan&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;strong&gt;2.10 Data AHP Narkotika, Psikotropika dan Prekursor &lt;/strong&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;rar/ahp.pdf&quot;&gt;Data Analisa HAsil Pengawasan (AHP) Narkotika, Psikotropika dan Prekursor Periode Januari-Desember 2015&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;rar/ski_ske.pdf&quot;&gt;Data SKI/SKE&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;strong&gt;3.0 Data Sertifikat CPOB&lt;/strong&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2015/CPOB-des2015.pdf&quot;&gt;Data Sertifikat CPOB terkini (Update : Desember 2015)&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;JU&quot;&gt;&lt;strong&gt;3.1 Petunjuk Pelaksanaan Anggaran&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/juklak_anggaran2017.pdf&quot;&gt;Petunjuk Pelaksanaan Anggaran Tahun 2017&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/juklak_anggaran2016.pdf&quot;&gt;Petunjuk Pelaksanaan Anggaran Tahun 2016&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;riset&quot;&gt;&lt;strong&gt;3.2 Hasil Riset Pusat Riset Obat dan Makanan&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2016.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/riset2016.pdf&quot;&gt;Abstrak Hasil Penelitian Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2015.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2015&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2014.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2014&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2013.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2013&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2012.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2012&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/ringkasan_riset2012.pdf&quot;&gt;Ringkasan Hasil Penelitian Tahun 2012&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2011.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2011&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/ringkasan_riset2011.pdf&quot;&gt;Ringkasan Hasil Penelitian Tahun 2011&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/hasil_riset2010.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2010&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/ringkasan_riset2010.pdf&quot;&gt;Ringkasan Hasil Penelitian Tahun 2010&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/riset2010-2014.pdf&quot;&gt;Daftar Hasil Penelitian Tahun 2010 - 2014&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/KUMPULAN_MATERI_FORDIS2_rev.pdf&quot;&gt;Kumpulan Hasil Penelitian&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;rkap&quot;&gt;&lt;strong&gt;3.3 Rekapitulasi Anggaran per Program&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/1.13.c.1.Program.pdf&quot;&gt;Tahun 2016&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;&quot;&gt;&lt;strong&gt;3.4 Induk Badan POM&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/2017.pdf&quot;&gt;Tahun 2017&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/1.13.c.1.DIPA.pdf&quot;&gt;Tahun 2016&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;realisasi&quot;&gt;&lt;strong&gt;3.5 Laporan Realisasi Anggaran Kementerian Lembaga&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/realisasi2016.pdf&quot;&gt;31 Desember Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/2.4.a.1.LaporanRealisasi.pdf&quot;&gt;31 Desember Tahun 2015 dan 2014&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;neraca&quot;&gt;&lt;strong&gt;3.6 Neraca Tingkat Kementerian Lembaga&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/neraca2016.pdf&quot;&gt;31 Desember Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/2.4.a.2.Neraca.pdf&quot;&gt;31 Desember Tahun 2015 dan 2014&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;neraca&quot;&gt;&lt;strong&gt;3.7 Catatan Atas Laporan Keuangan (CALK)&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/CALK2016.pdf&quot;&gt;Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/2.4.a.3.CALK.pdf&quot;&gt;Tahun 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;li&gt;&lt;a name=&quot;neraca&quot;&gt;&lt;strong&gt;3.8 Laporan Operasi Tingkat Kementrian Lembaga&lt;/strong&gt;&lt;/a&gt;\n			&lt;ol style=&quot;list-style-type:lower-alpha&quot;&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/operasional2016.pdf&quot;&gt;31 Desember Tahun 2016&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/kelengkapan/2.4.a.3.LaporanOpe.pdf&quot;&gt;31 Desember Tahun 2015 dan 2014&lt;/a&gt;&lt;/li&gt;\n			&lt;/ol&gt;\n			&lt;/li&gt;\n			&lt;br /&gt;\n			&lt;br /&gt;\n			&lt;br /&gt;\n			&lt;br /&gt;\n			&lt;br /&gt;\n			&amp;nbsp;\n			&lt;li&gt;&amp;nbsp;&lt;/li&gt;\n			&lt;li&gt;&amp;nbsp;&lt;/li&gt;\n			&lt;li&gt;&amp;nbsp;&lt;/li&gt;\n		&lt;/ol&gt;\n		&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n&lt;/ol&gt;\n', NULL, NULL, b'1', 'ina', '2017-12-08 03:49:04', '2017-12-14 16:25:28'),
(5, 'Informasi yang Wajib Diumumkan secara Serta Merta', 'secara-serta-merta', NULL, NULL, '&lt;p&gt;&lt;strong&gt;PANDUAN DOWNLOAD&lt;/strong&gt;&lt;br /&gt;\n1. Jika Anda menggunakan browser &lt;strong&gt;Internet Explorer&lt;/strong&gt; atau &lt;strong&gt;Google Chrome&lt;/strong&gt;, &lt;strong&gt;klik &lt;/strong&gt; pada menu/link sesuai dengan nama dokumen yang Anda inginkan.&lt;br /&gt;\n2. Jika Anda menggunakan browser &lt;strong&gt;Mozilla Fire Fox&lt;/strong&gt;, &lt;strong&gt;klik kanan&lt;/strong&gt; pada menu/link kemudian pilih &amp;quot;Save Link As&amp;quot; lalu tekan &amp;quot;Save&amp;quot;.&lt;br /&gt;\n3. Detail Data disajikan dalam format RAR dan PDF. Jika belum memiliki Adobe Acrobat Reader, dapat &lt;a href=&quot;http://www.adobe.com/products/acrobat/readstep.html&quot;&gt;klik disini&lt;/a&gt; untuk mendownload.&lt;/p&gt;\n\n&lt;ol&gt;\n	&lt;li&gt;&lt;strong&gt;Informasi berkaitan dengan risiko yang dapat mengancam kesehatan dan keselamatan masyarakat &lt;/strong&gt;\n\n	&lt;ol&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/browse/pers&quot;&gt;Obat&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/browse/pers&quot;&gt;Obat Tradisional&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/browse/pers&quot;&gt;Kosmetika&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/browse/pers&quot;&gt;Pangan Olahan(Makanan dan Minuman)&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/index.php/browse/pers&quot;&gt;Suplemen Makanan&lt;/a&gt;&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n	&lt;br /&gt;\n	&lt;li&gt;&lt;strong&gt;Informasi mengenai penerimaan CPNS &lt;/strong&gt;\n	&lt;ol&gt;\n		&lt;li&gt;&lt;a href=&quot;http://e-rekrutmen.pom.go.id/&quot;&gt;Informasi mengenai penerimaan CPNS&lt;/a&gt;&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n	&lt;br /&gt;\n	&lt;li&gt;&lt;strong&gt;Informasi mengenai proses pengadaan Barang/Jasa&lt;/strong&gt;\n	&lt;ol&gt;\n		&lt;li&gt;&lt;a href=&quot;http://lpse.pom.go.id/&quot;&gt;LPSE&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/new/browse/more/pengadaan/28-11-2012/28-11-2017&quot;&gt;Pengumuman Pengadaan Barang/Jasa&lt;/a&gt;&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n&lt;/ol&gt;\n', NULL, NULL, b'1', 'ina', '2017-12-08 03:53:22', '2017-12-14 16:25:36');
INSERT INTO `page_static` (`id`, `title`, `link`, `main_pict`, `second_pict`, `content`, `short_desc`, `other_desc`, `is_sharing`, `lang_id`, `date_create`, `date_update`) VALUES
(8, 'Informasi yang Wajib Tersedia Setiap Saat', 'setiap-saat', NULL, NULL, '&lt;p&gt;&lt;strong&gt;PANDUAN DOWNLOAD&lt;/strong&gt;&lt;br /&gt;\n1. Jika Anda menggunakan browser &lt;strong&gt;Internet Explorer&lt;/strong&gt; atau &lt;strong&gt;Google Chrome&lt;/strong&gt;, &lt;strong&gt;klik &lt;/strong&gt; pada menu/link sesuai dengan nama dokumen yang Anda inginkan.&lt;br /&gt;\n2. Jika Anda menggunakan browser &lt;strong&gt;Mozilla Fire Fox&lt;/strong&gt;, &lt;strong&gt;klik kanan&lt;/strong&gt; pada menu/link kemudian pilih &amp;quot;Save Link As&amp;quot; lalu tekan &amp;quot;Save&amp;quot;.&lt;br /&gt;\n3. Detail Data disajikan dalam format RAR dan PDF. Jika belum memiliki Adobe Acrobat Reader, dapat &lt;a href=&quot;http://www.adobe.com/products/acrobat/readstep.html&quot;&gt;klik disini&lt;/a&gt; untuk mendownload.&lt;/p&gt;\n\n&lt;ol&gt;\n	&lt;li&gt;&lt;strong&gt;Daftar seluruh informasi publik (publikasi)&lt;/strong&gt;\n\n	&lt;ol&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/DIP2017.pdf&quot;&gt;Daftar Layanan Publik Badan POM&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://perpustakaan.pom.go.id/hsl_upload_web.asp?hsl_pilih_up=Buletin%20info%20pom&quot;&gt;InfoPOM&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://ioni.pom.go.id/&quot;&gt;IONI&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://perpustakaan.pom.go.id/berita_Meso_web.asp&quot;&gt;Buletin MESO&lt;/a&gt;&lt;/li&gt;\n		&lt;br /&gt;\n		&lt;li&gt;&lt;strong&gt;Buletin Keamanan Pangan&lt;/strong&gt;\n		&lt;ol&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/27_Final.pdf&quot;&gt;Edisi ke-27 Tahun 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/28_Final.pdf&quot;&gt;Edisi ke-28 Tahun 2015&lt;/a&gt;&lt;/li&gt;\n		&lt;/ol&gt;\n		&lt;/li&gt;\n		&lt;br /&gt;\n		&lt;li&gt;&lt;strong&gt;Naturakos&lt;/strong&gt;\n		&lt;ol&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/buletin_edisiI_2015.pdf&quot;&gt;Edisi ke-1 Tahun 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/buletin_edisiII_2015.pdf&quot;&gt;Edisi ke-2 Tahun 2015&lt;/a&gt;&lt;/li&gt;\n		&lt;/ol&gt;\n		&lt;/li&gt;\n		&lt;br /&gt;\n		&lt;li&gt;&lt;strong&gt;WartaPOM&lt;/strong&gt;\n		&lt;ol&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/1-wpNop-Des-2015.pdf&quot;&gt;Edisi November - Desember 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/2-wp Sep-Oktbr-2015.pdf&quot;&gt;Edisi September - Oktober 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/3-wpJULI-AGUSTUS-F2015.pdf&quot;&gt;Edisi Juli - Agustus 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/4-wpMei-Juni-2015.pdf&quot;&gt;Edisi Mei - Juni 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/5-wpMaret-April 2015.pdf&quot;&gt;Edisi Maret - April 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2016/6-wpJAN FEB-2015.pdf&quot;&gt;Edisi Januari - Februari 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/2_MarApr2014.pdf&quot;&gt;Edisi Maret - April 2014&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/1_JANFEB2014.pdf&quot;&gt;Edisi Januari - Februari 2014&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/5_NOV-DES.pdf&quot;&gt;Edisi November - Desember 2013&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/4_SEPT-OKT.pdf&quot;&gt;Edisi September - Oktober 2013&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/3_JUL-AGT.pdf&quot;&gt;Edisi Juli - Agustus 2013&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/2_MEI-JUN.pdf&quot;&gt;Edisi Mei - Juni 2013&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/2014/warta_pom/1_MAR-APR.pdf&quot;&gt;Edisi Maret - April 2013&lt;/a&gt;&lt;/li&gt;\n		&lt;/ol&gt;\n		&lt;/li&gt;\n		&lt;br /&gt;\n		&lt;li&gt;&lt;strong&gt;Newsletter &lt;/strong&gt;\n		&lt;ol&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/rar/NEWSLETTER-DESEMBER2015.pdf&quot;&gt;Volume 13 No.3, Desember 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/rar/NEWSLETTER-AGUSTUS2015.pdf&quot;&gt;Volume 13 No.2, Agustus 2015&lt;/a&gt;&lt;/li&gt;\n			&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/ppid/rar/vol10no1april2012.pdf&quot;&gt;Volume 10 No.1, April 2012&lt;/a&gt;&lt;/li&gt;\n		&lt;/ol&gt;\n		&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n	&lt;br /&gt;\n	&lt;li&gt;&lt;strong&gt;Peraturan Kepala Badan POM &lt;/strong&gt;&lt;br /&gt;\n	&lt;a href=&quot;http://jdih.pom.go.id&quot;&gt;JDIH&lt;/a&gt;&lt;/li&gt;\n	&lt;br /&gt;\n	&lt;li&gt;&lt;strong&gt;Prosedur Kerja yang berkaitan dengan pelayanan masyarakat &lt;/strong&gt;\n	&lt;ol&gt;\n		&lt;li&gt;&lt;a href=&quot;reg/Reg_o_1.html&quot;&gt;Tata Cara Pendaftaran Obat&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;reg/Reg_ot_1.htm&quot;&gt;Tata Cara Pendaftaran Obat Tradisional&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;reg/Reg_ot_1.htm&quot;&gt;Tata Cara Pendaftaran Produk Komplemen&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://notifkos.pom.go.id/bpom-notifikasi/procedure.php&quot;&gt;Tata Cara Pendaftaran Notifikasi Kosmetik (e-Notifikasi Kosmetika)&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;reg/Reg_pgn_1.html&quot;&gt;Tata Cara Pendaftaran Pangan Olahan&lt;/a&gt; (&lt;a href=&quot;http://e-reg.pom.go.id&quot;&gt;e-Registration&lt;/a&gt;)&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://e-bpom.pom.go.id/&quot;&gt;Tata cara permohonan SKI (e-bpom)&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;Tata cara permohonan SKE&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://ulpk.pom.go.id/&quot;&gt;Tata cara permohonan permintaan informasi&lt;/a&gt;&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n	&lt;br /&gt;\n	&lt;li&gt;&lt;strong&gt;Laporan mengenai pelayanan masyarakat &lt;/strong&gt;\n	&lt;ol&gt;\n		&lt;li&gt;&lt;a href=&quot;http://www.pom.go.id/webreg/&quot;&gt;Jumlah izin edar yang diterbitkan&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://e-bpom.pom.go.id/&quot;&gt;Jumlah SKI yang diterbitkan&lt;/a&gt;&lt;/li&gt;\n		&lt;li&gt;Jumlah SKE yang diterbitkan&lt;/li&gt;\n		&lt;li&gt;Jumlah &lt;em&gt;Certificate of Pharmaceutical Product&lt;/em&gt; (CPP)&lt;/li&gt;\n		&lt;li&gt;Jumlah sertifikat lain&lt;/li&gt;\n		&lt;li&gt;&lt;a href=&quot;http://ulpk.pom.go.id&quot;&gt;Jumlah pengaduan/permintaan informasi &lt;/a&gt;&lt;/li&gt;\n	&lt;/ol&gt;\n	&lt;/li&gt;\n&lt;/ol&gt;\n', NULL, NULL, b'1', 'ina', '2017-12-08 03:55:33', '2017-12-14 16:25:42'),
(9, 'Halaman Tidak Ditemukan', 'page-404', NULL, NULL, '&lt;h3&gt;MAAF, HALAMAN YANG ANDA MAKSUD TIDAK DITEMUKAN&lt;/h3&gt;\n\n&lt;p&gt;Mungkin halaman yang Anda maksud masih dalam pengembangan. Silahkan kembali ke&amp;nbsp;&lt;a href=&quot;javascript:history.go(-1)&quot;&gt;halaman sebelumnya&lt;/a&gt;&amp;nbsp;atau hubungi kontak di bawah ini.&lt;/p&gt;\n', '', NULL, b'0', 'ina', '2018-01-10 04:07:32', '2018-01-10 05:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `main_pict` varchar(255) DEFAULT NULL,
  `caption` text,
  `lang_id` varchar(255) NOT NULL,
  `sorter` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `main_pict`, `caption`, `lang_id`, `sorter`, `date_create`, `date_update`) VALUES
(1, 'aksinasional.jpg', 'Rangkaian Kegiatan Aksi Nasional Tolak Penyalahgunaan Obat, Jakarta (22/10)', 'ina', 4, '2018-01-02 08:26:58', NULL),
(2, 'kerjabersama.jpg', 'Capaian 3 Tahun Pemerintahan Presiden Jokowi dan Wakil Presiden Jusuf Kalla', 'ina', 3, '2018-01-02 08:28:08', NULL),
(3, 'aksinasional1.jpg', 'Presiden Jokowi bersama Kepala BPOM membuka Aksi Nasional Pemberantasan Obat Ilegal dan Penyalahgunaan Obat, Jakarta (3/10)', 'ina', 2, '2018-01-02 08:28:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE `static` (
  `id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`id`, `page`, `key`, `value`, `caption`, `type`, `date_update`) VALUES
(5, 'page', 'footer', '&lt;p&gt;&amp;copy; {{Year}} - Pejabat Pengelola Informasi dan Dokumentasi, BPOM RI&amp;nbsp;&lt;/p&gt;', 'Footer', 'html', '2018-01-04 16:12:33'),
(6, 'setting', 'content_url', 'http://localhost/cms/content/', 'Content URL', 'text', '2017-12-14 22:38:33'),
(7, 'page', 'site_title', 'PPID - Badan POM', 'Title', 'text', '2018-01-04 16:12:33'),
(8, 'page', 'address', '&lt;p&gt;Jalan Percetakan Negara Nomor 23 Jakarta - 10560 - Indonesia&lt;/p&gt;', 'Address', 'html', '2018-01-04 16:12:33'),
(9, 'page', 'phone', '+6221 4244691 / 42883309 / 42883462', 'Phone Footer', 'text', '2018-01-04 16:12:33'),
(10, 'page', 'fax', '+6221 4263333', 'Fax Footer', 'text', '2018-01-04 16:12:33'),
(11, 'page', 'mobile', '+6281 21 9999 533 (SMS)', 'Mobile Footer', 'text', '2018-01-04 16:12:33'),
(12, 'page', 'email', '&lt;p&gt;&lt;a href=&quot;mailto:ppid@pom.go.id&quot;&gt;ppid@pom.go.id&lt;/a&gt;; &lt;a href=&quot;mailto:halobpom@pom.go.id&quot;&gt;halobpom@pom.go.id&lt;/a&gt;;&amp;nbsp;&lt;a href=&quot;mailto:pengaduanyanblik@pom.go.id&quot;&gt;pengaduanyanblik@pom.go.id&lt;/a&gt;&lt;/p&gt;', 'Email Footer', 'html', '2018-01-04 16:12:33'),
(13, 'page', 'twitter', '&lt;p&gt;&lt;a href=&quot;https://twitter.com/bpom_ri&quot;&gt;@bpom_ri&lt;/a&gt;&lt;/p&gt;', 'Twitter Footer', 'html', '2018-01-04 16:12:33'),
(14, 'page', 'facebook', '&lt;p&gt;&lt;a href=&quot;https://www.facebook.com/BadanPengawasObatdanMakananRI&quot;&gt;Badan POM&lt;/a&gt;&lt;/p&gt;', 'Facebook Footer', 'html', '2018-01-04 16:12:33'),
(15, 'page', 'instagram', '&lt;p&gt;&lt;a href=&quot;https://www.instagram.com/bpom_ri/&quot;&gt;@bpom_ri&lt;/a&gt;&lt;/p&gt;', 'Instagram Footer', 'html', '2018-01-04 16:12:33'),
(16, 'page', 'youtube', '&lt;p&gt;&lt;a href=&quot;https://www.youtube.com/channel/UCO5Oi2m_M-uQhTaKDyGA0nA&quot;&gt;Badan POM RI&lt;/a&gt;&lt;/p&gt;', 'Youtube Footer', 'html', '2018-01-04 16:12:33'),
(17, 'page', 'twitter_top', 'https://twitter.com/bpom_ri', 'Twitter Header', 'text', '2018-01-04 16:12:33'),
(18, 'page', 'facebook_top', 'https://www.facebook.com/BadanPengawasObatdanMakananRI', 'Facebook Header', 'text', '2018-01-04 16:12:33'),
(19, 'page', 'instagram_top', 'https://www.instagram.com/bpom_ri/', 'Instagram Header', 'text', '2018-01-04 16:12:33'),
(20, 'page', 'youtube_top', 'https://www.youtube.com/channel/UCO5Oi2m_M-uQhTaKDyGA0nA/', 'Youtube Header', 'text', '2018-01-04 16:12:33'),
(21, 'page', 'phone_top', 'Halo BPOM 1500533', 'Phone Header', 'text', '2018-01-04 16:12:33'),
(22, 'page', 'banner', 'ppid_ Copy.png', 'Banner', 'image', '2018-01-04 16:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `ip` varchar(20) NOT NULL,
  `access_date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`ip`, `access_date`, `hits`, `online`) VALUES
('::1', '2017-12-26', 17, 1514303887),
('::1', '2017-12-27', 18, 1514345720),
('::1', '2017-12-29', 32, 1514584804),
('::1', '2017-12-30', 17, 1514669809),
('::1', '2017-12-31', 18, 1514759815),
('::1', '2018-01-01', 234, 1514843325),
('::1', '2018-01-02', 226, 1514929527),
('::1', '2018-01-03', 233, 1515020311),
('::1', '2018-01-04', 383, 1515103729),
('::1', '2018-01-05', 42, 1515189635),
('::1', '2018-01-06', 27, 1515229638),
('::1', '2018-01-08', 20, 1515449168),
('::1', '2018-01-09', 16, 1515536238),
('::1', '2018-01-10', 277, 1515559742);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','operator') NOT NULL DEFAULT 'operator',
  `hash` varchar(50) DEFAULT NULL,
  `isaktif` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `realname`, `password`, `level`, `hash`, `isaktif`) VALUES
(1, 'admin', 'Administrator', '42e65988886c3d6b000cfe5c2dc4b726', 'administrator', '5897d28728c33', b'1'),
(2, 'danukidd', 'Danuk Cahya Permana', 'a38da24f5b5e69a96085b4532f6f7b54', 'operator', '5a4b31fe8a28f', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `id_pagestatic` (`id_pagestatic`);

--
-- Indexes for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `newsticker`
--
ALTER TABLE `newsticker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `page_static`
--
ALTER TABLE `page_static`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`ip`,`access_date`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsticker`
--
ALTER TABLE `newsticker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page_static`
--
ALTER TABLE `page_static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `career`
--
ALTER TABLE `career`
  ADD CONSTRAINT `career_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`level`) REFERENCES `menu_level` (`level`) ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_4` FOREIGN KEY (`id_pagestatic`) REFERENCES `page_static` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `newsticker`
--
ALTER TABLE `newsticker`
  ADD CONSTRAINT `newsticker_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `page_static`
--
ALTER TABLE `page_static`
  ADD CONSTRAINT `page_static_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD CONSTRAINT `slideshow_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`lang_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
