$(function(){
  $.ajax({
    url: 'http://localhost/studentMarks/phpIncludes/chart_data.php',
    type: 'GET',
    success : function(data) {
      chartData = data;
      var chartProperties = {
        "caption": "Students Result Analysis",
        "xAxisName": "Student Registeration Number",
        "yAxisName": "Marks Scored",
        "rotatevalues": "1",
        "theme": "zune"
      };
      apiChart = new FusionCharts({
        type: 'bar2d',
        renderAt: 'chart-container',
        width: '550',
        height: '350',
        dataFormat: 'json',
        dataSource: {
          "chart": chartProperties,
          "data": chartData
        }
      });
      apiChart.render();
    }
  });
});