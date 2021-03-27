const button = document.getElementsByTagName('button')[0];

window.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementsByTagName('input');

    button.addEventListener("click", () => {
        var formData = new FormData();
        formData.set("login", "TRUE");
        formData.set("username", input[0].value);
        formData.set("password", input[1].value);

        var request = new XMLHttpRequest();
        request.open('POST', 'boot/actions/login.php', true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState === 4) {
                const resp = request.responseText.split("|");
                if (resp[0] === "ok") {
                    for (let i = 0; i < input.length; i++) {
                        input[i].style.borderColor = 'green'
                        input[i].style.color = 'green'
                    }
                    window.location.assign("?page=desktop")
                } else {
                    for (let i = 0; i < input.length; i++) {
                        input[i].style.borderColor = 'red'
                        input[i].style.color = 'red'
                    }
                }
            }
        }
    });
});

