@extends('layouts.app')

<!-- 1行で指定することも可能 -->
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
                <th>施設名</th>
                <th>訪問日</th>
                <th>総合評価</th>
                <th>ととのい</th>
                <th>温度</th>
                <th>水温</th>
                <th>外気浴（休憩）</th>
                <th>混雑度</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            @foreach ($sanavis as $sanavi)
                <tr>
                    <td>{{ $sanavi->id }}</td>
                    <td><a class="text-dark"
                            href="{{ url('sanavi/' . $sanavi->id . '/detail') }}">{{ $sanavi->item_name }}</a></td>
                    <td>{{ $sanavi->item_purchase }}</td>
                    <td>{{ number_format($sanavi->item_amount) }}円</td>
                    <td>{{ $sanavi->published }}</td>
                    <td>
                        <form action="{{ url('sanavi/' . $sanavi->id . '/edit') }}" method="get">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-pencil"></i> 編集
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ url('sanavi/' . $sanavi->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-trash"></i> 削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="bg-light pb-0">
                    {{ $sanavis->links() }}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

{{-- 以下は省略可能 --}}
{{ Debugbar::log($sanavis->toArray()) }}
