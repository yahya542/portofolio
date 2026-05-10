<div class="col-lg-4" style="display: none;">
  <div class="contact-info">
    @php
        $content = is_array($section->content) ? $section->content : json_decode($section->content, true);
        $items = $content['items'] ?? [];
    @endphp
    
    @foreach($items as $item)
    <div class="contact-item">
      @if(isset($item['icon']))
      <div class="contact-icon"><i class="bi {{ $item['icon'] }}"></i></div>
      @endif
      <div>
        @if(isset($item['label']))
        <div class="fw-bold">{{ $item['label'] }}</div>
        @endif
        <div>{{ $item['value'] ?? '' }}</div>
      </div>
    </div>
    @endforeach
  </div>
</div>
