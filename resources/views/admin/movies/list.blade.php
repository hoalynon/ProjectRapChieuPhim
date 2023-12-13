@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Phim</th>
                <th>Bắt Đầu</th>
                <th>Kết Thúc</th>
                <th>Poster</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::movie($movies) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $movies->links('pagination::bootstrap-4') !!}
    </div>
@endsection