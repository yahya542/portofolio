@extends('layouts.admin')

@section('page_title', 'Portfolio Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Portfolio Items</h3>
                    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm float-end">
                        <i class="fas fa-plus"></i> Add Portfolio Item
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Order</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolioItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <span class="badge" style="background-color: {{ $item->category->color_code ?? '#0077b6' }};">
                                            {{ $item->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td>{{ $item->order_number }}</td>
                                    <td>
                                        @if($item->is_featured)
                                            <span class="badge bg-warning">Featured</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $item->is_published ? 'bg-success' : 'bg-warning' }}">
                                            {{ $item->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.portfolio.edit', $item) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this portfolio item?')">
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