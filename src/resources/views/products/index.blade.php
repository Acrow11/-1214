@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="container">
    <div class="sidebar">
        
        <form action="{{ route('products.search') }}" method="get" class="search-form">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="商品名で検索">
              <button type="submit" class="search-btn">検索</button>
        </form>

        <h3>価格順で表示</h3>
        <form action="{{ route('products.index') }}" method="get" class="sort-form">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <select name="sort" id="sort">
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>価格が安い順</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>価格が高い順</option>
            </select>
            <button type="submit">並べ替え</button>
        </form>
    </div>
    <div class="product-list">
        @forelse ($products as $product)
            <div class="product-card">
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="product-image">
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p>¥{{ number_format($product->price) }}</p>
                    </div>
                </a>
            </div>
        @empty
            <p>商品がありません。</p>
        @endforelse
    </div>

    <div class="pagination">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
