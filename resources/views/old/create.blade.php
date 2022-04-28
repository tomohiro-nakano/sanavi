    @extends('layouts.app')

    @section('title', 'サ活投稿')

    @section('content')

        <form action="{{ url('sanavi') }}" method="post" class="row">
            {{ csrf_field() }}
            <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">

            @include('common.errors')


            <div class="form-group col-md-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-book"></i>　施設名</div>
                    </div>
                    <input type="text" name="item_name" class="form-control" value="{{ old('item_name') }}" autofocus>
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i>　温度</div>
                    </div>
                    <input type="text" maxlength="3" name="room_temp" class="form-control"
                        value="{{ old('room_temp') }}" autofocus>
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i>　水温</div>
                    </div>
                    <input type="text" maxlength="3" name="water_temp" class="form-control"
                        value="{{ old('water_temp') }}" autofocus>
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i>　総合評価</div>
                    </div>
                    {{-- <select class="custom-select form-control" name="item_purchase">
                        <option selected>選択してください</option>
                        @for ($i = 1; $i <= 5; $i = $i + 0.1)
                            @if (old('item_purchase') == $i)
                                <option value="{{ $i }}" selected>{{ $i }}点</option>
                            @else
                                <option value="{{ $i }}">{{ $i }}点</option>
                            @endif
                        @endfor
                    </select> --}}
                    <div id="star" name="all_score">
                        <star-rating :star-size="25" :increment="0.5" text-class="custom-text" :rating="3.0" :round-start-rating="false" ></star-rating>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-money"></i>　料　金</div>
                    </div>
                    <input type="number" name="item_amount" class="form-control" placeholder="例：3000"
                        value="{{ old('item_amount') }}">
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-calendar-o"></i>　訪問日</div>
                    </div>
                    <input type="date" name="published" class="form-control datetimepicker-input"
                        value="{{ old('published') }}" id="datetimepicker" data-toggle="datetimepicker"
                        data-target="#datetimepicker">
                </div>
            </div>
            <div class="form-group col-3">
                <div class="d-grid gap-2">
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">
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
