<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak Kami - UMKM Digital Hub</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-white via-blue-100 to-blue-300 text-gray-800">

  <?php include 'includes/navbar.php'; ?>

  <main class="max-w-4xl mx-auto p-6 sm:p-8 mt-6">
    <h1 class="text-3xl sm:text-4xl font-extrabold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400">
      Contact Us
    </h1>
    <p class="text-center text-gray-600 mb-10 font-semibold">
      Ada pertanyaan, masukan, atau ingin berkolaborasi? Kirim pesan ke tim kami lewat form di bawah ini
    </p>

    <section class="bg-white/20 backdrop-blur-md border border-white/30 rounded-2xl shadow-[0_0_25px_rgba(147,197,253,0.3)] p-6 sm:p-10">
      <form action="#" method="POST" class="space-y-6">
        <div>
          <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" required
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder-gray-400">
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Alamat Email</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder-gray-400">
        </div>

        <div>
          <label for="pesan" class="block text-sm font-semibold text-gray-700 mb-1">Pesan</label>
          <textarea id="pesan" name="pesan" rows="5" required
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white/70 placeholder-gray-400"></textarea>
        </div>

        <button type="submit"
          class="w-full py-3 rounded-lg font-bold bg-gradient-to-r from-blue-300 via-purple-400 to-pink-400 text-white
                 hover:shadow-[0_0_25px_rgba(191,219,254,0.6),0_0_40px_rgba(192,132,252,0.4),0_0_60px_rgba(244,114,182,0.4)]
                 transition-all duration-300">
          Kirim Pesan
        </button>
      </form>
    </section>

    <section class="max-w-6xl mx-auto p-6">
  <h2 class="text-2xl font-bold text-center mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400">
    Atau Hubungi Kami Melalui
  </h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="bg-white backdrop-blur-md border border-white/40 rounded-xl p-6 shadow-[0_0_20px_rgba(191,219,254,0.3)] hover:shadow-[0_0_25px_rgba(192,132,252,0.5)] transition-all duration-300">
      <div class="flex items-center justify-center">
      <img src="img/email.gif" alt="icon-email" class="w-10 h-10 mb-2">
    </div>
      <p class="text-gray-700">Hubungi kami melalui email: <a href="mailto:info@umkmdigitalhub.id" class="text-blue-600 hover:underline">info@umkmdigitalhub.id</a></p>
    </div>

    <!-- Card 2 -->
    <div class="bg-white backdrop-blur-md border border-white/40 rounded-xl p-6 shadow-[0_0_20px_rgba(191,219,254,0.3)] hover:shadow-[0_0_25px_rgba(192,132,252,0.5)] transition-all duration-300">
      <div class="flex items-center justify-center">
      <img src="img/call.gif" alt="icon-whatsapp" class="w-10 h-10 mb-2">
    </div>
      <p class="text-gray-700">Hubungi kami melalui WhatsApp: <a href="https://wa.me/6281234567890" class="text-green-600 hover:underline">+6281234567890</a></p>
    </div>

    <!-- Card 3 -->
    <div class="bg-white backdrop-blur-md border border-white/40 rounded-xl p-6 shadow-[0_0_20px_rgba(191,219,254,0.3)] hover:shadow-[0_0_25px_rgba(244,114,182,0.5)] transition-all duration-300">
      <div class="flex items-center justify-center">
        <img src="img/camera.gif" alt="ins-icon" class="w-12 h-11 mb-2">
      </div>
      <p class="text-gray-700">Hubungi kami melalui Instagram: <a href="https://instagram.com/umkmdigitalhub" class="text-pink-600 hover:underline">@umkmdigitalhub</a></p>
    </div>
  </div>
</section>

  </main>

  <?php include 'includes/footer.php'; ?>

</body>
</html>
