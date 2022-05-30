@extends('layouts.app')

<title>Sanaviとは？ - Sanavi - サウナレビューサイト</title>

@section('content')
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <img src="img/logo/logo_transparent.png" width="300px" height="300px">
                    <h4>TESTページです。</h4>
                    </p>
                </div>
            </div>
        </div>
@endsection


{{-- <table class="table table-bordered table-striped task-table table-hover"> --}}


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


<!--
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
@endforeach --}} -->
