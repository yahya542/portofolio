@extends('layouts.admin')

@section('page_title', 'Add Portfolio Item')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Portfolio Item</h3>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to Portfolio
                    </a>
                </div>
                <form action="{{ route('admin.portfolio.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description *</label>
                                    <textarea class="form-control" name="description" rows="6" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Project URL</label>
                                            <input type="url" class="form-control" name="project_url" value="{{ old('project_url') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">GitHub URL</label>
                                            <input type="url" class="form-control" name="github_url" value="{{ old('github_url') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Image Path *</label>
                                    <input type="text" class="form-control" name="image_path" value="{{ old('image_path') }}" required>
                                    <small class="text-muted">Path to image file (e.g., assets/img/portfolio/image.jpg)</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Category *</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Order Number</label>
                                    <input type="number" class="form-control" name="order_number" value="{{ old('order_number', 0) }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label">Featured Item</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_published" {{ old('is_published', true) ? 'checked' : '' }}>
                                        <label class="form-check-label">Published</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Portfolio Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection