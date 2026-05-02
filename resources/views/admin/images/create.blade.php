@extends('layouts.admin')

@section('page_title', 'Upload Images')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upload Images</h3>
                    <a href="{{ route('admin.images.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to Gallery
                    </a>
                </div>
                <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Images * <small class="text-muted">(Max 10 images, 5MB each)</small></label>
                                    <input type="file"
                                           class="form-control"
                                           name="images[]"
                                           id="imageInput"
                                           multiple
                                           accept="image/*"
                                           required>
                                    <div class="form-text">
                                        Supported formats: JPEG, PNG, JPG, GIF, WebP
                                    </div>
                                </div>

                                <div id="imagePreview" class="row g-2 mb-3" style="display: none;">
                                    <!-- Preview images will be added here -->
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Title <small class="text-muted">(Optional - will apply to all images)</small></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description <small class="text-muted">(Optional)</small></label>
                                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card border-info">
                                    <div class="card-header bg-info text-white">
                                        <h6 class="mb-0"><i class="fas fa-info-circle"></i> Upload Guidelines</h6>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0 small">
                                            <li class="mb-2"><i class="fas fa-check text-success"></i> Maximum 10 images per upload</li>
                                            <li class="mb-2"><i class="fas fa-check text-success"></i> Each image max 5MB</li>
                                            <li class="mb-2"><i class="fas fa-check text-success"></i> Supported: JPG, PNG, GIF, WebP</li>
                                            <li class="mb-2"><i class="fas fa-check text-success"></i> Images are automatically resized</li>
                                            <li class="mb-2"><i class="fas fa-check text-success"></i> Thumbnails are created automatically</li>
                                            <li class="mb-0"><i class="fas fa-check text-success"></i> All images are published by default</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg w-100" id="uploadBtn">
                                        <i class="fas fa-upload"></i> Upload Images
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    #imagePreview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        border: 2px solid #e0e0e0;
    }

    .preview-item {
        position: relative;
    }

    .remove-preview {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        cursor: pointer;
    }

    .file-input-wrapper input[type=file] {
        position: absolute;
        left: -9999px;
    }

    .file-input-label {
        display: inline-block;
        padding: 10px 20px;
        border: 2px dashed #007bff;
        border-radius: 5px;
        background: #f8f9fa;
        color: #007bff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input-label:hover {
        background: #007bff;
        color: white;
        border-color: #0056b3;
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const uploadBtn = document.getElementById('uploadBtn');

    imageInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);

        // Clear previous previews
        imagePreview.innerHTML = '';
        imagePreview.style.display = 'none';

        if (files.length > 0) {
            imagePreview.style.display = 'flex';

            files.forEach((file, index) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'col-auto preview-item';

                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview ${index + 1}">
                            <button type="button" class="remove-preview" onclick="removePreview(this, ${index})">
                                <i class="fas fa-times"></i>
                            </button>
                        `;

                        imagePreview.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                }
            });

            uploadBtn.textContent = `Upload ${files.length} Image${files.length > 1 ? 's' : ''}`;
        } else {
            uploadBtn.textContent = 'Upload Images';
        }
    });

    // Validate file count and size before submission
    document.querySelector('form').addEventListener('submit', function(e) {
        const files = imageInput.files;
        let totalSize = 0;

        if (files.length > 10) {
            e.preventDefault();
            alert('Maximum 10 images allowed per upload.');
            return;
        }

        for (let file of files) {
            totalSize += file.size;
            if (file.size > 5 * 1024 * 1024) { // 5MB
                e.preventDefault();
                alert(`File "${file.name}" is too large. Maximum size is 5MB.`);
                return;
            }
        }

        // Show loading state
        uploadBtn.disabled = true;
        uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
    });
});

function removePreview(button, index) {
    // This would need more complex logic to actually remove from file input
    // For now, just hide the preview
    button.closest('.preview-item').remove();

    const remainingPreviews = document.querySelectorAll('.preview-item');
    if (remainingPreviews.length === 0) {
        document.getElementById('imagePreview').style.display = 'none';
    }
}
</script>
@endsection