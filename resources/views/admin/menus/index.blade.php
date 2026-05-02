@extends('layouts.admin')

@section('page_title', 'Menu Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Items</h3>
                    <button class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                        <i class="fas fa-plus"></i> Add Menu Item
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Parent</th>
                                    <th>Order</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $mainMenus = $menus[null] ?? collect();
                                @endphp
                                @foreach($mainMenus as $menu)
                                <tr>
                                    <td>
                                        <i class="{{ $menu->icon_class }}"></i> {{ $menu->name }}
                                    </td>
                                    <td>{{ $menu->url }}</td>
                                    <td>-</td>
                                    <td>{{ $menu->order_number }}</td>
                                    <td>
                                        <span class="badge {{ $menu->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $menu->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="editMenu({{ $menu->id }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteMenu({{ $menu->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @if($menu->children->count() > 0)
                                    @foreach($menu->children as $child)
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="{{ $child->icon_class }}"></i> {{ $child->name }}</td>
                                        <td>{{ $child->url }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $child->order_number }}</td>
                                        <td>
                                            <span class="badge {{ $child->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $child->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" onclick="editMenu({{ $child->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="deleteMenu({{ $child->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Menu Modal -->
<div class="modal fade" id="addMenuModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Menu Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">URL</label>
                        <input type="text" class="form-control" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon Class</label>
                        <input type="text" class="form-control" name="icon_class" placeholder="bi-house">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent Menu</label>
                        <select class="form-control" name="parent_id">
                            <option value="">None (Main Menu)</option>
                            @foreach($mainMenus as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order Number</label>
                        <input type="number" class="form-control" name="order_number" value="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editMenu(id) {
    // Implement edit functionality
    alert('Edit functionality not implemented yet');
}

function deleteMenu(id) {
    if (confirm('Are you sure you want to delete this menu item?')) {
        // Implement delete functionality
        alert('Delete functionality not implemented yet');
    }
}
</script>
@endsection