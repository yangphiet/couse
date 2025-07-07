<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Danh Mục', 'Số Lượng'],
          <?php
          foreach ($listsp as $listsanpham) {
            extract($listsanpham);
            echo "['$tendm', $soluong],";
          }
          ?>
        ]);

        var options = {
          title: 'Thống Kê Danh Mục',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class="container mt20 row2">
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
  </body>
</html>
