const iconsa = document.getElementsByClassName('icon-desktop');

for (let a = 0; a < iconsa.length; a++) {
    dragElement(iconsa[a]);

    function dragElement(blmnt) {
        var bpos1 = 0, bpos2 = 0, bpos3 = 0, bpos4 = 0;

        blmnt.onmousedown = dragMouseDown;

        function dragMouseDown(b) {
            b = b || window.event;
            b.preventDefault();
            bpos3 = b.clientX;
            bpos4 = b.clientY;

            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }

        function elementDrag(b) {
            //iconsa[a].style.position = 'absolute';

            iconsa[a].style.whiteSpace = 'normal';

            b = b || window.event;
            b.preventDefault();
            bpos1 = bpos3 - b.clientX;
            bpos2 = bpos4 - b.clientY;
            bpos3 = b.clientX;
            bpos4 = b.clientY;
            blmnt.style.top = (blmnt.offsetTop - bpos2) + "px";
            blmnt.style.left = (blmnt.offsetLeft - bpos1) + "px";

            var formData = new FormData();
            formData.set("id", blmnt.id);
            formData.set("top", blmnt.style.top);
            formData.set("left", blmnt.style.left);

            var request = new XMLHttpRequest();
            request.open('POST', '?action=drag', true);
            request.send(formData);
        }

        function closeDragElement() {
            iconsa[a].style.whiteSpace = 'nowrap';

            document.onmouseup = null;
            document.onmousemove = null;


        }
    }
}