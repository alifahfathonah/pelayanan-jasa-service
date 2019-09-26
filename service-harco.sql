-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Agu 2019 pada 05.24
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service-harco`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_authorized`
--

CREATE TABLE `tb_authorized` (
  `id_authorized` varchar(20) NOT NULL,
  `nama_authorized` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_authorized`
--

INSERT INTO `tb_authorized` (`id_authorized`, `nama_authorized`, `email`) VALUES
('ATH001', 'Daikin', 'daikin@gmail.com'),
('ATH002', 'Sanken', 'sanken@gmail.com'),
('ATH003', 'Random', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangelektronik`
--

CREATE TABLE `tb_barangelektronik` (
  `id_barangelektronik` varchar(15) NOT NULL,
  `id_authorized` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangelektronik`
--

INSERT INTO `tb_barangelektronik` (`id_barangelektronik`, `id_authorized`, `nama_barang`, `type`) VALUES
('BRG001', 'ATH002', 'AC', 'Split'),
('BRG002', 'ATH003', 'TV', 'Tabung'),
('BRG003', 'ATH001', 'AC', 'Window'),
('BRG004', 'ATH002', 'Kulkas', '2 Pintu'),
('BRG005', 'ATH002', 'Radio', 'Digital'),
('BRG006', 'ATH002', 'Rice Cooker', 'Kecil'),
('BRG007', 'ATH001', 'AC', 'Inverter'),
('BRG008', 'ATH003', 'Kulkas', '1 Pintu'),
('BRG009', 'ATH002', 'TV', 'LED'),
('BRG010', 'ATH003', 'AC', 'Split'),
('BRG011', 'ATH002', 'Mesin Cuci', 'Dua tabung'),
('BRG012', 'ATH003', 'TV', 'LED'),
('BRG013', 'ATH001', 'AC', 'Split'),
('BRG014', 'ATH001', 'AC', 'Packaged'),
('BRG015', 'ATH001', 'AC', 'Cassette'),
('BRG016', 'ATH001', 'AC', 'Standing Floor'),
('BRG017', 'ATH002', 'Dispenser', 'Galon Bawah'),
('BRG018', 'ATH002', 'Dispenser', 'Galon Atas'),
('BRG019', 'ATH002', 'Kompor Gas', 'Satu Tungku'),
('BRG020', 'ATH002', 'Kompor Gas', 'Dua Tungku'),
('BRG021', 'ATH003', 'Kulkas', '1 Pintu'),
('BRG022', 'ATH003', 'Rice Cooker', 'Besar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `id_surat` varchar(100) NOT NULL,
  `info` date NOT NULL,
  `updated_info` date DEFAULT NULL,
  `keterangan` text,
  `status_notif` enum('belum','dibaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `id_surat`, `info`, `updated_info`, `keterangan`, `status_notif`) VALUES
(18, 'SPK-18082019095918', '2019-08-02', '2019-08-03', NULL, 'dibaca'),
(19, 'SPK-18082019140007', '2019-08-03', NULL, '09:00', 'dibaca'),
(20, 'SPK-19082019151011', '2019-08-04', '2019-08-05', '09:20', 'dibaca'),
(21, 'SPK-20082019091921', '2019-08-05', NULL, '10:50', 'belum'),
(22, 'SPK-20082019092016', '2019-08-08', NULL, '09:21', 'belum'),
(23, 'SPK-20082019094209', '2019-07-27', NULL, '12:15', 'belum'),
(24, 'SPK-20082019100215', '2019-07-27', NULL, '23:00', 'belum'),
(25, 'SPK-20082019105520', '2019-08-15', NULL, '10:55', 'belum'),
(26, 'SPK-20082019111215', '2019-08-16', NULL, '07:15', 'dibaca'),
(27, 'SPK-24082019101828', '2019-08-24', NULL, '10:00', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id_keluhan` varchar(15) NOT NULL,
  `pemohon` varchar(100) DEFAULT NULL,
  `alamat_pemohon` text,
  `no_pemohon` varchar(15) DEFAULT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `keluhan` text NOT NULL,
  `id_barangelektronik` varchar(15) NOT NULL,
  `seri_barang` varchar(100) DEFAULT NULL,
  `tgl_keluhan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `garansi` varchar(50) DEFAULT NULL,
  `gambar_garansi` text,
  `konfirmasi` enum('belum','sudah','tolak') NOT NULL,
  `ket_konfirmasi` text,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `status_notif` enum('belum','dibaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id_keluhan`, `pemohon`, `alamat_pemohon`, `no_pemohon`, `id_pelanggan`, `keluhan`, `id_barangelektronik`, `seri_barang`, `tgl_keluhan`, `garansi`, `gambar_garansi`, `konfirmasi`, `ket_konfirmasi`, `status`, `status_notif`) VALUES
('KEL-18082019075', NULL, NULL, NULL, 'PEL002', 'AC mati', 'BRG013', 'E081800', '2019-08-01 00:59:55', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-18082019105', 'Toko XOXO', 'Jalan Sunan Muria', '085191291012', 'PEL010', 'Kompresor rusak', 'BRG016', 'FVQ50CVE', '2019-08-01 03:56:22', 'A1029', '1566100582639.jpg', 'sudah', NULL, '2', 'dibaca'),
('KEL-18082019125', NULL, NULL, NULL, 'PEL005', 'Frezernya mati', 'BRG021', 'KL-2910', '2019-08-02 05:59:40', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-19082019145', 'Call Center', 'Semarang', '(0291) 9189', 'PEL011', 'Tidak mau keluar api', 'BRG020', 'SL-20102', '2019-08-03 07:59:42', 'B182', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-20082019082', NULL, NULL, NULL, 'PEL006', 'Terdapat garis pada layar', 'BRG009', 'LS-3718', '2019-08-06 01:24:15', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-20082019093', NULL, NULL, NULL, 'PEL013', 'Bunyi Ac kencang sekali', 'BRG013', 'KS-2721', '2019-08-06 02:38:22', 'tidak', NULL, 'tolak', 'Maaf untuk wilayah Semarang tidak dalam jangkauan kami. Silahkan hubungi service center di semarang', '0', 'dibaca'),
('KEL-20082019094', NULL, NULL, NULL, 'PEL003', 'Galon tidak mau mengalir ke dispenser', 'BRG018', 'HG-2728', '2019-07-24 02:41:40', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-20082019100', NULL, NULL, NULL, 'PEL014', 'Tidak kerasa dingin', 'BRG021', 'YH-93839', '2019-07-25 03:01:40', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-20082019105', NULL, NULL, NULL, 'PEL016', 'Baling baling pada mesin cuci tidak bergerak', 'BRG011', 'JKL-282', '2019-08-12 03:54:27', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-20082019111', NULL, NULL, NULL, 'PEL007', 'Baling dalam tidak bergerak', 'BRG016', 'JKJ-81919', '2019-08-13 04:11:14', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-20082019135', NULL, NULL, NULL, 'PEL008', 'Pipanya bocor', 'BRG007', 'HJ-8292', '2019-08-20 06:56:11', 'tidak', NULL, 'sudah', NULL, '2', 'dibaca'),
('KEL-24082019102', 'Call Center', 'Semarang', '(0291) 9189', 'PEL017', 'Galon pecah', 'BRG018', 'SL-121', '2019-08-24 03:27:28', 'ya', '1566617248080.JPG', 'sudah', NULL, '1', 'dibaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nomorperbaikan`
--

CREATE TABLE `tb_nomorperbaikan` (
  `id_nomor` int(11) NOT NULL,
  `nomor_perbaikan` varchar(100) NOT NULL,
  `status` enum('belum','dipake') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nomorperbaikan`
--

INSERT INTO `tb_nomorperbaikan` (`id_nomor`, `nomor_perbaikan`, `status`) VALUES
(8, 'tidak', 'belum'),
(12, 'SMG1940075', 'dipake'),
(13, 'SMG1940072', 'dipake'),
(14, 'SMG1940082', 'dipake'),
(15, 'SMG1940019', 'dipake'),
(16, 'SMG1940028', 'dipake'),
(17, 'SMG1940084', 'dipake'),
(18, 'SMG1940001', 'belum'),
(19, 'SMG1940009', 'dipake'),
(20, 'SMG1940029', 'dipake'),
(21, 'SMG1940072', 'belum'),
(22, 'SMG1940045', 'belum'),
(23, 'SMG1940008', 'belum'),
(24, 'SMG1940191', 'belum'),
(25, 'SMG1940065', 'belum'),
(26, 'SMG1940061', 'belum'),
(27, 'SMG1940044', 'belum'),
(28, 'SMG6189901', 'belum'),
(29, 'SMG7281999', 'belum'),
(30, 'SMG516789', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasok`
--

CREATE TABLE `tb_pasok` (
  `id_pasok` varchar(25) NOT NULL,
  `id_sparepart` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pasok` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasok`
--

INSERT INTO `tb_pasok` (`id_pasok`, `id_sparepart`, `jumlah`, `tgl_pasok`) VALUES
('PSK001', 'SPR015', 1, '2019-08-19 07:37:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jekel` enum('laki-laki','perempuan') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `alamat` text NOT NULL,
  `pelanggan_lat` double NOT NULL,
  `pelanggan_long` double NOT NULL,
  `foto` varchar(100) DEFAULT 'default.png',
  `dateCreated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pelanggan`, `nama_pelanggan`, `jekel`, `no_telp`, `username`, `password`, `alamat`, `pelanggan_lat`, `pelanggan_long`, `foto`, `dateCreated`) VALUES
('PEL001', 'Lia', 'perempuan', '089219201201', 'lia', '$2y$10$0PI5wnqxA/QrB/XgRoC9Ru4fgs7999uk1wcwN4ANuzdO2qsMpKqS.', 'Jalan Kaliwungu Kudus', -6.770002592404473, 111.01869634521483, 'default.png', 1563797469),
('PEL002', 'Agus', 'laki-laki', '087281920911', 'agus', '$2y$10$mDhAAjJaoZHkGeLyzmFtbuH2iN/zZ.Xh5HfKWv/PuYO5OO1TP2JP2', 'Jalan Keling Jepara', -6.770002592404473, 111.01869634521483, 'default.png', 1563797799),
('PEL003', 'Denny Caknan', 'laki-laki', '085126889121', 'deny', '$2y$10$T6SHukgihMfePODGXr8IGO.ymtGwWXInZgDzxD74NEU0Ua3ldK1A.', 'Jalan Margorejo Pati', -6.805457892246574, 110.85527471435546, '1563865392905.jpg', 1563865393),
('PEL004', 'Arjuna Wibawa', 'laki-laki', '085261882912', 'arjuna', '$2y$10$vNvHzwfLhIYPzrIDCnpGxubLU3BPjxJg.BGDIEoS0CXfv3IgaGS56', 'Jalan Pendopo Demak', -6.760115553408126, 111.02865270507812, '1563877770044.png', 1563874177),
('PEL005', 'Nanda', 'laki-laki', '085229911229', 'nanda', '$2y$10$ceqZ4M9yOMmDlde0wmpWNOMBFVXE2wD9risDcPnXAHjpToYzdwgIy', 'Jalan gor Jepara', -6.805798795904443, 110.8741574658203, '1564630335503.jpg', 1564630335),
('PEL006', 'Bela', 'perempuan', '082712891201', 'Bela', '$2y$10$4FURyBBHpQ.6BwrDNt.CwOiNdto8P2mdSSK49541wR84ZTm4Zz42q', 'Jalan Gor Wergu Wetan Kudus', -6.814716, 110.84970599999997, 'default.png', 1564765143),
('PEL007', 'Kinan', 'perempuan', '087291002921', 'kinan', '$2y$10$DAFFyaUgfHaxwC2HbwC7beW/OREpq7FebkjdGiNhGGhuKhWQ17xF2', 'Jalan Patimura Demak', -6.861362848007068, 110.78180364501952, 'default.png', 1564806511),
('PEL008', 'Irwan', 'laki-laki', '085271992012', 'Irwan', '$2y$10$30Ed1xYJsBsj4TdWztKDIuAq9q6dIAhkbr7.e0W3u8pyjd14lsfgm', 'Loram Kota Kudus', -6.830988899999999, 110.84486100000004, 'default.png', 1564895898),
('PEL009', 'Joko', 'laki-laki', '0827182911221', 'Joko', '$2y$10$qH6FHB6EjuRhFGbrNd8XwufdSyE3cJMY5mmi/T7RAP3.HuuE2WVau', 'Panjunan Kudus', -6.813566799999999, 110.83890059999999, 'default.png', 1564929517),
('PEL010', 'Rudi', 'laki-laki', '087281001921', 'Rudi', '$2y$10$IZkLqv4X/pojmVn52d3nwudbYzRwE.n/Xs9mIknMxqaRRJbRY.wtm', 'Jalan Lingkar Timur Kudus', -6.8269959, 110.87521679999998, 'default.png', 1566100582),
('PEL011', 'Dwi', 'laki-laki', '087228190291', 'Dwi', '$2y$10$IqNh.smyfeKuE1xzHwch2eoCKZRTyUdjHfg5HC8rn6sMQ2ZB1xuMW', 'Panjunan Kudus', -6.813566799999999, 110.83890059999999, 'default.png', 1566201582),
('PEL012', 'Jamal', 'laki-laki', '085372991012', 'jamal', '$2y$10$wInxlvf6Dw3wm5GjsE5FLubB6.WqBFD5mb67/xO5YVDpGahT5TxdK', 'Dempet Demak', -6.890537503705019, 110.72702052255102, 'default.png', 1566264658),
('PEL013', 'Irma', 'perempuan', '08825161882', 'irma', '$2y$10$4FfeVtQB4wpbirDMeqwbXOpUJLj6v/L4KXg49sQmW54rACNykBF26', 'Peleburan Semarang', -7.015206096495748, 110.44851546199118, 'default.png', 1566268644),
('PEL014', 'Gandi Setiawan', 'laki-laki', '087662891092', 'gandi', '$2y$10$6vmogi607GmsSs8DVm2jxeYf/gjPML0ioefm7XMIY5uRfYWps3wOa', 'Purworejo Bae Kudus', -6.794125886225734, 110.85025995134549, 'default.png', 1566269641),
('PEL015', 'Retno', 'perempuan', '087288191992', 'Retno', '$2y$10$WlvSEV6JmqNfA.toxuwtxupFIugn4h7om.DxzfE5MNc1ewm9GStjK', 'Cangkring Demak', -6.870271, 110.78674739999997, 'default.png', 1566270373),
('PEL016', 'Farid', 'laki-laki', '085166839001', 'farid', '$2y$10$5nqmjE8bRfodMGIDUpqrDeE37vPlsZjIVdZeIN40DUvnGkzzFHCuW', 'Kajeksan Kudus', -6.798028271893049, 110.83387192667635, 'default.png', 1566273189),
('PEL017', 'Danang', 'laki-laki', '082991001221', 'Danang', '$2y$10$gDuGdEBpssoScjBgO1joLOVtwykOu6HRH8qZWYknsW6jlHkx5/y0W', 'Damaran Kudus', -6.7994062, 110.8307049, 'default.png', 1566617247);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perkiraan`
--

CREATE TABLE `tb_perkiraan` (
  `id_perkiraan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perkiraan`
--

INSERT INTO `tb_perkiraan` (`id_perkiraan`, `keterangan`, `harga`) VALUES
(1, 'Biaya Jasa Sanken', '65000'),
(2, 'Biaya jasa daikin', '75000'),
(3, 'Jarak &lt;20 KM ', '250000'),
(4, 'Jarak &lt;30 KM', '50000'),
(5, 'Jarak &lt;40 KM', '75000'),
(6, 'Jarak &lt;50 KM', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sparepart`
--

CREATE TABLE `tb_sparepart` (
  `id_sparepart` varchar(15) NOT NULL,
  `id_authorized` varchar(15) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sparepart`
--

INSERT INTO `tb_sparepart` (`id_sparepart`, `id_authorized`, `nama_sparepart`, `harga`, `stok`) VALUES
('SPR001', 'ATH002', 'Kabel AC', 30000, 18),
('SPR002', 'ATH003', 'Pipa', 150000, 95),
('SPR003', 'ATH002', 'Selang pembuangan mesin cuci', 45000, 22),
('SPR004', 'ATH002', 'Gas', 200000, 7),
('SPR005', 'ATH001', 'Fan Outdoor', 270000, 3),
('SPR006', 'ATH002', 'Sumbu kompor sedang', 75000, 10),
('SPR007', 'ATH002', 'Tombol knop kompor tipe A', 20000, 5),
('SPR008', 'ATH002', 'Tombol knop kompor tipe B', 20000, 9),
('SPR009', 'ATH002', 'Keran dispenser', 30000, 20),
('SPR010', 'ATH002', 'Spin basket mesin cuci', 95000, 8),
('SPR011', 'ATH002', 'Ring spin mesin cuci', 30000, 18),
('SPR012', 'ATH002', 'Bottle suporter dispenser', 28000, 14),
('SPR013', 'ATH001', 'Fan Indoor', 250000, 4),
('SPR014', 'ATH002', 'Dynamo mesin cuci', 280000, 2),
('SPR015', 'ATH001', 'Kompresor 2 PK', 2100000, 1),
('SPR016', 'ATH002', 'Layar LED', 500000, 1),
('SPR017', 'ATH003', 'Layar LED', 350000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suratdetail`
--

CREATE TABLE `tb_suratdetail` (
  `id_detail` int(11) NOT NULL,
  `id_surat` varchar(100) NOT NULL,
  `id_sparepart` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_suratdetail`
--

INSERT INTO `tb_suratdetail` (`id_detail`, `id_surat`, `id_sparepart`, `jumlah`) VALUES
(25, 'SPK-18082019095918', 'SPR013', 1),
(27, 'SPK-18082019140007', 'SPR015', 1),
(28, 'SPK-19082019151011', 'SPR002', 1),
(29, 'SPK-20082019092016', 'SPR016', 1),
(30, 'SPK-20082019094209', 'SPR012', 1),
(31, 'SPK-20082019105520', 'SPR011', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suratperintahkerja`
--

CREATE TABLE `tb_suratperintahkerja` (
  `id_surat` varchar(100) NOT NULL,
  `id_keluhan` varchar(100) NOT NULL,
  `id_nomor` int(11) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `status_notif` enum('belum','dibaca','dibaca2') NOT NULL,
  `status_service` enum('belum','otw','setengah','selesai') NOT NULL,
  `ket_status` varchar(200) DEFAULT NULL,
  `status_bayar` enum('belum','sudah') NOT NULL,
  `biaya_transpot` int(11) DEFAULT NULL,
  `kode_kerusakan` varchar(100) DEFAULT NULL,
  `hasil` text,
  `tindakan` text,
  `biaya_jasa` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ttd` enum('belum','sudah','sudah2') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_suratperintahkerja`
--

INSERT INTO `tb_suratperintahkerja` (`id_surat`, `id_keluhan`, `id_nomor`, `id_user`, `status_notif`, `status_service`, `ket_status`, `status_bayar`, `biaya_transpot`, `kode_kerusakan`, `hasil`, `tindakan`, `biaya_jasa`, `total_bayar`, `tgl`, `ttd`) VALUES
('SPK-18082019095918', 'KEL-18082019075', 12, 'USR005', 'dibaca', 'selesai', 'Sparepartnya kosong', 'sudah', 25000, 'A092', 'Kipas dalamnya mati', 'Perbaiki pada fan indoor', 65000, 340000, '2019-08-03 08:14:18', 'sudah2'),
('SPK-18082019140007', 'KEL-18082019105', 14, 'USR004', 'dibaca', 'selesai', NULL, 'sudah', 25000, 'A092', 'Kompresor mati', 'Penggantian pada kompresor', 75000, 2200000, '2019-08-03 08:14:23', 'sudah2'),
('SPK-19082019151011', 'KEL-18082019125', 8, 'USR004', 'dibaca', 'selesai', 'Sparepart inden', 'sudah', 25000, 'B921', 'Pipanya bocor', 'Penggantian pada pipa', 50000, 225000, '2019-08-05 11:57:06', 'sudah2'),
('SPK-20082019091921', 'KEL-19082019145', 13, 'USR004', 'dibaca', 'selesai', NULL, 'sudah', 25000, 'A821', 'Tombolnya rusak', 'Perbaiki pada tombol', 65000, 90000, '2019-08-05 04:17:26', 'sudah2'),
('SPK-20082019092016', 'KEL-20082019082', 16, 'USR004', 'dibaca', 'selesai', NULL, 'sudah', 25000, 'F62', 'Layar rusak', 'Penggantian pada layar', 65000, 590000, '2019-08-08 04:17:30', 'sudah2'),
('SPK-20082019094209', 'KEL-20082019094', 15, 'USR005', 'dibaca', 'selesai', 'Suku cadang kosong', 'sudah', 25000, 'V627', 'Bottle support pecah', 'Penggantian pada bottle suport', 65000, 118000, '2019-07-27 04:17:23', 'sudah2'),
('SPK-20082019100215', 'KEL-20082019100', 8, 'USR005', 'dibaca', 'selesai', NULL, 'sudah', 25000, 'H728', 'AC tidak kerasa dinginkan ', 'Pengisin refrigen', 50000, 75000, '2019-07-27 04:17:33', 'sudah2'),
('SPK-20082019105520', 'KEL-20082019105', 17, 'USR005', 'dibaca', 'selesai', NULL, 'sudah', 25000, 'J27', 'Baling mesin cuci tidak bergerak', 'Perbaikan pada mesinnya', 65000, 120000, '2019-08-15 04:17:35', 'sudah2'),
('SPK-20082019111215', 'KEL-20082019111', 19, 'USR005', 'dibaca', 'selesai', NULL, 'sudah', 25000, 'L171', 'Kabel AC putus', 'Pembetulan pada kabel', 75000, 100000, '2019-08-15 04:17:38', 'sudah2'),
('SPK-24082019101828', 'KEL-20082019135', 20, 'USR004', 'belum', 'belum', NULL, 'belum', NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-24 03:19:41', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('pelayanan','teknisi','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `no_telp`, `username`, `password`, `level`) VALUES
('USR001', 'Mulyadi', '085600611039', 'mulyadi', '$2y$10$LvdVPBO2vBH64ZFAPC0C6uHEjLn7OBsGoKSeB4LH02P0J41L30P16', 'pelayanan'),
('USR003', 'Joko', '087458394331', 'joko', '$2y$10$T2kHp5Kx9r6NxKOUMLEfPOhtJp7T5hui1EfUNmQgViVUMd1L6jgHW', 'pimpinan'),
('USR004', 'Anang', '085290181209', 'anang', '$2y$10$c6r9LU.Nzg2rBOak33Wvc.z44BTRSCEMtrjXW3odEtzD1V9BCcTFS', 'teknisi'),
('USR005', 'Udin', '081292382013', 'udin', '$2y$10$nM5.Y7DCF9S6oc9ogzRc2.fY8O96rJul8bXtb2.OzxxJsU/OtwURi', 'teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_authorized`
--
ALTER TABLE `tb_authorized`
  ADD PRIMARY KEY (`id_authorized`);

--
-- Indexes for table `tb_barangelektronik`
--
ALTER TABLE `tb_barangelektronik`
  ADD PRIMARY KEY (`id_barangelektronik`),
  ADD KEY `id_authorized` (`id_authorized`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barangelektronik` (`id_barangelektronik`);

--
-- Indexes for table `tb_nomorperbaikan`
--
ALTER TABLE `tb_nomorperbaikan`
  ADD PRIMARY KEY (`id_nomor`);

--
-- Indexes for table `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_perkiraan`
--
ALTER TABLE `tb_perkiraan`
  ADD PRIMARY KEY (`id_perkiraan`);

--
-- Indexes for table `tb_sparepart`
--
ALTER TABLE `tb_sparepart`
  ADD PRIMARY KEY (`id_sparepart`),
  ADD KEY `id_authorized` (`id_authorized`);

--
-- Indexes for table `tb_suratdetail`
--
ALTER TABLE `tb_suratdetail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indexes for table `tb_suratperintahkerja`
--
ALTER TABLE `tb_suratperintahkerja`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_keluhan` (`id_keluhan`),
  ADD KEY `id_nomor` (`id_nomor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_nomorperbaikan`
--
ALTER TABLE `tb_nomorperbaikan`
  MODIFY `id_nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tb_perkiraan`
--
ALTER TABLE `tb_perkiraan`
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_suratdetail`
--
ALTER TABLE `tb_suratdetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barangelektronik`
--
ALTER TABLE `tb_barangelektronik`
  ADD CONSTRAINT `tb_barangelektronik_ibfk_1` FOREIGN KEY (`id_authorized`) REFERENCES `tb_authorized` (`id_authorized`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_info`
--
ALTER TABLE `tb_info`
  ADD CONSTRAINT `tb_info_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `tb_suratperintahkerja` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD CONSTRAINT `tb_keluhan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pendaftaran` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_keluhan_ibfk_2` FOREIGN KEY (`id_barangelektronik`) REFERENCES `tb_barangelektronik` (`id_barangelektronik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD CONSTRAINT `tb_pasok_ibfk_1` FOREIGN KEY (`id_sparepart`) REFERENCES `tb_sparepart` (`id_sparepart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sparepart`
--
ALTER TABLE `tb_sparepart`
  ADD CONSTRAINT `tb_sparepart_ibfk_1` FOREIGN KEY (`id_authorized`) REFERENCES `tb_authorized` (`id_authorized`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_suratdetail`
--
ALTER TABLE `tb_suratdetail`
  ADD CONSTRAINT `tb_suratdetail_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `tb_suratperintahkerja` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratdetail_ibfk_2` FOREIGN KEY (`id_sparepart`) REFERENCES `tb_sparepart` (`id_sparepart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_suratperintahkerja`
--
ALTER TABLE `tb_suratperintahkerja`
  ADD CONSTRAINT `tb_suratperintahkerja_ibfk_1` FOREIGN KEY (`id_keluhan`) REFERENCES `tb_keluhan` (`id_keluhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratperintahkerja_ibfk_2` FOREIGN KEY (`id_nomor`) REFERENCES `tb_nomorperbaikan` (`id_nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratperintahkerja_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
