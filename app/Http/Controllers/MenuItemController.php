<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuItemController extends Controller
{
    public const CATEGORIES = ['Appetizer', 'Main Course', 'Dessert', 'Drinks'];

    // READ: list all records
    public function index()
    {
        $items = MenuItem::orderBy('category')->orderBy('item_name')->get();
        return view('menu_items.index', compact('items'));
    }

    // CREATE: show form
    public function create()
    {
        return view('menu_items.create', ['categories' => self::CATEGORIES]);
    }

    // CREATE: validate and save
    public function store(Request $request)
    {
        MenuItem::create($this->validated($request));

        return redirect()->route('menu-items.index')
            ->with('success', 'Menu item added successfully.');
    }

    // UPDATE: load existing record
    public function edit(MenuItem $menu_item)
    {
        return view('menu_items.edit', [
            'item' => $menu_item,
            'categories' => self::CATEGORIES,
        ]);
    }

    // UPDATE: validate and save changes to the same row
    public function update(Request $request, MenuItem $menu_item)
    {
        $menu_item->update($this->validated($request, $menu_item->item_id));

        return redirect()->route('menu-items.index')
            ->with('success', 'Menu item updated successfully.');
    }

    // DELETE: remove the selected row (confirmation happens in the view)
    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();

        return redirect()->route('menu-items.index')
            ->with('success', 'Menu item deleted successfully.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'item_name' => [
                'required', 'string', 'max:100',
                Rule::unique('menu_items', 'item_name')->ignore($ignoreId, 'item_id'),
            ],
            'category' => ['required', Rule::in(self::CATEGORIES)],
            'description' => ['nullable', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:99999999.99'],
            'availability' => ['required', Rule::in(['Available', 'Unavailable'])],
        ]);
    }
}
