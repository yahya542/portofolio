@extends('layouts.admin')

@section('page_title', 'Resume Sections Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Resume Sections</h3>
                    <a href="{{ route('admin.resume.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Section
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sections as $section)
                                <tr>
                                    <td>{{ $section->order_number }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ ucfirst($section->section_type) }}
                                        </span>
                                    </td>
                                    <td>{{ $section->title ?: '-' }}</td>
                                    <td>
                                        <span class="badge {{ $section->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $section->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.resume.edit', $section->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.resume.destroy', $section->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this section?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No resume sections found. Create your first section!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($sections->isEmpty())
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.resume.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create Resume Section
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
