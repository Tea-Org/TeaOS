
for (i=0; i < 10; i++) {
  dragElementWindow(document.getElementsByClassName("icon-desktop")[0]);

  dragElementWindow(document.getElementsByClassName("window")[i]);
  function dragElementWindow(elmnt) {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      if (document.getElementById(elmnt.class + "header")) {
        // if present, the header is where you move the DIV from:
        document.getElementById(elmnt.class + "header").onmousedown = dragMouseDownWindow;
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
      document.onmousemove = null;  }
  }
}