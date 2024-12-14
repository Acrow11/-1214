<?php

namespace App\Http\Controllers; // 名前空間を追加

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // この行を追加

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 検索機能
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 並べ替え機能
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        // ページネーション
        $products = $query->paginate(6);  // 1ページに6件の商品を表示

        return view('product.index', compact('products'));
    }
}
