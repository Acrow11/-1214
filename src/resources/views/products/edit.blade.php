<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div>
        <label for="name">商品名</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        @error('name')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="price">値段</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" required min="0" max="10000" step="1">
        @error('price')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="season">季節</label>
        <select name="season" required>
            <option value="">選択してください</option>
            <option value="spring" {{ old('season', $product->season) == 'spring' ? 'selected' : '' }}>春</option>
            <option value="summer" {{ old('season', $product->season) == 'summer' ? 'selected' : '' }}>夏</option>
            <option value="fall" {{ old('season', $product->season) == 'fall' ? 'selected' : '' }}>秋</option>
            <option value="winter" {{ old('season', $product->season) == 'winter' ? 'selected' : '' }}>冬</option>
        </select>
        @error('season')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description">商品説明</label>
        <textarea name="description" required>{{ old('description', $product->description) }}</textarea>
        @error('description')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="image">商品画像</label>
        <input type="file" name="image">
        @if($product->image_path)
            <p>現在の画像：<img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" width="100"></p>
        @endif
        @error('image')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">変更を保存</button>
</form>
