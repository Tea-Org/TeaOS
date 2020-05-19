/*var icons = document.getElementsByClassName('icon-desktop');
var page = document.getElementsByClassName('page');

var minimize = document.getElementsByClassName('minimize');
var maximize = document.getElementsByClassName('maximize');
var close = document.getElementsByClassName('close');

for (let i=0; i<2; i++) {
	icons[i].ondblclick = function (){
		page[i].style.display = 'block';
		console.log(i);
	}
	close[i].onmouseover = function() {
		close[i].src = 'assets/img/button_close_hover.png';
	}
	close[i].onmouseout = function() {
		close[i].src = 'assets/img/button_close.png';
	}
	minimize[i].onmouseover = function() {
		minimize[i].src = 'assets/img/button_minimize_hover.png';
	}
	minimize[i].onmouseout = function() {
		minimize[i].src = 'assets/img/button_minimize.png';
	}
	maximize[i].onmouseover = function() {
		maximize[i].src = 'assets/img/button_maximize_hover.png';
	}
	maximize[i].onmouseout = function() {
		maximize[i].src = 'assets/img/button_maximize.png';
	}
	close[i].onclick = function() {
		page[i].style.display = 'none';
	}
}
*/
window.addEventListener("DOMContentLoaded", () => {
    const icons = document.getElementsByClassName('icon-desktop');
	const page = document.getElementsByClassName('page');
	
	const minimize = document.getElementsByClassName('minimize');
	const maximize = document.getElementsByClassName('maximize');
	const close = document.getElementsByClassName('close');

    for (let i = 0; i < 2; i++) {
        icons[i].addEventListener("dblclick", () => {
            page[i].style.display = 'block';
		});
		
		close[i].addEventListener("click", () => {
            page[i].style.display = 'none';
		});
		
		close[i].addEventListener("mouseover", () => {
            close[i].src = 'assets/img/button_close_hover.png';
		});
		close[i].addEventListener("mouseout", () => {
            close[i].src = 'assets/img/button_close.png';
		});
		
		maximize[i].addEventListener("mouseover", () => {
            maximize[i].src = 'assets/img/button_maximize_hover.png';
		});
		maximize[i].addEventListener("mouseout", () => {
            maximize[i].src = 'assets/img/button_maximize.png';
		});
		
		minimize[i].addEventListener("mouseover", () => {
            minimize[i].src = 'assets/img/button_minimize_hover.png';
		});
		minimize[i].addEventListener("mouseout", () => {
            minimize[i].src = 'assets/img/button_minimize.png';
        });
    }
});