<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}の商品詳細</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>価格: ¥{{ $product->price }}</p>
    <p>商品説明: {{ $product->description }}</p>
    <p><img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"></p>

    
    <h2>商品情報更新</h2>
    <a href="{{ route('products.edit', $product->id) }}">編集</a>
    
    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
    </form>
</body>
</html>
