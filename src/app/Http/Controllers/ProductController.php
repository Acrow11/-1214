<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();


        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }


        if ($request->input('sort') == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->input('sort') == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        
        $products = $query->paginate(6);

        return view('products.index', compact('products'));
    }

    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    
    public function register()
    {
        return view('products.register');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image_path'] = $imagePath;
        }

        $productData = $validated;
        if (isset($validated['image_path'])) {
            $productData['image_path'] = $validated['image_path'];
        }

        Product::create($productData);

        return redirect()->route('products.index')->with('success', '商品を登録しました。');
    }

    
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(10);
        return view('products.index', compact('products'));
    }

    
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists($product->image_path)) {
                Storage::delete($product->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $product->image_path;
        }

        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.show', $product->id)
                         ->with('success', '商品が更新されました');
    }


    public function destroy(Product $product)
    {
        if (!empty($product->image_path) && Storage::exists($product->image_path)) {
            Storage::delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', '商品を削除しました。');
    }
}
