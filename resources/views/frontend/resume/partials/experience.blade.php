<!-- Experience Timeline -->
<section class="resume-section">
  <div class="resume-container">
    <div class="resume-section-header fade-in-up">
      <div class="section-icon">💼</div>
      <h2>{{ $section->title ?? 'WORK EXPERIENCE' }}</h2>
    </div>

    <div class="timeline">
      @php
          $experiences = is_array($section->content) ? $section->content : json_decode($section->content, true);
          if (!is_array($experiences)) $experiences = [];
      @endphp

      @foreach($experiences as $index => $exp)
      <div class="timeline-item fade-in-up stagger-{{ ($index % 4) + 1 }}">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <h3>{{ $exp['title'] ?? 'Position' }}</h3>
          <h4>{{ $exp['company'] ?? 'Company' }}</h4>
          @if(isset($exp['period']))
          <span class="timeline-period">{{ $exp['period'] }}</span>
          @endif
          @if(isset($exp['description']))
          <p class="timeline-desc">{!! $exp['description'] !!}</p>
          @endif
          @if(isset($exp['achievements']) && is_array($exp['achievements']))
          <ul class="timeline-achievements">
            @foreach($exp['achievements'] as $achievement)
            <li>{!! $achievement !!}</li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>