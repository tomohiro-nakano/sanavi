@extends('layouts.app')

@section('title', 'サウナ施設詳細')

@section('content')
    {{-- 追加・更新フラッシュメッセージ --}}
    @if (session('success'))
        <div class="alert alert-success text-center fw-bold">
            {{ session('success') }}
        </div>
    @elseif (session('update'))
        <div class="alert alert-info text-center fw-bold">
            {{ session('update') }}
        </div>
    @elseif (session('delete'))
        <div class="alert alert-dark text-center fw-bold">
            {{ session('delete') }}
        </div>
    @endif

    <div class="form-group col-12">
        <div class="d-grid gap-2">
            <a href="{{ url($place->id . '/post') }}" class="btn btn-success btn-outline btn-lg">
                <i class=""></i>　サ活投稿
            </a>
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-check-square-o" aria-hidden="true"></i>　施 設 名</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->place_name }}">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>　室　温
                </div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->room_temp }}℃">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-tint" aria-hidden="true"></i>　水　温</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->water_temp }}℃">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-money"></i>　料　金</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px"
                value="{{ number_format($place->price) }}円">
        </div>
    </div>
    <div id="star-all">
        <div class="form-group col-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　総合評価</div>
                </div>
                <star-all :star-size="25"  :read-only="true" :increment="0.5" text-class="custom-text" :rating="{{ $all_avg }}"
                    :round-start-rating="false" @rating-selected="setRating" class="form-control bg-light"></star-all>
            </div>
        </div>
    </div>
    <div id="star-totonoi">
        <div class="form-group col-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　ととのい度</div>
                </div>
                <star-totonoi :star-size="25"  :read-only="true" :increment="0.5" text-class="custom-text" :rating="{{ $totonoi_avg }}"
                :round-start-rating="false" @rating-selected="setRating" class="form-control bg-light"></star-totonoi>
            </div>
        </div>
    </div>
    <div id="star-rt">
        <div class="form-group col-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　温度評価</div>
                </div>
                <star-rt :star-size="25"  :read-only="true" :increment="0.5" text-class="custom-text" :rating="{{ $rt_avg }}"
                :round-start-rating="false" @rating-selected="setRating" class="form-control bg-light"></star-rt>
            </div>
        </div>
    </div>
    <div id="star-wt">
        <div class="form-group col-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　水温評価</div>
                </div>
                <star-wt :star-size="25"  :read-only="true" :increment="0.5" text-class="custom-text" :rating="{{ $wt_avg }}"
                :round-start-rating="false" @rating-selected="setRating" class="form-control bg-light"></star-wt>
            </div>
        </div>
    </div>
    <div id="star-rest">
        <div class="form-group col-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　外気浴（休憩）評価</div>
                </div>
                <star-rest :star-size="25"  :read-only="true" :increment="0.5" text-class="custom-text" :rating="{{ $rest_avg }}"
                :round-start-rating="false" @rating-selected="setRating" class="form-control bg-light"></star-rest>
            </div>
        </div>
    </div>
    <div id="star-cong">
        <div class="form-group col-12">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　混雑度</div>
                </div>
                <star-cong :star-size="25"  :read-only="true" :increment="0.5" text-class="custom-text" :rating="{{ $cong_avg }}"
                :round-start-rating="false" @rating-selected="setRating" class="form-control bg-light"></star-cong>
            </div>
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-map-marker" aria-hidden="true"></i>　住　所</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->address }}">
        </div>
    </div>


    {{-- サ活投稿一覧表示 --}}
    <div id="example-vue">
        @if (count($posts) == 0)
            <h3 class="text-center">現在、サ活投稿はありません。<br>ぜひ、サ活投稿をしてください！</h3>
        @else
            <h2 class="text-center">{{ $place->place_name }}　サ活投稿一覧</h2>
            <div class="js-scrollable">
                <div class="scroll-table">
                    <table class="table table-bordered table-striped task-table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="th-star-read">ユーザー名</th>
                                <th class="th-star-read">総合評価</th>
                                <th class="th-star-read">ととのい度</th>
                                <th class="th-star-read">室温評価</th>
                                <th class="th-star-read">水温評価</th>
                                <th class="th-star-read">外気浴（休憩）評価</th>
                                <th class="th-star-read">混雑度</th>
                                <th class="th-star-read">訪問日</th>
                                <th class="th-star-read">感想</th>
                                <th class="th-star-read">編集</th>
                                <th class="th-star-read">削除</th>
                            </tr>


                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->user_name }}</td>
                                    <td class="td-star-read">
                                        <example-component :post='@json($post->all_score)'></example-component>
                                    </td>
                                    <td class="td-star-read">
                                        <example-component :post='@json($post->totonoi_score)'></example-component>
                                    </td>
                                    <td class="td-star-read">
                                        <example-component :post='@json($post->rt_score)'></example-component>
                                    </td>
                                    <td class="td-star-read">
                                        <example-component :post='@json($post->wt_score)'></example-component>
                                    </td>
                                    <td class="td-star-read">
                                        <example-component :post='@json($post->rest_score)'></example-component>
                                    </td>
                                    <td class="td-star-read">
                                        <example-component :post='@json($post->cong_score)'></example-component>
                                    </td>
                                    <td class="th-star-read">{{ $post->visit_date }}</td>
                                    <td class="th-star-read">{{ $post->comment }}</td>
                                    <td>
                                        <form action="{{ url($post->id . '/post_edit') }}" method="get">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-pencil"></i> 編集
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('/detail/' . $post->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-trash"></i> 削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="bg-light pb-0">
                    {{ $posts->links() }}
                </td>
            </tr>
        </tfoot>
    </div>


    <div class="form-group col-12">
        <div class="d-grid gap-2">
            <a href="{{ url('/place_list') }}" class="btn btn-outline-secondary btn-outline btn-lg">
                <i class="fa fa-mail-reply"></i>　一覧に戻る
            </a>
        </div>
    </div>

@endsection
