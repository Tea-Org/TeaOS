window.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementsByTagName('input');
    const button = document.getElementsByTagName('button');
    const iframe = document.getElementsByTagName('iframe');

    button[0].addEventListener("click", () => {
        if (search[0].value != '') {
            if (search[0].value.substring(0,4) != 'http') {
                research('http://'+search[0].value);
            } else {
                research(search[0].value);
            }
        } else {
            iframe[0].src = 'home.php';
        }
    });

    document.addEventListener("keydown",CONTROL);
    function CONTROL(event){
        if(event.keyCode == 13){
            if (search[0].value != '') {
                if (search[0].value.substring(0,4) != 'http') {
                    research('http://'+search[0].value);
                } else {
                    research(search[0].value);
                }
            } else {
                iframe[0].src = 'home.php';
            }
        }
    }

    function research(e) {
        if (e != '') {
            iframe[0].src = e;
        } else {
            iframe[0].src = 'home.php';
        }
    }
});