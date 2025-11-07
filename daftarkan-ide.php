<?php
// daftar_umkm.php
session_start();
if (!isset($_SESSION['umkm_data'])) $_SESSION['umkm_data'] = [];

// Kategori dan lokasi
$categories = [
  "Kuliner", "Fashion", "Kerajinan", "Jasa Digital", "Pertanian", "Lainnya", "Pariwisata"
];

$locations = json_decode(file_get_contents('nama_kota.json'), true) ?: [];

$error = '';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_umkm = trim($_POST['nama_umkm'] ?? '');
    $owner = trim($_POST['owner'] ?? '');
    $kategori = $_POST['kategori'] ?? '';
    $lokasi = trim($_POST['lokasi'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $kontak = trim($_POST['kontak'] ?? '');

    // Validasi server-side
    if ($nama_umkm === '') {
        $errors['nama_umkm'] = 'Nama UMKM wajib diisi.';
    }
    if ($owner === '') {
        $errors['owner'] = 'Nama pemilik wajib diisi.';
    }
    if ($kategori === '' || !in_array($kategori, $categories, true)) {
        $errors['kategori'] = 'Pilih kategori yang valid.';
    }
    if ($lokasi === '') {
        $errors['lokasi'] = 'Lokasi/kota wajib diisi.';
    }
    if ($kontak === '') {
        $errors['kontak'] = 'Kontak (WA / Email / IG) wajib diisi.';
    }

    if (empty($errors)) {
        $entry = [
            'nama_umkm' => $nama_umkm,
            'owner' => $owner,
            'kategori' => $kategori,
            'lokasi' => $lokasi,
            'deskripsi' => $deskripsi,
            'kontak' => $kontak,
            'waktu' => date('Y-m-d H:i:s')
        ];
        $_SESSION['umkm_data'][] = $entry;
        header('Location: database-ide.php');
        exit;
    } else {
        $error = "Mohon perbaiki isian yang diberi tanda.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftarkan-UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-white via-blue-100 to-blue-300 text-gray-800">
    <?php include 'includes/navbar.php'; ?>
    <div class="container mx-auto p-4 mb-1">
    <h1 class="font-semibold text-2xl text-indigo-500 mb-1 text-center text-blue-500">Daftarkan UMKM Anda</h1>
    <p class="text-center text-sm sm:text-base">Isi Formulir di bawah ini untuk mendafarkan UMKM Anda secara gratis</p>

  </div>
<main class="max-w-4xl mx-auto px-4 sm:px-8 py-8 sm:py-12">
    <section class="bg-sky-50 backdrop-blur-sm border border-gray-500/20 rounded-xl p-6 sm:p-8 mt-8">
      <?php if($error): ?>
        <div class="bg-red-900/40 border border-red-500/30 text-red-300 p-3 rounded mb-6 shadow-neonRed">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form method="POST" class="space-y-5" novalidate>
        <div>
          <label class="block text-sm font-bold text-black mb-2">Nama UMKM</label>
          <input name="nama_umkm" required class="w-full p-3 rounded-lg bg-white border border-gray focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder:text-black" />
          <?php if(isset($errors['nama_umkm'])): ?>
            <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['nama_umkm']) ?></p>
            <?php endif; ?>
        </div>

        <div>
          <label class="block text-sm font-bold text-black mb-2">Pemilik</label>
          <input name="owner" required class="w-full p-3 rounded-lg bg-white border border-gray focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder:text-black" />
          <?php if(isset($errors['owner'])): ?>
            <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['owner']) ?></p>
          <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-bold text-black mb-2">Kategori</label>
            <select name="kategori" class="w-full p-3 rounded-lg bg-white border border-gray focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder:text-black text-black">
              <?php foreach($categories as $c): ?>
                <option class="bg-black text-white"><?= htmlspecialchars($c) ?></option>
              <?php endforeach; ?>
            </select>
            <?php if(isset($errors['kategori'])): ?>
            <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['kategori']) ?></p>
            <?php endif; ?>
          </div>

          <div>
            <label class="block text-sm font-bold text-black-300 mb-2">Lokasi</label>
            <input list="daftar_kota" name="lokasi" placeholder="Cari atau pilih kota..." 
                   class="w-full p-3 rounded-lg bg-white border border-gray focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder:text-black" />
            <datalist id="daftar_kota">
              <?php foreach(array_keys($locations) as $city): ?>
                <option value="<?= htmlspecialchars($city) ?>"></option>
              <?php endforeach; ?>
            </datalist>
            <?php if(isset($errors['lokasi'])): ?>
            <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['lokasi']) ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div>
          <label class="block text-sm font-bold text-black-300 mb-2">Deskripsi Singkat</label>
          <textarea name="deskripsi" rows="4" 
                    class="w-full p-3 rounded-lg bg-white border border-gray focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder:text-black"></textarea>
        </div>

        <div>
          <label class="block text-sm font-bold text-black mb-2">Kontak (WA / Email / IG)</label>
          <input name="kontak" class="w-full p-3 rounded-lg bg-white border border-gray focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder:text-black " />
          <?php if(isset($errors['kontak'])): ?>
            <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['kontak']) ?></p>
          <?php endif; ?>
        </div>

        <div>
          <button type="submit" 
                  class="w-full py-3 rounded-lg font-bold bg-gradient-to-r from-blue-200 via-purple-400 to-pink-400 text-black hover:shadow-[0_0_35px_rgba(191,219,254,0.8),0_0_60px_rgba(192,132,252,0.6),0_0_90px_rgba(244,114,182,0.6)] transition-all duration-300">
            Kirim & Tambah ke Database
          </button>
        </div>
      </form>
    </section>
  </main>
  <?php
include 'includes/footer.php'; ?>
</body>
</html>