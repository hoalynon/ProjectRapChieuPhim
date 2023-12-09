

<?php $__env->startSection('head'); ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Năm', 'Số vé', 'Doanh thu'],
            <?php echo $data; ?>
        ]);

        var options = {
          title: 'Biểu đồ đường số vé và doanh thu các năm',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div align="center" id="curve_chart" style="width: 900px; height: 500px"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Hoàng\git\ProjectRapChieuPhim\cinema\resources\views/admin/revenue/linechart_year.blade.php ENDPATH**/ ?>