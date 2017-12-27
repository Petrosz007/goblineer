String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var myChart = null;
$(document).ready(function () {
    /*Getting and formatting Data*/
    var dataMv0 = document.getElementById('JSON-mv').innerHTML;
    dataMv0 = dataMv0.replace('[','');
    dataMv0 = dataMv0.replace(']','');
    dataMv0 = dataMv0.split(',');
    for(var i = 0; i < dataMv0.length; i++){
        dataMv0[i] = parseFloat(dataMv0[i]).toFixed(2);
    }
    var dataMv = dataMv0.map(Number);

    var dataQuantity0 = document.getElementById('JSON-quantity').innerHTML;
    dataQuantity0 = dataQuantity0.replace('[','');
    dataQuantity0 = dataQuantity0.replace(']','');
    dataQuantity0 = dataQuantity0.split(',');
    var dataQuantity = dataQuantity0.map(Number);

    var dataDate0 = document.getElementById('JSON-date').innerHTML;
    dataDate0 = dataDate0.replace('[','');
    dataDate0 = dataDate0.replace(']','');
    dataDate0 = dataDate0.split(',');
    for(var i = 0; i < dataDate0.length; i++){
        dataDate0[i] = dataDate0[i].replace('"','').replace('"','');
    }

    var dataDate1 = dataDate0.map(Number);

    var dataDate = dataDate1.map(function(x){
        return Highcharts.dateFormat('%Y.%m.%d %H:%M',x*1000);
    }); 
    
    myChart = Highcharts.chart('chart', {
        chart: {
            type: 'line',
            zoomType: 'x'
        },
        /*boost: {
            useGPUTranslations: true
        },*/
        title: {
            text: ''
        },
        tooltip: {
            shared: true,
            crosshairs: true
        },
        legend: {
            align: 'center',
            verticalAlign: 'top',
        },
        plotOptions: {
            line: {
                marker: {
                    enabled: false
                }
            }
        },
        xAxis: {
            categories: dataDate,
            dateTimeLabelFormats: {
                millisecond: '%H:%M:%S.%L',
                second: '%H:%M:%S',
                minute: '%H:%M',
                hour: '%H:%M',
                day: '%e. %b',
                week: '%e. %b',
                month: '%b \'%y',
                year: '%Y'
            }            
        },
        yAxis: [{
            title: {
                text: 'Market Value'
            },
            min: 0
        }, {
            title: {
                text: 'Quantity'
            },
            opposite: true,
            min: 0
        }],
        series: [{
            name: 'Market Value',
            yAxis: 0,
            data: dataMv,
            dataGrouping: {
                enabled: true
            }
        }, {
            name: 'Quantity',
            yAxis: 1,
            data: dataQuantity,
            dataGrouping: {
                enabled: true
            }
        }]
    });
});