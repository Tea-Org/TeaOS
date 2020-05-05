var icons = document.getElementsByClassName('icon-desktop');
var page = document.getElementsByClassName('page')[0];

icons[0].ondblclick = function (){
	page.style.display = 'block';
}
