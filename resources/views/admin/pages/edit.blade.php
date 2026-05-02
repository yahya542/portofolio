@extends('layouts.admin')

@section('page_title', 'Edit Page: ' . $page->title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Page: {{ $page->title }}</h3>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to Pages
                    </a>
                </div>
                <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $page->title }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control" name="content" rows="20" required>{{ $page->content }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" rows="3">{{ $page->meta_description }}</textarea>
                                    <small class="text-muted">Brief description for SEO (max 160 characters)</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{ $page->meta_keywords }}">
                                    <small class="text-muted">Comma-separated keywords for SEO</small>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_published" {{ $page->is_published ? 'checked' : '' }}>
                                        <label class="form-check-label">Published</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <strong>Page Info:</strong><br>
                                    <small class="text-muted">
                                        Slug: {{ $page->slug }}<br>
                                        Created: {{ $page->created_at->format('M d, Y H:i') }}<br>
                                        Updated: {{ $page->updated_at->format('M d, Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                        <a href="{{ route('page.show', $page->slug) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Preview Page
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection