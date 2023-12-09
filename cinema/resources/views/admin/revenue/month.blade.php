@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Mã tháng</th>
                <th>Số tháng</th>
                <th>Mã năm</th>
                <th>Tổng số vé</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::month($months) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $months->links('pagination::bootstrap-4') !!}
    </div>
@endsection