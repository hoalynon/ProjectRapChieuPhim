

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID Vé</th>
                <th>ID Slot</th>
                <th>ID Phòng Chiếu</th>
                <th>ID Ghế</th>
                <th>Loại vé</th>
                <th>Tính khả dụng</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::ticket($tickets); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $tickets->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/tickets/list.blade.php ENDPATH**/ ?>