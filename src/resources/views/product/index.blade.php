<!-- resources/views/product/index.blade.php -->
@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="product-list">
    <form action="{{ route('products.index') }}" method="get">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="商品名で検索">
        <button type="submit">検索</button>
    </form>

    <div class="sort">
        <form action="{{ route('products.index') }}" method="get">
            <select name="sort" id="sort">
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>価格が安い順</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>価格が高い順</option>
            </select>
            <button type="submit">並べ替え</button>
        </form>
    </div>

    <div class="products">
        @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
            <div class="product-info">
                <h3>{{ $product->name }}</h3>
                <p>¥{{ number_format($product->price) }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $products->links() }}
    </div>
</div>
@endsection
