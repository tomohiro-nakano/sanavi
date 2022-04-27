@extends('layouts.app')

@section('title', 'サウナ施設登録')

@section('content')

    <form action="{{ url('place_post') }}" method="post" class="row">
        {{ csrf_field() }}
        <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">

        @include('common.errors')

        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-check-square-o" aria-hidden="true"></i>　施 設 名</div>
                </div>
                <input type="text" name="place_name" class="form-control" value="{{ old('place_name') }}" autofocus>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>　室　温</div>
                </div>
                <input type="text" maxlength="3" name="room_temp" class="form-control" value="{{ old('room_temp') }}"
                    autofocus>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-tint" aria-hidden="true"></i>　水　温</div>
                </div>
                <input type="text" maxlength="2" name="water_temp" class="form-control" value="{{ old('water_temp') }}"
                    autofocus>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-money"></i>　料　金</div>
                </div>
                <input type="number" name="price" class="form-control" placeholder="例：800" value="{{ old('price') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i>　住　所</div>
                </div>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="inputFile" class="input-group-text"><i class="fa fa-picture-o" aria-hidden="true"></i>　画像アップロード</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputFile" name="place_image">
                <label class="custom-file-label" for="inputFile" data-browse="選択">ファイルを選択(ここにドロップすることもできます)</label>
            </div>
        </div>

        <div class="form-group col-3">
            <div class="d-grid gap-2">
                <a href="{{ url('/place_list') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="fa fa-mail-reply"></i>　キャンセル
                </a>
            </div>
        </div>
        <div class="form-group col-9">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary btn-lg">
                    <i class="fa fa-chevron-right"></i>　送 信
                </button>
            </div>
        </div>
    </form>

@endsection
