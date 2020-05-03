elmnt = document.getElementsByClassName('page')[0];
u = 0

function cons(e) {
    file = "include/console/consolel.txt";

    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function () {
        if(rawFile.readyState === 4) {
            e.innerHTML = "<div class=\"console\"> <div class=\"header\"> <div class=\"app\"> <img src=\"assets/img/logo.png\" alt=\"\"> <p>Console</p></div><div class=\"bar\"></div></div><div class=\"body\" id=\"console_body\">"+rawFile.responseText+"</div></div><link rel=\"stylesheet\" href=\"assets/css/console/main.css\"><script src=\"assets/js/console/include.js\"></script>"
        }
    }
    rawFile.send();
}

document.addEventListener("keydown",CONTROL);
function CONTROL(event){
    if(event.keyCode == 85){
        if (u == 0) {
            u = 1

            var newElement = document.createElement('div');
            newElement.setAttribute('id', 'console');

            file = "include/console/console.txt";

            var rawFile = new XMLHttpRequest();
            rawFile.open("GET", file, false);
            rawFile.onreadystatechange = function () {
                if(rawFile.readyState === 4) {
                    var response = rawFile.responseText;
                    newElement.innerHTML = "<div class=\"console\"> <div class=\"header\"> <div class=\"app\"> <img src=\"assets/img/logo.png\" alt=\"\"> <p>Console</p></div><div class=\"bar\"></div></div><div class=\"body\" id=\"console_body\">"+response+"</div></div><link rel=\"stylesheet\" href=\"assets/css/console/main.css\"><script src=\"assets/js/console/include.js\"></script>"
                }
            }
            rawFile.send();

            elmnt.appendChild(newElement);
        } else {
            u = 0
            var element = document.getElementById('console');
            element.parentNode.removeChild(element);
        }
    } else if (event.keyCode == 89) {
        var element = document.getElementById('console');
        cons(element)
    }
}