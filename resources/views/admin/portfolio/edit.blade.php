@extends('layouts.admin')

@section('page_title', 'Edit Portfolio Item: ' . $portfolioItem->title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Portfolio Item: {{ $portfolioItem->title }}</h3>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to Portfolio
                    </a>
                </div>
                <form action="/admin/portfolio/{{ $portfolioItem->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $portfolioItem->title) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description *</label>
                                    <textarea class="form-control" name="description" rows="6" required>{{ old('description', $portfolioItem->description) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Project URL</label>
                                            <input type="url" class="form-control" name="project_url" value="{{ old('project_url', $portfolioItem->project_url) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">GitHub URL</label>
                                            <input type="url" class="form-control" name="github_url" value="{{ old('github_url', $portfolioItem->github_url) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Image Upload Section -->
                                <div class="mb-3">
                                    <label class="form-label">Portfolio Image</label>
                                    
                                    @if($portfolioItem->image_path && file_exists(public_path($portfolioItem->image_path)))
                                        <div class="mb-3">
                                            <img src="{{ asset($portfolioItem->image_path) }}" 
                                                 alt="Current Image" 
                                                 class="img-fluid rounded border"
                                                 style="max-height: 180px; width: auto; display: block;">
                                            <small class="text-muted d-block mt-1">Current image</small>
                                        </div>
                                    @endif

                                    <input type="file" 
                                           class="form-control" 
                                           name="image_file" 
                                           accept="image/*"
                                           id="imageFileInput">
                                    <small class="text-muted">
                                        Leave empty to keep current image. Max 5MB. Supported: JPG, PNG, GIF, WebP
                                    </small>
                                    
                                    <!-- Hidden field to maintain current path if no new upload -->
                                    <input type="hidden" name="image_path" value="{{ $portfolioItem->image_path }}">
                                    
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Category *</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ old('category_id', $portfolioItem->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Order Number</label>
                                    <input type="number" class="form-control" name="order_number" value="{{ old('order_number', $portfolioItem->order_number) }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_featured" {{ old('is_featured', $portfolioItem->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label">Featured Item</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_published" {{ old('is_published', $portfolioItem->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label">Published</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <strong>Item Info:</strong><br>
                                    <small class="text-muted">
                                        Slug: {{ $portfolioItem->slug }}<br>
                                         Created: {{ $portfolioItem->created_at?->format('M d, Y H:i') ?? '-' }}<br>
U                                          pdated: {{ $portfolioItem->updated_at?->format('M d, Y H:i') ?? '-' }}

                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Portfolio Item
                        </button>
                        <a href="{{ route('page.show', 'portfolio') }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> View Portfolio Page
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('imageFileInput');
    const preview = document.getElementById('imagePreview');

    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Please select an image file.');
                    imageInput.value = '';
                    return;
                }

                // Validate file size (5MB max)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size exceeds 5MB limit. Please choose a smaller image.');
                    imageInput.value = '';
                    return;
                }

                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="mb-2">
                            <img src="${e.target.result}" 
                                 alt="Preview" 
                                 class="img-thumbnail"
                                 style="max-height: 180px; width: auto; display: block;">
                            <small class="text-success d-block mt-1">New image selected</small>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        });
    }
});
</script>
@endsection