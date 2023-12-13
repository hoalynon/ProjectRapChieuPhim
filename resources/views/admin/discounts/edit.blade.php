@extends('admin.main')

@section('content')
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Khuyến Mãi</label>
                <input type="text" name="id" value="{{ $discount->dis_id }}" placeholder="Nhập id CTKM" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Khuyến Mãi</label>
                <input type="text" name="name" value="{{ $discount->dis_name }}" placeholder="Nhập tên CTKM">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày bắt đầu</label>
                <input type="date" name="start" value="{{ $discount->dis_start }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày kết thúc</label>
                <input type="date" name="end" value="{{ $discount->dis_end }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Phần trăm khuyến mãi</label>
            <input type="number" step="0.01" min="0" max="100" name="percent" value="{{ $discount->dis_percent }}">
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Khuyến Mãi</button>
    </div>

    @csrf

    </form>

@endsection
