

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" value="<?php echo e(old('id')); ?>" placeholder="Nhập ID phòng chiếu">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Sức Chứa</label>
                <input type="number" name="capacity" value="<?php echo e(old('capacity')); ?>" min="0" placeholder="Nhập sức chứa phòng chiếu">
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Phòng Chiếu</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/rooms/add.blade.php ENDPATH**/ ?>