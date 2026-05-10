<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResumeSection;

class ResumeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'profile' => [
                'title' => null,
                'content' => json_encode([
                    'name' => 'MUHAMMAD YAHYA ABDULLAHISSALAM',
                    'title' => 'FULLSTACK ENGINEER',
                    'summary' => 'Innovative and deadline-driven Fullstack Engineer with proven experience in designing and implementing scalable systems, managing cloud infrastructure, and developing robust backend solutions using Django, Laravel, and Golang.',
                    'contact_items' => [
                        [
                            'icon' => 'bi-geo-alt',
                            'label' => 'Location',
                            'value' => 'Pamekasan, 69316'
                        ],
                        [
                            'icon' => 'bi-envelope',
                            'label' => 'Email',
                            'value' => 'sajakcodingan@gmail.com'
                        ],
                        [
                            'icon' => 'bi-linkedin',
                            'label' => 'LinkedIn',
                            'value' => '/in/muhammad-yahya-abdullahissalam-083b73327/'
                        ],
                        [
                            'icon' => 'bi-github',
                            'label' => 'Portfolio',
                            'value' => 'github.com/yahya542/'
                        ],
                        [
                            'icon' => 'bi-phone',
                            'label' => 'Phone',
                            'value' => '0851 8464 7793'
                        ]
                    ],
                    'professional_summary' => [
                        'Mahasiswa Teknik Informatika (Semester 5) dengan keahlian <strong>Full Stack</strong> dan fokus kuat pada <strong>Backend Engineering</strong> (Django, Laravel, Golang) serta <strong>Administrasi Infrastruktur (DevOps)</strong>. Terbukti capable menjembatani pengembangan kode dan stabilitas sistem.',
                        'Memiliki pengalaman nyata sebagai <strong>Kontraktor Junior DevOps Kampus</strong> yang bertanggung jawab atas <em>upgrade</em> sistem <em>live</em> dan <em>troubleshooting</em> server VPS Linux, serta berpengalaman sebagai <em>Backend Engineer</em> di proyek kementerian. Mampu mengembangkan solusi <em>mobile</em> menggunakan <strong>React Native</strong> dan berkomitmen pada kolaborasi tim yang efektif.'
                    ]
                ]),
                'order_number' => 1,
                'is_active' => true
            ],
            'experience' => [
                'title' => 'WORK EXPERIENCE',
                'content' => json_encode([
                    [
                        'title' => 'DevOps System Administrator (Kontrak Kampus)',
                        'company' => 'Kontrak Paruh Waktu Kampus (Sedang Berjalan)',
                        'period' => 'Present',
                        'description' => 'Bertanggung jawab sebagai Kontraktor Junior DevOps untuk pemeliharaan dan peningkatan sistem jurnal akademik kampus (OJS) yang berjalan di lingkungan VPS Linux.',
                        'achievements' => [
                            'System Upgrade Kritis: Berhasil melaksanakan migrasi dan <em>upgrade</em> sistem OJS dari versi <strong>3.1 ke versi LTS</strong> yang stabil, termasuk <em>troubleshooting</em> kegagalan <em>database schema</em> dan konflik konfigurasi (<code>config.inc.php</code>).',
                            'Administrasi Server: Memastikan stabilitas server dengan mendiagnosis error, mengelola <em>dependency</em> (Composer), menggunakan Docker untuk isolasi, dan mengatur izin file (<code>chown</code>, <code>chmod</code>).'
                        ]
                    ],
                    [
                        'title' => 'Asisten Penelitian & Backend Engineer',
                        'company' => 'Kementrian Kelautan dan Perikanan (Sedang Berjalan)',
                        'period' => 'Present',
                        'description' => 'Membangun sistem di kementerian perikanan, berfokus pada pengembangan <strong>Backend Django REST API</strong>.',
                        'achievements' => [
                            'Mengembangkan logika pemrograman, fitur CRUD, dan integrasi API untuk mendukung sistem yang terhubung dengan <strong>Machine Learning</strong>.'
                        ]
                    ],
                    [
                        'title' => 'Pengajar Backend (Volunteer)',
                        'company' => 'Komunitas Bareng Saya',
                        'period' => 'April 2025 - Present',
                        'description' => 'Menjadi pengajar backend web secara <em>volunteer</em>, membimbing peserta memahami pengembangan web menggunakan <strong>Django dan Flask</strong>.',
                        'achievements' => [
                            'Materi mencakup <em>routing</em>, <em>views</em>, <em>model</em>, serta pembuatan fitur CRUD berbasis <strong>MVC</strong> dan <strong>REST API</strong> melalui pendekatan praktik langsung.'
                        ]
                    ]
                ]),
                'order_number' => 2,
                'is_active' => true
            ],
            'skills' => [
                'title' => 'TECHNICAL SKILLS',
                'content' => json_encode([
                    [
                        'category' => 'Backend & Frameworks',
                        'icon' => 'bi-code-slash',
                        'items' => ['Django', 'Laravel', 'Golang', 'Flask', 'PHP', 'Django Rest Framework', 'REST API']
                    ],
                    [
                        'category' => 'Database',
                        'icon' => 'bi-database',
                        'items' => ['MySQL', 'Database Management', 'Query Optimization']
                    ],
                    [
                        'category' => 'Frontend/Mobile',
                        'icon' => 'bi-phone',
                        'items' => ['React Native', 'JavaScript', 'HTML', 'CSS', 'Bootstrap']
                    ],
                    [
                        'category' => 'DevOps & Infrastructure',
                        'icon' => 'bi-server',
                        'items' => ['Linux CLI (VPS/Ubuntu)', 'Docker', 'Composer', 'Git & GitHub', 'System Administration', 'Troubleshooting']
                    ]
                ]),
                'order_number' => 3,
                'is_active' => true
            ],
            'education' => [
                'title' => 'EDUCATION',
                'content' => json_encode([
                    [
                        'degree' => 'S1 Informatika',
                        'institution' => 'Universitas Islam Madura',
                        'period' => '2023 - Sekarang (Semester 5)',
                        'description' => 'Currently pursuing a degree in Computer Science with focus on software engineering and system administration. Maintaining strong academic performance while gaining practical experience through projects and internships.'
                    ]
                ]),
                'order_number' => 4,
                'is_active' => true
            ],
            'languages' => [
                'title' => 'LANGUAGES',
                'content' => json_encode([
                    [
                        'language' => 'Indonesian',
                        'level' => 'Native proficiency'
                    ],
                    [
                        'language' => 'English',
                        'level' => 'Intermediate level (reading, writing, basic conversation)'
                    ]
                ]),
                'order_number' => 5,
                'is_active' => true
            ]
        ];

        foreach ($sections as $type => $data) {
            ResumeSection::updateOrCreate(
                ['section_type' => $type],
                [
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'order_number' => $data['order_number'],
                    'is_active' => $data['is_active']
                ]
            );
        }
    }
}
