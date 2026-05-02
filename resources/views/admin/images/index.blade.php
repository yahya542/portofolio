@extends('layouts.admin')

@section('page_title', 'Image Gallery Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Image Gallery</h3>
                    <div>
                        <a href="{{ route('admin.images.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Upload Images
                        </a>
                        <button id="bulkDeleteBtn" class="btn btn-danger btn-sm" style="display: none;">
                            <i class="fas fa-trash"></i> Delete Selected (<span id="selectedCount">0</span>)
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($images->count() > 0)
                        <div class="row" id="imageGrid">
                            @foreach($images as $image)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 image-item" data-id="{{ $image->id }}">
                                <div class="card h-100 image-card">
                                    <div class="position-relative">
                                        <img src="{{ $image->image_url }}"
                                             class="card-img-top"
                                             alt="{{ $image->title ?? $image->filename }}"
                                             style="height: 200px; object-fit: cover;">
                                        <div class="card-img-overlay d-flex align-items-start justify-content-end p-2">
                                            <div class="form-check">
                                                <input class="form-check-input image-checkbox"
                                                       type="checkbox"
                                                       value="{{ $image->id }}"
                                                       id="checkbox{{ $image->id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <h6 class="card-title text-truncate mb-1" title="{{ $image->title ?? $image->filename }}">
                                            {{ $image->title ?? $image->filename }}
                                        </h6>
                                        <small class="text-muted d-block">
                                            {{ $image->file_size_formatted }}
                                        </small>
                                        <small class="text-muted d-block">
                                            {{ $image->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                    <div class="card-footer p-2 bg-transparent border-0">
                                        <div class="btn-group w-100" role="group">
                                            <a href="{{ $image->image_url }}"
                                               target="_blank"
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.images.edit', $image) }}"
                                               class="btn btn-outline-secondary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-outline-danger btn-sm"
                                                    onclick="deleteImage({{ $image->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $images->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No Images Found</h4>
                            <p class="text-muted">Start by uploading some images to your gallery.</p>
                            <a href="{{ route('admin.images.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Upload Your First Images
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Delete Form -->
<form id="bulkDeleteForm" action="{{ route('admin.images.bulk-delete') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="image_ids" id="bulkDeleteIds">
</form>
@endsection

@section('styles')
<style>
    .image-card {
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
    }

    .image-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .image-checkbox {
        background-color: rgba(255, 255, 255, 0.8);
        border: 2px solid #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .image-checkbox:checked {
        background-color: #007bff;
        border-color: #007bff;
    }

    .card-img-overlay {
        background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .image-card:hover .card-img-overlay {
        opacity: 1;
    }

    .btn-group .btn {
        flex: 1;
        border-radius: 4px !important;
        margin: 0 1px;
    }

    .btn-group .btn:first-child {
        margin-left: 0;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }

    /* Shopee-style grid */
    #imageGrid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    @media (max-width: 576px) {
        #imageGrid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
    }

    .image-item {
        animation: fadeIn 0.5s ease-in-out;
    }

    .image-item:nth-child(odd) {
        animation-delay: 0.1s;
    }

    .image-item:nth-child(even) {
        animation-delay: 0.2s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.image-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const selectedCount = document.getElementById('selectedCount');
    const bulkDeleteForm = document.getElementById('bulkDeleteForm');
    const bulkDeleteIds = document.getElementById('bulkDeleteIds');

    function updateBulkDeleteButton() {
        const checkedBoxes = document.querySelectorAll('.image-checkbox:checked');
        const count = checkedBoxes.length;

        if (count > 0) {
            bulkDeleteBtn.style.display = 'inline-block';
            selectedCount.textContent = count;
        } else {
            bulkDeleteBtn.style.display = 'none';
        }
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkDeleteButton);
    });

    bulkDeleteBtn.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('.image-checkbox:checked');
        const ids = Array.from(checkedBoxes).map(cb => cb.value);

        if (ids.length > 0 && confirm(`Are you sure you want to delete ${ids.length} selected image(s)?`)) {
            bulkDeleteIds.value = JSON.stringify(ids);
            bulkDeleteForm.submit();
        }
    });
});

function deleteImage(id) {
    if (confirm('Are you sure you want to delete this image?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/images/${id}`;

        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';

        form.appendChild(methodInput);
        form.appendChild(csrfInput);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection