<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') {{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ asset('//fonts.gstatic.com') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito') }}" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    {{-- 追加内容 --}}
    <!-- Favicons -->
    <link href="{{ asset('img/favicon_sauna.png') }}" rel="icon">
    <link href="{{ asset('img/favicon_sauna.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Raleway:400,300,700,900') }}"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style2.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://unpkg.com/scroll-hint@1.1.10/css/scroll-hint.css">
    <link rel="stylesheet" href="scroll-hint.css">


</head>

<body>
    <div id="app">
        <header class="gl-header">
            <div class="navbar navbar-inverse navbar-fixed-top navbar-expand-md">
                <div class="container">
                    <a href="/"><img src="{{ asset('img/logo/header_logo.png') }}" id="header_logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        {{-- <div class="navbar-collapse collapse"> --}}
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/" class="text-light"> TOP</a></li>
                            <li><a href="/about" class="text-light"> Sanaviとは?</a></li>
                            <li><a href="/place_post" class="text-light"><i class="fa fa-plus"></i> 施設投稿</a>
                            </li>
                            <li><a href="/place_list" class="text-light"><i class="fa fa-list"
                                        aria-hidden="true"></i> 施設一覧</a></li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in"></i> {{ __('ja.Login') }}
                                        </a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('register') }}">
                                            <i class="fa fa-user"></i> {{ __('ja.Assign') }}
                                        </a>
                                    </li>
                                @endif
                                <!-- ログイン済みユーザ -->
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> {{ __('ja.Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none"> @csrf </form>
                                </li>
                            @endguest
                            <li><a href="https://github.com/NakanoTomohiro/sanavi-app" class="text-light"><i
                                        class="fa fa-github" aria-hidden="true"></i> GitHub</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="slideBox">
            <div id="headerwrap">
                <div class="container">
                    <div class="row centered">
                        <div class="col-lg-8 col-lg-offset-2 title">
                                <h1>Sanavi</h1>
                                <h2>sauna review site</h2>
                                @if (Auth::check() == false)
                                <h3>まずはログインまたは、ユーザ登録をしましょう</h3>
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">ログイン</a>
                                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">新規ユーザ登録</a>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="item2" style="background-image: url(../img/top_bg_sauna1.jpg)"></div>
            <div class="item2" style="background-image: url(../img/top_bg_sauna2.jpg)"></div>
            <div class="item2" style="background-image: url(../img/top_bg_sauna3.jpg)"></div>
          </div>

        <footer>
            <div id="copyrights">
                <div class="container">
                    <p>
                        &copy; Copyrights <strong>Tomohiro Nakano</strong>. All Rights Reserved
                    </p>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
