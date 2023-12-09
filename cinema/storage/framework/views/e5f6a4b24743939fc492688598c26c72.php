

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Phim</th>
                <th>Bắt Đầu</th>
                <th>Kết Thúc</th>
                <th>Poster</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>

        <tbody>
            <?php echo \App\Helpers\Helper::movie($movies); ?>

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $movies->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tranh\cinema\resources\views/admin/movies/list.blade.php ENDPATH**/ ?>