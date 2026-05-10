
<section class="resume-section">
  <div class="section-decoration decor-2"></div>
  <div class="resume-container">
    <div class="resume-section-header fade-in-up">
      <div class="section-icon">🎓</div>
      <h2>{{ $section->title ?? 'EDUCATION' }}</h2>
    </div>

    <div class="info-grid">
      @php
          $educations = is_array($section->content) ? $section->content : json_decode($section->content, true);
          if (!is_array($educations)) $educations = [];
      @endphp

      @foreach($educations as $edu)
      <div class="info-card fade-in-up">
        <h3>{{ $edu['degree'] ?? 'Degree' }}</h3>
        <h4>{{ $edu['institution'] ?? 'Institution' }}</h4>
        @if(isset($edu['period']))
        <span class="period">{{ $edu['period'] }}</span>
        @endif
        @if(isset($edu['description']))
        <p>{!! $edu['description'] !!}</p>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>
