@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 150px">ID Ghế</th>
                <th style="width: 150px">ID Phòng</th>
                <th>Loại Ghế</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::seat($seats) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center" style="height: 200px">
        {!! $seats->links('pagination::bootstrap-4') !!}
    </div>
@endsection