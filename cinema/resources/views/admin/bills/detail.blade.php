@extends('admin.main')

@section('content')

<form>

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Hóa Đơn: </label>
                <label>{{ $bill->bi_id }}</label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>Ngày Lập: </label>
                <label>{{ $bill->bi_date }}</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">    
                <div class="form-group">
                <label>ID Khách Hàng: </label>
                <label>{{ $bill->cus_id }}</label>
                </div>
            </div>

            <div class="col-md-6">    
                <div class="form-group">
                <label>Tên Khách Hàng: </label>
                <label>{{ $customer->cus_name }}</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">    
                <div class="form-group">
                <label>ID các vé: </label><br>
                    <select name="ticket" style="width:150px; height: 30px">
                        @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->tk_id }}"> {{ $ticket->tk_id }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">    
                <div class="form-group">
                <label>Tên các khuyến mãi đã dùng: </label><br>
                    <select name="discount" style="width:150px; height: 30px">
                        @foreach ($discounts as $discount)
                        <option value="{{ $discount->dis_id }}"> {{ $discount->dis_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
 

        <div class="row">
            <div class="col-md-6">    
                <div class="form-group">
                <label>Tổng số vé: </label>
                <label>{{ $bill->tk_count }}</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tổng tiền: </label>
                <label>{{ $bill->bi_value }}</label>
            </div>
        </div>


    </div>


    <div class="card-footer">
        
    </div>

    @csrf

    </form>

@endsection