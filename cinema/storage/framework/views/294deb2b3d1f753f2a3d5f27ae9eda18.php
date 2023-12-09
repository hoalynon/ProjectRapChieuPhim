

<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="/template/css/dropdown_multiselect.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Phim</label><br>
                <input type="text" name="id" value="<?php echo e(old('id')); ?>" placeholder="Nhập id phim">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Phim</label><br>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Nhập tên phim">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày bắt đầu</label><br>
                <input type="date" name="start" value="<?php echo e(old('start')); ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày kết thúc dự kiến</label><br>
                <input type="date" name="end" value="<?php echo e(old('end')); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Thời lượng</label><br>
                    <input type="time" step=1 name="duration" value="00:00:00">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="movie_type">Thể loại</label><br>
                    <div class="wrapper">
                        <button type="button" class="form-control toggle-next ellipsis" id="dropdown_button"></button>
                        <div class="checkboxes" id="Thể loại">
                            <div class="inner-wrap">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="dropdown_label">
                                    <input type="checkbox" value="<?php echo e($type->type_id); ?>" class="ckkBox val" name="movie_type[]">
                                    <span><?php echo e($type->type_name); ?></span>
                                </label><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <input class="custom-control-input" value="13+" type="radio" id="restrict_13" name="restrict" checked="">
                        <label for="restrict_13" class="custom-control-label">13+</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "15+" type="radio" id="restrict_15" name="restrict">
                        <label for="restrict_15" class="custom-control-label">15+</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "18+" type="radio" id="restrict_18" name="restrict">
                        <label for="restrict_18" class="custom-control-label">18+</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "Mọi lứa" type="radio" id="restrict_all" name="restrict">
                        <label for="restrict_all" class="custom-control-label">Mọi lứa</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Chế độ phụ đề</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="Có phụ đề" type="radio" id="caption_phude" name="caption" checked="">
                        <label for="caption_phude" class="custom-control-label">Có phụ đề</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "Lồng tiếng" type="radio" id="caption_longtieng" name="caption">
                        <label for="caption_longtieng" class="custom-control-label">Lồng tiếng</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "Thuyết minh" type="radio" id="caption_thuyetminh" name="caption">
                        <label for="caption_thuyetminh" class="custom-control-label">Thuyết minh</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="Không phụ đề" type="radio" id="caption_khongphude" name="caption">
                        <label for="caption_khongphude" class="custom-control-label">Không phụ đề</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="detail" class="form-control" id="detail"><?php echo e(old('detail')); ?></textarea>
        </div>

        <div class="form-group">
            <label>Poster Phim</label>
            <input type="file" class="form-control" id="upload_poster">
            <div id="show_poster">

            </div>
            <input type="hidden" name="link_poster" id="link_poster">
        </div>

        <div class="form-group">
            <label>Trailer Phim</label>
            <input type="file" class="form-control" id="upload_trailer">
            <div id="show_trailer">
                
            </div>
            <input type="hidden" name="link_trailer" id="link_trailer">
        </div>

    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Phim</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="/template/js/dropdown_multiselect.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#detail' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\git\ProjectRapChieuPhim\cinema\resources\views/admin/movies/add.blade.php ENDPATH**/ ?>