

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 100px">ID Suất Chiếu</th>
                <th style="width: 100px">ID Phòng</th>
                <th>Tên Phim</th>
                <th>Khởi Chiếu</th>
                <th>Kết Thúc</th>
                <th>Giá</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::slot($slots); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $slots->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/slots/list.blade.php ENDPATH**/ ?>