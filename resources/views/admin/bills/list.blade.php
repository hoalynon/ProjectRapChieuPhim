@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 100px">ID Hóa Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>Ngày lập</th>
                <th>Số Vé</th>
                <th>Tổng Tiền</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::bill($bills) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $bills->links('pagination::bootstrap-4') !!}
    </div>
@endsection