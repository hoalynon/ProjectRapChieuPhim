@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Loại thành viên</th>
            <th>Điểm tích lũy</th>
            <th style="width: 100px"></th>
        </tr>
    </thead>

    <tbody>
        {!! \App\Helpers\Helper::customer($customers) !!}
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $customers->links('pagination::bootstrap-4') !!}
</div>
@endsection