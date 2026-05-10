@extends('layouts.app')

@section('title', 'Portfolio - Muhammad Yahya | Creative Projects')
@section('meta_description', 'Explore my portfolio of innovative projects in backend development, DevOps, and fullstack applications.')
@section('body_class', 'portfolio-page')

@section('styles')
<style>
  .portfolio-hero {
    padding: 140px 20px 80px;
    background: linear-gradient(135deg, #FFFFFF 0%, #E3F2FD 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  .portfolio-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2387CEEB' fill-opacity='0.08'%3E%3Cpath d='M40 0l40 40-40 40L0 40z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }
  
  .portfolio-hero h1 {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    background: linear-gradient(135deg, #1a1a1a, #444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
  }
  
  .portfolio-hero p {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto 2rem;
  }
  
  .portfolio-filters {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0.8rem;
    margin-bottom: 3rem;
  }
  
  .filter-btn {
    padding: 0.7rem 1.5rem;
    background: white;
    border: 2px solid #E3F2FD;
    color: #87CEEB;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .filter-btn:hover,
  .filter-btn.active {
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    color: white;
    border-color: transparent;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(135,206,235,0.3);
  }
  
  .bento-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
  }
  
  .project-card {
    position: relative;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 25px 70px rgba(135,206,235,0.15);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    cursor: pointer;
    group: project;
  }
  
  .project-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(135,206,235,0.9) 0%, rgba(255,215,0,0.8) 100%);
    opacity: 0;
    z-index: 1;
    transition: opacity 0.5s ease;
  }
  
  .project-card:hover::before {
    opacity: 1;
  }
  
  .project-card:hover {
    transform: translateY(-20px) scale(1.02) rotate(1deg);
    box-shadow: 0 40px 100px rgba(135,206,235,0.3);
  }
  
  .project-img-wrapper {
    position: relative;
    overflow: hidden;
    height: 280px;
  }
  
  .project-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
  }
  
  .project-card:hover .project-img {
    transform: scale(1.15) rotate(2deg);
  }
  
  .project-category {
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 0.5rem 1.2rem;
    background: rgba(255, 255, 255, 0.95);
    color: #87CEEB;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 2;
    backdrop-filter: blur(10px);
    transition: all 0.4s ease;
  }
  
  .project-card:hover .project-category {
    background: #1a1a1a;
    color: white;
    transform: translateY(-5px);
  }
  
  .project-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2rem;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
    color: white;
    transform: translateY(30px);
    opacity: 0;
    transition: all 0.5s ease;
    z-index: 2;
  }
  
  .project-card:hover .project-content {
    transform: translateY(0);
    opacity: 1;
  }
  
  .project-title {
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
  }
  
  .project-desc {
    font-size: 0.95rem;
    opacity: 0.9;
    line-height: 1.5;
    margin-bottom: 1rem;
  }
  
  .project-tags {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }
  
  .project-tag {
    padding: 0.3rem 0.8rem;
    background: rgba(255,255,255,0.2);
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    backdrop-filter: blur(5px);
  }
  
  .project-link {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #87CEEB;
    font-size: 1.5rem;
    z-index: 3;
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
  }
  
  .project-card:hover .project-link {
    transform: translate(-50%, -50%) scale(1);
  }
  
  .project-link:hover {
    background: #FFD700;
    color: #1a1a1a;
    transform: translate(-50%, -50%) scale(1.1) rotate(90deg);
  }
  
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(135,206,235,0.1);
  }
  
  .empty-state i {
    font-size: 4rem;
    color: #87CEEB;
    margin-bottom: 1rem;
  }
  
  .empty-state h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }
  
  .empty-state p {
    color: #666;
  }
  
  @media (max-width: 768px) {
    .portfolio-hero {
      padding: 100px 15px 60px;
    }
    
    .bento-grid {
      grid-template-columns: 1fr;
    }
    
    .project-card:hover {
      transform: translateY(-10px) scale(1) rotate(0);
    }
  }
</style>
@endsection

@section('content')
<section class="portfolio-hero">
  <div class="container">
    <h1>My Portfolio</h1>
    <p>A collection of projects that showcase my passion for building scalable, efficient, and elegant solutions.</p>
    
    <div class="portfolio-filters">
      <button class="filter-btn active" data-filter="*">All Projects</button>
      @foreach($categories as $category)
        <button class="filter-btn" data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</button>
      @endforeach
    </div>
  </div>
</section>

<section id="portfolio" style="padding: 60px 20px; background: white;">
  <div class="container">
    @if($portfolioItems->count() > 0)
    <div class="bento-grid">
      @foreach($portfolioItems as $item)
      <div class="project-card filter-{{ $item->category->slug ?? 'uncategorized' }} fade-in-up"
           style="border-radius: 28px; overflow: hidden;">
        <div class="project-img-wrapper">
          <span class="project-category">{{ $item->category->name ?? 'Project' }}</span>
          <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" class="project-img">
          <a href="{{ asset($item->image_path) }}" class="glightbox project-link" title="{{ $item->title }}">
            <i class="bi bi-zoom-in"></i>
          </a>
        </div>
        <div class="project-content">
          <h3 class="project-title">{{ $item->title }}</h3>
          <p class="project-desc">{{ Str::limit($item->description, 100) }}</p>
          <div class="project-tags">
            @if($item->category)
              <span class="project-tag">{{ $item->category->name }}</span>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="empty-state fade-in-up">
      <i class="bi bi-folder-x"></i>
      <h3>No Projects Yet</h3>
      <p>Check back soon for exciting new projects!</p>
    </div>
    @endif
  </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Portfolio filter (simple version)
  const filterBtns = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');
  
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Update active state
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      const filter = this.getAttribute('data-filter');
      projectCards.forEach(card => {
        if (filter === '*' || card.classList.contains(filter.replace('.', ''))) {
          card.style.display = 'block';
          card.style.animation = 'fadeInUp 0.6s ease forwards';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
</script>
@endsection
