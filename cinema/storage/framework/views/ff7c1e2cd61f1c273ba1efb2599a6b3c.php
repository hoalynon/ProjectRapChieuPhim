

<?php $__env->startSection('content'); ?>

<form action="" method="POST">

    <div class="card-body">

                <div class="form-group">
                <label>ID Suất Chiếu</label><br>
                <input type="text" name="id" value="<?php echo e(old('id')); ?>" placeholder="Nhập id suất chiếu">
                </div>
 

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Phòng Chiếu</label><br>
                    <select name="room" style="width:150px; height: 30px">
                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($room->r_id); ?>"> <?php echo e($room->r_id); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Phim</label><br>
                    <select name="movie" style="width:150px; height: 30px">
                        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($movie->mv_id); ?>"> <?php echo e($movie->mv_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

                <div class="form-group">
                <label>Thời Điểm Khởi Chiếu</label><br>
                <input type="datetime-local" step="1" name="start" value="<?php echo e(old('start')); ?>">
                </div>

                <div class="form-group">
                <label>Giá Suất Chiếu</label><br>
                <input type="number" step="0.01" min="0" name="price" value="<?php echo e(old('price')); ?>">
                </div>


    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Suất Chiếu</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\git\ProjectRapChieuPhim\cinema\resources\views/admin/slots/add.blade.php ENDPATH**/ ?>