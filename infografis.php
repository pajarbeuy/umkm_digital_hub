<?php
// infografis.php
session_start();
$data = $_SESSION['umkm_data'] ?? [];

// count per kategori
$counts = [];
foreach ($data as $d) {
    $cat = $d['kategori'] ?? 'Lainnya';
    if (!isset($counts[$cat])) $counts[$cat] = 0;
    $counts[$cat]++;
}

// default category supaya chart gak kosong
$defaultCats = ["Kuliner"=>0,"Fashion"=>0,"Kerajinan"=>0,"Jasa Digital"=>0,"Pertanian"=>0,"Lainnya"=>0];
$counts = array_merge($defaultCats, $counts);

// koordinat kota
$cityCoords = json_decode(file_get_contents('nama_kota.json'), true) ?: [];

$markers = [];
foreach ($data as $d) {
    $city = $d['lokasi'] ?? null;
    if ($city && isset($cityCoords[$city])) {
        $markers[] = [
            'nama' => $d['nama_umkm'],
            'city' => $city,
            'lat' => $cityCoords[$city][0],
            'lng' => $cityCoords[$city][1],
            'kategori' => $d['kategori']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infografis UMKM</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen text-gray-800 bg-gradient-to-br from-white via-blue-100 to-blue-300">
  <?php include 'includes/navbar.php'; ?>

  <main class="max-w-7xl mx-auto px-6 sm:px-10 py-10">
    <h1 class="text-3xl sm:text-4xl font-bold text-center mb-10 bg-clip-text text-transparent bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
      Infografis Data UMKM
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Chart Panel -->
      <section class="bg-white/70 backdrop-blur-md border border-blue-200 rounded-2xl shadow-[0_0_20px_rgba(147,197,253,0.4)] hover:shadow-[0_0_35px_rgba(147,197,253,0.6)] transition-all duration-300 p-6">
        <h2 class="text-xl font-semibold mb-4 text-blue-700 text-center">Popularitas Kategori UMKM</h2>
        <div id="chart" style="height:360px;"></div>
      </section>

      <!-- Map Panel -->
      <section class="bg-white/70 backdrop-blur-md border border-purple-200 rounded-2xl shadow-[0_0_20px_rgba(216,180,254,0.4)] hover:shadow-[0_0_35px_rgba(216,180,254,0.6)] transition-all duration-300 p-6">
        <h2 class="text-xl font-semibold mb-4 text-purple-700 text-center">Peta Sebaran UMKM</h2>
        <div id="map" style="height:360px;"></div>
      </section>
    </div>

    <!-- Stats -->
    <section class="max-w-6xl mx-auto p-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white backdrop-blur-md border border-white/40 rounded-xl p-4 sm:p-6 shadow-[0_0_20px_rgba(191,219,254,0.3)] hover:shadow-[0_0_25px_rgba(192,132,252,0.5)] transition-all duration-300">
        <p class="text-blue-700 text-lg font-semibold text-center">Total UMKM Terdaftar: <span class="font-semibold text-pink-600"><?= count($data) ?></span>
      </p>
        <p class="text-gray-700 text-lg text-center">Data akan Terus Update</p>
      </div>

      <div class="bg-white backdrop-blur-md border border-white/40 rounded-xl p-4 sm:p-6 shadow-[0_0_20px_rgba(191,219,254,0.3)] hover:shadow-[0_0_25px_rgba(192,132,252,0.5)] transition-all duration-300">
        <h1 class="text-blue-700 text-lg font-semibold text-center">Kategori Bisnis Utama:</h1>
        <p class="text-gray-700 text-lg text-center">
          6 Kategori Bisnis Utama
        </p>
      </div>

      <div class="bg-white backdrop-blur-md border border-white/40 rounded-xl p-4 sm:p-6 shadow-[0_0_20px_rgba(191,219,254,0.3)] hover:shadow-[0_0_25px_rgba(192,132,252,0.5)] transition-all duration-300">
        <h1 class="text-blue-700 text-lg font-semibold text-center">Cakupan Wilayah:</h1>
        <p class="text-gray-700 text-lg text-center">
          458 Kota dan Kabupaten
        </p>
      </div>

      </div>
    </section>
  </main>

  <?php include 'includes/footer.php'; ?>

  <script>
    // === Highcharts ===
    const seriesData = [
      <?php foreach ($counts as $k => $v): ?>
        { name: <?= json_encode($k) ?>, y: <?= (int)$v ?> },
      <?php endforeach; ?>
    ];

    Highcharts.chart('chart', {
      chart: { type: 'column', backgroundColor: 'transparent' },
      title: { text: 'Jumlah UMKM per Kategori', style: { color: '#1e3a8a', fontWeight: '600' }},
      colors: ['#60a5fa','#a78bfa','#f472b6','#34d399','#fcd34d','#f87171'],
      xAxis: { type: 'category', labels: { style: { color: '#1e40af' }} },
      yAxis: { title: { text: 'Jumlah UMKM' }, labels: { style: { color: '#1e40af' }} },
      legend: { itemStyle: { color: '#1e3a8a' }},
      tooltip: { backgroundColor: '#fff', borderColor: '#a78bfa', borderRadius: 8 },
      series: [{ name: 'UMKM', data: seriesData }],
      credits: { enabled: false }
    });

    // === Leaflet ===
    const map = L.map('map').setView([-6.2, 106.8], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    const markers = <?php echo json_encode($markers); ?>;
    if (markers.length === 0) {
      L.marker([-6.2, 106.816]).addTo(map)
        .bindPopup('Belum ada data UMKM.');
    } else {
      markers.forEach(m => {
        L.marker([m.lat, m.lng])
          .addTo(map)
          .bindPopup(`<strong>${m.nama}</strong><br>${m.city} <br><span class='text-sm text-gray-500'>${m.kategori}</span>`);
      });
      const latlngs = markers.map(m => [m.lat, m.lng]);
      map.fitBounds(latlngs, { padding: [40, 40] });
    }
  </script>
</body>
</html>
