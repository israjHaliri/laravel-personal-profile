$(document).ready(function(){
    $.ajax({
        url:"data_chart",
        type: 'GET',
        dataType: "json",
        success: function(data){
            show_data(data);
        }
    });
});
function show_data(data)
{

    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'How Much People Saw Our Company'
            },
            xAxis: {
                categories: ['Access To Home', 'Access To Dashboard'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (time/hit)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' time'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year '+data.year,
                data: [data.count_home, data.count_login]
            }]
        });
    });
}