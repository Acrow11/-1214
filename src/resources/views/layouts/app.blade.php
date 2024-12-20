<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
         <h1>
        <a href="{{ route('products.index') }}" style="text-decoration: none; color: inherit;">
            mogitate
        </a>
    </h1>
    </header>


    <div class="header-content">
        <h2>商品一覧</h2>
        <a href="{{ route('products.register') }}" class="btn btn-primary">+商品を追加</a>

    </div>

    <main>
        @yield('content')
    </main>
</body>
</html>
