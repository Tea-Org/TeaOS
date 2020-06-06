var hour = document.getElementsByClassName('hour')[0];
var date = document.getElementsByClassName('date')[0];
window.onload = function hourK() {
    var ladate=new Date()
    var h=ladate.getHours();
    if (h<10) {h = "0" + h}
    var m=ladate.getMinutes();
    if (m<10) {m = "0" + m}
    hour.innerHTML = h+":"+m
    const options = { weekday: 'short', month: 'long', day: 'numeric' };
    date.innerHTML = ladate.toLocaleDateString('fr-FR', options).charAt(0).toUpperCase() + ladate.toLocaleDateString('fr-FR', options).slice(1)
    setTimeout(hourK, 1000)
}