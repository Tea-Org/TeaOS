var hour = document.getElementsByClassName('hour')[0];
var bat = document.getElementsByClassName('battery');
var font = document.getElementsByClassName('font')[0];
var sec_font = document.getElementsByClassName('secfont')[0];
var button = document.getElementsByClassName('taskb');
var box = document.getElementsByClassName('box');


window.onload = function hourK() {
    var ladate=new Date()
    var h=ladate.getHours();
    if (h<10) {h = "0" + h}
    var m=ladate.getMinutes();
    if (m<10) {m = "0" + m}
    hour.innerHTML = h+":"+m
    setTimeout(hourK, 1000)
}

window.addEventListener("DOMContentLoaded", () => {
    let l = 0
    const task_box = document.getElementsByClassName('task_box')[0];

    for (let i = 0; i < 10; i++) {
        button[i].addEventListener("click", () => {
            if (l == 0) {
                task_box.style.display = "block";
                box[i].style.display = "block";
                l = 1
            } else {
                task_box.style.display = "none";
                box[i].style.display = "none";
                l = 0
            }
        });
    }
});

/*if (navigator.onLine === true) {
    alert('You are online');
} else {
    alert('You are offline');
}

window.addEventListener('online', function() {
	alert('Current status : online');
});

window.addEventListener('offline', function() {
	alert('Current status : offline');
});*/

// Battery script:
navigator.getBattery().then(function(battery) {
    function updateAllBatteryInfo(){
      updateChargeInfo();
      updateLevelInfo();
    }
    updateAllBatteryInfo();
  
    battery.addEventListener('chargingchange', function(){
      updateChargeInfo();
    });
    function updateChargeInfo(){
        bat[0].innerHTML = '<i class="fas fa-plug"></i>'
        bat[1].innerHTML = '<i class="fas fa-plug"></i>'
        sec_font.innerHTML = 'In charge'
    }
  
    battery.addEventListener('levelchange', function(){
      updateLevelInfo();
    });
    function updateLevelInfo(){
        var level = battery.level * 100
        if (level < 10) {
            bat[0].innerHTML = '<i class="fas fa-battery-empty"></i>'
            bat[1].innerHTML = '<i class="fas fa-battery-empty"></i>'
        } else if (level > 9 && level < 30) {
            bat[0].innerHTML = '<i class="fas fa-battery-quarter"></i>'
            bat[1].innerHTML = '<i class="fas fa-battery-quarter"></i>'
        } else if (level > 29 && level < 70) {
            bat[0].innerHTML = '<i class="fas fa-battery-half"></i>'
            bat[1].innerHTML = '<i class="fas fa-battery-half"></i>'
        } else if (level > 69 && level < 90) {
            bat[0].innerHTML = '<i class="fas fa-battery-three-quarter"></i>'
            bat[1].innerHTML = '<i class="fas fa-battery-three-quarter"></i>'
        } else {
            bat[0].innerHTML = '<i class="fas fa-battery-full"></i>'
            bat[1].innerHTML = '<i class="fas fa-battery-full"></i>'
        }
        font.innerHTML = battery.level * 100 + "%"
        sec_font.innerHTML = "On battery"
    }
  
});