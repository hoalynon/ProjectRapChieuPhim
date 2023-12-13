@extends('admin.main')

@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tháng', 'Số vé', 'Doanh thu'],
            <?php echo $data; ?>
        ]);

        var options = {
          title: 'Biểu đồ đường số vé và doanh thu các tháng',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

@endsection

@section('content')

    <div align="center" id="curve_chart" style="width: 900px; height: 500px"></div>

@endsection
