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
        </h2>
        まずはログイン
        <h2>
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
