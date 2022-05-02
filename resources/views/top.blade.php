@extends('layouts.app')

@section('title', '')

@section('content')

    {{-- top_carousel --}}
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/top_bg_sauna1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/top_bg_sauna2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/top_bg_sauna3.jpg" alt="Third slide">
            </div>
            <h1 class="carousel-string1"><b>Sanavi</b></h1>
            <h2 class="carousel-string2">sauna review site</h2>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container w">
        <div class="row centered">
            <br><br>
            <div class="col-lg-4">
                <h4><a href="/about"><i class="fa fa-question-circle-o" aria-hidden="true"></i><br>Sanaviとは？</a></h4>
            </div>
            <div class="col-lg-4">
                <h4><a href="/place_post"><i class="fa fa-plus"></i><br>施設投稿</a></h4>
            </div>
            <div class="col-lg-4">
                <h4><a href="/place_list"><i class="fa fa-list" aria-hidden="true"></i><br>施設一覧</a></h4>
            </div>
        </div>
        <br>
        <br>
    </div>

    {{-- logo --}}
        <div class="container">
            <div class="row centered">
                <div class="col-lg-12">
                    <div class="tilt">
                        <a href="#"><img src="img/logo/logo_transparent.png" width="300px" height="300px"></a>
                    </div>
                </div>
            </div>
        </div>

@endsection
