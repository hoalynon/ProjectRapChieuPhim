@extends('admin.main')

@section('content')

<form action="" method="POST">

    <div class="card-body">

                <div class="form-group">
                <label>ID Suất Chiếu</label><br>
                <input type="text" name="id" value="{{ old('id') }}" placeholder="Nhập id suất chiếu">
                </div>
 

        <div class="row">
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

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Phim</label><br>
                    <select name="movie" style="width:150px; height: 30px">
                        @foreach ($movies as $movie)
                        <option value="{{ $movie->mv_id }}"> {{ $movie->mv_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

                <div class="form-group">
                <label>Thời Điểm Khởi Chiếu</label><br>
                <input type="datetime-local" step="1" name="start" value="{{ old('start') }}">
                </div>

                <div class="form-group">
                <label>Giá Suất Chiếu</label><br>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}">
                </div>


    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Suất Chiếu</button>
    </div>

    @csrf

    </form>

@endsection