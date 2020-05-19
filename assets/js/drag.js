window.addEventListener("DOMContentLoaded", () => {
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

      window[i].style.top = '35px';
      window[i].style.left = '0';

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

    
  dragElementWindow(window[i]);
  
  function dragElementWindow(elmnt) {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      if (document.getElementsByClassName("header")[i]) {
        // if present, the header is where you move the DIV from:
        document.getElementsByClassName("header")[i].onmousedown = dragMouseDownWindow;
      } else {
        // otherwise, move the DIV from anywhere inside the DIV:
        elmnt.onmousedown = dragMouseDownWindow;
    }
   
    function dragMouseDownWindow(e) {
      e = e || window.event;
      e.preventDefault();
      // get the mouse cursor position at startup:
      pos3 = e.clientX;
      pos4 = e.clientY;
      document.onmouseup = closeDragElementWindow;
      // call a function whenever the cursor moves:
      document.onmousemove = elementDragWindow;
    }
  
    function elementDragWindow(e) {
      e = e || window.event;
      e.preventDefault();
      // calculate the new cursor position:
      pos1 = pos3 - e.clientX;
      pos2 = pos4 - e.clientY;
      pos3 = e.clientX;
      pos4 = e.clientY;

      // set the element's new position:
      if (elmnt.offsetTop - pos2 < 0) {
        elmnt.style.top = "0px"
      } else {
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
      }
      elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }
  
    function closeDragElementWindow() {
      // stop moving when mouse button is released:
      document.onmouseup = null;
      document.onmousemove = null;  
    }
  }
}
});
