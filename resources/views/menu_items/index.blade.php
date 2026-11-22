@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Menu Items</h5>
        <a href="{{ route('menu-items.create') }}" class="btn btn-primary btn-sm">+ Add New Item</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->item_id }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->description ?: '—' }}</td>
                        <td>₱{{ number_format($item->price, 2) }}</td>
                        <td>
                            <span class="badge {{ $item->availability === 'Available' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $item->availability }}
                            </span>
                        </td>
                        <td class="text-center text-nowrap">
                            <a href="{{ route('menu-items.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('menu-items.destroy', $item) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete &quot;{{ addslashes($item->item_name) }}&quot;? This cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No menu items yet. Click "Add New Item".</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
