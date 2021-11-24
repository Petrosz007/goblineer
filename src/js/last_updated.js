var lastUpdate = document.getElementById('lastUpdate').innerHTML;

var x = setInterval(function(){
    var distance = new Date().getTime() - lastUpdate;
    var resultString = "";

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(distance / (1000 * 60 * 60));
    var minutes = Math.floor(distance / (1000 * 60));
    var seconds = Math.floor(distance / (1000));
    
    var daysRelative = days;
    var hoursRelative = hours - days * 24;
    var minutesRelative = minutes - hours * 60;
    var secondsRelative = seconds - minutes * 60;

    if(daysRelative >= 1) resultString += daysRelative + " days ";
    if(hoursRelative >= 1) resultString += hoursRelative + " hours ";
    if(minutesRelative >= 1) resultString += minutesRelative + " minutes ";
    if(secondsRelative >= 1) resultString += secondsRelative + " seconds ago.";
    
    document.getElementById("updated").innerHTML = "<strong>" + resultString + "<strong>";
}, 1000);