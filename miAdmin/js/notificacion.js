    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        }
        else
        {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
            end = dc.length;
            }
        }
        // because unescape has been deprecated, replaced with decodeURI
        //return unescape(dc.substring(begin + prefix.length, end));
        return decodeURI(dc.substring(begin + prefix.length, end));
    } 
    
    doSomething();
    
    
     function setCookie(cname, cvalue, exMins) {
                            var d = new Date();
                            d.setTime(d.getTime() + (exMins*60*1000));
                            var expires = "expires="+d.toUTCString();  
                            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
     }
    
    function doSomething() {
        var myCookie = getCookie("notificacion");

        if (myCookie == null) {
            // do cookie doesn't exist stuff;
            console.log("");
            
        }
        else {
            // do cookie exists stuff
            console.log("hay notificación");
            nombreCK = "notificacion"
            var noti = getCookie(nombreCK);
            noti2 = noti.replaceAll("+"," ");
            noti3 = noti2.replaceAll("%2C",", ");
            console.log (noti3);
            
            document.getElementById("notificacion").textContent = noti3;
            
            setTimeout(function(){document.getElementById("notificacion").style.top = "20%"; }, 100);
            setCookie('notificacion','',0);
            setTimeout(function(){document.getElementById("notificacion").style.top = "-150%";document.getElementById("notificacion").textContent = ""; }, 4000);
                                 
           
        }
    }
    