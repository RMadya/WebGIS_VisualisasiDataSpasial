const peta = L.map("peta").setView([-7.6464, 111.3592], 12);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(peta);

async function ambilData(url) {
    const respons = await fetch(url);
    if (!respons.ok) {
        throw new Error(`Gagal memuat ${url}: HTTP ${respons.status}`);
    }
    return respons.json();
}

async function muatBatas() {
    const dataBatas = await ambilData("Magetan.geojson");
    const layerBatas = L.geoJSON(dataBatas, {
        style: { color: "#16803a", weight: 2, fillColor: "#22c55e", fillOpacity: 0.12 },
        onEachFeature: (fitur, layer) => {
            const nama = fitur.properties.NAME_2 || fitur.properties.DESA || fitur.properties.name || "Tidak diketahui";
            layer.bindPopup("Kecamatan " + nama);
        }
    }).addTo(peta);

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

    L.geoJSON(dataLokasi, {
        pointToLayer: (fitur, latlng) => {
            return L.circleMarker(latlng, {
                radius: 8, color: "#fff", weight: 2, fillColor: "#2563eb", fillOpacity: 0.9
            });
        },
        onEachFeature: (fitur, layer) => {
            layer.bindPopup(`<b>${fitur.properties.nama}</b><br>${fitur.properties.jenis}`);
        }
    }).addTo(peta);
}

muatBatas().catch((error) => console.error("Gagal memuat batas peta:", error));
muatLokasi().catch((error) => console.error("Gagal memuat titik lokasi:", error));
