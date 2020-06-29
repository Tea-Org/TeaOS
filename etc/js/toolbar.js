var hour = document.getElementsByClassName('hour')[0];
var bat = document.getElementsByClassName('battery')[0];
var font = document.getElementsByClassName('font')[0];
var sec_font = document.getElementsByClassName('secfont')[0];
var button = document.getElementsByClassName('taskb');
var box = document.getElementsByClassName('tiny_box')[0];



window.onload = function hourK() {
    var ladate=new Date()
    var h=ladate.getHours();
    if (h<10) {h = "0" + h}
    var m=ladate.getMinutes();
    if (m<10) {m = "0" + m}
    hour.innerHTML = h+":"+m
    setTimeout(hourK, 1000)
}
function disconnect() {
    window.location = "?action=disconnect";
}

window.addEventListener("DOMContentLoaded", () => {
    let l = 0
    let m = 0;

    

    var task_box = document.getElementsByClassName('tiny_box')[0];
    var app_title = task_box.getElementsByClassName('app_title')[0];
    const close = task_box.getElementsByClassName('close')[0];


    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener("click", () => {
            if (l == 0) {
                task_box.style.display = "block";
                app_title.innerHTML = button[i].id;


                var body = document.createElement("div");
                body.className = "body";


                switch (button[i].id) {
                    case 'Ethernet':
                        if (navigator.onLine === true) {
                            body.innerHTML = '<div class="box"> <div class="ethernet" style="background: #02d001"> <p>Online</p></div></div>'

                        } else {
                            body.innerHTML = '<div class="box"> <div class="ethernet" style="background: #fd504a"> <p>Offline</p></div></div>'

                        }
                        break;

                    case 'Battery':
                        body.innerHTML = '<div class="box"> <p class="battery"><i class="fas fa-battery-full"></i></p><p class="font">100%</p><p class="sec_font">Charged</p></div>'
                        break;

                    case 'Date and Time':
                        var ladate=new Date()
                        var h=ladate.getHours();
                        if (h<10) {h = "0" + h}
                        var m=ladate.getMinutes();
                        if (m<10) {m = "0" + m}
                        var s=ladate.getSeconds();
                        if (s<10) {s = "0" + s}

                        body.innerHTML = '<div class="box"> <p class="time">'+h+":"+m+":"+s+'</p></div>'
                        break;

                    case 'Logout' :
                        m = 1;
                        body.innerHTML = '<div class="box"> <p class="eteindre">Turn off this computer now ?</p><p class="message">You\'re actually connected with "<?php echo $userinfo[\'username\']; ?>"</p><p class="other">You\'ll be disconnected in a few seconds</p><div class="pro_bar"></div><div class="dis_but" onclick="disconnect()">Disconnect</div></div>'
        
                        setTimeout(disconnect, 15000)
                        break;
                    }

                task_box.appendChild(body);


                l = 1
            } else {
                task_box.style.display = "none";
                task_box.removeChild(task_box.getElementsByClassName("body")[0]);
                l = 0
            }
        });
        close.addEventListener("click", () => {
            task_box.style.display = "none";
            task_box.removeChild(task_box.getElementsByClassName("body")[0]);
            l = 0;
            m = 0;
        });
		close.addEventListener("mouseover", () => {
			close.src = 'assets/img/button_close_hover.png';
		});
		close.addEventListener("mouseout", () => {
			close.src = 'assets/img/button_close.png';
		});
    }
});