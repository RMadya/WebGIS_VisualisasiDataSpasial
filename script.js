<<<<<<< HEAD
=======
// 1. Inisialisasi peta dan basemap (gambar dasar peta) - Pusat Kabupaten Magetan
>>>>>>> dff6fb6 (add domentation)
const peta = L.map("peta").setView([-7.6464, 111.3592], 12);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(peta);

<<<<<<< HEAD
async function ambilData(url) {
    const respons = await fetch(url);
    if (!respons.ok) {
        throw new Error(`Gagal memuat ${url}: HTTP ${respons.status}`);
    }
    return respons.json();
}

=======
// Fungsi untuk mengunduh data JSON dari file lain
async function ambilData(url) {
    const respons = await fetch(url);
    return respons.json();
}

// 2. Fungsi memuat dan menampilkan batas kecamatan (warna hijau)
>>>>>>> dff6fb6 (add domentation)
async function muatBatas() {
    const dataBatas = await ambilData("Magetan.geojson");
    const layerBatas = L.geoJSON(dataBatas, {
        style: { color: "#16803a", weight: 2, fillColor: "#22c55e", fillOpacity: 0.12 },
        onEachFeature: (fitur, layer) => {
<<<<<<< HEAD
=======
            // Memunculkan nama kecamatan saat diklik
>>>>>>> dff6fb6 (add domentation)
            const nama = fitur.properties.NAME_2 || fitur.properties.DESA || fitur.properties.name || "Tidak diketahui";
            layer.bindPopup("Kecamatan " + nama);
        }
    }).addTo(peta);
<<<<<<< HEAD

    peta.fitBounds(layerBatas.getBounds());
}

async function muatLokasi() {
    let dataLokasi;
    try {
        dataLokasi = await ambilData("data.php");
        if (dataLokasi.type !== "FeatureCollection" || !Array.isArray(dataLokasi.features)) {
            throw new Error("Respons data.php bukan GeoJSON FeatureCollection.");
        }
    } catch (error) {
        console.warn("data.php tidak tersedia; menggunakan lokasi.json.", error);
        dataLokasi = await ambilData("lokasi.json");
    }

=======
    
    // Zoom otomatis agar pas dengan batas kecamatan
    peta.fitBounds(layerBatas.getBounds());
}

// 3. Fungsi memuat dan menampilkan titik lokasi dari data.php (titik biru)
async function muatLokasi() {
    const dataLokasi = await ambilData("data.php");
>>>>>>> dff6fb6 (add domentation)
    L.geoJSON(dataLokasi, {
        pointToLayer: (fitur, latlng) => {
            return L.circleMarker(latlng, {
                radius: 8, color: "#fff", weight: 2, fillColor: "#2563eb", fillOpacity: 0.9
            });
        },
        onEachFeature: (fitur, layer) => {
<<<<<<< HEAD
=======
            // Memunculkan nama dan jenis lokasi saat diklik
>>>>>>> dff6fb6 (add domentation)
            layer.bindPopup(`<b>${fitur.properties.nama}</b><br>${fitur.properties.jenis}`);
        }
    }).addTo(peta);
}

<<<<<<< HEAD
muatBatas().catch((error) => console.error("Gagal memuat batas peta:", error));
muatLokasi().catch((error) => console.error("Gagal memuat titik lokasi:", error));
=======
// 4. Jalankan kedua fungsi di atas
muatBatas();
muatLokasi();
>>>>>>> dff6fb6 (add domentation)
