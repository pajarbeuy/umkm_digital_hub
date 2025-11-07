<?php
// database_umkm.php
session_start();
$data = $_SESSION['umkm_data'] ?? [];
///
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
      unset($_SESSION['umkm_data']);
      header('Location: database-ide.php');
      exit;
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Database UMKM - UMKM Digital Hub</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen text-cyan-300 bg-white">
  
  <?php include 'includes/navbar.php'; ?>

  <main class="max-w-6xl mx-auto p-4 sm:p-6">
    <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6 bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500 ">
      Database UMKM
    </h1>

    <section class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl shadow-[0_0_25px_rgba(147,197,253,0.2)] p-6">
  <?php if(empty($data)): ?>
    <div class="text-center py-10">
      <p class="text-blue-400 mb-4">Belum ada UMKM terdaftar.</p>
      <a href="daftarkan-ide.php" 
         class="inline-block bg-gradient-to-r from-blue-300 via-purple-400 to-pink-400 text-white px-5 py-2 rounded-lg font-bold 
                hover:shadow-[0_0_25px_rgba(191,219,254,0.6),0_0_35px_rgba(192,132,252,0.5),0_0_45px_rgba(244,114,182,0.4)] 
                transition-all duration-300">
        Daftarkan UMKM
      </a>
    </div>
  <?php else: ?>
    <div class="overflow-x-auto rounded-xl shadow-inner shadow-blue-200/30">
      <table id="tabelUMKM" class="w-full text-sm sm:text-base text-gray-800 border-collapse overflow-hidden rounded-xl">
        <thead class="bg-gradient-to-r from-blue-200 via-purple-300 to-pink-300 text-gray-900">
          <tr>
            <th class="p-3 text-left font-semibold">Nama UMKM</th>
            <th class="p-3 text-left font-semibold">Pemilik</th>
            <th class="p-3 text-left font-semibold">Kategori</th>
            <th class="p-3 text-left font-semibold">Lokasi</th>
            <th class="p-3 text-left font-semibold">Kontak</th>
            <th class="p-3 text-left font-semibold">Deskripsi</th>
            <th class="p-3 text-left font-semibold">Waktu Daftar</th>
          </tr>
        </thead>
        <tbody class="bg-white/60 text-gray-900 divide-y divide-blue-100">
          <?php foreach($data as $r): ?>
            <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:via-purple-50 hover:to-pink-50 
                       hover:shadow-[0_0_15px_rgba(147,197,253,0.4)] transition-all duration-300">
              <td class="p-3 font-medium"><?= htmlspecialchars($r['nama_umkm']) ?></td>
              <td class="p-3"><?= htmlspecialchars($r['owner']) ?></td>
              <td class="p-3 text-purple-600 font-semibold"><?= htmlspecialchars($r['kategori']) ?></td>
              <td class="p-3 text-pink-600"><?= htmlspecialchars($r['lokasi'] ?? '-') ?></td>
              <td class="p-3">
                <?php
                $kontak = $r['kontak'] ?? '';
                if (empty($kontak)) {
                    echo '-';
                } else {
                    $kontak = trim($kontak);
                    $link = '#';
                    $display = htmlspecialchars($kontak);
                    $target = '';

                    if (preg_match('/^[\d\s\-\+\(\)]+$/', $kontak)) {
                        $clean = preg_replace('/[^\d]/', '', $kontak);
                        if (substr($clean, 0, 1) === '0') $clean = '62' . substr($clean, 1);
                        elseif (substr($clean, 0, 2) !== '62') $clean = '62' . $clean;
                        $link = 'https://wa.me/' . $clean;
                        $display = '<span class="text-green-500 font-semibold">' . htmlspecialchars($kontak) . '</span>';
                    }
                    elseif (filter_var($kontak, FILTER_VALIDATE_EMAIL)) {
                        $link = 'mailto:' . $kontak;
                        $display = '<span class="text-blue-500 font-semibold">' . htmlspecialchars($kontak) . '</span>';
                    }
                    elseif (preg_match('/^(?:@?)([a-zA-Z0-9._]{3,30})$/', $kontak, $m)) {
                        $link = 'https://instagram.com/' . $m[1];
                        $display = '<span class="text-pink-500 font-semibold">@' . htmlspecialchars($m[1]) . '</span>';
                    }
                    elseif (preg_match('/^https?:\/\//', $kontak)) {
                        $link = $kontak;
                        $display = '<span class="text-cyan-500 font-semibold">' . htmlspecialchars($kontak) . '</span>';
                        $target = ' target="_blank" rel="noopener noreferrer"';
                    }
                    echo $link === '#' ? $display : '<a href="' . htmlspecialchars($link) . '" class="hover:underline" ' . $target . '>' . $display . '</a>';
                }
                ?>
              </td>
              <td class="p-3"><?= nl2br(htmlspecialchars($r['deskripsi'] ?? '-')) ?></td>
              <td class="p-3 text-green-600 font-semibold"><?= htmlspecialchars($r['waktu'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</section>


    <div class="mt-6 flex flex-col sm:flex-row justify-between gap-4">
      <a href="daftarkan-ide.php" class="bg-gradient-to-r from-blue-200 via-purple-400 to-pink-400 text-white px-4 py-2 rounded-lg font-bold hover:shadow-[0_0_25px_rgba(34,197,94,0.5)] transition text-center">
        Tambah UMKM Baru
      </a>

      <form method="POST" action="database-ide.php" onsubmit="return confirm('Hapus semua data UMKM dari sesi ini?')">
        <button name="clear"
                class="bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded-lg font-bold hover:shadow-[0_0_25px_rgba(239,68,68,0.5)] transition w-full sm:w-auto">
          Hapus Semua (Session)
        </button>
      </form>
    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" defer></script>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const table = document.getElementById('tabelUMKM');
      if (table && table.querySelector('tbody').children.length > 0) {
        new simpleDatatables.DataTable(table, {
          searchable: true,
          fixedHeight: false,
          perPage: 5,
          perPageSelect: [5, 10, 20, 50]
        });
      }
    });
  </script>
</body>
<?php include 'includes/footer.php'; ?>
</html>
