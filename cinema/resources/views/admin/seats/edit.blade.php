@extends('admin.main')

@section('content')

<form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Ghế</label><br>
                <input type="text" name="id" value="{{ $seat->st_id }}" placeholder="Nhập id ghế" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>ID Phòng Chiếu</label><br>
                    <select name="room" style="width:150px; height: 30px">
                        @foreach ($rooms as $room)
                        <option value="{{ $room->r_id }}" {{ $room->r_id == $seat->r_id ? 'selected="selected"' : '' }}> {{ $room->r_id }}
                        </option>
                        @endforeach
                    </select>
                    <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Loại Ghế</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="standard" type="radio" id="type_standard" name="type"
                        {{ $seat->st_type == "standard" ? 'checked=""' : '' }}>
                        <label for="type_standard" class="custom-control-label">Thường</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "vip" type="radio" id="type_vip" name="type"
                       {{  $seat->st_type == "vip" ? 'checked=""' : '' }}>
                        <label for="type_vip" class="custom-control-label">VIP</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "sweetbox" type="radio" id="type_sweetbox" name="type"
                        {{  $seat->st_type == "sweetbox" ? 'checked=""' : '' }}>
                        <label for="type_sweetbox" class="custom-control-label">SweetBox</label>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Ghế</button>
    </div>

    @csrf

    </form>

@endsection