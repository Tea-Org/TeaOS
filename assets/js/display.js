/*window.addEventListener("DOMContentLoaded", () => {
    const icons = document.getElementsByClassName('icon-desktop');
	const page = document.getElementsByClassName('page');
	const window = document.getElementsByClassName('window');
	
	const minimize = document.getElementsByClassName('minimize');
	const maximize = document.getElementsByClassName('maximize');
	const close = document.getElementsByClassName('close');

	let j = 0;

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
		
		maximize[i].addEventListener("click", () => {
			if (j == 0) {
				window[i].style.width = '100%';
				window[i].style.height = '100%';

				window[i].style.top = '35px'
				j = 1;
			} else {
				window[i].style.width = '780px';
				window[i].style.height = '650px';
				j = 0;
			}
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
});*/