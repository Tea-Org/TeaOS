var icons = document.getElementsByClassName('icon-desktop');
var page = document.getElementsByClassName('page');

var minimize = document.getElementsByClassName('minimize');
var maximize = document.getElementsByClassName('maximize');
var close = document.getElementsByClassName('close');

for (i=0; i<2; i++) {
	icons[i].ondblclick = function (){
		page[i].style.display = 'block';
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