$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){

    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')){
        $.ajax({
            type: 'delete',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function(result){
                if (result.error == false){
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert(result.message);
                }
            }
        })
    }
}

function removeRow2(id, id2, url){

    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')){
        $.ajax({
            type: 'delete',
            datatype: 'JSON',
            data: {id, id2},
            url: url,
            success: function(result){
                if (result.error == false){
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert(result.message);
                }
            }
        })
    }
}

function removeRow3(id, id2, id3, url){

    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')){
        $.ajax({
            type: 'delete',
            datatype: 'JSON',
            data: {id, id2, id3},
            url: url,
            success: function(result){
                if (result.error == false){
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert(result.message);
                }
            }
        })
    }
}

/* Upload file poster*/
$('#upload_poster').change(function(){

    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form, 
        url: '/admin/movies/upload/poster',
        success: function(results){
            if (results.error == false){
                $('#show_poster').html('<a href="' + results.url + '" target="_blank">' + 
                    '<img src="' + results.url + '" width="100px"></a>');

                $('#link_poster').val(results.url);
            }
            else {
                alert("Upload File Poster Lỗi");
            }
        }
    });
});

/* Upload file trailer*/
$('#upload_trailer').change(function(){

    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form, 
        url: '/admin/movies/upload/trailer',
        success: function(results){
            if (results.error == false){
                $('#show_trailer').html('<a href="' + results.url + '" target="_blank">Đường dẫn trailer</a>');

                $('#link_trailer').val(results.url);
            }
            else {
                alert("Upload File Trailer Lỗi");
            }
        }
    });
});