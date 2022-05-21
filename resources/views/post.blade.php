@extends('layouts.app')

@section('title', 'サ活投稿')

@section('content')

    <form action="{{ url($place->id . '/post') }}" method="post" class="row">
        {{ csrf_field() }}
        <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
        <input type='hidden' name='place_id' value="{{ $place->id }}">
        @include('common.errors')

        <div>
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-check-square-o" aria-hidden="true"></i>　施 設 名</div>
                        </div>
                        <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->place_name }}">
                    </div>
                </div>
            </div>
        </div>
        <div id="star-all">
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　総合評価</div>
                        </div>
                        <star-all :star-size="25" :increment="0.5" text-class="custom-text"
                            :rating="3.0" :round-start-rating="false" @rating-selected="setRating"
                            class="form-control bg-light"></star-all>
                        <input type="hidden" name="all_score" :value="this.rating" />
                    </div>
                </div>
            </div>
        </div>
        <div id="star-totonoi">
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　ととのい度</div>
                        </div>
                        <star-totonoi :star-size="25" :increment="0.5" text-class="custom-text"
                            :rating="3.0" :round-start-rating="false" @rating-selected="setRating"
                            class="form-control bg-light"></star-totonoi>
                        <input type="hidden" name="totonoi_score" :value="this.rating" />
                    </div>
                </div>
            </div>
        </div>
        <div id="star-rt">
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　温度評価</div>
                        </div>
                        <star-rt :star-size="25" :increment="0.5" text-class="custom-text"
                            :rating="3.0" :round-start-rating="false" @rating-selected="setRating"
                            class="form-control bg-light"></star-rt>
                        <input type="hidden" name="rt_score" :value="this.rating" />
                    </div>
                </div>
            </div>
        </div>
        <div id="star-wt">
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　水風呂評価</div>
                        </div>
                        <div>
                            <star-wt :star-size="25" :increment="0.5" text-class="custom-text"
                                :rating="3.0" :round-start-rating="false" @rating-selected="setRating"
                                class="form-control bg-light">
                            </star-wt>
                            <input type="hidden" name="wt_score" :value="this.rating" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="star-rest">
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　外気浴（休憩）評価
                            </div>
                        </div>
                        <div>
                            <star-rest :star-size="25" :increment="0.5" text-class="custom-text"
                                :rating="3.0" :round-start-rating="false" @rating-selected="setRating"
                                class="form-control bg-light">
                            </star-rest>
                            <input type="hidden" name="rest_score" :value="this.rating" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="star-cong">
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　混 雑 度</div>
                        </div>
                        <div>
                            <star-cong :star-size="25" :increment="0.5" text-class="custom-text"
                                :rating="3.0" :round-start-rating="false" @rating-selected="setRating"
                                class="form-control bg-light">
                            </star-cong>
                            <input type="hidden" name="cong_score" :value="this.rating" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-calendar-o"></i>　訪 問 日</div>
                        </div>
                        <input type="date" name="visit_date" class="form-control datetimepicker-input"
                            value="{{ old('visit_date') }}" id="datetimepicker" data-toggle="datetimepicker"
                            data-target="#datetimepicker">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text-2"><i class="fa fa-commenting-o" aria-hidden="true"></i>　感　想</div>
                        </div>
                        <textarea name="comment" cols="100" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-button">
            <div class="form-group col-md-3 col-xs-12">
                <div class="d-grid gap-2">
                    <a href="{{ url('/detail/' . $place->id) }}" class="btn btn-outline-secondary btn-outline btn-lg">
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
        </div>
    </form>

@endsection
