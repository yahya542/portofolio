@extends('layouts.admin')

@section('page_title', 'Page Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pages</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>
                                        <span class="badge {{ $page->is_published ? 'bg-success' : 'bg-warning' }}">
                                            {{ $page->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td>{{ $page->updated_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
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