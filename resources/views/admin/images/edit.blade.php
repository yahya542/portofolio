@extends('layouts.admin')

@section('page_title', 'Edit Image: ' . ($uploadedImage->title ?? $uploadedImage->filename))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Image</h3>
                    <a href="{{ route('admin.images.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to Gallery
                    </a>
                </div>
                <form action="{{ route('admin.images.update', $uploadedImage) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 text-center">
                                    <img src="{{ $uploadedImage->image_url }}"
                                         alt="{{ $uploadedImage->title ?? $uploadedImage->filename }}"
                                         class="img-fluid rounded shadow"
                                         style="max-height: 300px;">
                                </div>

                                <div class="row text-center">
                                    <div class="col-6">
                                        <small class="text-muted">File Size</small>
                                        <div class="fw-bold">{{ $uploadedImage->file_size_formatted }}</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Dimensions</small>
                                        <div class="fw-bold">
                                            @if($uploadedImage->width && $uploadedImage->height)
                                                {{ $uploadedImage->width }} × {{ $uploadedImage->height }}
                                            @else
                                                Unknown
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <small class="text-muted">Uploaded on {{ $uploadedImage->created_at->format('M d, Y \a\t H:i') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ old('title', $uploadedImage->title) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="4">{{ old('description', $uploadedImage->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Order Number</label>
                                    <input type="number" class="form-control" name="order_number"
                                           value="{{ old('order_number', $uploadedImage->order_number) }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               name="is_featured" value="1"
                                               {{ old('is_featured', $uploadedImage->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            Featured Image
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               name="is_published" value="1"
                                               {{ old('is_published', $uploadedImage->is_published) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            Published
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Image
                        </button>
                        <a href="{{ $uploadedImage->image_url }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> View Full Size
                        </a>
                        <button type="button" class="btn btn-danger float-end"
                                onclick="deleteImage({{ $uploadedImage->id }})">
                            <i class="fas fa-trash"></i> Delete Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" action="{{ route('admin.images.destroy', $uploadedImage) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@section('scripts')
<script>
function deleteImage(id) {
    if (confirm('Are you sure you want to delete this image? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>
@endsection