

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Thể Loại</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::type($types); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $types->links('pagination::bootstrap-4'); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\cinema\resources\views/admin/types/list.blade.php ENDPATH**/ ?>