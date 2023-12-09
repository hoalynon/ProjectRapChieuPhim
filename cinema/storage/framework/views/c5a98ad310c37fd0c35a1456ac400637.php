

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 150px">ID Ghế</th>
                <th style="width: 150px">ID Phòng</th>
                <th>Loại Ghế</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::seat($seats); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center" style="height: 200px">
        <?php echo $seats->links('pagination::bootstrap-4'); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\cinema\resources\views/admin/seats/list.blade.php ENDPATH**/ ?>