@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    <h1>商品一覧</h1>

    <section class="product-cards">
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-card">
                    
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}">

                    <div class="product-info">
                        <h2>{{ $product->name }}</h2>
                        <p>価格: ¥{{ number_format($product->price) }}</p>
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="product-actions">
                        
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary">編集</a>
                        <a href="#" class="btn btn-secondary">コピー</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    
    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
