<<<<<<< HEAD
CREATE DATABASE IF NOT EXISTS db_magetan;
USE db_magetan;

CREATE TABLE IF NOT EXISTS lokasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(150) NOT NULL,
    jenis VARCHAR(50) NOT NULL,
    lon DECIMAL(11, 7) NOT NULL,
    lat DECIMAL(10, 7) NOT NULL
);

INSERT INTO lokasi (nama, jenis, lon, lat) VALUES
('Alun-Alun Magetan', 'Ruang Terbuka', 111.32821, -7.65613),
('Masjid Agung Magetan', 'Tempat Ibadah', 111.32719, -7.65610),
('RSUD Dr. Sayidiman', 'Kesehatan', 111.33609597469486, -7.652400420843242),
('Pasar Besar Magetan', 'Perdagangan', 111.32960, -7.65350),
('Kantor Bupati Magetan', 'Pemerintahaan', 111.3295206532783, -7.656423610239831),
('SMA Negeri 1 Magetan', 'Pendidikan', 111.31661, -7.65515),
('Telaga Sarangan', 'Wisata', 111.21832, -7.67776);
=======
-- ============================================================
-- Database untuk WebGIS Visualisasi Data Spasial - Magetan
-- ============================================================

-- 1. Buat database
CREATE DATABASE IF NOT EXISTS webgis_magetan
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;

USE webgis_magetan;

-- 2. Buat tabel lokasi_fasilitas
CREATE TABLE IF NOT EXISTS lokasi_fasilitas (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    nama    VARCHAR(255) NOT NULL COMMENT 'Nama fasilitas',
    jenis   VARCHAR(100) NOT NULL COMMENT 'Jenis/kategori fasilitas',
    lon     DOUBLE       NOT NULL COMMENT 'Longitude (Bujur)',
    lat     DOUBLE       NOT NULL COMMENT 'Latitude (Lintang)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Isi data fasilitas umum di Kabupaten Magetan (minimal 5 titik)
INSERT INTO lokasi_fasilitas (nama, jenis, lon, lat) VALUES
('Alun-Alun Magetan',       'Ruang Terbuka',  111.3592, -7.6464),
('Masjid Agung Magetan',    'Tempat Ibadah',   111.3580, -7.6455),
('RSUD Dr. Sayidiman',      'Kesehatan',       111.3545, -7.6440),
('Pasar Besar Magetan',     'Perdagangan',     111.3610, -7.6475),
('Kantor Bupati Magetan',   'Pemerintahan',    111.3570, -7.6490),
('SMA Negeri 1 Magetan',    'Pendidikan',      111.3530, -7.6510),
('Telaga Sarangan',         'Wisata',          111.2275, -7.6780);
>>>>>>> dff6fb6 (add domentation)
