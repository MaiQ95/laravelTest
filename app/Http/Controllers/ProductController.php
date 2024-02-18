<?php

namespace App\Http\Controllers;

use Spatie\Permission\Traits\HasRoles;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
      $this->authorize('product-list');

      $products = Product::latest()->paginate(50);
      return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('product-create');

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('product-create');

        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $this->authorize('product-list');

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('product-edit');

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('product-edit');

        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('product-delete');

        $product->delete();

        return redirect()->route('products')
            ->with('success', 'Product deleted successfully');
    }
}
