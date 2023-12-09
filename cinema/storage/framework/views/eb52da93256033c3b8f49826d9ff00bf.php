

<?php $__env->startSection('content'); ?>
<table class="table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Loại tài khoản</th>
            <th style="width: 100px"></th>
        </tr>
    </thead>

    <tbody>
        <?php echo \App\Helpers\Helper::account($accounts); ?>

    </tbody>
</table>
<div class="d-flex justify-content-center">
    <?php echo $accounts->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/accounts/list.blade.php ENDPATH**/ ?>