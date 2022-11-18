function startClock() {

    var date = new Date();
    var hour = date.getHours();
    if(hour<10){
      hour="0" + hour;
    }
    var minute = date.getMinutes();
    if(minute<10){
     minute="0" + minute;
   }
   
    var second = date.getSeconds();
    if(second<10){
     second="0" + second;
    }

    var reloj= " " + hour +" : " + minute  + " " ;
    // var reloj= " " + hour +" : " + minute  + " : " + second + " " ;
   
   
   $("#clock").html(reloj);
   }
   
   window.onload = function () {
    setInterval("startClock()", 1000);
   }
  
   