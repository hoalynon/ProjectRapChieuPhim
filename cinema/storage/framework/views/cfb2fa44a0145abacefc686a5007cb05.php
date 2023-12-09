

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 100px">ID Hóa Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>Ngày lập</th>
                <th>Số Vé</th>
                <th>Tổng Tiền</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::bill($bills); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $bills->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\cinema\resources\views/admin/bills/list.blade.php ENDPATH**/ ?>