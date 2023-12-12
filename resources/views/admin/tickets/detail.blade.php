@extends('admin.main')

@section('content')

<form>

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Vé: </label>
                <label>{{ $ticket->tk_id }}</label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Phim: </label>
                <label>{{ $ticket->mv_id }}</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Suất Chiếu: </label>
                <label>{{ $ticket->sl_id }}</label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Phòng Chiếu: </label>
                <label>{{ $ticket->r_id }}</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Ghế: </label>
                <label>{{ $ticket->st_id }}</label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>Loại vé: </label>
                <label>{{ $ticket->tk_type }}</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Hóa đơn: </label>
                <label>{{ $ticket->bi_id }}</label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>Giá vé: </label>
                <label>{{ $ticket->tk_value }}</label>
                </div>
            </div>
        </div>


                <div class="form-group">
                <label>Tính hiệu lực: </label>
                <label>{{ $ticket->tk_available == 0 ? "Không" : "Có" }}</label>
                </div>

    </div>


    <div class="card-footer">
        
    </div>

    @csrf

    </form>

@endsection