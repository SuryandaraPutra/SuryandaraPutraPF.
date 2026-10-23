<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User for CRUD Management
        User::updateOrCreate(
            ['email' => 'admin@suryandara.com'],
            [
                'name' => 'Suryandara Putra',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Profile Data
        Profile::truncate();
        Profile::create([
            'full_name' => 'SURYANDARA PUTRA',
            'title' => 'Mahasiswa Teknologi Informasi — Semester 7',
            'subtitle' => 'Target Magang: September 2026 | BSI Kampus Margonda (IPK 3.84/4.00)',
            'about_me' => 'Mahasiswa aktif Semester 7 Program Studi Teknologi Informasi di Universitas Bina Sarana Informatika, Kampus Margonda, dengan minat dan kompetensi luas di bidang teknologi informasi. Terbiasa mengelola data dan administrasi secara sistematis, serta memanfaatkan aplikasi perkantoran dan kolaborasi digital dalam mendukung pekerjaan. Memiliki pendekatan kerja yang analitis, komunikatif, dan adaptif, disiplin dalam manajemen waktu, serta berorientasi untuk terus mengembangkan pengetahuan dan keterampilan di lingkungan kerja yang dinamis. Saat ini mencari kesempatan magang pada bulan September untuk menerapkan ilmu yang telah dipelajari di lingkungan profesional.',
            'email' => 'andraalputra21@gmail.com',
            'phone' => '(+62) 857-1028-9368',
            'location' => 'Depok, Jawa Barat',
            'gpa' => '3.84 / 4.00',
            'photo_path' => '/profile-photo.jpg',
            'social_links' => [
                'instagram' => 'https://instagram.com/andr.rwa',
                'github' => 'https://github.com',
                'linkedin' => 'https://linkedin.com',
                'email' => 'mailto:andraalputra21@gmail.com',
                'whatsapp' => 'https://wa.me/6285710289368',
            ],
        ]);

        // 3. Education Data
        Education::truncate();
        Education::create([
            'institution' => 'Universitas Bina Sarana Informatika — Kampus Margonda',
            'degree_major' => 'S1 Teknologi Informasi, Fakultas Teknik dan Informatika',
            'period' => '2023 – Sekarang',
            'score' => 'IPK 3.84 / 4.00',
            'details' => ['Sistem Multimedia', 'Manajemen Proyek Teknologi Informasi', 'Arsitektur Enterprise'],
            'order' => 1,
        ]);
        Education::create([
            'institution' => 'SMKN 1 Depok',
            'degree_major' => 'Multimedia',
            'period' => '2020 – 2023',
            'score' => 'Nilai Rata-rata: 93',
            'details' => ['Desain Grafis', 'Audio Video Editing', 'Animasi & Web Dasar'],
            'order' => 2,
        ]);

        // 4. Experience Data
        Experience::truncate();
        Experience::create([
            'title' => 'Cybersecurity & IoT Intern',
            'organization' => 'Kementerian Pertahanan RI (Pusat Siber dan Intelijen Teknologi Pertahanan)',
            'role_type' => 'Magang',
            'period' => 'Juni – Agustus 2026 (3 Bulan)',
            'bullets' => [
                'Melaksanakan program magang selama 3 bulan di divisi Cybersecurity pada Pusat Siber dan Intelijen Teknologi Pertahanan (Pussiber Kemhan RI)',
                'Merancang dan membangun purwarupa Smart Lock pintu ruang forensik digital berbasis mikrokontroler ESP32 dan RFID RC522 untuk pengamanan akses fisik ruang steril investigasi siber',
                'Mengembangkan sistem otentikasi UID kartu RFID dan kontrol relay solenoid lock 12V dengan waktu respons verifikasi cepat (<2 detik)',
                'Menyusun dokumen analisis sistem berjalan, use case & activity diagram UML, serta laporan teknis pengujian purwarupa perangkat keras',
            ],
            'order' => 1,
        ]);
        Experience::create([
            'title' => 'Volunteer Refreshment (Full Marathon)',
            'organization' => 'BTN Jakarta International Marathon (JAKIM)',
            'role_type' => 'Volunteer',
            'period' => '2026',
            'bullets' => [
                'Melayani dan mendistribusikan kebutuhan refreshment (air mineral, isotonik, buah, spon) untuk ribuan pelari kategori Full Marathon',
                'Menjaga kesiapan, kebersihan, dan kelancaran alur pasokan di stasiun hidrasi (water station) agar peserta tidak terhambat',
                'Memberikan dukungan moril (cheering) serta berkoordinasi cepat dengan tim medis dan relawan lintasan jika terjadi insiden pelari',
            ],
            'order' => 2,
        ]);
        Experience::create([
            'title' => 'Crew Runner (Operasional Event)',
            'organization' => 'Livin by Mandiri',
            'role_type' => 'Event Crew',
            'period' => '2026',
            'bullets' => [
                'Bertanggung jawab dalam mobilitas logistik dan pengantaran perlengkapan operasional acara secara cepat dan sigap di area lintasan/venue',
                'Melakukan koordinasi dinamis antar pos dan race management untuk memastikan seluruh kebutuhan lomba terpenuhi tepat waktu',
                'Membantu penyelesaian kendala teknis dan permintaan darurat perlengkapan di lapangan secara tanggap dan disiplin',
            ],
            'order' => 3,
        ]);
        Experience::create([
            'title' => 'Volunteer Crew Event',
            'organization' => 'BCA Expoversary',
            'role_type' => 'Volunteer',
            'period' => 'Februari 2026',
            'bullets' => [
                'Memastikan daftar tamu dan registrasi peserta terverifikasi dengan benar',
                'Membantu peserta mengatasi kendala registrasi atau perubahan data',
                'Mengelola alur registrasi dan memastikan kelancaran antrean',
            ],
            'order' => 4,
        ]);
        Experience::create([
            'title' => 'Volunteer Saksi Pemilu',
            'organization' => 'Tim Pemenangan Pasangan Calon',
            'role_type' => 'Volunteer',
            'period' => 'Februari 2024',
            'bullets' => [
                'Mengamati dan mencatat hasil suara dengan teliti',
                'Bekerja dalam tim dengan koordinasi yang baik di bawah tekanan waktu',
                'Melatih kemampuan komunikasi, tanggung jawab, dan pengambilan keputusan',
            ],
            'order' => 5,
        ]);
        Experience::create([
            'title' => 'Magang Toko Lareeza Fashion',
            'organization' => 'Konten Kreator',
            'role_type' => 'Magang',
            'period' => 'Maret 2022',
            'bullets' => [
                'Membuat konsep dan ide konten promosi produk',
                'Membantu meningkatkan engagement melalui interaksi media sosial',
                'Berkolaborasi dengan tim menentukan produk unggulan setiap periode',
            ],
            'order' => 6,
        ]);

        // 5. Project Data
        Project::truncate();
        Project::create([
            'title' => 'Purwarupa Smart Lock Pintu Ruang Forensik (ESP32 & RFID)',
            'slug' => 'smart-lock-esp32-rfid-forensik',
            'category' => 'IoT & Cybersecurity',
            'role' => 'IoT & Security Hardware Lead',
            'period' => 'Agustus 2026',
            'summary' => 'Proyek akhir magang di Pusat Siber dan Intelijen Teknologi Pertahanan, Kementerian Pertahanan RI. Merancang purwarupa smart lock pintu ruang forensik digital berbasis mikrokontroler ESP32 dan modul RFID RC522 untuk mengamankan akses fisik ruang investigasi siber dan integritas bukti digital.',
            'problem_statement' => 'Akses konvensional ke ruang forensik digital rentan kehilangan kunci fisik dan tidak memiliki mekanisme pembatasan akses ketat untuk menjaga chain of custody barang bukti digital.',
            'solution' => 'Mengembangkan sistem keamanan akses pintu cerdas berbasis otentikasi UID kartu RFID dengan ESP32 dan relay solenoid lock 12V yang membuka pintu dalam waktu kurang dari 2 detik secara otomatis.',
            'key_features' => [
                'Otentikasi Kartu RFID Cepat & Aman (<2 detik)',
                'Mikrokontroler ESP32 DevKit V1 & Modul RC522',
                'Kontrol Otomatis Relay 5V & Solenoid Door Lock 12V',
                'Perancangan Wiring & Pemodelan UML (Use Case & Activity)',
            ],
            'tech_stack' => ['ESP32', 'RFID RC522', 'C/C++', 'Arduino IDE', 'IoT Security', 'Relay Module', 'Solenoid Lock'],
            'demo_url' => null,
            'github_url' => 'https://github.com/SuryandaraPutra',
            'is_featured' => true,
            'order' => 1,
        ]);

        Project::create([
            'title' => 'Perancangan UI/UX Aplikasi Antrean Berobat (HealthFlow)',
            'slug' => 'healthflow-ui-ux',
            'category' => 'UI/UX & System Architecture',
            'role' => 'Ketua Kelompok',
            'period' => 'Juli 2026',
            'summary' => 'Project mata kuliah Arsitektur Enterprise. Memimpin perencanaan dan pengelolaan timeline proyek, analisis kebutuhan pengguna (user research), serta merancang user flow, wireframe, dan prototype aplikasi antrean berobat HealthFlow.',
            'problem_statement' => 'Antrean berobat di faskes sering kali tidak efisien, membingungkan pasien, dan menyebabkan penumpukan antrean fisik.',
            'solution' => 'Merancang platform antrean digital HealthFlow yang menyajikan estimasi nomor panggil real-time, jadwal dokter, dan antarmuka ramah pengguna.',
            'key_features' => [
                'Perancangan Timeline Proyek & Leadership',
                'User Research & Analysis Kebutuhan',
                'User Flow, Wireframe & Prototype Interactive',
                'Arsitektur Sistem Antrean Real-time',
            ],
            'tech_stack' => ['Figma', 'Canva', 'Arsitektur Enterprise', 'UI/UX Design', 'User Research'],
            'demo_url' => 'https://figma.com',
            'github_url' => 'https://github.com',
            'is_featured' => true,
            'order' => 2,
        ]);

        Project::create([
            'title' => 'Analisis Kepuasan Pengguna Aplikasi E-Commerce (Decision Tree C4.5)',
            'slug' => 'ecommerce-satisfaction-c45',
            'category' => 'Machine Learning & Analytics',
            'role' => 'Ketua Kelompok',
            'period' => 'Oktober 2025',
            'summary' => 'Project mata kuliah Machine Learning. Bertanggung jawab merancang materi dan struktur jurnal penelitian serta mempresentasikan hasil analisis kepuasan pengguna e-commerce menggunakan algoritma C4.5.',
            'problem_statement' => 'Platform e-commerce memerlukan klasifikasi data yang obyektif untuk memahami faktor penentu utama kepuasan belanja pengguna.',
            'solution' => 'Mengembangkan model Machine Learning dengan algoritma Decision Tree (C4.5) untuk mengekstrak pola kepuasan konsumen dari ulasan ulasan aplikasi.',
            'key_features' => [
                'Perancangan & Struktur Jurnal Penelitian',
                'Model Klasifikasi Decision Tree C4.5',
                'Visualisasi Pohon Keputusan & Akurasi',
                'Presentasi Hasil Kepada Audience & Evaluator',
            ],
            'tech_stack' => ['Python', 'Machine Learning', 'Decision Tree C4.5', 'Data Analysis', 'Jurnal Penelitian'],
            'demo_url' => null,
            'github_url' => 'https://github.com',
            'is_featured' => true,
            'order' => 3,
        ]);

        // 6. Skill Data
        Skill::truncate();
        $skills = [
            // Development & Hardware Tools
            ['name' => 'ESP32 & Arduino IDE (IoT Security)', 'category' => 'Development Tools', 'proficiency' => 90, 'icon' => 'cpu'],
            ['name' => 'Laravel & PHP', 'category' => 'Development Tools', 'proficiency' => 90, 'icon' => 'code'],
            ['name' => 'Visual Studio Code', 'category' => 'Development Tools', 'proficiency' => 95, 'icon' => 'terminal'],
            ['name' => 'MySQL Workbench', 'category' => 'Development Tools', 'proficiency' => 88, 'icon' => 'database'],
            ['name' => 'Laragon', 'category' => 'Development Tools', 'proficiency' => 90, 'icon' => 'server'],

            // Office & Digital Productivity
            ['name' => 'Microsoft Word', 'category' => 'Office Productivity', 'proficiency' => 95, 'icon' => 'file-text'],
            ['name' => 'Microsoft Excel', 'category' => 'Office Productivity', 'proficiency' => 92, 'icon' => 'sheet'],
            ['name' => 'Microsoft PowerPoint', 'category' => 'Office Productivity', 'proficiency' => 95, 'icon' => 'presentation'],
            ['name' => 'Google Workspace (Gmail, Meet, Drive, Sheets, Calendar)', 'category' => 'Office Productivity', 'proficiency' => 95, 'icon' => 'cloud'],

            // Design & Editing
            ['name' => 'Canva', 'category' => 'Design & Editing', 'proficiency' => 92, 'icon' => 'palette'],
            ['name' => 'CapCut', 'category' => 'Design & Editing', 'proficiency' => 88, 'icon' => 'video'],
            ['name' => 'Lightroom', 'category' => 'Design & Editing', 'proficiency' => 85, 'icon' => 'image'],
            ['name' => 'PicsArt', 'category' => 'Design & Editing', 'proficiency' => 85, 'icon' => 'aperture'],

            // Soft Skills
            ['name' => 'Kepemimpinan (Leadership)', 'category' => 'Soft Skills', 'proficiency' => 95, 'icon' => 'users'],
            ['name' => 'Kerja Sama Tim (Teamwork)', 'category' => 'Soft Skills', 'proficiency' => 95, 'icon' => 'heart-handshake'],
            ['name' => 'Komunikasi (Communication)', 'category' => 'Soft Skills', 'proficiency' => 90, 'icon' => 'message-square'],
            ['name' => 'Problem Solving', 'category' => 'Soft Skills', 'proficiency' => 92, 'icon' => 'lightbulb'],
        ];

        foreach ($skills as $index => $skill) {
            Skill::create([
                'name' => $skill['name'],
                'category' => $skill['category'],
                'proficiency' => $skill['proficiency'],
                'icon' => $skill['icon'],
                'order' => $index + 1,
            ]);
        }
    }
}
