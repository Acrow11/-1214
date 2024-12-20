@extends('layouts.app')

@section('title', '商品登録')

@section('content')
    <h1>商品登録</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">商品説明</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="price">価格</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" required>
            @error('price')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image">商品画像</label>
            <input type="file" name="image" id="image" accept="image/*">
            @error('image')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">登録</button>
        </div>
    </form>
@endsection
