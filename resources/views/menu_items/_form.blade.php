<div class="mb-3">
    <label for="item_name" class="form-label">Item Name <span class="text-danger">*</span></label>
    <input type="text" name="item_name" id="item_name" maxlength="100"
           class="form-control @error('item_name') is-invalid @enderror"
           value="{{ old('item_name', $item->item_name ?? '') }}" required>
    @error('item_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
        <option value="">-- Select category --</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat }}" @selected(old('category', $item->category ?? '') === $cat)>{{ $cat }}</option>
        @endforeach
    </select>
    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" rows="3" maxlength="500"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="price" class="form-label">Price (₱) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" min="0.01" name="price" id="price"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $item->price ?? '') }}" required>
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="availability" class="form-label">Availability <span class="text-danger">*</span></label>
        <select name="availability" id="availability" class="form-select @error('availability') is-invalid @enderror" required>
            @foreach (['Available', 'Unavailable'] as $status)
                <option value="{{ $status }}" @selected(old('availability', $item->availability ?? 'Available') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        @error('availability') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
