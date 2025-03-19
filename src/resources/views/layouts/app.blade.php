<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマサイト</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    フリマサイト
                </a>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/mypage">マイページ</a>
                        </li>
                        <li class="header-nav__item">
                            <form class="form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">ログアウト</button>
                            </form>
                        </li>
                        @else
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/login">ログイン</a>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/register">会員登録</a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer__inner">
            <small class="small">&copy; 2026, inc.</small>
            @if (Auth::check())
            <ul class="footer-nav">
                <li class="footer-nav__item">
                    <a href="/" class="footer-nav__link">ホームに戻る</a>
                </li>
                <li class="footer-nav__item">
                <a href="/products" class="footer-nav__link">出品</a>
            </ul>
            @endif
        </div>
    </footer>
</body>

</html>
