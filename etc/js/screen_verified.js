const body = document.getElementsByTagName('body')[0];

function reload() {
    window.outerHeight = window.screen.height;
    const width = window.innerWidth;
    const height = window.innerHeight;
    if (width < 1450 || height < 650) {
        body.innerHTML = '<div class="background_mobile"> <img src="assets/img/logo_coloured_v2.png" alt=""><p>You got a too smaller screen resolution to launch TeaOS</p></div>'
    }
}

window.onresize = reload;

reload();
