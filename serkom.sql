-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2023 pada 04.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `syarat` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `nama_beasiswa`, `syarat`, `status`) VALUES
(3, 'Beasiswa Peningkatan Prestasi Akademik', ' <ul>             <li>Minimal untuk semester 2</li>             <li>Memenuhi syarat nilai IPK sebesar 3,0</li>             <li>Melampirkan bukti fotokopi transkrip nilai yang sudah disahkan</li>             <li>Melampirkan bukti fotokopi KRS, KTM, Pajak Bumi dan Bangunan, dan rekening listrik</li>             <li>Melampirkan bukti surat keterangan penghasilan orang tua dan disahkan</li>             <li>Melampirkan bukti berupa surat bahwa kamu tidak menerima beasiswa lain</li>         </ul>', 'akademik'),
(4, 'Beasiswa Berupa Bidikmisi', ' <p>Beasiswa kuliah yang banyak diincar oleh para mahasiswa adalah bidikmisi. Jenis beasiswa ini merupakan bantuan biaya pendidikan yang didapat dari pemerintah melalui Direktorat Jenderal Pendidikan Tinggi. Beasiswa tersebut dikhususkan kepada mahasiswa yang tidak mampu dalam segi ekonominya.              Namun, mahasiswa tersebut harus mempunyai nilai akademik yang bagus untuk menempuh pendidikan pada program studi unggulan. Biasanya, beasiswa bidikmisi akan menanggung biaya kuliah sampai lulus. Syaratnya adalah mahasiswa harus lulus dengan tepat waktu atau sesuai waktu normal untuk lulus.</p>', 'akademik'),
(5, 'Beasiswa KIP Kuliah', ' <p>Macam-macam beasiswa yang bisa kamu coba daftarkan dan tersedia dalam perguruan tinggi adalah KIP Kuliah. Beasiswa tersebut merupakan program baru yang dibuat oleh pemerintah. Tujuannya adalah untuk menggantikan beasiswa bidikmisi dengan anggaran yang lebih besar. Tidak heran jika syarat dan targetnya sama dengan beasiswa untuk bidikmisi.              Biasanya, pendaftaran KIP Kuliah bersamaan dengan pendaftaran dalam SNMPTN. Jika kamu mendapatkan beasiswa tersebut, maka kamu bisa mendapat biaya hidup sebesar Rp 700.000 setiap semester. Sementara biaya pendidikan mencapai Rp 2.400.000 setiap semester yang dilakukan selama 4 tahun.</p>', 'akademik'),
(6, 'Beasiswa Berupa Bantuan Biaya Mahasiswa', '   <ul>             <li>Mempunyai nilai IPK minimal 2,5</li>             <li>Melampirkan bukti surat keterangan tanda tidak mampu dari kepala desa atau lurah</li>         </ul>', 'akademik'),
(7, 'Beasiswa dari BCA Finance', '    <p>Jenis beasiswa yang terdapat di perguruan tinggi adalah beasiswa BCA Finance. Jenis beasiswa tersebut adalah beasiswa Peduli Anak Bangsa dengan target mahasiswa kuliah S1 di PTN atau PTS.  Biaya yang akan kamu dapatkan jika lolos beasiswa ini adalah Rp 3.000.000 untuk di setiap semester. Nantinya uang tersebut akan diberikan sampai mahasiswa mencapai semester 8 dalam perkuliahan. Syarat untuk mendapatkan beasiswa BCA Finance adalah IPK minimal 3,0 untuk PTN dan minimal 3,40 untuk PTS.</p>', 'akademik'),
(8, 'Beasiswa Atlet Olahraga', '  <ul>             <li>Mempunyai Sertfikat Kejuaraan Minimal Juara 1 sampai 3 Tingkat Nasional</li>         </ul>', 'Non Akademik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` bigint(15) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `beasiswa` int(11) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `email`, `nomor_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status`) VALUES
(5, 'gilang', 'gilangsaputro987@gmail.com', 432424234, 6, 3, 4, 'img/background merh.jpg', 0),
(6, 'gilang', 'gilangsaputro987@gmail.com', 87665487, 3, 3, 4, 'img/background merh.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
