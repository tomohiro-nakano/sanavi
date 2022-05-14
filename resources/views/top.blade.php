<title>Top - Sanavi - サウナレビューサイト</title>

@extends('layouts.app')

@section('title', '')

@section('content')

    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>Sanavi</h1>
                    <h2>sauna review site</h2>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::check() == false)
        <div class="card text-center">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h3 class="card-title">まずはログインまたは、ユーザ登録をしましょう</h3>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">ログイン</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">新規ユーザ登録</a>
            </div>
        </div>
    @endif

    {{-- logo --}}
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <a href="#"><img src="img/logo/logo_transparent.png" class="top-logo"></a>
            </div>
        </div>
    </div>

@endsection
