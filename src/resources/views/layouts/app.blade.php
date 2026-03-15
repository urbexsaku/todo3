<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>
<body>

<header class="header">
  <div class="header__inner">
    <a class="header__logo" href="/">To Do</a>
    <nav class="header__nav">
      <ul>
        <li><a class="header__nav-link" href="/categories">カテゴリ一覧</a></li>
      </ul>
    </nav>
  </div>
 
</header>

<main>
  @yield('content')
</main>
</body>
</html>