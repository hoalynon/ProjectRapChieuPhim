@extends('admin.main')

@section('content')

<form action="" method="POST">

    <div class="card-body">

                <div class="form-group">
                <label>ID Suất Chiếu</label><br>
                <input type="text" name="id" value="{{ $slot->sl_id }}" placeholder="Nhập id suất chiếu" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Phòng Chiếu</label><br>
                    <select style="width:150px; height: 30px" disabled>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->r_id }}" {{ $room->r_id == $slot->r_id ? 'selected="selected"' : '' }}> {{ $room->r_id }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="room" placeholder="ID phòng chiếu" value="{{ $slot->r_id }}" readonly>
                    <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Phim</label><br>
                    <select style="width:150px; height: 30px" disabled>
                        @foreach ($movies as $movie)
                        <option value="{{ $movie->mv_id }}"  {{ $slot->mv_id == $movie->mv_id ? 'selected="selected"' : '' }}> {{ $movie->mv_name }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="movie" value="{{ $slot->mv_id }}" readonly>
                    <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>
        </div>

                <div class="form-group">
                <label>Thời Điểm Khởi Chiếu</label><br>
                <input type="datetime-local" step="1" name="start" value="{{ $slot->sl_start }}">
                </div>

                <div class="form-group">
                <label>Giá Suất Chiếu</label><br>
                <input type="number" step="0.01" min="0" name="price" value="{{ $slot->sl_price }}">
                </div>

    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Suất Chiếu</button>
    </div>

    @csrf

    </form>

@endsection