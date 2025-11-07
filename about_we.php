<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Team - UMKM Web</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gradient-to-b from-white via-white to-rose-300 min-h-screen text-gray-800">
    <?php include 'includes/navbar.php'; ?>

  <div class="max-w-7xl mx-auto p-6">
    <h2 class="text-3xl font-bold text-center mb-10 text-purple-700">Meet Our Team</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      <!-- 1. Pajar -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Pajar', 'CEO & Developer', 'Kunci utama di proyek ini. Ngerjain struktur utama website dan koordinasi seluruh tim, biar proyek UMKM ini kelar tepat waktu.')">
        <img src="img/ceo.png" alt="Pajar" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Pajar</h3>
        </div>
      </div>

      <!-- 2. Naufal -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Naufal Fauzan Azmi', 'Web QA Tester', 'rajin nyari bug di website ini. Biar user experience-nya makin oke dan bebas masalah saat dipakai UMKM.')">
        <img src="img/naufal.png" alt="Naufal" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Naufal Fauzan Azmi</h3>
        </div>
      </div>

      <!-- 3. Alvin -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('M. Alvin Ramadhan', 'Anggota','Sekedar Anggota.')">
        <img src="img/alvin.png" alt="Alvin" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">M. Alvin Ramadhan</h3>
         
        </div>
      </div>

      <!-- 4. Adi -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Adi Maulana', 'Dokumentasi', 'Penulis laporan dan pembuat dokumentasi sistem. Nyiapin hasil screenshot, flow, dan laporan akhir biar semuanya lengkap.')">
        <img src="img/adi.png" alt="Adi" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Adi Maulana</h3>
          
        </div>
      </div>

      <!-- 5. Devina -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Devina Ayuliani', 'Presentation Designer', 'Pembuat PowerPoint untuk presentasi proyek UMKM. Desain slide-nya clean, estetik, dan nyatu sama tema web.')">
        <img src="img/devpunk.png" alt="Devina" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Devina Ayuliani</h3>
         
        </div>
      </div>

      <!-- 6. Paiton -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Paiton Wenda', 'Anggota', 'Sekedar Anggota.')">
        <img src="img/paiton.png" alt="Paiton" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Paiton Wenda</h3>
          
        </div>
      </div>

      <!-- 7. Brian -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Samsudin T. Sahabat', 'Anggota','Sekedar Anggota.')">
        <img src="img/samsudin.png" alt="Brian" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Samsudin T. Sahabat</h3>
        </div>
      </div>

      <!-- 8. Emily -->
      <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition cursor-pointer" 
           onclick="openModal('Khanaya Salsabila', 'UI/UX Designer', 'Ahli desain antarmuka yang membuat tampilan web ini menarik dan mudah digunakan.')">
        <img src="img/naya.png" alt="naya" class="w-full h-48 object-cover rounded-t-xl">
        <div class="p-6">
          <h3 class="font-semibold text-lg text-gray-800 text-center">Khanaya Salsabila</h3>
        </div>
      </div>

    </div>
  </div>

  <!-- MODAL -->
  <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50">
    <div class="bg-white rounded-xl shadow-lg p-6 w-80 text-center relative animate-fade-in">
      <button onclick="closeModal()" class="absolute top-2 right-3 text-gray-500 hover:text-gray-800 text-lg">&times;</button>
      <h3 id="modalName" class="text-xl font-semibold text-gray-800 mb-2"></h3>
      <p id="modalRole" class="text-purple-600 mb-2"></p>
      <p id="modalDesc" class="text-gray-600 mb-4"></p>
      <button onclick="closeModal()" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Tutup</button>
    </div>
  </div>

  <script>
  function openModal(name, role, desc) {
    document.getElementById('modalName').innerText = name;
    document.getElementById('modalRole').innerText = role;
    document.getElementById('modalDesc').innerText = desc;
    document.getElementById('modal').classList.remove('hidden');
  }
  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
  }
  </script>

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
      animation: fade-in 0.25s ease-in-out;
    }
  </style>
<?php include 'includes/footer.php'; ?>
</body>
</html>
