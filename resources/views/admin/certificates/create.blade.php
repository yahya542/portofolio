@extends('layouts.admin')

@section('page_title', 'Add Certificate')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Certificate</h3>
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-arrow-left"></i> Back to Certificates
                    </a>
                </div>
                <form action="{{ route('admin.certificates.store') }}" method="POST">
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
                                    <textarea class="form-control" name="description" rows="4" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Date Obtained *</label>
                                            <input type="text" class="form-control" name="date_obtained" value="{{ old('date_obtained') }}" placeholder="Jan 2024" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Credential ID</label>
                                            <input type="text" class="form-control" name="credential_id" value="{{ old('credential_id') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Image Path *</label>
                                    <input type="text" class="form-control" name="image_path" value="{{ old('image_path') }}" required>
                                    <small class="text-muted">Path to certificate image (e.g., assets/img/certificates/cert.jpg)</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Order Number</label>
                                    <input type="number" class="form-control" name="order_number" value="{{ old('order_number', 0) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Certificate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection