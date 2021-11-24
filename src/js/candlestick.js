anychart.onDocumentLoad(function () {
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
        return new Date(x * 1000);
    }); 
    
    var low = 0, high = 0, open = 0, close = 0;
    var date = new Date();
    var first = true;
    var data = [];
    for(var i = 0; i < dataDate.length; i++)
    {
            if(dataDate[i].getFullYear() == date.getFullYear() &&
            dataDate[i].getMonth() == date.getMonth() &&
        dataDate[i].getUTCDate() == date.getUTCDate()) 
        {
                    if(dataMv[i] < low) { low = dataMv[i]; }
                    if(dataMv[i] > high) { high = dataMv[i]; }
        }
        else
        {
        if(i == 0) {
                        date = dataDate[i];
        } else {
            close = dataMv[i - 1];
            data.push({ date: dataDate[i - 1].toISOString().split('T')[0], open: open, low: low, high: high, close: close});
            
            date = dataDate[i];
        }
            
            
            low = dataMv[i];
                    high = dataMv[i];
        open = dataMv[i];
        }
    }
        
    
    
    table = anychart.data.table('date');
    table.addData(data);

    // map the data
    mapping = table.mapAs({'open':"open",'high': "high", 'low':"low", 'close':"close"});
    chart = anychart.stock();

    // set the series
    var series = chart.plot(0).candlestick(mapping);
    // Wowhead p loads after this executes, meaning this has no target => can't get the name of the item
    // var itemName = document.getElementById("item-name").getElementsByTagName("SPAN")[0].innerHTML;
    // series.name(itemName + " prices");
    chart.container("chart_candlestick");
    chart.draw();
});