<!Doctype HTML>
<html>
  <head>
    <?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <?php echo $__env->make('user.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>
    <?php echo $__env->yieldContent('content'); ?>
    </body>

    <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>



<?php /**PATH C:\Users\Hoàng\git\ProjectRapChieuPhim\cinema\resources\views/user/main.blade.php ENDPATH**/ ?>