@extends('layouts.admin')

@section('page_title', 'Certificate Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Certificates</h3>
                    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Add Certificate
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Date Obtained</th>
                                    <th>Credential ID</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificates as $certificate)
                                <tr>
                                    <td>
                                        <img src="{{ asset($certificate->image_path) }}" alt="{{ $certificate->title }}"
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td>{{ $certificate->title }}</td>
                                    <td>{{ $certificate->date_obtained }}</td>
                                    <td>{{ $certificate->credential_id ?: '-' }}</td>
                                    <td>{{ $certificate->order_number }}</td>
                                    <td>
                                        <a href="{{ route('admin.certificates.edit', $certificate) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this certificate?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection