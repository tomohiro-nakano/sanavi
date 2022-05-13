@extends('layouts.app')

@section('title', '施設編集')

@section('content')
    <form action="{{ url('place_edit/' . $place->id) }}" method="post" class="row"
        enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
        <input type='hidden' name='place_image_name'
            value="{{ old('place_image', isset($place->place_image) ? $place->place_image : '') }}">

        @include('common.errors')
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-book"></i>　施設名</div>
                </div>
                <input type="text" name="place_name" class="form-control"
                    value="{{ old('place_name', isset($place->place_name) ? $place->place_name : '') }}" autofocus>
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-sort-numeric-asc"></i>　室　温</div>
                </div>
                <input type="text" maxlength="3" name="room_temp" class="form-control"
                    value="{{ old('room_temp', isset($place->room_temp) ? $place->room_temp : '') }}">
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-sort-numeric-asc"></i>　水　温</div>
                </div>
                <input type="text" maxlength="2" name="water_temp" class="form-control"
                    value="{{ old('water_temp', isset($place->water_temp) ? $place->water_temp : '') }}">
            </div>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-money"></i>　料　金</div>
                </div>
                <input type="number" name="price" class="form-control" placeholder="例：800"
                    value="{{ old('price', isset($place->price) ? $place->price : '') }}">
            </div>
        </div>
        <div class="form-group col-md-12 col-xs-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-book"></i>　住　所</div>
                </div>
                <input type="text" name="address" class="form-control"
                    value="{{ old('address', isset($place->address) ? $place->address : '') }}">
            </div>
        </div>

        @if ($place->place_image != '')
            <img class="place-img" src="{{ '/img/place_image/' . $place->place_image }}" alt="place_image">
            <div class="form-group">
                <label for="inputFile" class="input-group-text-2"><i class="fa fa-picture-o"
                        aria-hidden="true"></i>　画像アップロード</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFile" name="place_image">
                    <label class="custom-file-label" for="inputFile" data-browse="選択"
                        value="{{ old('place_image', isset($place->place_image) ? $place->place_image : '') }}">
                        {{ $place->place_image }}</label>
                </div>
            </div>
        @else
            <div class="form-group col-md-12 col-xs-12">
                <label for="inputFile" class="input-group-text-2"><i class="fa fa-picture-o"
                        aria-hidden="true"></i>　画像アップロード</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFile" name="place_image">
                    <label class="custom-file-label" for="inputFile" id="test2" data-browse="選択">ファイルを選択(ドロップできます)</label>
                </div>
            </div>
        @endif

        <div class="form-group col-md-3 col-xs-12">
            <div class="d-grid gap-2">
                <a href="{{ url('/place_list') }}" class="btn btn-outline-secondary btn-outline btn-lg">
                    <i class="fa fa-mail-reply"></i>　キャンセル
                </a>
            </div>
        </div>

        <div class="form-group col-md-6 col-xs-12">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary btn-lg">
                    <i class="fa fa-chevron-right"></i>　送 信
                </button>
            </div>
        </div>
    </form>

    <form action="{{ url($place->id . '/place_edit') }}" method='post'>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="form-group delete-button col-md-2 col-xs-12">
            <div class="d-grid gap-2">
                {{-- <input type="submit" class="btn btn-outline-secondary btn-lg" name="delete" value="削除" onClick="delete_alert(event);return false;"> --}}
                <button type="submit" class="btn btn-outline-danger btn-outline btn-lg"
                    onClick="delete_alert(event);return false;">
                    <i class="fa fa-trash"></i> 削 除
                </button>
            </div>
        </div>
    </form>

@endsection
