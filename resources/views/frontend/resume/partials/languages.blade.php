<section class="resume-section">
  <div class="resume-container">
    <div class="resume-section-header fade-in-up">
      <div class="section-icon">🗣️</div>
      <h2>LANGUAGES</h2>
    </div>

    <div class="info-grid">
      <div class="info-card fade-in-up">
        @php
            $languages = is_array($section->content) ? $section->content : json_decode($section->content, true);
            if (!is_array($languages)) $languages = [];
        @endphp

        @foreach($languages as $lang)
        <div class="language-item">
          <span class="lang-name">{{ $lang['language'] ?? '' }}</span>
          <span class="lang-level">{{ $lang['level'] ?? '' }}</span>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
