var lastUpdate = document.getElementById('lastUpdate').innerHTML;

var x = setInterval(function(){
    var now = new Date().getTime();

    var distance = now - lastUpdate;

    var days = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60 * 60 *24));
    var hours = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);



    if(days > 1){
        document.getElementById("updated").innerHTML = "<strong>"+ days + " days " + hours + " hours ago.</strong>";
    } else if(hours > 1){
        document.getElementById("updated").innerHTML = "<strong>"+ hours + "h " + minutes + "m ago.</strong>";
    } else if(minutes > 1) {
        document.getElementById("updated").innerHTML = "<strong>"+ minutes + "m " + seconds + "s ago.</strong>";
    } else {
        document.getElementById("updated").innerHTML = "<strong>"+ seconds + "s.</strong>";
    }


}, 1000);