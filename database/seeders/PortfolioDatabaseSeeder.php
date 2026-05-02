<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Certificate;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            [
                'name' => 'Backend',
                'slug' => 'filter-app',
                'color_code' => '#0077b6',
            ],
            [
                'name' => 'DevOps',
                'slug' => 'filter-product',
                'color_code' => '#F87B1B',
            ],
            [
                'name' => 'Frontend',
                'slug' => 'filter-branding',
                'color_code' => '#FF6B35',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create menu items
        $menus = [
            [
                'name' => 'Home',
                'url' => '/',
                'icon_class' => 'bi-house',
                'order_number' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'About',
                'url' => '/about',
                'icon_class' => 'bi-person',
                'order_number' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Resume',
                'url' => '/resume',
                'icon_class' => 'bi-file-earmark-person',
                'order_number' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Portfolio',
                'url' => '/portfolio',
                'icon_class' => 'bi-grid',
                'order_number' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Certificates',
                'url' => '/certificates',
                'icon_class' => 'bi-award',
                'order_number' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Pricing',
                'url' => '/pricing',
                'icon_class' => 'bi-cash',
                'order_number' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Experience',
                'url' => '#',
                'icon_class' => 'bi-briefcase',
                'order_number' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Cloud & DevOps',
                'url' => '/experience/cloud-devops',
                'parent_id' => 7,
                'order_number' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Backend Engineer',
                'url' => '/experience/backend',
                'parent_id' => 7,
                'order_number' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mentoring',
                'url' => '/experience/mentoring',
                'parent_id' => 7,
                'order_number' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Contact',
                'url' => '/contact',
                'icon_class' => 'bi-envelope',
                'order_number' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }

        // Update parent_id for experience dropdown
        $experienceMenu = Menu::where('name', 'Experience')->first();
        Menu::whereIn('name', ['Cloud & DevOps', 'Backend Engineer', 'Mentoring'])
            ->update(['parent_id' => $experienceMenu->id]);

        // Create portfolio items
        $portfolioItems = [
            [
                'title' => 'Studora (API Integration)',
                'category_id' => 1,
                'image_path' => 'assets/img/portfolio/studora.png',
                'description' => 'Full-stack application with API integration for educational platform',
                'order_number' => 1,
            ],
            [
                'title' => 'Corporate Website',
                'category_id' => 2,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-2.jpg',
                'description' => 'Modern corporate website with responsive design and CMS integration',
                'order_number' => 2,
            ],
            [
                'title' => 'Brand Identity',
                'category_id' => 3,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-3.jpg',
                'description' => 'Complete brand identity package including logo and marketing materials',
                'order_number' => 3,
            ],
            [
                'title' => 'Task Management App',
                'category_id' => 1,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-4.jpg',
                'description' => 'Productivity application for teams with real-time collaboration features',
                'order_number' => 4,
            ],
            [
                'title' => 'Restaurant Website',
                'category_id' => 2,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-5.jpg',
                'description' => 'Interactive restaurant website with online ordering system',
                'order_number' => 5,
            ],
            [
                'title' => 'Mobile App UI',
                'category_id' => 3,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-6.jpg',
                'description' => 'User interface design for a fitness tracking mobile application',
                'order_number' => 6,
            ],
            [
                'title' => 'Finance Dashboard',
                'category_id' => 1,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-7.jpg',
                'description' => 'Data visualization dashboard for financial analytics and reporting',
                'order_number' => 7,
            ],
            [
                'title' => 'E-Learning Platform',
                'category_id' => 2,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-8.jpg',
                'description' => 'Comprehensive online learning platform with course management',
                'order_number' => 8,
            ],
            [
                'title' => 'Social Media Graphics',
                'category_id' => 3,
                'image_path' => 'assets/img/masonry-portfolio/masonry-portfolio-9.jpg',
                'description' => 'Collection of social media graphics and promotional materials',
                'order_number' => 9,
            ],
        ];

        foreach ($portfolioItems as $item) {
            PortfolioItem::create(array_merge($item, [
                'slug' => Str::slug($item['title']),
                'is_featured' => false,
                'is_published' => true,
            ]));
        }

        // Create certificates
        $certificates = [
            [
                'title' => 'Python Programming Fundamentals',
                'description' => 'Certificate of completion for foundational Python programming concepts including data structures, algorithms, and object-oriented programming.',
                'date_obtained' => 'Jan 2024',
                'credential_id' => 'PY2024-001',
                'image_path' => 'assets/img/sertifikat/py.png',
                'order_number' => 1,
            ],
            [
                'title' => 'Full Stack Web Development',
                'description' => 'Advanced certification covering frontend and backend technologies including HTML, CSS, JavaScript, Node.js, and database management.',
                'date_obtained' => 'Mar 2024',
                'credential_id' => 'FS2024-002',
                'image_path' => 'assets/img/sertifikat/py.png',
                'order_number' => 2,
            ],
            [
                'title' => 'Artificial Intelligence Fundamentals',
                'description' => 'Specialized training in machine learning concepts, neural networks, and practical AI implementation using Python frameworks.',
                'date_obtained' => 'May 2024',
                'credential_id' => 'AI2024-003',
                'image_path' => 'assets/img/sertifikat/py.png',
                'order_number' => 3,
            ],
            [
                'title' => 'Cloud Computing Essentials',
                'description' => 'Comprehensive course on cloud infrastructure, deployment strategies, and scalable application architecture on major cloud platforms.',
                'date_obtained' => 'Jul 2024',
                'credential_id' => 'CC2024-004',
                'image_path' => 'assets/img/sertifikat/py.png',
                'order_number' => 4,
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificate::create($certificate);
        }

        // Create admin user
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@portfolio.local',
            'password' => bcrypt('admin123'),
        ]);

        // Create basic pages (placeholders - will be filled by admin)
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'content' => '<h1>Welcome to My Portfolio</h1><p>This is the home page content.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'About',
                'slug' => 'about',
                'content' => '<h1>About Me</h1><p>About page content.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Resume',
                'slug' => 'resume',
                'content' => '<h1>My Resume</h1><p>Resume content.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'content' => '<h1>Services</h1><p>Services content.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Pricing',
                'slug' => 'pricing',
                'content' => '<h1>Pricing</h1><p>Pricing content.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => '<h1>Contact Me</h1><p>Contact content.</p>',
                'is_published' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
