@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Mã năm</th>
                <th>Số năm</th>
                <th>Tổng số vé</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::year($years) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $years->links('pagination::bootstrap-4') !!}
    </div>
@endsection