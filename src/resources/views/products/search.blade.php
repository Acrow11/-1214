@extends('layouts.app')

@section('content')
<h1>検索結果</h1>

<form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="keyword" value="{{ old('keyword', $keyword) }}" placeholder="商品名で検索">
    <button type="submit">検索</button>
</form>

@if($products->isEmpty())
    <p>検索結果がありません。</p>
@else
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                <p>{{ $product->price }}円</p>
            </li>
        @endforeach
    </ul>

    {{ $products->links() }}
@endif
@endsection
