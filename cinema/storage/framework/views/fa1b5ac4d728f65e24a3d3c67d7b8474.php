

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Sức Chứa</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::room($rooms); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $rooms->links('pagination::bootstrap-4'); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\git\ProjectRapChieuPhim\cinema\resources\views/admin/rooms/list.blade.php ENDPATH**/ ?>