$(function(){
  $.ajax({
    url: 'http://localhost/studentMarks/phpIncludes/chart_data_student.php',
    type: 'GET',
    success : function(data) {
      chartData = data;
      var chartProperties = {
        "caption": "Individual Student Result Analysis",
        "xAxisName": "Courses Taken",
        "yAxisName": "Marks Scored",
        "rotatevalues": "1",
        "theme": "zune"
      };
      apiChart = new FusionCharts({
        type: 'column2d',
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