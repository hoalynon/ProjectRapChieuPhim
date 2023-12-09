@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 100px">ID Suất Chiếu</th>
                <th style="width: 100px">ID Phòng</th>
                <th>Tên Phim</th>
                <th>Khởi Chiếu</th>
                <th>Kết Thúc</th>
                <th>Giá</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::slot($slots) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $slots->links('pagination::bootstrap-4') !!}
    </div>
@endsection