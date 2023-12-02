@extends('admin.main')

@section('content')

<form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Ghế</label><br>
                <input type="text" name="id" value="{{ old('id') }}" placeholder="Nhập id ghế">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>ID Phòng Chiếu</label><br>
                    <select name="room" style="width:150px; height: 30px">
                        @foreach ($rooms as $room)
                        <option value="{{ $room->r_id }}"> {{ $room->r_id }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Loại Ghế</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="standard" type="radio" id="type_standard" name="type" checked="">
                        <label for="type_standard" class="custom-control-label">Thường</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "vip" type="radio" id="type_vip" name="type">
                        <label for="type_vip" class="custom-control-label">VIP</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "couple" type="radio" id="type_couple" name="type">
                        <label for="type_couple" class="custom-control-label">Ghế đôi</label>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Ghế</button>
    </div>

    @csrf

    </form>

@endsection