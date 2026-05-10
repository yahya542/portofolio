@extends('layouts.admin')

@section('page_title', 'Add Resume Section')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Resume Section</h3>
                    <a href="{{ route('admin.resume.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.resume.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="section_type" class="form-label">Section Type *</label>
                            <select class="form-control @error('section_type') is-invalid @enderror" 
                                   id="section_type" name="section_type" required>
                                <option value="">Select section type...</option>
                                @foreach($sectionTypes as $value => $label)
                                    <option value="{{ $value }}" {{ old('section_type') == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">This determines how the content will be displayed on the frontend.</small>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Section Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" 
                                   placeholder="e.g., Work Experience, My Skills">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Optional. If left empty, default titles will be used.</small>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content (JSON or Text)</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="10"
                                      placeholder='Enter JSON or HTML content...'>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                For complex sections (like experience, skills), use JSON format. 
                                Example (experience): 
                                <pre class="bg-light p-2 mt-2 rounded" style="font-size: 0.85rem;">
[
  {
    "title": "DevOps Engineer",
    "company": "Tech Corp",
    "period": "2023 - Present",
    "description": "Maintaining cloud infrastructure...",
    "achievements": ["Achievement 1", "Achievement 2"]
  }
]</pre>
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order_number" class="form-label">Order Number</label>
                                    <input type="number" class="form-control" id="order_number" 
                                           name="order_number" value="{{ old('order_number', 0) }}" min="0">
                                    <small class="text-muted">Sections with lower numbers appear first.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               name="is_active" id="is_active" 
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                    <small class="text-muted">Inactive sections won't show on the frontend.</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Section
                            </button>
                            <a href="{{ route('admin.resume.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Preview JSON format helper
    document.getElementById('section_type')?.addEventListener('change', function() {
        const type = this.value;
        const examples = {
            'profile': '{"name": "Your Name", "title": "Your Title", "summary": "Brief summary..."}',
            'summary': '{"text": "Professional summary paragraph..."}',
            'experience': '[{"title": "...", "company": "...", "period": "...", "description": "...", "achievements": ["..."]}]',
            'skills': '[{"category": "Backend", "items": ["Django", "Laravel", "Golang"]}]',
            'education': '[{"degree": "...", "institution": "...", "period": "...", "description": "..."}]',
            'languages': '[{"language": "Indonesian", "level": "Native"}, {"language": "English", "level": "Intermediate"}]',
            'contact': '{"items": [{"icon": "bi-envelope", "label": "Email", "value": "email@example.com"}]}'
        };
        
        if (examples[type]) {
            console.log('Example format for ' + type + ':', examples[type]);
        }
    });
</script>
@endsection
