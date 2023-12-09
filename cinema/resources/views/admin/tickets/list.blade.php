@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID Vé</th>
                <th>ID Slot</th>
                <th>ID Phòng Chiếu</th>
                <th>ID Ghế</th>
                <th>Loại vé</th>
                <th>Tính khả dụng</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::ticket($tickets) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $tickets->links('pagination::bootstrap-4') !!}
    </div>
@endsection