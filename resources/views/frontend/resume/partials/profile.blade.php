<section class="resume-section" id="resume">
  <div class="section-decoration decor-1"></div>
  <div class="resume-container">
    <!-- Section Header -->
    <div class="resume-section-header fade-in-up">
      <div class="section-icon">👤</div>
      <h2>ABOUT ME</h2>
    </div>

    @php
        $content = is_array($section->content) ? $section->content : json_decode($section->content, true);
    @endphp
    
    <div class="row g-4 align-items-center" style="max-width: 1100px; margin: 0 auto;">
      <!-- Profile Summary -->
      <div class="col-lg-7 fade-in-up stagger-1">
        <div style="background: white; padding: 2.5rem; border-radius: 24px; box-shadow: 0 20px 60px rgba(135,206,235,0.1); position: relative; overflow: hidden; border: 3px solid #87CEEB;">
          <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: linear-gradient(135deg, #FFD700, #FFE082); border-radius: 50%; opacity: 0.2; filter: blur(40px);"></div>
          <h3 style="font-size: 2rem; font-weight: 900; margin-bottom: 1.5rem; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $content['name'] ?? 'Professional Fullstack Engineer' }}</h3>
          <p style="font-size: 1.1rem; line-height: 1.8; color: #555;">{{ $content['summary'] ?? '' }}</p>
          
          <!-- Professional Summary Paragraphs -->
          @if(isset($content['professional_summary']) && is_array($content['professional_summary']))
            @foreach($content['professional_summary'] as $para)
              <p style="margin-top: 1rem; line-height: 1.8; color: #444;">{!! $para !!}</p>
            @endforeach
          @endif
        </div>
      </div>
      
      <!-- Contact/Skills Sidebar -->
      <div class="col-lg-5 fade-in-up stagger-2">
        @if(isset($content['contact_items']) && is_array($content['contact_items']))
        <div style="background: white; padding: 2rem; border-radius: 24px; box-shadow: 0 15px 50px rgba(135,206,235,0.1); border: 3px solid #FFD700; position: relative;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 6px; background: linear-gradient(90deg, #87CEEB, #FFD700);"></div>
          <h4 style="font-size: 1.2rem; font-weight: 800; margin-bottom: 1.5rem; color: #1a1a1a;">Get In Touch</h4>
          @foreach($content['contact_items'] as $item)
          <div style="display: flex; align-items: center; gap: 1rem; padding: 0.8rem; border-radius: 12px; margin-bottom: 0.5rem; transition: all 0.3s ease;"
               onmouseover="this.style.background='#E3F2FD'; this.style.transform='translateX(5px)'"
               onmouseout="this.style.background='transparent'; this.style.transform='translateX(0)'">
            @if(isset($item['icon']))
            <div style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; color: white; font-size: 1.1rem; flex-shrink: 0;">
              <i class="bi {{ $item['icon'] }}"></i>
            </div>
            @endif
            <div style="flex: 1;">
              @if(isset($item['label']))
              <div style="font-weight: 700; font-size: 0.85rem; color: #87CEEB; text-transform: uppercase; letter-spacing: 1px;">{{ $item['label'] }}</div>
              @endif
              <div style="color: #333;">{!! $item['value'] ?? '' !!}</div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
        
        <!-- Quick Skills Preview -->
        @if(isset($resumeSections) && $resumeSections->has('skills'))
          @php $skillsSection = $resumeSections['skills']->first(); @endphp
          @if($skillsSection)
          <div style="margin-top: 1.5rem; background: white; padding: 1.5rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(135,206,235,0.08);">
            <h4 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; color: #1a1a1a;">Top Skills</h4>
            @php
                $skills = is_array($skillsSection->content) ? $skillsSection->content : json_decode($skillsSection->content, true);
                $allSkills = [];
                if(is_array($skills)) {
                    foreach($skills as $cat) {
                        if(isset($cat['items']) && is_array($cat['items'])) {
                            $allSkills = array_merge($allSkills, array_slice($cat['items'], 0, 3));
                        }
                    }
                }
                $allSkills = array_slice($allSkills, 0, 6);
            @endphp
            <div class="skill-tags" style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
              @foreach($allSkills as $skill)
                <span style="padding: 0.4rem 0.9rem; background: #E3F2FD; color: #87CEEB; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">{{ $skill }}</span>
              @endforeach
            </div>
          </div>
          @endif
        @endif
      </div>
    </div>
  </div>
</section>
