@extends('admin.main')

@section('content')
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" value="{{ old('id') }}" placeholder="Nhập ID phòng chiếu">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Sức Chứa</label>
                <input type="number" name="capacity" value="{{ old('capacity') }}" min="0" placeholder="Nhập sức chứa phòng chiếu">
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Phòng Chiếu</button>
    </div>

    @csrf

    </form>

@endsection
