

<?php $__env->startSection('content'); ?>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Loại thành viên</th>
            <th>Điểm tích lũy</th>
            <th style="width: 100px"></th>
        </tr>
    </thead>

    <tbody>
        <?php echo \App\Helpers\Helper::customer($customers); ?>

    </tbody>
</table>
<div class="d-flex justify-content-center">
    <?php echo $customers->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\cinema\resources\views/admin/customers/list.blade.php ENDPATH**/ ?>