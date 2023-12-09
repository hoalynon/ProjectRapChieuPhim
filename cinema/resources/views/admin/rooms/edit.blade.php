@extends('admin.main')

@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" value="{{ $room->r_id }}" placeholder="Nhập ID phòng chiếu" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Sức Chứa</label>
                <input type="number" name="capacity" value="{{ $room->r_capacity }}" min="0" placeholder="Nhập sức chứa phòng chiếu">
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Phòng Chiếu</button>
    </div>

    @csrf

    </form>

@endsection

@section('footer')
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection