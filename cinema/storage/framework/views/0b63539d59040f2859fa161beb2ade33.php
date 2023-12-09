

<?php $__env->startSection('content'); ?>

<form>

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Hóa Đơn: </label>
                <label><?php echo e($bill->bi_id); ?></label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>Ngày Lập: </label>
                <label><?php echo e($bill->bi_date); ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">    
                <div class="form-group">
                <label>ID Khách Hàng: </label>
                <label><?php echo e($bill->cus_id); ?></label>
                </div>
            </div>

            <div class="col-md-6">    
                <div class="form-group">
                <label>Tên Khách Hàng: </label>
                <label><?php echo e($customer->cus_name); ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">    
                <div class="form-group">
                <label>ID các vé: </label><br>
                    <select name="ticket" style="width:150px; height: 30px">
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ticket->tk_id); ?>"> <?php echo e($ticket->tk_id); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">    
                <div class="form-group">
                <label>Tên các khuyến mãi đã dùng: </label><br>
                    <select name="discount" style="width:150px; height: 30px">
                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($discount->dis_id); ?>"> <?php echo e($discount->dis_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

        </div>
 

        <div class="row">
            <div class="col-md-6">    
                <div class="form-group">
                <label>Tổng số vé: </label>
                <label><?php echo e($bill->tk_count); ?></label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Tổng tiền: </label>
                <label><?php echo e($bill->bi_value); ?></label>
            </div>
        </div>


    </div>


    <div class="card-footer">
        
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/bills/detail.blade.php ENDPATH**/ ?>