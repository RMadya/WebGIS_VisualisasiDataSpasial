# WebGIS Visualisasi Data Spasial - Kecamatan Magetan

Proyek Sistem Informasi Geografis berbasis Web (WebGIS) sederhana untuk memvisualisasikan batas wilayah administrasi dan persebaran fasilitas umum di wilayah Kabupaten/Kecamatan Magetan, Jawa Timur.

Proyek ini dibangun menggunakan **Leaflet.js**, **GeoJSON**, **PHP**, dan database **MySQL**.

---

## 📌 Fitur Utama

- **Peta Interaktif (Leaflet JS & OpenStreetMap)**: Navigasi peta dinamis (zoom, pan, responsive).
- **Visualisasi Poligon Wilayah (GeoJSON)**: Menampilkan batas wilayah administratif Magetan dengan styling poligon semi-transparan hijau serta popup nama wilayah saat diklik.
- **Titik Fasilitas Umum (Point of Interest)**: Menampilkan titik koordinat lokasi penting (Pendidikan, Kesehatan, Tempat Ibadah, Perdagangan, Ruang Terbuka, Pemerintahan, dan Wisata) menggunakan circle marker biru.
- **Integrasi Database MySQL & Fallback Mode**: Data fasilitas dapat diambil langsung dari database MySQL via endpoint PHP GeoJSON. Jika database belum aktif, sistem secara otomatis menggunakan data fallback statis sehingga peta tetap berjalan tanpa error.
- **Popup Informasi Interaktif**: Klik pada titik fasilitas menampilkan nama dan kategori fasilitas, klik pada poligon menampilkan nama wilayah.
- **Auto-fit Bounds**: Peta secara otomatis memusatkan dan menyesuaikan tingkat zoom sesuai batas wilayah GeoJSON yang dimuat.

---

## 🛠️ Teknologi & Komponen yang Digunakan

1. **HTML5**: Struktur kerangka antarmuka halaman web.
2. **CSS3**: Tata letak, dimensi kontainer peta, dan styling elemen antarmuka.
3. **JavaScript (ES6+)**: Logika pemanggilan data asinkronus (`Fetch API`) dan rendering layer spasial.
4. **Leaflet.js (v1.9.4)**: Library open-source JavaScript untuk peta interaktif.
5. **OpenStreetMap (OSM)**: Basemap/ubin peta dasar.
6. **GeoJSON**: Standar format pertukaran data spasial geografis (`Magetan.geojson` untuk batas wilayah dan format titik lokasi).
7. **PHP**: Backend API endpoint (`data.php`) yang menyajikan data dari MySQL ke format GeoJSON standard (`FeatureCollection`).
8. **MySQL / MariaDB**: Penyimpanan data tabular titik lokasi (ID, nama fasilitas, kategori/jenis, longitude, latitude).

---

## 📂 Struktur Direktori Proyek

```text
WebGIS_VisualisasiDataSpasial/
├── index.html          # Halaman utama tempat peta ditampilkan
├── style.css           # Styling halaman dan ukuran kontainer peta
├── script.js          # Inisialisasi peta Leaflet, fetch data & event handler
├── data.php            # Endpoint API PHP (mengubah data MySQL ke GeoJSON)
├── Magetan.geojson     # Data spasial batas wilayah Magetan
├── database.sql        # Skrip DDL & DML database MySQL
└── README.md           # Dokumentasi proyek
```

---

## 📍 Data Titik Fasilitas (Magetan)

Titik fasilitas umum yang terdaftar dan ditampilkan pada peta:

| No | Nama Fasilitas | Kategori / Jenis | Longitude (Bujur) | Latitude (Lintang) |
|:--:|:---|:---|:---:|:---:|
| 1 | **Alun-Alun Magetan** | Ruang Terbuka | `111.32821` | `7.65613` |
| 2 | **Masjid Agung Magetan** | Tempat Ibadah | `111.32719` | `-7.65610` |
| 3 | **RSUD Dr. Sayidiman** | Kesehatan | `111.33609597469486` | `-7.652400420843242` |
| 4 | **Pasar Besar Magetan** | Perdagangan | `111.32960` | `-7.65350` |
| 5 | **Kantor Bupati Magetan** | Pemerintahan | `111.3295206532783` | `-7.656423610239831` |
| 6 | **SMA Negeri 1 Magetan** | Pendidikan | `111.31661` | `-7.65515` |
| 7 | **Telaga Sarangan** | Wisata | `111.21832` | `-7.67776` |

---

## 🚀 Panduan Instalasi & Menjalankan Proyek

Karena proyek ini menggunakan backend PHP dan database MySQL, aplikasi perlu dijalankan melalui local web server (misalnya **XAMPP**, **Laragon**, atau **WampServer**).

### 1. Prasyarat Sistem
- Web server lokal (XAMPP / Laragon dengan Apache & MySQL)
- Web Browser modern (Google Chrome, Mozilla Firefox, Microsoft Edge)
- Code Editor (VS Code, Sublime Text, dll.)

### 2. Langkah Pemasangan

1. **Clone atau Pindahkan Folder Proyek**
   Salin atau clone folder proyek ini ke dalam direktori web server:
   - Jika menggunakan XAMPP:
     ```text
     C:\xampp\htdocs\WebGIS_VisualisasiDataSpasial
     ```
   - Atau buat folder `peta_latihan` sesuai modul tugas:
     ```text
     C:\xampp\htdocs\peta_latihan
     ```

2. **Setup Database MySQL**
   - Buka **XAMPP Control Panel**, lalu klik **Start** pada modul **Apache** dan **MySQL**.
   - Buka browser dan akses phpMyAdmin:
     ```text
     http://localhost/phpmyadmin/
     ```
   - Buat database baru dengan nama `webgis_magetan` (atau impor langsung file `database.sql` melalui tab **Import**).
   - Pastikan tabel `lokasi_fasilitas` telah terisi data.

3. **Konfigurasi Koneksi Database (Opsional)**
   Jika kredensial MySQL lokal Anda menggunakan password atau port yang berbeda, sesuaikan variabel di dalam file [`data.php`](data.php):
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "webgis_magetan";
   ```

4. **Jalankan Aplikasi**
   Buka web browser dan akses URL berikut:
   ```text
   http://localhost/WebGIS_VisualisasiDataSpasial/
   ```
   *(atau `http://localhost/peta_latihan/` jika diletakkan di folder peta_latihan)*

---

## 💡 Cara Penggunaan

1. **Melihat Batas Wilayah**:
   - Area hijau transparan merepresentasikan batas wilayah administratif Magetan.
   - Klik di dalam area poligon hijau untuk menampilkan popup nama wilayah.
2. **Melihat Informasi Fasilitas**:
   - Klik pada titik lingkaran biru untuk melihat rincian nama fasilitas dan kategori.
3. **Navigasi Peta**:
   - Gunakan tombol `+` / `-` pada pojok kiri atas atau scroll mouse untuk memperbesar/memperkecil peta.
   - Drag/geser mouse untuk menjelajahi area sekitarnya.

---

## 📄 Skema Database (`database.sql`)

```sql
CREATE DATABASE IF NOT EXISTS webgis_magetan;
USE webgis_magetan;

CREATE TABLE IF NOT EXISTS lokasi_fasilitas (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    nama    VARCHAR(255) NOT NULL,
    jenis   VARCHAR(100) NOT NULL,
    lon     DOUBLE       NOT NULL,
    lat     DOUBLE       NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

---

## 👨‍💻 Kontributor

- **Pengembang**: Mahasiswa / Praktikan Sistem Informasi Geografis (SIG)
- **Mata Kuliah**: Visualisasi Data Spasial / SIG Berbasis Web

---

## 📜 Lisensi

Proyek ini dibuat untuk keperluan akademik, tugas perkuliahan, dan pembelajaran WebGIS berbasis Leaflet. Bebas digunakan dan dikembangkan untuk keperluan edukasi.
