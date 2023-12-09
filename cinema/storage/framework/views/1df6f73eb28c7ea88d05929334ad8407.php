

<?php $__env->startSection('content'); ?>

<form>

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Vé: </label>
                <label><?php echo e($ticket->tk_id); ?></label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Phim: </label>
                <label><?php echo e($ticket->mv_id); ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Suất Chiếu: </label>
                <label><?php echo e($ticket->sl_id); ?></label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Phòng Chiếu: </label>
                <label><?php echo e($ticket->r_id); ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Ghế: </label>
                <label><?php echo e($ticket->st_id); ?></label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>Loại vé: </label>
                <label><?php echo e($ticket->tk_type); ?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">  
                <div class="form-group">
                <label>ID Hóa đơn: </label>
                <label><?php echo e($ticket->bi_id); ?></label>
                </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                <label>Giá vé: </label>
                <label><?php echo e($ticket->tk_value); ?></label>
                </div>
            </div>
        </div>


                <div class="form-group">
                <label>Tính hiệu lực: </label>
                <label><?php echo e($ticket->tk_available == 0 ? "Không" : "Có"); ?></label>
                </div>

    </div>


    <div class="card-footer">
        
    </div>

    <?php echo csrf_field(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/tickets/detail.blade.php ENDPATH**/ ?>