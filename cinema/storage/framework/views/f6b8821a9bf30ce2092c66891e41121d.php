

<?php $__env->startSection('content'); ?>

<form action="" method="POST">

    <div class="card-body">

                <div class="form-group">
                <label>ID Suất Chiếu</label><br>
                <input type="text" name="id" value="<?php echo e($slot->sl_id); ?>" placeholder="Nhập id suất chiếu" readonly>
                <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Phòng Chiếu</label><br>
                    <select style="width:150px; height: 30px" disabled>
                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($room->r_id); ?>" <?php echo e($room->r_id == $slot->r_id ? 'selected="selected"' : ''); ?>> <?php echo e($room->r_id); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="hidden" name="room" placeholder="ID phòng chiếu" value="<?php echo e($slot->r_id); ?>" readonly>
                    <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tên Phim</label><br>
                    <select style="width:150px; height: 30px" disabled>
                        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($movie->mv_id); ?>"  <?php echo e($slot->mv_id == $movie->mv_id ? 'selected="selected"' : ''); ?>> <?php echo e($movie->mv_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="hidden" name="movie" value="<?php echo e($slot->mv_id); ?>" readonly>
                    <i class="fas fa-ban" style="color: #e60f0f; margin-left: 10px"></i>
                </div>
            </div>
        </div>

                <div class="form-group">
                <label>Thời Điểm Khởi Chiếu</label><br>
                <input type="datetime-local" step="1" name="start" value="<?php echo e($slot->sl_start); ?>">
                </div>

                <div class="form-group">
                <label>Giá Suất Chiếu</label><br>
                <input type="number" step="0.01" min="0" name="price" value="<?php echo e($slot->sl_price); ?>">
                </div>

    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Suất Chiếu</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\cinema\resources\views/admin/slots/edit.blade.php ENDPATH**/ ?>