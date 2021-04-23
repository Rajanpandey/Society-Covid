function getSocietyCasesData(t_id) {
    return JSON.parse($.ajax({
        async: false,
        url: 'fetchCasesGroupByDate.php',
        type: 'POST',
        data: {t_id: t_id},
        dataType: 'JSON',
        success:function(response) {}
    }).responseText);
}

var t_id = document.getElementById("hiddenTId").value;
var societyCasesArr = getSocietyCasesData(t_id);

var formattedSocietyData = [];

console.log()
var now = new Date();
var cumulativeCount = 0;
var i = 0;
var idx = 0;
for (var d = new Date('2020-4-25'); d <= now; d.setDate(d.getDate() + 1)) {
    var data = {};
    formattedD = (d.getFullYear() + '-' + ('0' + (d.getMonth()+1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2));
    data['date'] = formattedD;
    if (i < societyCasesArr.length && (new Date(societyCasesArr[i]['date']).getFullYear() + '-' + ('0' + (new Date(societyCasesArr[i]['date']).getMonth() + 1)).slice(-2) + '-' + ('0' + new Date(societyCasesArr[i]['date']).getDate()).slice(-2) === formattedD)) {
        data['delConfirmed'] = parseInt(societyCasesArr[i]['SUM(count)']);
        cumulativeCount += parseInt(societyCasesArr[i]['SUM(count)']);
        i++;
    } else {
        data['delConfirmed'] = 0;
    }
    if (d < new Date(societyCasesArr[0]['date'])) {
        data['active'] = 0;
    } else {
        data['active'] = cumulativeCount - formattedSocietyData[idx - 14]['confirmed'];
    }
    data['confirmed'] = cumulativeCount;
    formattedSocietyData.push(data);
    idx++;
}

am4core.ready(function() {
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create("dailyNewConfirmSociety", am4charts.XYChart);

    chart.data = formattedSocietyData;

    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 50;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "delConfirmed";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.minBulletDistance = 10;
    series.tooltipText = "{valueY}";
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.background.cornerRadius = 20;
    series.tooltip.background.fillOpacity = 0.5;
    series.tooltip.label.padding(12,12,12,12)

    chart.scrollbarX = new am4charts.XYChartScrollbar();
    chart.scrollbarX.series.push(series);

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.xAxis = dateAxis;
    chart.cursor.snapToSeries = series;

    function generateChartData() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 1000);
        var visits = 1200;
        for (var i = 0; i < 500; i++) {
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

            chartData.push({
                date: newDate,
                visits: visits
            });
        }
        return chartData;
    }
});

am4core.ready(function() {
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create("totalConfirmSociety", am4charts.XYChart);

    chart.data = formattedSocietyData;

    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 50;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "confirmed";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.minBulletDistance = 10;
    series.tooltipText = "{valueY}";
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.background.cornerRadius = 20;
    series.tooltip.background.fillOpacity = 0.5;
    series.tooltip.label.padding(12,12,12,12)

    chart.scrollbarX = new am4charts.XYChartScrollbar();
    chart.scrollbarX.series.push(series);

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.xAxis = dateAxis;
    chart.cursor.snapToSeries = series;

    function generateChartData() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 1000);
        var visits = 1200;
        for (var i = 0; i < 500; i++) {
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

            chartData.push({
                date: newDate,
                visits: visits
            });
        }
        return chartData;
    }
});

am4core.ready(function() {
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create("totalActiveSociety", am4charts.XYChart);

    chart.data = formattedSocietyData;

    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 50;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "active";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.minBulletDistance = 10;
    series.tooltipText = "{valueY}";
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.background.cornerRadius = 20;
    series.tooltip.background.fillOpacity = 0.5;
    series.tooltip.label.padding(12,12,12,12)

    chart.scrollbarX = new am4charts.XYChartScrollbar();
    chart.scrollbarX.series.push(series);

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.xAxis = dateAxis;
    chart.cursor.snapToSeries = series;

    function generateChartData() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 1000);
        var visits = 1200;
        for (var i = 0; i < 500; i++) {
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

            chartData.push({
                date: newDate,
                visits: visits
            });
        }
        return chartData;
    }
});
