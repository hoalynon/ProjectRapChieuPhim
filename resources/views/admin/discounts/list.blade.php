@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Khuyến Mãi</th>
                <th>Bắt Đầu</th>
                <th>Kết Thúc</th>
                <th>% Khuyến Mãi</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::discount($discounts) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $discounts->links('pagination::bootstrap-4') !!}
    </div>
@endsection