

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th>Mã tháng</th>
                <th>Số tháng</th>
                <th>Mã năm</th>
                <th>Tổng số vé</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::month($months); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $months->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/revenue/month.blade.php ENDPATH**/ ?>