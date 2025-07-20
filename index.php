<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perjalanan Wisata - Jelajahi Dunia</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f4f8; /* Warna latar belakang umum */
        }
        header {
            height: 15vh; /* Header 15% */
            background-image: url('https://placehold.co/1200x150/557B83/FFFFFF?text=Perjalanan+Wisata+Header'); /* Placeholder untuk gambar header */
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            position: relative;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4); /* Overlay gelap untuk teks lebih jelas */
            z-index: 1;
        }
        header h1 {
            font-size: 3rem; /* Ukuran font judul */
            font-weight: 700;
            z-index: 2;
        }
        nav {
            height: 7vh; /* Menu link 7% */
            background-color: #394867; /* Warna latar belakang navigasi */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            margin: 15px 25px; /* Margin untuk navigasi */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        nav a {
            color: white;
            padding: 0 1.8rem;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border-radius: 10px;
            height: 100%;
            display: flex;
            align-items: center;
            white-space: nowrap; /* Mencegah teks melipat */
        }
        nav a:hover {
            background-color: #212A3E; /* Warna hover untuk navigasi */
            transform: translateY(-3px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }
        main {
            flex-grow: 1; /* Bagian isi mengisi sisa ruang */
            padding: 25px;
            background-color: #f0f4f8;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .content-section {
            background-color: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
            margin-bottom: 25px;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease-out, transform 0.7s ease-out;
        }
        .content-section.active {
            opacity: 1;
            transform: translateY(0);
        }
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #394867;
            margin-bottom: 25px;
            text-align: center;
            position: relative;
            padding-bottom: 12px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background-color: #9BA4B5;
            border-radius: 3px;
        }
        .bio-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 25px auto;
            border: 5px solid #9BA4B5;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .doc-photo {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 25px 0;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        footer {
            background-color: #212A3E;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            box-shadow: 0 -4px 10px rgba(0,0,0,0.2);
        }

        /* Styling untuk form dan tabel */
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #4A5568;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #CBD5E0;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.2s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #63B3ED;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #4CAF50; /* Green */
            color: white;
        }
        .btn-primary:hover {
            background-color: #45a049;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-secondary {
            background-color: #008CBA; /* Blue */
            color: white;
        }
        .btn-secondary:hover {
            background-color: #007bb5;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-danger {
            background-color: #f44336; /* Red */
            color: white;
        }
        .btn-danger:hover {
            background-color: #da190b;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-warning {
            background-color: #ff9800; /* Orange */
            color: white;
        }
        .btn-warning:hover {
            background-color: #e68a00;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .table-container {
            overflow-x: auto;
            margin-top: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* Pastikan tabel tidak terlalu sempit di layar kecil */
        }
        table thead th {
            background-color: #394867;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #E2E8F0;
            color: #4A5568;
        }
        table tbody tr:nth-child(even) {
            background-color: #F7FAFC;
        }
        table tbody tr:hover {
            background-color: #EDF2F7;
        }
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap; /* Untuk responsivitas tombol */
        }
        .action-buttons .btn {
            padding: 0.5rem 0.8rem;
            font-size: 0.875rem;
        }

        /* Modal Styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
            position: relative;
            animation: fadeIn 0.3s ease-out;
        }
        .close-button {
            color: #aaa;
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .close-button:hover,
        .close-button:focus {
            color: #333;
            text-decoration: none;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }
            nav {
                flex-direction: column;
                height: auto;
                padding: 10px 0;
                margin: 10px;
            }
            nav a {
                width: 100%;
                text-align: center;
                padding: 10px 0;
            }
            main {
                padding: 15px;
            }
            .content-section {
                padding: 25px;
            }
            .section-title {
                font-size: 1.8rem;
            }
            .bio-photo {
                width: 120px;
                height: 120px;
            }
            table thead th, table tbody td {
                padding: 0.75rem;
                font-size: 0.875rem;
            }
            .action-buttons .btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Background Audio -->
    <audio id="background-audio" loop autoplay>
        <!-- Ganti dengan URL musik Anda. Contoh: musik bebas royalti dari Pixabay -->
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
        Browser Anda tidak mendukung elemen audio.
    </audio>

    <header>
        <h1 class="relative z-20">Jelajahi Keindahan Dunia: Portal Perjalanan Wisata</h1>
    </header>

    <nav>
        <a href="#beranda" onclick="showSection('beranda')">Beranda</a>
        <a href="#destinasi" onclick="showSection('destinasi'); fetchDestinasi()">Destinasi</a>
        <a href="#paket-wisata" onclick="showSection('paket-wisata'); fetchPaketWisata()">Paket Wisata</a>
        <a href="#pengguna" onclick="showSection('pengguna'); fetchPengguna()">Pengguna</a>
        <a href="#view-populer" onclick="showSection('view-populer'); fetchViewPaketPopuler()">Paket Populer</a>
        <a href="#biodata" onclick="showSection('biodata')">Biodata</a>
    </nav>

    <main>
        <!-- Bagian Beranda -->
        <section id="beranda" class="content-section active">
            <h2 class="section-title">Selamat Datang di Portal Perjalanan Wisata</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Selamat datang di website kami yang didedikasikan untuk menjelajahi keindahan dunia melalui perjalanan wisata yang tak terlupakan. Di sini, Anda akan menemukan inspirasi, panduan, dan informasi menarik tentang berbagai destinasi menakjubkan.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Apakah Anda seorang petualang sejati, pencari ketenangan, atau penikmat budaya, kami memiliki sesuatu untuk setiap jenis pelancong. Mari kita mulai petualangan Anda!
            </p>
            <img src="https://img.okezone.com/content/2020/09/14/408/2277466/7-destinasi-wisata-di-indonesia-yang-harus-kamu-kunjungi-apa-saja-mtyX3sBGbt.jpg" alt="Pemandangan Indah" class="doc-photo">
            <p class="text-sm text-gray-500 text-center">Gambar: Pemandangan alam yang menenangkan, mengundang untuk dijelajahi.</p>
        </section>

        <!-- Bagian Destinasi -->
        <section id="destinasi" class="content-section hidden">
            <h2 class="section-title">Manajemen Destinasi</h2>
            <button class="btn btn-primary mb-4" onclick="openModal('destinasi', 'add')">Tambah Destinasi Baru</button>

            <div class="table-container">
                <table id="destinasiTable">
                    <thead>
                        <tr>
                            <th>ID Destinasi</th>
                            <th>Nama Destinasi</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Gambar URL</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimuat di sini oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian Paket Wisata -->
        <section id="paket-wisata" class="content-section hidden">
            <h2 class="section-title">Manajemen Paket Wisata</h2>
            <button class="btn btn-primary mb-4" onclick="openModal('paket_wisata', 'add')">Tambah Paket Wisata Baru</button>

            <div class="table-container">
                <table id="paketWisataTable">
                    <thead>
                        <tr>
                            <th>ID Paket</th>
                            <th>Destinasi</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Rating</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimuat di sini oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian Pengguna -->
        <section id="pengguna" class="content-section hidden">
            <h2 class="section-title">Manajemen Pengguna</h2>
            <button class="btn btn-primary mb-4" onclick="openModal('pengguna', 'add')">Tambah Pengguna Baru</button>

            <div class="table-container">
                <table id="penggunaTable">
                    <thead>
                        <tr>
                            <th>ID Pengguna</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimuat di sini oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian View Paket Populer -->
        <section id="view-populer" class="content-section hidden">
            <h2 class="section-title">Paket Wisata Populer (Berdasarkan VIEW)</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Ini adalah tampilan (VIEW) dari database yang menunjukkan paket wisata yang dianggap populer, misalnya berdasarkan rating tinggi. Konsepnya, VIEW ini bisa dihasilkan atau dioptimalkan berdasarkan aturan yang digenerate oleh RapidMiner.
            </p>
            <div class="table-container">
                <table id="viewPaketPopulerTable">
                    <thead>
                        <tr>
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>Destinasi</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Rating</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimuat di sini oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian Biodata Pembuat Web -->
        <section id="biodata" class="content-section hidden">
            <h2 class="section-title">Biodata Pembuat Web</h2>
            <img src="img/kitaprofil.jpg" alt="Foto Diri Anda" class="bio-photo">
            <p class="text-gray-700 text-center mb-2">
                <strong>Nama:</strong> Candra Ardiansah
            </p>
            <p class="text-gray-700 text-center mb-4">
                <strong>NIM:</strong> 2306700002
            </p>
            <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Sejarah / Point of View Topik "Perjalanan Wisata"</h3>
            <p class="text-gray-700 leading-relaxed mb-4">
                Bagi saya, perjalanan wisata bukan hanya tentang mengunjungi tempat baru, tetapi juga tentang pengalaman, pembelajaran, dan pertumbuhan pribadi. Setiap perjalanan membuka mata kita pada budaya yang berbeda, pemandangan yang menakjubkan, dan koneksi baru dengan orang-orang dari berbagai latar belakang. Ini adalah investasi dalam diri sendiri, memberikan perspektif baru dan kenangan yang tak ternilai.
            </p>
            <p class="text-gray-700 leading-relaxed mb-4">
                Saya percaya bahwa setiap orang berhak merasakan kegembiraan dan pencerahan yang ditawarkan oleh perjalanan. Website ini dibuat dengan tujuan untuk menginspirasi dan memfasilitasi Anda dalam merencanakan petualangan Anda berikutnya, menjadikan setiap langkah perjalanan Anda lebih mudah dan berkesan.
            </p>
            <img src="https://tse1.mm.bing.net/th/id/OIP.kVAkECXdf-5Bclajs_0cogHaEH?w=290&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Foto Dokumentasi Perjalanan" class="doc-photo">
            <p class="text-sm text-gray-500 text-center">Gambar: Foto dokumentasi yang relevan dengan pengalaman perjalanan Anda.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Perjalanan Wisata. Dibuat oleh [Nama Lengkap Anda].</p>
    </footer>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteConfirmModal" class="modal hidden">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal('deleteConfirmModal')">&times;</span>
            <h3 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Penghapusan</h3>
            <p class="mb-6">Apakah Anda yakin ingin menghapus data ini secara permanen?</p>
            <div class="flex justify-center gap-4">
                <button class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                <button class="btn btn-secondary" onclick="closeModal('deleteConfirmModal')">Batal</button>
            </div>
        </div>
    </div>

    <!-- Modal Form Dinamis (Tambah/Edit) -->
    <div id="dataFormModal" class="modal hidden">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal('dataFormModal')">&times;</span>
            <h3 class="text-xl font-bold text-gray-800 mb-4" id="modalTitle"></h3>
            <form id="dynamicForm" class="text-left">
                <!-- Form fields akan dimuat di sini oleh JavaScript -->
            </form>
            <div class="flex justify-end gap-4 mt-6">
                <button class="btn btn-primary" id="submitFormBtn">Simpan</button>
                <button class="btn btn-secondary" onclick="closeModal('dataFormModal')">Batal</button>
            </div>
        </div>
    </div>

    <script>
        // Variabel global untuk menyimpan data yang sedang diedit/dihapus
        let currentTable = '';
        let currentRecordId = '';
        let currentAction = ''; // 'add' or 'edit'

        // Fungsi untuk menampilkan bagian konten yang dipilih
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
                section.classList.add('hidden');
            });
            const activeSection = document.getElementById(sectionId);
            if (activeSection) {
                activeSection.classList.remove('hidden');
                activeSection.classList.add('active');
            }
        }

        // Fungsi untuk memutar audio saat halaman dimuat
        window.addEventListener('load', () => {
            const audio = document.getElementById('background-audio');
            const playPromise = audio.play();
            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    // Autoplay berhasil
                })
                .catch(error => {
                    console.log("Autoplay audio diblokir. Pengguna perlu berinteraksi untuk memutar.");
                    // Anda bisa menambahkan tombol "putar musik" di UI jika autoplay diblokir
                });
            }

            // Tampilkan section 'beranda' secara default saat halaman dimuat
            showSection('beranda');
        });

        // Fungsi untuk menampilkan pesan (menggantikan alert)
        function showMessage(message, type = 'info') {
            // Anda bisa membuat modal atau div notifikasi kustom di sini
            // Untuk sementara, kita akan menggunakan console.log dan simulasi alert
            console.log(`Pesan ${type.toUpperCase()}: ${message}`);
            alert(message); // Menggunakan alert sementara untuk demonstrasi
        }

        // --- Fungsi Modal ---
        function openModal(table, action, id = null) {
            const modal = document.getElementById('dataFormModal');
            const modalTitle = document.getElementById('modalTitle');
            const dynamicForm = document.getElementById('dynamicForm');
            currentTable = table;
            currentAction = action;
            currentRecordId = id;

            dynamicForm.innerHTML = ''; // Bersihkan form sebelumnya

            let fields = [];
            let titleText = '';

            if (table === 'destinasi') {
                titleText = (action === 'add' ? 'Tambah' : 'Edit') + ' Destinasi';
                fields = [
                    { id: 'id_destinasi', label: 'ID Destinasi', type: 'text', required: true, readonly: (action === 'edit') },
                    { id: 'nama_destinasi', label: 'Nama Destinasi', type: 'text', required: true },
                    { id: 'lokasi', label: 'Lokasi', type: 'text', required: true },
                    { id: 'deskripsi', label: 'Deskripsi', type: 'textarea', required: false },
                    { id: 'gambar_url', label: 'URL Gambar', type: 'text', required: false, placeholder: 'Contoh: https://example.com/gambar.jpg' }
                ];
            } else if (table === 'pengguna') {
                titleText = (action === 'add' ? 'Tambah' : 'Edit') + ' Pengguna';
                fields = [
                    { id: 'id_pengguna', label: 'ID Pengguna', type: 'text', required: true, readonly: (action === 'edit') },
                    { id: 'nama_pengguna', label: 'Nama Pengguna', type: 'text', required: true },
                    { id: 'email', label: 'Email', type: 'email', required: true },
                    { id: 'telepon', label: 'Nomor Telepon', type: 'text', required: false },
                    { id: 'alamat', label: 'Alamat', type: 'textarea', required: false }
                ];
            } else if (table === 'paket_wisata') {
                titleText = (action === 'add' ? 'Tambah' : 'Edit') + ' Paket Wisata';
                fields = [
                    { id: 'id_paket', label: 'ID Paket', type: 'text', required: true, readonly: (action === 'edit') },
                    { id: 'id_destinasi', label: 'ID Destinasi', type: 'text', required: true, placeholder: 'Contoh: D001' }, // Akan lebih baik jika ini dropdown dari data destinasi
                    { id: 'nama_paket', label: 'Nama Paket', type: 'text', required: true },
                    { id: 'harga', label: 'Harga', type: 'number', required: true, min: 0 },
                    { id: 'durasi', label: 'Durasi', type: 'text', required: false, placeholder: 'Contoh: 3 Hari 2 Malam' },
                    { id: 'rating', label: 'Rating (1-5)', type: 'number', required: true, min: 1, max: 5 },
                    { id: 'deskripsi_paket', label: 'Deskripsi Paket', type: 'textarea', required: false }
                ];
            }

            modalTitle.textContent = titleText;

            fields.forEach(field => {
                const div = document.createElement('div');
                div.className = 'form-group';

                const label = document.createElement('label');
                label.setAttribute('for', field.id);
                label.textContent = field.label + (field.required ? ' *' : '');
                div.appendChild(label);

                let input;
                if (field.type === 'textarea') {
                    input = document.createElement('textarea');
                    input.rows = 3;
                } else if (field.type === 'number') {
                    input = document.createElement('input');
                    input.type = 'number';
                    if (field.min !== undefined) input.min = field.min;
                    if (field.max !== undefined) input.max = field.max;
                } else {
                    input = document.createElement('input');
                    input.type = field.type;
                }
                input.id = field.id;
                input.name = field.id;
                input.required = field.required;
                if (field.readonly) input.readOnly = true;
                if (field.placeholder) input.placeholder = field.placeholder;
                div.appendChild(input);

                dynamicForm.appendChild(div);
            });

            if (action === 'edit' && id) {
                // Ambil data untuk diisi ke form
                fetchDataById(table, id);
            }
            modal.style.display = 'flex'; // Tampilkan modal
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Event listener untuk tombol submit form di modal
        document.getElementById('submitFormBtn').addEventListener('click', async () => {
            const form = document.getElementById('dynamicForm');
            const formData = new FormData(form);
            formData.append('action', (currentAction === 'add' ? 'add_' : 'update_') + currentTable);

            if (currentAction === 'edit') {
                // Pastikan ID record yang diedit juga dikirim
                if (currentTable === 'destinasi') formData.append('id_destinasi', currentRecordId);
                else if (currentTable === 'pengguna') formData.append('id_pengguna', currentRecordId);
                else if (currentTable === 'paket_wisata') formData.append('id_paket', currentRecordId);
            }

            try {
                const response = await fetch('api.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.status === 'success') {
                    showMessage(result.message, 'success');
                    closeModal('dataFormModal');
                    // Refresh tabel setelah operasi berhasil
                    if (currentTable === 'destinasi') fetchDestinasi();
                    else if (currentTable === 'pengguna') fetchPengguna();
                    else if (currentTable === 'paket_wisata') fetchPaketWisata();
                } else {
                    showMessage(result.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('Terjadi kesalahan saat berkomunikasi dengan server.', 'error');
            }
        });

        // Fungsi untuk mengambil data berdasarkan ID (untuk mode edit)
        async function fetchDataById(table, id) {
            const formData = new FormData();
            formData.append('action', 'get_' + table + '_by_id');
            if (table === 'destinasi') formData.append('id_destinasi', id);
            else if (table === 'pengguna') formData.append('id_pengguna', id);
            else if (table === 'paket_wisata') formData.append('id_paket', id);

            try {
                const response = await fetch('api.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.status === 'success' && result.data) {
                    // Isi form dengan data yang diambil
                    for (const key in result.data) {
                        const inputField = document.getElementById(key);
                        if (inputField) {
                            inputField.value = result.data[key];
                        }
                    }
                } else {
                    showMessage(result.message, 'error');
                }
            } catch (error) {
                console.error('Error fetching data by ID:', error);
                showMessage('Gagal mengambil data untuk edit.', 'error');
            }
        }

        // --- Fungsi Fetch Data dan Render Tabel ---

        async function fetchData(action, tableId, renderFunction) {
            const formData = new FormData();
            formData.append('action', action);

            try {
                const response = await fetch('api.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.status === 'success') {
                    renderFunction(result.data, tableId);
                } else {
                    showMessage(result.message, 'error');
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                showMessage('Terjadi kesalahan saat mengambil data.', 'error');
            }
        }

        // Render Destinasi
        function renderDestinasiTable(data, tableId) {
            const tableBody = document.querySelector(`#${tableId} tbody`);
            tableBody.innerHTML = ''; // Bersihkan tabel
            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="6" class="text-center py-4">Tidak ada data destinasi.</td></tr>`;
                return;
            }
            data.forEach(item => {
                const row = `
                    <tr>
                        <td>${item.id_destinasi}</td>
                        <td>${item.nama_destinasi}</td>
                        <td>${item.lokasi}</td>
                        <td>${item.deskripsi ? item.deskripsi.substring(0, 50) + '...' : '-'}</td>
                        <td><a href="${item.gambar_url}" target="_blank" class="text-blue-500 hover:underline">${item.gambar_url ? 'Lihat Gambar' : '-'}</a></td>
                        <td class="action-buttons">
                            <button class="btn btn-warning" onclick="openModal('destinasi', 'edit', '${item.id_destinasi}')">Edit</button>
                            <button class="btn btn-danger" onclick="confirmDelete('destinasi', '${item.id_destinasi}')">Hapus</button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        async function fetchDestinasi() {
            await fetchData('get_destinasi', 'destinasiTable', renderDestinasiTable);
        }

        // Render Pengguna
        function renderPenggunaTable(data, tableId) {
            const tableBody = document.querySelector(`#${tableId} tbody`);
            tableBody.innerHTML = '';
            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="6" class="text-center py-4">Tidak ada data pengguna.</td></tr>`;
                return;
            }
            data.forEach(item => {
                const row = `
                    <tr>
                        <td>${item.id_pengguna}</td>
                        <td>${item.nama_pengguna}</td>
                        <td>${item.email}</td>
                        <td>${item.telepon || '-'}</td>
                        <td>${item.alamat ? item.alamat.substring(0, 50) + '...' : '-'}</td>
                        <td class="action-buttons">
                            <button class="btn btn-warning" onclick="openModal('pengguna', 'edit', '${item.id_pengguna}')">Edit</button>
                            <button class="btn btn-danger" onclick="confirmDelete('pengguna', '${item.id_pengguna}')">Hapus</button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        async function fetchPengguna() {
            await fetchData('get_pengguna', 'penggunaTable', renderPenggunaTable);
        }

        // Render Paket Wisata
        function renderPaketWisataTable(data, tableId) {
            const tableBody = document.querySelector(`#${tableId} tbody`);
            tableBody.innerHTML = '';
            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="8" class="text-center py-4">Tidak ada data paket wisata.</td></tr>`;
                return;
            }
            data.forEach(item => {
                const row = `
                    <tr>
                        <td>${item.id_paket}</td>
                        <td>${item.nama_destinasi || item.id_destinasi}</td>
                        <td>${item.nama_paket}</td>
                        <td>Rp ${parseFloat(item.harga).toLocaleString('id-ID')}</td>
                        <td>${item.durasi || '-'}</td>
                        <td>${item.rating} <span class="text-yellow-500">&#9733;</span></td>
                        <td>${item.deskripsi_paket ? item.deskripsi_paket.substring(0, 50) + '...' : '-'}</td>
                        <td class="action-buttons">
                            <button class="btn btn-warning" onclick="openModal('paket_wisata', 'edit', '${item.id_paket}')">Edit</button>
                            <button class="btn btn-danger" onclick="confirmDelete('paket_wisata', '${item.id_paket}')">Hapus</button>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        async function fetchPaketWisata() {
            await fetchData('get_paket_wisata', 'paketWisataTable', renderPaketWisataTable);
        }

        // Render View Paket Populer
        function renderViewPaketPopulerTable(data, tableId) {
            const tableBody = document.querySelector(`#${tableId} tbody`);
            tableBody.innerHTML = '';
            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="7" class="text-center py-4">Tidak ada data paket populer.</td></tr>`;
                return;
            }
            data.forEach(item => {
                const row = `
                    <tr>
                        <td>${item.id_paket}</td>
                        <td>${item.nama_paket}</td>
                        <td>${item.nama_destinasi}</td>
                        <td>Rp ${parseFloat(item.harga).toLocaleString('id-ID')}</td>
                        <td>${item.durasi || '-'}</td>
                        <td>${item.rating} <span class="text-yellow-500">&#9733;</span></td>
                        <td>${item.lokasi}</td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        async function fetchViewPaketPopuler() {
            await fetchData('get_view_paket_populer', 'viewPaketPopulerTable', renderViewPaketPopulerTable);
        }

        // --- Fungsi Hapus ---
        function confirmDelete(table, id) {
            currentTable = table;
            currentRecordId = id;
            document.getElementById('deleteConfirmModal').style.display = 'flex';
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', async () => {
            const formData = new FormData();
            formData.append('action', 'delete_' + currentTable);
            if (currentTable === 'destinasi') formData.append('id_destinasi', currentRecordId);
            else if (currentTable === 'pengguna') formData.append('id_pengguna', currentRecordId);
            else if (currentTable === 'paket_wisata') formData.append('id_paket', currentRecordId);

            try {
                const response = await fetch('api.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                if (result.status === 'success') {
                    showMessage(result.message, 'success');
                    closeModal('deleteConfirmModal');
                    // Refresh tabel setelah penghapusan
                    if (currentTable === 'destinasi') fetchDestinasi();
                    else if (currentTable === 'pengguna') fetchPengguna();
                    else if (currentTable === 'paket_wisata') fetchPaketWisata();
                } else {
                    showMessage(result.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('Terjadi kesalahan saat menghapus data.', 'error');
            }
        });
    </script>
</body>
</html>
