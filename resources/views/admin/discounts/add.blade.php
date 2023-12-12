@extends('admin.main')

@section('content')
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Khuyến Mãi</label>
                <input type="text" name="id" value="{{ old('id') }}" placeholder="Nhập id CTKM">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Khuyến Mãi</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên CTKM">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày bắt đầu</label>
                <input type="date" name="start" value="{{ old('start') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày kết thúc</label>
                <input type="date" name="end" value="{{ old('end') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Phần trăm khuyến mãi</label>
            <input type="number" step="0.01" min="0" max="100" name="percent" value="{{ old('percent') }}">
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Khuyến Mãi</button>
    </div>

    @csrf

    </form>

@endsection
