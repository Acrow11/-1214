<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <header>
        <h1>商品一覧</h1>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
