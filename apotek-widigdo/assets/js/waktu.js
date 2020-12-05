window.onload = function() 
{ 
    jam(); 
    kalender();
}

function kalender() 
{
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    
    var thisDay = date.getDay(),
        thisDay = myDays[thisDay];
    
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
        
    a = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    document.getElementById("kalender").innerHTML = a;
}

function jam() 
{
    var j = document.getElementById('jam'),
    d = new Date(), h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    j.innerHTML = h +':'+ m +':'+ s;

    setTimeout('jam()', 1000);
}

 function set(j) 
{
    j = j < 10 ? '0'+ j : j;
    return j;
}