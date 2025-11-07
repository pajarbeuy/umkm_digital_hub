<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UMKM Digital Hub</title>
  <link rel="icon" href="img/briefcase.png" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 scroll-smooth">

  <!-- ===== Navbar ===== -->
  <?php include 'includes/navbar.php'; ?>

  <!-- ===== Hero Section ===== -->
 <!-- Hero Section -->
<section class="flex flex-col-reverse md:flex-row items-center justify-between px-6 md:px-16 lg:px-24 py-12 bg-gradatient-to-r from-blue-200 via-purple-400 to-pink-400 min-h-screen">
  <!-- Teks -->
  <div class="md:w-1/2 text-center md:text-left">
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-200 via-purple-400 via-pink-400 mb-4">
      UMKM Digital Hub
    </h1>
    <span class="inline-block bg-blue-100 text-blue-700 text-sm md:text-base font-medium px-4 py-2 rounded-full mb-4">
      Platform Digital untuk UMKM Indonesia
    </span>
    <p class="text-gray-700 font-medium mb-6 text-sm md:text-base">
      Transformasi Digital untuk UMKM Anda. <br />
      <br>
      Bergabunglah dengan berbagai UMKM yang telah berkembang bersama kami. <br />
      Digitalisasi bisnis Anda sekarang dan jangkau pasar yang lebih luas.
    </p>
    <div class="flex flex-col sm:flex-row items-center gap-4 justify-center md:justify-start">
      <a href="daftarkan-ide.php" class="bg-gradient-to-r from-purple-400 to-pink-400 text-white px-5 py-2 rounded-full font-medium shadow-md hover:shadow-lg transition">
        Mulai Daftarkan UMKM Anda
      </a>
      <button id="learn-more" class="border border-purple-400 text-purple-500 px-5 py-2 rounded-full font-medium hover:bg-purple-50 transition">
        Pelajari Lebih Lanjut
      </button>
    </div>
  </div>

  <!-- Gambar -->
  <div class="md:w-1/2 mb-8 md:mb-0 flex justify-center">
    <img
      src="img/clothing-shop.gif"
      alt="UMKM Illustration"
      class="w-64 md:w-80 lg:w-96 object-contain"
    />
  </div>
</section>


  <!-- ===== Section: Mengapa Bergabung (hidden by default) ===== -->
  <section id="benefits" class="hidden opacity-0 transition-all duration-700 px-6 sm:px-12 lg:px-20 py-16 sm:py-24">
    <h3 class="text-center text-lg sm:text-xl font-semibold text-blue-700 mb-2">
      Mengapa Bergabung dengan Kami?
    </h3>
    <p class="text-center text-gray-700 mb-10 text-sm sm:text-base">
      Dapatkan berbagai keuntungan dan kemudahan untuk mengembangkan bisnis UMKM Anda
    </p>

    <!-- Grid Keuntungan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
      <div class="bg-blue-100 rounded-2xl p-6 text-center shadow-sm">
        <div class="flex items-center justify-center mb-2">
          <img src="img/arrow-up.png" alt="icon-grow" class="w-10 h-10">
        </div>
        <h4 class="font-semibold mb-2">Pertumbuhan Bisnis</h4>
        <p class="text-sm text-gray-700">Tingkatkan penjualan hingga 300% dengan digitalisasi</p>
      </div>
      <div class="bg-pink-100 rounded-2xl p-6 text-center shadow-sm">
        <div class="flex items-center justify-center mb-2 mt-1  ">
          <img src="img/earth.png" alt="globe" class="w-10 h-10">
        </div>
        <h4 class="font-semibold mb-2">Jangkauan Lebih Luas</h4>
        <p class="text-sm text-gray-700">Akses ke jutaan pelanggan potensial di seluruh Indonesia</p>
      </div>
      <div class="bg-purple-100 rounded-2xl p-6 text-center shadow-sm">
        <div class="flex items-center justify-center mb-2">
          <img src="img/recovery.png" alt="recovery" class="w-10 h-10">
        </div>
        <h4 class="font-semibold mb-2">Proses Cepat</h4>
        <p class="text-sm text-gray-700">Pendaftaran hanya 5 menit, langsung terdaftar</p>
      </div>
      <div class="bg-cyan-100 rounded-2xl p-6 text-center shadow-sm">
        <div class="flex items-center justify-center mb-2">
          <img src="img/reliability.png" alt="trust" class="w-12 h-12">
        </div>
        <h4 class="font-semibold mb-2">Kredibilitas Terjamin</h4>
        <p class="text-sm text-gray-700">Dapatkan lencana verifikasi untuk UMKM Anda</p>
      </div>
      <div class="bg-rose-100 rounded-2xl p-6 text-center shadow-sm">
        <div class="flex items-center justify-center mb-2 mt-1">
          <img src="img/digital-marketing.png" alt="marketing" class="w-10 h-10 mx-auto mb-2">
        </div>
        <h4 class="font-semibold mb-2">Marketing Gratis</h4>
        <p class="text-sm text-gray-700">Promosi otomatis di platform kami</p>
      </div>
      <div class="bg-green-100 rounded-2xl p-6 text-center shadow-sm">
        <div class="flex items-center justify-center mb-2">
          <img src="img/customer-service.png" alt="custo" class="w-10 h-10">
        </div>
        <h4 class="font-semibold mb-2">Dukungan Penuh</h4>
        <p class="text-sm text-gray-700">Tim support siap membantu 24/7</p>
      </div>
    </div>

    <!-- Cara Mendaftar -->
    <h3 class="text-center text-lg sm:text-xl font-semibold text-blue-700 mb-10">Cara Mendaftar</h3>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
      <div>
        <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center text-white font-bold text-lg mb-2">01</div>
        <h5 class="font-semibold">Daftar</h5>
        <p class="text-xs sm:text-sm text-gray-600">Isi formulir pendaftaran dengan data UMKM Anda</p>
      </div>
      <div>
        <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center text-white font-bold text-lg mb-2">02</div>
        <h5 class="font-semibold">Verifikasi</h5>
        <p class="text-xs sm:text-sm text-gray-600">Tim kami akan memverifikasi data dalam 1x24 jam</p>
      </div>
      <div>
        <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center text-white font-bold text-lg mb-2">03</div>
        <h5 class="font-semibold">Publikasi</h5>
        <p class="text-xs sm:text-sm text-gray-600">UMKM Anda langsung tampil di database kami</p>
      </div>
      <div>
        <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-r from-blue-400 to-pink-400 flex items-center justify-center text-white font-bold text-lg mb-2">04</div>
        <h5 class="font-semibold">Berkembang</h5>
        <p class="text-xs sm:text-sm text-gray-600">Nikmati berbagai manfaat dan fitur eksklusif!</p>
      </div>
    </div>
  </section>

  <script>
    // Scroll reveal effect
    document.getElementById('learn-more').addEventListener('click', () => {
      const section = document.getElementById('benefits');
      section.classList.remove('hidden');
      setTimeout(() => {
        section.classList.remove('opacity-0');
      }, 50);
      section.scrollIntoView({ behavior: 'smooth' });
    });
  </script>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
