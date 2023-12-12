@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Sức Chứa</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::room($rooms) !!}
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $rooms->links('pagination::bootstrap-4') !!}
    </div>
@endsection