

<?php $__env->startSection('content'); ?>

<form action="" method="POST">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label>ID Ghế</label><br>
                <input type="text" name="id" value="<?php echo e(old('id')); ?>" placeholder="Nhập id ghế">
                </div>
            </div>

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
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Loại Ghế</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="standard" type="radio" id="type_standard" name="type" checked="">
                        <label for="type_standard" class="custom-control-label">Thường</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "vip" type="radio" id="type_vip" name="type">
                        <label for="type_vip" class="custom-control-label">VIP</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value = "couple" type="radio" id="type_couple" name="type">
                        <label for="type_couple" class="custom-control-label">Ghế đôi</label>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Ghế</button>
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/seats/add.blade.php ENDPATH**/ ?>