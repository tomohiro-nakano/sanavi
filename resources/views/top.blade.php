@extends('layouts.app')

@section('content')
    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1><b>Sanavi</b></h1>
                    <h2>sauna review site</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container w">
        <div class="row centered">
            <br><br>
            <div class="col-lg-4">
                <h4><a href="/"><i class="fa fa-home" aria-hidden="true"></i><br>TOP</a></h4>
            </div>
            <!-- col-lg-4 -->

            <div class="col-lg-4">
                <h4><a href="/place_list"><i class="fa fa-list" aria-hidden="true"></i><br>施設一覧</a></h4>
            </div>
            <!-- col-lg-4 -->
        </div>
        <!-- row -->
        <br>
        <br>
    </div>
    <!-- container -->

    <!-- PORTFOLIO SECTION -->
    <div id="dg">
        <div class="container">
            <div class="row centered">
                <h4>LATEST WORKS</h4>
                <br>
                <div class="col-lg-4">
                    <div class="tilt">
                        <a href="#"><img src="img/p01.png" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tilt">
                        <a href="#"><img src="img/p03.png" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tilt">
                        <a href="#"><img src="img/p02.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
@endsection
