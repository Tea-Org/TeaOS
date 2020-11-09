window.addEventListener("DOMContentLoaded", () => {
    const search = document.getElementsByTagName('input');
    const button = document.getElementsByTagName('button');
    const iframe = document.getElementsByTagName('iframe');

    button[1].addEventListener("click", () => {
        document.location.reload(true);
    });
    button[3].addEventListener("click", () => {
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
            var formData = new FormData();
            formData.set("url", e);

            var request = new XMLHttpRequest();
            request.open('POST', 'actions/research.php', true);
            request.send(formData);

            iframe[0].src = e;
        } else {
            iframe[0].src = 'home.php';
        }
    }
});