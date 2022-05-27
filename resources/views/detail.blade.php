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
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　総合評価</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　ととのい度</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　温度評価</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　水温評価</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　外気浴（休憩）評価</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
        </div>
    </div>
    <div class="form-group col-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text-2"><i class="fa fa-star-half-o" aria-hidden="true"></i>　混雑度</div>
            </div>
            <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
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
    @if (count($posts) == 0)
        <h3 class="text-center">現在、サ活投稿はありません。<br>ぜひ、サ活投稿をしてください！</h3>
    @else
        <h2 class="text-center">{{ $place->place_name }}　サ活投稿一覧</h2>
        <table class="table table-bordered table-striped task-table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ユーザー名</th>
                    <th>総合評価</th>
                    <th>ととのい度</th>
                    <th>室温評価</th>
                    <th>水温評価</th>
                    <th>外気浴（休憩）評価</th>
                    <th>混雑度</th>
                    <th>訪問日</th>
                    <th>感想</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>

                {{-- <td>
                    <div id="star-read">
                        <star-read :rating="{{ posts }}" :read-only="true" :increment="0.01">
                        </star-read>
                    </div>
                </td> --}}


                {{-- コンポーネントに$posts配列を渡す --}}
                {{-- <star-read v-bind:posts="{{ ($posts) }}"> --}}

                {{-- :posts="@json({{ $posts }})" --}}
                {{-- v-bind:categories="{{ ($categories) }}" --}}

                {{-- <td>
                    <div id="star-read">
                        <star-read :rating="{{ posts->all_score }}" :read-only="true" :increment="0.01">
                        </star-read>
                    </div>
                </td> --}}



                {{-- @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->user_name }}</td>

                        <td id="star-all">
                            <star-all :rating="{{ $post->all_score }}" :read-only="true" :increment="0.01">
                            </star-all>
                        </td>
                        <td>
                            <div id="star-totonoi">
                                <star-totonoi :rating="{{ $post->totonoi_score }}" :read-only="true"
                                    :increment="0.01"></star-totonoi>
                            </div>
                        </td>
                        <td>
                            <div id="star-rt">
                                <star-rt :rating="{{ $post->rt_score }}" :read-only="true"
                                    :increment="0.01"></star-rt>
                            </div>
                        </td>
                        <td>
                            <div id="star-wt">
                                <star-wt :rating="{{ $post->wt_score }}" :read-only="true"
                                    :increment="0.01"></star-wt>
                            </div>
                        </td>
                        <td>
                            <div id="star-rest">
                                <star-rest :rating="{{ $post->rest_score }}" :read-only="true"
                                    :increment="0.01"></star-rest>
                            </div>
                        </td>
                        <td>
                            <div id="star-cong">
                                <star-cong :rating="{{ $post->cong_score }}" :read-only="true"
                                    :increment="0.01"></star-cong>
                            </div>
                        </td>




                        <td>{{ $post->all_score }}点</td>
                        <td>{{ $post->totonoi_score }}点</td>
                        <td>{{ $post->rt_score }}点</td>
                        <td>{{ $post->wt_score }}点</td>
                        <td>{{ $post->rest_score }}点</td>
                        <td>{{ $post->cong_score }}点</td>
                        <td>{{ $post->visit_date }}</td>
                        <td>{{ $post->comment }}</td>
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
                @endforeach --}}
    @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="bg-light pb-0">
                {{ $posts->links() }}
            </td>
        </tr>
    </tfoot>
    </table>

    <div class="form-group col-12">
        <div class="d-grid gap-2">
            <a href="{{ url('/place_list') }}" class="btn btn-outline-secondary btn-outline btn-lg">
                <i class="fa fa-mail-reply"></i>　一覧に戻る
            </a>
        </div>
    </div>

@endsection
