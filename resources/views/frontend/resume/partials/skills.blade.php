<style>
/* Container Utama */
.resume-container {
    max-width: 1200px;
    margin: 0 auto; /* Menengahkan seluruh konten ke tengah layar */
    padding: 20px;
}

/* Header (TECHNICAL SKILLS) agar ke tengah atau rapi */
.resume-section-header {
    text-align: center; /* Membuat judul ke tengah jika mau, atau hapus jika ingin tetap di kiri */
    margin-bottom: 40px;
}

/* Perbaikan Grid agar tidak menumpuk di kiri */
.skills-grid {
    display: grid;
    /* Membuat kolom otomatis yang membagi ruang kosong */
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
    gap: 30px; /* Jarak antar kartu */
    width: 100%;
}

/* Styling Card agar konten di dalamnya rapi */
.skill-card {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05); /* Shadow halus */
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Konten di dalam card tetap rata kiri */
}

/* Merapikan Tag Skill agar menyebar */
.skill-tags {
    display: flex;
    flex-wrap: wrap; /* Supaya tag pindah baris jika tidak cukup */
    gap: 10px;
    margin-top: 10px;
}

.skill-tag {
    background: #f0f4f8;
    border: 1px solid #d1d9e0;
    padding: 5px 15px;
    border-radius: 50px; /* Bentuk kapsul seperti di gambar */
    font-size: 0.9rem;
    white-space: nowrap;
}
</style>


<section class="resume-section">

  <div class="resume-container" style="position: relative; flex-direction: column; align-items: center;">
    <div class="resume-section-header fade-in-up">
      <div class="section-icon">🚀</div>
      <h2>{{ $section->title ?? 'TECHNICAL SKILLS' }}</h2>
    </div>

    <div class="skills-grid">
      @php
          $skills = is_array($section->content) ? $section->content : json_decode($section->content, true);
          if (!is_array($skills)) $skills = [];
      @endphp

      @foreach($skills as $index => $skillCategory)
      <div class="skill-card fade-in-up stagger-{{ ($index % 4) + 1 }}">
        <div class="skill-icon">
          @if(isset($skillCategory['icon']))
            <i class="bi {{ $skillCategory['icon'] }}"></i>
          @else
            <i class="bi bi-code-slash"></i>
          @endif
        </div>
        <h4 class="skill-category-title">{{ $skillCategory['category'] ?? 'Technical Skills' }}</h4>
        <div class="skill-tags">
          @if(isset($skillCategory['items']) && is_array($skillCategory['items']))
            @foreach($skillCategory['items'] as $skill)
              <span class="skill-tag">{{ $skill }}</span>
            @endforeach
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>