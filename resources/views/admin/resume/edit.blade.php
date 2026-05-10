@extends('layouts.admin')

@section('page_title', 'Edit Resume Section')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Resume Section</h3>
                    <a href="{{ route('admin.resume.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.resume.update', $section->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="section_type" class="form-label">Section Type *</label>
                            <select class="form-control @error('section_type') is-invalid @enderror" 
                                   id="section_type" name="section_type" required 
                                   {{ in_array($section->section_type, ['profile', 'summary', 'experience', 'skills', 'education', 'languages', 'contact']) ? 'disabled' : '' }}>
                                <option value="">Select section type...</option>
                                @foreach($sectionTypes as $value => $label)
                                    <option value="{{ $value }}" {{ old('section_type', $section->section_type) == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                @if(in_array($section->section_type, ['profile', 'summary', 'experience', 'skills', 'education', 'languages', 'contact']))
                                    Section type is fixed for this default section.
                                @else
                                    This determines how the content will be displayed on the frontend.
                                @endif
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Section Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $section->title) }}" 
                                   placeholder="e.g., Work Experience, My Skills">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content (JSON or Text)</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="10">{{ old('content', $section->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                Store structured data as JSON or HTML content.
                                <a href="#" data-bs-toggle="modal" data-bs-target="#formatHelp">See format examples</a>
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order_number" class="form-label">Order Number</label>
                                    <input type="number" class="form-control" id="order_number" 
                                           name="order_number" value="{{ old('order_number', $section->order_number) }}" min="0">
                                    <small class="text-muted">Sections with lower numbers appear first.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               name="is_active" id="is_active" 
                                               {{ old('is_active', $section->is_active) ? 'checked' : '' }}>
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
                                <i class="fas fa-save"></i> Update Section
                            </button>
                            <a href="{{ route('admin.resume.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Format Help Modal -->
<div class="modal fade" id="formatHelp" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Content Format Examples</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6>Profile Section</h6>
                <pre class="bg-light p-2 rounded" style="font-size: 0.85rem;">
{
  "name": "MUHAMMAD YAHYA ABDULLAHISSALAM",
  "title": "FULLSTACK ENGINEER",
  "summary": "Innovative Fullstack Engineer..."
}</pre>

                <h6>Experience Section</h6>
                <pre class="bg-light p-2 rounded" style="font-size: 0.85rem;">
[
  {
    "title": "DevOps System Administrator",
    "company": "Kampus (Contract)",
    "period": "Present",
    "description": "Maintaining OJS system...",
    "achievements": [
      "System upgrade from v3.1 to LTS",
      "Server administration and troubleshooting"
    ]
  }
]</pre>

                <h6>Skills Section</h6>
                <pre class="bg-light p-2 rounded" style="font-size: 0.85rem;">
[
  {
    "category": "Backend & Frameworks",
    "icon": "bi-code-slash",
    "items": ["Django", "Laravel", "Golang", "Flask"]
  },
  {
    "category": "DevOps & Infrastructure",
    "icon": "bi-server",
    "items": ["Docker", "Linux", "Git"]
  }
]</pre>

                <h6>Contact Section</h6>
                <pre class="bg-light p-2 rounded" style="font-size: 0.85rem;">
{
  "items": [
    {"icon": "bi-geo-alt", "label": "Location", "value": "Pamekasan, 69316"},
    {"icon": "bi-envelope", "label": "Email", "value": "email@example.com"}
  ]
}</pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
