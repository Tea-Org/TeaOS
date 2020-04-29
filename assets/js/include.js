elmnt = document.getElementsByClassName('page')[0];
u = 0

document.addEventListener("keydown",CONTROL);
function CONTROL(event){
    if(event.keyCode == 85){
        if (u == 0) {
            u = 1

            var newElement = document.createElement('div');
            newElement.setAttribute('id', 'console');

            file = "pages/console.php";

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                newElement.innerHTML = this.responseText;
            }      
            xhttp.open("GET", file, true);
            xhttp.send();

            elmnt.appendChild(newElement);
        } else {
            u = 0
            var element = document.getElementById('console');
            element.parentNode.removeChild(element);
        }
    }
}