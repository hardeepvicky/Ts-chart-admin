<html>
    <head>
        <style>
            *{
                padding: 0;
                margin: 0;
            }
            
            #chart_div{
                height: 99vh;
            }
        </style>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            var chart_data = JSON.parse('<?= json_encode($chart_data); ?>');

            for (var i = 1; i < chart_data.length; i++)
            {
                for (var a = 1; a < chart_data[i].length; a++)
                {
                    chart_data[i][a] = parseFloat(chart_data[i][a]);
                }
            }

            function drawChart()
            {
                var data = google.visualization.arrayToDataTable(chart_data);
                var options = JSON.parse('<?= json_encode($options); ?>');
                var chart = new google.visualization.LineChart(document.getElementById("chart_div"));
                chart.draw(data, options);
            }

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        </script>
    </head>

    <body>
        <!--Div that will hold the pie chart-->
        <div id="chart_div"></div>
    </body>
</html>