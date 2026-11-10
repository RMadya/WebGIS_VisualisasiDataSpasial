<?php
header("Content-Type: application/geo+json; charset=utf-8");

<<<<<<< HEAD
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_magetan";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Koneksi database gagal."]);
    exit;
}

$sql = "SELECT nama, jenis, lon, lat FROM lokasi";
$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Data lokasi gagal dimuat."]);
    $conn->close();
    exit;
}

$fitur = [];

while ($row = $result->fetch_assoc()) {
    $fitur[] = [
        "type" => "Feature",
        "properties" => [
            "nama"  => $row["nama"],
            "jenis" => $row["jenis"]
        ],
        "geometry" => [
            "type" => "Point",
            "coordinates" => [(float)$row["lon"], (float)$row["lat"]]
=======
// Koneksi ke database MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db   = "webgis_magetan";

$conn = @new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    // Jika database tidak tersedia/gagal koneksi, gunakan data statis
    $lokasi = [
        ["id" => 1, "nama" => "Alun-Alun Magetan",        "jenis" => "Ruang Terbuka",  "lon" => 111.3592, "lat" => -7.6464],
        ["id" => 2, "nama" => "Masjid Agung Magetan",      "jenis" => "Tempat Ibadah",  "lon" => 111.3580, "lat" => -7.6455],
        ["id" => 3, "nama" => "RSUD Dr. Sayidiman",        "jenis" => "Kesehatan",      "lon" => 111.3545, "lat" => -7.6440],
        ["id" => 4, "nama" => "Pasar Besar Magetan",       "jenis" => "Perdagangan",    "lon" => 111.3610, "lat" => -7.6475],
        ["id" => 5, "nama" => "Kantor Bupati Magetan",     "jenis" => "Pemerintahan",   "lon" => 111.3570, "lat" => -7.6490],
        ["id" => 6, "nama" => "SMA Negeri 1 Magetan",      "jenis" => "Pendidikan",     "lon" => 111.3530, "lat" => -7.6510],
        ["id" => 7, "nama" => "Telaga Sarangan",           "jenis" => "Wisata",         "lon" => 111.2275, "lat" => -7.6780]
    ];
} else {
    $lokasi = [];
    $result = $conn->query("SELECT id, nama, jenis, lon, lat FROM lokasi_fasilitas");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $lokasi[] = [
                "id"    => (int)$row["id"],
                "nama"  => $row["nama"],
                "jenis" => $row["jenis"],
                "lon"   => (float)$row["lon"],
                "lat"   => (float)$row["lat"]
            ];
        }
    } else {
        // Fallback jika tabel masih kosong
        $lokasi = [
            ["id" => 1, "nama" => "Alun-Alun Magetan",        "jenis" => "Ruang Terbuka",  "lon" => 111.3592, "lat" => -7.6464],
            ["id" => 2, "nama" => "Masjid Agung Magetan",      "jenis" => "Tempat Ibadah",  "lon" => 111.3580, "lat" => -7.6455],
            ["id" => 3, "nama" => "RSUD Dr. Sayidiman",        "jenis" => "Kesehatan",      "lon" => 111.3545, "lat" => -7.6440],
            ["id" => 4, "nama" => "Pasar Besar Magetan",       "jenis" => "Perdagangan",    "lon" => 111.3610, "lat" => -7.6475],
            ["id" => 5, "nama" => "Kantor Bupati Magetan",     "jenis" => "Pemerintahan",   "lon" => 111.3570, "lat" => -7.6490],
            ["id" => 6, "nama" => "SMA Negeri 1 Magetan",      "jenis" => "Pendidikan",     "lon" => 111.3530, "lat" => -7.6510],
            ["id" => 7, "nama" => "Telaga Sarangan",           "jenis" => "Wisata",         "lon" => 111.2275, "lat" => -7.6780]
        ];
    }
    $conn->close();
}

$fitur = [];
foreach ($lokasi as $baris) {
    $fitur[] = [
        "type" => "Feature",
        "properties" => [
            "nama"  => $baris["nama"],
            "jenis" => $baris["jenis"]
        ],
        "geometry" => [
            "type" => "Point",
            "coordinates" => [$baris["lon"], $baris["lat"]]
>>>>>>> dff6fb6 (add domentation)
        ]
    ];
}

<<<<<<< HEAD
echo json_encode([
    "type" => "FeatureCollection",
    "features" => $fitur
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$conn->close();
=======
$geojson = ["type" => "FeatureCollection", "features" => $fitur];
echo json_encode($geojson);
?>
>>>>>>> dff6fb6 (add domentation)
