<section id="resume" class="resume-section">
  <div class="resume-container">
    <div class="resume-section-header fade-in-up">
      <div class="section-icon">💡</div>
      <h2>{{ $section->title ?? 'PROFESSIONAL SUMMARY' }}</h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8 fade-in-up stagger-1">
        <div class="summary-box">
          @php
              $content = is_array($section->content) ? $section->content : json_decode($section->content, true);
          @endphp
          
          @if(is_array($content))
            @foreach($content as $paragraph)
              <p>{!! is_array($paragraph) ? ($paragraph['text'] ?? '') : $paragraph !!}</p>
            @endforeach
          @else
            <p>{!! $section->content !!}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>