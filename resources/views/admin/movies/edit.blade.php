@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="/template/css/dropdown_multiselect.css">
@endsection

@section('content')
    <form action="" method="POST">

        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>ID Phim</label>
                    <input type="text" name="id" value="{{ $movie->mv_id }}" placeholder="Nhập id phim" readonly>
                    <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Tên Phim</label>
                    <input type="text" name="name" value="{{ $movie->mv_name }}" placeholder="Nhập tên phim">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Ngày bắt đầu</label>
                    <input type="date" name="start" value="{{ $movie->mv_start }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Ngày kết thúc dự kiến</label>
                    <input type="date" name="end" value="{{ $movie->mv_end }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Thời lượng</label>
                        <input type="time" step=1 name="duration" value="{{ $movie->mv_duration }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="movie_type">Thể loại</label><br>
                        <div class="wrapper">
                            <button type="button" class="form-control toggle-next ellipsis" id="dropdown_button"></button>
                            <div class="checkboxes" id="Thể loại">
                                <div class="inner-wrap">
                                    @foreach ($types as $type)
                                    <label class="dropdown_label">
                                        <input type="checkbox" value="{{ $type->type_id }}" class="ckkBox val" name="movie_type[]"
                                        @foreach ($chosentypes as $chosentype)
                                            {{$chosentype->type_id == $type->type_id ? 'checked=""' : ''}}
                                        @endforeach
                                        >
                                        <span>{{ $type->type_name}}</span>
                                    </label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Độ tuổi giới hạn</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="13+" type="radio" id="restrict_13" name="restrict"
                            {{$movie->mv_restrict == "13+" ? 'checked=""' : ''}}>
                            <label for="restrict_13" class="custom-control-label">13+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value = "15+" type="radio" id="restrict_15" name="restrict"
                            {{$movie->mv_restrict == "15+" ? 'checked=""' : ''}}>
                            <label for="restrict_15" class="custom-control-label">15+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value = "18+" type="radio" id="restrict_18" name="restrict"
                            {{$movie->mv_restrict == "18+" ? 'checked=""' : ''}}>
                            <label for="restrict_18" class="custom-control-label">18+</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value = "Mọi lứa" type="radio" id="restrict_all" name="restrict"
                            {{$movie->mv_restrict == "Mọi lứa" ? 'checked=""' : ''}}>
                            <label for="restrict_all" class="custom-control-label">Mọi lứa</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Chế độ phụ đề</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Có phụ đề" type="radio" id="caption_phude" name="caption"
                            {{$movie->mv_cap == "Có phụ đề" ? 'checked=""' : ''}}>
                            <label for="caption_phude" class="custom-control-label">Có phụ đề</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value = "Lồng tiếng" type="radio" id="caption_longtieng" name="caption"
                            {{$movie->mv_cap == "Lồng tiếng" ? 'checked=""' : ''}}>
                            <label for="caption_longtieng" class="custom-control-label">Lồng tiếng</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value = "Thuyết minh" type="radio" id="caption_thuyetminh" name="caption"
                            {{$movie->mv_cap == "Thuyết minh" ? 'checked=""' : ''}}>
                            <label for="caption_thuyetminh" class="custom-control-label">Thuyết minh</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Không phụ đề" type="radio" id="caption_khongphude" name="caption"
                            {{$movie->mv_cap == "Không phụ đề" ? 'checked=""' : ''}}>
                            <label for="caption_khongphude" class="custom-control-label">Không phụ đề</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="detail" class="form-control" id="detail">{{ $movie->mv_detail }}</textarea>
            </div>

            <div class="form-group">
                <label>Poster Phim</label>
                <input type="file" class="form-control" id="upload_poster">
                <div id="show_poster">
                    <a href="{{ $movie->mv_link_poster }}" target="_blank">
                        <img src="{{ $movie->mv_link_poster }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="link_poster" id="link_poster" value="{{ $movie->mv_link_poster }}">
            </div>

            <div class="form-group">
                <label>Trailer Phim</label>
                <input type="file" class="form-control" id="upload_trailer">
                <div id="show_trailer">
                    <a href="{{ $movie->mv_link_trailer }}" target="_blank">
                        Đường dẫn link
                    </a>
                </div>
                <input type="hidden" name="link_trailer" id="link_trailer" value="{{ $movie->mv_link_trailer }}">
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật Phim</button>
        </div>

        @csrf

    </form>

@endsection

@section('footer')
    <script src="/template/js/dropdown_multiselect.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#detail' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection