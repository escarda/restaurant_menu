@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Add Menu Item</h5></div>
    <div class="card-body">
        <form action="{{ route('menu-items.store') }}" method="POST">
            @csrf
            @include('menu_items._form')
            <button type="submit" class="btn btn-primary">Save Item</button>
            <a href="{{ route('menu-items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
