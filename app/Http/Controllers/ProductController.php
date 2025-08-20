<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('notes')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'note' => 'nullable|string'
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
        ]);
        // dd($product);

        if (!empty($validated['note'])) {
            // Use the correct column name: 'content' or 'text'
            $product->notes()->create(['content' => $validated['note']]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $note = $product->notes()->first(); // Get the first note if it exists
        return view('products.edit', compact('product', 'note'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'note' => 'nullable|string'
        ]);

        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
        ]);

        if ($validated['note']) {
            // Update if exists, otherwise create
            $product->notes()->updateOrCreate(
                ['notable_id' => $product->id, 'notable_type' => Product::class],
                ['content' => $validated['note']]
            );
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product moved to trash.');
    }
}
