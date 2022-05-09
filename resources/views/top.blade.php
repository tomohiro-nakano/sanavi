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
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- headerwrap -->


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
                        <a href="#" ><img src="img/logo/logo_transparent.png" class="top-logo"></a>
                </div>
            </div>
        </div>

@endsection
