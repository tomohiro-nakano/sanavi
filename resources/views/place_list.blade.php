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

    @if (session('delete'))
        <div class="alert alert-danger text-center fw-bold">
            {{ session('delete') }}
        </div>
    @endif

    <div class="js-scrollable">
        <div class="scroll-table">
            <table class="table table-bordered table-striped task-table table-hover">
                <thead class="thead-dark">
                    <tr class="tr-sort">
                        <th class="tr-id">@sortablelink('id', 'ID')</th>
                        <th class="tr-img">画 像</th>
                        <th class="tr-place-name">@sortablelink('place_name', '施 設 名')</th>
                        <th class="tr-room-temp">@sortablelink('room_temp', '室 温')</th>
                        <th class="tr-water-temp">@sortablelink('water_temp', '水 温')</th>
                        <th class="tr-price">@sortablelink('price', '料 金')</th>
                        <th class="tr-address">住 所</th>
                        <th></th>
                    </tr>

                    @foreach ($place_lists as $place_list)
                        <tr>
                            <td>{{ $place_list->id }}</td>
                            @if ($place_list->place_image != '')
                                <td><a href="{{ url('/detail/' . $place_list->id) }}"><img class="place-img-list"
                                            src="{{ 'img/place_image/' . $place_list->place_image }}"></a></td>
                            @else
                                <td><a href="{{ url('/detail/' . $place_list->id) }}"><img class="place-img-list"
                                            src='img/place_image/no_image.png'></a></td>
                            @endif
                            <td><a class="text-dark link-underline"
                                    href="{{ url('/detail/' . $place_list->id) }}">{{ $place_list->place_name }}</a>
                            </td>
                            <td>{{ $place_list->room_temp }}℃</td>
                            <td>{{ $place_list->water_temp }}℃</td>
                            <td>{{ number_format($place_list->price) }}円</td>
                            <td class="td-address">{{ $place_list->address }}</td>
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
                            {{ $place_lists->appends(request()->query())->links() }}
                            {{-- {{ $test_forms->appends(request()->query())->links() }} --}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <script src="scroll-hint.js"></script>
@endsection
