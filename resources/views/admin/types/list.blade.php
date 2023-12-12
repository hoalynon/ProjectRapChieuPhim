@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Thể Loại</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::type($types) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $types->links('pagination::bootstrap-4') !!}
    </div>
@endsection