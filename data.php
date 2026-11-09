<?php
header("Content-Type: application/geo+json; charset=utf-8");

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
        ]
    ];
}

echo json_encode([
    "type" => "FeatureCollection",
    "features" => $fitur
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$conn->close();