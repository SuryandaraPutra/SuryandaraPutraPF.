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
            'photo_path' => 'https://drive.google.com/uc?export=view&id=1FIrI8gS64g5Nf1eoMGzlSfodlrtmYUKN',
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
            'title' => 'Volunteer Crew Event',
            'organization' => 'BCA Expoversary',
            'role_type' => 'Volunteer',
            'period' => 'Februari 2026',
            'bullets' => [
                'Memastikan daftar tamu dan registrasi peserta terverifikasi dengan benar',
                'Membantu peserta mengatasi kendala registrasi atau perubahan data',
                'Mengelola alur registrasi dan memastikan kelancaran antrean',
            ],
            'order' => 1,
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
            'order' => 2,
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
            'order' => 3,
        ]);

        // 5. Project Data
        Project::truncate();
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
            'order' => 1,
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
            'order' => 2,
        ]);

        // 6. Skill Data
        Skill::truncate();
        $skills = [
            // Development Tools
            ['name' => 'Laravel', 'category' => 'Development Tools', 'proficiency' => 90, 'icon' => 'code'],
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
