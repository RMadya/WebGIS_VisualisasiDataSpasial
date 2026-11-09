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