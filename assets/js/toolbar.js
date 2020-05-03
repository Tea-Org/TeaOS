var hour = document.getElementsByClassName('hour')[0];

window.onload = function hourK() {
    var ladate=new Date()
    var h=ladate.getHours();
    if (h<10) {h = "0" + h}
    var m=ladate.getMinutes();
    if (m<10) {m = "0" + m}
    hour.innerHTML = h+":"+m
    setTimeout(hourK, 1000)
}