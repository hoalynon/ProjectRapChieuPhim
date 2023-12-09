

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Khuyến Mãi</label>
                <input type="text" name="id" value="<?php echo e($discount->dis_id); ?>" placeholder="Nhập id CTKM">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Khuyến Mãi</label>
                <input type="text" name="name" value="<?php echo e($discount->dis_name); ?>" placeholder="Nhập tên CTKM">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày bắt đầu</label>
                <input type="date" name="start" value="<?php echo e($discount->dis_start); ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Ngày kết thúc</label>
                <input type="date" name="end" value="<?php echo e($discount->dis_end); ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Phần trăm khuyến mãi</label>
            <input type="number" step="0.01" min="0" max="100" name="percent" value="<?php echo e($discount->dis_percent); ?>">
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Khuyến Mãi</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/discounts/edit.blade.php ENDPATH**/ ?>