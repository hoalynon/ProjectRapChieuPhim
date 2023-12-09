

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
                <input type="text" name="id" value="<?php echo e($type->type_id); ?>" placeholder="Nhập ID thể loại phim">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Thể Loại</label>
                <input type="text" name="name" value="<?php echo e($type->type_name); ?>" placeholder="Nhập tên thể loại phim">
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Thể Loại</button>
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
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/types/edit.blade.php ENDPATH**/ ?>