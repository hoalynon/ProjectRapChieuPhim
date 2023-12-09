

<?php $__env->startSection('header'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" value="<?php echo e($room->r_id); ?>" placeholder="Nhập ID phòng chiếu" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Sức Chứa</label>
                <input type="number" name="capacity" value="<?php echo e($room->r_capacity); ?>" min="0" placeholder="Nhập sức chứa phòng chiếu">
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Phòng Chiếu</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\cinema\resources\views/admin/rooms/edit.blade.php ENDPATH**/ ?>