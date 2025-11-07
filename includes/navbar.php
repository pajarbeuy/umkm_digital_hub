<?php
// includes/navbar.php
?>
<header class="bg-white border-b border-gray-200 shadow-sm">
  <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Main Navigation">
    <div class="flex items-center justify-between h-16">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="index.php" class="text-base sm:text-lg md:text-xl font-bold text-gray-800 hover:text-purple-600">
          UMKM Digital Hub
        </a>
      </div>

      <!-- Menu Desktop & Tablet -->
      <div class="hidden md:flex items-center space-x-4 sm:space-x-6 md:space-x-8">
        <a href="index.php" class="text-gray-700 hover:text-purple-600 font-medium text-sm sm:text-base transition">Beranda</a>
        <a href="infografis.php" class="text-gray-700 hover:text-purple-600 font-medium text-sm sm:text-base transition">Infografis</a>
        <a href="database-ide.php" class="text-gray-700 hover:text-purple-600 font-medium text-sm sm:text-base transition">Database UMKM</a>
        <a href="kontak.php" class="text-gray-700 hover:text-purple-600 font-medium text-sm sm:text-base transition">Kontak</a>
        <a href="about_we.php" class="text-gray-700 hover:text-purple-600 font-medium text-sm sm:text-base transition">Tentang Kami</a>

        <a href="daftarkan-ide.php"
          class="ml-2 sm:ml-4 bg-gradient-to-r from-blue-200 via-purple-400 to-pink-400 text-white px-3 sm:px-4 py-2 rounded-full font-semibold text-sm sm:text-base shadow-sm hover:shadow-[0_0_35px_rgba(191,219,254,0.8),0_0_60px_rgba(192,132,252,0.6),0_0_90px_rgba(244,114,182,0.6)] transition-all duration-300">
          Daftarkan UMKM
        </a>
      </div>

      <!-- Hamburger Menu (Mobile Only) -->
      <div class="md:hidden flex items-center">
        <button id="nav-toggle" aria-expanded="false" aria-controls="nav-menu"
          class="p-2 rounded-md text-gray-700 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-300">
          <svg id="icon-open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="icon-close" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div id="nav-menu" class="md:hidden hidden pt-2 pb-3 space-y-1">
      <a href="index.php" class="block px-3 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-md font-medium text-sm">Beranda</a>
      <a href="infografis.php" class="block px-3 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-md font-medium text-sm">Infografis</a>
      <a href="database_umkm.php" class="block px-3 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-md font-medium text-sm">Database UMKM</a>
      <a href="kontak.php" class="block px-3 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-md font-medium text-sm">Kontak</a>
      <a href="about_we.php" class="block px-3 py-2 text-gray-700 hover:bg-purple-50 hover:text-purple-600 rounded-md font-medium text-sm">Tentang Kami</a>
      <a href="daftarkan-ide.php"
        class="block px-3 py-2 text-white font-semibold bg-gradient-to-r from-purple-400 to-pink-400 rounded-full text-center mt-2 hover:opacity-90 text-sm">
        Daftarkan UMKM
      </a>
    </div>
  </nav>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('nav-toggle');
    const menu = document.getElementById('nav-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    toggle.addEventListener('click', function () {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!expanded));
      menu.classList.toggle('hidden');
      iconOpen.classList.toggle('hidden');
      iconClose.classList.toggle('hidden');
    });
  });
</script>
