@extends('layouts.app')

@section('title', 'サウナ施設一覧')

@section('content')
    {{-- 追加・更新フラッシュメッセージ --}}
    @if (session('success'))
        <div class="alert alert-success text-center fw-bold">
            {{ session('success') }}
        </div>
    @endif

    @if (session('update'))
        <div class="alert alert-info text-center fw-bold">
            {{ session('update') }}
        </div>
    @endif

    <table class="table table-bordered table-striped task-table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>画像</th>
                <th>施設名</th>
                <th>室温</th>
                <th>水温</th>
                <th>料金</th>
                <th>住所</th>
                <th>編集</th>
                {{-- <th>削除</th> --}}
            </tr>
            @foreach ($place_lists as $place_list)
                <tr>
                    <td>{{ $place_list->id }}</td>
                    @if ($place_list->place_image != '')
                        <td><img class="place-img-list" src="{{ 'img/place_image/' . $place_list->place_image }}"></td>
                    @else
                        <td><img class="place-img-list" src='img/place_image/no_image.png'></td>
                    @endif
                    <td><a class="text-dark"
                            href="{{ url('/place_list/' . $place_list->id . '/detail') }}">{{ $place_list->place_name }}</a>
                    </td>
                    <td>{{ $place_list->room_temp }}℃</td>
                    <td>{{ $place_list->water_temp }}℃</td>
                    <td>{{ number_format($place_list->price) }}円</td>
                    <td>{{ $place_list->address }}</td>
                    <td>
                        <form action="{{ url($place_list->id . '/place_edit') }}" method="get">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-pencil"></i> 編集
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="bg-light pb-0">
                    {{ $place_lists->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
